@extends('templates/main')

@section('title')
    Salon configuration
@endsection

@section('content')
    <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-6 col-sm-offset-3 col-xs-12"
         id="register_body">
        <h1 style="text-align: center">Choose the salon you want to configure</h1>

        <ul style="text-align: left">
            @foreach($salons as $salon)
                <li>
                    <a href="{{ url('/confirm-salon/'.$salon->id) }}">{{ $salon->name }}</a> ({!! link_to_route('salon.show', 'See details', [$salon->id]) !!})
                </li>
            @endforeach
        </ul>
    </div>
@endsection