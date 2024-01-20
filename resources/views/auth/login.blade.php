

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login my project</title>
    <link rel="icon" href="{{ asset('admin/assets/images/laravel.png') }}" type="image/x-icon">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('admin/css/simplebar.css') }}">
    <link
        href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin/css/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/dropzone.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/fullcalendar.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/uppy.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/jquery.steps.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/jquery.timepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/quill.snow.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/app-light.css') }}" id="lightTheme">
    <link rel="stylesheet" href="{{ asset('admin/css/app-dark.css') }}" id="darkTheme" disabled>

    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.4/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
          integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <style>
        .append-select {
            width: 65px;
            border-top-left-radius: 0px;
            border-bottom-left-radius: 0px;
            padding-right: 0px;
        }

        .borad-right {
            border-top-right-radius: 0px;
            border-bottom-right-radius: 0px;
        }

        .padd-5 {
            padding-left: 5px !important;
            padding-right: 5px !important;
        }
    </style>
    @stack('page-styles')
</head>

<body class="light">
<div class="wrapper vh-100" style="overflow:hidden">
    <div class="row align-items-center h-100">
        <form method="POST" class="col-lg-3 col-md-4 col-10 mx-auto text-center" action="{{ route('login.action') }}" enctype="multipart/form-data">
            @csrf
            <h1 class="h6 mb-3">LARAVEL MY PROJECT</h1>
            <a class="navbar-brand mx-auto mt-2 flex-fill text-center">
                <img class="navbar-brand-img brand-md"  src="{{asset('admin/assets/images/laravel.png')}}" alt="">
            </a>
            <h1 class="h6 mb-3">Sign in</h1>
            <div class="form-group">
                <label for="inputEmail" class="sr-only">Email</label>
                <input type="email" id="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email address"
                       required="" autofocus="" autocomplete="email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                @enderror
            </div>
            <div class="form-group" style="position: relative;">
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" id="password" name="password" class="form-control form-control-lg @error('password') is-invalid @enderror"
                       placeholder="Password" required="" autocomplete="current-password">
                <i id="icon-toggle-password" class="fe fe-eye fe-24 text-black"
                   style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%); cursor: pointer;"
                   onclick="togglePasswordVisibility()"></i>
                @error('password')
                <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
                @enderror
            </div>

            <button class="btn btn-primary btn-block" type="submit">Login</button>
            <label>Create a new account !</label>
            <a type="button" href="{{route('register')}}" class="small">Register</a>
        </form>
    </div>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
    function togglePasswordVisibility() {
        const inputPass = document.getElementById("password");
        const icon = document.getElementById("icon-toggle-password");

        if (inputPass.type === "password") {
            inputPass.type = "text";
            icon.classList.remove("fe-eye");
            icon.classList.add("fe-eye-off");
        } else {
            inputPass.type = "password";
            icon.classList.remove("fe-eye-off");
            icon.classList.add("fe-eye");
        }
    }

</script>
</body>

@yield('modal')
@stack('before-scripts')
<!-- JAVA SCRIPT -->
<script src="{{ asset('admin/js/jquery.min.js') }}"></script>
<script src="{{ asset('admin/js/popper.min.js') }}"></script>
<script src="{{ asset('admin/js/moment.min.js') }}"></script>
<script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('admin/js/simplebar.min.js') }}"></script>
<script src='{{ asset('admin/js/daterangepicker.js') }}'></script>
<script src='{{ asset('admin/js/jquery.stickOnScroll.js') }}'></script>
<script src="{{ asset('admin/js/tinycolor-min.js') }}"></script>
<script src="{{ asset('admin/js/d3.min.js') }}"></script>
<script src="{{ asset('admin/js/topojson.min.js') }}"></script>
<script src="{{ asset('admin/js/datamaps.all.min.js') }}"></script>
<script src="{{ asset('admin/js/datamaps-zoomto.js') }}"></script>
<script src="{{ asset('admin/js/datamaps.custom.js') }}"></script>
<script src="{{ asset('admin/js/Chart.min.js') }}"></script>
<script src="{{ asset('admin/js/gauge.min.js') }}"></script>
<script src="{{ asset('admin/js/jquery.sparkline.min.js') }}"></script>
<script src='{{ asset('admin/js/jquery.mask.min.js') }}'></script>
<script src='{{ asset('admin/js/select2.min.js') }}'></script>
<script src='{{ asset('admin/js/jquery.steps.min.js') }}'></script>
<script src='{{ asset('admin/js/jquery.validate.min.js') }}'></script>
<script src='{{ asset('admin/js/jquery.timepicker.js') }}'></script>
<script src='{{ asset('admin/js/dropzone.min.js') }}'></script>
<script src='{{ asset('admin/js/uppy.min.js') }}'></script>
<script src='{{ asset('admin/js/quill.min.js') }}'></script>
<script src="{{ asset('admin/js/fullcalendar.js') }}"></script>

<script src="{{ asset('admin/js/fullcalendar.custom.js') }}"></script>


<script src='{{ asset('admin/js/jquery.dataTables.min.js') }}'></script>
<script src='{{ asset('admin/js/dataTables.bootstrap4.min.js') }}'></script>
<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js">
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script src="https://cdn.datatables.net/buttons/2.3.4/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.colVis.min.js"></script>

<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css"
      integrity="sha512-YFENbnqHbCRmJt5d+9lHimyEMt8LKSNTMLSaHjvsclnZGICeY/0KYEeiHwD1Ux4Tcao0h60tdcMv+0GljvWyHg=="
      crossorigin="anonymous" referrerpolicy="no-referrer"/>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/underscore@1.13.6/underscore-umd-min.js"></script>
<script
    src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
        crossorigin="anonymous"></script>
<script src="{{ asset('admin/js/apps.js') }}"></script>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>

@if(\Session::has('message'))
    @php
        $message = Session::get('message');
    @endphp
    <script>
        $(function () {
            Toast.fire({
                icon: "{{$message[1]}}",
                title: "{{$message[0]}}"
            });
        });
    </script>
@endif

@stack('page-scripts')
@stack('after-scripts')

</body>
</html>




