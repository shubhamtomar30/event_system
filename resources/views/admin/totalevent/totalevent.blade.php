@extends('layouts.backend.app')
@section('content')
<div class="content mt-3">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">All the events</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>User_id</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $e)
                        <tr>
                            <td>{{ $e->id }}</td>
                            <td>{{ $e->user_id }}</td>
                            <td>{{ $e->event_title }}</td>
                            <td>{{ $e->event_description }}</td>
                            <td>{{ $e->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>id</th>
                        <th>User_id</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Created At</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
<!-- /.card -->
</div>
@endsection
