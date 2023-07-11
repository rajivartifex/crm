<script>
    $(document).ready(function(){
         /* Initialize Select2 Elements */
         $('.select2').select2();

         $(".users-form").submit(function(e){
            e.preventDefault();
            var form_data = new FormData(this);

            $.ajax({
                url: "{{url('settings/users')}}",
                type:"POST",
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: form_data,
                dataType: 'json',
                processData: false,
                success:function(response){
                    if($('input[name="ff[user_id]"]').val() == ""){
                        location.href = "{{url('/settings/users')}}" + "/" + response.data.id + "/" +"edit";
                    }else{
                        location.reload();
                    }
                }
            })
        });
    });
</script>
