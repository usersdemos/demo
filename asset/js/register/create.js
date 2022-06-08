$(document).on('click', '.jsSubmit', function(e){
  e.preventDefault();
    form = $('#register_user');
    if(form.valid()){
          form.submit();
    }
});