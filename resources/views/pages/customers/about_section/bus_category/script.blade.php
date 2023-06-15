<script>
    $.fn.extend({
        /* Delete function for service tag */
        specialDelete(){
            var val = $(this).closest('.service_tag_wrapper').find('input.service_tag_id').val();
            if(val){
                $(this).closest('.service_tag_wrapper').hide();
                $(this).closest('.form-group').find('input.st_delete').val(-1);
            }else{
                $(this).closest('.service_tag_wrapper').remove();
            }
        }
    });
    $(document).ready(function(){
        /* Initialize Select2 Elements */
        $('.select2').select2();

        /* Add More Service Tag  */
        var i = 0;
        $(".add_service_tag_btn").click(function () {
            ++i;
            var www = `<div class="row service_tag_wrapper">
                <input type="hidden" name="ff[service_tag_id]" class="service_tag_id" value="0" />
                <div class="col-sm-11">
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Service Tag</span>
                            </div>
                            <input type="text" class="form-control" name="ff[service_tag]">
                        </div>
                    </div>
                </div>
                <div class="col-sm-1">
                    <div class="form-group">
                        <input type="hidden" class="st_delete" name="st_delete">
                        <button type="button" class="btn btn-sm btn-danger" onclick="$(this).specialDelete();"><i class="fas fa-minus"></i></button>
                    </div>
                </div>
            </div>`;

            $(".service_tag_dynamic").append(www);
        });

        /* Business Category form submit event */
        var cust_id = $(`input[name="ff[cust_id]"]`).val();
        $(".business-category-form").submit(function(e){
            e.preventDefault();
            var form_data = new FormData(this);
            var service_tag_list = [];


            $(".service_tag_wrapper").each(function(){
                var $div = $(this);
                var serviceId = $div.find(`input[name="ff[service_tag_id]"]`).val();
                var serviceTags = $div.find(`input[name="ff[service_tag]"]`).val();
                var st_delete = $div.find('input.st_delete').val();
                service_tag_list.push({serviceId,serviceTags,st_delete});
            });

            if(service_tag_list){
                form_data.append('service_tag_list',JSON.stringify(service_tag_list));
            }

            $.ajax({
                url: "{{url('customer/business-category/store')}}",
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
                    location.href = "{{url('customer/business-category')}}" + "?cat_id=" + response.data.id + "&cust_id=" + cust_id;
                }
            })
        });
    });
</script>
