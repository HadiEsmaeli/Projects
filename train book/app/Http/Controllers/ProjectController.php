<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function index(){
        $train = DB::table('trains')->get();

        return View('index', ['trains' => $train]);
    }

    public function single_train(Request $req, $id){

        $single_train = DB::table('trains')->where('id', $id)->get();
        return View('single_train', [ 'single_train' => $single_train ]);
    }

    public function booknow(Request $req){

        $id = $req->input('id');
        
        return View('booknow', [ 'id' => $id ]);
    }
    
    public function booking(Request $req){

        $customerName = $req->input('customer_name');
        $tripid = $req->input('tripid');
        $userid = $req->input('userid');

        $hasBooked = DB::table('bookings')->where('userid', $userid)->exists();

        if( $hasBooked ){

            $req->session()->put('message', 'you have already booked!');
            return View('alreadybooked');
        }else{

            $customerId = DB::table('bookings')->insertGetId([
                'tripid' => $tripid,
                'customer_name' => $customerName,
                'userid' => $userid
            ]);

            $trains = DB::table('trains')->where('id', $tripid)->get();

            DB::table('trains')->where('id',$tripid)->update([ 'seats' => $trains[0]->seats-1 ]);

            $req->session()->put('tripid', $tripid);
            $req->session()->put('userid', $userid);
            $req->session()->put('customerId', $customerId);

            return View('thanks');
        }
    }

    public function search(Request $req){

        $val = DB::table('trains')->where('company', 'like', $req->input('keyword').'%')->get();
        return View('index', [ 'trains' => $val ]);
    }
    
    public function search_from(Request $req){

        $val = DB::table('trains')->where('from__', 'like', $req->input('keyword').'%')->get();
        return View('index', [ 'trains' => $val ]);
    }
    
    public function search_to(Request $req){

        $val = DB::table('trains')->where('to__', 'like', $req->input('keyword').'%')->get();
        return View('index', [ 'trains' => $val ]);
    }
}
