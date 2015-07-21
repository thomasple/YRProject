@extends('../templates/main')
@section('title')
    Salon information
@stop
@section('body')
    <div class="col-sm-offset-4 col-sm-4">
        <div class="panel panel-primary">
            <div class="panel-heading">Salon information</div>
        </div>
        <div class="panel-body">
            <p>Name : {{$salon->name}}</p>
            <p>Address : {{$salon->address}}</p>
            <p>Description : {{$salon->description}}</p>
            <p>Owner : {{$salon->owner_id}}</p>
            <p>Date of creation : {{$salon->created_at}}</p>
            <p>Last update : {{$salon->updated_at}}</p>

        </div>
        <?php
        if(isset($salon->main_photo) AND $salon->main_photo!=NULL)
        {
            echo '<img src="salonPictures/'.$salon->main_photo.'" alt="photo salon'.$salon->id.'"/>';
        }
        ?>
        <a href="javascript:history.back()" class="btn btn-primary">

            <span class="glyphicon glyphicon-circle-arrow-left"></span> Back

        </a>
    </div>
@stop
@section('script')
@stop
