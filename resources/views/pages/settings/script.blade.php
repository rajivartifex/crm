<script>
    $(document).ready(function() {

        $(document).on('click', '.btn-delete', function(e) {
            e.preventDefault();
            var id = $(this).attr('data-id');
            var url = $(this).attr('data-redirect-url');
            swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(function(e) {
                if (e.isConfirmed) {
                    $.ajax({
                        type: "post",
                        url: url,
                        data: {
                            id: id,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(data) {
                            Swal.fire(
                                'Deleted!',
                                'Deleted successfully!',
                                'success'
                            )
                            setTimeout(function() {
                                location.reload(true);
                            }, 2000);
                        }
                    });
                }
            })
        });

        $(function() {
            $("#business-payment-type-tbl").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
            });
        });

        $(".payment-modal-form").submit(function(e) {
            e.preventDefault();
            var form_data = new FormData(this);

            $.ajax({
                url: "{{ url('settings/payment-store') }}",
                type: "POST",
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: form_data,
                dataType: 'json',
                processData: false,
                success: function(response) {
                    location.href = "{{ url('settings/payment-form') }}" + "?pay_id=" +
                        response.data.id;
                }
            })
        });

        $(function() {
            $("#solution-tbl").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
            });
        });

        $(".solution-modal-form").submit(function(e) {
            e.preventDefault();
            var form_data = new FormData(this);

            $.ajax({
                url: "{{ url('settings/solution-store') }}",
                type: "POST",
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: form_data,
                dataType: 'json',
                processData: false,
                success: function(response) {
                    location.href = "{{ url('settings/solution-form') }}" + "?sol_id=" +
                        response.data.id;
                }
            })
        });

        $(function() {
            $("#payment-mode-tbl").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
            });
        });

        $(".payment-mode-modal-form").submit(function(e) {
            e.preventDefault();
            var form_data = new FormData(this);

            $.ajax({
                url: "{{ url('settings/paymentmode-store') }}",
                type: "POST",
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: form_data,
                dataType: 'json',
                processData: false,
                success: function(response) {
                    location.href = "{{ url('settings/paymentmode-form') }}" +
                        "?pay_mode_id=" + response.data.id;
                }
            })
        });

        $(function() {
            $("#marketing-tbl").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
            });
        });

        $(".marketing-modal-form").submit(function(e) {
            e.preventDefault();
            var form_data = new FormData(this);

            $.ajax({
                url: "{{ url('settings/marketing-store') }}",
                type: "POST",
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: form_data,
                dataType: 'json',
                processData: false,
                success: function(response) {
                    location.href = "{{ url('settings/marketing-form') }}" + "?mark_id=" +
                        response.data.id;
                }
            })
        });

        $(function() {
            $("#category-type-tbl").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
            });
        });

        $(".category-modal-form").submit(function(e) {
            e.preventDefault();
            var form_data = new FormData(this);

            $.ajax({
                url: "{{ url('settings/category-store') }}",
                type: "POST",
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: form_data,
                dataType: 'json',
                processData: false,
                success: function(response) {
                    location.href = "{{ url('settings/category-form') }}" +
                        "?category_id=" + response.data.id;
                }
            })
        });
    });
</script>
