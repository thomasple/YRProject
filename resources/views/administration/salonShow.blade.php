@extends('templates/main')
@section('title')
    Salon information
@stop
@section('content')
    <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-6 col-sm-offset-3 col-xs-12"
         id="register_body">
        <h1 style="text-align: center">Show Salon</h1>

        <div style="text-align: left">
            <p>Name : {{$salon->name}}</p>

            <p>Address : {{$salon->address}}</p>

            <p>Description : {{$salon->description}}</p>

            <p>Open at : {{date('H:i',strtotime($salon->open_hour))}}</p>

            <p>Close at : {{date('H:i',strtotime($salon->close_hour))}}</p>

            <p>Owner : {{$salon->owner->first_name.' '.$salon->owner->last_name}}</p>

            <p>Date of creation : {{$salon->created_at}}</p>

            <p>Last update : {{$salon->updated_at}}</p>

            <p>photo : {!! Html::image($salon->main_photo, 'Main photo', ['width'=>'100px']) !!}</p>

            <p>Artisans :
                @foreach($salon->artisans as $artisan)
                    {!! link_to_route('artisan.show', $artisan->first_name.' '.$artisan->last_name, [$artisan->id]) !!},
                @endforeach
            </p>

            <a href="javascript:history.back()" class="btn btn-primary">
                <span class="glyphicon glyphicon-circle-arrow-left"></span> Back
            </a>
        </div>
    </div>
@stop
@section('script')
@stop
