<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderMeta;
use Illuminate\Http\Request;
use Stripe;

class OrderController extends Controller
{

    public function checkout($user)
    {
        $carts = Cart::where('user_id', $user)->get();
        $subtotal = 0;
        foreach ($carts as $cart) {
            $subtotal += $cart->quantity * $cart->menu->price;
        }

        return view('frontend.checkout', compact('carts', 'subtotal'));
    }

    public function order(Request $request, $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'postal_code' => 'required',
            'total' => 'required'
        ]);

        $order = Order::create([
            'user_id' => $user,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'city' => $request->city,
            'postal_code' => $request->postal_code,
            'payment_method' => $request->payment_method,
            'payment_status' => 0,
            'order_status' => 0,
            'total' => $request->total
        ]);

        for ($i = 0; $i < count($request->menu_id); $i++) {
            OrderMeta::create([
                'order_id' => $order->id,
                'menu_id' => $request->menu_id[$i],
                'quantity' => $request->quantity[$i],
                'price' => $request->price[$i]
            ]);
        }


        if ($request->payment_method == 3) {
            $request->validate([
                'number' => 'required',
                'exp_month' => 'required',
                'exp_year' => 'required',
                'cvc' => 'required'
            ]);

            $stripe = new \Stripe\StripeClient('sk_test_51Myt8BLMPN7dMXvPfPyuxEIE6AHMKyi0nDWxlH7GvYF8xzijwWeY5OYHPCjziZ3QRXfQrJArvcLELMMSduQvWnxQ00173w78dd');

            $token = $stripe->tokens->create([
                'card' => [
                    'number' => $request->number,
                    'exp_month' => $request->exp_month,
                    'exp_year' => $request->exp_year,
                    'cvc' => $request->cvc
                ],
            ]);

            $stripe->charges->create([
                'amount' => $request->total * 100,
                'currency' => 'usd',
                'source' => $token->id,
                'description' => 'Paid By ' . $request->name,
            ]);

            $order->payment_status = 1;
            $order->update();
        }

        Cart::where('user_id', $user)->delete();

        return redirect(route('home'))->with('success', "Order Placed successfully!");
    }

    public function success(Order $order)
    {
        // dd(request('paymentId'),request('PayerID'));
        if (request('paymentId') && request('PayerID')) {
            $transaction = $this->gateway->completePurchase(array(
                'payer_id' => request('PayerID'),
                'transactionReference' => request('paymentId')
            ));

            $response = $transaction->send();

            if ($response->isSuccessful()) {
                $order->update([
                    'payment_status' => 1
                ]);
                $data = $response->getData();
                return redirect(route('home'))->with('success', "Order Placed successfully. Transaction Id is: ". $data['id']);
            }else{
                return "Payment failed";
            }
        }else{
            return "payment failed";
        }
    }

    public function cancel()
    {
        return "The payment has cancelled";
    }
}
