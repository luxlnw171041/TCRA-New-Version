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
        color: #0a58ca;
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
        max-width: 90%;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .inputGroup :is(input:focus, input:valid) {
        border-color: #0a58ca;
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
        border-color: #0a58ca;
        box-shadow: 0 0 0 0.25rem rgb(10, 88, 202, 0.4);
    }

    .selectDate::-webkit-datetime-edit-month-field:hover,
    .selectDate::-webkit-datetime-edit-day-field:hover,
    .selectDate::-webkit-datetime-edit-year-field:hover {
        background: rgb(10, 88, 202, 0.1);
    }

    .selectDate::-webkit-datetime-edit-text {
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
        background-color: #0a58ca;
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
</style>

<style>
    .file-upload-box {
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
        border-top: 4px solid #0a58ca;
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
        caret-color: #0a58ca;
        caret-shape: 50px;
    }

    .infoImg {
        display: block;
        justify-content: start;
        padding: 5px;
        position: absolute;
        color: #0a58ca;
        transition: all .15s ease-in-out;
        transform: translateY(200px);
        background-color: #fff;
        width: 95%;
        border-radius: 10px;
    }

    .file-upload-box:hover .infoImg {
        color: #0a58ca;
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
        background-color: rgb(10, 88, 202) !important;
        color: #fff !important;
        border-radius: 50% !important;
    }

    .owl-next {
        position: absolute;
        right: 0;
        top: 40%;
        width: 30px;
        height: 30px;
        background-color: rgb(10, 88, 202) !important;
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
</style>

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
                    <img src="{{ url('storage')}}/{{ Auth::user()->member_pic }}" alt="User" class="rounded-circle p-1" width="110">
                    @else
                    <img src="{{asset('img/icon/user.jpg')}}" alt="User" class="rounded-circle p-1 bg-primary" width="110">
                    @endif
                    <div class="mt-3">
                        <h4>{{Auth::user()->name}}</h4>

                        <p class="text-secondary mb-1">{{Auth::user()->username}}</p>
                        <p class="text-muted font-size-sm">{{Auth::user()->member_co}}</p>
                        <a class="btn btn-outline-primary px-5 " href="{{ url('/user/' . Auth::user()->id . '/edit') }}">แก้ไข</a>
                    </div>
                </div>
                <!-- <hr class="my-4"> -->
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="card border-top border-0 border-4 border-primary">
            <div class="card-body p-5">
                <div class="card-title d-flex align-items-center">
                    <div>                        
                        <img src="{{asset('img/icon/iconHaderDriversSlash.png')}}" alt="User" class="me-1" width="22.5">
                    </div>
                    <h5 class="mb-0 text-primary headerCustomer">เพิ่มข้อมูล Blacklist พนักงานขับรถ</h5>
                </div>
                <hr>
                <div class="row g-3">
                    <div class="col-md-4 mt-md-4 ">
                        <!-- {{-- <label for="inputLastName1" class="form-label">นามสุกล</label> --}} -->
                        <div class="input-group ">
                            <div class="inputGroup w-100">
                                <input name="d_name" type="text" id="d_name" value="{{ isset($customer->d_name) ? $customer->d_name : '' }}" required="" autocomplete="off">
                                <label for="d_name"><i class="fa-solid fa-user"></i> ชื่อ <span class="text-danger">*</span></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-md-4 ">
                        <!-- {{-- <label for="inputLastName1" class="form-label">นามสุกล</label> --}} -->
                        <div class="input-group ">
                            <div class="inputGroup w-100">
                                <input name="d_surname" type="text" id="d_surname" value="{{ isset($customer->d_surname) ? $customer->d_surname : '' }}" required="" autocomplete="off">
                                <label for="d_surname"><i class="fa-solid fa-user"></i> นามสกุล <span class="text-danger">*</span></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-md-4" style="position:relative;">
                        <!-- {{-- <label for="inputLastName1" class="form-label">ชื่อ</label> --}} -->
                        <span id="warning_d_idno" class="text-danger d-none" style="position:absolute;bottom:-25px;font-size: 13px;">
                            <i class="fa-solid fa-triangle-exclamation fa-beat"></i>
                            หมายเลขบัตรประชาชนไม่ถูกต้อง
                        </span>
                        <span id="success_d_idno" class="text-success d-none" style="position:absolute;bottom:-25px;font-size: 13px;">
                            <i class="fa-solid fa-shield-check"></i>
                            หมายเลขบัตรประชาชนครบถ้วนแล้ว
                        </span>
                        <div class="input-group ">
                            <div class="inputGroup w-100">
                                <input type="text" required="" autocomplete="off" name="d_idno" id="d_idno" value="{{ isset($customer->d_idno) ? $customer->d_idno : '' }}" onchange="check_amount_d_idno();">
                                <label for="d_idno"><i class="fa-solid fa-id-card"></i> หมายเลขบัตรประชาชน <span class="text-danger">*</span></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="inputLastName1" class="form-label subHeaderCustomer">ลักษณะการกระทำความผิด  <span class="text-danger">*</span></label>
                    </div>
                    <div class="col-12 mb-md-0">
                        <ul class="nav nav-pills mb-3" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link navDanger active" data-bs-toggle="pill" href="#corrupt" role="tab" aria-selected="true">
                                    <div class="d-flex align-items-center font-tab">
                                        <div class="tab-icon"><i class="fa-solid fa-user-police-tie me-1"></i>
                                        </div>
                                        <div class="tab-title">1.หมวดทุจริต</div>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link navWarning" data-bs-toggle="pill" href="#discipline" role="tab" aria-selected="false">
                                    <div class="d-flex align-items-center font-tab">
                                        <div class="tab-icon"><i class="fa-solid fa-books me-1"></i>
                                        </div>
                                        <div class="tab-title">2.หมวดวินัย</div>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link navSuccess" data-bs-toggle="pill" href="#blacklist" role="tab" aria-selected="false">
                                    <div class="d-flex align-items-center font-tab">
                                        <div class="tab-icon"><i class="fa-regular fa-file-shield me-1"></i>
                                        </div>
                                        <div class="tab-title">3.หมวดบัญชีดำ</div>
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
                                        <input class="radio-input demerit" type="checkbox" name="demerit[]" id="demerit" value="1.ปลอมแปลงเอกสารใบลงเวลา/บิลน้ำมัน">
                                        <span class="radio-tile radio-danger">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">1.ปลอมแปลงเอกสารใบลงเวลา/บิลน้ำมัน</span>
                                        </span>
                                    </label>
                                    <label>
                                        <input class="radio-input demerit" type="checkbox" name="demerit[]" id="demerit" value="2.ลักทรัพย์นายจ้าง">
                                        <span class="radio-tile radio-danger">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">2.ลักทรัพย์นายจ้าง</span>
                                        </span>
                                    </label>
                                    <label>
                                        <input class="radio-input demerit" type="checkbox" name="demerit[]" id="demerit" value="3.ยักยอกรถยนต์หรือทรัพย์สิน">
                                        <span class="radio-tile radio-danger">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">3.ยักยอกรถยนต์หรือทรัพย์สิน</span>
                                        </span>
                                    </label>
                                    <label>
                                        <input class="radio-input demerit" type="checkbox" name="demerit[]" id="demerit" value="4.ทำร้ายร่างกาย">
                                        <span class="radio-tile radio-danger">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">4.ทำร้ายร่างกาย</span>
                                        </span>
                                    </label>
                                    <label>
                                        <input class="radio-input demerit" type="checkbox" name="demerit[]" id="demerit" value="5.ความผิดคดีอาญาหรือทุจริตอื่นๆ">
                                        <span class="radio-tile radio-danger">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">5.ความผิดคดีอาญาหรือทุจริตอื่นๆ</span>
                                        </span>
                                    </label>
                                    <label>
                                        <input class="radio-input demerit" type="checkbox" name="demerit[]" id="demerit" value="6.อื่นๆ">
                                        <span class="radio-tile radio-danger">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">6.อื่นๆ</span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="discipline" role="tabpanel">
                                <div class="groupOffense">
                                    <label>
                                        <input class="radio-input demerit" type="checkbox" name="demerit[]" id="demerit" value="7.ทิ้งงาน">
                                        <span class="radio-tile radio-warning">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">7.ทิ้งงาน</span>
                                        </span>
                                    </label>
                                    <label>
                                        <input class="radio-input demerit" type="checkbox" name="demerit[]" id="demerit" value="8.ทะเลาะวิวาท">
                                        <span class="radio-tile radio-warning">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">8.ทะเลาะวิวาท</span>
                                        </span>
                                    </label>
                                    <label>
                                        <input class="radio-input demerit" type="checkbox" name="demerit[]" id="demerit" value="9.ยืมเงินลูกค้า">
                                        <span class="radio-tile radio-warning">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">9.ยืมเงินลูกค้า</span>
                                        </span>
                                    </label>
                                    <label>
                                        <input class="radio-input demerit" type="checkbox" name="demerit[]" id="demerit" value="10.ไม่เก็บรักษาความลับ">
                                        <span class="radio-tile radio-warning">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">10.ไม่เก็บรักษาความลับ</span>
                                        </span>
                                    </label>
                                    <label>
                                        <input class="radio-input demerit" type="checkbox" name="demerit[]" id="demerit" value="11.ปิดมือถือติดต่อไม่ได้">
                                        <span class="radio-tile radio-warning">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">11.ปิดมือถือติดต่อไม่ได้</span>
                                        </span>
                                    </label>
                                    <label>
                                        <input class="radio-input demerit" type="checkbox" name="demerit[]" id="demerit" value="12.โกหกบ่อยครั้ง">
                                        <span class="radio-tile radio-warning">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">12.โกหกบ่อยครั้ง</span>
                                        </span>
                                    </label>
                                    <label>
                                        <input class="radio-input demerit" type="checkbox" name="demerit[]" id="demerit" value="13.ฟ้องร้องนายจ้างหรือร้องตรวจแรงงานที่เป็นเท็จ">
                                        <span class="radio-tile radio-warning">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">13.ฟ้องร้องนายจ้างหรือร้องตรวจแรงงานที่เป็นเท็จ</span>
                                        </span>
                                    </label>
                                    <label>
                                        <input class="radio-input demerit" type="checkbox" name="demerit[]" id="demerit" value="14.เมาสุรา/เสพสารเสพติด">
                                        <span class="radio-tile radio-warning">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">14.เมาสุรา/เสพสารเสพติด</span>
                                        </span>
                                    </label>
                                    <label>
                                        <input class="radio-input demerit" type="checkbox" name="demerit[]" id="demerit" value="15.อื่นๆ">
                                        <span class="radio-tile radio-warning">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">15.อื่นๆ</span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="blacklist" role="tabpanel">
                                <div class="groupOffense">
                                    <label>
                                        <input class="radio-input demerit" type="checkbox" name="demerit[]" id="demerit" value="16.ขับรถอันตราย">
                                        <span class="radio-tile radio-success">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">16.ขับรถอันตราย</span>
                                        </span>
                                    </label>
                                    <label>
                                        <input class="radio-input demerit" type="checkbox" name="demerit[]" id="demerit" value="17.มาสาย">
                                        <span class="radio-tile radio-success">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">17.มาสาย</span>
                                        </span>
                                    </label>
                                    <label>
                                        <input class="radio-input demerit" type="checkbox" name="demerit[]" id="demerit" value="18.สตาร์ทรถรอลูกค้า">
                                        <span class="radio-tile radio-success">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">18.สตาร์ทรถรอลูกค้า</span>
                                        </span>
                                    </label>
                                    <label>
                                        <input class="radio-input demerit" type="checkbox" name="demerit[]" id="demerit" value="19.ทัศนคติ/การบริการไม่ดี">
                                        <span class="radio-tile radio-success">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">19.ทัศนคติ/การบริการไม่ดี</span>
                                        </span>
                                    </label>
                                    <label>
                                        <input class="radio-input demerit" type="checkbox" name="demerit[]" id="demerit" value="20.ไม่รู้เส้นทาง">
                                        <span class="radio-tile radio-success">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">20.ไม่รู้เส้นทาง</span>
                                        </span>
                                    </label>
                                    <label>
                                        <input class="radio-input demerit" type="checkbox" name="demerit[]" id="demerit" value="21.ขัดคำสั่งลูกค้า/นายจ้าง">
                                        <span class="radio-tile radio-success">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">21.ขัดคำสั่งลูกค้า/นายจ้าง</span>
                                        </span>
                                    </label>
                                    <label>
                                        <input class="radio-input demerit" type="checkbox" name="demerit[]" id="demerit" value="22.แต่งกาย/พูดจา ไม่สุภาพ">
                                        <span class="radio-tile radio-success">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">22.แต่งกาย/พูดจา ไม่สุภาพ</span>
                                        </span>
                                    </label>
                                    <label>
                                        <input class="radio-input demerit" type="checkbox" name="demerit[]" id="demerit" value="23.ลักลอบนำรถยนต์ไปใช้ส่วนตัว">
                                        <span class="radio-tile radio-success">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">23.ลักลอบนำรถยนต์ไปใช้ส่วนตัว</span>
                                        </span>
                                    </label>
                                    <label>
                                        <input class="radio-input demerit" type="checkbox" name="demerit[]" id="demerit" value="24.อื่นๆ">
                                        <span class="radio-tile radio-success">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">24.อื่นๆ</span>
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

                    <div class="col-12">
                        <label for="inputLastName1" class="form-label subHeaderCustomer">วัน/เดือน/ปี ที่กระทำความผิด <span class="text-danger">*</span></label>
                    </div>
                    <div class="col-md-6 mt-md-1 mb-md-2">
                        <!-- {{-- <label for="inputLastName1" class="form-label">ชื่อ</label> --}} -->
                        <div class="input-group ">
                            <div class="inputGroup ">
                                <input name="d_date" id="d_date" class="selectDate" type="date"  placeholder="dd-mm-yyyy" required>
                        
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-2">
                        <label for="inputLastName1" class="form-label subHeaderCustomer">แนบหลักฐานการกระทำความผิด</label>
                    </div>
                    <div class="row">
                        <div class="col-12 mt-3">
                            <ul class="nav nav-tabs nav-danger" role="tablist">
                                <li class="nav-item" role="presentation" onclick="change_name_nav('d_pic_id_card');">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#nav_d_pic_id_card" role="tab" aria-selected="true">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-title">
                                                1.
                                                <span id="title_nav_d_pic_id_card" class="d-none">
                                                    สำเนาบัตร..
                                                </span>
                                            </div>
                                            <div id="name_nav_d_pic_id_card" class="tab-title">สำเนาบัตรประชาชน / PassPort</div>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation" onclick="change_name_nav('d_pic_indictment');">
                                    <a class="nav-link" data-bs-toggle="tab" href="#nav_d_pic_indictment" role="tab" aria-selected="false">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-title">
                                                2.
                                                <span id="title_nav_d_pic_indictment" class="">
                                                    คำฟ้อง..
                                                </span>
                                            </div>
                                            <div id="name_nav_d_pic_indictment" class="tab-title d-none">คำฟ้องหรือใบร้องทุกข์แจ้งความดำเนินดคี</div>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation" onclick="change_name_nav('d_pic_cap');">
                                    <a class="nav-link" data-bs-toggle="tab" href="#nav_d_pic_cap" role="tab" aria-selected="false">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-title">
                                                3.
                                                <span id="title_nav_d_pic_cap" class="">
                                                    หลักฐาน..
                                                </span>
                                            </div>
                                            <div id="name_nav_d_pic_cap" class="tab-title d-none">หลักฐานการพูด-คุย</div>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation" onclick="change_name_nav('d_pic_other');">
                                    <a class="nav-link" data-bs-toggle="tab" href="#nav_d_pic_other" role="tab" aria-selected="false">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-title">
                                                4.
                                                <span id="title_nav_d_pic_other" class="">
                                                    อื่นๆ
                                                </span>
                                            </div>
                                            <div id="name_nav_d_pic_other" class="tab-title d-none">อื่นๆ</div>
                                        </div>
                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content py-3">
                                <!-- เพิ่มสำเนาบัตรประชาชน -->
                                <div class="tab-pane fade show active" id="nav_d_pic_id_card" role="tabpanel">
                                    <input class="d-none" type="file" id="d_pic_id_card" name="d_pic_id_card[]" accept="image/*" multiple onchange="on_select_file_input('d_pic_id_card');">
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
                                                <div id="img_d_pic_id_card_{{ $i }}" class=" file-upload-box upload-id-card {{ $class_div_id_card }}" onclick="document.querySelector('#d_pic_id_card').click();" >
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
                                <!-- คำฟ้องหรือใบร้องทุกข์แจ้งความดำเนินดคี -->
                                <div class="tab-pane fade" id="nav_d_pic_indictment" role="tabpanel">
                                    <input class="d-none" type="file" id="d_pic_indictment" name="d_pic_indictment[]" accept="image/*" multiple onchange="on_select_file_input('d_pic_indictment');">
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
                                                <div id="img_d_pic_indictment_{{ $i }}" class="file-upload-box upload-id-card {{ $class_div_certificate }}" onclick="document.querySelector('#d_pic_indictment').click();">
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
                                <div class="tab-pane fade" id="nav_d_pic_cap" role="tabpanel">
                                    <input class="d-none" type="file" id="d_pic_cap" name="d_pic_cap[]" accept="image/*" multiple onchange="on_select_file_input('d_pic_cap');">
                                    <div class="row">
                                        <h6 class="mt-2 mb-2">
                                            หลักฐานการพูด-คุย (สูงสุด 10 ไฟล์)
                                        </h6>
                                        @for($i=1; $i < 11; $i++)

                                            @php 
                                                if($i == 1){
                                                    $class_div_d_pic_cap = '' ;
                                                }else{
                                                    $class_div_d_pic_cap = 'd-none' ;
                                                }
                                            @endphp
                                            <div class="p-1 col-4">
                                                <div id="img_d_pic_cap_{{ $i }}" class="file-upload-box upload-id-card {{ $class_div_d_pic_cap }}" onclick="document.querySelector('#d_pic_cap').click();">
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
                                <div class="tab-pane fade" id="nav_d_pic_other" role="tabpanel">
                                    <input class="d-none" type="file" id="d_pic_other" name="d_pic_other[]" accept="image/*" multiple onchange="on_select_file_input('d_pic_other');">
                                    <div class="row">
                                        <h6 class="mt-2 mb-2">
                                            อื่นๆ (สูงสุด 10 ไฟล์)
                                        </h6>
                                        @for($i=1; $i < 11; $i++)

                                            @php 
                                                if($i == 1){
                                                    $class_div_d_pic_other = '' ;
                                                }else{
                                                    $class_div_d_pic_other = 'd-none' ;
                                                }
                                            @endphp
                                            <div class="p-1 col-4">
                                                <div id="img_d_pic_other_{{ $i }}" class="file-upload-box upload-id-card {{ $class_div_d_pic_other }}" onclick="document.querySelector('#d_pic_other').click();">
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
                        <!-- <a id="btnSubmitFormCreateDriver" type="submit" class="btn btn-primary px-5 float-end" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}" onclick="checkvaluedemerit()">ยืนยัน</a> -->

                        <a id="btnSubmitFormCreateDriver" onclick="checkvaluedemerit();"class="btn btn-primary px-5 float-end">ยืนยัน</a>

                        <span id="span_on_submit" class="btn btn-sm btn-info d-none" onclick="on_submit();">
                            on_submit
                        </span>
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

<!-- เช็คข้อมูลครบถ้วนหรือไม่ -->
<script>
    const demeritCheckboxes = document.querySelectorAll('input[id="demerit"]');
    const formCreateDriver = document.getElementById('formCreateDriver');
    const otherCheckboxes = document.querySelectorAll('input[id="demerit"][value="อื่นๆ"]');
    var checkdemerit = false;


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
            dangerAlert("กรุณาเลือกลักษณะการกระทำความผิด อย่างน้อย 1 อย่าง");

        } else {
            let dIdnoInput = document.getElementById('d_idno').value;
                dIdnoInput = dIdnoInput.replaceAll("-","");

            if(dIdnoInput.length != 13){
                document.getElementById('d_idno').focus();
            }else{
                checkdemerit = true;
            }
        }
    }

    $("#btnSubmitFormCreateDriver").click(function(event) {
        if ($("#formCreateDriver")[0].checkValidity()) {
            if (checkdemerit) {
                // console.log('success');

                $('#saveDataSuccess').modal('show');

                setTimeout(function() {
                    document.querySelector(".loading-spinner").style.display = "none";
                    document.querySelector(".contrainerCheckmark").classList.remove('d-none');
                }, 3000);

                setTimeout(function() {
                    // $("#formCreateDriver")[0].submit();
                    document.querySelector('#span_on_submit').click();
                }, 4000);
            }
        } else {
            // Validate Form
            $("#formCreateDriver")[0].reportValidity();
            event.preventDefault();
        }
    });
</script>

<!-- ON SUBMIT -->
<script>
    function on_submit(){

        let user_id = document.querySelector('#user_id');
        let d_name = document.querySelector('#d_name');
        let d_surname = document.querySelector('#d_surname');
        let d_idno = document.querySelector('#d_idno');
    
        // textaarea
        let demeritdetail = document.querySelector('#demeritdetail');
        // date
        let d_date = document.querySelector('#d_date');

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
        if(document.querySelector('#d_name')){
            formData.append('d_name', d_name.value);
            formData.append('d_surname', d_surname.value);
            formData.append('d_idno', d_idno.value);
        }

        formData.append('user_id', user_id.value);
        formData.append('demeritdetail', demeritdetail.value);
        formData.append('d_date', d_date.value);
        formData.append('demerit', all_demerit);

        // เพิ่มไฟล์รูปภาพ เข้า formData เพื่อเตรียมส่งข้อมูล
        for (let file_1 of all_files['d_pic_id_card']) {
            formData.append('d_pic_id_card[]', file_1);
        }

        for (let file_3 of all_files['d_pic_indictment']) {
            formData.append('d_pic_indictment[]', file_3);
        }

        for (let file_4 of all_files['d_pic_cap']) {
            formData.append('d_pic_cap[]', file_4);
        }

        for (let file_5 of all_files['d_pic_other']) {
            formData.append('d_pic_other[]', file_5);
        }

        // ส่งข้อมูล
        const apiUrl = "{{ url('/') }}/api/driver_upload_api";

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
        all_files['d_pic_id_card'] = [];
        all_files['d_pic_indictment'] = [];
        all_files['d_pic_cap'] = [];
        all_files['d_pic_other'] = [];

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
            case "d_pic_id_card":
                maxFileCount = 2 ;
                text_name_input = "สำเนาบัตรประชาชน / PassPort" ;
                icon = 'id-card.png' ;
            break;
            case "d_pic_indictment":
                maxFileCount = 5 ;
                text_name_input = "คำฟ้องหรือใบร้องทุกข์แจ้งความดำเนินดคี" ;
                icon = 'legal.png' ;
            break;
            case "d_pic_cap":
                maxFileCount = 10 ;
                text_name_input = "หลักฐานการพูด-คุย" ;
                icon = 'chat.png' ;
            break;
            case "d_pic_other":
                maxFileCount = 10 ;
                text_name_input = "อื่นๆ" ;
                icon = 'other.png' ;
            break;
        }

        return maxFileCount + "," + text_name_input + "," + icon ;

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
            case "d_pic_id_card":
                maxFileCount = 2 ;
                text_name_input = "ภาพบัตรประชาชน" ;
            break;
            case "d_pic_indictment":
                maxFileCount = 5 ;
                text_name_input = "คำฟ้องหรือใบร้องทุกข์แจ้งความดำเนินดคี" ;
            break;
            case "d_pic_cap":
                maxFileCount = 10 ;
                text_name_input = "หลักฐานการพูด-คุย" ;
            break;
            case "d_pic_other":
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
        let dIdnoInput = document.getElementById('d_idno');

        dIdnoInput.addEventListener('input', function() {
            document.querySelector('#warning_d_idno').classList.add('d-none');
            let inputValue = dIdnoInput.value;
            let formattedValue = format_dIDNO(inputValue);
            dIdnoInput.value = formattedValue;

            let check_input_13 = dIdnoInput.value.replaceAll('-','');
                // console.log(check_input_13.length);
            if (check_input_13.length == 13) {
                // console.log('ครบ 13');
                document.querySelector('#success_d_idno').classList.remove('d-none');
                document.querySelector('#warning_d_idno').classList.add('d-none');
            }else{
                // console.log('ยังไม่ครบ 13 หรือเกิน');
                document.querySelector('#success_d_idno').classList.add('d-none');
            }
        });

        dIdnoInput.addEventListener('keydown', function(event) {
            if (event.key === 'Backspace') {
                // ตรวจสอบถ้าผู้ใช้กดปุ่ม Backspace ให้ลบตัวอักษรหรือเครื่องหมาย "-"
                let inputValue = dIdnoInput.value;
                let caretPosition = dIdnoInput.selectionStart;

                if (caretPosition > 0 && (inputValue[caretPosition - 1] === '-' || inputValue[caretPosition] === '-')) {
                    let newValue = inputValue.substring(0, caretPosition - 1) + inputValue.substring(caretPosition);
                    dIdnoInput.value = newValue;
                    dIdnoInput.setSelectionRange(caretPosition - 1, caretPosition - 1);
                }
            }
        });

        function format_dIDNO(input) {
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

    function check_amount_d_idno(){
        let dIdnoInput = document.getElementById('d_idno').value;
            dIdnoInput = dIdnoInput.replaceAll("-","");

        if(dIdnoInput.length != 13){
            document.querySelector('#warning_d_idno').classList.remove('d-none');
        }
    }
</script>

<script>
    function change_name_nav(type){

        document.querySelector('#name_nav_d_pic_id_card').classList.add('d-none');
        document.querySelector('#name_nav_d_pic_cap').classList.add('d-none');
        document.querySelector('#name_nav_d_pic_other').classList.add('d-none');

        document.querySelector('#title_nav_d_pic_id_card').classList.remove('d-none');
        document.querySelector('#title_nav_d_pic_cap').classList.remove('d-none');
        document.querySelector('#title_nav_d_pic_other').classList.remove('d-none');

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


























<!-- 

<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'User Id' }}</label>
    <input class="form-control" name="user_id" type="number" id="user_id" value="{{ isset($driver->user_id) ? $driver->user_id : ''}}" >
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('compname') ? 'has-error' : ''}}">
    <label for="compname" class="control-label">{{ 'Compname' }}</label>
    <input class="form-control" name="compname" type="text" id="compname" value="{{ isset($driver->compname) ? $driver->compname : ''}}" >
    {!! $errors->first('compname', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('commercial_registration') ? 'has-error' : ''}}">
    <label for="commercial_registration" class="control-label">{{ 'Commercial Registration' }}</label>
    <input class="form-control" name="commercial_registration" type="text" id="commercial_registration" value="{{ isset($driver->commercial_registration) ? $driver->commercial_registration : ''}}" >
    {!! $errors->first('commercial_registration', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('d_name') ? 'has-error' : ''}}">
    <label for="d_name" class="control-label">{{ 'D Name' }}</label>
    <input class="form-control" name="d_name" type="text" id="d_name" value="{{ isset($driver->d_name) ? $driver->d_name : ''}}" >
    {!! $errors->first('d_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('d_surname') ? 'has-error' : ''}}">
    <label for="d_surname" class="control-label">{{ 'D Surname' }}</label>
    <input class="form-control" name="d_surname" type="text" id="d_surname" value="{{ isset($driver->d_surname) ? $driver->d_surname : ''}}" >
    {!! $errors->first('d_surname', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('d_idno') ? 'has-error' : ''}}">
    <label for="d_idno" class="control-label">{{ 'D Idno' }}</label>
    <input class="form-control" name="d_idno" type="text" id="d_idno" value="{{ isset($driver->d_idno) ? $driver->d_idno : ''}}" >
    {!! $errors->first('d_idno', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('demerit') ? 'has-error' : ''}}">
    <label for="demerit" class="control-label">{{ 'Demerit' }}</label>
    <input class="form-control" name="demerit" type="text" id="demerit" value="{{ isset($driver->demerit) ? $driver->demerit : ''}}" >
    {!! $errors->first('demerit', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('demeritdetail') ? 'has-error' : ''}}">
    <label for="demeritdetail" class="control-label">{{ 'Demeritdetail' }}</label>
    <input class="form-control" name="demeritdetail" type="text" id="demeritdetail" value="{{ isset($driver->demeritdetail) ? $driver->demeritdetail : ''}}" >
    {!! $errors->first('demeritdetail', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('d_pic_id_card') ? 'has-error' : ''}}">
    <label for="d_pic_id_card" class="control-label">{{ 'D Pic Id Card' }}</label>
    <input class="form-control" name="d_pic_id_card" type="text" id="d_pic_id_card" value="{{ isset($driver->d_pic_id_card) ? $driver->d_pic_id_card : ''}}" >
    {!! $errors->first('d_pic_id_card', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('d_pic_lease') ? 'has-error' : ''}}">
    <label for="d_pic_lease" class="control-label">{{ 'D Pic Lease' }}</label>
    <input class="form-control" name="d_pic_lease" type="text" id="d_pic_lease" value="{{ isset($driver->d_pic_lease) ? $driver->d_pic_lease : ''}}" >
    {!! $errors->first('d_pic_lease', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('d_pic_cap') ? 'has-error' : ''}}">
    <label for="d_pic_cap" class="control-label">{{ 'D Pic Cap' }}</label>
    <input class="form-control" name="d_pic_cap" type="text" id="d_pic_cap" value="{{ isset($driver->d_pic_cap) ? $driver->d_pic_cap : ''}}" >
    {!! $errors->first('d_pic_cap', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('d_pic_other') ? 'has-error' : ''}}">
    <label for="d_pic_other" class="control-label">{{ 'D Pic Other' }}</label>
    <input class="form-control" name="d_pic_other" type="text" id="d_pic_other" value="{{ isset($driver->d_pic_other) ? $driver->d_pic_other : ''}}" >
    {!! $errors->first('d_pic_other', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('d_date') ? 'has-error' : ''}}">
    <label for="d_date" class="control-label">{{ 'D Date' }}</label>
    <input class="form-control" name="d_date" type="text" id="d_date" value="{{ isset($driver->d_date) ? $driver->d_date : ''}}" >
    {!! $errors->first('d_date', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div> -->