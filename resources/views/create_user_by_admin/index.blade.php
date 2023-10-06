@extends('layouts.theme')

@section('content')

<style>
.spinner-copy-data {
    margin: 100px auto;
    width: 40px;
    height: 40px;
    position: relative;
}

.cube1, .cube2 {
    background-color: #00FF02FF;
    width: 15px;
    height: 15px;
    position: absolute;
    top: 20px;
    left: 0;
  
    -webkit-animation: sk-cubemove 1.8s infinite ease-in-out;
    animation: sk-cubemove 1.8s infinite ease-in-out;
}

.cube2 {
    -webkit-animation-delay: -0.9s;
    animation-delay: -0.9s;
}

@-webkit-keyframes sk-cubemove {
    25% { -webkit-transform: translateX(42px) rotate(-90deg) scale(0.5) }
    50% { -webkit-transform: translateX(42px) translateY(42px) rotate(-180deg) }
    75% { -webkit-transform: translateX(0px) translateY(42px) rotate(-270deg) scale(0.5) }
    100% { -webkit-transform: rotate(-360deg) }
}

@keyframes sk-cubemove {
    25% { 
        transform: translateX(42px) rotate(-90deg) scale(0.5);
        -webkit-transform: translateX(42px) rotate(-90deg) scale(0.5);
    } 50% { 
        transform: translateX(42px) translateY(42px) rotate(-179deg);
        -webkit-transform: translateX(42px) translateY(42px) rotate(-179deg);
    } 50.1% { 
        transform: translateX(42px) translateY(42px) rotate(-180deg);
        -webkit-transform: translateX(42px) translateY(42px) rotate(-180deg);
    } 75% { 
        transform: translateX(0px) translateY(42px) rotate(-270deg) scale(0.5);
        -webkit-transform: translateX(0px) translateY(42px) rotate(-270deg) scale(0.5);
    } 100% { 
        transform: rotate(-360deg);
        -webkit-transform: rotate(-360deg);
    }
}

.div_alert {
    position: fixed;
    top: -100px;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 50px;
    text-align: center;
    font-family: 'Kanit', sans-serif;
    z-index: 9999;
    font-size: 18px;

}

.div_alert span {
    background-color: #2DD284;
    border-radius: 10px;
    color: white;
    padding: 15px;
    font-family: 'Kanit', sans-serif;
    z-index: 9999;
    font-size: 1em;
}

.up_down {
    animation-name: slideDownAndUp;
    animation-duration:3s;
}

@keyframes slideDownAndUp {
        0% {
            transform: translateY(0);
        }
        10% {
            transform: translateY(120px);
        }
        90% {
            transform: translateY(120px);
        }
        100% {
            transform: translateY(0);
        }
    }

*{
    font-family: 'Mitr', sans-serif;
}
    
    #userpass{
        resize: none;
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
button:focus.btnAddUser {
    box-shadow: 0 0 0 0.25rem  rgb(69, 211, 83, 0.6);
}

.td_member_co{
    width: 250px;
    height: 1em; /* กำหนดความสูงของ td เพื่อให้ทำงานกับ ellipsis */
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.checkbox-apple {
  position: relative;
  width: 50px;
  height: 25px;
  margin: 20px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

.checkbox-apple label {
  position: absolute;
  top: 0;
  left: 0;
  width: 50px;
  height: 25px;
  border-radius: 50px;
  background: linear-gradient(to bottom, #f72d2d, #f25a5a);
  cursor: pointer;
  transition: all 0.3s ease;
}

.checkbox-apple label:after {
  content: '';
  position: absolute;
  top: 1px;
  left: 1px;
  width: 23px;
  height: 23px;
  border-radius: 50%;
  background-color: #fff;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
  transition: all 0.3s ease;
}

.checkbox-apple input[type="checkbox"]:checked + label {
  background: linear-gradient(to bottom, #4cd964, #5de24e);
}

.checkbox-apple input[type="checkbox"]:checked + label:after {
  transform: translateX(25px);
}

.checkbox-apple label:hover {
  background: linear-gradient(to bottom, #f72d2d, #f25a5a);
}

.checkbox-apple label:hover:after {
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
}

.yep {
  position: absolute;
  top: 0;
  left: 0;
  width: 50px;
  height: 25px;
}

.flashing_border {
    animation: flashing 5s alternate;
}

@keyframes flashing {
  0% {
    background-color: lightgreen;
  }
  50% {
    background-color: lightblue;
  }
  75% {
    background-color: lightgreen;
  }
  100% {
    background-color: none;
  }
}

</style>

<div id="alert_copy" class="div_alert" role="alert">
    <span id="alert_text">
        คัดลอกเรียบร้อย
    </span>
</div>

<div id="list_member_modal" class="notranslate">
    @foreach($data_member as $item_modal)
    <!-- Modal -->
    <div class="modal fade" id="view_data_mamber_{{ $item_modal->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="Label_view_data_mamber_{{ $item_modal->id }}" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="Label_view_data_mamber_{{ $item_modal->id }}">ข้อมูลสมาชิก</h5>
                    <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-circle-xmark"></i>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="card">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-6">
                                    <div class="d-flex flex-column align-items-center text-center">
                                        @if( empty($item_modal->member_pic))
                                            <img src="{{ url('/img/icon/businessman.png') }}" class="profile-pic" width="150">
                                        @else
                                            <img src="{{ url('storage')}}/{{ $item_modal->member_pic }}" class="profile-pic" style="width:150px;height: 150px;object-fit: contain;">
                                        @endif
                                        <div class="mt-3">
                                            <h4>{{ $item_modal->name }}</h4>
                                            <p class="text-secondary mb-1">
                                                {{ $item_modal->member_tel }}
                                            </p>
                                            <p class="text-muted font-size-sm">
                                                {{ $item_modal->member_addr }}
                                            </p>
                                        </div>
                                        <div class="mt-3">
                                            <!-- สถานะลงชื่อเข้าใช้ -->
                                            @if($item_modal->member_status == "Active")
                                                <span  class="btn bg-light-success text-success" style="font-size:12px;">
                                                    Active
                                                </span>
                                            @else
                                                <span class="btn bg-light-danger text-danger" style="font-size:12px;">
                                                    Inactive
                                                </span>
                                            @endif
                                            <!-- บทบาทของสมาชิก -->
                                            @if($item_modal->member_role == "admin")
                                                <span class="btn bg-light-info text-info" style="font-size:12px;">
                                                    Admin
                                                </span>
                                            @elseif($item_modal->member_role == "member")
                                                <span class="btn bg-light-success text-success" style="font-size:12px;">
                                                    member
                                                </span>
                                            @elseif($item_modal->member_role == "customer")
                                                <span class="btn bg-light-danger text-danger" style="font-size:12px;">
                                                    customer
                                                </span>
                                            @else
                                                <span class="btn bg-light-warning text-warning" style="font-size:12px;">
                                                    driver
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <hr class="my-4">
                                    <div class="mt-2">
                                        <div class="text-center pt-2 pb-2">
                                            @php
                                                $text_username = "";
                                                
                                                if( !empty($item_modal->create_member->username) ){
                                                    $text_username = "Username : " . $item_modal->create_member->username . "\n" . "Password : " . $item_modal->create_member->pass_code ;
                                                }
                                                
                                            @endphp
                                            <textarea class="form-control" name="copy_username_{{ $item_modal->id }}" id="copy_username_{{ $item_modal->id }}" readonly>{{ $text_username }}</textarea>
                                        </div>
                                    </div>
                                    <div class="row text-center mt-3">
                                        <div class="col-6">
                                            <a href="{{ url('/user/' . $item_modal->id .'/edit') }}" class="btn btn-warning" style="width:90%;">
                                                แก้ไขข้อมูล
                                            </a>
                                        </div>
                                        <div class="col-6">
                                            <span class="btn btn-info" style="width:90%;" onclick="CopyToClipboard('copy_username_{{ $item_modal->id }}');">
                                                Copy Username
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6">
                                    <ul class="list-group list-group-flush">
                                        <li class="mt-2 mb-2 list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                            <h6 class="mb-0">
                                                <b>Username</b>
                                            </h6>
                                            <span class="text-secondary">{{ $item_modal->username }}</span>
                                        </li>
                                        <li class="mt-2 mb-2 list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                            <h6 class="mb-0">
                                                <b>E-Mail</b>
                                            </h6>
                                            <span class="text-secondary">{{ $item_modal->email }}</span>
                                        </li>
                                        <li class="mt-2 mb-2 list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                            <h6 class="mb-0">
                                                <b>บริษัท</b>
                                            </h6>
                                            <span class="text-secondary">
                                                {{ $item_modal->member_co }}
                                            </span>
                                        </li>
                                        <li class="mt-2 mb-2 list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                            <h6 class="mb-0">
                                                <b>ลงชื่อเข้าใช้</b>
                                            </h6>
                                            <span class="text-secondary">
                                                {{ intval($item_modal->member_count_login) }} ครั้ง
                                            </span>
                                        </li>
                                        <li class="mt-2 mb-2 list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                            <h6 class="mb-0">
                                                <b>ใช้งานล่าสุด</b>
                                            </h6>
                                            <span class="text-secondary">
                                                @if( !empty($item_modal->last_time_active) )
                                                    {{ \Carbon\Carbon::parse($item_modal->last_time_active)->locale('th')->diffForHumans() }}
                                                @else
                                                    ..
                                                @endif
                                            </span>
                                        </li>
                                        @php
                                            $data_add_Cus = App\Models\Customer::where('user_id',$item_modal->id)->get();
                                            $count_Cus = count($data_add_Cus);

                                            $data_add_Dri = App\Models\Driver::where('user_id',$item_modal->id)->get();
                                            $count_Dri = count($data_add_Dri);
                                        @endphp

                                        <li class="mt-2 mb-2 list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                            <h6 class="mb-0" style="color:#02ad13;">
                                                <b>บันทึกข้อมูล มิจฉาชีพ (เช่ารถ)</b>
                                            </h6>
                                            <span style="color:#02ad13;">
                                                {{ $count_Cus }} ครั้ง
                                            </span>
                                        </li>
                                        <li class="mt-2 mb-2 list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                            <h6 class="mb-0" style="color:#02ad13;">
                                                <b>บันทึกข้อมูล Blacklist พนักงานขับรถ</b>
                                            </h6>
                                            <span style="color:#02ad13;">
                                                {{ $count_Dri }} ครั้ง
                                            </span>
                                        </li>
                                        <li class="mt-2 mb-2 list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                            <h6 class="mb-0" style="color:blue;">
                                                <b>ค้นหาข้อมูล มิจฉาชีพ (เช่ารถ)</b>
                                            </h6>
                                            <span style="color:blue;">
                                               {{ intval($item_modal->count_search_cus) }} ครั้ง
                                            </span>
                                        </li>
                                        <li class="mt-2 mb-2 list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                            <h6 class="mb-0" style="color:blue;">
                                                <b>ค้นหาข้อมูล Blacklist พนักงานขับรถ</b>
                                            </h6>
                                            <span style="color:blue;">
                                               {{ intval($item_modal->count_search_dri) }} ครั้ง
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    </div>

<div class="row">

    <!-- <div class="col-md-3">
        <div class="card border-top border-0 border-4 border-primary">
            <div class="card-body" style="padding: 39px;">
                <div class="card-title d-flex align-items-center">
                    <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                    </div>
                    <h5 class="mb-0 text-primary">สร้างรหัสสมาชิก</h5>
                </div>
                <hr>
                <div class="row g-3">
                    <div class="col-md-12">
                        <label for="inputLastName1" class="form-label">Username (สำหรับลงชื่อเข้าใช้) <span class="text-danger">*</span></label>
                        <div class="input-group"> <span class="input-group-text bg-transparent"><i class="fa-solid fa-at"></i></span>
                            <input type="text" class="form-control border-start-0" id="inputLastName1" placeholder="Username">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="inputLastName2" class="form-label">Name (สำหรับแสดงในระบบ) <span class="text-danger">*</span></label>
                        <div class="input-group"> <span class="input-group-text bg-transparent"><i class="bx bxs-user"></i></span>
                            <input type="text" class="form-control border-start-0" id="Name" name="Name" placeholder="Name" required oninput="on_inputData();">
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="validationServerUsername" class="form-label">Email Address <span class="text-danger">*</span></label>
                        <div class="input-group has-validation"> <span class="input-group-text bg-transparent" id="inputGroupPrepend3"><i class="bx bxs-message"></i></span>
                        <input type="text" class="form-control border-start-0" id="email" name="email" placeholder="Email" required oninput="on_inputData();" onchange="check_email();">
                            <div id="div_text_alert_email" class="invalid-feedback d-none" >มี EMail นี้ในระบบแล้ว.</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <label for="inputPhoneNo" class="form-label">สถานะลงชื่อเข้าใช้ <span class="text-danger">*</span></label>
                        <div class="input-group"> <span class="input-group-text bg-transparent"><i class="fa-solid fa-right-to-bracket"></i></span>
                            <select class="form-select border-start-0" id="member_status" name="member_status" required oninput="on_inputData();">
                                <option  selected value="">สถานะลงชื่อเข้าใช้</option>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <label for="inputPhoneNo" class="form-label">หมวดหมู่สมาชิก <span class="text-danger">*</span></label>
                        <div class="input-group"> <span class="input-group-text bg-transparent"><i class="fa-duotone fa-users"></i></span>
                            <select class="form-select border-start-0" id="member_role" name="member_role" required oninput="on_inputData();">
                                <option selected value="">หมวดหมู่สมาชิก</option>
                                <option value="admin">admin</option>
                                <option value="customer">กลุ่มมิจฉาชีพ</option>
                                <option value="driver">พนักงานขับรถ</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="inputChoosePassword" class="form-label">Choose Password</label>
                        <div class="input-group"> <span class="input-group-text bg-transparent"><i class="bx bxs-lock-open"></i></span>
                            <input type="text" class="form-control border-start-0" id="member_co" name="member_co" placeholder="Company" oninput="on_inputData();">

                        </div>
                    </div>
                    <div class="col-12">
                        <label for="inputPhoneNo" class="form-label">Phone No</label>
                        <div class="input-group"> <span class="input-group-text bg-transparent"><i class="bx bxs-microphone"></i></span>
                            <input type="text" class="form-control border-start-0" id="member_tel" name="member_tel" placeholder="Phone No" oninput="on_inputData();">

                        </div>
                    </div>
                    <div class="col-12">
                        <label for="inputAddress3" class="form-label">Address</label>
                        <textarea class="form-control" id="member_addr" name="member_addr" placeholder="Enter Address" rows="3" oninput="on_inputData();"></textarea>

                    </div>
                    <div id="div_text_alert_input" class="col-12 d-none">
                        <span class="text-danger d-">
                            <span id="text_alert_input">ss</span>
                        </span>
                    </div>
                    <div class="col-12">
                        <button class="card btn radius-10 btnAddUser bg-success bg-gradient w-100" onclick="check_create_member();">
                            <div class="card-body w-100 p-2">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h6 class="my-1 text-white">สร้างรหัสสมาชิก</h6>
                                    </div>
                                    <div class="text-white ms-auto font-25">
                                        <i class="fa-solid fa-user-plus"></i>
                                    </div>
                                </div>
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>                                             -->
    <div class="col-md-3">
        <div class="sticky">
            <div>

                <!-- <div class="card radius-10 bg-success bg-gradient">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h6 class="my-1 text-white">สร้างรหัสสมาชิก</h6>
                            </div>
                            <div class="text-white ms-auto font-25">
                                <i class="fa-solid fa-user-plus"></i>
                            </div>
                        </div>
                    </div>
                </div> -->                            
                <ul class="nav nav-pills nav-pills-success mb-3 d-none" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a id="btn_a_inputdata" class="nav-link active" data-bs-toggle="pill" href="#success-pills-inputdata" role="tab" aria-selected="true">
                            <div class="d-flex align-items-center">
                                <div class="tab-icon"><i class="bx bxs-user-pin font-18 me-1"></i>
                                </div>
                                <div class="tab-title">กรอกข้อมูล</div>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a id="btn_a_copydata" class="nav-link" data-bs-toggle="pill" href="#success-pills-copydata" role="tab" aria-selected="false">
                            <div class="d-flex align-items-center">
                                <div class="tab-icon"><i class="bx bxs-microphone font-18 me-1"></i>
                                </div>
                                <div class="tab-title">Copy</div>
                            </div>
                        </a>
                    </li>
                </ul>
                <div class="tab-content">  
                    <div class="tab-pane fade active show" id="success-pills-inputdata" role="tabpanel">
                    <div class="card border-top border-0 border-4 border-primary">
            <div class="card-body" style="padding: 39px;">
                <div class="card-title d-flex align-items-center">
                    <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                    </div>
                    <h5 class="mb-0 text-primary">สร้างรหัสสมาชิก</h5>
                </div>
                <hr>
                <div class="row g-3">
                    <div class="col-12">
                        <label for="inputLastName0" class="form-label">เลขที่สมาชิก <span class="text-danger">*</span></label>
                        <div class="input-group"> <span class="input-group-text bg-transparent"><i class="fa-solid fa-input-numeric"></i></span>
                            <input type="text" class="form-control border-start-0"  id="no_member" name="no_member" placeholder="เลขที่สมาชิก" required oninput="on_inputData();">
                        </div>
                        <span class="text-danger d-none" id="text_alert_input_no_member">ss</span>
                    </div>
                    <div class="col-12">
                        <label for="inputLastName1" class="form-label">Username (สำหรับลงชื่อเข้าใช้) <span class="text-danger">*</span></label>
                        <div class="input-group"> <span class="input-group-text bg-transparent"><i class="fa-solid fa-at"></i></span>
                            <input type="text" class="form-control border-start-0"  id="Username" name="Username" placeholder="Username" required oninput="on_inputData();">
                        </div>
                        <span class="text-danger d-none" id="text_alert_input_Username">ss</span>
                    </div>
                    <div class="col-12">
                        <label for="inputLastName2" class="form-label">Name (สำหรับแสดงในระบบ) <span class="text-danger">*</span></label>
                        <div class="input-group"> <span class="input-group-text bg-transparent"><i class="bx bxs-user"></i></span>
                            <input type="text" class="form-control border-start-0" id="Name" name="Name" placeholder="Name" required oninput="on_inputData();">
                        </div>
                        <span class="text-danger d-none" id="text_alert_input_Name">ss</span>
                    </div>
                    <div class="col-12">
                        <label for="inputEmailAddress" class="form-label">Email Address
                        <div class="input-group "> <span class="input-group-text bg-transparent"><i class="bx bxs-message"></i></span>
                            <input type="text" class="form-control border-start-0" id="email" name="email" placeholder="Email" required oninput="on_inputData();" onchange="check_email();">
                        </div>
                        <span class="text-danger d-none" id="text_alert_input_email">ss</span>
                        <span id="div_text_alert_email" class="text-danger d-none">มี EMail นี้ในระบบแล้ว</span>
                        <div id="validationServer03Feedback" class="invalid-feedback">มี EMail นี้ในระบบแล้ว.</div>

                    </div>
                    <!-- <div class="col-12">
                        <label for="validationServerUsername" class="form-label">Email Address <span class="text-danger">*</span></label>
                        <div class="input-group has-validation"> <span class="input-group-text bg-transparent" id="inputGroupPrepend3"><i class="bx bxs-message"></i></span>
                        <input type="text" class="form-control border-start-0" id="email" name="email" placeholder="Email" required oninput="on_inputData();" onchange="check_email();">
                            <div id="div_text_alert_email" class="invalid-feedback d-none" >มี EMail นี้ในระบบแล้ว.</div>
                        </div>
                    </div> -->
                    <div class="col-12">
                        <label for="inputPhoneNo" class="form-label">สถานะลงชื่อเข้าใช้ <span class="text-danger">*</span></label>
                        <div class="input-group"> <span class="input-group-text bg-transparent"><i class="fa-solid fa-right-to-bracket"></i></span>
                            <select class="form-select border-start-0" id="member_status" name="member_status" required oninput="on_inputData();">
                                <option  selected value="">สถานะลงชื่อเข้าใช้</option>
                                <option class="text-success" value="Active">Active</option>
                                <option class="text-danger" value="Inactive">Inactive</option>
                            </select>
                        </div>
                        <span class="text-danger d-none" id="text_alert_input_member_status">ss</span>
                    </div>
                    <div class="col-12">
                        <label for="inputPhoneNo" class="form-label">หมวดหมู่สมาชิก <span class="text-danger">*</span></label>
                        <div class="input-group"> <span class="input-group-text bg-transparent"><i class="fa-duotone fa-users"></i></span>
                            <select class="form-select border-start-0" id="member_role" name="member_role" required oninput="on_inputData();">
                                <option selected value="">หมวดหมู่สมาชิก</option>
                                <option value="admin">admin</option>
                                <option value="member">member</option>
                                <option value="customer">มิจฉาชีพ (เช่ารถ)</option>
                                <option value="driver">Blacklist ข้อมูลพนักงานขับรถ</option>
                            </select>
                        </div>
                        <span class="text-danger d-none" id="text_alert_input_member_role">ss</span>
                    </div>

                    <div class="col-12">
                        <label for="inputChoosePassword" class="form-label">บริษัท</label> <span class="text-danger">*</span></label>
                        <div class="input-group"> <span class="input-group-text bg-transparent"><i class="fa-solid fa-buildings"></i></span>
                            <input type="text" class="form-control border-start-0" id="member_co" name="member_co" placeholder="บริษัท" oninput="on_inputData();">

                        </div>
                        <span class="text-danger d-none" id="text_alert_input_member_co">ss</span>
                    </div>
                    <div class="col-12">
                        <label for="inputPhoneNo" class="form-label">เบอร์ติดต่อ</label> <span class="text-danger">*</span></label>
                        <div class="input-group"> <span class="input-group-text bg-transparent"><i class="fa-solid fa-phone"></i></span>
                            <input type="text" class="form-control border-start-0" id="member_tel" name="member_tel" placeholder="เบอร์ติดต่อ" oninput="on_inputData();">

                        </div>
                        <span class="text-danger d-none" id="text_alert_input_member_tel">ss</span>
                    </div>
                    <div class="col-12">
                        <label for="inputAddress3" class="form-label">ที่อยู่</label> <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="member_addr" name="member_addr" placeholder="เพิ่มข้อมูลที่อยู่" rows="3" oninput="on_inputData();"></textarea>
                        <span class="text-danger d-none" id="text_alert_input_member_addr">ss</span>
                    </div>
                    
                    <div class="col-12">
                        <button class="card btn radius-10 btnAddUser bg-success bg-gradient w-100" onclick="check_create_member();" >
                            <div class="card-body w-100 p-2">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h6 class="my-1 text-white">สร้างรหัสสมาชิก</h6>
                                    </div>
                                    <div class="text-white ms-auto font-25">
                                        <i class="fa-solid fa-user-plus"></i>
                                    </div>
                                </div>
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>
                    <div class="tab-pane fade success_copydata card" id="success-pills-copydata" role="tabpanel">
                        <div class="div_copydata">

                        </div>
                        <!-- Copy DATA -->
                        <div id="div_loading" class="text-center">
                            <div class="spinner-copy-data">
                                <div class="cube1"></div>
                                <div class="cube2"></div>
                            </div>
                            <h5>กำลังโหลด..</h5>
                        </div>

                        <div id="div_load_success" class="d-none" style="padding:40px">
                            <svg class="checkmark d-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                                <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                            </svg>
                            <center>
                                <h5>เสร็จสิ้น</h5>
                            </center>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>


    <!-- Card ตารางฝั่งขวา -->
    <div class="col-md-9">
        <div class="card border-top border-0 border-4 border-danger">
            <div class="card-body p-5">
                <div class="card-title d-flex align-items-center">
                    <div>
                        <i class="bx bxs-user me-1 font-22 text-danger"></i>
                    </div>
                    <h5 class="mb-0 text-danger">ข้อมูลสมาชิก</h5>
                    
                </div>
                <hr>
                <style>
                    table {
                        border: 0.5px solid lightgray; /* เส้นขอบที่แถวล่างของแต่ละแถว */
                        border-left: 0.5px solid lightgray;
                        border-right: 0.5px solid lightgray;
                    }

                </style>
                <div class="col-12">

                    <!-- <div class="table-responsive">
                        <table id="table_show_member" class="table table-striped table-bordered align-middle text-center">
                            <thead>
                                <tr>
                                    <th rowspan="2" style="font-size:18px;vertical-align: middle;">ลำดับ</th>
                                    <th rowspan="2" style="font-size:18px;vertical-align: middle;">เลขที่สมาชิก</th>
                                    <th rowspan="2" style="font-size:18px;vertical-align: middle;">บริษัท</th>
                                    <th rowspan="2" style="font-size:18px;vertical-align: middle;">สิทธิ์การใช้งาน</th>
                                    <th colspan="2" style="color:#02ad13;">บันทึก (ครั้ง)</th>
                                    <th colspan="2" style="color:blue;">ค้นหา (ครั้ง)</th>
                                    <th rowspan="2" style="font-size:18px;vertical-align: middle;">สถานะ</th>
                                    <th rowspan="2" style="font-size:18px;vertical-align: middle;">เพิ่มเติม</th>
                                </tr>
                                <tr>
                                    <th style="color:#02ad13;">มิจฉาชีพ</th>
                                    <th style="color:#02ad13;">พขร</th>
                                    <th style="color:blue;">มิจฉาชีพ</th>
                                    <th style="color:blue;">พขร</th>
                                </tr>
                            </thead>
                            <tbody id="data_command_user_tbody">
                                @foreach($data_member as $item)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>
                                            {{ $item->no_member }}
                                        </td>
                                        <td style="width: 250px;">
                                            <div class="d-flex align-items-center">
                                                <div class="ms-2">
                                                    <h6 class="mb-1 font-22 td_member_co">{{ $item->member_co }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            @if($item->member_role == "admin")
                                                <span class="badge bg-light-info text-info" style="font-size:13px;width: 100px;margin: 20px;">
                                                    Admin
                                                </span>
                                            @elseif($item->member_role == "member")
                                                <span class="badge bg-light-success text-success" style="font-size:13px;width: 100px;margin: 20px;">
                                                    member
                                                </span>
                                            @elseif($item->member_role == "customer")
                                                <span class="badge bg-light-danger text-danger" style="font-size:13px;width: 100px;margin: 20px;">
                                                    customer
                                                </span>
                                            @else
                                                <span class="badge bg-light-warning text-warning" style="font-size:13px;width: 100px;margin: 20px;">
                                                    driver
                                                </span>
                                            @endif
                                            <br>
                                            ใช้งานระบบ {{ $item->member_count_login }} ครั้ง
                                            <br>
                                            ล่าสุด : {{ $item->last_time_active }}
                                            
                                        </td>
                                        @php
                                            $data_add_Cus = App\Models\Customer::where('user_id',$item->id)->get();
                                            $count_Cus = count($data_add_Cus);

                                            $data_add_Dri = App\Models\Driver::where('user_id',$item->id)->get();
                                            $count_Dri = count($data_add_Dri);
                                        @endphp
                                        <td class="text-center" style="color:#02ad13;">
                                            {{ $count_Cus }}
                                        </td>
                                        <td class="text-center" style="color:#02ad13;">
                                            {{ $count_Dri }}
                                        </td>
                                        <td class="text-center" style="color:blue;">
                                            {{ intval($item->count_search_cus) }}
                                        </td>
                                        <td class="text-center" style="color:blue;">
                                            {{ intval($item->count_search_dri) }}
                                        </td>
                                        <td class="text-center">
                                            @php
                                                $checked_checkbox = '';

                                                if($item->member_status == "Active"){
                                                    $checked_checkbox = 'checked' ;
                                                }
                                            @endphp
                                            <center>
                                            <div class="checkbox-apple">
                                                <input class="yep" id="check_active_{{ $item->id }}" {{ $checked_checkbox}} type="checkbox" onclick="click_check_active('{{ $item->id }}');">
                                                <label for="check_active_{{ $item->id }}"></label>
                                            </div>
                                            </center>

                                            <div id="td_status_member_{{ $item->id }}" class="d-none">
                                            @if($item->member_status == "Active")
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <button type="button" class="btn btn-success btn_status_Active_{{ $item->id }}" onclick="change_status_to('Active','{{ $item->id }}');">Active</button>
                                                    <button type="button" class="btn btn-outline-danger btn_status_Inactive_{{ $item->id }}" onclick="change_status_to('Inactive','{{ $item->id }}');">Inactive</button>
                                                </div>
                                            @else
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <button type="button" class="btn btn-outline-success btn_status_Active_{{ $item->id }}" onclick="change_status_to('Active','{{ $item->id }}');">Active</button>
                                                    <button type="button" class="btn btn-danger btn_status_Inactive_{{ $item->id }}" onclick="change_status_to('Inactive','{{ $item->id }}');">Inactive</button>
                                                </div>
                                            @endif
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="d-flex align-items-center order-actions">
                                                <a href="javascript:;" class="ms-2 text-primary bg-light-primary border-0" data-toggle="modal" data-target="#view_data_mamber_{{ $item->id }}">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th rowspan="2" style="vertical-align: middle;">ลำดับ</th>
                                    <th rowspan="2" style="vertical-align: middle;">เลขที่สมาชิก</th>
                                    <th rowspan="2" style="vertical-align: middle;">บริษัท</th>
                                    <th rowspan="2" style="vertical-align: middle;">สิทธิ์การใช้งาน</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </tfoot>

                        </table>
                    </div> -->
                                                <style>
                                                    #table_show_member_filter label{
                                                        display: none;
                                                    }
                                                </style>
                    <div class="table-responsive w-100">

                        <div id="table_show_member_wrapper" class="" style="max-width: 100%;">
                        
                            <table id="table_show_member" class="table table-striped table-bordered align-middle text-center">
                                <thead>
                                    <tr>
                                        <!-- <th rowspan="2" style="font-size:18px;vertical-align: middle;">ลำดับ <i class="fa-duotone fa-sort" style="font-size:10px;cursor: pointer;"></i></th> -->
                                        <th rowspan="2" style="font-size:18px;vertical-align: middle;padding:0;">เลขที่สมาชิก <i class="fa-duotone fa-sort" style="font-size:10px;cursor: pointer;"></i></th>
                                        <th rowspan="2" style="font-size:18px;vertical-align: middle;padding:0;">บริษัท <i class="fa-duotone fa-sort" style="font-size:10px;cursor: pointer;"></i></th>
                                        <th rowspan="2" style="font-size:18px;vertical-align: middle;padding:0;">สิทธิ์การใช้งาน <i class="fa-duotone fa-sort" style="font-size:10px;cursor: pointer;"></i></th>
                                        <th colspan="2" style="color:#02ad13;">บันทึก (ครั้ง)</th>
                                        <th colspan="2" style="color:blue;">ค้นหา (ครั้ง)</th>
                                        <th rowspan="2" style="font-size:18px;vertical-align: middle;padding:0;">สถานะ</th>
                                        <th rowspan="2" style="font-size:18px;vertical-align: middle;padding:0;">เพิ่มเติม</th>
                                    </tr>
                                    <tr>
                                        <th style="color:#02ad13;">มิจฉาชีพ <i class="fa-duotone fa-sort" style="font-size:10px;cursor: pointer;"></i></th>
                                        <th style="color:#02ad13;">พขร <i class="fa-duotone fa-sort" style="font-size:10px;cursor: pointer;"></i></th>
                                        <th style="color:blue;">มิจฉาชีพ <i class="fa-duotone fa-sort" style="font-size:10px;cursor: pointer;"></i></th>
                                        <th style="color:blue;">พขร <i class="fa-duotone fa-sort" style="font-size:10px;cursor: pointer;"></i></th>
                                    </tr>
                                </thead>
                                <tbody id="list_member">
                                    @foreach($data_member as $item)
                                    <tr>
                                        <!-- <td>
                                            {{ $item->id }}
                                        </td> -->
                                        <td>
                                            {{ $item->no_member }}
                                        </td>
                                        <td style="width: 250px;">
                                            <div class="d-flex align-items-center">
                                                <div class="ms-2">
                                                    <h6 class="mb-1 font-22 td_member_co">{{ $item->member_co }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            @if($item->member_role == "admin")
                                                <span class="badge bg-light-info text-info" style="font-size:13px;width: 100px;margin: 20px;">
                                                    Admin
                                                </span>
                                            @elseif($item->member_role == "member")
                                                <span class="badge bg-light-success text-success" style="font-size:13px;width: 100px;margin: 20px;">
                                                    member
                                                </span>
                                            @elseif($item->member_role == "customer")
                                                <span class="badge bg-light-danger text-danger" style="font-size:13px;width: 100px;margin: 20px;">
                                                    customer
                                                </span>
                                            @else
                                                <span class="badge bg-light-warning text-warning" style="font-size:13px;width: 100px;margin: 20px;">
                                                    driver
                                                </span>
                                            @endif
                                            <br>
                                            ใช้งานระบบ {{ $item->member_count_login }} ครั้ง
                                            <br>
                                            ล่าสุด : {{ $item->last_time_active }}
                                            
                                        </td>
                                        @php
                                            $data_add_Cus = App\Models\Customer::where('user_id',$item->id)->get();
                                            $count_Cus = count($data_add_Cus);

                                            $data_add_Dri = App\Models\Driver::where('user_id',$item->id)->get();
                                            $count_Dri = count($data_add_Dri);
                                        @endphp
                                        <td class="text-center" style="color:#02ad13;">
                                            {{ $count_Cus }}
                                        </td>
                                        <td class="text-center" style="color:#02ad13;">
                                            {{ $count_Dri }}
                                        </td>
                                        <td class="text-center" style="color:blue;">
                                            {{ intval($item->count_search_cus) }}
                                        </td>
                                        <td class="text-center" style="color:blue;">
                                            {{ intval($item->count_search_dri) }}
                                        </td>
                                        <td class="text-center">
                                            @php
                                                $checked_checkbox = '';

                                                if($item->member_status == "Active"){
                                                    $checked_checkbox = 'checked' ;
                                                }
                                            @endphp
                                            <center>
                                            <div class="checkbox-apple" style="margin: 0!important;">
                                                <input class="yep" id="check_active_{{ $item->id }}" {{ $checked_checkbox}} type="checkbox" onclick="click_check_active('{{ $item->id }}');">
                                                <label for="check_active_{{ $item->id }}"></label>
                                            </div>
                                            </center>
                                            <div id="show_text_status_member" class="d-none">{{ $item->member_status }}</div>

                                            <div id="td_status_member_{{ $item->id }}" class="d-none">

                                                @if($item->member_status == "Active")
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <button type="button" class="btn btn-success btn_status_Active_{{ $item->id }}" onclick="change_status_to('Active','{{ $item->id }}');">
                                                            <!-- Active -->
                                                        </button>
                                                        <button type="button" class="btn btn-outline-danger btn_status_Inactive_{{ $item->id }}" onclick="change_status_to('Inactive','{{ $item->id }}');">
                                                            <!-- Inactive -->
                                                        </button>
                                                    </div>
                                                @else
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <button type="button" class="btn btn-outline-success btn_status_Active_{{ $item->id }}" onclick="change_status_to('Active','{{ $item->id }}');">
                                                            <!-- Active -->
                                                        </button>
                                                        <button type="button" class="btn btn-danger btn_status_Inactive_{{ $item->id }}" onclick="change_status_to('Inactive','{{ $item->id }}');">
                                                            <!-- Inactive -->
                                                        </button>
                                                    </div>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="d-flex align-items-center justify-content-center order-actions">
                                                <a href="javascript:;" class="text-primary bg-light-primary border-0" data-toggle="modal" data-target="#view_data_mamber_{{ $item->id }}">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <!-- <th rowspan="1"></th> -->
                                        <th rowspan="1">เลขที่สมาชิก</th>
                                        <th rowspan="1">บริษัท</th>
                                        <th rowspan="1">สิทธิ์การใช้งาน</th>
                                        <th rowspan="1"></th>
                                        <th rowspan="1"></th>
                                        <th rowspan="1"></th>
                                        <th rowspan="1"></th>
                                        <th rowspan="1"></th>
                                        <th rowspan="1"></th>
                                    </tr>
                                </tfoot>
                            </table>
                            
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <div>
        
    </div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment-duration-format/2.3.2/moment-duration-format.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/locale/th.js"></script>

<!--app JS-->
<script src="{{ asset('/theme/js/app.js') }}"></script>

<!--plugins-->
<script src="{{ asset('/theme/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/theme/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>


<script>
    $(document).ready(function() {

        var activeCount = 0;
        var inactiveCount = 0;

        $("#table_show_member tfoot th").each(function () {
            if($(this).text()){
                var title = $(this).text();
                if(title){
                    $(this).html('<input type="text" style="width:100%;" placeholder="🔎 ' + title + '" />');
                }
            }
        });
        // DataTable initialisation
        var table = $("#table_show_member").DataTable({
            dom: '<"dt-buttons"Bf><"clear">lirtp',
            paging: true,
            autoWidth: true,
            lengthChange: false,
            pageLength: 20,
            columnDefs: [
                { type: "num", targets: 0 }, // กำหนดประเภทของข้อมูลในคอลัมน์ที่ 0 เป็นรูปแบบตัวเลข
                { targets: [8, 9], orderable: false } // ปิดการเรียงลำดับสำหรับคอลัมน์ 9 และ 10
            ],
            order: [[0, 'desc']], // เรียงลำดับคอลัมน์ที่ 0 จากมากไปน้อย
            buttons: [
                {
                    text: "คืนค่าเริ่มต้น", // ข้อความที่จะแสดงในปุ่ม
                    action: function () {
                        table.order([[0, 'desc']]).draw(); // เรียกใช้การเรียงลำดับเริ่มต้นและวาดตารางใหม่
                        count_active_inactive(); // คำนวณ Active และ Inactive ใหม่
                    }
                },
                {
                    extend: "excelHtml5",
                    text: "Export Excel"  // เปลี่ยนข้อความในปุ่มที่นี่
                },
            ],
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/th.json',
            },
            initComplete: function (settings, json) {
                var footer = $("#table_show_member tfoot tr");
                $("#table_show_member thead").append(footer);
                count_active_inactive();
            }
        });

        // เมื่อมีการเปลี่ยนหน้า
        table.on('page.dt', function () {

            setTimeout(function() {
                count_active_inactive(); // เรียกใช้งานฟังก์ชันคำนวณ Active และ Inactive
            }, 1500);
        });

        // เมื่อมีการเรียงลำดับ
        table.on('order.dt', function () {
            count_active_inactive();
        });

        // นับจำนวน "Active" และ "Inactive" หลังจากการค้นหา
        $("#table_show_member thead").on("keyup", "input", function () {
            table.column($(this).parent().index())
                .search(this.value)
                .draw();

            count_active_inactive();
            
        });

        document.querySelector('#table_show_member').classList.remove('dataTable');
        document.querySelector('#table_show_member').setAttribute('style',"width: 100%;");
        document.querySelector('#table_show_member_info').classList.add('mt-2','mb-2');
    } );

    function count_active_inactive(){
        activeCount = 0;
        inactiveCount = 0;

        $("div#show_text_status_member").each(function () {
            var statusText = $(this).text().trim();
            if (statusText === "Active") {
                activeCount++;
            } else if (statusText === "Inactive") {
                inactiveCount++;
            }
        });

        // console.log("Active count:", activeCount);
        // console.log("Inactive count:", inactiveCount);

        let count_active_inactive_old = document.querySelector('#count_active_inactive') ;
        if(count_active_inactive_old){
            count_active_inactive_old.remove() ;
        }

        let text_html = `
            <div id="count_active_inactive" class="float-end">
                <span class="text-success">Active : `+ activeCount +`</span> / <span class="text-danger">Inactive : `+ inactiveCount+`</span>
            </div>
        `;

        document.querySelector('#table_show_member_info').insertAdjacentHTML('afterbegin', text_html); // แทรกบนสุด
    }

</script>

<script>

    function on_inputData(){
        document.querySelector('#div_text_alert_email').classList.add('d-none');

        document.querySelector('#text_alert_input_Username').classList.add('d-none') ;
        document.querySelector('#text_alert_input_Name').classList.add('d-none') ;
        document.querySelector('#text_alert_input_email').classList.add('d-none') ;
        document.querySelector('#text_alert_input_member_status').classList.add('d-none') ;
        document.querySelector('#text_alert_input_member_role').classList.add('d-none') ;
        document.querySelector('#text_alert_input_no_member').classList.add('d-none') ;
        document.querySelector('#text_alert_input_member_co').classList.add('d-none') ;
        document.querySelector('#text_alert_input_member_tel').classList.add('d-none') ;
        document.querySelector('#text_alert_input_member_addr').classList.add('d-none') ;
        
    }
    
    function check_create_member(){

        let Username = document.querySelector('#Username').value ;
        let Name = document.querySelector('#Name').value ;
        // let email = document.querySelector('#email').value ;
        let member_status = document.querySelector('#member_status').value ;
        let member_role = document.querySelector('#member_role').value ;
        let no_member = document.querySelector('#no_member').value ;

        let member_co = document.querySelector('#member_co').value ;
        let member_tel = document.querySelector('#member_tel').value ;
        let member_addr = document.querySelector('#member_addr').value ;


        if (!no_member || !Username || !Name || !member_status || !member_role || !member_co || !member_tel || !member_addr) {

            checkConditions(Username , Name , member_status , member_role , no_member , member_co , member_tel , member_addr);

        }else{

            document.querySelector('#btn_a_copydata').click();
            create_member();
        }

    }

    function create_member(){

        let no_member = document.querySelector('#no_member').value ;
        let Username = document.querySelector('#Username').value ;
        let Name = document.querySelector('#Name').value ;
        let email = document.querySelector('#email').value ;
        if(!email){
            email = 'กรุณาเพิ่มอีเมล' ;
        }
        let member_status = document.querySelector('#member_status').value ;
        let member_role = document.querySelector('#member_role').value ;

        let member_co = document.querySelector('#member_co').value ;
        let member_addr = document.querySelector('#member_addr').value ;
        let member_tel = document.querySelector('#member_tel').value ;

        let data_arr = [];

        data_arr = {
            "no_member" : no_member,
            "username" : Username,
            "name" : Name,
            "email" : email,
            "member_status" : member_status,
            "member_role" : member_role,
            "member_co" : member_co,
            "member_addr" : member_addr,
            "member_tel" : member_tel,
        };

        fetch("{{ url('/') }}/api/create_member", {
            method: 'post',
            body: JSON.stringify(data_arr),
            headers: {
                'Content-Type': 'application/json'
            }
        }).then(function (response){
            return response.json();
        }).then(function(data){

            // console.log(data);
            // console.log(data.check_data);
            let loop_i = 0 ;

            if(data.check_data == "OK"){

                for (const [key, value ] of Object.entries(data)) {
                    if(value == null){
                        data[key] = '';
                    }
                }

                loop_i = loop_i + 1 ;

                document.querySelector('#div_loading').classList.add('d-none');
                document.querySelector('#div_load_success').classList.remove('d-none');
                document.querySelector('.checkmark').classList.remove('d-none');
                document.querySelector('.div_copydata').innerHTML= "" ;
                setTimeout(function() {
                    

                    let html = `
                        <div class="row g-0">
                            <div class="p-5">
                                <h4 class="font-weight-bold">สร้างบัญชีสำเร็จ</h4>
                                <div class="mb-3 mt-4">
                                    <label class="form-label">ชื่อผู้ใช้และรหัสผ่าน</label>
                                    <textarea class="form-control" name="userpass" id="userpass" readonly>สวัสดีครับ</textarea>
                                </div>
                                <div class="d-grid gap-2">
                                    <button type="button" class="btn btn-primary" onclick="CopyToClipboard('userpass')">
                                        คัดลอก
                                    </button>
                                    <button type="button" class="btn btn-success" onclick="create_success();">
                                            เสร็จสิ้น
                                    </button>
                                </div>
                            </div>
                        </div>
                    `;

                    let div_copydata = document.querySelector('.div_copydata');
                        div_copydata.insertAdjacentHTML('afterbegin', html); // แทรกบนสุด

                    let str = "Username : " + data.username + "\n" + "Password : " + data.pass_code
                    // console.log(str);
                    let userpass = document.querySelector("#userpass");
                        userpass.value = str;

                    document.querySelector('#div_load_success').classList.add('d-none');
                    document.querySelector('.checkmark').classList.add('d-none');

                    // สร้าง div รายชื่อสมาชิกไว้ด้านขวา

                    let html_member_role ;
                    let html_member_role_modal ;
                    if (data.member_role == "admin") {
                        html_member_role = `
                            <span class="badge bg-light-info text-info" style="font-size:13px;width: 100px;margin: 20px;">
                                Admin
                            </span>
                        `;

                        html_member_role_modal = `
                            <span class="btn bg-light-info text-info" style="font-size:12px;">
                                Admin
                            </span>
                        `;

                    }else if (data.member_role == "member") {
                        html_member_role = `
                            <span class="badge bg-light-success text-success" style="font-size:13px;width: 100px;margin: 20px;">
                                member
                            </span>
                        `;

                        html_member_role_modal = `
                            <span class="btn bg-light-success text-success" style="font-size:12px;">
                                member
                            </span>
                        `;

                    }else if(data.member_role == "customer"){
                        html_member_role = `
                            <span class="badge bg-light-danger text-danger" style="font-size:13px;width: 100px;margin: 20px;">
                                customer
                            </span>
                        `;

                        html_member_role_modal = `
                            <span class="btn bg-light-danger text-danger" style="font-size:12px;">
                                customer
                            </span>
                        `;

                    }else{
                        html_member_role = `
                            <span class="badge bg-light-warning text-warning" style="font-size:13px;width: 100px;margin: 20px;">
                                driver
                            </span>
                        `;

                        html_member_role_modal = `
                            <span class="btn bg-light-warning text-warning" style="font-size:12px;">
                                driver
                            </span>
                        `;

                    }

                    let html_member_status ;
                    let html_member_status_modal ;
                    if(data.member_status == "Active"){
                        html_member_status = `
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-success btn_status_Active_`+data.user_id+`" onclick="change_status_to('Active','`+data.user_id+`');"></button>
                                <button type="button" class="btn btn-outline-danger btn_status_Inactive_`+data.user_id+`" onclick="change_status_to('Inactive','`+data.user_id+`');"></button>
                            </div>
                        `;

                        html_member_status_modal = `
                            <span class="btn bg-light-success text-success" style="font-size:12px;">
                                Active
                            </span>
                        `;
                    }else{
                        html_member_status = `
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-outline-success btn_status_Active_`+data.user_id+`" onclick="change_status_to('Active','`+data.user_id+`');"></button>
                                <button type="button" class="btn btn-danger btn_status_Inactive_`+data.user_id+`" onclick="change_status_to('Inactive','`+data.user_id+`');"></button>
                            </div>
                        `;

                        html_member_status_modal = `
                            <span class="btn bg-light-danger text-danger" style="font-size:12px;">
                                Inactive
                            </span>
                        `;
                    }

                    let html_checkbox_member_status ;
                    if(data.member_status == "Active"){
                        html_checkbox_member_status = `
                            <div class="checkbox-apple">
                                <input class="yep" id="check_active_`+data.user_id+`" checked type="checkbox" onclick="click_check_active('`+data.user_id+`');">
                                <label for="check_active_`+data.user_id+`"></label>
                            </div>
                        `;
                    }else{
                        html_checkbox_member_status = `
                            <div class="checkbox-apple">
                                <input class="yep" id="check_active_`+data.user_id+`" type="checkbox" onclick="click_check_active('`+data.user_id+`');">
                                <label for="check_active_`+data.user_id+`"></label>
                            </div>
                        `;
                    }

                    // <td>
                    //     `+loop_i+`
                    // </td>
                            
                    let  html_list_member = `
                        <tr class="flashing_border">
                            <td>
                                `+data.no_member+`
                            </td>
                            <td style="width: 250px;">
                                <div class="d-flex align-items-center">
                                    <div class="ms-2">
                                        <h6 class="mb-1 font-22 td_member_co">`+data.member_co+`</h6>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">
                                `+html_member_role+`
                                <br>
                                ใช้งานระบบ `+data.member_count_login+` ครั้ง
                                <br>
                                ล่าสุด : `+data.last_time_active+`                                
                            </td>
                            <td class="text-center" style="color:green;">
                                `+data.count_Cus+`
                            </td>
                            <td class="text-center" style="color:green;">
                                `+data.count_Dri+`
                            </td>
                            <td class="text-center" style="color:blue;">
                                `+data.count_search_cus+`
                            </td>
                            <td class="text-center" style="color:blue;">
                                `+data.count_search_dri+`
                            </td>
                            <td class="text-center">
                                `+html_checkbox_member_status+`
                                <div id="td_status_member_`+data.user_id+`" class="d-none">
                                    `+html_member_status+`
                                </div>
                            </td>
                            <td class="text-center">
                                <div class="d-flex order-actions">
                                    <a href="javascript:;" class="ms-2 text-primary bg-light-primary border-0" data-toggle="modal" data-target="#view_data_mamber_`+data.user_id+`">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    `;

                    let list_member = document.querySelector('#list_member');
                        list_member.insertAdjacentHTML('afterbegin', html_list_member); // แทรกบนสุด

                    // -------------------- MODAL ------------------

                    let url_edit_profile = "{{ url('/') }}" + "/user/" + data.user_id + "/edit" ;

                    let html_member_pic ;
                    if (data.member_pic) {
                        html_member_pic = `
                            <img src="{{ url('storage')}}/`+data.member_pic+`" class="profile-pic" style="width:150px;height: 150px;object-fit: contain;">
                        `;
                    }else{
                        html_member_pic = `
                            <img src="{{ url('/img/icon/businessman.png') }}" class="profile-pic" width="150">
                        `;
                    }

                    let html_list_member_modal = `
                        <div class="modal fade" id="view_data_mamber_`+data.user_id+`" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="Label_view_data_mamber_`+data.user_id+`" aria-hidden="true">
                            <div class="modal-dialog modal-xl modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="Label_view_data_mamber_`+data.user_id+`">ข้อมูลสมาชิก</h5>
                                        <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">
                                            <i class="fa-solid fa-circle-xmark"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <div class="card">
                                            <div class="card-body">

                                                <div class="row">
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <div class="d-flex flex-column align-items-center text-center">
                                                            `+html_member_pic+`
                                                            <div class="mt-3">
                                                                <h4>`+data.name+`</h4>
                                                                <p class="text-secondary mb-1">
                                                                    `+data.member_tel+`
                                                                </p>
                                                                <p class="text-muted font-size-sm">
                                                                    `+data.member_addr+`
                                                                </p>
                                                            </div>
                                                            <div class="mt-3">
                                                                <!-- สถานะลงชื่อเข้าใช้ -->
                                                                `+html_member_status_modal+`
                                                                <!-- บทบาทของสมาชิก -->
                                                                `+html_member_role_modal+`
                                                            </div>
                                                        </div>
                                                        <hr class="my-4">
                                                        <div class="mt-2">
                                                            <div class="text-center pt-2 pb-2">
                                                                <textarea class="form-control" name="copy_username_`+data.user_id+`" id="copy_username_`+data.user_id+`" readonly>`+str+`</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="row text-center mt-3">
                                                            <div class="col-6">
                                                                <a href="`+url_edit_profile+`" class="btn btn-warning" style="width:90%;">
                                                                    แก้ไขข้อมูล
                                                                </a>
                                                            </div>
                                                            <div class="col-6">
                                                                <span class="btn btn-info" style="width:90%;" onclick="CopyToClipboard('copy_username_`+data.user_id+`');">
                                                                    Copy Username
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <ul class="list-group list-group-flush">
                                                            <li class="mt-2 mb-2 list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                                <h6 class="mb-0">
                                                                    <b>Username</b>
                                                                </h6>
                                                                <span class="text-secondary">`+data.username+`</span>
                                                            </li>
                                                            <li class="mt-2 mb-2 list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                                <h6 class="mb-0">
                                                                    <b>E-Mail</b>
                                                                </h6>
                                                                <span class="text-secondary">`+data.email+`</span>
                                                            </li>
                                                            <li class="mt-2 mb-2 list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                                <h6 class="mb-0">
                                                                    <b>บริษัท</b>
                                                                </h6>
                                                                <span class="text-secondary">`+data.member_co+`</span>
                                                            </li>
                                                            <li class="mt-2 mb-2 list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                                <h6 class="mb-0">
                                                                    <b>ลงชื่อเข้าใช้</b>
                                                                </h6>
                                                                <span class="text-secondary">0 ครั้ง</span>
                                                            </li>
                                                            <li class="mt-2 mb-2 list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                                <h6 class="mb-0">
                                                                    <b>ใช้งานล่าสุด</b>
                                                                </h6>
                                                                <span class="text-secondary">..</span>
                                                            </li>
                                                            <li class="mt-2 mb-2 list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                                <h6 class="mb-0">
                                                                    <b>ลงข้อมูล มิจฉาชีพ (เช่ารถ)</b>
                                                                </h6>
                                                                <span class="text-secondary">0 ครั้ง</span>
                                                            </li>
                                                            <li class="mt-2 mb-2 list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                                <h6 class="mb-0">
                                                                    <b>ลงข้อมูล Blacklist ข้อมูลพนักงานขับรถ</b>
                                                                </h6>
                                                                <span class="text-secondary">0 ครั้ง</span>
                                                            </li>
                                                            <li class="mt-2 mb-2 list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                                <h6 class="mb-0">
                                                                    <b>ค้นหาข้อมูล มิจฉาชีพ (เช่ารถ)</b>
                                                                </h6>
                                                                <span class="text-secondary">0 ครั้ง</span>
                                                            </li>
                                                            <li class="mt-2 mb-2 list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                                <h6 class="mb-0">
                                                                    <b>ค้นหา Blacklist ข้อมูลพนักงานขับรถ</b>
                                                                </h6>
                                                                <span class="text-secondary">0 ครั้ง</span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;

                    let list_member_modal = document.querySelector('#list_member_modal');
                        list_member_modal.insertAdjacentHTML('afterbegin', html_list_member_modal); // แทรกบนสุด

                }, 2000);


            }
        }).catch(function(error){
            // console.error(error);
        });

    }

    function create_success(){

        document.querySelector('#no_member').value = "" ;
        document.querySelector('#Username').value = "" ;
        document.querySelector('#Name').value = "" ;
        document.querySelector('#email').value = "" ;
        document.querySelector('#member_status').value = "" ;
        document.querySelector('#member_role').value = "" ;

        document.querySelector('#member_co').value = "" ;
        document.querySelector('#member_addr').value = "" ;
        document.querySelector('#member_tel').value = "" ;

        document.querySelector('#btn_a_inputdata').click();
    }

    function CopyToClipboard(containerid) {

        window.getSelection().removeAllRanges();

        let range ;
        if (document.selection) {
            range = document.body.createTextRange();
            range.moveToElementText(document.getElementById(containerid));
            range.select().createTextRange();
            document.execCommand("copy");
            document.querySelector('#go_back').classList.remove('d-none');
        } else if (window.getSelection) {
            range = document.createRange();
            range.selectNode(document.getElementById(containerid));
            window.getSelection().addRange(range);
            document.execCommand("copy");

            document.querySelector('#alert_text').innerHTML = "คัดลอกเรียบร้อย";
            document.querySelector('#alert_copy').classList.add('up_down');

            const animated = document.querySelector('.up_down');
            animated.onanimationend = () => {
                document.querySelector('#alert_copy').classList.remove('up_down');
            };
        }

    }

    function check_email(){
        let email = document.querySelector('#email').value ;

        fetch("{{ url('/') }}/api/check_email/"+email)
            .then(response => response.text())
            .then(result => {
                // console.log(result);
                if(result == "มีข้อมูลอีเมลนี้แล้ว"){
                    document.querySelector('#div_text_alert_email').classList.remove('d-none');
                    document.querySelector('#email').classList.add('is-invalid');
                    document.querySelector('#email').value = '' ;
                    document.querySelector('#email').focus() ;
                }if(result == "อีเมลนี้สามารถใช้งานได้"){
                    document.querySelector('#email').classList.remove('is-invalid');
                }
            });
    }

    function checkConditions(Username , Name , member_status , member_role , no_member , member_co , member_tel , member_addr) {

        if (!no_member) {
            document.querySelector('#text_alert_input_no_member').innerHTML = 'กรุณากรอกข้อมูล : เลขที่สมาชิก';
            document.querySelector('#text_alert_input_no_member').classList.remove('d-none');
            document.querySelector('#no_member').focus();
            return false;
        }else if (!Username) {
            document.querySelector('#text_alert_input_Username').innerHTML = 'กรุณากรอกข้อมูล : Username';
            document.querySelector('#text_alert_input_Username').classList.remove('d-none');
            document.querySelector('#Username').focus();
            return false;
        } else if (!Name) {
            document.querySelector('#text_alert_input_Name').innerHTML = 'กรุณากรอกข้อมูล : Name';
            document.querySelector('#text_alert_input_Name').classList.remove('d-none');
            document.querySelector('#Name').focus();
            return false;
        }
        // else if (!email) {
        //     document.querySelector('#text_alert_input_email').innerHTML = 'กรุณากรอกข้อมูล : email';
        //     document.querySelector('#text_alert_input_email').classList.remove('d-none');
        //     document.querySelector('#email').focus();
        //     return false;
        // }
        else if (!member_status) {
            document.querySelector('#text_alert_input_member_status').innerHTML = 'กรุณากรอกข้อมูล : สถานะลงชื่อเข้าใช้';
            document.querySelector('#text_alert_input_member_status').classList.remove('d-none');
            document.querySelector('#member_status').focus();
            return false;
        }else if (!member_role) {
            document.querySelector('#text_alert_input_member_role').innerHTML = 'กรุณากรอกข้อมูล : บทบาทสมาชิก';
            document.querySelector('#text_alert_input_member_role').classList.remove('d-none');
            document.querySelector('#member_role').focus();
            return false;
        }
        else if (!member_co) {
            document.querySelector('#text_alert_input_member_co').innerHTML = 'กรุณากรอกข้อมูล : บริษัท';
            document.querySelector('#text_alert_input_member_co').classList.remove('d-none');
            document.querySelector('#member_co').focus();
            return false;
        }
        else if (!member_tel) {
            document.querySelector('#text_alert_input_member_tel').innerHTML = 'กรุณากรอกข้อมูล : เบอร์ติดต่อ';
            document.querySelector('#text_alert_input_member_tel').classList.remove('d-none');
            document.querySelector('#member_tel').focus();
            return false;
        }
        else if (!member_addr) {
            document.querySelector('#text_alert_input_member_addr').innerHTML = 'กรุณากรอกข้อมูล : ที่อยู่';
            document.querySelector('#text_alert_input_member_addr').classList.remove('d-none');
            document.querySelector('#member_addr').focus();
            return false;
        }

    }

    function change_status_to(change_to , user_id){

        fetch("{{ url('/') }}/api/change_status_to/"+change_to+"/"+user_id)
            .then(response => response.text())
            .then(result => {
                // console.log(change_to);
                if(result == "OK"){

                    let html_btn_status ;
                    let td_status_member = document.querySelector('#td_status_member_'+user_id);
                        td_status_member.innerHTML = '' ;

                    if(change_to == "Active"){

                        html_btn_status = `
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-success btn_status_Active_`+user_id+`" onclick="change_status_to('Active','`+user_id+`');">Active</button>
                                <button type="button" class="btn btn-outline-danger btn_status_Inactive_`+user_id+`" onclick="change_status_to('Inactive','`+user_id+`');">Inactive</button>
                            </div>
                        `;

                    }else{

                        html_btn_status = `
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-outline-success btn_status_Active_`+user_id+`" onclick="change_status_to('Active','`+user_id+`');">Active</button>
                                <button type="button" class="btn btn-danger btn_status_Inactive_`+user_id+`" onclick="change_status_to('Inactive','`+user_id+`');">Inactive</button>
                            </div>
                        `;

                    }

                    td_status_member.innerHTML = html_btn_status ;
                }
            });

    }

    function click_check_active(id){
        let check_active = document.querySelector('#check_active_'+id).checked;
            // console.log(check_active);

            if(check_active){
                document.querySelector('.btn_status_Active_'+id).click();
            }else{
                document.querySelector('.btn_status_Inactive_'+id).click();
            }
    }

</script>

@endsection
