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
    top: -10%;
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
            transform: translateY(100px);
        }
        90% {
            transform: translateY(100px);
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

</style>

<div id="alert_copy" class="div_alert" role="alert">
    <span id="alert_text">
        คัดลอกเรียบร้อย
    </span>
</div>

<div class="row">
    <div class="col-md-3">
        <div class="card sticky">
            <div class="card-body p-2">

                <div class="card radius-10 bg-success bg-gradient">
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
                </div>

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

                        <!-- กรอกข้อมูลสมาชิก -->
                        <div class="border border-3 p-4 rounded div_input_data">
                            <div class="row g-3">
                                <div class="col-12">
                                    <label for="Username" class="form-label">
                                        Username (สำหรับลงชื่อเข้าใช้) <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="Username" name="Username" placeholder="Enter Username" required oninput="on_inputData();">
                                </div>
                                <div class="col-12">
                                    <label for="Name" class="form-label">
                                        Name (สำหรับแสดงในระบบ) <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="Name" name="Name" placeholder="Enter Name" required oninput="on_inputData();">
                                </div>
                                <div class="col-12">
                                    <label for="email" class="form-label">
                                        E-Mail <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter E-Mail" required oninput="on_inputData();">
                                </div>
                                <div class="col-12">
                                    <label for="member_status" class="form-label">
                                        สถานะลงชื่อเข้าใช้ <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-select" id="member_status" name="member_status" required oninput="on_inputData();">
                                        <option  selected value="">เลือกสถานะลงชื่อเข้าใช้</option>
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                      </select>
                                </div>
                                <div class="col-12">
                                    <label for="member_role" class="form-label">
                                        บทบาทสมาชิก <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-select" id="member_role" name="member_role" required oninput="on_inputData();">
                                        <option selected value="">เลือกบทบาทสมาชิก</option>
                                        <option value="admin">admin</option>
                                        <option value="customer">กลุ่มมิจฉาชีพ</option>
                                        <option value="driver">พนักงานขับรถ</option>
                                      </select>
                                </div>
                                <div class="col-12">
                                    <label for="member_co" class="form-label"> บริษัท </label>
                                    <input type="text" class="form-control" id="member_co" name="member_co" placeholder="Enter member_co" oninput="on_inputData();">
                                </div>
                                <div class="col-12">
                                    <label for="member_addr" class="form-label"> ที่อยู่ </label>
                                    <input type="text" class="form-control" id="member_addr" name="member_addr" placeholder="Enter member_addr" oninput="on_inputData();">
                                </div>
                                <div class="col-12">
                                    <label for="member_tel" class="form-label"> เบอร์ติดต่อ </label>
                                    <input type="text" class="form-control" id="member_tel" name="member_tel" placeholder="Enter member_tel" oninput="on_inputData();">
                                </div>
                                <div id="div_text_alert_input" class="col-12 d-none">
                                    <span class="text-danger d-">
                                        กรุณากรอกข้อมูล <span id="text_alert_input"></span>
                                    </span>
                                </div>
                                <div class="col-12">
                                    <div class="d-grid">
                                        <button type="button" class="btn btn-primary" onclick="check_create_member();">
                                            สร้างรหัส
                                        </button>
                                    </div>
                                </div>
                            </div> 
                        </div>

                    </div>
                    <div class="tab-pane fade success_copydata" id="success-pills-copydata" role="tabpanel">
                        
                        <!-- Copy DATA -->
                        <div id="div_loading" class="text-center">
                            <div class="spinner-copy-data">
                                <div class="cube1"></div>
                                <div class="cube2"></div>
                            </div>
                            <h5>กำลังโหลด..</h5>
                        </div>

                        <div id="div_load_success" class="d-none">
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
    <div class="col-md-9">
        <div class="card border-top border-0 border-4 border-danger">
            <div class="card-body p-5">
                <div class="card-title d-flex align-items-center">
                    <div>
                        <i class="bx bxs-user me-1 font-22 text-danger"></i>
                    </div>
                    <h5 class="mb-0 text-danger">ข้อมูลสมาชิก</h5>
                    <div class="position-relative ms-auto">
                        <input type="text" class="form-control ps-5 radius-30" placeholder="ค้นหาสมาชิก..">
                        <span class="position-absolute top-50 product-show translate-middle-y">
                            <i class="bx bx-search"></i>
                        </span>
                    </div>
                </div>
                <hr>
                <div class="row g-3">
                    <div class="col-12">
                        <!--  -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Create_user_by_admin</div>
                <div class="card-body">
                    <a href="{{ url('/create_user_by_admin/create') }}" class="btn btn-success btn-sm" title="Add New Create_user_by_admin">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add New
                    </a>

                    <form method="GET" action="{{ url('/create_user_by_admin') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                            <span class="input-group-append">
                                <button class="btn btn-secondary" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>

                    <br/>
                    <br/>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th><th>User Id</th><th>Username</th><th>Pass Code</th><th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($create_user_by_admin as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->user_id }}</td><td>{{ $item->username }}</td><td>{{ $item->pass_code }}</td>
                                    <td>
                                        <a href="{{ url('/create_user_by_admin/' . $item->id) }}" title="View Create_user_by_admin"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                        <a href="{{ url('/create_user_by_admin/' . $item->id . '/edit') }}" title="Edit Create_user_by_admin"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                        <form method="POST" action="{{ url('/create_user_by_admin' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Create_user_by_admin" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper"> {!! $create_user_by_admin->appends(['search' => Request::get('search')])->render() !!} </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<script>

    function on_inputData(){
        document.querySelector('#div_text_alert_input').classList.add('d-none');
    }
    
    function check_create_member(){

        let Username = document.querySelector('#Username').value ;
        let Name = document.querySelector('#Name').value ;
        let email = document.querySelector('#email').value ;
        let member_status = document.querySelector('#member_status').value ;
        let member_role = document.querySelector('#member_role').value ;

        if (!Username || !Name || !email|| !member_status || !member_role) {

            document.querySelector('#div_text_alert_input').classList.remove('d-none');
            checkConditions(Username , Name , email , member_status , member_role);

        }else{

            document.querySelector('#btn_a_copydata').click();
            create_member();
        }

    }

    function create_member(){

        let Username = document.querySelector('#Username').value ;
        let Name = document.querySelector('#Name').value ;
        let email = document.querySelector('#email').value ;
        let member_status = document.querySelector('#member_status').value ;
        let member_role = document.querySelector('#member_role').value ;

        let member_co = document.querySelector('#member_co').value ;
        let member_addr = document.querySelector('#member_addr').value ;
        let member_tel = document.querySelector('#member_tel').value ;

        let data_arr = [];

        data_arr = {
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

            if(data.check_data == "OK"){

                document.querySelector('#div_loading').classList.add('d-none');
                document.querySelector('#div_load_success').classList.remove('d-none');
                document.querySelector('.checkmark').classList.remove('d-none');

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

                    let div_copydata = document.querySelector('.success_copydata');
                        div_copydata.insertAdjacentHTML('afterbegin', html); // แทรกบนสุด

                    let str = "Username : " + data.username + "\n" + "Password : " + data.pass_code
                    // console.log(str);
                    let userpass = document.querySelector("#userpass");
                        userpass.value = str;

                    document.querySelector('#div_load_success').classList.add('d-none');
                    document.querySelector('.checkmark').classList.add('d-none');

                }, 2000);


            }
        }).catch(function(error){
            // console.error(error);
        });

    }

    function create_success(){

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
      if (document.selection) {
        var range = document.body.createTextRange();
        range.moveToElementText(document.getElementById(containerid));
        range.select().createTextRange();
        document.execCommand("copy");
        document.querySelector('#go_back').classList.remove('d-none');
      } else if (window.getSelection) {
        var range = document.createRange();
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

    function checkConditions(Username , Name , email , member_status , member_role) {

        if (!Username) {
            document.querySelector('#text_alert_input').innerHTML = 'Username';
            return false;
        } else if (!Name) {
            document.querySelector('#text_alert_input').innerHTML = 'Name';
            return false;
        }else if (!email) {
            document.querySelector('#text_alert_input').innerHTML = 'email';
            return false;
        }else if (!member_status) {
            document.querySelector('#text_alert_input').innerHTML = 'สถานะลงชื่อเข้าใช้';
            return false;
        }else if (!member_role) {
            document.querySelector('#text_alert_input').innerHTML = 'บทบาทสมาชิก';
            return false;
        }

    }

</script>

@endsection
