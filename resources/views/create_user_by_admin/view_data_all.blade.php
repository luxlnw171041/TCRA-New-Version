@extends('layouts.theme')

@section('content')

<style>
	.show-img-box {
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

    .show-img-box h1 {
        text-align: center;
    }

    .show-img-box a img {
        object-fit: contain;
    }

    .show-img-box:hover {
        background-color: #f5f5f5;
    }

    .file-preview {
        max-width: 100%;
        max-height: 100%;
        display: none;
        cursor: pointer;
        object-fit: contain;
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

    .show-img-box:hover .infoImg {
        color: #e62e2e;
        transform: translateY(75px);
    }.gslide-media.gslide-image img{
		min-height: 100vh;
		width: auto;
		object-fit: contain;
	}ul.img-glightbox {
	display: flex;
	flex-wrap: wrap;
}
.goverlay {
	background-color: rgba(0,0,0,0.3);
}
.glightbox {
	padding-left: 0;
	margin-top:0;
	margin-bottom: 0;
	padding: 0 5px;
	flex-basis: calc(100% / 5 - 10px);
}
.gcounter {
	padding: .5rem;
}
.gcounter::after {
	content: attr(data-indicator);
	position: absolute;
	top: .5rem;
	left: .5rem;
	color: white;
	padding: 10px;
	z-index: 10000000;
	background-color: rgba(0,0,0,0.3);
	border-radius: 50px;
}
.glightbox-closing .gcounter {
	opacity:0;
}
</style>

@php
	$class_btn_customers = '' ;
	$class_btn_drivers = '' ;

	$class_border = '' ;

	if($type == "customers"){
        $class_btn_customers = 'btn-danger' ;
		$class_btn_drivers = 'btn-outline-primary' ;
		$class_border = 'border-danger' ;
    }else if($type == "drivers"){
        $class_btn_customers = 'btn-outline-danger' ;
		$class_btn_drivers = 'btn-primary' ;
		$class_border = 'border-primary' ;
    }
@endphp

<div class="card border-top border-0 border-4 {{ $class_border }}">
	<div class="card-body p-3 mt-3" style="position:relative;">
		<div class="row">
			<div class="col-6">
				@if($type == "customers")
					<h3 class="border-danger">
		               <img src="{{ url('/img/icon/iconCustomerSlash.png') }}" class="rounded-circle p-1 bg-danger" width="40" style="">
		                ข้อมูลมิจฉาชีพ (เช่ารถ)
		            </h3>
				@elseif($type == "drivers")
					<h3 class="border-primary">
		               <img src="{{ url('/img/icon/iconDriversSlash.png') }}" class="rounded-circle p-1 bg-primary" width="40" style="">
		                ข้อมูล Blacklist พนักงานขับรถ
		            </h3>
				@endif
			</div>
			<div class="col-6">
				<div class="btn-group float-end" role="group" aria-label="Basic example" style="width:100%">
				  	<a href="{{ url('/view_data_all/customers') }}" id="btn_select_Customer" class="btn {{ $class_btn_customers }}">
				  		<img src="{{ url('/img/icon/iconCustomerSlash.png') }}" class="rounded-circle p-1 bg-danger" width="30" style=""> ข้อมูลมิจฉาชีพ (เช่ารถ)
				  	</a>
				  	<a href="{{ url('/view_data_all/drivers') }}" id="btn_select_Driver" class="btn {{ $class_btn_drivers }}">
				  		<img src="{{ url('/img/icon/iconDriversSlash.png') }}" class="rounded-circle p-1 bg-primary" width="30" style=""> Blacklist พนักงานขับรถ
				  	</a>
				</div>
				<span class="float-end mt-3" style="color:gray;font-size: 20px;">
                	ทั้งหมด : {{ count($data) }} เคส
                </span>
			</div>
		</div>

		<hr>
		<br>

		<!-- Customers -->
		@if($type == "customers")

			@foreach($data as $item)
				<div id="div_id_{{ $item->id }}" class="container-fluid mt-2 mb-2">
				    <div class="main-body">
				        <div class="row">
				            <style>
				                 .group-danger{
				                    color: #e62e2e;
				                    padding: 5px;
				                    border: .5px solid #e62e2e;
				                }.group-warning{
				                    color: #ffc107;
				                    padding: 5px;
				                }.group-success{
				                    color: #29cc39;
				                    padding: 5px;
				                }.text-warning-header{
				                    color: #a17a06;
				                }
				            </style>
				            <div class="col-lg-12">
				                <div class="card p-2" style="border:#f7606b solid 2px; ">
				                    <div class="card-body">
				                        <div class="row mb-3">
				                            <div class="col-3" style="border-right:#857f80 solid 1px;">
				                            	<div class="d-flex flex-column align-items-center text-center">
				                            		@if($item->rentname == "บุคคล")
							                    		<button  class="btn btn-sm btn-info px-3 radius-30">
							                    			ในนาม{{ $item->rentname }}
							                    		</button>
											        @else
											            <button  class="btn btn-sm btn-secondary px-3 radius-30">
							                    			ในนาม{{ $item->rentname }}
							                    		</button>
											        @endif
						                            <div class="mt-3">
						                                <h4>
						                                    @if(!empty($item->c_name) && !empty($item->c_surname))
						                                    {{ $item->c_name }} {{ $item->c_surname }}
						                                    @elseif(!empty($item->c_company_name) )
						                                    {{$item->c_company_name}}
						                                    @endif
						                                </h4>

						                                @if(!empty($item->commercial_registration))
							                                <p class="text-secondary mb-1">
							                                    {{$item->commercial_registration}}
							                                </p>
						                                @endif
						                                @if(!empty($item->c_idno))
						                                    <p class="text-secondary mb-1">{{ substr_replace(substr_replace(substr_replace(substr_replace($item->c_idno, '-', 1, 0), '-', 6, 0), '-', 12, 0), '-', 15, 0) }}</p>
						                                @endif
						                                
						                                <p class="text-muted font-size-sm">{{ thaidate("lที่ j F Y" , strtotime($item->c_date)) }} </p>
						                            </div>
						                        </div>
				                            </div>
				                            <div class="col-9">
					                            <div class="row">
					                            	<div class="col-3">
						                                <h6 class="mb-0">ลักษณะการกระทำความผิด</h6>
						                            </div>
						                            <div class="col-9 text-secondary">
						                                @php
						                                    $demerit = $item->demerit;
						                                    $demeritArray = explode(',', $demerit);

						                                    $groups = [
						                                    'หมวดทุจริต' => ['1.ฉ้อโกงหรือยักยอกรถยนต์', '2.ลักทรัพย์หรือเปลี่ยนแปลงอุปกรณ์ภายในรถยนต์' ,'3.ความผิดในคดีอาญาอื่นๆ'],
						                                    'หมวดบัญชีดำ' => ['4.ไม่บำรุงรักษารถยนต์', '5.ไม่ชำระค่าเช่า','6.อื่นๆ'],
						                                    ];
						                                @endphp

						                                @foreach ($groups as $groupName => $groupMembers)
						                                    @php
						                                        $filteredMembers = array_filter($groupMembers, function ($member) use ($demeritArray) {
						                                        return in_array($member, $demeritArray);
						                                        });
						                                    @endphp

						                                    @if (count($filteredMembers) > 0)
						                                        @php
						                                            $groupColorClass = '';
						                                            switch ($groupName) {
						                                                case 'หมวดทุจริต':
						                                                    $groupColorClass = 'text-danger mb-1';
						                                                break;
						                                                case 'หมวดบัญชีดำ':
						                                                    $groupColorClass = 'text-warning-header mb-1';
						                                                break;
						                                            }
						                                        @endphp

						                                        <div class="d-block p-2 pt-0 {{ $groupColorClass }}">
						                                            <b>{{ $groupName }} </b>
						                                            @foreach ($filteredMembers as $index => $member)
						                                            <span >{{ $member }}{{ $loop->last ? '' : ' ,' }}</span>
						                                            @endforeach
						                                        </div>
						                                    @endif
						                                @endforeach
						                            </div>

						                            @if(!empty($item->demeritdetail))
						                                <div class="col-3 mt-4">
						                                    <h6 class="mb-0">รายละเอียด</h6>
						                                </div>
						                                <div class="col-9 text-secondary mt-4">
						                                    {{ $item->demeritdetail }}
						                                </div>
						                            @endif
					                            </div>
					                        </div>
				                        </div>

				                        @php
				                        	$check_active_menu_1 = '';
				                        	$check_active_show_data_1 = '';
				                        	$check_active_menu_2 = '';
				                        	$check_active_show_data_2 = '';
				                        	$check_active_menu_3 = '';
				                        	$check_active_show_data_3 = '';
				                        	$check_active_menu_4 = '';
				                        	$check_active_show_data_4 = '';
				                        	$check_active_menu_5 = '';
				                        	$check_active_show_data_5 = '';

				                        	if(!empty($item->c_pic_id_card)){
				                        		$check_active_menu_1 = 'active';
					                        	$check_active_show_data_1 = 'show active';
				                        	}else if(!empty($item->c_pic_company_certificate)){
					                        	$check_active_menu_2 = 'active';
					                        	$check_active_show_data_2 = 'show active';
				                        	}else if(!empty($item->c_pic_indictment)){
				                        		$check_active_menu_3 = 'active';
					                        	$check_active_show_data_3 = 'show active';
				                        	}else if(!empty($item->c_pic_cap)){
				                        		$check_active_menu_4 = 'active';
					                        	$check_active_show_data_4 = 'show active';
				                        	}else if(!empty($item->c_pic_other)){
				                        		$check_active_menu_5 = 'active';
					                        	$check_active_show_data_5 = 'show active';
				                        	}
				                        @endphp

				                        @if(!empty($item->c_pic_id_card) || !empty($item->c_pic_company_certificate) || !empty($item->c_pic_indictment) || !empty($item->c_pic_cap) || !empty($item->c_pic_other))

				                        <center>
				                        	<hr style="width:95%;">
				                        </center>

						                <div class="row">
						                    <div class="col-12">
						                    	<div class="">
						                    		<label class="mb-3">หลักฐานการกระทำความผิด</label>
						                    		<br>
						                    	</div>
						                    </div>
						                    <div class="col-12 mt-3">
												<ul class="nav nav-tabs nav-danger" role="tablist">
													@if( !empty($item->c_pic_id_card) )
													@php
														$c_pic_id_card_ex = explode(',', $item->c_pic_id_card);
														$count_c_pic_id_card = count($c_pic_id_card_ex);
													@endphp
													<li class="nav-item" role="presentation">
														<a class="nav-link {{ $check_active_menu_1 }}" data-bs-toggle="tab" href="#c_pic_id_card_{{ $item->id }}" role="tab" aria-selected="true">
															<div class="d-flex align-items-center">
																<div class="tab-title">สำเนาบัตรประชาชน / PassPort ({{ $count_c_pic_id_card }})</div>
															</div>
														</a>
													</li>
													@endif
													@if( !empty($item->c_pic_company_certificate) )
													@php
														$c_pic_company_certificate_ex = explode(',', $item->c_pic_company_certificate);
														$count_c_pic_company_certificate = count($c_pic_company_certificate_ex);
													@endphp
													<li class="nav-item" role="presentation">
														<a class="nav-link {{ $check_active_menu_2 }}" data-bs-toggle="tab" href="#c_pic_company_certificate_{{ $item->id }}" role="tab" aria-selected="false">
															<div class="d-flex align-items-center">
																<div class="tab-title">สำเนาหนังสือรับรองบริษัท ({{ $count_c_pic_company_certificate }})</div>
															</div>
														</a>
													</li>
													@endif
													@if( !empty($item->c_pic_indictment) )
													@php
														$c_pic_indictment_ex = explode(',', $item->c_pic_indictment);
														$count_c_pic_indictment = count($c_pic_indictment_ex);
													@endphp
													<li class="nav-item" role="presentation">
														<a class="nav-link {{ $check_active_menu_3 }}" data-bs-toggle="tab" href="#c_pic_indictment_{{ $item->id }}" role="tab" aria-selected="false">
															<div class="d-flex align-items-center">
																<div class="tab-title">คำฟ้องหรือใบร้องทุกข์แจ้งความดำเนินดคี ({{ $count_c_pic_indictment }})</div>
															</div>
														</a>
													</li>
													@endif
													@if( !empty($item->c_pic_cap) )
													@php
														$c_pic_cap_ex = explode(',', $item->c_pic_cap);
														$count_c_pic_cap = count($c_pic_cap_ex);
													@endphp
													<li class="nav-item" role="presentation">
														<a class="nav-link {{ $check_active_menu_4 }}" data-bs-toggle="tab" href="#c_pic_cap_{{ $item->id }}" role="tab" aria-selected="false">
															<div class="d-flex align-items-center">
																<div class="tab-title">หลักฐานการพูด-คุย ({{ $count_c_pic_cap }})</div>
															</div>
														</a>
													</li>
													@endif
													@if( !empty($item->c_pic_other) )
													@php
														$c_pic_other_ex = explode(',', $item->c_pic_other);
														$count_c_pic_other = count($c_pic_other_ex);
													@endphp
													<li class="nav-item" role="presentation">
														<a class="nav-link {{ $check_active_menu_5 }}" data-bs-toggle="tab" href="#c_pic_other_{{ $item->id }}" role="tab" aria-selected="false">
															<div class="d-flex align-items-center">
																<div class="tab-title">อื่นๆ ({{ $count_c_pic_other }})</div>
															</div>
														</a>
													</li>
													@endif
												</ul>
												<div class="tab-content py-3">
													@if( !empty($item->c_pic_id_card) )
													<div class="tab-pane fade {{ $check_active_show_data_1 }}" id="c_pic_id_card_{{ $item->id }}" role="tabpanel">
														<div class="owl-carousel owl-theme carouselSPhoto">
															@foreach($c_pic_id_card_ex as $item_1 => $value_1)
																<div class="item">

																	<a class="glightbox show-img-box" data-type="image" href="{{ url('storage')}}/{{ $value_1 }}" data-gallery="img-id_card-gallery_{{ $item->id }}" data-type="image">
																		<img src="{{ url('storage')}}/{{ $value_1 }}" alt="สำเนาบัตรประชาชน / PassPort">
																		<div class="infoImg">
							                                                <span class="m-0">สำเนาบัตรประชาชน / PassPort</span>
							                                            </div>
																	</a>
<!-- 
							                                        <a class="glightbox show-img-box" data-type="image" href="{{ url('storage')}}/{{ $value_1 }}" alt="สำเนาบัตรประชาชน / PassPort">
							                                            <img class="file-preview" src="{{ url('storage')}}/{{ $value_1 }}" alt="สำเนาบัตรประชาชน / PassPort">
							                                            <div class="infoImg">
							                                                <span class="m-0">สำเนาบัตรประชาชน / PassPort</span>
							                                            </div>
							                                        </a> -->
							                                    </div>
															@endforeach
						                                </div>
													</div>
													@endif
													@if( !empty($item->c_pic_company_certificate) )
													<div class="tab-pane fade {{ $check_active_show_data_2 }}" id="c_pic_company_certificate_{{ $item->id }}" role="tabpanel">
														<div class="owl-carousel owl-theme carouselSPhoto">
						                                    @foreach($c_pic_company_certificate_ex as $item_2 => $value_2)
																<div class="item">
							                                        <a class="glightbox show-img-box" data-type="image" href="{{ url('storage')}}/{{ $value_2 }}" data-gallery="imgcompany_certificate_-gallery_{{ $item->id }}" data-gallery="img-gallery_{{ $item->id }}" alt="สำเนาหนังสือรับรองบริษัท">
							                                            <img class="file-preview" src="{{ url('storage')}}/{{ $value_2 }}" alt="สำเนาหนังสือรับรองบริษัท">
							                                            <div class="infoImg">
							                                                <span class="m-0">สำเนาหนังสือรับรองบริษัท</span>
							                                            </div>
							                                        </a>
							                                    </div>
															@endforeach
														</div>
													</div>
													@endif
													@if( !empty($item->c_pic_indictment) )
													<div class="tab-pane fade {{ $check_active_show_data_3 }}" id="c_pic_indictment_{{ $item->id }}" role="tabpanel">
														<div class="owl-carousel owl-theme carouselSPhoto">
						                                    @foreach($c_pic_indictment_ex as $item_3 => $value_3)
																<div class="item">
							                                        <a class="glightbox show-img-box" data-type="image" href="{{ url('storage')}}/{{ $value_3 }}" data-gallery="img-indictment-gallery_{{ $item->id }}" data-gallery="img-gallery_{{ $item->id }}" lt="คำฟ้องหรือใบร้องทุกข์แจ้งความดำเนินดคี">
							                                            <img class="file-preview" src="{{ url('storage')}}/{{ $value_3 }}" alt="คำฟ้องหรือใบร้องทุกข์แจ้งความดำเนินดคี">
							                                            <div class="infoImg">
							                                                <span class="m-0">คำฟ้องหรือใบร้องทุกข์แจ้งความดำเนินดคี</span>
							                                            </div>
							                                        </a>
							                                    </div>
															@endforeach
														</div>
													</div>
													@endif
													@if( !empty($item->c_pic_cap) )
													<div class="tab-pane fade {{ $check_active_show_data_4 }}" id="c_pic_cap_{{ $item->id }}" role="tabpanel">
														<div class="owl-carousel owl-theme carouselSPhoto">
															@foreach($c_pic_cap_ex as $item_4 => $value_4)
															<div class="item">
						                                        <a class="glightbox show-img-box" data-type="image" href="{{ url('storage')}}/{{ $value_4 }}" data-gallery="img-cap-gallery_{{ $item->id }}" data-gallery="img-gallery_{{ $item->id }}" alt="ภาพหลักฐานการพูด-คุย">
						                                            <img class="file-preview" src="{{ url('storage')}}/{{ $value_4 }}" alt="ภาพหลักฐานการพูด-คุย">
						                                            <div class="infoImg">
						                                                <span class="m-0">หลักฐานการพูด-คุย</span>
						                                            </div>
						                                        </a>
						                                    </div>
						                                    @endforeach
														</div>
													</div>
													@endif
													@if( !empty($item->c_pic_other) )
													<div class="tab-pane fade {{ $check_active_show_data_5 }}" id="c_pic_other_{{ $item->id }}" role="tabpanel">
														<div class="owl-carousel owl-theme carouselSPhoto">
															@php
						                                        // ข้อความที่ต้องการตรวจสอบ
						                                        $text = $item->c_pic_other;

						                                        // คำที่ต้องการตรวจสอบ
						                                        $keyword = "uploads";
						                                        $check_uploads = "";

						                                        // ตรวจสอบว่าคำที่ต้องการอยู่ในข้อความหรือไม่
						                                        if (strpos($text, $keyword) !== false) {
						                                            $check_uploads =  "Yes";
						                                        } else {
						                                            $check_uploads =  "No";
						                                        }
						                                    @endphp
						                                    
					                                        @if($check_uploads == "Yes")
						                                        @foreach($c_pic_other_ex as $item_5 => $value_5)
						                                        <div class="item">
							                                        <a class="glightbox show-img-box" data-type="image" href="{{ url('storage')}}/{{ $value_5 }}" data-gallery="img-other-gallery_{{ $item->id }}" alt="ภาพอื่นๆ">
							                                            <img class="file-preview" src="{{ url('storage')}}/{{ $value_5 }}" alt="ภาพอื่นๆ">
							                                            <div class="infoImg">
							                                                <span class="m-0">อื่นๆ</span>
							                                            </div>
							                                        </a>
							                                    </div>
						                                        @endforeach
					                                        @else
					                                        <div class="item">
						                                        <a class="glightbox show-img-box" data-type="image" href="{{ url('/img/picture_old')}}/{{ $item->c_pic_other }}" data-gallery="img-other-gallery_{{ $item->id }}" alt="ภาพอื่นๆ">
						                                            <img class="file-preview" src="{{ url('/img/picture_old')}}/{{ $item->c_pic_other }}" alt="ภาพอื่นๆ">
						                                            <div class="infoImg">
						                                                <span class="m-0">อื่นๆ</span>
						                                            </div>
						                                        </a>
					                                        </div>
					                                        @endif
						                                    
														</div>
													</div>
													@endif
												</div>

						                    </div>
						                </div>
						                @endif

						                <hr>

						                <div class="row">
			                                <div class=" col-12 d-flex justify-content-between align-items-center flex-wrap">
			                                    <span class="text-secondary mt-2">
			                                        <b class="text-dark" style="font-size:18px;">ผู้ลงข้อมูล</b>
			                                    </span>
			                                </div>
			                                <div class="col-4 d-flex justify-content-between align-items-center flex-wrap">
			                                    <span class="text-secondary">
			                                        <b class="text-danger" style="font-size:18px;">บริษัท</b>
			                                        <br>
			                                        {{ $item->user->member_co }}
			                                    </span>
			                                </div>
			                                <div class="col-2 d-flex justify-content-between align-items-center flex-wrap">
			                                    <span class="text-secondary">
			                                        <b class="text-danger" style="font-size:18px;">เบอร์ติดต่อ</b>
			                                        <br>
			                                        {{ $item->user->member_tel }}
			                                    </span>
			                                </div>
			                                <div class="col-2 d-flex justify-content-between align-items-center flex-wrap">
			                                    <span class="text-secondary">
			                                        <b class="text-danger" style="font-size:18px;">เลขที่สมาชิก</b>
			                                        <br>
			                                        {{ $item->user->no_member }}
			                                    </span>
			                                </div>
			                                <div class="col-3 d-flex justify-content-between align-items-center flex-wrap">
			                                	<span class="text-secondary">
			                                        <b class="text-danger" style="font-size:18px;">
			                                        	หมวดหมู่สมาชิก / สถานะ
			                                        </b>
			                                        <br>
			                                        <!-- บทบาทของสมาชิก -->
		                                            @if($item->user->member_role == "admin")
		                                                <span class="btn bg-light-info text-info" style="font-size:12px;">
		                                                    Admin
		                                                </span>
		                                            @elseif($item->user->member_role == "member")
		                                                <span class="btn bg-light-success text-success" style="font-size:12px;">
		                                                    member
		                                                </span>
		                                            @elseif($item->user->member_role == "customer")
		                                                <span class="btn bg-light-danger text-danger" style="font-size:12px;">
		                                                    customer
		                                                </span>
		                                            @else
		                                                <span class="btn bg-light-warning text-warning" style="font-size:12px;">
		                                                    driver
		                                                </span>
		                                            @endif

		                                            <!-- สถานะของสมาชิก -->
		                                            @if($item->user->member_status == "Active")
		                                                <span  class="btn bg-light-success text-success" style="font-size:12px;">
		                                                    Active
		                                                </span>
		                                            @else
		                                                <span class="btn bg-light-danger text-danger" style="font-size:12px;">
		                                                    Inactive
		                                                </span>
		                                            @endif
			                                    </span>
			                                </div>
			                                <div class="col-1 d-flex justify-content-between align-items-center flex-wrap">
			                                	<button type="button" class="btn btn-danger float-end"
			                                	onclick='delete_case("{{ $type }}" , "{{ $item->id }}");'>
			                                		<i class="fa-solid fa-trash-xmark"></i>
			                                	</button>
			                                </div>
			                            </div>

				                    </div>
				                </div>
				            </div>
				        </div>
				    </div>
				</div>
			@endforeach

		<!-- Drivers -->
		@elseif($type == "drivers")
			@foreach($data as $item)
				<div id="div_id_{{ $item->id }}" class="container-fluid mt-2 mb-2">
				    <div class="main-body">
				        <div class="row">
				            <style>
				                 .group-danger{
				                    color: #e62e2e;
				                    padding: 5px;
				                    border: .5px solid #e62e2e;
				                }.group-warning{
				                    color: #ffc107;
				                    padding: 5px;
				                }.group-success{
				                    color: #29cc39;
				                    padding: 5px;
				                }.text-warning-header{
				                    color: #a17a06;
				                }
				            </style>
				            <div class="col-lg-12">
				                <div class="card p-2" style="border:#4f82f0 solid 2px; ">
				                    <div class="card-body">
				                        <div class="row mb-3">
				                            <div class="col-3" style="border-right:#857f80 solid 1px;">
				                            	<div class="d-flex flex-column align-items-center text-center">
					                                <div class="mt-3">
					                                    <h4>{{ $item->d_name }} {{ $item->d_surname }} </h4>
					                                    <p class="text-secondary mb-1">{{ substr_replace(substr_replace(substr_replace(substr_replace($item->d_idno, '-', 1, 0), '-', 6, 0), '-', 12, 0), '-', 15, 0) }}</p>
					                                    <p class="text-muted font-size-sm">{{ thaidate("lที่ j F Y" , strtotime($item->d_date)) }}</p>
					                                </div>
					                            </div>
				                            </div>
				                            <div class="col-9">
					                            <div class="row">
					                            	<div class="col-3">
						                                <h6 class="mb-0">ลักษณะการกระทำความผิด</h6>
						                            </div>
						                            <div class="col-9 text-secondary">
						                                @php
						                                    $demerit = $item->demerit;
						                                    $demeritArray = explode(',', $demerit);

						                                    $groups = [
						                                        'หมวดทุจริต' => ['1.ปลอมแปลงเอกสารใบลงเวลา/บิลน้ำมัน', '2.ลักทรัพย์นายจ้าง' ,'3.ยักยอกรถยนต์หรือทรัพย์สิน' ,'4.ทำร้ายร่างกาย' ,'5.ความผิดคดีอาญาหรือทุจริตอื่นๆ','6.อื่นๆ'],

						                                        'หมวดวินัย' => ['7.ทิ้งงาน', '8.ทะเลาะวิวาท', '9.ยืมเงินลูกค้า', '10.ไม่เก็บรักษาความลับ', '11.ปิดมือถือติดต่อไม่ได้', '12.โกหกบ่อยครั้ง', '13.ฟ้องร้องนายจ้างหรือร้องตรวจแรงงานที่เป็นเท็จ','14.เมาสุรา/เสพสารเสพติด','15.อื่นๆ'],

						                                        'หมวดบัญชีดำ' => ['16.ขับรถอันตราย', '17.มาสาย', '18.สตาร์ทรถรอลูกค้า', '19.ทัศนคติ/การบริการไม่ดี', '20.ไม่รู้เส้นทาง', '21.ขัดคำสั่งลูกค้า/นายจ้าง', '22.แต่งกาย/พูดจา ไม่สุภาพ','23.ลักลอบนำรถยนต์ไปใช้ส่วนตัว','24.อื่นๆ'] ,
						                                    ];
						                                @endphp

						                                @foreach ($groups as $groupName => $groupMembers)
						                                    @php
						                                        $filteredMembers = array_filter($groupMembers, function ($member) use ($demeritArray) {
						                                        return in_array($member, $demeritArray);
						                                        });
						                                    @endphp

						                                    @if (count($filteredMembers) > 0)
						                                        @php
						                                            $groupColorClass = '';
						                                            switch ($groupName) {
						                                                case 'หมวดทุจริต':
						                                                    $groupColorClass = 'text-danger mb-1';
						                                                break;
						                                                case 'หมวดวินัย':
						                                                    $groupColorClass = 'text-warning-header mb-1';
						                                                break;
						                                                case 'หมวดบัญชีดำ':
						                                                    $groupColorClass = 'text-success mb-1';
						                                                break;
						                                            }
						                                        @endphp
						                                        <div class="d-block p-2 pt-0 {{ $groupColorClass }}">
						                                            <b>{{ $groupName }} </b>
						                                            @foreach ($filteredMembers as $index => $member)
						                                            <span>{{ $member }}{{ $loop->last ? '' : ' ,' }}</span>
						                                            @endforeach
						                                        </div>
						                                    @endif
						                                @endforeach
						                            </div>

						                            @if(!empty($item->demeritdetail))
						                                <div class="col-3 mt-4">
						                                    <h6 class="mb-0">รายละเอียด</h6>
						                                </div>
						                                <div class="col-9 text-secondary mt-4">
						                                    {{ $item->demeritdetail }}
						                                </div>
						                            @endif
					                            </div>
					                        </div>
				                        </div>

				                        @php
				                        	$check_active_menu_1 = '';
				                        	$check_active_show_data_1 = '';
				                        	$check_active_menu_2 = '';
				                        	$check_active_show_data_2 = '';
				                        	$check_active_menu_3 = '';
				                        	$check_active_show_data_3 = '';
				                        	$check_active_menu_4 = '';
				                        	$check_active_show_data_4 = '';
				                        	$check_active_menu_5 = '';
				                        	$check_active_show_data_5 = '';

				                        	if(!empty($item->d_pic_id_card)){
				                        		$check_active_menu_1 = 'active';
					                        	$check_active_show_data_1 = 'show active';
				                        	}else if(!empty($item->d_pic_company_certificate)){
					                        	$check_active_menu_2 = 'active';
					                        	$check_active_show_data_2 = 'show active';
				                        	}else if(!empty($item->d_pic_indictment)){
				                        		$check_active_menu_3 = 'active';
					                        	$check_active_show_data_3 = 'show active';
				                        	}else if(!empty($item->d_pic_cap)){
				                        		$check_active_menu_4 = 'active';
					                        	$check_active_show_data_4 = 'show active';
				                        	}else if(!empty($item->d_pic_other)){
				                        		$check_active_menu_5 = 'active';
					                        	$check_active_show_data_5 = 'show active';
				                        	}
				                        @endphp

				                        @if(!empty($item->d_pic_id_card) || !empty($item->d_pic_company_certificate) || !empty($item->d_pic_indictment) || !empty($item->d_pic_cap) || !empty($item->d_pic_other))

				                        <center>
				                        	<hr style="width:95%;">
				                        </center>

						                <div class="row">
						                    <div class="col-12">
						                    	<div class="">
						                    		<label class="mb-3">หลักฐานการกระทำความผิด</label>
						                    		<br>
						                    	</div>
						                    </div>
						                    <div class="col-12 mt-3">
												<ul class="nav nav-tabs nav-primary" role="tablist">
													@if( !empty($item->d_pic_id_card) )
													@php
														$d_pic_id_card_ex = explode(',', $item->d_pic_id_card);
														$count_d_pic_id_card = count($d_pic_id_card_ex);
													@endphp
													<li class="nav-item" role="presentation">
														<a class="nav-link {{ $check_active_menu_1 }}" data-bs-toggle="tab" href="#d_pic_id_card_{{ $item->id }}" role="tab" aria-selected="true">
															<div class="d-flex align-items-center">
																<div class="tab-title">สำเนาบัตรประชาชน / PassPort ({{ $count_d_pic_id_card }})</div>
															</div>
														</a>
													</li>
													@endif
													@if( !empty($item->d_pic_company_certificate) )
													@php
														$d_pic_company_certificate_ex = explode(',', $item->d_pic_company_certificate);
														$count_d_pic_company_certificate = count($d_pic_company_certificate_ex);
													@endphp
													<li class="nav-item" role="presentation">
														<a class="nav-link {{ $check_active_menu_2 }}" data-bs-toggle="tab" href="#d_pic_company_certificate_{{ $item->id }}" role="tab" aria-selected="false">
															<div class="d-flex align-items-center">
																<div class="tab-title">สำเนาหนังสือรับรองบริษัท ({{ $count_d_pic_company_certificate }})</div>
															</div>
														</a>
													</li>
													@endif
													@if( !empty($item->d_pic_indictment) )
													@php
														$d_pic_indictment_ex = explode(',', $item->d_pic_indictment);
														$count_d_pic_indictment = count($d_pic_indictment_ex);
													@endphp
													<li class="nav-item" role="presentation">
														<a class="nav-link {{ $check_active_menu_3 }}" data-bs-toggle="tab" href="#d_pic_indictment_{{ $item->id }}" role="tab" aria-selected="false">
															<div class="d-flex align-items-center">
																<div class="tab-title">คำฟ้องหรือใบร้องทุกข์แจ้งความดำเนินดคี ({{ $count_d_pic_indictment }})</div>
															</div>
														</a>
													</li>
													@endif
													@if( !empty($item->d_pic_cap) )
													@php
														$d_pic_cap_ex = explode(',', $item->d_pic_cap);
														$count_d_pic_cap = count($d_pic_cap_ex);
													@endphp
													<li class="nav-item" role="presentation">
														<a class="nav-link {{ $check_active_menu_4 }}" data-bs-toggle="tab" href="#d_pic_cap_{{ $item->id }}" role="tab" aria-selected="false">
															<div class="d-flex align-items-center">
																<div class="tab-title">หลักฐานการพูด-คุย ({{ $count_d_pic_cap }})</div>
															</div>
														</a>
													</li>
													@endif
													@if( !empty($item->d_pic_other) )
													@php
														$d_pic_other_ex = explode(',', $item->d_pic_other);
														$count_d_pic_other = count($d_pic_other_ex);
													@endphp
													<li class="nav-item" role="presentation">
														<a class="nav-link {{ $check_active_menu_5 }}" data-bs-toggle="tab" href="#d_pic_other_{{ $item->id }}" role="tab" aria-selected="false">
															<div class="d-flex align-items-center">
																<div class="tab-title">อื่นๆ ({{ $count_d_pic_other }})</div>
															</div>
														</a>
													</li>
													@endif
												</ul>
												<div class="tab-content py-3">
													@if( !empty($item->d_pic_id_card) )
													<div class="tab-pane fade {{ $check_active_show_data_1 }}" id="d_pic_id_card_{{ $item->id }}" role="tabpanel">
														<div class="owl-carousel owl-theme carouselSPhoto">
															@foreach($d_pic_id_card_ex as $item_1 => $value_1)
																<div class="item">
							                                        <a class="glightbox show-img-box" data-type="image" href="{{ url('storage')}}/{{ $value_1 }}" alt="สำเนาบัตรประชาชน / PassPort">
							                                            <img class="file-preview" src="{{ url('storage')}}/{{ $value_1 }}" alt="สำเนาบัตรประชาชน / PassPort">
							                                            <div class="infoImg">
							                                                <span class="m-0">สำเนาบัตรประชาชน / PassPort</span>
							                                            </div>
							                                        </a>
							                                    </div>
															@endforeach
						                                </div>
													</div>
													@endif
													@if( !empty($item->d_pic_company_certificate) )
													<div class="tab-pane fade {{ $check_active_show_data_2 }}" id="d_pic_company_certificate_{{ $item->id }}" role="tabpanel">
														<div class="owl-carousel owl-theme carouselSPhoto">
						                                    @foreach($d_pic_company_certificate_ex as $item_2 => $value_2)
																<div class="item">
							                                        <a class="glightbox show-img-box" data-type="image" href="{{ url('storage')}}/{{ $value_2 }}" alt="สำเนาหนังสือรับรองบริษัท">
							                                            <img class="file-preview" src="{{ url('storage')}}/{{ $value_2 }}" alt="สำเนาหนังสือรับรองบริษัท">
							                                            <div class="infoImg">
							                                                <span class="m-0">สำเนาหนังสือรับรองบริษัท</span>
							                                            </div>
							                                        </a>
							                                    </div>
															@endforeach
														</div>
													</div>
													@endif
													@if( !empty($item->d_pic_indictment) )
													<div class="tab-pane fade {{ $check_active_show_data_3 }}" id="d_pic_indictment_{{ $item->id }}" role="tabpanel">
														<div class="owl-carousel owl-theme carouselSPhoto">
						                                    @foreach($d_pic_indictment_ex as $item_3 => $value_3)
																<div class="item">
							                                        <a class="glightbox show-img-box" data-type="image" href="{{ url('storage')}}/{{ $value_3 }}" alt="คำฟ้องหรือใบร้องทุกข์แจ้งความดำเนินดคี">
							                                            <img class="file-preview" src="{{ url('storage')}}/{{ $value_3 }}" alt="คำฟ้องหรือใบร้องทุกข์แจ้งความดำเนินดคี">
							                                            <div class="infoImg">
							                                                <span class="m-0">คำฟ้องหรือใบร้องทุกข์แจ้งความดำเนินดคี</span>
							                                            </div>
							                                        </a>
							                                    </div>
															@endforeach
														</div>
													</div>
													@endif
													@if( !empty($item->d_pic_cap) )
													<div class="tab-pane fade {{ $check_active_show_data_4 }}" id="d_pic_cap_{{ $item->id }}" role="tabpanel">
														<div class="owl-carousel owl-theme carouselSPhoto">
															@foreach($d_pic_cap_ex as $item_4 => $value_4)
															<div class="item">
						                                        <a class="glightbox show-img-box" data-type="image" href="{{ url('storage')}}/{{ $value_4 }}" alt="ภาพหลักฐานการพูด-คุย">
						                                            <img class="file-preview" src="{{ url('storage')}}/{{ $value_4 }}" alt="ภาพหลักฐานการพูด-คุย">
						                                            <div class="infoImg">
						                                                <span class="m-0">หลักฐานการพูด-คุย</span>
						                                            </div>
						                                        </a>
						                                    </div>
						                                    @endforeach
														</div>
													</div>
													@endif
													@if( !empty($item->d_pic_other) )
													<div class="tab-pane fade {{ $check_active_show_data_5 }}" id="d_pic_other_{{ $item->id }}" role="tabpanel">
														<div class="owl-carousel owl-theme carouselSPhoto">
															@php
						                                        // ข้อความที่ต้องการตรวจสอบ
						                                        $text = $item->d_pic_other;

						                                        // คำที่ต้องการตรวจสอบ
						                                        $keyword = "uploads";
						                                        $check_uploads = "";

						                                        // ตรวจสอบว่าคำที่ต้องการอยู่ในข้อความหรือไม่
						                                        if (strpos($text, $keyword) !== false) {
						                                            $check_uploads =  "Yes";
						                                        } else {
						                                            $check_uploads =  "No";
						                                        }
						                                    @endphp
						                                    
					                                        @if($check_uploads == "Yes")
						                                        @foreach($d_pic_other_ex as $item_5 => $value_5)
						                                        <div class="item">
							                                        <a class="glightbox show-img-box" data-type="image" href="{{ url('storage')}}/{{ $value_5 }}" alt="ภาพอื่นๆ">
							                                            <img class="file-preview" src="{{ url('storage')}}/{{ $value_5 }}" alt="ภาพอื่นๆ">
							                                            <div class="infoImg">
							                                                <span class="m-0">อื่นๆ</span>
							                                            </div>
							                                        </a>
							                                    </div>
						                                        @endforeach
					                                        @else
					                                        <div class="item">
						                                        <a class="glightbox show-img-box" data-type="image" href="{{ url('/img/picture_old')}}/{{ $item->d_pic_other }}" alt="ภาพอื่นๆ">
						                                            <img class="file-preview" src="{{ url('/img/picture_old')}}/{{ $item->d_pic_other }}" alt="ภาพอื่นๆ">
						                                            <div class="infoImg">
						                                                <span class="m-0">อื่นๆ</span>
						                                            </div>
						                                        </a>
					                                        </div>
					                                        @endif
					                                    
														</div>
													</div>
													@endif
												</div>

						                    </div>
						                </div>
						                @endif

						                <hr>

						                <div class="row">
			                                <div class=" col-12 d-flex justify-content-between align-items-center flex-wrap">
			                                    <span class="text-secondary mt-2">
			                                        <b class="text-dark" style="font-size:18px;">ผู้ลงข้อมูล</b>
			                                    </span>
			                                </div>
			                                <div class="col-4 d-flex justify-content-between align-items-center flex-wrap">
			                                    <span class="text-secondary">
			                                        <b class="text-danger" style="font-size:18px;">บริษัท</b>
			                                        <br>
			                                        {{ $item->user->member_co }}
			                                    </span>
			                                </div>
			                                <div class="col-2 d-flex justify-content-between align-items-center flex-wrap">
			                                    <span class="text-secondary">
			                                        <b class="text-danger" style="font-size:18px;">เบอร์ติดต่อ</b>
			                                        <br>
			                                        {{ $item->user->member_tel }}
			                                    </span>
			                                </div>
			                                <div class="col-2 d-flex justify-content-between align-items-center flex-wrap">
			                                    <span class="text-secondary">
			                                        <b class="text-danger" style="font-size:18px;">เลขที่สมาชิก</b>
			                                        <br>
			                                        {{ $item->user->no_member }}
			                                    </span>
			                                </div>
			                                <div class="col-3 d-flex justify-content-between align-items-center flex-wrap">
			                                	<span class="text-secondary">
			                                        <b class="text-danger" style="font-size:18px;">
			                                        	หมวดหมู่สมาชิก / สถานะ
			                                        </b>
			                                        <br>
			                                        <!-- บทบาทของสมาชิก -->
		                                            @if($item->user->member_role == "admin")
		                                                <span class="btn bg-light-info text-info" style="font-size:12px;">
		                                                    Admin
		                                                </span>
		                                            @elseif($item->user->member_role == "member")
		                                                <span class="btn bg-light-success text-success" style="font-size:12px;">
		                                                    member
		                                                </span>
		                                            @elseif($item->user->member_role == "customer")
		                                                <span class="btn bg-light-danger text-danger" style="font-size:12px;">
		                                                    customer
		                                                </span>
		                                            @else
		                                                <span class="btn bg-light-warning text-warning" style="font-size:12px;">
		                                                    driver
		                                                </span>
		                                            @endif

		                                            <!-- สถานะของสมาชิก -->
		                                            @if($item->user->member_status == "Active")
		                                                <span  class="btn bg-light-success text-success" style="font-size:12px;">
		                                                    Active
		                                                </span>
		                                            @else
		                                                <span class="btn bg-light-danger text-danger" style="font-size:12px;">
		                                                    Inactive
		                                                </span>
		                                            @endif
			                                    </span>
			                                </div>
			                                <div class="col-1 d-flex justify-content-between align-items-center flex-wrap">
			                                	<button type="button" class="btn btn-danger float-end"
			                                	onclick='delete_case("{{ $type }}" , "{{ $item->id }}");'>
			                                		<i class="fa-solid fa-trash-xmark"></i>
			                                	</button>
			                                </div>
			                            </div>

				                    </div>
				                </div>
				            </div>
				        </div>
				    </div>
				</div>
			@endforeach
		@endif

	</div>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css'><link rel="stylesheet" href="./style.css">
<script src='https://cdn.jsdelivr.net/gh/mcstudios/glightbox/dist/js/glightbox.min.js'></script><script  src="./script.js"></script>

<script>const nav = document.createElement('div');
nav.classList.add('gcounter');
nav.dataset.indicator = '/';

const slides = GLightbox({
	onOpen: () => slides.modal.appendChild(nav),
	afterSlideChange: function(prev, next) {
		nav.dataset.indicator = `${next.index + 1} / ${slides.elements.length}`;
		nav.classList.add('gcounter-added');
	}
});
</script>
<script>
	
	$(function() {
        // Owl Carousel
        var owl = $(".carouselSPhoto");
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

<script>
	
	function delete_case(type , id){
		// console.log("ลบ ID : " + id + "ของ > " + type);

        fetch("{{ url('/') }}/api/delete_case/" + id + "/" + type)
            .then(response => response.text())
            .then(result => {
                // console.log(result);

            	if(result == "success"){
                	document.querySelector('#div_id_'+id).remove();
                }
        });

	}

</script>
@endsection
