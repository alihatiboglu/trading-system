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
    <link rel="stylesheet" href="{{ asset('public/assets/dashboard') }}/plugins/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="{{ asset('public/assets/dashboard') }}/css/adminlte.min.css">
    <link rel="stylesheet" href="{{ asset('public/assets/dashboard') }}/css/style.css">
    @if(app()->getLocale() == 'ar')
        <link rel="stylesheet" id="sky-css" href="https://www.fontstatic.com/f=sky?ver=5.3.1" as="style" onload="this.onload=null;this.rel='stylesheet'" type="text/css" media="all">
        <link rel="stylesheet" href="{{ asset('public/assets/dashboard/css/rtl.css') }}" />
    @endif
    <link rel="stylesheet" href="{{ asset('public/assets/dashboard') }}/css/custom2.css">
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
            <!-- Notifications Dropdown Menu -->
            @php
                $notifications = \App\Models\Notify::orderby('id', 'DESC')
                                                    ->where('to', 'admin')
                                                    ->where('seen', '!=', 1)->take(20)->get();
            @endphp
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell cl-green"></i>
                    <span class="badge badge-warning navbar-badge">{{ count($notifications) }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right notify_dropdown">
                    <span class="dropdown-item dropdown-header">15 Notifications</span>
                    @foreach($notifications as $notify)
                    <a href="#" class="dropdown-item">
                        {{ $notify->name }} {{ __('main.'.$notify->category) }}
                        <span class="float-right text-muted text-sm">{{ $notify->created_at->diffForHumans() }}</span>
                    </a>@endforeach
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-user cl-green"></i>
                    {{ auth()->user()->name }}
                </a>
            </li>
            <li class="nav-item dropdown">
                @php
                    $languages = \App\Models\Language::oldest()->take(2)->get();
                    $current_language = $languages->where('code','LIKE', app()->getLocale())->first()->name ?? '';
                @endphp
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="nav-icon fas fa-language cl-green"></i>
                    {{ $current_language }}
                </a>
                <div class="dropdown-menu dropdown-menu-xs dropdown-menu-right">
                    @foreach($languages as $lang)
                        <a class="dropdown-item {{ $lang->code == app()->getLocale() ? 'active' : '' }}"
                           href="{{ route('set_locale', $lang->code) }}">{{ $lang->name }}</a>
                    @endforeach
                </div>
            </li>
            <li class="nav-item">
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();" class="nav-link"> <i class="cl-green fas fa-sign-out-alt"></i></a>
                <form id="logout-form" action="{{ route('dashboard.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        @include('dashboard::partials.sidebar')
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper text-sm pl-3 pr-3">
        @yield('content')
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
        </div>
        {{ __('main.copyright') }}
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('public/assets/dashboard') }}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('public/assets/dashboard') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<!-- <script src="{{ asset('public/assets/dashboard') }}/plugins/summernote/summernote-bs4.min.js"></script> -->
<script src="{{ asset('public/assets/dashboard') }}/plugins/tinymce/tinymce.min.js"></script>
<script src="{{ asset('public/assets/dashboard') }}/plugins/tinymce/jquery.tinymce.min.js"></script>
<script src="{{ asset('public/assets/dashboard') }}/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('public/assets/dashboard') }}/js/demo.js"></script>
<!-- <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script> -->
<script>
    $(document).ready(function() {
        // $('.summernote').summernote({
        //     height: 300
        // })
        tinymce.init({
            selector: '.summernote',
            theme: "modern",
            height: 400,
            //plugins:'code imagetools preview print image'
 plugins: 'searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor insertdatetime advlist lists textcolor wordcount imagetools  contextmenu colorpicker textpattern code',
toolbar: 'formatselect fontsizeselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
        }) 
// tinymce.init({
//   selector: '.summernote',
//   height: 400,
//   theme: 'modern',
//   plugins: 'print preview fullpage powerpaste searchreplace autolink directionality advcode visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount tinymcespellchecker a11ychecker imagetools mediaembed  linkchecker contextmenu colorpicker textpattern help',
//   toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
//   image_advtab: true,
//   templates: [
//     { title: 'Test template 1', content: 'Test 1' },
//     { title: 'Test template 2', content: 'Test 2' }
//   ],
//   content_css: [
//     '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
//     '//www.tinymce.com/css/codepen.min.css'
//   ]
//  });
        // CKEDITOR.replaceAll( 'summernote' );
        // CKEDITOR.replaceAll( 'summernote2' );
        // CKEDITOR.replaceAll( 'summernote3' );
        // CKEDITOR.replaceAll( 'summernote4' );
        //CKEDITOR.dtd.$removeEmpty.span = 0;
    })
</script>
@stack('scripts')
</body>
</html>
