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
                    <div class="col-md-4 mt-md-4">
                        <!-- {{-- <label for="inputLastName1" class="form-label">ชื่อ</label> --}} -->
                        <div class="input-group ">
                            <div class="inputGroup w-100">
                                <input type="text" required="" autocomplete="off" name="d_idno" id="d_idno" value="{{ isset($customer->d_idno) ? $customer->d_idno : '' }}">
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
                                        <div class="tab-title">หมวดทุจริต</div>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link navWarning" data-bs-toggle="pill" href="#discipline" role="tab" aria-selected="false">
                                    <div class="d-flex align-items-center font-tab">
                                        <div class="tab-icon"><i class="fa-solid fa-books me-1"></i>
                                        </div>
                                        <div class="tab-title">หมวดวินัย</div>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link navSuccess" data-bs-toggle="pill" href="#blacklist" role="tab" aria-selected="false">
                                    <div class="d-flex align-items-center font-tab">
                                        <div class="tab-icon"><i class="fa-regular fa-file-shield me-1"></i>
                                        </div>
                                        <div class="tab-title">หมวดบัญชีดำ</div>
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
                                        <input class="radio-input" type="checkbox" name="demerit[]" id="demerit" value="ปลอมแปลงเอกสารใบลงเวลา/บิลน้ำมัน">
                                        <span class="radio-tile radio-danger">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">1.ปลอมแปลงเอกสารใบลงเวลา/บิลน้ำมัน</span>
                                        </span>
                                    </label>
                                    <label>
                                        <input class="radio-input" type="checkbox" name="demerit[]" id="demerit" value="ลักทรัพย์นายจ้าง">
                                        <span class="radio-tile radio-danger">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">2.ลักทรัพย์นายจ้าง</span>
                                        </span>
                                    </label>
                                    <label>
                                        <input class="radio-input" type="checkbox" name="demerit[]" id="demerit" value="ยักยอกรถยนต์หรือทรัพย์สิน">
                                        <span class="radio-tile radio-danger">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">3.ยักยอกรถยนต์หรือทรัพย์สิน</span>
                                        </span>
                                    </label>
                                    <label>
                                        <input class="radio-input" type="checkbox" name="demerit[]" id="demerit" value="ทำร้ายร่างกาย">
                                        <span class="radio-tile radio-danger">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">4.ทำร้ายร่างกาย</span>
                                        </span>
                                    </label>
                                    <label>
                                        <input class="radio-input" type="checkbox" name="demerit[]" id="demerit" value="ความผิดคดีอาญาหรือทุจริตอื่นๆ">
                                        <span class="radio-tile radio-danger">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">5.ความผิดคดีอาญาหรือทุจริตอื่นๆ</span>
                                        </span>
                                    </label>
                                    <label>
                                        <input class="radio-input" type="checkbox" name="demerit[]" id="demerit" value="อื่นๆ">
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
                                        <input class="radio-input" type="checkbox" name="demerit[]" id="demerit" value="ทิ้งงาน">
                                        <span class="radio-tile radio-warning">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">7.ทิ้งงาน</span>
                                        </span>
                                    </label>
                                    <label>
                                        <input class="radio-input" type="checkbox" name="demerit[]" id="demerit" value="ทะเลาะวิวาท">
                                        <span class="radio-tile radio-warning">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">8.ทะเลาะวิวาท</span>
                                        </span>
                                    </label>
                                    <label>
                                        <input class="radio-input" type="checkbox" name="demerit[]" id="demerit" value="ยืมเงินลูกค้า">
                                        <span class="radio-tile radio-warning">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">9.ยืมเงินลูกค้า</span>
                                        </span>
                                    </label>
                                    <label>
                                        <input class="radio-input" type="checkbox" name="demerit[]" id="demerit" value="ไม่เก็บรักษาความลับ">
                                        <span class="radio-tile radio-warning">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">10.ไม่เก็บรักษาความลับ</span>
                                        </span>
                                    </label>
                                    <label>
                                        <input class="radio-input" type="checkbox" name="demerit[]" id="demerit" value="ปิดมือถือติดต่อไม่ได้">
                                        <span class="radio-tile radio-warning">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">11.ปิดมือถือติดต่อไม่ได้</span>
                                        </span>
                                    </label>
                                    <label>
                                        <input class="radio-input" type="checkbox" name="demerit[]" id="demerit" value="โกหกบ่อยครั้ง">
                                        <span class="radio-tile radio-warning">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">12.โกหกบ่อยครั้ง</span>
                                        </span>
                                    </label>
                                    <label>
                                        <input class="radio-input" type="checkbox" name="demerit[]" id="demerit" value="ฟ้องร้องนายจ้างหรือร้องตรวจแรงงานที่เป็นเท็จ">
                                        <span class="radio-tile radio-warning">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">13.ฟ้องร้องนายจ้างหรือร้องตรวจแรงงานที่เป็นเท็จ</span>
                                        </span>
                                    </label>
                                    <label>
                                        <input class="radio-input" type="checkbox" name="demerit[]" id="demerit" value="อื่นๆ">
                                        <span class="radio-tile radio-warning">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">14.อื่นๆ</span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="blacklist" role="tabpanel">
                                <div class="groupOffense">
                                    <label>
                                        <input class="radio-input" type="checkbox" name="demerit[]" id="demerit" value="ขับรถอันตราย">
                                        <span class="radio-tile radio-success">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">15.ขับรถอันตราย</span>
                                        </span>
                                    </label>
                                    <label>
                                        <input class="radio-input" type="checkbox" name="demerit[]" id="demerit" value="มาสาย">
                                        <span class="radio-tile radio-success">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">16.มาสาย</span>
                                        </span>
                                    </label>
                                    <label>
                                        <input class="radio-input" type="checkbox" name="demerit[]" id="demerit" value="สตาร์ทรถรอลูกค้า">
                                        <span class="radio-tile radio-success">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">17.สตาร์ทรถรอลูกค้า</span>
                                        </span>
                                    </label>
                                    <label>
                                        <input class="radio-input" type="checkbox" name="demerit[]" id="demerit" value="ทัศนคติ/การบริการไม่ดี">
                                        <span class="radio-tile radio-success">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">18.ทัศนคติ/การบริการไม่ดี</span>
                                        </span>
                                    </label>
                                    <label>
                                        <input class="radio-input" type="checkbox" name="demerit[]" id="demerit" value="ไม่รู้เส้นทาง">
                                        <span class="radio-tile radio-success">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">19.ไม่รู้เส้นทาง</span>
                                        </span>
                                    </label>
                                    <label>
                                        <input class="radio-input" type="checkbox" name="demerit[]" id="demerit" value="ขัดคำสั่งลูกค้า/นายจ้าง">
                                        <span class="radio-tile radio-success">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">20.ขัดคำสั่งลูกค้า/นายจ้าง</span>
                                        </span>
                                    </label>
                                    <label>
                                        <input class="radio-input" type="checkbox" name="demerit[]" id="demerit" value="แต่งกาย/พูดจา ไม่สุภาพ">
                                        <span class="radio-tile radio-success">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">21.แต่งกาย/พูดจา ไม่สุภาพ</span>
                                        </span>
                                    </label>
                                    <label>
                                        <input class="radio-input" type="checkbox" name="demerit[]" id="demerit" value="อื่นๆ">
                                        <span class="radio-tile radio-success">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">22.อื่นๆ</span>
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


                        <!-- <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade active show" id="corrupt" role="tabpanel">
                                <div class="groupOffense">
                                    <label>
                                        <input class="radio-input" type="checkbox" name="demerit[]" id="demerit" value="ลักลอบนำรถยนต์ไปใช้ส่วนตัว">
                                        <span class="radio-tile">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">1.ลักลอบนำรถยนต์ไปใช้ส่วนตัว</span>
                                        </span>
                                    </label>
                                    <label>
                                        <input class="radio-input" type="checkbox" name="demerit[]" id="demerit" value="ทุจริตโอที/บิลน้ำมัน">
                                        <span class="radio-tile">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">2.ทุจริตโอที/บิลน้ำมัน</span>
                                        </span>
                                    </label>
                                    <label>
                                        <input class="radio-input" type="checkbox" name="demerit[]" id="demerit" value="เสพสารเสพติด">
                                        <span class="radio-tile">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">3.เสพสารเสพติด</span>
                                        </span>
                                    </label>
                                    <label>
                                        <input class="radio-input" type="checkbox" name="demerit[]" id="demerit" value="เมาสุรา">
                                        <span class="radio-tile">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">4.เมาสุรา</span>
                                        </span>
                                    </label>
                                    <label>
                                        <input class="radio-input" type="checkbox" name="demerit[]" id="demerit" value="เล่นการพนัน">
                                        <span class="radio-tile">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">5.เล่นการพนัน</span>
                                        </span>
                                    </label>
                                    <label>
                                        <input class="radio-input" type="checkbox" name="demerit[]" id="demerit" value="อื่นๆ">
                                        <span class="radio-tile">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">อื่นๆ</span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="discipline" role="tabpanel">
                                <div class="groupOffense">
                                    <label>
                                        <input class="radio-input" type="checkbox" name="demerit[]" id="demerit" value="ยืมเงินลูกค้า">
                                        <span class="radio-tile">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">6.ยืมเงินลูกค้า</span>
                                        </span>
                                    </label>
                                    <label>
                                        <input class="radio-input" type="checkbox" name="demerit[]" id="demerit" value="ทิ้งงาน">
                                        <span class="radio-tile">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">7.ทิ้งงาน</span>
                                        </span>
                                    </label>
                                    <label>
                                        <input class="radio-input" type="checkbox" name="demerit[]" id="demerit" value="ทะเลาะวิวาท">
                                        <span class="radio-tile">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">8.ทะเลาะวิวาท</span>
                                        </span>
                                    </label>
                                    <label>
                                        <input class="radio-input" type="checkbox" name="demerit[]" id="demerit" value="โกหกบ่อยครั้ง">
                                        <span class="radio-tile">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">9.โกหกบ่อยครั้ง</span>
                                        </span>
                                    </label>
                                    <label>
                                        <input class="radio-input" type="checkbox" name="demerit[]" id="demerit" value="ไม่เก็บความลับ">
                                        <span class="radio-tile">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">10.ไม่เก็บความลับ</span>
                                        </span>
                                    </label>
                                    <label>
                                        <input class="radio-input" type="checkbox" name="demerit[]" id="demerit" value="ปิดมือถือติดต่อไม่ได้">
                                        <span class="radio-tile">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">11.ปิดมือถือติดต่อไม่ได้</span>
                                        </span>
                                    </label>
                                    <label>
                                        <input class="radio-input" type="checkbox" name="demerit[]" id="demerit" value="อื่นๆ">
                                        <span class="radio-tile">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">อื่นๆ</span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="service" role="tabpanel">
                                <div class="groupOffense">
                                    <label>
                                        <input class="radio-input" type="checkbox" name="demerit[]" id="demerit" value="ขับรถอันตราย">
                                        <span class="radio-tile">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">12.ขับรถอันตราย</span>
                                        </span>
                                    </label>
                                    <label>
                                        <input class="radio-input" type="checkbox" name="demerit[]" id="demerit" value="มาสาย">
                                        <span class="radio-tile">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">13.มาสาย</span>
                                        </span>
                                    </label>
                                    <label>
                                        <input class="radio-input" type="checkbox" name="demerit[]" id="demerit" value="ไม่รู้เส้นทาง">
                                        <span class="radio-tile">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">14.ไม่รู้เส้นทาง</span>
                                        </span>
                                    </label>
                                    <label>
                                        <input class="radio-input" type="checkbox" name="demerit[]" id="demerit" value="สตาร์ทรถรอลูกค้า">
                                        <span class="radio-tile">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">15.สตาร์ทรถรอลูกค้า</span>
                                        </span>
                                    </label>
                                    <label>
                                        <input class="radio-input" type="checkbox" name="demerit[]" id="demerit" value="ทัศนะคติ/การบริการไม่ดี">
                                        <span class="radio-tile">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">16.ทัศนะคติ/การบริการไม่ดี</span>
                                        </span>
                                    </label>

                                    <div class="col-12 mt-3">
                                        <label for="inputLastName1" class="form-label">ลักษณะกระทำความผิด <span class="text-danger">*</span></label>
                                    </div>
                                    <label>
                                        <input class="radio-input" type="checkbox" name="demerit[]" id="demerit" value="ขัดคำสั่ง ลูกค้า/นายจ้าง">
                                        <span class="radio-tile">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">17.ขัดคำสั่ง ลูกค้า/นายจ้าง</span>
                                        </span>
                                    </label>
                                    <label>
                                        <input class="radio-input" type="checkbox" name="demerit[]" id="demerit" value="แต่งกาย/คำพูด ไม่สุภาพ">
                                        <span class="radio-tile">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">18.แต่งกาย/คำพูด ไม่สุภาพ</span>
                                        </span>
                                    </label>
                                    <label>
                                        <input class="radio-input" type="checkbox" name="demerit[]" id="demerit" value="ฟ้องนายจ้าง หรือ ร้องตรวจแรงงานที่เป็นเท็จ">
                                        <span class="radio-tile">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">19.ฟ้องนายจ้าง หรือ ร้องตรวจแรงงานที่เป็นเท็จ</span>
                                        </span>
                                    </label>
                                    <label>
                                        <input class="radio-input" type="checkbox" name="demerit[]" id="demerit" value="อื่นๆ">
                                        <span class="radio-tile">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">อื่นๆ</span>
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
                        </div> -->
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
                            display: none;
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
                    <div class="selectPhoto">

                        <div class="owl-carousel owl-theme carouselSelectPhoto">

                            <div class="item">
                                <!-- <input type="file" id="avatar" name="avatar"accept="image/png, image/jpeg"> -->
                                <!-- <label class="inputSelectFile" for="c_pic_execution">d</label>
                                <input class="form-control d-none" name="c_pic_execution" type="file" id="c_pic_execution" value="{{ isset($customer->c_pic_execution) ? $customer->c_pic_execution : '' }}"> -->
                                <style>
                                    .imgUpLoad {
                                        width: 75px !important;
                                        height: 75px !important;
                                    }

                                    .upload-id-card:hover {
                                        background-color: rgb(114, 85, 206, 0.2) !important;
                                    }

                                    .upload-id-card:hover .upload-text {
                                        color: #7255ce !important;
                                    }

                                    .upload-lease:hover {
                                        background-color: rgb(39, 166, 255, 0.2) !important;
                                    }

                                    .upload-lease:hover .upload-text {
                                        color: #1f496e !important;
                                    }

                                    .upload-execution:hover {
                                        background-color: rgb(221, 125, 0, 0.2) !important;
                                    }

                                    .upload-execution:hover .upload-text {
                                        color: #dd7d00 !important;
                                    }

                                    .upload-capture:hover {
                                        background-color: rgb(0, 51, 112, 0.2) !important;

                                    }

                                    .upload-capture:hover .upload-text {
                                        color: #003370 !important;
                                    }

                                    .upload-other:hover {
                                        background-color: rgb(255, 68, 68, 0.2) !important;
                                    }

                                    .upload-other:hover .upload-text {
                                        color: #ff4444 !important;
                                    }
                                </style>
                                <div class="file-upload-box upload-id-card">
                                    <div id="clear-button" style="display: none;">
                                        <span class="clear-button">
                                            <i class="fa-solid fa-xmark"></i>
                                        </span>
                                    </div>
                                    <input type="file" id="d_pic_id_card" name="d_pic_id_card" value="{{ isset($driver->d_pic_id_card) ? $driver->d_pic_id_card : ''}}" accept="image/*" style="display: none;">
                                    <div class="loader">
                                        <div class="spinner"></div>
                                        <p>กำลังอัปโหลด...</p>
                                    </div>
                                    <img class="file-preview" src="#" alt="ภาพตัวอย่าง" style="display: none;">
                                    <div class="infoImg" style="display: none;">
                                        <span class="m-0 imgName"></span>
                                        <p class="m-0">
                                            <span class="imgSize"></span>
                                            <span class="imgFile"></span>
                                        </p>
                                    </div>

                                    <div class="upload-text text-center">
                                        <div class="w-100 d-flex justify-content-center mb-3">
                                            <img src="{{asset('img/icon/id-card.png')}}" alt="User" class="imgUpLoad" width="50">
                                        </div>
                                        <span>สำเนาบัตรประชาชน</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <!-- <h6>สัญญาเช่า</h6> -->
                                <div class="file-upload-box upload-execution">
                                    <div id="clear-button" style="display: none;">
                                        <span class="clear-button">
                                            <i class="fa-solid fa-xmark"></i>
                                        </span>
                                    </div>
                                    <input type="file" id="d_pic_indictment" name="d_pic_indictment" value="{{ isset($driver->d_pic_indictment) ? $driver->d_pic_indictment : ''}}" accept="image/*" style="display: none;">
                                    <div class="loader">
                                        <div class="spinner"></div>
                                        <p>กำลังอัปโหลด...</p>
                                    </div>
                                    <img class="file-preview" src="#" alt="ภาพตัวอย่าง" style="display: none;">
                                    <div class="infoImg" style="display: none;">
                                        <span class="m-0 imgName"></span>
                                        <p class="m-0">
                                            <span class="imgSize"></span>
                                            <span class="imgFile"></span>
                                        </p>
                                    </div>

                                    <div class="upload-text text-center">
                                        <div class="w-100 d-flex justify-content-center mb-3">
                                            <img src="{{asset('img/icon/legal.png')}}" alt="คำฟ้องหรือใบร้องทุกข์ดำเนินดคี" class="imgUpLoad" width="50">
                                        </div>
                                        <span>คำฟ้องหรือใบร้องทุกข์ <br> แจ้งความดำเนินคดี</span>
                                    </div>
                                </div>
                            </div>

                            <div class="item">
                                <!-- <h6>ภาพแคป</h6> -->
                                <div class="file-upload-box upload-capture">
                                    <div id="clear-button" style="display: none;">
                                        <span class="clear-button">
                                            <i class="fa-solid fa-xmark"></i>
                                        </span>
                                    </div>
                                    <input type="file" id="d_pic_cap" name="d_pic_cap" value="{{ isset($driver->d_pic_cap) ? $driver->d_pic_cap : ''}}" accept="image/*" style="display: none;">
                                    <div class="loader">
                                        <div class="spinner"></div>
                                        <p>กำลังอัปโหลด...</p>
                                    </div>
                                    <img class="file-preview" src="#" alt="ภาพตัวอย่าง" style="display: none;">
                                    <div class="infoImg" style="display: none;">
                                        <span class="m-0 imgName"></span>
                                        <p class="m-0">
                                            <span class="imgSize"></span>
                                            <span class="imgFile"></span>
                                        </p>
                                    </div>
                                    <div class="upload-text text-center">
                                        <div class="w-100 d-flex justify-content-center mb-3">
                                            <img src="{{asset('img/icon/chat.png')}}" alt="User" class="imgUpLoad" width="50">
                                        </div>
                                        <span>หลักฐานการพูด-คุย</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <!-- <h6>ภาพอื่นๆ</h6> -->
                                <div class="file-upload-box upload-other">
                                    <div id="clear-button" style="display: none;">
                                        <span class="clear-button">
                                            <i class="fa-solid fa-xmark"></i>
                                        </span>
                                    </div>
                                    <input type="file" id="d_pic_other" name="d_pic_other" value="{{ isset($driver->d_pic_other) ? $driver->d_pic_other : ''}}" accept="image/*" style="display: none;">
                                    <div class="loader">
                                        <div class="spinner"></div>
                                        <p>กำลังอัปโหลด...</p>
                                    </div>
                                    <img class="file-preview" src="#" alt="ภาพตัวอย่าง" style="display: none;">
                                    <div class="infoImg" style="display: none;">
                                        <span class="m-0 imgName"></span>
                                        <p class="m-0">
                                            <span class="imgSize"></span>
                                            <span class="imgFile"></span>
                                        </p>
                                    </div>
                                    <div class="upload-text text-center">
                                        <div class="w-100 d-flex justify-content-center mb-3">
                                            <img src="{{asset('img/icon/other.png')}}" alt="User" class="imgUpLoad" width="50">
                                        </div>
                                        <span>อื่นๆ</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script>
                        function handleFileUpload(fileUploadBox) {
                            const fileInput = fileUploadBox.querySelector('input[type="file"]');
                            const loader = fileUploadBox.querySelector('.loader');
                            const filePreview = fileUploadBox.querySelector('.file-preview');
                            const uploadText = fileUploadBox.querySelector('.upload-text');
                            const infoImg = fileUploadBox.querySelector('.infoImg');
                            const clearButton = fileUploadBox.querySelector('#clear-button');
                            let isClearButtonClicked = false;
                            let isFileSelected = false;

                            clearButton.addEventListener('click', function() {
                                fileInput.value = null;
                                resetPreview();
                                isClearButtonClicked = true;
                                isFileSelected = false;
                            });

                            fileUploadBox.addEventListener('click', function() {
                                if (!isClearButtonClicked) {
                                    fileInput.click();
                                }
                                resetPreview();
                            });

                            fileInput.addEventListener('change', function(event) {
                                const file = event.target.files[0];
                                // Inside the fileInput.addEventListener('change', function (event) { ... }) block

                                if (file) {
                                    if (file.type.includes('image')) {
                                        isFileSelected = true;
                                        const reader = new FileReader();
                                        loader.style.display = 'block';
                                        filePreview.style.display = 'none';
                                        infoImg.style.display = 'none';
                                        uploadText.style.display = 'none';
                                        clearButton.style.display = 'none';

                                        reader.onload = function(e) {
                                            setTimeout(function() {
                                                if (isFileSelected) {
                                                    loader.style.display = 'none';
                                                    filePreview.src = e.target.result;
                                                    filePreview.style.display = 'block';
                                                    infoImg.style.display = 'block';
                                                    clearButton.style.display = 'block';

                                                    const fileName = file.name;
                                                    const fileSize = formatFileSize(file.size);
                                                    const fileExtension = getFileExtension(fileName);
                                                    const imgName = fileUploadBox.querySelector('.imgName');
                                                    const imgSize = fileUploadBox.querySelector('.imgSize');
                                                    const imgFile = fileUploadBox.querySelector('.imgFile'); // Add this line

                                                    const lastDotIndex = fileName.lastIndexOf('.');
                                                    const fileNameWithoutExtension = fileName.substring(0, lastDotIndex);

                                                    imgName.textContent = fileNameWithoutExtension;
                                                    imgSize.textContent = fileSize + ' | ';
                                                    imgFile.textContent = fileExtension; // Update this line
                                                }
                                            }, 2000);
                                        };

                                        reader.readAsDataURL(file);
                                    } else {
                                        upload_file_error();
                                    }
                                } else {
                                    resetPreview();
                                }

                            });

                            function resetPreview() {
                                fileInput.value = null;
                                loader.style.display = 'none';
                                filePreview.style.display = 'none';
                                uploadText.style.display = 'block';
                                clearButton.style.display = 'none';
                                infoImg.style.display = 'none';
                                isClearButtonClicked = false;
                                isFileSelected = false;
                            }
                        }

                        const fileUploadBoxes = document.querySelectorAll('.file-upload-box');
                        fileUploadBoxes.forEach(function(fileUploadBox) {
                            handleFileUpload(fileUploadBox);
                        });

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
                    <div class="col-12">
                        <a id="btnSubmitFormCreateDriver" type="submit" class="btn btn-primary px-5 float-end" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}" onclick="checkvaluedemerit()">ยืนยัน</a>
                    
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

            // demeritCheckboxes.forEach(function(checkbox) {
            // checkbox.addEventListener('change', function() {
            //     const demeritCheckboxes = document.querySelectorAll('input[name="demerit[]"]:checked');

            //     if (checkedCheckboxes.length > 0) {
            //         errorText.style.display = 'none';
            //     } else {
            //         errorText.style.display = 'block';
            //     }
            // });
            // });


            function checkvaluedemerit() {
                const demeritCheckboxes = document.querySelectorAll('input[id="demerit"]:checked');

                if (demeritCheckboxes.length === 0) {
                    // console.log('โปรดเลือก');
                    checkdemerit = false;
                    event.preventDefault(); // ป้องกันการส่งฟอร์ม   
                    dangerAlert("กรุณาเลือกลักษณะการกระทำความผิด อย่างน้อย 1 อย่าง");

                } else {
                    checkdemerit = true;
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
                            $("#formCreateDriver")[0].submit();
                        }, 4000);
                    }
                } else {
                    // Validate Form
                    $("#formCreateDriver")[0].reportValidity();
                    event.preventDefault();
                }
            });
        </script>
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