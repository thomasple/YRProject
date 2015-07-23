@extends('templates/main')

@section('title')
    Salon configuration
@endsection

@section('content')
    <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-6 col-sm-offset-3 col-xs-12"
         id="register_body">
        <h1 style="text-align: center">Show Service</h1>

        <div style="text-align: left">
            <p>Name : {{ $service->name }}</p>

            <p>Price : {{ $service->price }} RUR</p>

            <p>Duration : {{ $service->duration }} min</p>

            <p>Description : {{ $service->description }}</p>

            <p>Salon : {!! link_to_route('salon.show', $service->salon->name, [$service->salon->id]) !!}</p>

            <a href="javascript:history.back()" class="btn btn-primary">
                <span class="glyphicon glyphicon-circle-arrow-left"></span> Back
            </a>
        </div>
    </div>
@endsection