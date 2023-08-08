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
                <!-- <hr class="my-4"> -->
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="card border-top border-0 border-4 border-danger">
            <div class="card-body p-5">
                <div class="card-title d-flex align-items-center">
                    <div><i class="bx bxs-user me-1 font-22 text-danger"></i>
                    </div>
                    <h5 class="mb-0 text-danger headerCustomer">เพิ่มข้อมูลมิจฉาชีพ(เช่ารถ) ในนามบุคคล</h5>
                </div>
                <!-- <hr> -->
                <div class="row g-3 mt-4">
                    <!-- <div class="col-12">
                        <label for="inputLastName1" class="form-label subHeaderCustomer ">ติดต่อในนาม <span class="text-danger">*</span></label>
                    </div>
                    <div class="col-md-4 m-0">
                        <div class="row">
                            <div class="col-6">
                                <div class="w-100">
                                    <label class="w-100">
                                        <input class="radio-input" type="radio" name="rentname" id="rentname" value="บุคคล" required>
                                        <span class="radio-tile">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">บุคคล</span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="w-100">
                                    <label class="w-100">
                                        <input class="radio-input" type="radio" name="rentname" id="rentname" value="บริษัท" required>
                                        <span class="radio-tile">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">บริษัท</span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div> -->

                    <div class="col-md-4 mt-md-0 mb-4" id="input_c_name">
                        <!-- {{-- <label for="inputLastName1" class="form-label">ชื่อ</label> --}} -->
                        <div class="input-group">
                            <div class="inputGroup w-100">
                                <input name="c_name" type="text" id="c_name" value="{{ isset($customer->c_name) ? $customer->c_name : '' }}" required="" autocomplete="off">
                                <label for="c_name"><i class="fa-solid fa-user"></i> ชื่อ <span class="text-danger">*</span></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-md-0 mb-4" id="input_c_surname">
                        <!-- {{-- <label for="inputLastName1" class="form-label">นามสุกล</label> --}} -->
                        <div class="input-group ">
                            <div class="inputGroup w-100">
                                <input name="c_surname" type="text" id="c_surname" value="{{ isset($customer->c_surname) ? $customer->c_surname : '' }}" required="" autocomplete="off">
                                <label for="c_surname"><i class="fa-solid fa-user"></i> นามสกุล <span class="text-danger">*</span></label>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-md-4 mt-md-0 d-none" id="input_c_company_name">
                        <div class="input-group">
                            <div class="inputGroup w-100">
                                <input name="c_company_name" type="text" id="c_company_name" value="{{ isset($customer->c_company_name) ? $customer->c_company_name : '' }}" required="" autocomplete="off">
                                <label for="c_company_name"><i class="fa-solid fa-user"></i> ชื่อบริษัท <span class="text-danger">*</span></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-md-0 d-none" id="input_commercial_registration">
                        <div class="input-group ">
                            <div class="inputGroup w-100">
                                <input name="commercial_registration" type="text" id="commercial_registration" value="{{ isset($customer->commercial_registration) ? $customer->commercial_registration : '' }}" required="" autocomplete="off">
                                <label for="commercial_registration" class="text-overflow"><i class="fa-solid fa-user"></i> เลขทะเบียนพาณิชย์/เลขนิติบุคคล <span class="text-danger">*</span></label>
                            </div>
                        </div>
                    </div> -->

                    <div class="col-md-4 mt-md-0 mb-4" id="div_id_no">
                        <!-- {{-- <label for="inputLastName1" class="form-label">ชื่อ</label> --}} -->
                        <div class="input-group ">
                            <div class="inputGroup w-100">
                                <input type="text" required="" autocomplete="off" name="c_idno" id="c_idno" value="{{ isset($customer->c_idno) ? $customer->c_idno : '' }}">
                                <label for="c_idno"><i class="fa-solid fa-id-card"></i> หมายเลขบัตรประชาชน <span class="text-danger">*</span></label>
                            </div>
                        </div>
                    </div>
                    <hr class="mt-6">
                    <div class="card-title d-flex align-items-center">
                        <div><i class="fa-solid fa-buildings me-1 font-22 text-danger"></i>
                        </div>
                        <h5 class="mb-0 text-danger headerCustomer">เพิ่มข้อมูลมิจฉาชีพ(เช่ารถ) ในนามบริษัท</h5>
                    </div>
                    <div class="row g-3 mt-3">
                        <div class="col-md-4 mt-md-0 d-nonee" id="input_c_company_name">
                            <!-- {{-- <label for="inputLastName1" class="form-label">ชื่อ</label> --}} -->
                            <div class="input-group">
                                <div class="inputGroup w-100">
                                    <input name="c_company_name" type="text" id="c_company_name" value="{{ isset($customer->c_company_name) ? $customer->c_company_name : '' }}" required="" autocomplete="off">
                                    <label for="c_company_name"><i class="fa-solid fa-user"></i> ชื่อบริษัท <span class="text-danger">*</span></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mt-md-0 d-nonee" id="input_commercial_registration">
                            <!-- {{-- <label for="inputLastName1" class="form-label">นามสุกล</label> --}} -->
                            <div class="input-group ">
                                <div class="inputGroup w-100">
                                    <input name="commercial_registration" type="text" id="commercial_registration" value="{{ isset($customer->commercial_registration) ? $customer->commercial_registration : '' }}" required="" autocomplete="off">
                                    <label for="commercial_registration" class="text-overflow"><i class="fa-solid fa-user"></i> เลขประจำตัวผู้เสียภาษี <span class="text-danger">*</span></label>
                                </div>
                            </div>
                        </div>
                    </div>


                    <script>
                        // const radioInputs = document.querySelectorAll('.radio-input');
                        // const input_c_name = document.querySelector('#input_c_name');
                        // const input_c_surname = document.querySelector('#input_c_surname');
                        // const input_c_company_name = document.querySelector('#input_c_company_name');
                        // const input_commercial_registration = document.querySelector('#input_commercial_registration');

                        // radioInputs.forEach((input) => {
                        //     input.addEventListener('change', function() {
                        //         if (this.checked) {
                        //             if (this.value === 'บุคคล') {

                        //                 input_c_name.classList.remove('d-none');
                        //                 input_c_surname.classList.remove('d-none');
                        //                 input_c_company_name.classList.add('d-none');
                        //                 input_commercial_registration.classList.add('d-none');

                        //                 document.querySelector('#c_company_name').required = false;
                        //                 document.querySelector('#commercial_registration').required = false;
                        //                 document.querySelector('#c_company_name').value = "";
                        //                 document.querySelector('#commercial_registration').value = "";
                        //                 document.querySelector('#c_surname').required = true;
                        //                 document.querySelector('#c_name').required = true;
                        //                 document.querySelector('#div_id_no').classList.remove('d-none');

                        //             } else if (this.value === 'บริษัท') {
                        //                 input_c_name.classList.add('d-none');
                        //                 input_c_surname.classList.add('d-none');
                        //                 input_c_company_name.classList.remove('d-none');
                        //                 input_commercial_registration.classList.remove('d-none');


                        //                 document.querySelector('#c_surname').required = false;
                        //                 document.querySelector('#c_name').required = false;
                        //                 document.querySelector('#c_surname').value = "";
                        //                 document.querySelector('#c_name').value = "";
                        //                 document.querySelector('#c_company_name').required = true;
                        //                 document.querySelector('#commercial_registration').required = true;
                        //                 document.querySelector('#div_id_no').classList.add('d-none');
                        //                 document.querySelector('#c_idno').value = "";
                        //             }
                        //         }
                        //     });
                        // });
                    </script>
                    <div class="col-12">
                        <label for="inputLastName1" class="form-label subHeaderCustomer">ลักษณะการกระทำความผิด <span class="text-danger">*</span></label>
                    </div>
                    <div class="col-12 mb-md-2">
                        <ul class="nav nav-pills mb-3" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link navDanger active" data-bs-toggle="pill" href="#corrupt" role="tab" aria-selected="true">
                                    <div class="d-flex align-items-center font-tab">
                                        <div class="tab-icon"><i class="fa-solid fa-user-ninja"></i>
                                        </div>
                                        <div class="tab-title">&nbsp;หมวดทุจริต</div>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link navWarning" data-bs-toggle="pill" href="#discipline" role="tab" aria-selected="false">
                                    <div class="d-flex align-items-center font-tab">
                                        <div class="tab-icon"><i class="fa-regular fa-file-circle-exclamation"></i>
                                        </div>
                                        <div class="tab-title">&nbsp;หมวดบัญชีดำ</div>
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
                                        <input class="radio-input" type="checkbox" name="demerit[]" id="demerit" value="ฉ้อโกงหรือยักยอกรถยนต์">
                                        <span class="radio-tile">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">1.ฉ้อโกงหรือยักยอกรถยนต์</span>
                                        </span>
                                    </label>
                                    <label>
                                        <input class="radio-input" type="checkbox" name="demerit[]" id="demerit" value="ลักทรัพย์หรือเปลี่ยนแปลงอุปกรณ์ภายในรถยนต์">
                                        <span class="radio-tile">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">2.ลักทรัพย์หรือเปลี่ยนแปลงอุปกรณ์ภายในรถยนต์</span>
                                        </span>
                                    </label>
                                    <label>
                                        <input class="radio-input" type="checkbox" name="demerit[]" id="demerit" value="ความผิดในคดีอาญาอื่นๆ">
                                        <span class="radio-tile">
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
                                        <input class="radio-input" type="checkbox" name="demerit[]" id="demerit" value="ไม่บำรุงรักษารถยนต์">
                                        <span class="radio-tile">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">4.ไม่บำรุงรักษารถยนต์</span>
                                        </span>
                                    </label>
                                    <label>
                                        <input class="radio-input" type="checkbox" name="demerit[]" id="demerit" value="ไม่ชำระค่าเช่า">
                                        <span class="radio-tile">
                                            <span class="radio-icon">
                                            </span>
                                            <span class="radio-label">5.ไม่ชำระค่าเช่า</span>
                                        </span>
                                    </label>
                                    <label>
                                        <input class="radio-input" type="checkbox" name="demerit[]" id="demerit" value="อื่นๆ">
                                        <span class="radio-tile">
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

                    <div class="col-12 mt-0 ">
                        <label for="inputLastName1" class="form-label subHeaderCustomer">วัน/เดือน/ปี ที่กระทำความผิด <span class="text-danger">*</span></label>
                    </div>
                    <div class="col-md-6 mt-md-1  mb-md-2">
                        <!-- {{-- <label for="inputLastName1" class="form-label">ชื่อ</label> --}} -->
                        <div class="input-group ">
                            <div class="inputGroup ">
                                <input name="c_date" id="c_date" class="selectDate" type="date" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="inputLastName1" class="form-label subHeaderCustomer">แนบหลักฐานการกระทำความผิด</label>
                    </div>
                    <style>

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
                                    <input type="file" id="c_pic_id_card" name="c_pic_id_card" value="{{ isset($customer->c_pic_id_card) ? $customer->c_pic_id_card : ''}}" accept="image/*" style="display: none;">
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
                                            <img src="{{asset('img/icon/id-card.png')}}" alt="สำเนาบัตรประชาชน" class="imgUpLoad" width="50">
                                        </div>
                                        <span>สำเนาบัตรประชาชน <br> PassPort</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <!-- <h6>ภาพใบบังคับคดี</h6> -->
                                <div class="file-upload-box upload-lease">
                                    <div id="clear-button" style="display: none;">
                                        <span class="clear-button">
                                            <i class="fa-solid fa-xmark"></i>
                                        </span>
                                    </div>
                                    <input type="file" id="c_pic_company_certificate" name="c_pic_company_certificate" value="{{ isset($customer->c_pic_company_certificate) ? $customer->c_pic_company_certificate : ''}}" accept="image/*" style="display: none;">
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
                                            <img src="{{asset('img/icon/company.png')}}" alt="สำเนาหนังสือรับรองบริษัท" class="imgUpLoad" width="50">
                                        </div>
                                        <span>สำเนาหนังสือรับรองบริษัท</span>
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
                                    <input type="file" id="c_pic_indictment" name="c_pic_indictment" value="{{ isset($customer->c_pic_indictment) ? $customer->c_pic_indictment : ''}}" accept="image/*" style="display: none;">
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
                                        <span>คำฟ้องหรือใบร้องทุกข์แจ้งความดำเนินดคี</span>
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
                                    <input type="file" id="c_pic_cap" name="c_pic_cap" value="{{ isset($customer->c_pic_cap) ? $customer->c_pic_cap : ''}}" accept="image/*" style="display: none;">
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
                                            <img src="{{asset('img/icon/chat.png')}}" alt="หลักฐานการพูด-คุย" class="imgUpLoad" width="50">
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
                                    <input type="file" id="c_pic_other" name="c_pic_other" value="{{ isset($customer->c_pic_other) ? $customer->c_pic_other : ''}}" accept="image/*" style="display: none;">
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
                                            <img src="{{asset('img/icon/other.png')}}" alt="อื่นๆ" class="imgUpLoad" width="50">
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

                            clearButton.addEventListener('click', function() {
                                fileInput.value = null; // เคลียร์ค่า input file
                                filePreview.src = ''; // เคลียร์ค่าภาพตัวอย่าง
                                filePreview.style.display = 'none';
                                uploadText.style.display = 'block';
                                clearButton.style.display = 'none';
                                infoImg.style.display = 'none';
                                isClearButtonClicked = true;
                            });

                            fileUploadBox.addEventListener('click', function() {
                                fileInput.value = null; // เคลียร์ค่า input file
                                if (!isClearButtonClicked) {
                                    fileInput.click();
                                }

                                isClearButtonClicked = false;
                            });

                            fileInput.addEventListener('change', function(event) {
                                const file = event.target.files[0];
                                const fileName = file.name;
                                const fileSize = formatFileSize(file.size);
                                const fileExtension = getFileExtension(fileName);
                                const imgName = fileUploadBox.querySelector('.imgName');
                                const imgSize = fileUploadBox.querySelector('.imgSize');
                                const imgFile = fileUploadBox.querySelector('.imgFile');

                                // ลบนามสกุลไฟล์
                                const lastDotIndex = fileName.lastIndexOf('.');
                                const fileNameWithoutExtension = fileName.substring(0, lastDotIndex);

                                if (file) {
                                    // ตรวจสอบอัพโหลดรูปเท่านั้น
                                    if (file.type.includes('image')) {
                                        // console.log("รูป");
                                        const reader = new FileReader();
                                        loader.style.display = 'block';
                                        filePreview.style.display = 'none';
                                        infoImg.style.display = 'none';
                                        uploadText.style.display = 'none';
                                        clearButton.style.display = 'none';


                                        reader.onload = function(e) {
                                            setTimeout(function() {
                                                loader.style.display = 'none';
                                                filePreview.src = e.target.result;
                                                filePreview.style.display = 'block';
                                                infoImg.style.display = 'block';
                                                clearButton.style.display = 'block';

                                                imgName.textContent = fileNameWithoutExtension;
                                                imgSize.textContent = fileSize + ' | ';
                                                imgFile.textContent = fileExtension;
                                            }, 2000);
                                        };

                                        reader.readAsDataURL(file);

                                    } else {
                                        // console.log("ไม่รูป");
                                        upload_file_error();
                                    }
                                } else {
                                    // กรณีไม่มีการเลือกไฟล์ใหม่
                                    loader.style.display = 'none';
                                    filePreview.style.display = 'none';
                                    uploadText.style.display = 'block';
                                    clearButton.style.display = 'none';
                                }




                            });


                        }

                        // เรียกใช้ฟังก์ชันสำหรับแต่ละกล่องอัพโหลด
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
                        <a id="btnSubmitFormCreateCustomer" onclick="checkValueInput();checkvaluedemerit(); " type="submit" class="btn btn-danger px-5 float-end" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">ยืนยัน</a>
                    </div>
                </div>
            </div>
        </div>

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
                    dangerAlert("กรุณาเลือกลักษณะการกระทำความผิดอย่างน้อย 1 อย่าง");
                } else {
                    checkdemerit = true;

                    // console.log('ยืนยัน')
                }
            }


            const c_name = document.getElementById('c_name');
            const c_surname = document.getElementById('c_surname');
            const c_idno = document.getElementById('c_idno');
            const c_company_name = document.getElementById('c_company_name');
            const commercial_registration = document.getElementById('commercial_registration');


            function checkValueInput() {
                const inputsGroupPerson = [document.getElementById('c_name'), document.getElementById('c_surname'), document.getElementById('c_idno')];
                const inputsGroupCompany = [document.getElementById('c_company_name'), document.getElementById('commercial_registration')];
                let isGroupPersonValid = true;
                let isGroupCompanyValid = true;

                for (const input of inputsGroupPerson) {
                    if (!input.value) {
                        isGroupPersonValid = false;
                        break;
                    }
                }

                for (const input of inputsGroupCompany) {
                    if (!input.value) {
                        isGroupCompanyValid = false;
                        break;
                    }
                }

                if (isGroupPersonValid && isGroupCompanyValid) {
                    checkisGroupPersonAndCompany = false;
                    event.preventDefault();
                    dangerAlert('กรุณากรอกข้อมูล บุคคล หรือ บริษัท');
                } else if (!isGroupPersonValid && !isGroupCompanyValid) {
                    checkisGroupPersonAndCompany = false;
                    event.preventDefault();
                    dangerAlert('กรุณากรอกข้อมูล บุคคล หรือ บริษัทให้ครบถ้วน');

                } else {
                    checkisGroupPersonAndCompany = true;
                    if (isGroupPersonValid) {
                        for (const input of inputsGroupCompany) {
                            input.removeAttribute('required');
                        }
                    } else {
                        for (const input of inputsGroupPerson) {
                            input.removeAttribute('required');
                        }
                    }
                }

                // เพิ่มเงื่อนไขเช็คว่าถ้ามีการกรอกชุดใดชุดนึงครบแล้ว แต่ก็ยังกรอกอีกช่องนึงให้แจ้งเตือน
                if (isGroupPersonValid && !isGroupCompanyValid) {
                    if (inputsGroupCompany.some(input => input.value)) {
                        checkisGroupPersonAndCompany = false;
                        event.preventDefault();
                        dangerAlert('คุณกรอกข้อมูลในชุด บุคคล ครบแล้ว กรุณาเลือกเพียงชุดเดียวเท่านั้น');
                    }
                } else if (!isGroupPersonValid && isGroupCompanyValid) {
                    if (inputsGroupPerson.some(input => input.value)) {
                        checkisGroupPersonAndCompany = false;
                        event.preventDefault();
                        dangerAlert('คุณกรอกข้อมูลในชุด บริษัท ครบแล้ว กรุณาเลือกเพียงชุดเดียวเท่านั้น');
                    }
                }

                // ตรวจสอบหากมีการกรอกข้อมูลแล้วลบออก แล้วกดบันทึก
                formCreateCustomer.addEventListener('submit', function(event) {
                    if (isGroupPersonValid && isGroupCompanyValid) {
                        for (const input of inputsGroupPerson) {
                            input.removeAttribute('required');
                        }
                        for (const input of inputsGroupCompany) {
                            input.removeAttribute('required');
                        }
                    }
                });
            }
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
    }.radius-20{
        border-radius: 20px;
    }
</style>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content radius-20" >
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
    $("#btnSubmitFormCreateCustomer").click(function() {
        if ($("#formCreateCustomer")[0].checkValidity())
            if (checkdemerit && checkisGroupPersonAndCompany) {
                console.log('sucess');
                $('#exampleModalCenter').modal('show');

                setTimeout(function() {
                    document.querySelector(".loading-spinner").style.display = "none";
                    document.querySelector(".contrainerCheckmark").classList.remove('d-none');
                }, 3000);

                setTimeout(function() {
                    formCreateCustomer.submit();
                }, 4000);

                // formCreateCustomer.submit();
            } else {
                console.log('un_sucess');
            }
        else
            //Validate Form
            $("#formCreateCustomer")[0].reportValidity()
    });
</script>

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