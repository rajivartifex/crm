<script>
    $(document).ready(function(){
        /* Initialize Select2 Elements */
        $('.select2').select2();

        /* Business subscription form submit event */
        var cust_id = $(`input[name="ff[cust_id]"]`).val();
        $(".business-support-form").submit(function(e){
            e.preventDefault();
            var form_data = new FormData(this);

            $.ajax({
                url: "{{url('customer/support/store')}}",
                type:"POST",
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: form_data,
                dataType: 'json',
                processData: false,
                success:function(response){
                    console.log(response.data);
                    location.href = "{{url('customer/support')}}" + "?sp_id=" + response.data.id + "&cust_id=" + cust_id;
                }
            })
        });
    });
</script>
