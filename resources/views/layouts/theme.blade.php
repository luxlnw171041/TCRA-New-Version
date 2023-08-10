<!doctype html>
<html lang="en" class="color-sidebar sidebarcolor1">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <!--favicon-->
	<link rel="shortcut icon" href="{{ asset('/img/logo/tcra.png') }}" type="image/x-icon" />
	<!--plugins-->
	<link rel="stylesheet" href="{{ asset('/theme/plugins/notifications/css/lobibox.min.css') }}" />

	<link href="{{ asset('/theme/plugins/simplebar/css/simplebar.css') }}">
	<link href="{{ asset('/theme/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
	<link href="{{ asset('/theme/plugins/highcharts/css/highcharts.css') }}" rel="stylesheet" />
	<link href="{{ asset('/theme/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('/theme/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
	<!-- loader-->
	<link href="{{ asset('/theme/css/pace.min.css') }}" rel="stylesheet" />
	<script src="{{ asset('/theme/js/pace.min.js') }}"></script>
	<!-- Bootstrap CSS -->
	<link href="{{ asset('/theme/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="{{ asset('/theme/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('/theme/css/icons.css') }}" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="{{ asset('/theme/css/dark-theme.css') }}" />
	<link rel="stylesheet" href="{{ asset('/theme/css/semi-dark.css') }}" />
	<link rel="stylesheet" href="{{ asset('/theme/css/header-colors.css') }}" />
    <!-- fontawesome icon -->
	<link href="https://kit-pro.fontawesome.com/releases/v6.2.1/css/pro.min.css" rel="stylesheet">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <!-- font -->
    <link href="https://fonts.googleapis.com/css2?family=Kanit&family=Laila:wght@700&family=Mitr&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhaijaan+2:wght@600;700;800&family=Prompt:wght@500&display=swap" rel="stylesheet">
    <title>TCRA</title>
</head>
<style>
    *:not(i) {
		font-family: 'Prompt', sans-serif !important;
	}
</style>
<body>
    <!--wrapper-->
    <div class="wrapper">
        <!--sidebar wrapper -->
        <div class="sidebar-wrapper" data-simplebar="true">
            <div class="has-arrow">
                <div class="sidebar-header">
                    <a href="{{url('/home')}}">
                        <img src="{{asset('img/logo/tcra.png')}}" style="width:50px;" alt="logo icon">
                    </a>
                    <a href="{{url('/home')}}">
                        <h6 class="logo-text">สมาคม<br>รถเช่าไทย</h6>
                    </a>
                    <div class="toggle-icon ms-auto"><i class='bx bx-first-page'></i>
                    </div>
                </div>
            </div>
            <!--navigation-->
            <ul class="metismenu" id="menu">
                @if(Auth::user()->member_role == "admin")
                    <li>
                        <a href="javascript:;" class="has-arrow">
                            <div class="parent-icon"><i class="fa-solid fa-user-shield"></i>
                            </div>
                            <div class="menu-title">Admin</div>
                        </a>
                        <ul>
                            <li>
                                <a href="{{ url('/create_user_by_admin') }}"><i class="fa-solid fa-user-plus"></i>เพิ่มสมาชิก</a>
                            </li>
                        </ul>
                    </li>
                @endif
                @if( Auth::user()->member_role == "admin" || Auth::user()->member_role == "customer" || Auth::user()->member_role == "member" )
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon">
                        <img src="{{ url('/img/icon/iconCustomerSlash.png') }}" alt="" width="25">
                        <!-- <i class="fa-solid fa-user-ninja"></i> -->
                        </div>
                        <div class="menu-title">
                            ข้อมูลมิจฉาชีพ
                            <br>
                            (เช่ารถ)
                        </div>
                    </a>
                    <ul>
                        <li> <a href="{{ url('/customer/create') }}"><i class="bx bx-right-arrow-alt"></i>เพิ่มข้อมูล</a>
                        </li>
                        <li> <a href="{{ url('/customer/') }}"><i class="bx bx-right-arrow-alt"></i>ค้นหาข้อมูล</a>
                        </li>
                    </ul>
                </li>
                @endif
                @if( Auth::user()->member_role == "admin" || Auth::user()->member_role == "driver" || Auth::user()->member_role == "member" )
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon">
                            <!-- <i class="fa-solid fa-user-tie"></i> -->
                            <img src="{{ url('/img/icon/iconDriversSlash.png') }}" alt="" width="25">

                        </div>
                        <div class="menu-title">
                            ข้อมูล Blacklist
                            <br>
                            พนักงานขับรถ
                        </div>
                    </a>
                    <ul>
                        <li> <a href="{{ url('/driver/create') }}"><i class="bx bx-right-arrow-alt"></i>เพิ่มข้อมูล</a>
                        </li>
                        <li> <a href="{{ url('/driver/') }}"><i class="bx bx-right-arrow-alt"></i>ค้นหาข้อมูล</a>
                        </li>
                    </ul>
                </li>
                @endif
            </ul>
            <!--end navigation-->
        </div>
        <!--end sidebar wrapper -->
        <!--start header -->
        <header>
            <div class="topbar d-flex align-items-center" style="background-color:#3495c9!important;">
                <nav class="navbar navbar-expand">
                    <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
                    </div>
                    <!-- <div class="top-menu-left d-none d-lg-block">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link" href="app-emailbox.html"><i class='bx bx-envelope'></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="app-chat-box.html"><i class='bx bx-message'></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="app-fullcalender.html"><i class='bx bx-calendar'></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="app-to-do.html"><i class='bx bx-check-square'></i></a>
                            </li>
                        </ul>
                    </div> -->
                    <div class="search-bar flex-grow-1">
                        <div class="position-relative search-bar-box">
                            <input type="text" class="form-control search-control" placeholder="Type to search..."> <span class="position-absolute top-50 search-show translate-middle-y"><i class='bx bx-search'></i></span>
                            <span class="position-absolute top-50 search-close translate-middle-y"><i class='bx bx-x'></i></span>
                        </div>
                    </div>
                    <div class="top-menu ms-auto">
                        <ul class="navbar-nav align-items-center">
                            <li class="nav-item mobile-search-icon d-none">
                                <a class="nav-link" href="#"> <i class='bx bx-search'></i>
                                </a>
                            </li>
                            <li class="nav-item dropdown dropdown-large d-none">
                                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <i class='bx bx-category'></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <div class="row row-cols-3 g-3 p-3">
                                        <div class="col text-center">
                                            <div class="app-box mx-auto bg-gradient-cosmic text-white"><i class='bx bx-group'></i>
                                            </div>
                                            <div class="app-title">Teams</div>
                                        </div>
                                        <div class="col text-center">
                                            <div class="app-box mx-auto bg-gradient-burning text-white"><i class='bx bx-atom'></i>
                                            </div>
                                            <div class="app-title">Projects</div>
                                        </div>
                                        <div class="col text-center">
                                            <div class="app-box mx-auto bg-gradient-lush text-white"><i class='bx bx-shield'></i>
                                            </div>
                                            <div class="app-title">Tasks</div>
                                        </div>
                                        <div class="col text-center">
                                            <div class="app-box mx-auto bg-gradient-kyoto text-dark"><i class='bx bx-notification'></i>
                                            </div>
                                            <div class="app-title">Feeds</div>
                                        </div>
                                        <div class="col text-center">
                                            <div class="app-box mx-auto bg-gradient-blues text-dark"><i class='bx bx-file'></i>
                                            </div>
                                            <div class="app-title">Files</div>
                                        </div>
                                        <div class="col text-center">
                                            <div class="app-box mx-auto bg-gradient-moonlit text-white"><i class='bx bx-filter-alt'></i>
                                            </div>
                                            <div class="app-title">Alerts</div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item dropdown dropdown-large d-none">
                                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count">7</span>
                                    <i class='bx bx-bell'></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="javascript:;">
                                        <div class="msg-header">
                                            <p class="msg-header-title">Notifications</p>
                                            <p class="msg-header-clear ms-auto">Marks all as read</p>
                                        </div>
                                    </a>
                                    <div class="header-notifications-list">
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-primary text-primary"><i class="bx bx-group"></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">New Customers<span class="msg-time float-end">14 Sec
                                                            ago</span></h6>
                                                    <p class="msg-info">5 new user registered</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-danger text-danger"><i class="bx bx-cart-alt"></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">New Orders <span class="msg-time float-end">2 min
                                                            ago</span></h6>
                                                    <p class="msg-info">You have recived new orders</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-success text-success"><i class="bx bx-file"></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">24 PDF File<span class="msg-time float-end">19 min
                                                            ago</span></h6>
                                                    <p class="msg-info">The pdf files generated</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-warning text-warning"><i class="bx bx-send"></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Time Response <span class="msg-time float-end">28 min
                                                            ago</span></h6>
                                                    <p class="msg-info">5.1 min avarage time response</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-info text-info"><i class="bx bx-home-circle"></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">New Product Approved <span class="msg-time float-end">2 hrs ago</span></h6>
                                                    <p class="msg-info">Your new product has approved</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-danger text-danger"><i class="bx bx-message-detail"></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">New Comments <span class="msg-time float-end">4 hrs
                                                            ago</span></h6>
                                                    <p class="msg-info">New customer comments recived</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-success text-success"><i class='bx bx-check-square'></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Your item is shipped <span class="msg-time float-end">5 hrs
                                                            ago</span></h6>
                                                    <p class="msg-info">Successfully shipped your item</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-primary text-primary"><i class='bx bx-user-pin'></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">New 24 authors<span class="msg-time float-end">1 day
                                                            ago</span></h6>
                                                    <p class="msg-info">24 new authors joined last week</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-warning text-warning"><i class='bx bx-door-open'></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Defense Alerts <span class="msg-time float-end">2 weeks
                                                            ago</span></h6>
                                                    <p class="msg-info">45% less alerts last 4 weeks</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <a href="javascript:;">
                                        <div class="text-center msg-footer">View All Notifications</div>
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item dropdown dropdown-large d-none">
                                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count">8</span>
                                    <i class='bx bx-comment'></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="javascript:;">
                                        <div class="msg-header">
                                            <p class="msg-header-title">Messages</p>
                                            <p class="msg-header-clear ms-auto">Marks all as read</p>
                                        </div>
                                    </a>
                                    <div class="header-message-list">
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <!-- <img src="assets/images/avatars/avatar-1.png" class="msg-avatar" alt="user avatar"> -->
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Daisy Anderson <span class="msg-time float-end">5 sec
                                                            ago</span></h6>
                                                    <p class="msg-info">The standard chunk of lorem</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <!-- <img src="assets/images/avatars/avatar-2.png" class="msg-avatar" alt="user avatar"> -->
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Althea Cabardo <span class="msg-time float-end">14
                                                            sec ago</span></h6>
                                                    <p class="msg-info">Many desktop publishing packages</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <!-- <img src="assets/images/avatars/avatar-3.png" class="msg-avatar" alt="user avatar"> -->
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Oscar Garner <span class="msg-time float-end">8 min
                                                            ago</span></h6>
                                                    <p class="msg-info">Various versions have evolved over</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <!-- <img src="assets/images/avatars/avatar-4.png" class="msg-avatar" alt="user avatar"> -->
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Katherine Pechon <span class="msg-time float-end">15
                                                            min ago</span></h6>
                                                    <p class="msg-info">Making this the first true generator</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <!-- <img src="assets/images/avatars/avatar-5.png" class="msg-avatar" alt="user avatar"> -->
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Amelia Doe <span class="msg-time float-end">22 min
                                                            ago</span></h6>
                                                    <p class="msg-info">Duis aute irure dolor in reprehenderit</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <!-- <img src="assets/images/avatars/avatar-6.png" class="msg-avatar" alt="user avatar"> -->
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Cristina Jhons <span class="msg-time float-end">2 hrs
                                                            ago</span></h6>
                                                    <p class="msg-info">The passage is attributed to an unknown</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <!-- <img src="assets/images/avatars/avatar-7.png" class="msg-avatar" alt="user avatar"> -->
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">James Caviness <span class="msg-time float-end">4 hrs
                                                            ago</span></h6>
                                                    <p class="msg-info">The point of using Lorem</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <!-- <img src="assets/images/avatars/avatar-8.png" class="msg-avatar" alt="user avatar"> -->
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Peter Costanzo <span class="msg-time float-end">6 hrs
                                                            ago</span></h6>
                                                    <p class="msg-info">It was popularised in the 1960s</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <!-- <img src="assets/images/avatars/avatar-9.png" class="msg-avatar" alt="user avatar"> -->
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">David Buckley <span class="msg-time float-end">2 hrs
                                                            ago</span></h6>
                                                    <p class="msg-info">Various versions have evolved over</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <!-- <img src="assets/images/avatars/avatar-10.png" class="msg-avatar" alt="user avatar"> -->
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Thomas Wheeler <span class="msg-time float-end">2 days
                                                            ago</span></h6>
                                                    <p class="msg-info">If you are going to use a passage</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <!-- <img src="assets/images/avatars/avatar-11.png" class="msg-avatar" alt="user avatar"> -->
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Johnny Seitz <span class="msg-time float-end">5 days
                                                            ago</span></h6>
                                                    <p class="msg-info">All the Lorem Ipsum generators</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <a href="javascript:;">
                                        <div class="text-center msg-footer">View All Messages</div>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="user-box dropdown">
                        <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            @if(!empty(Auth::user()->member_pic))
                                <img src="{{ url('storage')}}/{{ Auth::user()->member_pic }}" class="user-img" alt="user avatar">
                            @else
                                <img class="user-img" src="{{asset('img/icon/user.jpg')}}" alt="user avatar">
                            @endif
                            <div class="user-info ps-3">
                                <p class="user-name mb-0" style="color: #ffffff!important;">{{Auth::user()->name}}</p>
                                <p class="designattion mb-0" style="color: #ffffff!important;">{{Auth::user()->member_co}}</p>
                            </div>
                            <div style="margin-left:10px ;">
                            <i class="fa-solid fa-bars text-white"></i>
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item btn" href="{{ url('/show_profile/' . Auth::user()->id ) }}"><i class="bx bx-user"></i><span>Profile</span></a>
                            </li>
                            <div class="dropdown-divider mb-0"></div>
                            </li>
                            <li><a class="dropdown-item btn" onclick="before_logout();"><i class='bx bx-log-out-circle'></i><span>Logout</span></a>

                                <a id="btn_go_to_logout" href="{{ route('logout') }}"  class="dropdown-item d-none" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
        <!--end header -->
        <!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">
                @yield('content')
            </div>
        </div>
        <!--end page wrapper -->
        <!--start overlay-->
        <div class="overlay toggle-icon"></div>
        <!--end overlay-->
        <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
        <footer class="page-footer">
            <p class="mb-0">TCRA © Power by <a href="mailto:contact.viicheck.com" class="link text-secondary">2B-Green</a></p>
        </footer>
    </div>
    <!--end wrapper-->
    <!--start switcher-->
  
    <!--end switcher-->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
    <!-- Bootstrap JS -->
    <script src="{{asset('theme/js/bootstrap.bundle.min.js')}}"></script>
    <!--plugins-->
    <!-- <script src="{{asset('theme/js/jquery.min.js')}}"></script> -->
    <script src="{{asset('theme/plugins/simplebar/js/simplebar.min.js')}}"></script>
    <script src="{{asset('theme/plugins/metismenu/js/metisMenu.min.js')}}"></script>
    <script src="{{asset('theme/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
    <!--app JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script src="{{asset('theme/js/app.js')}}"></script>
    <!--notification js -->
    <script src="{{ asset('/theme/plugins/notifications/js/lobibox.min.js') }}"></script>
	<script src="{{ asset('/theme/plugins/notifications/js/notifications.min.js') }}"></script>
	<script src="{{ asset('/theme/plugins/notifications/js/notification-custom-script.js') }}"></script>
    
    <link href="{{ asset('/theme/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />

    <script>
        // $(document).ready(function() {
        //     var sideBar = localStorage.getItem('sideBar');
        //     if (sideBar) {
        //         // console.log(sideBar);

        //         $('html').attr('class', sideBar);
        //     }


        //     var selectedTheme = localStorage.getItem('selectedTheme');
        //     if (selectedTheme) {
        //         // console.log(selectedTheme);
        //         themeClassId = selectedTheme.replace("-", "");
        //         document.getElementById(themeClassId).checked = true ;
        //         $('html').attr('class', selectedTheme);
        //     }

        //     var selectedHeaderColor = localStorage.getItem('selectedHeaderColor');

        //     if (selectedHeaderColor) {
        //         for (let i = 1; i <= 8; i++) {
        //             if (selectedHeaderColor !== "headercolor" +i) {

        //                 $("html").removeClass("headercolor" +i);
        //             }
        //         }
        //         $("html").addClass("color-header " + selectedHeaderColor);
        //     }


        // });

        let update_last_time_active ;

        document.addEventListener('DOMContentLoaded', (event) => {

            let user_id = "{{ Auth::user()->id }}";

            fetch( "{{ url('/') }}/api/update_last_time_active/" + user_id )
                .then(response => response.text())
                .then(result => {
                    // console.log(result);
                    if(result =="OK"){
                        // console.log("update time active >> " + Date.now());
                    }
            });

            func_update_last_time_active();

        });

        function func_update_last_time_active(){

            update_last_time_active = setInterval(function() {
                let user_id = "{{ Auth::user()->id }}";

                fetch( "{{ url('/') }}/api/update_last_time_active/" + user_id )
                    .then(response => response.text())
                    .then(result => {
                        // console.log(result);
                        if(result =="OK"){
                            // console.log("update time active >> " + Date.now());
                        }
                });
            }, 180000);

        }

        function myStop_update_last_time_active() {
            clearInterval(update_last_time_active);
            // console.log("STOP LOOP");
        }


        function before_logout(){

            let user_id = "{{ Auth::user()->id }}";

            fetch( "{{ url('/') }}/api/update_last_time_active/" + user_id )
                .then(response => response.text())
                .then(result => {
                    // console.log(result);
                    if(result =="OK"){
                        myStop_update_last_time_active();
                        setTimeout(function() {
                            document.querySelector('#btn_go_to_logout').click();
                        }, 1000);
                    }
            });
        }
    </script>
</body>

</html>
