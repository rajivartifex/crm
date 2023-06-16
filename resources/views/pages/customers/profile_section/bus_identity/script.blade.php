<script>
$.fn.extend({
    /* Delete function for service tag */
    specialDelete(){
        var val = $(this).closest('.web_link_wrapper').find('input.web_id').val();
        if(val){
            $(this).closest('.web_link_wrapper').hide();
            $(this).closest('.form-group').find('input.web_delete').val(-1);
        }else{
            $(this).closest('.web_link_wrapper').remove();
        }
    }
});

$(document).ready(function(){

    /* business contact info table init */
    $(function () {
        $("#business-contact-info-tbl").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
        });
    });

    /* business about employee table init */
    $(function () {
        $("#business-about-emp-tbl").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
        });
    });

    /* business category table init */
    $(function () {
        $("#business-category-tbl").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
        });
    });

    /* business description table init */
    $(function () {
        $("#business-description-tbl").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
        });
    });

    /* business payment table init */
    $(function () {
        $("#business-payment-tbl").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
        });
    });

    /* business identity form submit event */
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

    /* common soft delete event */
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
                            'Deleted successfully!',
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

    /* Add  */
    var m = 0;
    $(".add_web_link_btn").click(function () {
        ++m;
        var media_link = `<div class="col-sm-12">
                    <div class="row web_link_wrapper align-items-end">
                        <input type="hidden" name="ff[web_id]" class="web_id" value="0" />
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label>Media Name</label>
                                <input type="text" class="form-control form-control-sm" name="ff[cust_media_name]" value="">
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label>Media Link</label>
                                <input type="text" class="form-control form-control-sm" name="ff[cust_media_link]" value="">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <input type="hidden" class="web_delete" name="web_delete">
                                <button class="btn btn-sm btn-danger" onclick="$(this).specialDelete();"><i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                    </div>
                </div>`;
        $(".media_link_dynamic").append(media_link);
    });

    var cust_id = $(`input[name="ff[cust_id]"]`).val();
    $(".business-web-form").submit(function(e){
        e.preventDefault();
        var form_data = new FormData(this);
        var media_list = [];

        $(".web_link_wrapper").each(function(){
            var $div = $(this);
            var webId = $div.find(`input[name="ff[web_id]"]`).val();
            var cust_id = $(`input[name="ff[cust_id]"]`).val();
            var cust_media_name = $div.find(`input[name="ff[cust_media_name]"]`).val();
            var cust_media_link = $div.find(`input[name="ff[cust_media_link]"]`).val();
            var web_delete = $div.find('input.web_delete').val();
            media_list.push({webId,cust_id,cust_media_name,cust_media_link,web_delete});
        });

        if(media_list){
            form_data.append('media_list',JSON.stringify(media_list));
        }

        $.ajax({
            url: "{{url('customer/web/store')}}",
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
                location.href = "{{url('customer')}}" + "?cust_id=" + cust_id;
            }
        })
    });
});
</script>
