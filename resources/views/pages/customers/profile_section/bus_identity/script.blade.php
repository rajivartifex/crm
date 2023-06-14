<script>
$(document).ready(function(){
    $(function () {
        $("#business-contact-info-tbl").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
        });
    });

    $(".business-identity-form").submit(function(e){
        e.preventDefault();
        var form_data = new FormData(this);

        $.ajax({
            url: "{{url('customer/business-identity/store')}}",
            type:"POST",
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: form_data,
            dataType: 'json',
            processData: false,
            success:function(response){
                console.log('success');
                location.reload();
            }
        })
    });

    $(document).on('click', '.btn-delete',function (e) {
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
        }).then(function (e) {
            if(e.isConfirmed){
                $.ajax({
                    type: "post",
                    url: url,
                    data: { id: id, _token: '{{csrf_token()}}'},
                    success: function(data){
                        Swal.fire(
                            'Deleted!',
                            'Business location contact info deleted successfully!',
                            'success'
                            )
                            setTimeout(function () {
                                location.reload(true);
                            }, 2000);
                    }
                });
            }
        })
    });
});
</script>
