@extends('layouts.backend')
@section('title', 'Admins')
@section('content')
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                            <li class="breadcrumb-item active">Form Elements</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Form Elements</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="tab-content">
                            <div class="tab-pane show active" id="input-types-preview">
                                <div class="row">
                                    <div class="col-lg-8 offset-lg-2">

                                        <form action="{{route('backend.users.store')}}" method="POST">
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
                                                <label for="example-email" class="form-label">Role</label>
                                                <select name="role"  class="form-control" >
                                                        <option  value="admin">Admin</option>
                                                        <option  value="user">User</option>
                                                </select>
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
                                                <button  class="btn btn-primary" > Create </button>
                                            </div>


                                        </form>

                                    </div>
                                </div>
                                <!-- end row-->
                            </div> <!-- end preview-->

                        </div> <!-- end tab-content-->
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div>
@endsection
@section('styles')
    <link href="{{asset('backend/css/iziToast.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('backend/css/vendor/select2.min.css')}}" rel="stylesheet" type="text/css">
@endsection
@section('scripts')
    <script src="{{ asset('backend/js/iziToast.min.js') }}"></script>
    <script src="{{ asset('backend/js/vendor/select2.min.js') }}"></script>

@endsection


