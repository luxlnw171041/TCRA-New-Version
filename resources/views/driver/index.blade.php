@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Driver</div>
                    <div class="card-body">
                        <a href="{{ url('/driver/create') }}" class="btn btn-success btn-sm" title="Add New Driver">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <form method="GET" action="{{ url('/driver') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th><th>User Id</th><th>Compname</th><th>Commercial Registration</th><th>D Name</th><th>D Surname</th><th>D Idno</th><th>Demerit</th><th>Demeritdetail</th><th>D Pic Id Card</th><th>D Pic Lease</th><th>D Pic Cap</th><th>D Pic Other</th><th>D Date</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($driver as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->user_id }}</td><td>{{ $item->compname }}</td><td>{{ $item->commercial_registration }}</td><td>{{ $item->d_name }}</td><td>{{ $item->d_surname }}</td><td>{{ $item->d_idno }}</td><td>{{ $item->demerit }}</td><td>{{ $item->demeritdetail }}</td><td>{{ $item->d_pic_id_card }}</td><td>{{ $item->d_pic_lease }}</td><td>{{ $item->d_pic_cap }}</td><td>{{ $item->d_pic_other }}</td><td>{{ $item->d_date }}</td>
                                        <td>
                                            <a href="{{ url('/driver/' . $item->id) }}" title="View Driver"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/driver/' . $item->id . '/edit') }}" title="Edit Driver"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/driver' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Driver" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $driver->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection