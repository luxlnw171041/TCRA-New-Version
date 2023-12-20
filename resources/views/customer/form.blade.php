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
        color: #e62e2e;
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
        transform: translateY(-60%) scale(.9);
        margin: 0em;
        margin-left: 1.3em;
        padding: 0.4em;
        background-color: #fff;
    }

    .inputGroup :is(input:focus, input:valid) {
        border-color: #e62e2e;
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

    .sticky {
        position: sticky;
        top: 60px;
    }

    input[type="date"].selectDate {
        transition: all .15s ease-in-out;
        display: block;
        position: relative;
        padding: .6rem 3.5rem .6rem 0.75rem;
        font-size: 1rem;
        font-family: monospace;
        border: 2px solid rgb(200, 200, 200);
        border-radius: 10px;
        background:
            white url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='20' height='22' viewBox='0 0 20 22'%3E%3Cg fill='none' fill-rule='evenodd' stroke='%23688EBB' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' transform='translate(1 1)'%3E%3Crect width='18' height='18' y='2' rx='2'/%3E%3Cpath d='M13 0L13 4M5 0L5 4M0 8L18 8'/%3E%3C/g%3E%3C/svg%3E") right 1rem center no-repeat;

        cursor: pointer;
    }

    input[type="date"]:focus.selectDate {
        outline: none;
        border-color: #e62e2e;
        box-shadow: 0 0 0 0.25rem rgb(230, 46, 46, 0.6);
    }

    .selectDate::-webkit-date-edit-month-field:hover,
    .selectDate::-webkit-date-edit-day-field:hover,
    .selectDate::-webkit-date-edit-year-field:hover {
        background: rgb(10, 88, 202, 0.1);
    }

    .selectDate::-webkit-date-edit-text {
        opacity: 0;
    }

    .selectDate::-webkit-clear-button,
    .selectDate::-webkit-inner-spin-button {
        display: none;
    }

    /* open select date picker */
    ::-webkit-calendar-picker-indicator {
        position: absolute;
        width: 13%;
        height: 100%;
        top: 6px;
        right: 10px;
        bottom: 0;
        opacity: 0;
        cursor: pointer;
        color: rgb(230, 46, 46);
        border: 2px solid rgb(200, 200, 200);
    }

    input[type="date"]:hover::-webkit-calendar-picker-indicator {
        opacity: 0.05;
    }

    input[type="date"]:hover::-webkit-calendar-picker-indicator:hover {
        opacity: 0.15;
    }

    .userID {
        position: absolute;
        top: 5px;
        right: 5px;
        padding: 1px 20px;
        background-color: #e62e2e;
        border-radius: 15px;
        color: #fff;
    }

    .headerCustomer {
        font-weight: bolder !important;
        font-size: 18px !important;
        color: #525f7f !important;
    }

    .subHeaderCustomer {
        font-weight: bolder !important;
        font-size: 16px !important;

    }

    .text-overflow {
        max-width: 92%;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .file-upload-box {
        position: relative;
/*        width: 80%;*/
        height: 200px;
        border: 2px dashed #ccc;
        border-radius: 10px;
/*        text-align: center; */
        cursor: pointer;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center !important;
        transition: all .15s ease-in-out;
    }

    .file-upload-box h1 {
        text-align: center;
    }

    .file-upload-box:hover {
        background-color: #f5f5f5;
    }

    .loader {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        display: none;
    }

    .loader .spinner {
        margin-bottom: 10px;
        width: 40px;
        height: 40px;
        border: 4px solid #f3f3f3;
        border-top: 4px solid #e62e2e;
        border-radius: 50%;
        animation: spin 2s linear infinite;
        /* เพิ่มคำสั่งต่อไปนี้เพื่อจัดให้สปินเป็นตรงกลาง */
        position: relative;
        top: 50%;
        left: 25%;
        transform: translate(-50%, -50%);
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    .file-preview {
        max-width: 100%;
        max-height: 100%;
/*        display: none;*/
        cursor: pointer;
        object-fit: contain;
    }

    .file-upload-box .upload-text {
        margin-top: 10px;
        font-size: 16px;
        color: #777;
    }

    .file-upload-box .upload-text h1 i {
        margin-top: 10px;
        font-size: 50px;
        color: #777;
    }

    input {
        caret-color: #ff4e33;
        caret-shape: 50px;
    }

    .infoImg {
        display: block;
        justify-content: start;
        padding: 5px;
        position: absolute;
        color: #e62e2e;
        transition: all .15s ease-in-out;
        transform: translateY(200px);
        background-color: #fff;
        width: 95%;
        border-radius: 10px;
    }

    .file-upload-box:hover .infoImg {
        color: #ff4e33;
        transform: translateY(60px);
    }

    .clear-button {
        position: absolute;
        top: 10px;
        right: 10px;
        background-color: #ff3f4d;
        border-radius: 50%;
        width: 30px;
        height: 30px;
        color: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
        transition: all .15s ease-in-out;
        font-size: 16px;
    }

    .clear-button:hover {
        background-color: #cc323d;
    }

    .clear-button:hover i {
        transform: scale(1.2);
    }

    .owl-prev {
        position: absolute;
        left: 0;
        top: 40%;
        width: 30px;
        height: 30px;
        background-color: rgb(230, 46, 46) !important;
        color: #fff !important;
        border-radius: 50% !important;
    }

    .owl-next {
        position: absolute;
        right: 0;
        top: 40%;
        width: 30px;
        height: 30px;
        background-color: rgb(230, 46, 46) !important;
        color: #fff !important;
        border-radius: 50% !important;
    }

    .owl-prev *,
    .owl-next * {
        font-size: 20px;
    }

    .infoImg .imgName {
        white-space: nowrap;
        width: 100%;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .col {
        flex: 3 0 0% !important;
    }
</style>

@php
    $type_create = '' ;

    if (isset($_GET['type_create'])) {
        $type_create = $_GET['type_create'];
    }
@endphp

<div class="d-none form-group {{ $errors->has('user_id') ? 'has-error' : '' }}">
    <label for="user_id" class="control-label">{{ 'User Id' }}</label>
    <input class="form-control" name="user_id" type="number" id="user_id" value="{{Auth::user()->id}}">
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="row">
    <div class="col-md-3">
        <div class="card sticky">
            <div class="card-body p-5">
                <span class="userID">
                    ID : {{Auth::user()->id}}
                </span>
                <div class="d-flex flex-column align-items-center text-center">
                    @if(!empty(Auth::user()->member_pic))
                    <img src="{{ url('storage')}}/{{ Auth::user()->member_pic }}" alt="User" class="rounded-circle profileImg p-1" width="110">
                    @else
                    <img src="{{asset('img/icon/user.jpg')}}" alt="User" class="rounded-circle p-1 bg-primary" width="110">
                    @endif
                    <div class="mt-3">
                        <h4>{{Auth::user()->name}}</h4>

                        <p class="text-secondary mb-1">{{Auth::user()->username}}</p>
                        <p class="text-muted font-size-sm">{{Auth::user()->member_co}}</p>
                        <a class="btn btn-outline-danger px-5 " href="{{ url('/user/' . Auth::user()->id . '/edit') }}">แก้ไข</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="card border-top border-0 border-4 border-danger">
            <div class="card-body p-5">
                <div class="row g-3">
                    <div id="create_type_person" class="row addDataperson">
                        <div class="card-title d-flex align-items-center ">
                            <div>
                                <img src="{{asset('img/icon/iconHeaderCustomerSlash.png')}}" alt="User" class="me-1" width="22.5">
                            </div>
                            <h5 class="mb-0 headerCustomer">เพิ่มข้อมูลมิจฉาชีพ(เช่ารถ) ในนามบุคคล</h5>
                        </div>
                        <div class="row g-3 mt-3">
                            <div class="col-md-4 mt-md-0 mb-4 ">
                                <div class="input-group addDataperson">
                                    <div class="inputGroup w-100">
                                        <input name="c_name" type="text" id="c_name" value="{{ isset($customer->c_name) ? $customer->c_name : '' }}" required="" autocomplete="off" >
                                        <label for="c_name"><i class="fa-solid fa-user"></i> ชื่อ <span class="text-danger">*</span></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mt-md-0 mb-4 ">
                                <div class="input-group  addDataperson">
                                    <div class="inputGroup w-100">
                                        <input name="c_surname" type="text" id="c_surname" value="{{ isset($customer->c_surname) ? $customer->c_surname : '' }}" required="" autocomplete="off" >
                                        <label for="c_surname"><i class="fa-solid fa-user"></i> นามสกุล <span class="text-danger">*</span></label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 mt-md-0 mb-4 " style="position:relative;">
                                <span id="warning_c_idno" class="text-danger d-none" style="position:absolute;bottom:-25px;font-size: 13px;">
                                    <i class="fa-solid fa-triangle-exclamation fa-beat"></i>
                                    หมายเลขบัตรประชาชนไม่ถูกต้อง
                                </span>
                                <span id="success_c_idno" class="text-success d-none" style="position:absolute;bottom:-25px;font-size: 13px;">
                                    <i class="fa-solid fa-shield-check"></i>
                                    หมายเลขบัตรประชาชนครบถ้วนแล้ว
                                </span>
                                <div class="input-group  addDataperson">
                                    <div class="inputGroup w-100">
                                        <input type="text" required="" autocomplete="off" name="c_idno" id="c_idno" value="{{ isset($customer->c_idno) ? $customer->c_idno : '' }}" onchange="check_amount_c_idno();">
                                        <label for="c_idno"><i class="fa-solid fa-id-card"></i> หมายเลขบัตรประชาชน <span class="text-danger">*</span></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="mt-0 addDataperson addDatacompany" id="hrAddData">
                    <div id="create_type_company" class="mt-0 addDatacompany">
                        <div class="card-title d-flex align-items-center ">
                            <div>
                                <img src="{{asset('img/icon/iconHeaderCustomerSlash.png')}}" alt="User" class="me-1" width="22.5">
                            </div>
                            <h5 class="mb-0 headerCustomer">เพิ่มข้อมูลมิจฉาชีพ(เช่ารถ) ในนามบริษัท</h5>
                        </div>
                        <div class="row g-3 mt-3 addDatacompany">
                            <div class="col-md-6 col-lg-4 col-xl-4 mt-md-0 mb-4">
                                <div class="input-group">
                                    <div class="inputGroup w-100">
                                        <input name="c_company_name" type="text" id="c_company_name" value="{{ isset($customer->c_company_name) ? $customer->c_company_name : '' }}" required="" autocomplete="off" >
                                        <label for="c_company_name"><i class="fa-solid fa-user"></i> ชื่อบริษัท <span class="text-danger">*</span></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 col-xl-4 mt-md-0 mb-4 addDatacompany" style="position:relative;">
                                <span id="warning_commercial_registration" class="text-danger d-none" style="position:absolute;bottom:-25px;font-size: 13px;">
                                    <i class="fa-solid fa-triangle-exclamation fa-beat"></i>
                                    เลขประจำตัวผู้เสียภาษีไม่ถูกต้อง
                                </span>
                                <span id="success_commercial_registration" class="text-success d-none" style="position:absolute;bottom:-25px;font-size: 13px;">
                                    <i class="fa-solid fa-shield-check"></i>
                                    เลขประจำตัวผู้เสียภาษีครบถ้วนแล้ว
                                </span>
                                <div class="input-group ">
                                    <div class="inputGroup w-100">
                                        <input name="commercial_registration" type="text" id="commercial_registration" value="{{ isset($customer->commercial_registration) ? $customer->commercial_registration : '' }}" required="" autocomplete="off" onchange="check_amount_commercial_registration();">
                                        <label for="commercial_registration" class="text-overflow"><i class="fa-solid fa-user"></i> เลขประจำตัวผู้เสียภาษี <span class="text-danger">*</span></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="inputLastName1" class="form-label subHeaderCustomer">ลักษณะการกระทำความผิด <span class="text-danger">*</span></label>
                    </div>
                    <div class="col-12 mb-md-2">
                        <ul class="nav nav-pills mb-3" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link navDanger active" data-bs-toggle="pill" href="#corrupt" role="tab" aria-selected="true">
                                    <div class="d-flex align-items-center font-tab">
                                        <div class="tab-icon"><i class="fa-solid fa-user-shield"></i>
                                        </div>
                                        <div class="tab-title">&nbsp;1.หมวดทุจริต</div>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link navWarning" data-bs-toggle="pill" href="#discipline" role="tab" aria-selected="false">
                                    <div class="d-flex align-items-center font-tab">
                                        <div class="tab-icon"><i class="fa-regular fa-file-shield"></i>
                                        </div>
                                        <div class="tab-title">&nbsp;2.หมวดบัญชีดำ</div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <style>
                            .font-tab {
                                font-size: 18px !important;
                                transition: all .15s ease-in-out;
                            }

                            .groupOffense {
                                display: flex;
                                flex-wrap: wrap;
                            }

                            .groupOffense .radio-label {
                                padding: 0 20px;

                            }

                            .groupOffense>label {
                                margin: 6px 6px;
                            }
                        </style>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade active show" id="corrupt" role="tabpanel">
                                <div class="groupOffense">
                                    <label>
                                        <input class="radio-input demerit" type="checkbox" name="demerit[]" id="demerit" value="1.ฉ้อโกงหรือยักยอกรถยนต์">
                                        <span class="radio-tile radio-danger">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">1.ฉ้อโกงหรือยักยอกรถยนต์</span>
                                        </span>
                                    </label>
                                    <label>
                                        <input class="radio-input demerit" type="checkbox" name="demerit[]" id="demerit" value="2.ลักทรัพย์หรือเปลี่ยนแปลงอุปกรณ์ภายในรถยนต์">
                                        <span class="radio-tile radio-danger">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">2.ลักทรัพย์หรือเปลี่ยนแปลงอุปกรณ์ภายในรถยนต์</span>
                                        </span>
                                    </label>
                                    <label>
                                        <input class="radio-input demerit" type="checkbox" name="demerit[]" id="demerit" value="3.ความผิดในคดีอาญาอื่นๆ">
                                        <span class="radio-tile radio-danger">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">3.ความผิดในคดีอาญาอื่นๆ</span>
                                        </span>
                                    </label>
                                    <!-- <label>
                                        <input class="radio-input" type="checkbox" name="demerit[]" id="demerit" value="อื่นๆ">
                                        <span class="radio-tile">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">อื่นๆ</span>
                                        </span>
                                    </label> -->
                                </div>
                            </div>
                            <div class="tab-pane fade" id="discipline" role="tabpanel">
                                <div class="groupOffense">
                                    <label>
                                        <input class="radio-input demerit" type="checkbox" name="demerit[]" id="demerit" value="4.ไม่บำรุงรักษารถยนต์">
                                        <span class="radio-tile radio-warning">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">4.ไม่บำรุงรักษารถยนต์</span>
                                        </span>
                                    </label>
                                    <label>
                                        <input class="radio-input demerit" type="checkbox" name="demerit[]" id="demerit" value="5.ไม่ชำระค่าเช่า">
                                        <span class="radio-tile radio-warning">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">5.ไม่ชำระค่าเช่า</span>
                                        </span>
                                    </label>
                                    <label>
                                        <input class="radio-input demerit" type="checkbox" name="demerit[]" id="demerit" value="6.อื่นๆ">
                                        <span class="radio-tile radio-warning">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">6.อื่นๆ</span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="row col-12 my-3" id="divdemeritdetail">
                                <label for="demeritdetail" class="col-sm-12 col-form-label subHeaderCustomer">รายละเอียดการกระทำความผิด</label>
                                <div class="col-sm-12">
                                    <textarea class="form-control" id="demeritdetail" name="demeritdetail" rows="3" placeholder="กรอกรายละเอียดการกระทำความผิด"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mt-0 ">
                        <label for="inputLastName1" class="form-label subHeaderCustomer">วัน/เดือน/ปี ที่กระทำความผิด <span class="text-danger">*</span></label>
                    </div>
                    <div class="col-md-6 mt-md-1  mb-md-2">
                        <div class="input-group ">
                            <div class="inputGroup ">
                                <input name="c_date" id="c_date" class="selectDate" type="date" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="inputLastName1" class="form-label subHeaderCustomer">แนบหลักฐานการกระทำความผิด</label>
                    </div>

                    <div class="row">
                        <div class="col-12 mt-3">
                            <ul class="nav nav-tabs nav-danger" role="tablist">
                                <li class="nav-item" role="presentation" onclick="change_name_nav('c_pic_id_card');">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#nav_c_pic_id_card" role="tab" aria-selected="true">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-title">
                                                1.
                                                <span id="title_nav_c_pic_id_card" class="d-none">
                                                    สำเนาบัตร..
                                                </span>
                                            </div>
                                            <div id="name_nav_c_pic_id_card" class="tab-title">สำเนาบัตรประชาชน / PassPort</div>
                                        </div>
                                    </a>
                                </li>
                                @if($type_create == "company")
                                <li class="nav-item" role="presentation" onclick="change_name_nav('c_pic_company_certificate');">
                                    <a class="nav-link" data-bs-toggle="tab" href="#nav_c_pic_company_certificate" role="tab" aria-selected="false">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-title">
                                                2.
                                                <span id="title_nav_c_pic_company_certificate" class="">
                                                    สำเนาหนังสือ..
                                                </span>
                                            </div>
                                            <div id="name_nav_c_pic_company_certificate" class="tab-title d-none">สำเนาหนังสือรับรองบริษัท</div>
                                        </div>
                                    </a>
                                </li>
                                @endif
                                <li class="nav-item" role="presentation" onclick="change_name_nav('c_pic_indictment');">
                                    <a class="nav-link" data-bs-toggle="tab" href="#nav_c_pic_indictment" role="tab" aria-selected="false">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-title">
                                                @if($type_create == "person")
                                                2.
                                                @else
                                                3.
                                                @endif
                                                <span id="title_nav_c_pic_indictment" class="">
                                                    คำฟ้อง..
                                                </span>
                                            </div>
                                            <div id="name_nav_c_pic_indictment" class="tab-title d-none">คำฟ้องหรือใบร้องทุกข์แจ้งความดำเนินดคี</div>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation" onclick="change_name_nav('c_pic_cap');">
                                    <a class="nav-link" data-bs-toggle="tab" href="#nav_c_pic_cap" role="tab" aria-selected="false">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-title">
                                                @if($type_create == "person")
                                                3.
                                                @else
                                                4.
                                                @endif
                                                <span id="title_nav_c_pic_cap" class="">
                                                    หลักฐาน..
                                                </span>
                                            </div>
                                            <div id="name_nav_c_pic_cap" class="tab-title d-none">หลักฐานการพูด-คุย</div>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation" onclick="change_name_nav('c_pic_other');">
                                    <a class="nav-link" data-bs-toggle="tab" href="#nav_c_pic_other" role="tab" aria-selected="false">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-title">
                                                @if($type_create == "person")
                                                4.
                                                @else
                                                5.
                                                @endif
                                                <span id="title_nav_c_pic_other" class="">
                                                    อื่นๆ
                                                </span>
                                            </div>
                                            <div id="name_nav_c_pic_other" class="tab-title d-none">อื่นๆ</div>
                                        </div>
                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content py-3">
                                <!-- เพิ่มสำเนาบัตรประชาชน -->
                                <div class="tab-pane fade show active" id="nav_c_pic_id_card" role="tabpanel">
                                    <input class="d-none" type="file" id="c_pic_id_card" name="c_pic_id_card[]" accept="image/*" multiple onchange="on_select_file_input('c_pic_id_card');">
                                    <div class="row">
                                        <h6 class="mt-2 mb-2">
                                            สำเนาบัตรประชาชน / PassPort (สูงสุด 2 ไฟล์)
                                        </h6>
                                        @for($i=1; $i < 3; $i++)
                                            @php 
                                                if($i == 1){
                                                    $class_div_id_card = '' ;
                                                }else{
                                                    $class_div_id_card = 'd-none' ;
                                                }
                                            @endphp
                                            <div class="p-1 col-4">
                                                <div id="img_c_pic_id_card_{{ $i }}" class=" file-upload-box upload-id-card {{ $class_div_id_card }}" onclick="document.querySelector('#c_pic_id_card').click();" >
                                                    <div class="upload-text text-center">
                                                        <div class="w-100 d-flex justify-content-center mb-3" >
                                                            <img src="{{asset('img/icon/id-card.png')}}" alt="User" class="imgUpLoad" width="50">
                                                        </div>
                                                        <span>
                                                            <i class="fa-sharp fa-solid fa-plus mr-2"></i> เพิ่มสำเนาบัตรประชาชน / PassPort 
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                                <!-- เพิ่มสำเนาหนังสือรับรองบริษัท -->
                                @if($type_create == "company")
                                <div class="tab-pane fade" id="nav_c_pic_company_certificate" role="tabpanel">
                                    <input class="d-none" type="file" id="c_pic_company_certificate" name="c_pic_company_certificate[]" accept="image/*" multiple onchange="on_select_file_input('c_pic_company_certificate');">
                                    <div class="row">
                                        <h6 class="mt-2 mb-2">
                                            สำเนาหนังสือรับรองบริษัท (สูงสุด 5 ไฟล์)
                                        </h6>
                                        @for($i=1; $i < 6; $i++)
                                            @php 
                                                if($i == 1){
                                                    $class_div_id_card = '' ;
                                                }else{
                                                    $class_div_id_card = 'd-none' ;
                                                }
                                            @endphp
                                            <div class="p-1 col-4">
                                                <div id="img_c_pic_company_certificate_{{ $i }}" class=" file-upload-box upload-id-card {{ $class_div_id_card }}" onclick="document.querySelector('#c_pic_company_certificate').click();" >
                                                    <div class="upload-text text-center">
                                                        <div class="w-100 d-flex justify-content-center mb-3" >
                                                            <img src="{{asset('img/icon/company.png')}}" alt="User" class="imgUpLoad" width="50">
                                                        </div>
                                                        <span>
                                                            <i class="fa-sharp fa-solid fa-plus mr-2"></i> เพิ่มสำเนาหนังสือรับรองบริษัท
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                                @endif
                                <!-- คำฟ้องหรือใบร้องทุกข์แจ้งความดำเนินดคี -->
                                <div class="tab-pane fade" id="nav_c_pic_indictment" role="tabpanel">
                                    <input class="d-none" type="file" id="c_pic_indictment" name="c_pic_indictment[]" accept="image/*" multiple onchange="on_select_file_input('c_pic_indictment');">
                                    <div class="row">
                                        <h6 class="mt-2 mb-2">
                                            คำฟ้องหรือใบร้องทุกข์แจ้งความดำเนินดคี (สูงสุด 5 ไฟล์)
                                        </h6>
                                        @for($i=1; $i < 6; $i++)

                                            @php 
                                                if($i == 1){
                                                    $class_div_certificate = '' ;
                                                }else{
                                                    $class_div_certificate = 'd-none' ;
                                                }
                                            @endphp
                                            <div class="p-1 col-4">
                                                <div id="img_c_pic_indictment_{{ $i }}" class="file-upload-box upload-id-card {{ $class_div_certificate }}" onclick="document.querySelector('#c_pic_indictment').click();">
                                                    <div class="upload-text text-center">
                                                        <div class="w-100 d-flex justify-content-center mb-3" >
                                                            <img src="{{asset('img/icon/legal.png')}}" alt="User" class="imgUpLoad" width="50">
                                                        </div>
                                                        <span>
                                                            <i class="fa-sharp fa-solid fa-plus mr-2"></i> เพิ่มคำฟ้องหรือใบร้องทุกข์แจ้งความดำเนินดคี
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav_c_pic_cap" role="tabpanel">
                                    <input class="d-none" type="file" id="c_pic_cap" name="c_pic_cap[]" accept="image/*" multiple onchange="on_select_file_input('c_pic_cap');">
                                    <div class="row">
                                        <h6 class="mt-2 mb-2">
                                            หลักฐานการพูด-คุย (สูงสุด 10 ไฟล์)
                                        </h6>
                                        @for($i=1; $i < 11; $i++)

                                            @php 
                                                if($i == 1){
                                                    $class_div_c_pic_cap = '' ;
                                                }else{
                                                    $class_div_c_pic_cap = 'd-none' ;
                                                }
                                            @endphp
                                            <div class="p-1 col-4">
                                                <div id="img_c_pic_cap_{{ $i }}" class="file-upload-box upload-id-card {{ $class_div_c_pic_cap }}" onclick="document.querySelector('#c_pic_cap').click();">
                                                    <div class="upload-text text-center">
                                                        <div class="w-100 d-flex justify-content-center mb-3" >
                                                            <img src="{{asset('img/icon/chat.png')}}" alt="User" class="imgUpLoad" width="50">
                                                        </div>
                                                        <span>
                                                            <i class="fa-sharp fa-solid fa-plus mr-2"></i> เพิ่มหลักฐานการพูด-คุย
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav_c_pic_other" role="tabpanel">
                                    <input class="d-none" type="file" id="c_pic_other" name="c_pic_other[]" accept="image/*" multiple onchange="on_select_file_input('c_pic_other');">
                                    <div class="row">
                                        <h6 class="mt-2 mb-2">
                                            อื่นๆ (สูงสุด 10 ไฟล์)
                                        </h6>
                                        @for($i=1; $i < 11; $i++)

                                            @php 
                                                if($i == 1){
                                                    $class_div_c_pic_other = '' ;
                                                }else{
                                                    $class_div_c_pic_other = 'd-none' ;
                                                }
                                            @endphp
                                            <div class="p-1 col-4">
                                                <div id="img_c_pic_other_{{ $i }}" class="file-upload-box upload-id-card {{ $class_div_c_pic_other }}" onclick="document.querySelector('#c_pic_other').click();">
                                                    <div class="upload-text text-center">
                                                        <div class="w-100 d-flex justify-content-center mb-3" >
                                                            <img src="{{asset('img/icon/other.png')}}" alt="User" class="imgUpLoad" width="50">
                                                        </div>
                                                        <span>
                                                            <i class="fa-sharp fa-solid fa-plus mr-2"></i> เพิ่มอื่นๆ
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-12">
                        <!-- <a id="btnSubmitFormCreateCustomer" onclick="checkvaluedemerit(); " type="submit" class="btn btn-danger px-5 float-end" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">ยืนยัน</a> -->

                        <a id="btnSubmitFormCreateCustomer" onclick="checkvaluedemerit();"class="btn btn-danger px-5 float-end">ยืนยัน</a>

                        <span id="span_on_submit" class="btn btn-sm btn-info d-none" onclick="on_submit();">
                            on_submit
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="d-flex align-items-center mb-3">หมายเหตุ</h5>
                    <ol>
                        <li>ข้อมูลดังกล่าวถือเป็นความลับของสมาชิกและสมาคมเท่านั้น สมาคมขอสงวนสิทธฺ์ห้ามนำข้อมูลไปเผยแพร่โดยไม่ได้รับอนุญาตจากทางสมาคม และทางสมาคมมีสิทธิ์ในการเรียกร้องค่าเสียหายกับผู้ละเมิด การบันทึกข้อมูลหรือเข้าค้นหาข้อมูลทุกครั้ง จะมีการบันทึกรายละเอียดผู้เข้าใช้เสมอ</li>
                        <li>สมาชิกผู้แจ้งควรตรวจสอบข้อเท็จจริงข้างต้นให้ละเอียดถูกต้อง เนื่องจากรายชื่อ จะถูกประมวลเพื่อส่งให้กับสมาชิกอื่นของสมาคม บุคคลดังกล่าวอาจได้รับความเสียหาย หากข้อเท็จจริงดังกล่าวคลาดเคลื่อน และสมาชิกผู้แจ้งจะต้องเป็นผู้รับผิดชอบการเพิ่มข้อมูลดังกล่าว</li>
                        <li>สมาคมฯ ขอสงวนสิทธิ์ในความรับผิดชอบในทุกกรณี ถ้าข้อมูลดังกล่าวผิดพลาด</li>
                        <li>สมาคมฯ จะเป็นตัวกลางที่จะให้ข้อมูลกับสมาชิกเท่าที่จะเห็นสมควร และประโยชน์สูงสุด</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>


<style>
    .loading-container {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .loading-spinner {
        border: 4px solid rgba(0, 0, 0, 0.1);
        border-left-color: #000;
        animation: spin 1s linear infinite;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        margin-right: 20px;
        margin-top: 50px;
        margin-bottom: 50px;
    }


    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    @keyframes drawCheck {
        0% {
            transform: scale(0);
        }

        100% {
            transform: scale(1);
        }
    }

    .checkmark {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: block;
        stroke-width: 2;
        stroke: #29cc39;
        stroke-miterlimit: 10;
        margin: 10% auto;
        box-shadow: inset 0px 0px 0px #ffffff;
        animation: fill 0.9s ease-in-out .4s forwards, scale .3s ease-in-out .9s both
    }

    .checkmark__check {
        transform-origin: 50% 50%;
        stroke-dasharray: 48;
        stroke-dashoffset: 48;
        animation: stroke 0.8s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards
    }

    @keyframes stroke {
        100% {
            stroke-dashoffset: 0
        }
    }

    @keyframes scale {

        0%,
        100% {
            transform: none
        }

        50% {
            transform: scale3d(1.1, 1.1, 1)
        }
    }

    @keyframes fill {
        100% {
            box-shadow: inset 0px 0px 0px 60px #fff
        }
    }

    .radius-20 {
        border-radius: 20px;
    }
</style>

<style>
    .checkmark__circle {
        stroke-dasharray: 166;
        stroke-dashoffset: 166;
        stroke-width: 2;
        stroke-miterlimit: 10;
        stroke: #7ac142;
        fill: none;
        animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards
    }

    .checkmark {
        width: 56px;
        height: 56px;
        border-radius: 50%;
        display: block;
        stroke-width: 2;
        stroke: #fff;
        stroke-miterlimit: 10;
        margin: 10% auto;
        box-shadow: inset 0px 0px 0px #7ac142;
        animation: fill .4s ease-in-out .4s forwards, scale .3s ease-in-out .9s both
    }

    .checkmark__check {
        transform-origin: 50% 50%;
        stroke-dasharray: 48;
        stroke-dashoffset: 48;
        animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards
    }

    @keyframes stroke {
        100% {
            stroke-dashoffset: 0
        }
    }

    @keyframes scale {

        0%,
        100% {
            transform: none
        }

        50% {
            transform: scale3d(1.1, 1.1, 1)
        }
    }

    @keyframes fill {
        100% {
            box-shadow: inset 0px 0px 0px 30px #7ac142
        }
    }
</style>

<!-- Modal -->
<div class="modal fade" id="saveDataSuccess" tabindex="-1" role="dialog" aria-labelledby="saveDataSuccessTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content radius-20">
            <div class="modal-body p-5">
                <div class="loading-container">
                    <div class="loading-spinner"></div>

                    <div class="contrainerCheckmark d-none">
                        <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                            <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                            <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                        </svg>
                        <center>
                            <h5 class="mt-5">เสร็จสิ้น</h5>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- เช็คข้อมูลครบถ้วนหรือไม่ -->
<script>
    $("#btnSubmitFormCreateCustomer").click(function() {
        if ($("#formCreateCustomer")[0].checkValidity())
            if (checkdemerit) {
                // console.log('sucess');
                $('#saveDataSuccess').modal('show');

                setTimeout(function() {
                    document.querySelector(".loading-spinner").style.display = "none";
                    document.querySelector(".contrainerCheckmark").classList.remove('d-none');
                }, 3000);

                setTimeout(function() {
                    // formCreateCustomer.submit();
                    document.querySelector('#span_on_submit').click();
                }, 4000);

                // formCreateCustomer.submit();
            } else {
                // console.log('un_sucess');
            }
        else
            //Validate Form
            $("#formCreateCustomer")[0].reportValidity()
    });
</script>

<!-- ON SUBMIT -->
<script>
    function on_submit(){

        let user_id = document.querySelector('#user_id');
        let c_name = document.querySelector('#c_name');
        let c_surname = document.querySelector('#c_surname');
        let c_idno = document.querySelector('#c_idno');
        
        let c_company_name = document.querySelector('#c_company_name');
        let commercial_registration = document.querySelector('#commercial_registration');

        // textaarea
        let demeritdetail = document.querySelector('#demeritdetail');
        // date
        let c_date = document.querySelector('#c_date');

        // array checkbox
        let demerit = document.getElementsByClassName('demerit');
        let all_demerit = "" ;

            for (let i = 0; i < demerit.length; i++) {
                if (demerit[i].checked) {
                    if (all_demerit === "") {
                        all_demerit = demerit[i].value ;
                    }else{
                        all_demerit = all_demerit + "," +  demerit[i].value ;
                    }
                }
            }

        // add DATA to formData
        if(document.querySelector('#c_name')){
            formData.append('c_name', c_name.value);
            formData.append('c_surname', c_surname.value);
            formData.append('c_idno', c_idno.value);
        }else if(document.querySelector('#c_company_name')){
            formData.append('c_company_name', c_company_name.value);
            formData.append('commercial_registration', commercial_registration.value);
        }

        formData.append('user_id', user_id.value);
        formData.append('demeritdetail', demeritdetail.value);
        formData.append('c_date', c_date.value);
        formData.append('demerit', all_demerit);

        // เพิ่มไฟล์รูปภาพ เข้า formData เพื่อเตรียมส่งข้อมูล
        for (let file_1 of all_files['c_pic_id_card']) {
            formData.append('c_pic_id_card[]', file_1);
        }

        for (let file_2 of all_files['c_pic_company_certificate']) {
            formData.append('c_pic_company_certificate[]', file_2);
        }

        for (let file_3 of all_files['c_pic_indictment']) {
            formData.append('c_pic_indictment[]', file_3);
        }

        for (let file_4 of all_files['c_pic_cap']) {
            formData.append('c_pic_cap[]', file_4);
        }

        for (let file_5 of all_files['c_pic_other']) {
            formData.append('c_pic_other[]', file_5);
        }

        // ส่งข้อมูล
        const apiUrl = "{{ url('/') }}/api/customer_upload_api";

        fetch(apiUrl, {
          method: 'POST',
          body: formData
        })
        .then(response => response.text())
        .then(data => {
          // ทำอะไรกับข้อมูลที่ได้รับหลังจากอัพโหลดสำเร็จ
          // console.log(data);
          window.location.reload();
        })
        .catch(error => {
          // แสดงข้อความผิดพลาดหรือทำอะไรกับข้อผิดพลาด
          console.error('เกิดข้อผิดพลาด: ', error);
        });

    }

</script>

<script>

    var formData = new FormData();

    var all_files = [] ;
        all_files['c_pic_id_card'] = [];
        all_files['c_pic_company_certificate'] = [];
        all_files['c_pic_indictment'] = [];
        all_files['c_pic_cap'] = [];
        all_files['c_pic_other'] = [];

    function on_select_file_input(name_input) {
        let input = document.querySelector('#' + name_input);
        let files = Array.from(input.files);

        let max_of_name_input = check_max_of_name_input(name_input);
        let maxFileCount = max_of_name_input.split(',')[0];
        let text_name_input = max_of_name_input.split(',')[1];

        if (all_files[name_input].length >= maxFileCount) {
            // console.log('เพิ่มรูป ผลรวมเดิม เกิน');
            alert('คุณสามารถเลือก ' + text_name_input + ' ได้สูงสุด ' + maxFileCount + ' ไฟล์');
        } else {
            // console.log('เพิ่มรูป ผลรวมเดิม ผ่าน');

            let sum_length_file = files.length + all_files[name_input].length;

            if (sum_length_file > maxFileCount) {
                alert('คุณสามารถเลือก ' + text_name_input + ' ได้สูงสุด ' + maxFileCount + ' ไฟล์');
            } else {

                // เพิ่มไฟล์ใหม่เข้าไปใน existingFiles
                files.forEach((file) => {
                    // เช็คไฟล์ซ้ำไม่ให้เพิ่ม
                    let check_file_double = '';
                    for (let iii = 0; iii < all_files[name_input].length; iii++) {
                        if(file.name == all_files[name_input][iii].name){
                            check_file_double = 'Yes' ;
                        }
                    }

                    if(check_file_double !== 'Yes'){
                        all_files[name_input].push(file);
                    }else{
                        // console.log('มีไฟล์ซ้ำ');
                    }
                });

                // แสดงตัวอย่างรูปภาพ
                preview_img(name_input);

            }
        }

    }

    function preview_img(name_input){

        // console.log('preview_img file length >> ' + all_files[name_input].length);

        let for_add_onclick = all_files[name_input].length + 1 ;

        let count = 1 ;
        // แสดงตัวอย่างรูปภาพ
        all_files[name_input].forEach((file) => {

            document.querySelector('#img_'+name_input+'_' + count).innerHTML = '';

            let fileSize = formatFileSize(file.size);

            let html_img = `
                <img class="file-preview" src="`+URL.createObjectURL(file)+`" alt="ภาพตัวอย่าง" >
                <div class="infoImg">
                    <div class="row">
                        <div class="col-10">
                            <span class="imgSize">`+fileSize+`</span>
                        </div>
                        <div class="col-2">
                            <i class="fa-solid fa-circle-xmark fa-xl" onclick="drop_img('`+name_input+`' , '`+file.name+`' ,'`+count+`');"></i>
                        </div>
                        <div class="col-12">
                            <p class="m-0">
                                <span class="m-0 imgName">`+file.name+`</span>
                            </p>
                        </div>
                    </div>
                </div>
            `;
            document.querySelector('#img_'+name_input+'_' + count).insertAdjacentHTML('beforeend', html_img);
            document.querySelector('#img_'+name_input+'_' + count).classList.remove('d-none');

            document.querySelector('#img_'+name_input+'_'+count).setAttribute('onclick' , '');
            count = count+1 ;
        });

        if(document.querySelector('#img_'+name_input+'_' + for_add_onclick) ){
            document.querySelector('#img_'+name_input+'_' + for_add_onclick).classList.remove('d-none');

            setTimeout(function() {
                    document.querySelector('#img_'+name_input+'_'+ for_add_onclick).setAttribute('onclick' , 
                "document.querySelector('#"+name_input+"').click();");
            }, 1000);
            
        }

        // console.log("-- สรุปไฟล์ "+name_input+" --");
        // console.log( all_files[name_input] );
        // console.log("------ END ------");

    }

    function drop_img(name_input , file_name , count){

        // console.log('name_input >> ' + name_input);

        // ลบองค์ประกอบที่มี name เท่ากับ file_name
        all_files[name_input] = all_files[name_input].filter(file => file.name !== file_name);

        if(all_files[name_input].length == 0){
            all_files[name_input] = [] ;
        }

        let max_of_name_input = check_max_of_name_input(name_input);
        let maxFileCount = max_of_name_input.split(',')[0];
        let text_name_input = max_of_name_input.split(',')[1];
        let icon = max_of_name_input.split(',')[2];

        document.querySelector('#img_'+name_input+'_' + count).innerHTML = '';

        let html_add_img = `
            <div class="upload-text text-center">
                <div class="w-100 d-flex justify-content-center mb-3" >
                    <img src="{{asset('img/icon/`+icon+`')}}" alt="User" class="imgUpLoad" width="50">
                </div>
                <span>
                    <i class="fa-sharp fa-solid fa-plus mr-2"></i> `+text_name_input+`
                </span>
            </div>
        `;

        let max = parseInt(maxFileCount)+ 1 ;

        for (let i = 1; i < max; i++) {
            // console.log('innerHTML >> ' + i);
            document.querySelector('#img_'+name_input+'_' + i).innerHTML = '';
            document.querySelector('#img_'+name_input+'_' + i).insertAdjacentHTML('beforeend', html_add_img);

            document.querySelector('#img_'+name_input+'_' + i).classList.add('d-none');
        }

        preview_img(name_input);

    }


    function check_max_of_name_input(name_input){

        switch(name_input) {
            case "c_pic_id_card":
                maxFileCount = 2 ;
                text_name_input = "สำเนาบัตรประชาชน / PassPort" ;
                icon = 'id-card.png' ;
            break;
            case "c_pic_company_certificate":
                maxFileCount = 5 ;
                text_name_input = "สำเนาหนังสือรับรองบริษัท" ;
                icon = 'company.png' ;
            break;
            case "c_pic_indictment":
                maxFileCount = 5 ;
                text_name_input = "คำฟ้องหรือใบร้องทุกข์แจ้งความดำเนินดคี" ;
                icon = 'legal.png' ;
            break;
            case "c_pic_cap":
                maxFileCount = 10 ;
                text_name_input = "หลักฐานการพูด-คุย" ;
                icon = 'chat.png' ;
            break;
            case "c_pic_other":
                maxFileCount = 10 ;
                text_name_input = "อื่นๆ" ;
                icon = 'other.png' ;
            break;
        }

        return maxFileCount + "," + text_name_input + "," + icon ;

    }

</script>

<script>
    function change_name_nav(type){

        document.querySelector('#name_nav_c_pic_id_card').classList.add('d-none');
        document.querySelector('#name_nav_c_pic_indictment').classList.add('d-none');
        document.querySelector('#name_nav_c_pic_cap').classList.add('d-none');
        document.querySelector('#name_nav_c_pic_other').classList.add('d-none');

        if(document.querySelector('#name_nav_c_pic_company_certificate')){
            document.querySelector('#name_nav_c_pic_company_certificate').classList.add('d-none');
        }

        document.querySelector('#title_nav_c_pic_id_card').classList.remove('d-none');
        document.querySelector('#title_nav_c_pic_indictment').classList.remove('d-none');
        document.querySelector('#title_nav_c_pic_cap').classList.remove('d-none');
        document.querySelector('#title_nav_c_pic_other').classList.remove('d-none');

        if(document.querySelector('#title_nav_c_pic_company_certificate')){
            document.querySelector('#title_nav_c_pic_company_certificate').classList.remove('d-none');
        }

        // เปิด text ที่ถูกเลือก
        document.querySelector('#name_nav_'+type).classList.remove('d-none');
        document.querySelector('#title_nav_'+type).classList.add('d-none');

    }
</script>

<script>
    function formatFileSize(fileSize) {
        if (fileSize === 0) return '0 Bytes';

        const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
        const k = 1024;
        const i = Math.floor(Math.log(fileSize) / Math.log(k));

        return parseFloat((fileSize / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
    }

    function getFileExtension(fileName) {
        return fileName.slice((fileName.lastIndexOf('.') - 1 >>> 0) + 2);
    }
</script>
<script>
    $(function() {
        // Owl Carousel
        var owl = $(".carouselSelectPhoto");
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
    const urlParams = new URLSearchParams(window.location.search);
    const type_create = urlParams.get('type_create');
    const containerLogin = document.getElementById('containerLogin');
    const radioInputs = document.getElementsByName("typeLoginMoblie");

    if (type_create === "company") {
        document.getElementById("create_type_person").remove();        
        document.getElementById("hrAddData").remove();

    } else if (type_create === "person") {
        document.getElementById("create_type_company").remove();        
        document.getElementById("hrAddData").remove();
        const uploadBoxes = document.querySelectorAll('.carouselSelectPhoto .item');

        // uploadBoxes[1].remove();

        let count = 1;
        uploadBoxes.forEach((box, index) => {
            if (index !== 1) { // ข้ามกล่องที่ถูกลบไป
                const uploadText = box.querySelector('.upload-text .number-upload');
                if (uploadText) {
                    uploadText.textContent = `${count}.`;
                    count++;
                }
            }
        });
    } else {

        const c_name = document.getElementById('c_name');
        const c_surname = document.getElementById('c_surname');
        const c_idno = document.getElementById('c_idno');
        const c_company_name = document.getElementById('c_company_name');
        const commercial_registration = document.getElementById('commercial_registration');
        const addDataperson = document.querySelectorAll('.addDataperson');
        const addDatacompany = document.querySelectorAll('.addDatacompany');

        c_name.setAttribute('oninput', 'handleInputs(this);');
        c_surname.setAttribute('oninput', 'handleInputs(this);');
        c_idno.setAttribute('oninput', 'handleInputs(this);');
        c_company_name.setAttribute('oninput', 'handleInputs(this);');
        commercial_registration.setAttribute('oninput', 'handleInputs(this);');

        function handleInputs(inputElement) {
            if (inputElement === c_name || inputElement === c_surname || inputElement === c_idno) {
                if (c_name.value !== "" || c_surname.value !== "" || c_idno.value !== "") {
                    addDatacompany.forEach(element => {
                        element.classList.add('d-none');
                    });
                    c_company_name.value = "";
                    c_company_name.required = false;
                    commercial_registration.value = "";
                    commercial_registration.required = false;
                } else {
                    addDatacompany.forEach(element => {
                        element.classList.remove('d-none');
                        c_company_name.required = true;
                        commercial_registration.required = true;

                    });
                }
            } else if (inputElement === c_company_name || inputElement === commercial_registration) {
                if (c_company_name.value !== "" || commercial_registration.value !== "") {
                    addDataperson.forEach(element => {
                        element.classList.add('d-none');
                    });
                    c_name.value = "";
                    c_name.required = false;

                    c_surname.value = "";
                    c_surname.required = false;

                    c_idno.value = "";
                    c_idno.required = false;
                } else {
                    addDataperson.forEach(element => {
                        element.classList.remove('d-none');
                    });
                    c_name.required = true;
                    c_surname.required = true;
                    c_idno.required = true;
                }
            }
        }
    }
</script>

<script>
    function checkFileCount(input) {
        // รับจำนวนไฟล์ที่เลือก
        let fileCount = input.files.length;
        let name_input = input.name;
            name_input = name_input.replace("[]", "");
            // console.log(name_input);
            // console.log(fileCount);

        // กำหนดจำนวนสูงสุดที่ต้องการ
        let maxFileCount ; 
        let text_name_input ; 

        switch(name_input) {
            case "c_pic_id_card":
                maxFileCount = 2 ;
                text_name_input = "ภาพบัตรประชาชน" ;
            break;
            case "c_pic_company_certificate":
                maxFileCount = 5 ;
                text_name_input = "สำเนาหนังสือรับรองบริษัท" ;
            break;
            case "c_pic_indictment":
                maxFileCount = 5 ;
                text_name_input = "คำฟ้องหรือใบร้องทุกข์แจ้งความดำเนินดคี" ;
            break;
            case "c_pic_cap":
                maxFileCount = 10 ;
                text_name_input = "หลักฐานการพูด-คุย" ;
            break;
            case "c_pic_other":
                maxFileCount = 10 ;
                text_name_input = "อื่นๆ" ;
            break;
        }
        
        
        
        if (fileCount > maxFileCount) {
            alert('คุณสามารถเลือก' + text_name_input + 'ได้สูงสุด ' + maxFileCount + ' ไฟล์');
            // ล้าง input ให้ว่าง
            input.value = '';
        }
    }
</script>


<!-- เลขบัตรประจำตัวประชาชน -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        let cIdnoInput = document.getElementById('c_idno');

        if(cIdnoInput){
            cIdnoInput.addEventListener('input', function() {
                document.querySelector('#warning_c_idno').classList.add('d-none');
                let inputValue = cIdnoInput.value;
                let formattedValue = formatCIDNO(inputValue);
                cIdnoInput.value = formattedValue;

                let check_input_13 = cIdnoInput.value.replaceAll('-','');
                    // console.log(check_input_13.length);
                if (check_input_13.length == 13) {
                    // console.log('ครบ 13');
                    document.querySelector('#success_c_idno').classList.remove('d-none');
                    document.querySelector('#warning_c_idno').classList.add('d-none');
                }else{
                    // console.log('ยังไม่ครบ 13 หรือเกิน');
                    document.querySelector('#success_c_idno').classList.add('d-none');
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

    function check_amount_c_idno(){
        let cIdnoInput = document.getElementById('c_idno').value;
            cIdnoInput = cIdnoInput.replaceAll("-","");

        if(cIdnoInput.length != 13){
            document.querySelector('#warning_c_idno').classList.remove('d-none');
        }
    }
</script>

<!-- เลขประจำตัวผู้เสียภาษี -->
<script>

    document.addEventListener('DOMContentLoaded', function() {
        let commercial_registration = document.getElementById('commercial_registration');

        if(commercial_registration){
            commercial_registration.addEventListener('input', function() {
                document.querySelector('#warning_commercial_registration').classList.add('d-none');

                let check_input_13 = commercial_registration.value.replaceAll('-','');
                    // console.log(check_input_13.length);
                if (check_input_13.length == 13) {
                    // console.log('ครบ 13');
                    document.querySelector('#success_commercial_registration').classList.remove('d-none');
                    document.querySelector('#warning_commercial_registration').classList.add('d-none');
                }else{
                    // console.log('ยังไม่ครบ 13 หรือเกิน');
                    document.querySelector('#success_commercial_registration').classList.add('d-none');
                }
            });
        }
    });

    function check_amount_commercial_registration(){
        let commercial_registration = document.getElementById('commercial_registration').value;
            commercial_registration = commercial_registration.replaceAll("-","");

        if(commercial_registration.length != 13){
            document.querySelector('#warning_commercial_registration').classList.remove('d-none');
            document.querySelector('#success_commercial_registration').classList.add('d-none');
        }else{
            document.querySelector('#success_commercial_registration').classList.remove('d-none');
            document.querySelector('#warning_commercial_registration').classList.add('d-none');
        }
    }
</script>

<script>
    const demeritCheckboxes = document.querySelectorAll('input[id="demerit"]');
    const formCreateCustomer = document.getElementById('formCreateCustomer');
    const otherCheckboxes = document.querySelectorAll('input[id="demerit"][value="อื่นๆ"]');
    var checkdemerit = false;
    var checkisGroupPersonAndCompany = false;

    otherCheckboxes.forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            if (this.checked) {
                // ตั้งค่า checked เป็น true สำหรับ checkbox อื่นๆ ที่มี value เป็น "อื่นๆ"
                otherCheckboxes.forEach(function(otherCheckbox) {
                    otherCheckbox.checked = true;
                });
            } else {
                // ตั้งค่า checked เป็น false สำหรับ checkbox อื่นๆ ที่มี value เป็น "อื่นๆ"
                otherCheckboxes.forEach(function(otherCheckbox) {
                    otherCheckbox.checked = false;
                });
            }
        });
    });


    function checkvaluedemerit() {
        const demeritCheckboxes = document.querySelectorAll('input[id="demerit"]:checked');
        if (demeritCheckboxes.length === 0) {
            // console.log('โปรดเลือก');
            checkdemerit = false;

            event.preventDefault(); // ป้องกันการส่งฟอร์ม   
            dangerAlert("กรุณาเลือกลักษณะการกระทำความผิดอย่างน้อย 1 อย่าง");
        } else {

            let cIdnoInput = document.getElementById('c_idno');
            let commercial_registration = document.getElementById('commercial_registration');

            // ใส่เลขบัตร ปชช
            if(cIdnoInput){
                cIdnoInput = cIdnoInput.value.replaceAll("-","");
                if(cIdnoInput.length != 13){
                    document.getElementById('c_idno').focus();
                }else{
                    checkdemerit = true;
                }
            }
            // ใส่เลขประจำตัวผู้เสียภาษี
            else if(commercial_registration){
                if(commercial_registration.value.length != 13){
                    document.getElementById('commercial_registration').focus();
                }else{
                    checkdemerit = true;
                }
            }


            // console.log('ยืนยัน')
        }
    }
</script>








<!-- 
{{-- <div class="form-group {{ $errors->has('rentname') ? 'has-error' : ''}}">
<label for="rentname" class="control-label">{{ 'Rentname' }}</label>
<input class="form-control" name="rentname" type="text" id="rentname" value="{{ isset($customer->rentname) ? $customer->rentname : ''}}">
{!! $errors->first('rentname', '<p class="help-block">:message</p>') !!}
</div> --}}

<div class="form-group {{ $errors->has('compname') ? 'has-error' : '' }}">
    <label for="compname" class="control-label">{{ 'Compname' }}</label>
    <input class="form-control" name="compname" type="text" id="compname" value="{{ isset($customer->compname) ? $customer->compname : '' }}">
    {!! $errors->first('compname', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('c_name') ? 'has-error' : '' }}">
    <label for="c_name" class="control-label">{{ 'C Name' }}</label>
    <input class="form-control" name="c_name" type="text" id="c_name" value="{{ isset($customer->c_name) ? $customer->c_name : '' }}">
    {!! $errors->first('c_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('c_surname') ? 'has-error' : '' }}">
    <label for="c_surname" class="control-label">{{ 'C Surname' }}</label>
    <input class="form-control" name="c_surname" type="text" id="c_surname" value="{{ isset($customer->c_surname) ? $customer->c_surname : '' }}">
    {!! $errors->first('c_surname', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('c_idno') ? 'has-error' : '' }}">
    <label for="c_idno" class="control-label">{{ 'C Idno' }}</label>
    <input class="form-control" name="c_idno" type="text" id="c_idno" value="{{ isset($customer->c_idno) ? $customer->c_idno : '' }}">
    {!! $errors->first('c_idno', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('demerit') ? 'has-error' : '' }}">
    <label for="demerit" class="control-label">{{ 'Demerit' }}</label>
    <input class="form-control" name="demerit[]" type="text" id="demerit" value="{{ isset($customer->demerit) ? $customer->demerit : '' }}">
    {!! $errors->first('demerit', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('demeritdetail') ? 'has-error' : '' }}">
    <label for="demeritdetail" class="control-label">{{ 'Demeritdetail' }}</label>
    <input class="form-control" name="demeritdetail" type="text" id="demeritdetail" value="{{ isset($customer->demeritdetail) ? $customer->demeritdetail : '' }}">
    {!! $errors->first('demeritdetail', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('c_pic_id_card') ? 'has-error' : '' }}">
    <label for="c_pic_id_card" class="control-label">{{ 'C Pic Id Card' }}</label>
    <input class="form-control" name="c_pic_id_card" type="text" id="c_pic_id_card" value="{{ isset($customer->c_pic_id_card) ? $customer->c_pic_id_card : '' }}">
    {!! $errors->first('c_pic_id_card', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('c_pic_company_certificate') ? 'has-error' : '' }}">
    <label for="c_pic_company_certificate" class="control-label">{{ 'C Pic Lease' }}</label>
    <input class="form-control" name="c_pic_company_certificate" type="text" id="c_pic_company_certificate" value="{{ isset($customer->c_pic_company_certificate) ? $customer->c_pic_company_certificate : '' }}">
    {!! $errors->first('c_pic_company_certificate', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('c_pic_execution') ? 'has-error' : '' }}">
    <label for="c_pic_execution" class="control-label">{{ 'C Pic Execution' }}</label>
    <input class="form-control" name="c_pic_execution" type="text" id="c_pic_execution" value="{{ isset($customer->c_pic_execution) ? $customer->c_pic_execution : '' }}">
    {!! $errors->first('c_pic_execution', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('c_pic_cap') ? 'has-error' : '' }}">
    <label for="c_pic_cap" class="control-label">{{ 'C Pic Cap' }}</label>
    <input class="form-control" name="c_pic_cap" type="text" id="c_pic_cap" value="{{ isset($customer->c_pic_cap) ? $customer->c_pic_cap : '' }}">
    {!! $errors->first('c_pic_cap', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('c_pic_other') ? 'has-error' : '' }}">
    <label for="c_pic_other" class="control-label">{{ 'C Pic Other' }}</label>
    <input class="form-control" name="c_pic_other" type="text" id="c_pic_other" value="{{ isset($customer->c_pic_other) ? $customer->c_pic_other : '' }}">
    {!! $errors->first('c_pic_other', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('c_date') ? 'has-error' : '' }}">
    <label for="c_date" class="control-label">{{ 'C Date' }}</label>
    <input class="form-control" name="c_date" type="text" id="c_date" value="{{ isset($customer->c_date) ? $customer->c_date : '' }}">
    {!! $errors->first('c_date', '<p class="help-block">:message</p>') !!}
</div> -->
<!-- 

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div> -->