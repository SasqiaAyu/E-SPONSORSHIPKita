<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>
        ESponsorship | {{ucfirst($__env->yieldContent('menu'))}}
    </title>
    <link rel="shortcut icon" type="image/png" href="{{url('img/logo.png')}}">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <link rel="shortcut icon" type="image/x-icon" href="{{ asset('theme-notika/img/favicon.ico')}}"> --}}
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('theme-notika/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('theme-notika/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('theme-notika/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{ asset('theme-notika/css/owl.theme.css')}}">
    <link rel="stylesheet" href="{{ asset('theme-notika/css/owl.transitions.css')}}">
    <link rel="stylesheet" href="{{ asset('theme-notika/css/meanmenu/meanmenu.min.css')}}">
    <link rel="stylesheet" href="{{ asset('theme-notika/css/animate.css')}}">
    <link rel="stylesheet" href="{{ asset('theme-notika/css/animation/animation-custom.css')}}">
    <link rel="stylesheet" href="{{ asset('theme-notika/css/wave/button.css')}}">
    <link rel="stylesheet" href="{{ asset('theme-notika/css/normalize.css')}}">
    <link rel="stylesheet" href="{{ asset('theme-notika/css/scrollbar/jquery.mCustomScrollbar.min.css')}}">
    <link rel="stylesheet" href="{{ asset('theme-notika/css/jvectormap/jquery-jvectormap-2.0.3.css')}}">
    <link rel="stylesheet" href="{{ asset('theme-notika/css/notika-custom-icon.css')}}">
    <link rel="stylesheet" href="{{ asset('theme-notika/css/wave/waves.min.css')}}">
    <link rel="stylesheet" href="{{ asset('theme-notika/css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{ asset('theme-notika/css/main.css')}}">
    <link rel="stylesheet" href="{{ asset('theme-notika/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('theme-notika/css/responsive.css')}}">
    <script src="{{ asset('theme-notika/js/vendor/modernizr-2.8.3.min.js')}}"></script>

</head>
<style>
    .invalid-feedback{
        color: red
    }
    .mg-tb-10 {
        margin: 10px 0px;
    }
</style>
<body>
    <div class="header-top-area" style="background-color: #212529">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="logo-area">
                        <a style="color:white; font-size:24px">
                            <img src="{{url('img/logo.png')}}" alt="Logo Politeknik Harapan Bersama" width="10%"
                                height="10%">
                                ESponsorship | 
                                @if (Auth()->user()->jenis_user == 1)
                                    SuperAdmin
                                @endif
                                @if (Auth()->user()->jenis_user == 2)
                                    Perusahaan
                                @endif
                                @if (Auth()->user()->jenis_user == 3)
                                    Mahasiswa
                                @endif

                        </a>
                        {{-- <a href="#"><img src="{{ asset('theme-notika/img/logo/logo.png')}}" alt="" /></a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @yield('menu-mobile')
    {{-- <img src="{{url('storage/'.auth()->user()->foto_sumber)}}" alt=""> --}}
    <div class="main-menu-area mg-tb-40">
        <div class="container">
            @if (Auth()->user()->jenis_user == 1)
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                        <li @if(  $__env->yieldContent('menu') == 'home') class="active" @endif>
                            <a href="{{route('home')}}"><i class="notika-icon notika-house"></i>
                                Home
                            </a>
                        </li>
                        <li @if(  $__env->yieldContent('menu') == 'approval') class="active" @endif>
                            <a data-toggle="tab" href="#approval_user"><i class="notika-icon notika-edit"></i>
                                Approval User
                            </a>
                        </li>
                        <li @if(  $__env->yieldContent('menu') == 'management') class="active" @endif>
                            <a data-toggle="tab" href="#manajemen_user"><i class="notika-icon notika-form"></i>
                                Manajemen User
                            </a>
                        </li>
                        <li class="@if(  $__env->yieldContent('menu') == 'profile') active @endif pull-right">
                            <div>
                            </div>
                            <a data-toggle="tab" href="#profile">
                                <img src="{{url('storage/'.auth()->user()->foto_sumber)}}" alt="" width="30px"> | {{auth()->user()->nama}}
                            </a>
                        </li>
                        <li @if(  $__env->yieldContent('menu') == 'testimoni') class="active" @endif>
                            <a href="{{route('testimoni.index')}}"><i class="notika-icon notika-support"></i>
                                Testimoni
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content custom-menu-content">
                        <div id="approval_user" class="tab-pane notika-tab-menu-bg animated flipInX 
                            @if(  $__env->yieldContent('menu') == 'approval') active @endif">
                            <ul class="notika-main-menu-dropdown">
                                <li @if(  $__env->yieldContent('submenu') == 'approval.company') class="active" @endif>
                                    <a href="{{route('approval.company.index')}}">Approval Perusahaan</a>
                                </li>
                                <li @if(  $__env->yieldContent('submenu') == 'approval.student') class="active" @endif>
                                    <a href="{{route('approval.student.index')}}">Approval Mahasiswa</a>
                                </li>
                            </ul>
                        </div>
                        <div id="manajemen_user" class="tab-pane notika-tab-menu-bg animated flipInX
                            @if(  $__env->yieldContent('menu') == 'management') active @endif">
                            <ul class="notika-main-menu-dropdown">
                                <li @if(  $__env->yieldContent('submenu') == 'management.company') class="active" @endif>
                                    <a href="{{route('management.company.index')}}">Manajemen Perusahaan</a>
                                </li>
                                <li @if(  $__env->yieldContent('submenu') == 'management.student') class="active" @endif>
                                    <a href="{{route('management.student.index')}}">Manajemen Mahasiswa</a>
                                </li>
                            </ul>
                        </div>
                        <div id="profile" class="tab-pane notika-tab-menu-bg animated flipInX @if(  $__env->yieldContent('menu') == 'profile') active @endif">
                            <ul class="notika-main-menu-dropdown">
                                <li>
                                    <a>
                                        &nbsp;
                                    </a>
                                </li>
                                <li class="pull-right">
                                    <a href="#" onclick="$('#logout-form').submit()">Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                                <li class="pull-right @if(  $__env->yieldContent('submenu') == 'profile.index') active @endif">
                                    <a href="{{route('profile.index')}}">Profil</a>
                                </li>
                                <li class="pull-right @if(  $__env->yieldContent('submenu') == 'parameter.index') active @endif">
                                    <a href="{{route('parameter.index')}}">Parameter</a>
                                </li>
                                <li class="pull-right @if(  $__env->yieldContent('submenu') == 'category.index') active @endif">
                                    <a href="{{route('category.index')}}">Kategori Perusahaan</a>
                                </li>
                                <li class="pull-right @if(  $__env->yieldContent('submenu') == 'major.index') active @endif">
                                    <a href="{{route('major.index')}}">Jurusan</a>
                                </li>
                                <li class="pull-right @if(  $__env->yieldContent('submenu') == 'faculty.index') active @endif">
                                    <a href="{{route('faculty.index')}}">Fakultas</a>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @if (Auth()->user()->jenis_user == 2)
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                        <li @if(  $__env->yieldContent('menu') == 'home') class="active" @endif>
                            <a href="{{route('home')}}"><i class="notika-icon notika-house"></i>
                                Home
                            </a>
                        </li>
                        <li @if(  $__env->yieldContent('menu') == 'approval.pengajuan') class="active" @endif>
                            <a href="{{route('home')}}"><i class="notika-icon notika-edit"></i>
                                Approval Pengajuan
                            </a>
                        </li>
                        <li class="@if(  $__env->yieldContent('menu') == 'profile') active @endif pull-right">
                            <a data-toggle="tab" href="#profile">
                                <img src="{{url('storage/'.auth()->user()->foto_sumber)}}" alt="" width="30px"> | {{auth()->user()->nama}}
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content custom-menu-content">
                        <div id="profile" class="tab-pane notika-tab-menu-bg animated flipInX @if(  $__env->yieldContent('menu') == 'profile') active @endif">
                            <ul class="notika-main-menu-dropdown">
                                <li>
                                    <a>
                                        &nbsp;
                                    </a>
                                </li>
                                <li class="pull-right">
                                    <a href="#" onclick="$('#logout-form').submit()">Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                                <li class="pull-right @if(  $__env->yieldContent('submenu') == 'profile.index') active @endif">
                                    <a href="{{route('profile.index')}}">Profil</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @if (Auth()->user()->jenis_user == 3)
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                        <li @if(  $__env->yieldContent('menu') == 'home') class="active" @endif>
                            <a href="{{route('home')}}"><i class="notika-icon notika-house"></i>
                                Home
                            </a>
                        </li>
                        <li @if(  $__env->yieldContent('menu') == 'pengajuan') class="active" @endif>
                            <a href="{{route('pengajuanProposal')}}"><i class="notika-icon notika-edit"></i>
                                {{-- student.proposal --}}
                                Pengajuan Proposal
                            </a>
                        </li>
                        <li class="@if(  $__env->yieldContent('menu') == 'profile') active @endif pull-right">
                            <a data-toggle="tab" href="#profile">
                                <img src="{{url('storage/'.auth()->user()->foto_sumber)}}" alt="" width="30px"> | {{auth()->user()->nama}}
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content custom-menu-content">                        
                        <div id="profile" class="tab-pane notika-tab-menu-bg animated flipInX @if(  $__env->yieldContent('menu') == 'profile') active @endif">
                            <ul class="notika-main-menu-dropdown">
                                <li>
                                    <a>
                                        &nbsp;
                                    </a>
                                </li>
                                <li class="pull-right">
                                    <a href="#" onclick="$('#logout-form').submit()">Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                                <li class="pull-right @if(  $__env->yieldContent('submenu') == 'profile.index') active @endif">
                                    <a href="{{route('profile.index')}}">Profil</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
    @yield('content')

    <div class="footer-copyright-area" style="background-color: #212529">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="footer-copy-right">
                        <p>Copyright © 2020
                            . All rights reserved. Template by <a href="https://colorlib.com">ESponsorship Kita</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('theme-notika/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <script src="{{ asset('theme-notika/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('theme-notika/js/wow.min.js')}}"></script>
    <script src="{{ asset('theme-notika/js/jquery-price-slider.js')}}"></script>
    <script src="{{ asset('theme-notika/js/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('theme-notika/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{ asset('theme-notika/js/meanmenu/jquery.meanmenu.js')}}"></script>
    <script src="{{ asset('theme-notika/js/counterup/jquery.counterup.min.js')}}"></script>
    <script src="{{ asset('theme-notika/js/counterup/waypoints.min.js')}}"></script>
    <script src="{{ asset('theme-notika/js/counterup/counterup-active.js')}}"></script>
    <script src="{{ asset('theme-notika/js/scrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script src="{{ asset('theme-notika/js/jvectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
    <script src="{{ asset('theme-notika/js/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script src="{{ asset('theme-notika/js/jvectormap/jvectormap-active.js')}}"></script>
    <script src="{{ asset('theme-notika/js/sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{ asset('theme-notika/js/sparkline/sparkline-active.js')}}"></script>
    <script src="{{ asset('theme-notika/js/flot/jquery.flot.js')}}"></script>
    <script src="{{ asset('theme-notika/js/flot/jquery.flot.resize.js')}}"></script>
    <script src="{{ asset('theme-notika/js/flot/curvedLines.js')}}"></script>
    <script src="{{ asset('theme-notika/js/flot/flot-active.js')}}"></script>
    <script src="{{ asset('theme-notika/js/knob/jquery.knob.js')}}"></script>
    <script src="{{ asset('theme-notika/js/knob/jquery.appear.js')}}"></script>
    <script src="{{ asset('theme-notika/js/knob/knob-active.js')}}"></script>
    <script src="{{ asset('theme-notika/js/wave/waves.min.js')}}"></script>
    <script src="{{ asset('theme-notika/js/wave/wave-active.js')}}"></script>
    <script src="{{ asset('theme-notika/js/chat/moment.min.js')}}"></script>
    <script src="{{ asset('theme-notika/js/chat/jquery.chat.js')}}"></script>
    <script src="{{ asset('theme-notika/js/todo/jquery.todo.js')}}"></script>
    <script src="{{ asset('theme-notika/js/plugins.js')}}"></script>
    <script src="{{ asset('theme-notika/js/data-table/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('theme-notika/js/data-table/data-table-act.js')}}"></script>
    <script src="{{ asset('theme-notika/js/main.js')}}"></script>
    @yield('script')
</body>

</html>