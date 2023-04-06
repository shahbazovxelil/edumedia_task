<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Log In | Hyper - Responsive Bootstrap 5 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('backend/images/favicon.ico')}}">

    <!-- App css -->
    <link href="{{asset('backend/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('backend/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-style"/>
    <link href="{{asset('backend/css/iziToast.min.css')}}" rel="stylesheet" type="text/css" id="app-style"/>

</head>

<body class="loading authentication-bg" data-layout-config='{"darkMode":false}'>
<div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xxl-4 col-lg-5">
                <div class="card">

                    <!-- Logo -->
                    <div class="card-header pt-4 pb-4 text-center bg-primary">
                        <a href="index.html">
                            <span><img src="{{asset('backend/images/logo.png')}}" alt="" height="18"></span>
                        </a>
                    </div>
                    <div class="card-body p-4">
{{--                        @if (session()->has('error'))--}}
{{--                            <div class="text-danger">{{session('error')}}</div>--}}
{{--                        @endif--}}

                        <form action="{{ route('backend.login') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input class="form-control" type="email" name="email" value="{{ old('email') }}"  placeholder="Enter your email">
                                @error('email')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" name="password" class="form-control" value="{{ old('password') }}" placeholder="Enter your password">

                                    <div class="input-group-text" data-password="false">
                                        <span class="password-eye"></span>
                                    </div>
                                </div>
                                @error('password')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3 mb-0 text-center">
                                <button  class="btn btn-primary" > Log In </button><br><br>
                                <a  class="btn btn-primary" href="{{route('backend.register')}}" >Register </a>

                            </div>


                        </form>
                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->


                <!-- end row -->

            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>

<!-- bundle -->
<script src="{{asset('backend/js/vendor.min.js')}}"></script>
<script src="{{asset('backend/js/app.min.js')}}"></script>
<script src="{{ asset('backend/js/iziToast.min.js') }}"></script>
@include('backend.includes.notify')
</body>
</html>
