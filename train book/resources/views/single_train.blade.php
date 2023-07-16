@extends('layouts.main')

@section('content')

<div class="container-lg" style="margin: 0 auto">

    @foreach( $single_train as $tra )
        <div class="card" style="width: 18rem; margin: 0 auto;">
            <img src="{{ asset('images/'.$tra->image) }}" class="card-img-top">

            <div class="card-body">
                <h5 class="card-title">{{ $tra->company; }}</h5>
                <p class="card-text">from: {{ $tra->from__; }}</p>
                <p class="card-text">to: {{ $tra->to__; }}</p>
                <p class="card-text">depature: {{ $tra->departure; }}</p>
                <p class="card-text">arrival: {{ $tra->arrival; }}</p>
                <p class="card-text">seats: {{ $tra->seats; }}</p>

                @if( $tra->seats <= 0 )
                    <div>No seats available</div>
                @else
                    <form method="POST" action="{{ route('book_now') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $tra->id }}">
                        <input type="submit" class="btn btn-primary" value="Book now">
                    </form>
                @endif

            </div>

        </div>
    @endforeach

</div>


@endsection