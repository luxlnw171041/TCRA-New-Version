@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Driver {{ $driver->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/driver') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/driver/' . $driver->id . '/edit') }}" title="Edit Driver"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('driver' . '/' . $driver->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Driver" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $driver->id }}</td>
                                    </tr>
                                    <tr><th> User Id </th><td> {{ $driver->user_id }} </td></tr><tr><th> Compname </th><td> {{ $driver->compname }} </td></tr><tr><th> Commercial Registration </th><td> {{ $driver->commercial_registration }} </td></tr><tr><th> D Name </th><td> {{ $driver->d_name }} </td></tr><tr><th> D Surname </th><td> {{ $driver->d_surname }} </td></tr><tr><th> D Idno </th><td> {{ $driver->d_idno }} </td></tr><tr><th> Demerit </th><td> {{ $driver->demerit }} </td></tr><tr><th> Demeritdetail </th><td> {{ $driver->demeritdetail }} </td></tr><tr><th> D Pic Id Card </th><td> {{ $driver->d_pic_id_card }} </td></tr><tr><th> D Pic Lease </th><td> {{ $driver->d_pic_lease }} </td></tr><tr><th> D Pic Cap </th><td> {{ $driver->d_pic_cap }} </td></tr><tr><th> D Pic Other </th><td> {{ $driver->d_pic_other }} </td></tr><tr><th> D Date </th><td> {{ $driver->d_date }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
