@extends('layouts.main')

@section('content')

<div class="container-lg" style="margin: 0 auto; margin-top: 50px;">

    <div>
        <form method="POST" action="{{ route('booking') }}" class="form-group">
            @csrf
            <input type="text" name="customer_name" class="form-control" placeholder="name">
            <input type="text" name="userid" class="form-control" placeholder="user_id">
            <input type="hidden" name="tripid" value="{{ $id }}" class="form-control" placeholder="tripID">
            <input type="submit" value="Book" class="btn btn-primary mt-2">
        </form>
    </div>

</div>


@endsection