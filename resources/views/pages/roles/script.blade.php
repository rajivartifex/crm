<script>
    $(document).ready(function(){
        $(".roles-form").submit(function(e){
            e.preventDefault();
            var form_data = new FormData(this);

            $.ajax({
                url: "{{url('settings/roles')}}",
                type:"POST",
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: form_data,
                dataType: 'json',
                processData: false,
                success:function(response){
                    if($('input[name="ff[role_id]"]').val() == ""){
                        location.href = "{{url('/settings/roles')}}" + "/" + response.data.id + "/" +"edit";
                    }else{
                        location.reload();
                    }
                }
            })
        });
    });
</script>
