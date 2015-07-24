@extends('templates/main')

@section('title')
    Salon configuration
@endsection

@section('content')
    <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-6 col-sm-offset-3 col-xs-12"
         id="register_body">
        <h1 style="text-align: center">{{ session('salon_chosen_name') }}</h1>
        <h1 style="text-align: center">Salon configuration</h1>

        <div style="text-align: left">
            <p style="text-align:center"><a href="{{ url('/artisan') }}" class="btn btn-primary">Configure artisans</a>
            <a href="{{ url('/service') }}" class="btn btn-primary">Configure services</a></p>
        </div>
    </div>
@endsection