<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$('#businessRequestForm').on('submit', function (e) {
    e.preventDefault();
    var cityID = $('#city_id').val();
    var bizName = $('#business').val();
    var _token = $('input[name="_token"]').val();

    $.ajax({
        type: 'POST',
        url: '{{ route('petition.business') }}',
        data: {"_token":_token, "city_id":cityID, "business":bizName},
        success: function (data) {
            // alert(data['success']);

            $('#businessRequestFormModal').modal('hide');
            $('.navbar-toggler').click();
            $("#businessRequestForm")[0].reset();
            toastr.success(data['success'], "Business Request Submitted", {
                "timeOut": "4000"
            });
        },
        error: function(jqXhr, json, errorThrown){// this are default for ajax errors
            var errors = jqXhr.responseJSON;
            $('.error-text').hide();
            $.each(errors['errors'], function (index, value) {
                $('#'+index+'Error').show().text(value);
            });
        }
    });
});
</script>
