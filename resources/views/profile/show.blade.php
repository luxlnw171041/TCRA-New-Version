@extends('layouts.theme')

@section('content')
<style>
    .userID {
        position: absolute;
        top: 5px;
        right: 5px;
        padding: 1px 20px;
        background-color: #2260ff;
        border-radius: 15px;
        color: #fff;
    }

    .status_user {
        position: absolute;
        top: 5px;
        left: 5px;
        padding: 1px 20px;
        border-radius: 15px;
        color: #fff;
    }
</style>
<style>
    .profile-pic-container {
        position: relative;
        display: inline-block;
    }

    .profile-pic {
        width: 250px;
        /* ปรับขนาดตามที่คุณต้องการ */
        height: 250px;
        /* ปรับขนาดตามที่คุณต้องการ */
        border-radius: 50%;
        /* ให้รูปเป็นวงกลม */
        object-fit: contain;
        /* ครอบรอบรูปโดยที่ไม่เกิดการยืด/ย่อภาพ */
    }

    .profile-pic-container:hover .icon-overlay {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .icon-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        /* ปรับสีพื้นหลังตามต้องการ */
        display: none;
        border-radius: 50%;
    }

    .icon-overlay i {
        font-size: 24px;
        /* ปรับขนาดไอคอนตามที่คุณต้องการ */
        color: #fff;
        /* ปรับสีไอคอนตามต้องการ */
    }


    .checkmark {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        display: block;
        stroke-width: 2;
        stroke: #29cc39;
        stroke-miterlimit: 10;
        margin-top: 4px;
        margin-left: 25%;
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
    .icon-24{
        width: 24px;
        height: 24px;
        font-size: 18px;
        padding: 0;
        margin: 0;display: flex;
        align-items: center;
    }.list-item-data-user{
        display: flex;
        align-items: center;
    }
    .list-item-data-user i{
       margin-right: 5px;
    }
</style>

<div class="container">
    <div class="main-body">
        <div class="row">
            <div class="col-md-4">
                <div class="card sticky">
                    <!-- <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            @if(!empty($user->member_pic))
                                <img src="{{ url('storage')}}/{{ $user->member_pic }}" alt="Admin" class="rounded-circle p-1" width="110">
                            @else
                             <img src="{{asset('img/icon/user.jpg')}}" alt="Admin" class="rounded-circle p-1" width="110">
                            @endif

                            <div class="mt-3">
                                <h4>U-name : <b>{{ $user->username }}</b></h4>
                                <p class="text-secondary mb-1">สถานะ : <b>{{$user->member_role}}</b></p>
                                <p class="text-muted font-size-sm">ID : <b>{{$user->id}}</b> </p>
                                <button class="btn btn-primary">แก้ไขข้อมูล</button>
                                <button class="btn btn-outline-primary">Message</button>
                            </div>
                        </div>
                        <hr class="my-4">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0 list-item-data-user">
                                    <i class="icon-24 fa-solid fa-user"></i> เป็นสมาชิกเมื่อ
                                </h6>
                                <span class="text-secondary"> {{ \Carbon\Carbon::parse($user->created_at)->locale('th')->diffForHumans() }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0 list-item-data-user text-primary">
                                    <i class="icon-24 fa-solid fa-right-to-bracket"></i> ลงชื่อเข้าใช้</h6>
                                <span class="text-secondary">{{ $user->member_count_login }} ครั้ง</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0 list-item-data-user text-danger">
                                    <i class="icon-24 fa-solid fa-file-export"></i> ลงข้อมูล</h6>
                                <span class="text-secondary">{{ $count_data_add }} ครั้ง</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0 list-item-data-user text-info">
                                    <i class="icon-24 fa-solid fa-magnifying-glass"></i> ค้นหาข้อมูล</h6>
                                <span class="text-secondary">{{ intval($user->count_search) }} ครั้ง</span>
                            </li>
                        </ul>
                    </div> -->



























                    <div class="p-5 pb-2">
                        <span class="userID">
                            ID : {{ $user->id }}
                        </span>
                        @if($user->member_status == 'Active')
                            <span class="status_user" style="background-color: #18f29b;">
                                {{ $user->member_status }}
                            </span>
                        @else
                            <span class="status_user" style="background-color: #eb2d17;">
                                {{ $user->member_status }}
                            </span>
                        @endif
                        <div class="d-flex flex-column align-items-center text-center">
                            <div class="profile-pic-container">
                                @if(!empty($user->member_pic))
                                    <img class="profile-pic" src="{{ url('storage')}}/{{ $user->member_pic }}" alt="Profile Picture">
                                @else
                                    <img class="profile-pic" src="{{asset('img/icon/user.jpg')}}" alt="Profile Picture">
                                @endif
                            </div>
                            <h4 class="mb-1 mt-3">
                                U-name : <b>{{ $user->username }}</b>
                            </h4>
                            <p class="mb-1 mt-2">
                                @if( $user->member_role == "customer" )
                                    <span class="badge bg-light-danger text-danger" style="font-size:13px;">
                                        customer
                                    </span>
                                @elseif($user->member_role == "driver")
                                    <span class="btn bg-light-warning text-warning" style="font-size:13px;">
                                        driver
                                    </span>
                                @else
                                    <span class="btn bg-light-info text-info" style="font-size:12px;">
                                        แอดมิน
                                    </span>
                                @endif
                            </p>
                        </div>
                        <!-- <hr class="my-4"> -->
                    </div>
                        
                    <center>
                        <hr class="text-primary" style="width:90%;">
                    </center>

                    <div class="p-2 text-center">
                        <div class="p-2 d-flex align-items-center">
                            <div class="product-img">
                                <img src="{{ url('/img/icon/group.png') }}" class="p-1" alt="">
                            </div>
                            <div class="ps-3">
                                <h6 class="mb-0 font-weight-bold">เป็นสมาชิกเมื่อ</h6>
                            </div>
                            <p class="ms-auto mb-0 text-purple">
                                {{ \Carbon\Carbon::parse($user->created_at)->locale('th')->diffForHumans() }}
                            </p>
                        </div>
                        <div class="p-2 d-flex align-items-center">
                            <div class="product-img">
                                <img src="{{ url('/img/icon/permission.png') }}" class="p-1" alt="">
                            </div>
                            <div class="ps-3">
                                <h6 class="mb-0 font-weight-bold">ลงชื่อเข้าใช้</h6>
                            </div>
                            <p class="ms-auto mb-0 text-purple">{{ $user->member_count_login }} ครั้ง</p>
                        </div>
                        <div class="p-2 d-flex align-items-center">
                            <div class="product-img">
                                <img src="{{ url('/img/icon/database.png') }}" class="p-1" alt="">
                            </div>
                            <div class="ps-3">
                                <h6 class="mb-0 font-weight-bold">ลงข้อมูล</h6>
                            </div>
                            <p class="ms-auto mb-0 text-purple">{{ $count_data_add }} ครั้ง</p>
                        </div>
                        <div class="p-2 d-flex align-items-center">
                            <div class="product-img">
                                <img src="{{ url('/img/icon/search.png') }}" class="p-1" alt="">
                            </div>
                            <div class="ps-3">
                                <h6 class="mb-0 font-weight-bold">ค้นหาข้อมูล</h6>
                            </div>
                            <p class="ms-auto mb-0 text-purple">{{ intval($user->count_search) }} ครั้ง</p>
                        </div>
                        
                        @if(Auth::user()->id == $user->id)
                        <div class="d-grid mt-3">
                            <br>
                            <div class="row text-center">
                                <div class="col-6">
                                    <a href="{{ url('/user/' . $user->id . '/edit') }}" style="width:100%;" class="btn btn-warning radius-15">
                                        แก้ไขข้อมูล <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                </div>
                                <div class="col-6">
                                    
                                    <div class="accordion accordion-flush" id="card_change_passcord" >
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="change_passcord">
                                                <a href="#" style="width:100%;" class="btn btn-outline-secondary radius-15" data-bs-toggle="collapse" data-bs-target="#flush_change_passcord" aria-expanded="false" aria-controls="flush_change_passcord">
                                                    เปลี่ยนรหัสผ่าน <i class="fa-solid fa-key"></i>
                                                </a>
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div id="flush_change_passcord" class="collapse mt-5" aria-labelledby="change_passcord" data-bs-parent="#card_change_passcord">
                                        <div class="input-group mb-2" style="background-color: lightblue;">
                                            <span class="input-group-text bg-transparent">
                                                <i class="fa-solid fa-unlock"></i> &nbsp;รหัสผ่านเดิม&nbsp;
                                            </span>
                                            <input type="password" class="form-control border-start-0" id="old_key" oninput="check_input_pass();">
                                        </div>
                                        <div class="input-group mb-2" style="background-color: lightblue;">
                                            <span class="input-group-text bg-transparent">
                                                <i class="fa-solid fa-key"></i> &nbsp;รหัสผ่านใหม่&nbsp;
                                            </span>
                                            <input type="password" class="form-control border-start-0" id="new_key" oninput="check_input_pass();">
                                        </div>
                                        <div class="input-group mb-2" style="background-color: lightblue;">
                                            <span class="input-group-text bg-transparent">
                                                <i class="fa-duotone fa-key"></i> &nbsp;กรอกอีกครั้ง
                                            </span>
                                            <input type="password" class="form-control border-start-0" id="new_key_again" oninput="check_input_pass();">
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-12">
                                                <span id="text_pass_error" class="text-danger float-start d-none"></span>
                                            </div>
                                            <div class="col-6" >
                                                <div id="div_pass_spinner" class="d-none">
                                                    <div class="spinner-border text-success" role="status">
                                                    </div>
                                                    <span class="visually"> กำลังโหลด...</span>
                                                </div>
                                                <div id="div_load_success" class="d-none">
                                                    <svg class="checkmark d-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                                        <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                                                        <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                                                    </svg>
                                                    <span class="visually" style="position: absolute;margin-top:-25px;"> เสร็จสิ้น</span>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <button id="btn_submit_passcode" class="btn btn-primary float-end" style="width:100%;" disabled onclick="submit_change_pass();">
                                                    ยืนยัน
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h4 class="mb-0 mt-2">ข้อมูลทั่วไป</h4>
                            </div>
                        </div>
                    </div>

                    <div class="p-3 mb-3">
                        
                        <div class="card radius-10 border shadow-none">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p class="mb-0 text-secondary">ชื่อเต็ม</p>
                                        <h4 class="mb-0">{{ $user->member_name }}</h4>
                                    </div>
                                    <div class="widgets-icons bg-light-primary text-primary ms-auto">
                                        <i class="fa-solid fa-signature"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card radius-10 border shadow-none">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p class="mb-0 text-secondary">ชื่อ</p>
                                        <h4 class="mb-0">{{ $user->name }}</h4>
                                    </div>
                                    <div class="widgets-icons bg-light-success text-success ms-auto">
                                        <i class="fa-sharp fa-solid fa-input-text"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card radius-10 border shadow-none">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p class="mb-0 text-secondary">เบอร์ติดต่อ</p>
                                        <h4 class="mb-0">{{ $user->member_tel }}</h4>
                                    </div>
                                    <div class="widgets-icons bg-light-danger text-danger ms-auto">
                                        <i class="fa-solid fa-phone"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card radius-10 border shadow-none">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p class="mb-0 text-secondary">อีเมล</p>
                                        <h4 class="mb-0">{{ $user->email }}</h4>
                                    </div>
                                    <div class="widgets-icons bg-light-warning text-warning ms-auto">
                                        <i class="fa-solid fa-at"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card radius-10 border shadow-none">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p class="mb-0 text-secondary">บริษัท</p>
                                        <h4 class="mb-0">{{ $user->member_co }}</h4>
                                    </div>
                                    <div class="widgets-icons bg-light-info text-info ms-auto">
                                        <i class="fa-regular fa-building"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card radius-10 border shadow-none">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p class="mb-0 text-secondary">ที่อยู่</p>
                                        <h4 class="mb-0">{{ $user->member_addr }}</h4>
                                    </div>
                                    <div class="widgets-icons bg-light-secondary text-secondary ms-auto">
                                        <i class="fa-sharp fa-solid fa-map-location-dot"></i>
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

<script>
                        
    let delay_check_input_pass ;

    function check_input_pass(){
        
        document.querySelector('#text_pass_error').classList.add('d-none');
        document.querySelector('#div_pass_spinner').classList.add('d-none');

        clearTimeout(delay_check_input_pass);

        delay_check_input_pass = setTimeout(function() {

            let old_key = document.querySelector('#old_key').value ;
            let new_key = document.querySelector('#new_key').value ;
            let new_key_again = document.querySelector('#new_key_again').value ;

            if(!old_key || !new_key || !new_key_again){
                document.querySelector('#btn_submit_passcode').disabled = true ;
            }else{
                document.querySelector('#btn_submit_passcode').disabled = false ;
            }

        }, 500);

    }

    function submit_change_pass(){

        let old_key = document.querySelector('#old_key').value ;
        let new_key = document.querySelector('#new_key').value ;
        let new_key_again = document.querySelector('#new_key_again').value ;

        if (new_key != new_key_again) {
            document.querySelector('#text_pass_error').innerHTML = 'รหัสผ่านไม่ตรงกัน';
            document.querySelector('#text_pass_error').classList.remove('d-none');
        }else{
            document.querySelector('#text_pass_error').innerHTML = '';
            document.querySelector('#text_pass_error').classList.add('d-none');

            document.querySelector('#div_pass_spinner').classList.remove('d-none');

            let data_arr = [];

            data_arr = {
                "user_id" : "{{ $user->id }}",
                "old_key" : old_key,
                "new_key" : new_key,
                "new_key_again" : new_key_again,
            };

            fetch("{{ url('/') }}/api/submit_change_pass", {
                method: 'post',
                body: JSON.stringify(data_arr),
                headers: {
                    'Content-Type': 'application/json'
                }
            }).then(function (response){
                return response.text();
            }).then(function(data){
                console.log(data);

                setTimeout(function() {
                    if(data == "เสร็จสิ้น"){
                        document.querySelector('#div_pass_spinner').classList.add('d-none');
                        document.querySelector('#div_load_success').classList.remove('d-none');
                        document.querySelector('.checkmark').classList.remove('d-none');

                        setTimeout(function() {

                            document.querySelector('#div_load_success').classList.add('d-none');
                            document.querySelector('.checkmark').classList.add('d-none');

                            document.querySelector('#flush_change_passcord').classList.remove('show');

                            document.querySelector('#old_key').value = '' ;
                            document.querySelector('#new_key').value = '' ;
                            document.querySelector('#new_key_again').value = '' ;
                        }, 1500);

                    }else{
                        document.querySelector('#div_pass_spinner').classList.add('d-none');
                        document.querySelector('#text_pass_error').innerHTML = data;
                        document.querySelector('#text_pass_error').classList.remove('d-none');
                        document.querySelector('#old_key').value = '' ;
                        document.querySelector('#new_key').value = '' ;
                        document.querySelector('#new_key_again').value = '' ;
                    }
                }, 1500);

                


            }).catch(function(error){
                // console.error(error);
            });

        }
    }

</script>
@endsection