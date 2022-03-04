@extends('layouts.backend.app')
@section('content')

<div class="content">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Add Events</strong>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ url('/event_store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                          <label class="form-label">User Id</label>
                          <input type="text" class="form-control" name="id" value="{{ Auth::user()->id }}" required>

                        </div>
                        <div class="mb-3">
                          <label class="form-label">Event Title</label>
                          <input name="title" type="text" class="form-control" required>

                        </div>
                        <div class="mb-3">
                          <label class="form-label">Event Description</label>
                          <textarea name="des" class="form-control" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
                <div class="col-md-6"></div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="content mt-3">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Events Created By Me</h3>
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
                        <th>Invite Others</th>
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
                            <td>

                                    <a class="btn btn-primary" href="{{ url('/invite/'.$e->id) }}">Invite People</a>


                            </td>
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
                        <th>Invite Others</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
<!-- /.card -->
</div>



@endsection
