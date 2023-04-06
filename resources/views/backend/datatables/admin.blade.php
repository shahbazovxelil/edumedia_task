<script>
    var table = $('#datatable').DataTable({
        pageLength: 10,
        language: {
            url: '{{ asset('backend/js/az.json') }}'
        },
        ajax: {
            url:  '{{ route('backend.fetch.users') }}',
            type: 'GET'
        },
        serverSide: true,
        processing: true,
        aaSorting: [[0, false]],
        columns: [
            {data: 'id'},
            {data: 'name'},
            {data: 'username'},
            {data: 'email'},
            {data: 'phone'},
            {data: 'role'},
            {data: 'actions'}
        ],
        columnDefs: [
            {
                'targets':   [5,6],
                'orderable': false
            }
        ]
    })

    $(document).on('click', '.delete', function(e) {
        e.preventDefault()
        const url = $(this).attr('href')
       const xx = $(this).parent().parent();
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url:  url,
                    type: 'POST',
                    data: {_method: 'DELETE', _token: '{{ csrf_token() }}'},
                    success: function (res) {
                        if (res.success == 1) {
                                xx.remove();
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                        }
                    }
                })
            }
        })

    });
</script>

