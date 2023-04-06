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
{{--                        @can('admins-create')--}}
                        <div class="d-flex justify-content-end">
                            <a href="{{route('backend.users.create')}}" class="btn btn-success mb-2 text-end"><i class="mdi mdi-plus-circle me-2"></i>User əlavə et</a>

                        </div>
{{--                        @endcan--}}
                        <div class="tab-content">
                            <div class="tab-pane show active" id="basic-datatable-preview">
                                <table id="datatable" class="table table-striped dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>UserName</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Role</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div> <!-- end preview-->
                        </div> <!-- end tab-content-->
                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
    </div>
@endsection
@section('styles')
    <link href="{{ asset('backend/css/vendor/dataTables.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/css/vendor/responsive.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/css/vendor/buttons.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/css/vendor/select.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/css/vendor/fixedHeader.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/css/vendor/fixedColumns.bootstrap5.css') }}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/sweetalert.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/datatables.bundle.css') }}">
    <link href="{{asset('backend/css/iziToast.min.css')}}" rel="stylesheet" type="text/css">

@endsection
@section('scripts')
    <script src="{{ asset('backend/js/vendor/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/js/vendor/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('backend/js/vendor/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('backend/js/vendor/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('backend/js/vendor/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('backend/js/vendor/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('backend/js/vendor/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('backend/js/vendor/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('backend/js/vendor/buttons.print.min.js') }}"></script>
    <script src="{{ asset('backend/js/vendor/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('backend/js/vendor/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('backend/js/vendor/fixedColumns.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('backend/js/vendor/fixedHeader.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('backend/js/pages/demo.datatable-init.js') }}"></script>

    <!-- Sweet-Alert  -->
    <script src="{{ asset('backend/js/datatables.bundle.js') }}"></script>
    <script src="{{ asset('backend/js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('backend/js/iziToast.min.js') }}"></script>

    @include('backend.datatables.admin')

@endsection
