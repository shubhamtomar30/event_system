@extends('layouts.backend.app')
@section('content')
<div class="content mt-3">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Events Created By Me</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{ url('/invite_users') }}" method="post">
                @csrf
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>

                        <th>Name</th>

                        <th>Invite</th>
                    </tr>
                </thead>

                    <tbody>


                            @foreach ($data as $e)
                            <tr>

                                <td>{{ $e->name }}</td>
                                <td>
                                    <div class="form-check">
                                        <input name="check[]" class="form-check-input" type="checkbox" value="{{ $e->id }}">
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                    </tbody>


            </table>
            <input type="text" value="{{ $event_id }}" name="event_id" hidden>
            <button type="Submit" class="btn btn-primary">Invite</button>
        </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
@endsection
