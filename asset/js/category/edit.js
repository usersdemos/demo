   $("#update_category").validate({
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
    form = $('#update_category');
     var formData = new FormData(form[0]);
    if ((!form.valid())) {
        return false;
    }     
    if(form.valid()){
          $.ajax({
            type: 'post',
            url: base_url+'/category/update_category',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,           
            success: function (result) {
              res = JSON.parse(result);
              if(res.success == true){
                window.location.replace(base_url+"category");
              }else{
                $(".print-error-msg").removeClass('d-none');
                $(".print-error-msg").html(res.error);
              }
            }
          });
    }
});