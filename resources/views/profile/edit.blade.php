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
</style>


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
                                            ดูข้อมูลมิจฉาชีพ
                                        </span>
                                    @elseif($user->member_role == "driver")
                                        <span class="btn bg-light-warning text-warning" style="font-size:13px;">
                                            ดูข้อมูลพนักงานขับรถ
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
                                        </div>
                                        <div class="widgets-icons bg-light-primary text-primary ms-auto">
                                            <i class="fa-solid fa-signature"></i>
                                        </div>
                                    </div>
                                    <input type="text" style="width:90%;" class="form-control" name="member_name" value="{{ $user->member_name }}">
                                </div>
                            </div>
                            <div class="card radius-10 border shadow-none">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <p class="mb-0 text-secondary">ชื่อ</p>
                                        </div>
                                        <div class="widgets-icons bg-light-success text-success ms-auto">
                                            <i class="fa-sharp fa-solid fa-input-text"></i>
                                        </div>
                                    </div>
                                    <input type="text" style="width:90%;" class="form-control" name="name" value="{{ $user->name }}">
                                </div>
                            </div>
                            <div class="card radius-10 border shadow-none">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <p class="mb-0 text-secondary">เบอร์ติดต่อ</p>
                                        </div>
                                        <div class="widgets-icons bg-light-danger text-danger ms-auto">
                                            <i class="fa-solid fa-phone"></i>
                                        </div>
                                    </div>
                                    <input type="text" style="width:90%;" class="form-control" name="member_tel" value="{{ $user->member_tel }}">
                                </div>
                            </div>
                            <div class="card radius-10 border shadow-none">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <p class="mb-0 text-secondary">อีเมล</p>
                                        </div>
                                        <div class="widgets-icons bg-light-warning text-warning ms-auto">
                                            <i class="fa-solid fa-at"></i>
                                        </div>
                                    </div>
                                    <input type="text" style="width:90%;" class="form-control" name="email" value="{{ $user->email }}">
                                </div>
                            </div>
                            <div class="card radius-10 border shadow-none">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <p class="mb-0 text-secondary">บริษัท</p>
                                        </div>
                                        <div class="widgets-icons bg-light-info text-info ms-auto">
                                            <i class="fa-regular fa-building"></i>
                                        </div>
                                    </div>
                                    <input type="text" style="width:90%;" class="form-control" name="member_co" value="{{ $user->member_co }}">
                                </div>
                            </div>
                            <div class="card radius-10 border shadow-none">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <p class="mb-0 text-secondary">ที่อยู่</p>
                                        </div>
                                        <div class="widgets-icons bg-light-secondary text-secondary ms-auto">
                                            <i class="fa-sharp fa-solid fa-map-location-dot"></i>
                                        </div>
                                    </div>
                                    <textarea style="width:90%;" rows="4" class="form-control" name="member_addr">{{ $user->member_addr }}</textarea>
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
@endsection