@extends('layouts.theme')

@section('content')
<style>
    .inputGroup {
        font-family: 'Segoe UI', sans-serif;
        max-width: 100%;
        display: flex;
        align-items: center
    }

    .inputGroup input {
        font-size: 100%;
        padding: 0.8em;
        outline: none;
        border: 2px solid rgb(200, 200, 200);
        background-color: transparent;
        border-radius: 10px;
        width: 100%;
    }

    .inputGroup label {
        font-size: 100%;
        position: absolute;
        left: 0;
        padding: 0.8em 0.8em 0.8em 0.5em;
        margin-left: 0.5em;
        pointer-events: none;
        transition: all 0.3s ease;
        color: rgb(10, 88, 202);
    }

    .inputGroup label i {
        margin: 6px 8px
    }

    .inputGroup :is(input:focus, input:valid)~label {
        transform: translateY(-60%) scale(.9);
        margin: 0em;
        margin-left: 1.3em;
        padding: 0.4em;
        background-color: #fff;
    }

    .inputGroup :is(input:focus, input:valid) {
        border-color: rgb(10, 88, 202);
    }

    .group {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        align-items: center
    }

    .input-group-top {
        margin-top: 29px;
    }

    .textOR {
        width: 70px;
        text-align: center;
        border-bottom: 1px solid #000;
        line-height: 0.1em;
        margin: 0 20px;
    }

    .textOR span {
        background: #fff;
        padding: 0 10px;
    }

    .searchBar {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: center;
    }

    .mr-2 {
        margin-right: 20px;
    }
</style>
<div class="container">
    <div class="col-12 d-">
        <div class="card">
            <div class="card-body">
                <div class="align-items-center searchBar">

                    <div class="col-sm-12 col-lg-3 col-xl-2 mx-2">
                        <div class="input-group">
                            <div class="inputGroup w-100">
                                <input name="c_name" type="text" id="c_name" value="{{ isset($customer->c_name) ? $customer->c_name : '' }}" required="" autocomplete="off">
                                <label for="c_name"><i class="fa-solid fa-id-card"></i> รหัสบัตรประชาชน</label>
                            </div>
                        </div>
                    </div>
                    <div class="m-3">
                        <p class="textOR"><span>หรือ</span></p>
                    </div>
                    <div class="col-sm-12 col-lg-3 col-xl-2 mx-2">
                        <div class="input-group">
                            <div class="inputGroup w-100">
                                <input name="c_name" type="text" id="c_name" value="{{ isset($customer->c_name) ? $customer->c_name : '' }}" required="" autocomplete="off">
                                <label for="c_name"><i class="fa-solid fa-user"></i> ชื่อ </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-3 col-xl-2 mx-2">
                        <div class="input-group">
                            <div class="inputGroup w-100">
                                <input name="c_name" type="text" id="c_name" value="{{ isset($customer->c_name) ? $customer->c_name : '' }}" required="" autocomplete="off">
                                <label for="c_name"><i class="fa-solid fa-user"></i> นามสกุล </label>
                            </div>
                        </div>
                    </div>
                    <!-- <form method="GET" action="{{ url('/customer') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                            <span class="input-group-append">
                                <button class="btn btn-secondary" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form> -->
                    <div class="btn-group h-100" role="group" aria-label="Button group with nested dropdown">
                        <button type="button" class="btn btn-primary  h-100 m-0"><i class="fa-solid fa-magnifying-glass"></i> ค้นหา</button>
                        <button type="button" class="btn btn-danger  h-100 m-0"><i class="fa-solid fa-trash"></i> ล้าง</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .show-img-box {
        position: relative;
        width: 100%;
        height: 200px;
        border: 2px dashed #ccc;
        border-radius: 10px;
        /* text-align: center; */
        cursor: pointer;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center !important;
    }

    .show-img-box h1 {
        text-align: center;
    }

    .show-img-box:hover {
        background-color: #f5f5f5;
    }

    .file-preview {
        max-width: 100%;
        max-height: 100%;
        display: none;
        cursor: pointer;
        object-fit: contain;
    }

    .owl-prev {
        position: absolute;
        left: 0;
        top: 40%;
        width: 30px;
        height: 30px;
        background-color: rgb(17, 112, 204) !important;
        color: #fff !important;
        border-radius: 50% !important;
    }

    .owl-next {
        position: absolute;
        right: 0;
        top: 40%;
        width: 30px;
        height: 30px;
        background-color: rgb(17, 112, 204) !important;
        color: #fff !important;
        border-radius: 50% !important;
    }

    .owl-prev *,
    .owl-next * {
        font-size: 20px;
    }

    .infoImg {
        display: block;
        justify-content: start;
        padding: 5px;
        position: absolute;
        color: #2260ff;
        transition: all .15s ease-in-out;
        transform: translateY(200px);
        background-color: #fff;
        width: 95%;
        border-radius: 10px;
    }

    .show-img-box:hover .infoImg {
        color: #2260ff;
        transform: translateY(75px);
    }
</style>
@foreach($customer as $item)
<div class="container">
    <div class="main-body">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <div class="mt-3">
                                <h4>{{ $item->c_name }} {{ $item->c_surname }}</h4>
                                <p class="text-secondary mb-1">{{ substr_replace(substr_replace(substr_replace(substr_replace($item->c_idno, '-', 1, 0), '-', 6, 0), '-', 12, 0), '-', 15, 0) }}</p>
                                <p class="text-muted font-size-sm">{{ thaidate("lที่ j F Y" , strtotime($item->c_date)) }} <br> เวลา {{ thaidate("H:i" , strtotime($item->c_date)) }} น.</p>
                                <!-- <button class="btn btn-primary">Follow</button>
                                <button class="btn btn-outline-primary">Message</button> -->
                            </div>
                        </div>
                        <!-- <hr class="my-4">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe me-2 icon-inline">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <line x1="2" y1="12" x2="22" y2="12"></line>
                                        <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                                    </svg>Website</h6>
                                <span class="text-secondary">https://codervent.com</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github me-2 icon-inline">
                                        <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path>
                                    </svg>Github</h6>
                                <span class="text-secondary">codervent</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter me-2 icon-inline text-info">
                                        <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>
                                    </svg>Twitter</h6>
                                <span class="text-secondary">@codervent</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram me-2 icon-inline text-danger">
                                        <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                        <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                        <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                    </svg>Instagram</h6>
                                <span class="text-secondary">codervent</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook me-2 icon-inline text-primary">
                                        <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                                    </svg>Facebook</h6>
                                <span class="text-secondary">codervent</span>
                            </li>
                        </ul> -->
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">ลักษณะการกระทำความผิด</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                 {{ $item->demerit }}
                            </div>
                            <div class="col-sm-3 mt-4">
                                <h6 class="mb-0">รายละเอียด</h6>
                            </div>
                            <div class="col-sm-9 text-secondary mt-4">
                            {{ $item->demeritdetail }}
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="d-flex align-items-center mb-3">หลักฐานกระทำความผิด</h5>
                                <div class="owl-carousel owl-theme carouselSPhoto">

                                    <div class="item">
                                        <div class="show-img-box">
                                            <img class="file-preview" src="{{ url('storage')}}/{{ $item->c_pic_id_card }}" alt="ภาพตัวอย่าง">
                                            <div class="infoImg">
                                                <span class="m-0">ภาพบัตรประชาชน</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="show-img-box">
                                            <img class="file-preview" src="{{ url('storage')}}/{{ $item->c_pic_lease }}" alt="ภาพตัวอย่าง">
                                            <div class="infoImg">
                                                <span class="m-0">ใบบังคับคดี</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="show-img-box">
                                            <img class="file-preview" src="{{ url('storage')}}/{{ $item->c_pic_execution }}" alt="ภาพตัวอย่าง">
                                            <div class="infoImg">
                                                <span class="m-0">สัญญาเช่า</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="show-img-box">
                                            <img class="file-preview" src="{{ url('storage')}}/{{ $item->c_pic_cap }}" alt="ภาพตัวอย่าง">
                                            <div class="infoImg">
                                                <span class="m-0">หลักฐานการพูด-คุย</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="show-img-box">
                                            <img class="file-preview" src="{{ url('storage')}}/{{ $item->c_pic_other }}" alt="ภาพตัวอย่าง">
                                            <div class="infoImg">
                                                <span class="m-0">อื่นๆ</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
<!-- <div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-body"> -->

                    <!-- <a href="{{ url('/customer/create') }}" class="btn btn-success btn-sm" title="Add New Customer">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add New
                    </a> -->
                    <!-- <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User Id</th>
                                    <th>Rentname</th>
                                    <th>Compname</th>
                                    <th>C Name</th>
                                    <th>C Surname</th>
                                    <th>C Idno</th>
                                    <th>Demerit</th>
                                    <th>Demeritdetail</th>
                                    <th>C Pic Id Card</th>
                                    <th>C Pic Lease</th>
                                    <th>C Pic Execution</th>
                                    <th>C Pic Cap</th>
                                    <th>C Pic Other</th>
                                    <th>C Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($customer as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->user_id }}</td>
                                    <td>{{ $item->rentname }}</td>
                                    <td>{{ $item->compname }}</td>
                                    <td>{{ $item->c_name }}</td>
                                    <td>{{ $item->c_surname }}</td>
                                    <td>{{ $item->c_idno }}</td>
                                    <td>{{ $item->demerit }}</td>
                                    <td>{{ $item->demeritdetail }}</td>
                                    <td>{{ $item->c_pic_id_card }}</td>
                                    <td>{{ $item->c_pic_lease }}</td>
                                    <td>{{ $item->c_pic_execution }}</td>
                                    <td>{{ $item->c_pic_cap }}</td>
                                    <td>{{ $item->c_pic_other }}</td>
                                    <td>{{ $item->c_date }}</td>
                                    <td>
                                        <a href="{{ url('/customer/' . $item->id) }}" title="View Customer"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                        <a href="{{ url('/customer/' . $item->id . '/edit') }}" title="Edit Customer"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                        <form method="POST" action="{{ url('/customer' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Customer" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper"> {!! $customer->appends(['search' => Request::get('search')])->render() !!} </div>
                    </div> -->

                <!-- </div>
            </div>
        </div>
    </div>
</div> -->
<script>
    $(function() {
        // Owl Carousel
        var owl = $(".carouselSPhoto");
        owl.owlCarousel({
            margin: 10,
            loop: false,
            nav: true,
            // autoWidth: true,
            // items: 4,
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                900: {
                    items: 2
                },
                1000: {
                    items: 3
                },
                2000: {
                    items: 4
                }
            }
        });
    });
</script>
@endsection