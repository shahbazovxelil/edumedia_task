@extends('layouts.backend')
@section('title', 'Dashboard')
@section('content')


  <p>İki növ istifadəçi var. <b>Admin</b> və <b>User</b></p>
  <p><b>User</b>  - Sadəcə məlumatları görə bilir, buttonları görür ama deaktivdir User üçün.</p>
  <p><b>Admin</b> - Həm  məlumatları görür, həm də onu dəyişdirə, silə və yeni İstifadəçi əlavə edə bilər</p>
@endsection
@section('styles')
    <link href="{{asset('backend/css/iziToast.min.css')}}" rel="stylesheet" type="text/css">
@endsection
@section('scripts')
    <script src="{{asset('backend/js/pages/demo.dashboard.js')}}"></script>
    <script src="{{ asset('backend/js/iziToast.min.js') }}"></script>

@endsection
