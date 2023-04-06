<!DOCTYPE html>
<html lang="en">
<head>
    @include('backend.includes.meta')
    @include('backend.includes.styles')
    @yield('styles')
</head>
<body class="loading" data-layout-color="light" data-leftbar-theme="dark" data-layout-mode="fluid" data-rightbar-onstart="true">
    <div class="wrapper">
        @include('backend.includes.sidebar')
        <div class="content-page">
            <div class="content">
                @include('backend.includes.header')
                @yield('content')
            </div>
            @include('backend.includes.footer')
        </div>
    </div>
    @include('backend.includes.scripts')
    @yield('scripts')
    @include('backend.includes.notify')
</body>
</html>
