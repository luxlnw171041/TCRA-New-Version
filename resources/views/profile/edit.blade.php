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


<form method="POST" action="{{ url('/user/' .Auth::user()->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
    {{ method_field('PATCH') }}
    {{ csrf_field() }}

    <div class="container">
        <div class="main-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="card sticky">
                        <div class=" p-5">
                            <span class="userID">
                                ID : {{Auth::user()->id}}
                            </span>
                            <div class="d-flex flex-column align-items-center text-center">
                                <div class="profile-pic-container">
                                    @if(!empty(Auth::user()->member_pic))
                                        <img class="profile-pic" src="{{ url('storage')}}/{{ Auth::user()->member_pic }}" alt="Profile Picture">
                                    @else
                                        <img class="profile-pic" src="{{asset('img/icon/user.jpg')}}" alt="Profile Picture">
                                    @endif
                                    <label for="member_pic" class="icon-overlay" >
                                        <i class="fa-solid fa-pen-to-square text-white"></i>
                                    </label>
                                    <input type="file" name="member_pic" id="member_pic" class="d-none">
                                </div>

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
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Full Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">เบอร์</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" name="member_tel" value="{{Auth::user()->member_tel}}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">บริษัท</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" name="member_co" value="{{Auth::user()->member_co}}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">ที่อยู่</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" name="member_addr" value="{{Auth::user()->member_addr}}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="submit" class="btn btn-primary px-4" value="Save Changes">
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