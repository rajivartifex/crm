<script>
$(document).ready(function(){

    var cust_id = $(`input[name="ff[cust_id]"]`).val();
    /* business contact-form submit event */
    $(".business-contact-info-form").submit(function(e){
        e.preventDefault();
        var form_data = new FormData(this);

        $.ajax({
            url: "{{url('customer/business-contact-info/store')}}",
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
                location.href = "{{url('customer/business-contact-info')}}" + "?cust_con_id=" + response.data.cust_con_id + "&cust_id=" + cust_id;
            }
        })
    });
});
</script>
