@extends('layouts.theme')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Create_user_by_admin {{ $create_user_by_admin->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/create_user_by_admin') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/create_user_by_admin/' . $create_user_by_admin->id . '/edit') }}" title="Edit Create_user_by_admin"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('create_user_by_admin' . '/' . $create_user_by_admin->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Create_user_by_admin" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $create_user_by_admin->id }}</td>
                                    </tr>
                                    <tr><th> User Id </th><td> {{ $create_user_by_admin->user_id }} </td></tr><tr><th> Username </th><td> {{ $create_user_by_admin->username }} </td></tr><tr><th> Pass Code </th><td> {{ $create_user_by_admin->pass_code }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
