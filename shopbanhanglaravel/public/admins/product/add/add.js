  $(function(){
    $(".tags_select_choose").select2({
    tags: true,
    tokenSeparators: [',', ',']
    })

    $(".select2_init").select2({
      placeholder: "Chọn danh mục",
      allowClear: true
    })
    var route_prefix = "/filemanager";
    $('textarea.tinymce_editor_init').ckeditor({
      height: 100,
      filebrowserImageBrowseUrl: route_prefix + '?type=Images',
      filebrowserImageUploadUrl: route_prefix + '/upload?type=Images&_token={{csrf_token()}}',
      filebrowserBrowseUrl: route_prefix + '?type=Files',
      filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token={{csrf_token()}}'
    });
  })