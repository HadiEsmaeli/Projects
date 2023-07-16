@extends('layouts.main')

@section('content')

<div class="container-lg" style="margin: 0 auto">

    <form action="{{ route('search') }}" method="POST">

        @csrf
        <div class="form-group my-2">
            <input type="text" name="keyword" class="form-control" placeholder="company">
        </div>

        <div class="form-group my-2">
            <input type="submit" value="search" class="btn btn-primary">
        </div>

    </form>

    <form action="{{ route('search_from') }}" method="POST">

        @csrf

        <div class="form-group my-2">
            <input type="text" name="keyword" class="form-control" placeholder="from">
        </div>

        <div class="form-group my-2">
            <input type="submit" value="search" class="btn btn-primary">
        </div>

    </form>

        <form action="{{ route('search_to') }}" method="POST">

        @csrf

        <div class="form-group my-2">
            <input type="text" name="keyword" class="form-control" placeholder="to">
        </div>

        <div class="form-group my-2">
            <input type="submit" value="search" class="btn btn-primary">
        </div>

    </form>

    <table>
        <tr>
            <th>id</th>
            <th>company</th>
            <th>from</th>
            <th>to</th>
            <th>departure</th>
            <th>arrival</th>
        </tr>
        @foreach( $trains as $tra )
            <tr>
                <td>{{ $tra->id; }}</td>
                <td>{{ $tra->company; }}</td>
                <td>{{ $tra->from__; }}</td>
                <td>{{ $tra->to__; }}</td>
                <td>{{ $tra->departure; }}</td>
                <td>{{ $tra->arrival; }}</td>
                <td>
                    <form method="get" action="{{ route('single_train', ['id' => $tra->id]) }}">
                        <input type="submit" name="" value="More" class="btn btn-primary">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

</div>


@endsection