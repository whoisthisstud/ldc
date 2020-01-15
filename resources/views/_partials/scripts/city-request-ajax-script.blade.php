<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$('#cityRequestForm').on('submit', function (e) {
    e.preventDefault();
    var state_id = $('#state_id').val();
    var city_name = $('#city_name').val();
    var _token = $('input[name="_token"]').val();

    $.ajax({
        type: 'POST',
        url: '{{ route('petition.city') }}',
        data: {"_token":_token, "city_name":city_name, "state_id":state_id},
        success: function (data) {
            // alert(data['success']);

            $('#cityRequestFormModal').modal('hide');
            $('.navbar-toggler').click();
            $("#cityRequestForm")[0].reset();
            toastr.success(data['success'], "City Request Submitted");
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
