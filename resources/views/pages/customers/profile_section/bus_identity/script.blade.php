<script>
$(document).ready(function(){
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
});
</script>
