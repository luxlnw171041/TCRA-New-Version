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
        color: rgb(10, 88, 202);
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
        border-color: rgb(10, 88, 202);
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

    input[type="datetime-local"].selectDate {
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

    input[type="datetime-local"]:focus.selectDate {
        outline: none;
        border-color: #2260ff;
        box-shadow: 0 0 0 0.25rem rgb(10, 88, 202, 0.6);
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
        width: 100%;
        height: 100%;
        top: 0;
        right: 0;
        bottom: 0;
        opacity: 0;
        cursor: pointer;
        color: rgb(10, 88, 202);
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
        background-color: #2260ff;
        border-radius: 15px;
        color: #fff;
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
                    <img src="{{asset('img/logo/tcra.png')}}" alt="User" class="rounded-circle p-1 bg-primary" width="110">
                    <div class="mt-3">
                        <h4>{{Auth::user()->name}}</h4>

                        <p class="text-secondary mb-1">{{Auth::user()->username}}</p>
                        <p class="text-muted font-size-sm">{{Auth::user()->member_co}}</p>
                        <button class="btn btn-outline-primary px-5 ">แก้ไข</button>
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
                    <h5 class="mb-0 text-danger">เพิ่มข้อมูลลูกค้า</h5>
                </div>
                <hr>
                <div class="row g-3">
                    <div class="col-12">
                        <label for="inputLastName1" class="form-label">ติดต่อในนาม <span class="text-danger">*</span></label>
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
                    </div>

                    <div class="col-md-4 mt-md-0">
                        <!-- {{-- <label for="inputLastName1" class="form-label">ชื่อ</label> --}} -->
                        <div class="input-group">
                            <div class="inputGroup w-100">
                                <input name="c_name" type="text" id="c_name" value="{{ isset($customer->c_name) ? $customer->c_name : '' }}" required="" autocomplete="off">
                                <label for="c_name"><i class="fa-solid fa-user"></i> ชื่อ <span class="text-danger">*</span></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-md-0">
                        <!-- {{-- <label for="inputLastName1" class="form-label">นามสุกล</label> --}} -->
                        <div class="input-group ">
                            <div class="inputGroup w-100">
                                <input name="c_surname" type="text" id="c_surname" value="{{ isset($customer->c_surname) ? $customer->c_surname : '' }}" required="" autocomplete="off">
                                <label for="c_surname"><i class="fa-solid fa-user"></i> นามสกุล <span class="text-danger">*</span></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mt-md-4">
                        <!-- {{-- <label for="inputLastName1" class="form-label">ชื่อ</label> --}} -->
                        <div class="input-group ">
                            <div class="inputGroup w-100">
                                <input type="text" required="" autocomplete="off" name="c_idno" id="c_idno" value="{{ isset($customer->c_idno) ? $customer->c_idno : '' }}">
                                <label for="c_idno"><i class="fa-solid fa-id-card"></i> หมายเลขบัตร <span class="text-danger">*</span></label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mt-md-4">
                        <!-- {{-- <label for="inputLastName1" class="form-label">ชื่อ</label> --}} -->
                        <div class="input-group ">
                            <div class="inputGroup w-100">
                                <input name="c_date" id="c_date" class="w-100 selectDate" type="datetime-local" min="2005-01-01" max="201101-01" required>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="inputLastName1" class="form-label">แนบหลักฐานกระทำความผิด <span class="text-danger">*</span></label>
                    </div>
                    <!-- <style>
                        .selectPhoto {
                            margin: 0;
                        }

                        .selectPhoto label {
                            background: #ff3f4d;
                            border-radius: 15px;
                            display: flex;
                            justify-content: center;
                            align-items: center;
                            color: #FFF;
                            text-align: center;
                            padding: 4rem 0;
                            margin: 0;
                            font-style: italic;
                            font-weight: 300;
                            height: 200px;
                        }
                    </style> -->
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
                            border-top: 4px solid #3498db;
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
                            caret-color: #3498db;
                            caret-shape: 50px;
                        }

                        .infoImg {
                            display: block;
                            justify-content: start;
                            padding: 5px;
                            position: absolute;
                            color: #2260ff;
                            transition: all .15s ease-in-out;
                            transform: translateY(200px);
                            background-color: #fff;
                            width: 95%;
                            border-radius: 10px;
                        }

                        .file-upload-box:hover .infoImg {
                            color: #2260ff;
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
                            background-color: rgb(17, 112, 204) !important;
                            color: #fff !important;
                            border-radius: 50% !important;
                        }

                        .owl-next {
                            position: absolute;
                            right: 0;
                            top: 40%;
                            width: 30px;
                            height: 30px;
                            background-color: rgb(17, 112, 204) !important;
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

                                <div class="file-upload-box">
                                    <div id="clear-button" style="display: none;">
                                        <span class="clear-button">
                                            <i class="fa-solid fa-xmark"></i>
                                        </span>
                                    </div>
                                    <input type="file" id="c_pic_id_card" name="c_pic_id_card" value="{{ isset($pet->c_pic_id_card) ? $pet->c_pic_id_card : ''}}" accept="image/*" style="display: none;">
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
                                    <div class="upload-text">
                                        <h1>
                                            <i class="fa-solid fa-id-card"></i>
                                        </h1>
                                        สำเนาบัตรประชาชน
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <!-- <h6>ภาพใบบังคับคดี</h6> -->
                                <div class="file-upload-box">
                                    <div id="clear-button" style="display: none;">
                                        <span class="clear-button">
                                            <i class="fa-solid fa-xmark"></i>
                                        </span>
                                    </div>
                                    <input type="file" id="c_pic_lease" name="c_pic_lease" value="{{ isset($pet->c_pic_lease) ? $pet->c_pic_lease : ''}}" accept="image/*" style="display: none;">
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
                                    <div class="upload-text">
                                        <h1>
                                            <i class="fa-solid fa-file-invoice"></i>
                                        </h1>
                                        ใบบังคับคดี
                                    </div>
                                </div>
                            </div>

                            <div class="item">
                                <!-- <h6>สัญญาเช่า</h6> -->
                                <div class="file-upload-box">
                                    <div id="clear-button" style="display: none;">
                                        <span class="clear-button">
                                            <i class="fa-solid fa-xmark"></i>
                                        </span>
                                    </div>
                                    <input type="file" id="c_pic_execution" name="c_pic_execution" value="{{ isset($pet->c_pic_execution) ? $pet->c_pic_execution : ''}}" accept="image/*" style="display: none;">
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

                                    <div class="upload-text">
                                        <h1>
                                            <i class="fa-solid fa-file-signature"></i>
                                        </h1>
                                        สัญญาเช่า
                                    </div>
                                </div>

                            </div>
                            <div class="item">
                                <!-- <h6>ภาพแคป</h6> -->
                                <div class="file-upload-box">
                                    <div id="clear-button" style="display: none;">
                                        <span class="clear-button">
                                            <i class="fa-solid fa-xmark"></i>
                                        </span>
                                    </div>
                                    <input type="file" id="c_pic_cap" name="c_pic_cap" value="{{ isset($pet->c_pic_cap) ? $pet->c_pic_cap : ''}}" accept="image/*" style="display: none;">
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
                                    <div class="upload-text">
                                        <h1>
                                            <i class="fa-solid fa-messages-dollar"></i>
                                        </h1>
                                        หลักฐานการพูด-คุย
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <!-- <h6>ภาพอื่นๆ</h6> -->
                                <div class="file-upload-box">
                                    <div id="clear-button" style="display: none;">
                                        <span class="clear-button">
                                            <i class="fa-solid fa-xmark"></i>
                                        </span>
                                    </div>
                                    <input type="file" id="c_pic_other" name="c_pic_other" value="{{ isset($pet->c_pic_other) ? $pet->c_pic_other : ''}}" accept="image/*" style="display: none;">
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
                                    <div class="upload-text">
                                        <h1>
                                            <i class="fa-solid fa-file-medical"></i>
                                        </h1>
                                        อื่นๆ
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
                        <label for="inputLastName1" class="form-label">ลักษณะกระทำความผิด <span class="text-danger">*</span></label>
                    </div>
                    <div class="col-12">
                        <ul class="nav nav-pills mb-3" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link navDanger active" data-bs-toggle="pill" href="#corrupt" role="tab" aria-selected="true">
                                    <div class="d-flex align-items-center">
                                        <div class="tab-icon"><i class="bx bxs-home font-18 me-1"></i>
                                        </div>
                                        <div class="tab-title">หมวดทุจริต</div>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link navWarning" data-bs-toggle="pill" href="#discipline" role="tab" aria-selected="false">
                                    <div class="d-flex align-items-center">
                                        <div class="tab-icon"><i class="bx bxs-user-pin font-18 me-1"></i>
                                        </div>
                                        <div class="tab-title">หมวดวินัย</div>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link navSuccess" data-bs-toggle="pill" href="#service" role="tab" aria-selected="false">
                                    <div class="d-flex align-items-center">
                                        <div class="tab-icon"><i class="bx bxs-microphone font-18 me-1"></i>
                                        </div>
                                        <div class="tab-title">หมวดบริการ</div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <style>
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
                            <div class="row col-12 my-3" id="divdemeritdetail" style="display: none;">
                                <label for="demeritdetail" class="col-sm-12 col-form-label">รายละเอียดการกระทำความผิด</label>
                                <div class="col-sm-12">
                                    <textarea class="form-control" id="demeritdetail" name="demeritdetail" rows="3" placeholder="กรอกรายละเอียดการกระทำความผิด"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary px-5 float-end" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">ยืนยัน</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            const demeritCheckboxes = document.querySelectorAll('input[id="demerit"]');
            const otherDiv = document.getElementById('divdemeritdetail');
            const otherInput = document.getElementById('demeritdetail');
            const formCreateCustomer = document.getElementById('formCreateCustomer');

            demeritCheckboxes.forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    const otherCheckboxes = document.querySelectorAll('input[id="demerit"][value="อื่นๆ"]');
                    const checkedOtherCheckboxes = document.querySelectorAll('input[id="demerit"][value="อื่นๆ"]:checked');

                    if (checkedOtherCheckboxes.length > 0) {
                        otherDiv.style.display = 'block';
                        otherInput.required = true;

                    } else {
                        otherDiv.style.display = 'none';
                        otherInput.required = false;
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


            formCreateCustomer.addEventListener('submit', function(event) {
                const demeritCheckboxes = document.querySelectorAll('input[id="demerit"]:checked');

                if (demeritCheckboxes.length === 0) {
                    console.log('โปรดเลือก');
                    event.preventDefault(); // ป้องกันการส่งฟอร์ม   
                    dangerAlert("กรุณาเลือกลักษณะกระทำความผิดอย่างน้อย 1 อย่าง");
                } else {
                    console.log('ยืนยัน')

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
<div class="form-group {{ $errors->has('c_pic_lease') ? 'has-error' : '' }}">
    <label for="c_pic_lease" class="control-label">{{ 'C Pic Lease' }}</label>
    <input class="form-control" name="c_pic_lease" type="text" id="c_pic_lease" value="{{ isset($customer->c_pic_lease) ? $customer->c_pic_lease : '' }}">
    {!! $errors->first('c_pic_lease', '<p class="help-block">:message</p>') !!}
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