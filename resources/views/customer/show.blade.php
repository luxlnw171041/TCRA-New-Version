@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Customer {{ $customer->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/customer') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/customer/' . $customer->id . '/edit') }}" title="Edit Customer"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('customer' . '/' . $customer->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Customer" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $customer->id }}</td>
                                    </tr>
                                    <tr><th> User Id </th><td> {{ $customer->user_id }} </td></tr><tr><th> Rentname </th><td> {{ $customer->rentname }} </td></tr><tr><th> Compname </th><td> {{ $customer->compname }} </td></tr><tr><th> C Name </th><td> {{ $customer->c_name }} </td></tr><tr><th> C Surname </th><td> {{ $customer->c_surname }} </td></tr><tr><th> C Idno </th><td> {{ $customer->c_idno }} </td></tr><tr><th> Demerit </th><td> {{ $customer->demerit }} </td></tr><tr><th> Demeritdetail </th><td> {{ $customer->demeritdetail }} </td></tr><tr><th> C Pic Id Card </th><td> {{ $customer->c_pic_id_card }} </td></tr><tr><th> C Pic Lease </th><td> {{ $customer->c_pic_lease }} </td></tr><tr><th> C Pic Execution </th><td> {{ $customer->c_pic_execution }} </td></tr><tr><th> C Pic Cap </th><td> {{ $customer->c_pic_cap }} </td></tr><tr><th> C Pic Other </th><td> {{ $customer->c_pic_other }} </td></tr><tr><th> C Date </th><td> {{ $customer->c_date }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
