@extends('templates/main')

@section('title')
    Salon configuration
@endsection

@section('content')
    <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12 col-xs-12"
         id="register_body">
        <h1 style="text-align: center">Choose the salon you want to configure</h1>

            @foreach($salons as $salon)
                <p>
                    <a href="{{ url('/confirm-salon/'.$salon->id) }}" class="btn btn-success btn-block">{!! Html::image($salon->main_photo, 'Photo salon', ['class'=>'logo_banner', 'style'=>'width:50%;']) !!} {{ $salon->name }}</a>
                    ({!! link_to_route('salon.show', 'See details', [$salon->id]) !!})
                </p>
            @endforeach
        {!! link_to_route('salon.create', 'Add a salon', [], ['class' => 'btn btn-info pull-right']) !!}
    </div>
@endsection