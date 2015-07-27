@extends('templates/main')

@section('title')
    Users
@endsection

@section('content')
    <div id="register_body" style="text-align: left;">
        <h1 style="text-align: center">List Users</h1>

        <table class="table table-condensed table-striped" id="table">
            <thead>
            <tr>
                <th>First name</th>
                <th>Last name</th>
                <th>Email</th>
                <th>Is admin</th>
                <th></th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>First name</th>
                <th>Last name</th>
                <th>Email</th>
                <th></th>
                <th></th>
            </tr>
            </tfoot>
            <tbody>
            @foreach($users as $user)
                @if($user->id!=Auth::user()->id)
                    <tr>
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->last_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->admin }}</td>
                        <td>
                            @if($user->admin)
                                <a href="{{ url("/main_admin/0/".$user->id) }}" class="btn btn-warning btn-block">Cancel administrator rights</a>;
                            @else
                                <a href="{{ url("/main_admin/1/".$user->id) }}" class="btn btn-success btn-block">Give administrator rights</a>;
                            @endif
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('script')

    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="{{url('/vendor/jquery.dataTables.columnFilter.js')}}"></script>
    <script src='//cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.js'></script>

    <script>
        $(document).ready(function () {
            $('#table').dataTable({
                ordering: false
            }).columnFilter({
                aoColumns: [
                    {type: "text"},
                    {type: "text"},
                    {type: "text"},
                ]
            });
        });
    </script>
@endsection