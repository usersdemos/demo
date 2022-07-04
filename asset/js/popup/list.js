$("#create_category").validate({
    rules: {
        image: {
            extension: "jpg|jpeg|png"
        }
    },
    errorElement: "span",
    errorPlacement: function (error, element) {
        error.addClass("help-block");
            error.insertAfter(element);
    },
});
$(document).on('click', '.jsSubmit', function(e){
  e.preventDefault();
    form = $('#create_category');
     var formData = new FormData(form[0]);
    if(form.valid()){
          $.ajax({
            type: 'post',
            url: base_url+'/popup/save_category',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,           
            success: function (result) {
              res = JSON.parse(result);
              if(res.success == true){
                  swal.fire({
                    title: 'Created!',
                    text: res.message,
                    timer: 5000,
                    showCancelButton: false,
                    showConfirmButton: false
                  }).then(
                     window.location.replace(base_url+"category")
                  )
              }
            }
          });
    }
});


function editPopup(id){
    $.ajax({
      type: 'POST',
      url: base_url+'/popup/edit',
      data: { id: id },         
      success: function (result) {
        res = JSON.parse(result);
        let url= "popup/template_edit";
        let html = load_template(url);
        var template = $.templates(html);
        var htmlOutput = template.render(res.data);
        $(".jsEditModel").html(htmlOutput);
        $('#exampleEditModal').modal('show');
        
      }
    });
}

$(document).on('click', '.jsEditCategory', function(e){
  e.preventDefault();
    form = $('#update_category');
     var formData = new FormData(form[0]);
    if(form.valid()){
          $.ajax({
            type: 'post',
            url: base_url+'/popup/update_category',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,           
            success: function (result) {
              res = JSON.parse(result);
              if(res.success == true){
                  swal.fire({
                    title: 'Updated!',
                    text: res.message,
                    timer: 50000,
                    showCancelButton: false,
                    showConfirmButton: false
                  }).then(
                     window.location.replace(base_url+"category")
                  )
              }
            }
          });
    }
});