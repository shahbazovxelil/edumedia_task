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
                        <form action="{{route('backend.register')}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input class="form-control" type="text" name="name" value="{{ old('name') }}"  placeholder="Enter your name">
                                @error('name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input class="form-control" type="text" name="username" value="{{ old('username') }}"  placeholder="Enter your username">
                                @error('username')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email </label>
                                <input class="form-control" type="email" name="email" value="{{ old('email') }}"  placeholder="Enter your email">
                                @error('email')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input class="form-control" type="text" name="phone" value="{{ old('phone') }}"  placeholder="Enter your phone">
                                @error('phone')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input class="form-control" type="password" name="password" value="{{ old('password') }}"  placeholder="Enter your password">
                                @error('password')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password2" class="form-label">Password confirmation</label>
                                    <input type="password" name="password_confirmation" class="form-control" value="{{ old('password') }}" placeholder="Enter your password">
                                    @error('password')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror

                            </div>


                            <div class="mb-3 mb-0 text-center">
                                <button  class="btn btn-primary" >Regsiter </button><br><br>
                                <a  class="btn btn-primary" href="{{route('backend.login')}}" >Login </a>
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
