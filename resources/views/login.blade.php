<!DOCTYPE html>

<html lang="en">

<head>
    <base href="../../../" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login ENIGMA</title>
    <link rel="shortcut icon" href="{{asset('media/logos/favicon.ico')}}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link href="{{asset('dist/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('dist/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
</head>

<body id="kt_body" class="app-blank app-blank bgi-size-cover bgi-position-center bgi-no-repeat">

    <script>
        var defaultThemeMode = "light";
        var themeMode;
        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-theme-mode");
            } else {
                if (localStorage.getItem("data-theme") !== null) {
                    themeMode = localStorage.getItem("data-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
            document.documentElement.setAttribute("data-theme", themeMode);
        }
    </script>
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <style>
            body {
                background-image: url("{{asset('img/bg1.jpg')}}");
            }

            [data-theme="dark"] body {
                background-image: url("{{asset('img/bg1.jpg')}}");
            }
        </style>
        <div class="d-flex flex-column flex-column-fluid flex-lg-row">
            <div class="d-flex flex-center w-lg-50 pt-15 pt-lg-0 px-10">
                <div class="d-flex flex-center flex-lg-start flex-column">
                    <a href="../../demo1/dist/index.html" class="mb-7">

                    </a>
                    <!-- <h2 class="text-white fw-normal m-0">EARLY MONITORING CASEMIX PLAN</h2> -->
                </div>
            </div>
            <!--begin::Body-->
            <div class="d-flex flex-center w-lg-50 p-5">
                <!--begin::Card-->
                <div class="card rounded-3 w-md-550px">
                    <!--begin::Card body-->
                    <div class="card-body p-10 p-lg-20">
                        <!--begin::Form-->
                        <!--begin::Heading-->
                        <div class="text-center mb-11">
                            <!--begin::Title-->
                            <img alt="Logo" src="{{asset('img/ENIGMA ICON 2.png')}}" class="h-150px"> </img><br><br>
                            <h1 class="text-dark fw-bolder mb-3">Sign In</h1>
                            <!--end::Title-->
                            <!--begin::Subtitle-->
                            <div class="text-gray-500 fw-semibold fs-6">Silahkan Login Dengan Akun Anda</div>
                            <!--end::Subtitle=-->
                        </div>
                        <!--begin::Heading-->
                        <!--begin::Input group=-->
                        <div class="fv-row mb-8">
                            <!--begin::Email-->
                            <input type="text" placeholder="Username" name="email" autocomplete="off" class="form-control bg-transparent" id="uname" />
                            <!--end::Email-->
                        </div>
                        <!--end::Input group=-->
                        <div class="fv-row mb-3">
                            <!--begin::Password-->
                            <input type="password" placeholder="Password" name="password" autocomplete="off" class="form-control bg-transparent" id="pwd" />
                            <!--end::Password-->
                        </div>
                        <!--end::Input group=-->
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                            <div></div>
                        </div>
                        <!--end::Wrapper-->
                        <!--begin::Submit button-->
                        <div class="d-grid mb-10">
                            <button type="submit" id="kt_sign_in_submit" class="btn btn-primary" onclick="login()">
                                <!--begin::Indicator label-->
                                <span class="indicator-label">Sign In</span>
                                <!--end::Indicator label-->
                                <!--begin::Indicator progress-->
                                <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                <!--end::Indicator progress-->
                            </button>
                        </div>
                        <!--end::Submit button-->
                        <!--end::Form-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Body-->
        </div>
        <!-- jQuery -->

        <!--begin::Global Javascript Bundle(mandatory for all pages)-->
        <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <!-- <script src="{{asset('dist/plugins/global/plugins.bundle.js')}}"></script> -->
        <!-- <script src="{{asset('dist/js/scripts.bundle.js')}}"></script> -->
        <!--end::Global Javascript Bundle-->
        <!--begin::Custom Javascript(used for this page only)-->
        <!-- <script src="{{asset('js/custom/authentication/sign-in/general.js')}}"></script> -->
        <!--end::Custom Javascript-->
        <!--end::Javascript-->

        <!-- <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
    
        <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
      
        <script src="{{asset('dist/js/adminlte.min.js')}}"></script> -->
        <script>
            function login() {
                var username = $('#uname').val()
                var pwd = $('#pwd').val()
                $.ajax({
                    url: "{{route('fungsilogin')}}",
                    type: 'post',
                    dataType: "JSON",
                    data: {
                        username: username,
                        pwd: pwd,
                        "_token": "{{csrf_token()}}",
                    },
                    success: function(res) {
                        if (res == 'nonmanajemen') {
                            window.location.href = "{{ route('dash') }}";
                            //alert();
                        } else if (res == 'manajemenrs') {
                            window.location.href = "{{ route('dashmanajemenrs') }}";
                        } else if (res == 'manajemennmu') {
                            window.location.href = "{{ route('dashmanajemennmu') }}";
                        } else if (res == 'kasir') {
                            window.location.href = "{{ route('indexkasir') }}";
                        }else {
                            window.location.href = "{{ ('/') }}";
                        }
                    }
                })
            };
        </script>
        <script>
            $(document).keypress(function(event) {
                if (event.key === "Enter") {
                    var username = $('#uname').val()
                    var pwd = $('#pwd').val()
                    $.ajax({
                        url: "{{route('fungsilogin')}}",
                        type: 'post',
                        dataType: "JSON",
                        data: {
                            username: username,
                            pwd: pwd,
                            "_token": "{{csrf_token()}}",
                        },
                        success: function(res) {
                            if (res == 'nonmanajemen') {
                                window.location.href = "{{ route('dash') }}";
                                //alert();
                            } else if (res == 'manajemenrs') {
                                window.location.href = "{{ route('dashmanajemenrs') }}";
                            } else if (res == 'manajemennmu') {
                                window.location.href = "{{ route('dashmanajemennmu') }}";
                            } else {
                                window.location.href = "{{ ('/') }}";
                            }
                        }
                    })
                }
            });
        </script>
</body>

</html>