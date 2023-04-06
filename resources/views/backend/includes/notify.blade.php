
@if (session()->has('success'))
    <script>
        iziToast.success({
            title:    'Uğurlu',
            message:  '{{ session('success') }}',
            position: 'topRight'
        });
    </script>
@endif

@if (session()->has('error'))
    <script>
        iziToast.error({
            title:    'Xəta',
            message:  '{{ session('error') }}',
            position: 'topRight'
        });
    </script>
@endif

@if (session()->has('warning'))
    <script>
        iziToast.warning({
            title:    'Diqqət',
            message:  '{{ session('warning') }}',
            position: 'topRight'
        });
    </script>
@endif
