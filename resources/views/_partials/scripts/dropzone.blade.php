<script src="{{ asset('vendors/dropzone/dropzone.js') }}"></script>
<script>
  var uploadedDocumentMap = {}
  Dropzone.options.documentDropzone = {
    url: '{{ route('store.media') }}',
    maxFilesize: 10, // MB
    addRemoveLinks: true,
    // previewsContainer: '#review_samples',
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    success: function (file, response) {
        $('form').append('<input type="hidden" name="image[]" value="' + response.name + '">')
        uploadedDocumentMap[file.name] = response.name        
       // $(".dz-image").clone().appendTo($("#review_samples"))
        $("#review_samples").empty()
        $(".dz-image").each(function(i) {
            $('#review_samples').append('<div class="previews"></div>');
            var $content = $('.previews').eq(i);
            $(this).clone().appendTo($content);
        })
    },
    error: function(file, response) {
        alert(response);
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedDocumentMap[file.name]
      }
      $('form').find('input[name="image[]"][value="' + name + '"]').remove()
    },
    init: function () {
      @if(isset($city) && $city->image)
        var files =
          {!! json_encode($city->image) !!}
        for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          file.previewElement.classList.add('dz-complete')
          file.previewElement.classList.add('dz-preview')
          $('form').append('<input type="hidden" name="image[]" value="' + file.file_name + '">')
          
        }
      @endif
    }
  }
</script>