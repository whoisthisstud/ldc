<script>
$('#areYouSure').on('show.bs.modal', function (e) {
	var button = $(e.relatedTarget); // Button that triggered the modal
	var form = button.data('form-id'); // Extract info from data-* attributes
	var object = button.data('object');
	$('#object').text(object);

	$( "#doIt" ).click(function() {
		$( "#"+form ).submit();
		// alert(form);
	});
})
</script>