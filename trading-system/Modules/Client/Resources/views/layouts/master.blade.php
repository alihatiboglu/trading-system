<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('public/assets/dashboard') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('public/assets/dashboard') }}/css/adminlte.min.css">
    <link rel="stylesheet" href="{{ asset('public/assets/dashboard') }}/css/custom.css">
    @if(app()->getLocale() == 'ar')
        <link rel="stylesheet" id="sky-css" href="https://www.fontstatic.com/f=sky?ver=5.3.1" as="style" onload="this.onload=null;this.rel='stylesheet'" type="text/css" media="all">
        <link rel="stylesheet" href="{{ asset('public/assets/dashboard/css/rtl.css') }}" />
    @endif
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
{{--                data-toggle="modal" data-target="#supportModal"--}}
                <a class="nav-link" href="{{ route('contact') }}">
                    <i class="fas fa-comments cl-green fa-1x"></i>
                    {{ __('main.client_support') }}
                </a>
            </li>
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" href="{{ route('client.profile') }}">
                    <i class="far fa-user cl-orange"></i>
                    {{ auth()->user()->name }}
                </a>
            </li>
            @php
                $languages = \App\Models\Language::oldest()->take(2)->get();
                $current_language = $languages->where('code','LIKE', app()->getLocale())->first()->name ?? '';
            @endphp
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    {{ $current_language }}
                    <i class="fas fa-chevron-down cl-green"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <div class="dropdown-divider"></div>
                    @foreach($languages as $lang)
                        <a class="dropdown-item {{ $lang->code == app()->getLocale() ? 'active' : '' }}"
                           href="{{ route('set_locale', $lang->code) }}">{{ $lang->name }}</a>
                    @endforeach
                </div>
            </li>
            <li class="nav-item">
                <a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="nav-link"> <i class="fas fa-sign-out-alt"></i></a>
                <form id="logout-form" action="{{ url('/') }}/{{ app()->getLocale() }}/logout" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        @include('client::partials.sidebar')
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper pl-4 pr-4">
        @yield('content')
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <!-- <b>Version</b> 1 -->
        </div>
        <strong>{{ __('main.copyright') }}
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- Modal -->
<div id="supportModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">We-Earn Live Help</h4>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <h6>Welcome to We-Earn Live Support</h6>
                    <h6>Select how you prefer to communicate with us.</h6>

                    <div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- jQuery -->
<script src="{{ asset('public/assets/dashboard') }}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('public/assets/dashboard') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('public/assets/dashboard') }}/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('public/assets/dashboard') }}/js/demo.js"></script>
@stack('scripts')
</body>
</html>
