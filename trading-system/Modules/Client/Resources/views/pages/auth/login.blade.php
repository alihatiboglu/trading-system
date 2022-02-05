<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
    <link href="images/favicon.png" rel="icon" />
    <title>Vadu</title>
    <meta name="description" content="">
    <meta name="author" content="ittezan.com">

    <!-- Stylesheet
============================================= -->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/dashboard') }}/js/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/dashboard') }}/css/stylesheet.css"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/dashboard') }}/css/loginStyle.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<script>
    function validate(ev) {
            let Name = document.getElementById("userName");
            let NameErr = document.getElementById("user_nameErr");
            let Password = document.getElementById("loginPassword");
            let PasswordErr = document.getElementById("loginPasswordErr");
            if (Name.value == "" &&  Password.value == "" ) {
                NameErr.classList.add("text-danger");
                NameErr.innerHTML = " الرجاء إدخال إسم المستخدم";
                PasswordErr.classList.add("text-danger");
                PasswordErr.innerHTML = " الرجاء إدخال كلمة المرور";
                return false;
            } else if (Name.value == "" ) {
                PasswordErr.innerHTML = "";
                NameErr.classList.add("text-danger");
                NameErr.innerHTML = " الرجاء إدخال إسم المستخدم";
                return false;
            } else if (Password.value == "") {
                NameErr.innerHTML = "";
                PasswordErr.classList.add("text-danger");
                PasswordErr.innerHTML = " الرجاء إدخال كلمة المرور";
                return false;
            }else {
                NameErr.innerHTML = "";
                PasswordErr.innerHTML = "";

            }


        return (true);
    }
    </script>
<body>
    <div id="main-wrapper" class="h-100 login-body">
        <div class="container h-100">
            <!-- Login Form
    ============================================= -->
            <div class="row no-gutters h-100">
                <div class="col-11 col-sm-9 col-md-7 col-lg-5 col-xl-4 m-auto py-5">
                    <div class="logo text-center">
                        <a href="login.html" title="Smart Loyar">
                            <img class="logo-sm" src="{{ asset('public/assets/dashboard') }}/images/logo.png" alt="logo">
                        </a>
                    </div>
                    <p class="lead text-center mb-4">تسجيل دخول</p>

                    <!-- <p class="lead text-center alert alert-danger">خطأ!.. رمز التحقق غير صحيح!!</p>-->


                    <form id="loginForm" method="POST" action="{{ route('dashboard.postLogin') }}"  onsubmit="return(validate());">
                        @csrf
                        <div class="vertical-input-group">

                            <div class="input-group">
                                <span class="add-on"><i class="fa fa-user"></i> </span>
                                <input type="text" name="email" class="form-control" id="email" placeholder="اسم المستخدم" >
                            </div>
                            <div>
                                @if(session('user_message'))

                                <span class="text-danger" id="user_nameErr">{{ session('user_message') }}</span>
                                @else
                                <span  id="user_nameErr"></span>
                                @endif
                            </div>

                            <div class="input-group mt-2">
                                <span class="add-on"><i class="fa fa-key"></i> </span>
                                <input type="password" name="password" class="form-control" id="loginPassword"  placeholder="كلمة المرور" >
                            </div>
                            <div>
                                <span id="loginPasswordErr" ></span>
                            </div>

                            <div class="form-check form-check-inline mt-1">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
                                <label class="form-check-label mr-1">تذكرني</label>
                            </div>

                        </div>

                        <button class="btn btn-primary btn-block shadow-none my-4" type="submit">تسجيل دخول</button>
                    </form>

                    <p class="text-center"><a class="btn-link" href="{{ route('password.request') }}">نسيت كلمة المرور؟</a></p>

                </div>
                <!-- Footer
    ============================================= -->
                <div class="col-12 fixed-bottom bg-white py-2">
                    <p class="text-center text-muted mb-0">
                        © 2021 <a href="#">Barmagiat.com</a> — <span class="lang" key="All rights reserved">جميع الحقوق محفوظة</span>
                    </p>
                </div>
                <!-- Footer End -->
            </div>
            <!-- Login Form End -->
        </div>
    </div>

</body>

</html>

<!-- JS -->

{{-- <script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js') }}"></script> --}}
