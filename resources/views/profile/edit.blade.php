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
</style>

<div id="alert_copy" class="div_alert" role="alert">
    <span id="alert_text">
        คัดลอกเรียบร้อย
    </span>
</div>

<form method="POST" action="{{ url('/user/' .$user->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
    {{ method_field('PATCH') }}
    {{ csrf_field() }}

    <div class="container">
        <div class="main-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="card sticky">
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

                                    <label for="member_pic" class="icon-overlay">
                                        <i class="fa-solid fa-pen-to-square text-white"></i>
                                    </label>
                                    <input type="file" name="member_pic" id="member_pic" class="d-none">
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
                                    @elseif($user->member_role == "member")
                                        <span class="btn bg-light-success text-success" style="font-size:13px;">
                                            member
                                        </span>
                                    @else
                                        <span class="btn bg-light-info text-info" style="font-size:12px;">
                                            แอดมิน
                                        </span>
                                    @endif
                                </p>

                                <script>
                                    const fileInput = document.getElementById('member_pic');
                                    const profilePic = document.querySelector('.profile-pic');

                                    fileInput.addEventListener('change', function() {
                                        const file = this.files[0];
                                        if (file) {
                                            const reader = new FileReader();
                                            reader.onload = function(e) {
                                                profilePic.src = e.target.result;
                                            }
                                            reader.readAsDataURL(file);
                                        }
                                    });
                                </script>

                            </div>
                            <!-- <hr class="my-4"> -->
                        </div>

                    </div>
                    <div class="row">
                        @if(Auth::user()->member_role == "admin")
                        <div class="col-12">
                            <div class="input-group mb-2" style="background-color: lightblue;">
                                <span class="input-group-text bg-transparent">
                                    <i class="fa-solid fa-unlock"></i> &nbsp;รหัสผ่านเดิม&nbsp;
                                </span>
                                <input type="text" class="form-control border-start-0" id="old_key" value="{{ $user->create_member->pass_code }}" oninput="check_input_pass();" readonly autocomplete="off">
                                <span id="view_pass_old_key" class="input-group-text" style="cursor: pointer;" onclick="view_pass('old_key');">
                                    <i class="fa-solid fa-eye-slash"></i>
                                </span>
                            </div>
                            <div class="input-group mb-2 bg-success bg-gradient">
                                <span class="input-group-text bg-transparent">
                                    <i class="fa-solid fa-key"></i> &nbsp;รหัสผ่านใหม่&nbsp;
                                </span>
                                <input type="password" class="form-control border-start-0" id="new_key" oninput="check_input_pass();">
                                <span id="view_pass_new_key" class="input-group-text" style="cursor: pointer;" onclick="view_pass('new_key');">
                                    <i class="fa-solid fa-eye-slash"></i>
                                </span>
                            </div>
                            <div class="input-group mb-2 bg-success bg-gradient">
                                <span class="input-group-text bg-transparent">
                                    <i class="fa-duotone fa-key"></i> &nbsp;กรอกอีกครั้ง
                                </span>
                                <input type="password" class="form-control border-start-0" id="new_key_again" oninput="check_input_pass();">
                                <span id="view_pass_new_key_again" class="input-group-text" style="cursor: pointer;" onclick="view_pass('new_key_again');">
                                    <i class="fa-solid fa-eye-slash"></i>
                                </span>
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
                                        <span class="visually d-none" style="position: absolute;margin-top:-25px;"> เสร็จสิ้น</span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <span id="btn_submit_passcode" class="btn btn-primary float-end" style="width:100%;" disabled onclick="submit_change_pass();">
                                        ยืนยัน
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div id="div_new_password" class="d-none">
                            <div class="col-12 text-center pt-2 pb-2">
                                <textarea class="form-control" name="copy_new_password" id="copy_new_password" readonly>
                                </textarea>
                            </div>
                            <div class="col-12 text-center">
                                <span class="btn btn-info" style="width:60%;" onclick="CopyToClipboard('copy_new_password');">
                                    Copy
                                </span>
                            </div>
                        </div>
                        @endif
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
                            @if($user->member_role == 'admin')
                                <div class="card radius-10 border shadow-none">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div style="width:90%;">
                                                <p class="mb-0 text-secondary">เลขที่สมาชิก</p>
                                                <input type="text" style="width:100%;" class="form-control" name="no_member" value="{{ $user->no_member }}">
                                            </div>
                                            <div class="widgets-icons bg-light-dark text-dark ms-auto">
                                                <i class="fa-solid fa-input-numeric"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            
                            <div class="card radius-10 border shadow-none">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div style="width:90%;">
                                            <p class="mb-0 text-secondary">ชื่อ-นามสกุล</p>
                                            <input type="text" style="width:100%;" class="form-control" name="member_name" value="{{ $user->member_name }}">
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
                                        <div style="width:90%;" >
                                            <p class="mb-0 text-secondary">ชื่อโปรไฟล์</p>
                                            <input type="text" style="width:100%;" class="form-control" name="name" value="{{ $user->name }}">
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
                                        <div style="width:90%;" >
                                            <p class="mb-0 text-secondary">เบอร์ติดต่อ</p>
                                            <input type="text" style="width:100%;" class="form-control" name="member_tel" value="{{ $user->member_tel }}">
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
                                        <div style="width:90%;" >
                                            <p class="mb-0 text-secondary">อีเมล</p>
                                            <input type="text" style="width:100%;" class="form-control" name="email" value="{{ $user->email }}">
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
                                        <div style="width:90%;" >
                                            <p class="mb-0 text-secondary">บริษัท</p>
                                            <input type="text" style="width:100%;" class="form-control" name="member_co" value="{{ $user->member_co }}">
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
                                        <div style="width:90%;" >
                                            <p class="mb-0 text-secondary">ที่อยู่</p>
                                            <textarea style="width:100%;" rows="4" class="form-control" name="member_addr">{{ $user->member_addr }}</textarea>
                                        </div>
                                        <div class="widgets-icons bg-light-secondary text-secondary ms-auto">
                                            <i class="fa-sharp fa-solid fa-map-location-dot"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 text-secondary">
                                    <input type="submit" class="btn btn-primary px-4 float-end" value="Save Changes">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</form>

<script>
                        
    let delay_check_input_pass ;

    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        setTimeout(function() {
            document.querySelector('#new_key').value = '';
            document.querySelector('#new_key_again').value = '';
        }, 1500);
        
    });


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

        // console.log("old_key >> " + old_key);
        // console.log("new_key >> " + new_key);
        // console.log("new_key_again >> " + new_key_again);

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
                // console.log(data);

                setTimeout(function() {
                    if(data == "เสร็จสิ้น"){
                        document.querySelector('#div_pass_spinner').classList.add('d-none');
                        document.querySelector('#div_load_success').classList.remove('d-none');
                        document.querySelector('.checkmark').classList.remove('d-none');

                        setTimeout(function() {

                            document.querySelector('#div_load_success').classList.add('d-none');
                            document.querySelector('.checkmark').classList.add('d-none');

                            // document.querySelector('#flush_change_passcord').classList.remove('show');

                            document.querySelector('#old_key').value = '' ;
                            document.querySelector('#new_key').value = '' ;
                            document.querySelector('#new_key_again').value = '' ;

                            let text_username = `Username : {{ $user->username }}
Password : ${new_key}`;

                            document.querySelector('#copy_new_password').innerHTML = text_username;

                            document.querySelector('#div_new_password').classList.remove('d-none');
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

    function view_pass(type){

        let eye = `<i class="fa-sharp fa-solid fa-eye"></i>`;
        let eye_slash = `<i class="fa-solid fa-eye-slash"></i>`;

        if( type == 'old_key' ){
            let get_old_key = document.querySelector('#'+type).getAttribute('type');
            if(get_old_key == 'password'){
                document.querySelector('#'+type).setAttribute('type' , 'text');
                document.querySelector('#view_pass_'+type).innerHTML = eye;
            }else{
                document.querySelector('#'+type).setAttribute('type' , 'password');
                document.querySelector('#view_pass_'+type).innerHTML = eye_slash;
            }
        }else if( type == 'new_key' ){
            let get_new_key = document.querySelector('#'+type).getAttribute('type');
            if(get_new_key == 'password'){
                document.querySelector('#'+type).setAttribute('type' , 'text');
                document.querySelector('#view_pass_'+type).innerHTML = eye;
            }else{
                document.querySelector('#'+type).setAttribute('type' , 'password');
                document.querySelector('#view_pass_'+type).innerHTML = eye_slash;
            }
        }else{
            let get_new_key_again = document.querySelector('#'+type).getAttribute('type');
            if(get_new_key_again == 'password'){
                document.querySelector('#'+type).setAttribute('type' , 'text');
                document.querySelector('#view_pass_'+type).innerHTML = eye;
            }else{
                document.querySelector('#'+type).setAttribute('type' , 'password');
                document.querySelector('#view_pass_'+type).innerHTML = eye_slash;
            }
        }

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

</script>
@endsection