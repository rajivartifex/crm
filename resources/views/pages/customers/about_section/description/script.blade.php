<script>
    $(document).ready(function() {
        var cust_id = $(`input[name="ff[cust_id]"]`).val();
        /* business contact-form submit event */
        $(".business-description-form").submit(function(e) {
            e.preventDefault();
            var form_data = new FormData(this);

            $.ajax({
                url: "{{ url('customer/description/store') }}",
                type: "POST",
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: form_data,
                dataType: 'json',
                processData: false,
                success: function(response) {
                    console.log(response.data);
                    location.href = "{{ url('customer/description') }}" + "?desc_id=" + response.data.id + "&cust_id=" + cust_id;
                }
            })
        });
    });
</script>
