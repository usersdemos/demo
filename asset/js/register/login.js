$(document).on('click', '.jsSubmit', function(e){
  e.preventDefault();
    form = $('#login_user');
    if(form.valid()){
          form.submit();
    }
});