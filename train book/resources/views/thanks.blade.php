@extends('layouts.main')

@section('content')

<div class="container-lg" style="margin: 0 auto">

    <div class="card" style="width: 18rem; margin: 0 auto;">
        <div class="card-body">

            <h5 class="card-title alert alert-success">
                Thank You For Choosing Our Service
            </h5>

            @if( Session::has('tripid') && Session::has('userid') )
                Your TripID: <span>{{ Session::get('tripid') }}</span><div></div>
                Your UserID: <span>{{ Session::get('userid') }}</span>
                Your customerID: <span>{{ Session::get('customerId') }}</span>
            @endif

        </div>

    </div>

</div>


@endsection