@extends('layouts.theme')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" />
<script src="https://cdn.jsdelivr.net/gh/mcstudios/glightbox/dist/js/glightbox.min.js"></script>
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
        max-width: 90%;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    }

    .inputGroup label i {
        margin: 6px 8px
    }

    .inputGroup :is(input:focus, input:valid)~label {
        transform: translateY(-80%) scale(.9);
        margin: 0em;
        margin-left: 1.3em;
        padding: 0.1em;
        background-color: #fff;
        max-width: 90%;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
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

    @media (max-width: 320px) {

        /* สำหรับอุปกรณ์เคลื่อนที่ที่มีความกว้างไม่เกิน 320px */
        .breadcrumb-title {
            width: 100%;
            border-right: none;
            margin: 10px 0 !important;
            padding: 0 !important;
            text-align: center;
        }

        .inputGroup {
            margin: 10px 0 !important;
        }

        .btnGroupSearch {
            float: left;
        }

        .btn-group {
            width: 100%;
            display: flex;
            justify-content: end;
        }
    }


    @media (min-width: 321px) and (max-width: 480px) {

        /* สำหรับอุปกรณ์เคลื่อนที่ที่มีความกว้างระหว่าง 321px ถึง 480px */
        .breadcrumb-title {
            width: 100%;
            border-right: none;
            margin: 10px 0 !important;
            padding: 0 !important;
            text-align: center;
        }

        .inputGroup {
            margin: 10px 0 !important;
        }

        .btnGroupSearch {
            float: left;
        }

        .btn-group {
            width: 100%;
            display: flex;
            justify-content: end;
        }
    }

    @media (min-width: 481px) and (max-width: 768px) {

        /* สำหรับแท็บเล็ตและอุปกรณ์เคลื่อนที่ที่มีความกว้างระหว่าง 481px ถึง 768px */
        .breadcrumb-title {
            border-right: none;
            margin: 10px 0 !important;
            padding: 0 !important;
        }

        .inputGroup {
            margin: 10px 0 !important;
        }

        .btnGroupSearch {
            float: left;
        }

        .searchBar .divInputSearch:nth-child(2) {
            flex: 0 0 auto !important;
            width: 100% !important;
            padding: 0 5px;
        }

        .searchBar div:nth-child(3) {
            flex: 0 0 auto !important;
            width: 100% !important;
            display: flex;
            justify-content: center;
        }

        .searchBar .divInputSearch:nth-child(4) {
            flex: 0 0 auto;
            width: 49%;
            margin: 0 !important;
            padding-right: 5px;
        }

        .searchBar .divInputSearch:nth-child(5) {
            flex: 0 0 auto;
            width: 49%;
            margin: 0 !important;
            padding-left: 5px;
        }

        .btn-group {
            width: 100%;
            display: flex;
            justify-content: end;
        }
    }

    @media (min-width: 769px) and (max-width: 990px) {

        /* สำหรับหน้าจอเดสก์ท็อปที่มีความกว้างระหว่าง 769px ถึง 1024px */
        .breadcrumb-title {
            border-right: none;
            margin: 10px 0 !important;
            padding: 0 !important;
        }

        .inputGroup {
            margin: 10px 0 !important;
        }

        .btnGroupSearch {
            float: left;
        }

        .searchBar .divInputSearch:nth-child(2) {
            flex: 0 0 auto !important;
            width: 100% !important;
            padding: 0 5px;
        }

        .searchBar div:nth-child(3) {
            flex: 0 0 auto !important;
            width: 100% !important;
            display: flex;
            justify-content: center;
        }

        .searchBar .divInputSearch:nth-child(4) {
            flex: 0 0 auto;
            width: 49%;
            margin: 0 !important;
            padding-right: 5px;
        }

        .searchBar .divInputSearch:nth-child(5) {
            flex: 0 0 auto;
            width: 49%;
            margin: 0 !important;
            padding-left: 5px;
        }

        .btn-group {
            width: 100%;
            display: flex;
            justify-content: end;
        }
    }

    @media (min-width: 991px) and (max-width: 1440px) {

        /* สำหรับหน้าจอเดสก์ท็อปที่มีความกว้างมากกว่าหรือเท่ากับ 1025px */
        .breadcrumb-title {
            width: 100%;
            border-right: none;
            margin: 10px 0 !important;
            padding: 0 !important;
            text-align: center;
        }

        .inputGroup {
            margin: 10px 0 !important;
        }


        .searchBar .divInputSearch:nth-child(2) {
            flex: 0 0 auto !important;
            width: 100% !important;
            padding: 0 5px;
        }

        .searchBar div:nth-child(3) {
            flex: 0 0 auto !important;
            width: 100% !important;
            display: flex;
            justify-content: center;
        }

        .searchBar .divInputSearch:nth-child(4) {
            flex: 0 0 auto;
            width: 49%;
            margin: 0 !important;
            padding-right: 5px;
        }

        .searchBar .divInputSearch:nth-child(5) {
            flex: 0 0 auto;
            width: 49%;
            margin: 0 !important;
            padding-left: 5px;
        }

        .btnGroupSearch {
            float: left;
        }

        .btn-group {
            width: 100%;
            display: flex;
            justify-content: end;
        }
    }

    @media (min-width: 1441px) and (max-width: 1593px){
        /* สำหรับหน้าจอเดสก์ท็อปที่มีความกว้างมากกว่าหรือเท่ากับ 1025px */
        .btn-group {
            margin-top: 15px;
            width: 100%;
            display: flex;
            justify-content: end;
        }
    }

    .social-logo {
        display: inline-block;
        width: 24px;
        height: 24px;
        transition: background-image .2s;
    }

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

    .show-img-box a img {
        object-fit: contain;
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
<div class="container">
    <div class="col-12 d-">
        <div class="card">
            <div class="card-body">
                <form method="GET" action="{{ url('/driver') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                    <div class="align-items-center searchBar">
                        <div class="breadcrumb-title pe-3" style="margin-right:50px ;">
                            <div class="w-100 d-flex justify-content-center">
                                <div>
                                    ข้อมูล Blacklist
                                    <br>
                                    พนักงานขับรถ
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-3 col-xl-2 mx-2 divInputSearch">
                            <div class="input-group">
                                <div class="inputGroup w-100">
                                    <input name="d_idno" id="d_idno" type="number" value="{{ request('d_idno') }}" autocomplete="off" oninput="clearInputName()">
                                    <label for="d_idno"><i class="fa-solid fa-id-card"></i> หมายเลขบัตรประชาชน</label>
                                </div>
                            </div>
                        </div>
                        <div class="m-3">
                            <p class="textOR"><span>หรือ</span></p>
                        </div>
                        <div class="col-sm-12 col-lg-3 col-xl-2 mx-2  divInputSearch">
                            <div class="input-group">
                                <div class="inputGroup w-100">
                                    <input name="d_name" id="d_name" type="text" value="{{ request('d_name') }}" autocomplete="off" oninput="clearInputID()">
                                    <label for="d_name"><i class="fa-solid fa-user"></i> ชื่อ </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-3 col-xl-2 mx-2  divInputSearch">
                            <div class="input-group">
                                <div class="inputGroup w-100">
                                    <input name="d_surname" id="d_surname" type="text" value="{{ request('d_surname') }}" autocomplete="off" oninput="clearInputID()">
                                    <label for="d_surname"><i class="fa-solid fa-buildings"></i> นามสกุล </label>
                                </div>
                            </div>
                        </div>
                        <div class="btn-group btnGroupSearch h-100" role="group" aria-label="Button group with nested dropdown">
                            <div>
                                <button type="submit" class="btn btn-primary  h-100 m-0"><i class="fa-solid fa-magnifying-glass"></i> ค้นหา</button>
                                <a href="{{ url('/driver') }}" type="submit" class="btn btn-danger  h-100 m-0"><i class="fa-solid fa-trash"></i> ล้าง</a>
                            </div>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>
@if(!empty($driver))
    <div class="container">
        <div class="main-body">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <div class="mt-3">
                                    <h4>{{ $driver->d_name }} {{ $driver->d_surname }} </h4>
                                    <p class="text-secondary mb-1">{{ substr_replace(substr_replace(substr_replace(substr_replace($driver->d_idno, '-', 1, 0), '-', 6, 0), '-', 12, 0), '-', 15, 0) }}</p>
                                    <p class="text-muted font-size-sm">{{ thaidate("lที่ j F Y" , strtotime($driver->d_date)) }}</p>
                                    <!-- <button class="btn btn-primary">Follow</button>
                                            <button class="btn btn-outline-primary">Message</button> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <style>
                .text-warning-header{
                    color: #a17a06;
                }
               
            </style>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">ลักษณะการกระทำความผิด</h6>
                                </div>
                                <div class="col-sm-9 text-secondary" style="border-radius: 50px">
                                @php
                                    $demerit = $driver->demerit;
                                    $demeritArray = explode(',', $demerit);

                                    $groups = [
                                        'หมวดทุจริต' => ['1.ปลอมแปลงเอกสารใบลงเวลา/บิลน้ำมัน', '2.ลักทรัพย์นายจ้าง' ,'3.ยักยอกรถยนต์หรือทรัพย์สิน' ,'4.ทำร้ายร่างกาย' ,'5.ความผิดคดีอาญาหรือทุจริตอื่นๆ'],
                                        'หมวดวินัย' => ['7.ทิ้งงาน', '8.ทะเลาะวิวาท', '9.ยืมเงินลูกค้า', '10.ไม่เก็บรักษาความลับ', '11.ปิดมือถือติดต่อไม่ได้', '12.โกหกบ่อยครั้ง', '13.ฟ้องร้องนายจ้างหรือร้องตรวจแรงงานที่เป็นเท็จ'],
                                        'หมวดบัญชีดำ' => ['15.ขับรถอันตราย', '16.มาสาย', '17.สตาร์ทรถรอลูกค้า', '18.ทัศนคติ/การบริการไม่ดี', '19.ไม่รู้เส้นทาง', '20.ขัดคำสั่งลูกค้า/นายจ้าง', '21.แต่งกาย/พูดจา ไม่สุภาพ'] ,
                                        'อื่นๆ' => ['เมาสุรา', 'ลักลอบนำรถยนต์ไปใช้ส่วนตัว' , 'เสพสารเสพติด'] ,
                                        ]
                                    ];
                                @endphp

                                @foreach ($groups as $groupName => $groupMembers)
                                    @php
                                        $filteredMembers = array_filter($groupMembers, function ($member) use ($demeritArray) {
                                        return in_array($member, $demeritArray);
                                        });
                                    @endphp

                                    @if (count($filteredMembers) > 0)
                                        @php
                                            $groupColorClass = '';
                                            switch ($groupName) {
                                                case 'หมวดทุจริต':
                                                    $groupColorClass = 'text-danger mb-1';
                                                break;
                                                case 'หมวดบัญชีดำ':
                                                    $groupColorClass = 'text-warning-header mb-1';
                                                break;
                                                case 'หมวดวินัย':
                                                    $groupColorClass = 'text-success mb-1';
                                                break;
                                                case 'อื่นๆ':
                                                    $groupColorClass = 'text-dark mb-1';
                                                break;
                                            }
                                        @endphp
                                        <div class="d-block p-2 pt-0 {{ $groupColorClass }}">
                                            <b>{{ $groupName }} </b>
                                            @foreach ($filteredMembers as $index => $member)
                                            <span>{{ $member }}{{ $loop->last ? '' : ' ,' }}</span>
                                            @endforeach
                                        </div>
                                    @endif
                                @endforeach
                                </div>
                                @if(!empty($driver->demeritdetail))
                                    <div class="col-sm-3 mt-4">
                                        <h6 class="mb-0">รายละเอียด</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary mt-4">
                                        {{ $driver->demeritdetail }}
                                    </div>
                                @endif
                            </div>

                        </div>
                    </div>
                    @if(!empty($driver->d_pic_id_card) || !empty($driver->d_pic_indictment)  || !empty($driver->d_pic_cap) || !empty($driver->d_pic_other))
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="d-flex align-items-center mb-3">หลักฐานการกระทำความผิด</h5>
                                    <div class="owl-carousel owl-theme carouselSPhoto">
                                        @if(!empty($driver->d_pic_id_card))
                                        <div class="item">
                                            <a class="glightbox show-img-box" data-type="image" href="{{ url('storage')}}/{{ $driver->d_pic_id_card }}" alt="ภาพบัตรประชาชน">
                                                <img class="file-preview" src="{{ url('storage')}}/{{ $driver->d_pic_id_card }}" alt="ภาพบัตรประชาชน">
                                                <div class="infoImg">
                                                    <span class="m-0">ภาพบัตรประชาชน</span>
                                                </div>
                                            </a>
                                        </div>
                                        @endif
                                        
                                        @if(!empty($driver->d_pic_indictment))
                                        <div class="item">
                                            <a class="glightbox show-img-box" data-type="image" href="{{ url('storage')}}/{{ $driver->d_pic_indictment }}" alt="ภาพใบบังคับคดี">
                                                <img class="file-preview" src="{{ url('storage')}}/{{ $driver->d_pic_indictment }}" alt="ใบบังคับคดี">
                                                <div class="infoImg">
                                                    <span class="m-0">คำฟ้องหรือใบร้องทุกข์แจ้งความดำเนินดคี</span>
                                                </div>
                                            </a>
                                        </div>
                                        @endif
                                        @if(!empty($driver->d_pic_cap))
                                        <div class="item">
                                            <a class="glightbox show-img-box" data-type="image" href="{{ url('storage')}}/{{ $driver->d_pic_cap }}" alt="ภาพหลักฐานการพูด-คุย">
                                                <img class="file-preview" src="{{ url('storage')}}/{{ $driver->d_pic_cap }}" alt="ภาพหลักฐานการพูด-คุย">
                                                <div class="infoImg">
                                                    <span class="m-0">หลักฐานการพูด-คุย</span>
                                                </div>
                                            </a>
                                        </div>
                                        @endif
                                        @if(!empty($driver->d_pic_other))
                                        <div class="item">
                                            @php
                                                // ข้อความที่ต้องการตรวจสอบ
                                                $text = $driver->d_pic_other;

                                                // คำที่ต้องการตรวจสอบ
                                                $keyword = "uploads";
                                                $check_uploads = "";

                                                // ตรวจสอบว่าคำที่ต้องการอยู่ในข้อความหรือไม่
                                                if (strpos($text, $keyword) !== false) {
                                                    $check_uploads =  "Yes";
                                                } else {
                                                    $check_uploads =  "No";
                                                }
                                            @endphp

                                            @if($check_uploads == "Yes")
                                            <a class="glightbox show-img-box" data-type="image" href="{{ url('storage')}}/{{ $driver->d_pic_other }}" alt="ภาพอื่นๆ">
                                                <img class="file-preview" src="{{ url('storage')}}/{{ $driver->d_pic_other }}" alt="ภาพอื่นๆ">
                                                <div class="infoImg">
                                                    <span class="m-0">อื่นๆ</span>
                                                </div>
                                            </a>
                                            @else
                                                <a class="glightbox show-img-box" data-type="image" href="{{ url('/img/picture_old')}}/{{ $driver->d_pic_other }}" alt="ภาพอื่นๆ">
                                                <img class="file-preview" src="{{ url('/img/picture_old')}}/{{ $driver->d_pic_other }}" alt="ภาพอื่นๆ">
                                                <div class="infoImg">
                                                    <span class="m-0">อื่นๆ</span>
                                                </div>
                                            </a>
                                            @endif
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@else
    @php
        $text_show = '';
        $class_show = 'd-none';

        $full_url = url()->full();
        $query_params = request()->query();

        if (!empty($query_params['d_idno'])) {
            $d_idno = urldecode($query_params['d_idno']);
            $text_show = $d_idno;
            $class_show = '';
        } elseif (!empty($query_params['d_name']) || !empty($query_params['d_surname'])) {
            $d_name = urldecode($query_params['d_name']);
            $d_surname = urldecode($query_params['d_surname']);
            $text_show = $d_name . ' ' . $d_surname;
            $class_show = '';
        }
    @endphp




    <div class="text-center {{ $class_show }}" style="margin-top: 8vh;">
        <img src="{{asset('img/icon/no-results.png')}}" alt="User" class="" width="310">
        <h2 class=" mt-5">ไม่พบข้อมูลที่คุณค้นหา <span class="text-danger">"{{ $text_show }}"</span> </h2>
        <h5 class="mt-3">กรุณาปรับการค้นหาและตรวจสอบอีกครั้ง</h5>
    </div>
@endif

<script>
    function clearInputID() {
        document.getElementById("d_idno").value = "";
    }

    function clearInputName() {
        document.getElementById("d_surname").value = "";
        document.getElementById("d_name").value = "";
    }

    function clearInput() {
        document.getElementById("d_idno").value = "";
        document.getElementById("d_surname").value = "";
        document.getElementById("d_name").value = "";
    }


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

<script>
    /* glightbox
     */
    var glightbox = GLightbox({
        loop: true,
        selector: ".glightbox",
        openEffect: "zoom",
        closeEffect: "fade",
        startAt: 0,
        closeOnOutsideClick: false,
        zoomable: true,
        height: "auto",
        width: "100vw",
        height: "100vh"
    });

    feather.replace();
</script>


<!-- <div class="container">
    <div class="row">

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

                    <br />
                    <br />
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User Id</th>
                                    <th>Compname</th>
                                    <th>Commercial Registration</th>
                                    <th>D Name</th>
                                    <th>D Surname</th>
                                    <th>D Idno</th>
                                    <th>Demerit</th>
                                    <th>Demeritdetail</th>
                                    <th>D Pic Id Card</th>
                                    <th>D Pic Lease</th>
                                    <th>D Pic Cap</th>
                                    <th>D Pic Other</th>
                                    <th>D Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection