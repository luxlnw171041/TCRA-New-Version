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
    }.gslide-media.gslide-image img{
		min-height: 100vh;
		width: auto;
		object-fit: contain;
	}ul.img-glightbox {
	display: flex;
	flex-wrap: wrap;
}
.goverlay {
	background-color: rgba(0,0,0,0.3);
}
.glightbox {
	padding-left: 0;
	margin-top:0;
	margin-bottom: 0;
	padding: 0 5px;
	flex-basis: calc(100% / 5 - 10px);
}
.gcounter {
	padding: .5rem;
}
.gcounter::after {
	content: attr(data-indicator);
	position: absolute;
	top: .5rem;
	left: .5rem;
	color: white;
	padding: 10px;
	z-index: 10000000;
	background-color: rgba(0,0,0,0.3);
	border-radius: 50px;
}
.glightbox-closing .gcounter {
	opacity:0;
}
</style>
<div class="container">
    <div class="col-12 d-">

        <div class="card">
            <div class="card-body">
                <form method="GET" action="{{ url('/driver') }}" accept-charset="UTF-8" class="form-inline" role="search">
                    <div class="row">

                        <div class="col-12 col-md-3" style="display: flex;align-items: center;font-size: 18px;">
                            <div class="w-100 d-flex justify-content-center">
                                <div>
                                    ข้อมูล Blacklist
                                    <br>
                                    พนักงานขับรถ
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-9">
                            <div class="row">

                                <!-- เลือกสัญชาติ -->
                                <div class="col-12 my-2">
                                    <button id="btn_input_data_thai" type="button" class="btn btn-sm btn-info" style="width:120px;" onclick="change_input_data('thai');">
                                        <img src="{{asset('img/icon/thailand.png')}}" style="width:20px;"> ไทย
                                    </button>
                                    <button id="btn_input_data_other" type="button" class="btn btn-sm btn-secondary" style="width:120px;" onclick="change_input_data('other');">
                                        <img src="{{asset('img/icon/flags.png')}}" style="width:20px;"> ต่างชาติ
                                    </button>
                                    <br><br>
                                </div>
                                <!-- ไทย -->
                                <div class="row col-12 col-md-12">
                                    <div input_for="input_data_thailand" class="col-12 col-md-4">
                                        <div class="input-group">
                                            <span id="warning_d_idno" class="text-danger d-none" style="position:absolute;bottom:-25px;font-size: 13px;">
                                                <i class="fa-solid fa-triangle-exclamation fa-beat"></i>
                                                หมายเลขบัตรประชาชนไม่ถูกต้อง
                                            </span>
                                            <span id="success_d_idno" class="text-success d-none" style="position:absolute;bottom:-25px;font-size: 12px;">
                                                <i class="fa-solid fa-shield-check"></i>
                                                หมายเลขบัตรประชาชนครบถ้วนแล้ว
                                            </span>
                                            <div class="inputGroup w-100">
                                                <input name="d_idno" id="d_idno" type="text" value="{{ request('d_idno') }}" autocomplete="off" oninput="clearInputName()">
                                                <label for="d_idno"><i class="fa-solid fa-id-card"></i> หมายเลขบัตรประชาชน</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div input_for="input_data_thailand" class="col-12 col-md-2" style="display: flex;align-items: center;">
                                        <p class="textOR"><span>หรือ</span></p>
                                    </div>
                                    <div input_for="input_data_thailand" class="col-12 col-md-3">
                                        <div class="input-group">
                                            <div class="inputGroup w-100">
                                                <input name="d_name" id="d_name" type="text" value="{{ request('d_name') }}" autocomplete="off" oninput="clearInputID()">
                                                <label for="d_name"><i class="fa-solid fa-user"></i> ชื่อ </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div input_for="input_data_thailand" class="col-12 col-md-3">
                                        <div class="input-group">
                                            <div class="inputGroup w-100">
                                                <input name="d_surname" id="d_surname" type="text" value="{{ request('d_surname') }}" autocomplete="off" oninput="clearInputID()">
                                                <label for="d_surname"><i class="fa-solid fa-buildings"></i> นามสกุล </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- ต่างชาติ -->
                                <div class="row col-12 col-md-12">
                                    <div input_for="input_data_other_nationalitie" class="col-12 col-md-4 d-none">
                                        <div class="input-group">
                                            <div class="inputGroup w-100">
                                                <input name="d_idno_other_nationalitie" id="d_idno_other_nationalitie" type="text" value="{{ request('d_idno_other_nationalitie') }}" autocomplete="off" oninput="clearInputName_nationalitie()">
                                                <label for="d_idno_other_nationalitie"><i class="fa-solid fa-id-card"></i>หมายเลขพาสปอร์ต (Passport)</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div input_for="input_data_other_nationalitie" class="col-12 col-md-2 d-none"  style="display: flex;align-items: center;">
                                        <p class="textOR"><span>หรือ</span></p>
                                    </div>
                                    <div input_for="input_data_other_nationalitie" class="col-12 col-md-3 d-none">
                                        <div class="input-group">
                                            <div class="inputGroup w-100">
                                                <input name="d_name_other_nationalitie" id="d_name_other_nationalitie" type="text" value="{{ request('d_name_other_nationalitie') }}" autocomplete="off" oninput="clearInputID_nationalitie()">
                                                <label for="d_name_other_nationalitie"><i class="fa-solid fa-user"></i> ชื่อหน้า </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div input_for="input_data_other_nationalitie" class="col-12 col-md-3 d-none">
                                        <div class="input-group">
                                            <div class="inputGroup w-100">
                                                <input name="d_surname_other_nationalitie" id="d_surname_other_nationalitie" type="text" value="{{ request('d_surname_other_nationalitie') }}" autocomplete="off" oninput="clearInputID_nationalitie()">
                                                <label for="d_surname_other_nationalitie"><i class="fa-solid fa-user"></i> ชื่อหลัง </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-md-12 mt-3">
                                    <div class="btn-group btnGroupSearch float-end" role="group" aria-label="Button group with nested dropdown">
                                        <div>
                                            <button type="submit" class="btn btn-primary  h-100 m-0"><i class="fa-solid fa-magnifying-glass"></i> ค้นหา</button>
                                            <a href="{{ url('/driver') }}" type="submit" class="btn btn-danger  h-100 m-0"><i class="fa-solid fa-trash"></i> ล้าง</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@if(!empty($driver))
    <div class="container">
        <div class="main-body">
            <div class="row">
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <div class="mt-3">
                                    @if( !empty($driver->d_name) )
                                        <h4>{{ $driver->d_name }} {{ $driver->d_surname }}</h4>
                                        <p class="text-secondary mb-1">{{ substr_replace(substr_replace(substr_replace(substr_replace($driver->d_idno, '-', 1, 0), '-', 6, 0), '-', 12, 0), '-', 15, 0) }}</p>
                                    @elseif(!empty($driver->d_name_other_nationalitie) )
                                        <h4>
                                            {{ $driver->d_name_other_nationalitie }} {{ $driver->d_surname_other_nationalitie }}
                                            <br>
                                            <span class="text-info" style="font-size:14px;">(ต่างชาติ)</span>
                                        </h4>
                                        <p class="text-secondary mb-1">{{ $driver->d_idno_other_nationalitie }}</p>
                                    @endif
                                    <p class="text-muted font-size-sm">{{ thaidate("lที่ j F Y" , strtotime($driver->d_date)) }}</p>
                                    <!-- <button class="btn btn-primary">Follow</button>
                                            <button class="btn btn-outline-primary">Message</button> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    @if(Auth::user()->member_role == "admin")
                    <div class="card" style="border: 1px solid red;border-radius: 10px;">
                        <div class="card-body">
                            <div class="card radius-10 bg-danger bg-gradient">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <p class="mb-0 text-white">* เห็นเฉพาะแอดมิน TCRA</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="m-2 d-flex justify-content-between align-items-center flex-wrap">
                                    <span class="text-secondary mt-2">
                                        <b class="text-dark" style="font-size:22px;">ผู้ลงข้อมูล</b>
                                    </span>
                                </li>
                                <hr>
                                <li class="m-2 d-flex justify-content-between align-items-center flex-wrap">
                                    <span class="text-secondary">
                                        <b class="text-danger" style="font-size:18px;">บริษัท</b>
                                        <br>
                                        {{ $driver->user->member_co }}
                                    </span>
                                </li>
                                <li class="m-2 d-flex justify-content-between align-items-center flex-wrap">
                                    <span class="text-secondary">
                                        <b class="text-danger" style="font-size:18px;">เบอร์ติดต่อ</b>
                                        <br>
                                        {{ $driver->user->member_tel }}
                                    </span>
                                </li>
                                <li class="m-2 d-flex justify-content-between align-items-center flex-wrap">
                                    <span class="text-secondary">
                                        <b class="text-danger" style="font-size:18px;">เลขที่สมาชิก</b>
                                        <br>
                                        {{ $driver->user->no_member }}
                                    </span>
                                </li>
                                <li class="m-2 d-flex justify-content-between align-items-center flex-wrap">
                                    <div class="row">
                                        <div class="col-12">
                                            <b class="text-danger" style="font-size:18px;">หมวดหมู่สมาชิก / สถานะ</b>
                                        </div>
                                        <div class="col-6 text-center mt-2">
                                            <!-- บทบาทของสมาชิก -->
                                            @if($driver->user->member_role == "admin")
                                                <span class="btn bg-light-info text-info" style="font-size:12px;">
                                                    Admin
                                                </span>
                                            @elseif($driver->user->member_role == "member")
                                                <span class="btn bg-light-success text-success" style="font-size:12px;">
                                                    member
                                                </span>
                                            @elseif($driver->user->member_role == "customer")
                                                <span class="btn bg-light-danger text-danger" style="font-size:12px;">
                                                    customer
                                                </span>
                                            @else
                                                <span class="btn bg-light-warning text-warning" style="font-size:12px;">
                                                    driver
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col-6 text-center mt-2">
                                            <!-- สถานะของสมาชิก -->
                                            @if($driver->user->member_status == "Active")
                                                <span  class="btn bg-light-success text-success" style="font-size:12px;">
                                                    Active
                                                </span>
                                            @else
                                                <span class="btn bg-light-danger text-danger" style="font-size:12px;">
                                                    Inactive
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    @endif
                </div>
                <style>
                .text-warning-header{
                    color: #a17a06;
                }
               
            </style>
                <div class="col-lg-9">
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
                                        'หมวดทุจริต' => ['1.ปลอมแปลงเอกสารใบลงเวลา/บิลน้ำมัน', '2.ลักทรัพย์นายจ้าง' ,'3.ยักยอกรถยนต์หรือทรัพย์สิน' ,'4.ทำร้ายร่างกาย' ,'5.ความผิดคดีอาญาหรือทุจริตอื่นๆ','6.อื่นๆ'],

                                        'หมวดวินัย' => ['7.ทิ้งงาน', '8.ทะเลาะวิวาท', '9.ยืมเงินลูกค้า', '10.ไม่เก็บรักษาความลับ', '11.ปิดมือถือติดต่อไม่ได้', '12.โกหกบ่อยครั้ง', '13.ฟ้องร้องนายจ้างหรือร้องตรวจแรงงานที่เป็นเท็จ','14.เมาสุรา/เสพสารเสพติด','15.อื่นๆ'],

                                        'หมวดบัญชีดำ' => ['16.ขับรถอันตราย', '17.มาสาย', '18.สตาร์ทรถรอลูกค้า', '19.ทัศนคติ/การบริการไม่ดี', '20.ไม่รู้เส้นทาง', '21.ขัดคำสั่งลูกค้า/นายจ้าง', '22.แต่งกาย/พูดจา ไม่สุภาพ','23.ลักลอบนำรถยนต์ไปใช้ส่วนตัว','24.อื่นๆ'] ,
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
                                                case 'หมวดวินัย':
                                                    $groupColorClass = 'text-warning-header mb-1';
                                                break;
                                                case 'หมวดบัญชีดำ':
                                                    $groupColorClass = 'text-success mb-1';
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

                            <hr>

                            @php
                                $check_active_menu_1 = '';
                                $check_active_show_data_1 = '';
                                $check_active_menu_2 = '';
                                $check_active_show_data_2 = '';
                                $check_active_menu_3 = '';
                                $check_active_show_data_3 = '';
                                $check_active_menu_4 = '';
                                $check_active_show_data_4 = '';
                                $check_active_menu_5 = '';
                                $check_active_show_data_5 = '';

                                if(!empty($driver->d_pic_id_card)){
                                    $check_active_menu_1 = 'active';
                                    $check_active_show_data_1 = 'show active';
                                }else if(!empty($driver->d_pic_company_certificate)){
                                    $check_active_menu_2 = 'active';
                                    $check_active_show_data_2 = 'show active';
                                }else if(!empty($driver->d_pic_indictment)){
                                    $check_active_menu_3 = 'active';
                                    $check_active_show_data_3 = 'show active';
                                }else if(!empty($driver->d_pic_cap)){
                                    $check_active_menu_4 = 'active';
                                    $check_active_show_data_4 = 'show active';
                                }else if(!empty($driver->d_pic_other)){
                                    $check_active_menu_5 = 'active';
                                    $check_active_show_data_5 = 'show active';
                                }
                            @endphp

                            @if(!empty($driver->d_pic_id_card) || !empty($driver->d_pic_company_certificate) || !empty($driver->d_pic_indictment) || !empty($driver->d_pic_cap) || !empty($driver->d_pic_other))
                            <div class="row">
                                <div class="col-12">
                                    <div class="">
                                        <h5 class="mb-3">หลักฐานการกระทำความผิด</h5>
                                    </div>
                                </div>
                                <div class="col-12 mt-3">
                                    <ul class="nav nav-tabs nav-primary" role="tablist">
                                        @if( !empty($driver->d_pic_id_card) )
                                        @php
                                            $d_pic_id_card_ex = explode(',', $driver->d_pic_id_card);
                                            $count_d_pic_id_card = count($d_pic_id_card_ex);
                                        @endphp
                                        <li class="nav-item" role="presentation" onclick="change_name_nav('d_pic_id_card');">
                                            <a class="nav-link {{ $check_active_menu_1 }}" data-bs-toggle="tab" href="#d_pic_id_card_{{ $driver->id }}" role="tab" aria-selected="true">
                                                <div class="d-flex align-items-center">
                                                    <span id="title_nav_d_pic_id_card" class="d-none">
                                                        สำเนาบัตร..({{ $count_d_pic_id_card }})
                                                    </span>
                                                    <div id="name_nav_d_pic_id_card" class="tab-title">
                                                        สำเนาบัตรประชาชน / PassPort ({{ $count_d_pic_id_card }})
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        @endif
                                        @if( !empty($driver->d_pic_indictment) )
                                        @php
                                            $d_pic_indictment_ex = explode(',', $driver->d_pic_indictment);
                                            $count_d_pic_indictment = count($d_pic_indictment_ex);
                                        @endphp
                                        <li class="nav-item" role="presentation" onclick="change_name_nav('d_pic_indictment');">
                                            <a class="nav-link {{ $check_active_menu_3 }}" data-bs-toggle="tab" href="#d_pic_indictment_{{ $driver->id }}" role="tab" aria-selected="false">
                                                <div class="d-flex align-items-center">
                                                    <span id="title_nav_d_pic_indictment" class="">
                                                        คำฟ้อง..({{ $count_d_pic_indictment }})
                                                    </span>
                                                    <div id="name_nav_d_pic_indictment" class="tab-title d-none">
                                                        คำฟ้องหรือใบร้องทุกข์แจ้งความดำเนินดคี ({{ $count_d_pic_indictment }})
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        @endif
                                        @if( !empty($driver->d_pic_cap) )
                                        @php
                                            $d_pic_cap_ex = explode(',', $driver->d_pic_cap);
                                            $count_d_pic_cap = count($d_pic_cap_ex);
                                        @endphp
                                        <li class="nav-item" role="presentation" onclick="change_name_nav('d_pic_cap');">
                                            <a class="nav-link {{ $check_active_menu_4 }}" data-bs-toggle="tab" href="#d_pic_cap_{{ $driver->id }}" role="tab" aria-selected="false">
                                                <div class="d-flex align-items-center">
                                                    <span id="title_nav_d_pic_cap" class="">
                                                        หลักฐาน..({{ $count_d_pic_cap }})
                                                    </span>
                                                    <div id="name_nav_d_pic_cap" class="tab-title d-none">
                                                        หลักฐานการพูด-คุย ({{ $count_d_pic_cap }})
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        @endif
                                        @if( !empty($driver->d_pic_other) )
                                        @php
                                            $d_pic_other_ex = explode(',', $driver->d_pic_other);
                                            $count_d_pic_other = count($d_pic_other_ex);
                                        @endphp
                                        <li class="nav-item" role="presentation" onclick="change_name_nav('d_pic_other');">
                                            <a class="nav-link {{ $check_active_menu_5 }}" data-bs-toggle="tab" href="#d_pic_other_{{ $driver->id }}" role="tab" aria-selected="false">
                                                <div class="d-flex align-items-center">
                                                    <span id="title_nav_d_pic_other" class="">
                                                        อื่นๆ ({{ $count_d_pic_other }})
                                                    </span>
                                                    <div id="name_nav_d_pic_other" class="tab-title d-none">
                                                        อื่นๆ ({{ $count_d_pic_other }})
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        @endif
                                    </ul>
                                    <div class="tab-content py-3">
                                        @if( !empty($driver->d_pic_id_card) )
                                        <div class="tab-pane fade {{ $check_active_show_data_1 }}" id="d_pic_id_card_{{ $driver->id }}" role="tabpanel">
                                            <div class="owl-carousel owl-theme carouselSPhoto">
                                                @foreach($d_pic_id_card_ex as $driver_1 => $value_1)
                                                    <div class="item">
                                                        <a class="glightbox show-img-box" data-type="image" href="{{ url('storage')}}/{{ $value_1 }}" alt="สำเนาบัตรประชาชน / PassPort" data-gallery="img_id_card-gallery_{{ $driver->id }}">
                                                            <img class="file-preview" src="{{ url('storage')}}/{{ $value_1 }}" alt="สำเนาบัตรประชาชน / PassPort">
                                                            <div class="infoImg">
                                                                <span class="m-0">สำเนาบัตรประชาชน / PassPort</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        @endif
                                        @if( !empty($driver->d_pic_indictment) )
                                        <div class="tab-pane fade {{ $check_active_show_data_3 }}" id="d_pic_indictment_{{ $driver->id }}" role="tabpanel">
                                            <div class="owl-carousel owl-theme carouselSPhoto">
                                                @foreach($d_pic_indictment_ex as $driver_3 => $value_3)
                                                    <div class="item">
                                                        <a class="glightbox show-img-box" data-type="image" href="{{ url('storage')}}/{{ $value_3 }}" alt="คำฟ้องหรือใบร้องทุกข์แจ้งความดำเนินดคี" data-gallery="img_indictment_gallery_{{ $driver->id }}">
                                                            <img class="file-preview" src="{{ url('storage')}}/{{ $value_3 }}" alt="คำฟ้องหรือใบร้องทุกข์แจ้งความดำเนินดคี">
                                                            <div class="infoImg">
                                                                <span class="m-0">คำฟ้องหรือใบร้องทุกข์แจ้งความดำเนินดคี</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        @endif
                                        @if( !empty($driver->d_pic_cap) )
                                        <div class="tab-pane fade {{ $check_active_show_data_4 }}" id="d_pic_cap_{{ $driver->id }}" role="tabpanel">
                                            <div class="owl-carousel owl-theme carouselSPhoto">
                                                @foreach($d_pic_cap_ex as $driver_4 => $value_4)
                                                <div class="item">
                                                    <a class="glightbox show-img-box" data-type="image" href="{{ url('storage')}}/{{ $value_4 }}" alt="ภาพหลักฐานการพูด-คุย" data-gallery="img_cap-gallery_{{ $driver->id }}">
                                                        <img class="file-preview" src="{{ url('storage')}}/{{ $value_4 }}" alt="ภาพหลักฐานการพูด-คุย">
                                                        <div class="infoImg">
                                                            <span class="m-0">หลักฐานการพูด-คุย</span>
                                                        </div>
                                                    </a>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        @endif
                                        @if( !empty($driver->d_pic_other) )
                                        <div class="tab-pane fade {{ $check_active_show_data_5 }}" id="d_pic_other_{{ $driver->id }}" role="tabpanel">
                                            <div class="owl-carousel owl-theme carouselSPhoto">
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
                                                    @foreach($d_pic_other_ex as $driver_5 => $value_5)
                                                    <div class="item">
                                                        <a class="glightbox show-img-box" data-type="image" href="{{ url('storage')}}/{{ $value_5 }}" alt="ภาพอื่นๆ"  data-gallery="img_other_{{ $driver->id }}">
                                                            <img class="file-preview" src="{{ url('storage')}}/{{ $value_5 }}" alt="ภาพอื่นๆ">
                                                            <div class="infoImg">
                                                                <span class="m-0">อื่นๆ</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    @endforeach
                                                @else
                                                <div class="item">
                                                    <a class="glightbox show-img-box" data-type="image" href="{{ url('/img/picture_old')}}/{{ $driver->d_pic_other }}" alt="ภาพอื่นๆ" data-gallery="img_other_{{ $driver->id }}">
                                                        <img class="file-preview" src="{{ url('/img/picture_old')}}/{{ $driver->d_pic_other }}" alt="ภาพอื่นๆ">
                                                        <div class="infoImg">
                                                            <span class="m-0">อื่นๆ</span>
                                                        </div>
                                                    </a>
                                                </div>
                                                @endif
                                            
                                            </div>
                                        </div>
                                        @endif
                                    </div>

                                </div>
                            </div>
                            @endif

                        </div>
                    </div>

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
        elseif (!empty($query_params['d_name_other_nationalitie']) || !empty($query_params['d_surname_other_nationalitie'])) {
            $d_name_other_nationalitie = urldecode($query_params['d_name_other_nationalitie']);
            $d_surname_other_nationalitie = urldecode($query_params['d_surname_other_nationalitie']);
            $text_show = $d_name_other_nationalitie . ' ' . $d_surname_other_nationalitie;
            $class_show = '';
        }
        elseif (!empty($query_params['d_idno_other_nationalitie'])) {
            $d_idno_other_nationalitie = urldecode($query_params['d_idno_other_nationalitie']);
            $text_show = $d_idno_other_nationalitie ;
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
        document.querySelector('#success_d_idno').classList.add('d-none');
        document.querySelector('#warning_d_idno').classList.add('d-none');
    }

    function clearInputName() {
        document.getElementById("d_surname").value = "";
        document.getElementById("d_name").value = "";
    }

    function clearInput() {
        document.getElementById("d_idno").value = "";
        document.getElementById("d_surname").value = "";
        document.getElementById("d_name").value = "";

        document.getElementById('d_idno_other_nationalitie').value = ''
        document.getElementById('d_name_other_nationalitie').value = ''
        document.getElementById('d_surname_other_nationalitie').value = ''
        document.querySelector('#success_d_idno').classList.add('d-none');
        document.querySelector('#warning_d_idno').classList.add('d-none');
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

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css'><link rel="stylesheet" href="./style.css">
<script src='https://cdn.jsdelivr.net/gh/mcstudios/glightbox/dist/js/glightbox.min.js'></script><script  src="./script.js"></script>

<script>const nav = document.createElement('div');
nav.classList.add('gcounter');
nav.dataset.indicator = '/';

const slides = GLightbox({
	onOpen: () => slides.modal.appendChild(nav),
	afterSlideChange: function(prev, next) {
		nav.dataset.indicator = `${next.index + 1} / ${slides.elements.length}`;
		nav.classList.add('gcounter-added');
	}
});
</script>

<script>
    function change_name_nav(type){

        if(document.querySelector('#name_nav_d_pic_id_card')){
            document.querySelector('#name_nav_d_pic_id_card').classList.add('d-none');
        }
        if(document.querySelector('#name_nav_d_pic_indictment')){
            document.querySelector('#name_nav_d_pic_indictment').classList.add('d-none');
        }
        if(document.querySelector('#name_nav_d_pic_cap')){
            document.querySelector('#name_nav_d_pic_cap').classList.add('d-none');
        }
        if(document.querySelector('#name_nav_d_pic_other')){
            document.querySelector('#name_nav_d_pic_other').classList.add('d-none');
        }
        if(document.querySelector('#name_nav_d_pic_company_certificate')){
            document.querySelector('#name_nav_d_pic_company_certificate').classList.add('d-none');
        }
        // ----

        if(document.querySelector('#title_nav_d_pic_id_card')){
            document.querySelector('#title_nav_d_pic_id_card').classList.remove('d-none');
        }
        if(document.querySelector('#title_nav_d_pic_indictment')){
            document.querySelector('#title_nav_d_pic_indictment').classList.remove('d-none');
        }
        if(document.querySelector('#title_nav_d_pic_cap')){
            document.querySelector('#title_nav_d_pic_cap').classList.remove('d-none');
        }
        if(document.querySelector('#title_nav_d_pic_other')){
            document.querySelector('#title_nav_d_pic_other').classList.remove('d-none');
        }
        if(document.querySelector('#title_nav_d_pic_company_certificate')){
            document.querySelector('#title_nav_d_pic_company_certificate').classList.remove('d-none');
        }

        // เปิด text ที่ถูกเลือก
        if(document.querySelector('#name_nav_'+type)){
            document.querySelector('#name_nav_'+type).classList.remove('d-none');
        }
        if(document.querySelector('#title_nav_'+type)){
            document.querySelector('#title_nav_'+type).classList.add('d-none');
        }

    }
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let cIdnoInput = document.getElementById('d_idno');

        if(cIdnoInput){
            cIdnoInput.addEventListener('input', function() {
                document.querySelector('#warning_d_idno').classList.add('d-none');
                let inputValue = cIdnoInput.value;
                let formattedValue = formatCIDNO(inputValue);
                cIdnoInput.value = formattedValue;

                let check_input_13 = cIdnoInput.value.replaceAll('-','');
                    // console.log(check_input_13.length);
                if (check_input_13.length == 13) {
                    // console.log('ครบ 13');
                    document.querySelector('#success_d_idno').classList.remove('d-none');
                    document.querySelector('#warning_d_idno').classList.add('d-none');
                }else{
                    // console.log('ยังไม่ครบ 13 หรือเกิน');
                    document.querySelector('#warning_d_idno').classList.remove('d-none');
                    document.querySelector('#success_d_idno').classList.add('d-none');
                }
            });

            cIdnoInput.addEventListener('keydown', function(event) {
                if (event.key === 'Backspace') {
                    // ตรวจสอบถ้าผู้ใช้กดปุ่ม Backspace ให้ลบตัวอักษรหรือเครื่องหมาย "-"
                    let inputValue = cIdnoInput.value;
                    let caretPosition = cIdnoInput.selectionStart;

                    if (caretPosition > 0 && (inputValue[caretPosition - 1] === '-' || inputValue[caretPosition] === '-')) {
                        let newValue = inputValue.substring(0, caretPosition - 1) + inputValue.substring(caretPosition);
                        cIdnoInput.value = newValue;
                        cIdnoInput.setSelectionRange(caretPosition - 1, caretPosition - 1);
                    }
                }
            });
        }

        function formatCIDNO(input) {
            let formattedValue = '';
            let characterCount = 0;

            for (let i = 0; i < input.length; i++) {
                if (/[0-9]/.test(input[i])) {
                    characterCount++;
                    if (characterCount === 1) {
                        formattedValue += input[i] + '-';
                    } else if (characterCount === 5) {
                        formattedValue += input[i] + '-';
                    } else if (characterCount === 10) {
                        formattedValue += input[i] + '-';
                    } else if (characterCount === 12) {
                        formattedValue += input[i] + '-';
                    } else {
                        formattedValue += input[i];
                    }
                }
            }

            return formattedValue;
        }
    });

</script>

<script>
    var check_nationalitie = 'thai' ;
    function change_input_data(type){

        clearInput();
        if(type == 'thai'){

            check_nationalitie = 'thai' ;

            document.querySelector('#btn_input_data_thai').classList.remove('btn-secondary');
            document.querySelector('#btn_input_data_thai').classList.add('btn-info');

            document.querySelector('#btn_input_data_other').classList.remove('btn-info');
            document.querySelector('#btn_input_data_other').classList.add('btn-secondary');

            let input_for = document.querySelectorAll('[input_for="input_data_thailand"]');
                input_for.forEach(input_for => {
                    input_for.classList.remove('d-none');
                });

            let input_for_other = document.querySelectorAll('[input_for="input_data_other_nationalitie"]');
                input_for_other.forEach(input_for_other => {
                    input_for_other.classList.add('d-none');
                });

            document.querySelector('#d_idno_other_nationalitie').value = '';
            document.querySelector('#d_name_other_nationalitie').value = '';
            document.querySelector('#d_surname_other_nationalitie').value = '';

        }
        else{

            check_nationalitie = 'other' ;

            document.querySelector('#success_d_idno').classList.add('d-none');
            document.querySelector('#warning_d_idno').classList.add('d-none');

            document.querySelector('#btn_input_data_other').classList.add('btn-info');
            document.querySelector('#btn_input_data_other').classList.remove('btn-secondary');

            document.querySelector('#btn_input_data_thai').classList.remove('btn-info');
            document.querySelector('#btn_input_data_thai').classList.add('btn-secondary');

            let input_for = document.querySelectorAll('[input_for="input_data_thailand"]');
                input_for.forEach(input_for => {
                    input_for.classList.add('d-none');
                });

            let input_for_other = document.querySelectorAll('[input_for="input_data_other_nationalitie"]');
                input_for_other.forEach(input_for_other => {
                    input_for_other.classList.remove('d-none');
                });

            document.querySelector('#d_name').value = '';
            document.querySelector('#d_surname').value = '';
            document.querySelector('#d_idno').value = '';
        }
    }
</script>

<script>
    function clearInputName_nationalitie(){
        document.querySelector('#d_name_other_nationalitie').value = '';
        document.querySelector('#d_surname_other_nationalitie').value = '';
    }

    function clearInputID_nationalitie(){
        document.querySelector('#d_idno_other_nationalitie').value = '';
    }
</script>

@endsection