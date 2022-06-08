$(document).ready(function () {
  $("#bulkDelete").change(function () {
    $("input:checkbox").prop('checked', $(this).prop("checked"));
    get_selected_ids();
  });
});

$(document).on('click', '.chk', function(event) {
    if ($('.chk:checked').length == $('.chk').length) {
      $('#bulkDelete').prop('checked', true);
    } else {
      $('#bulkDelete').prop('checked', false);
    }
    get_selected_ids();
});

function get_selected_ids(){
   var selected_ids = [];
    $('.chk:checked').each(function() {
       selected_ids.push(this.value);
    });
    $('#selected_ids').val(selected_ids.join(','));
    if($('.chk:checked').length > 0){
      $('.jsBulkDelete').prop("disabled", false);
    }else{
      $('.jsBulkDelete').prop("disabled", true);
    }    
}

function getAlert() {
    return {
        title: "Are you sure?",
        text: "You will not be able to recover this data!",
        icon: "warning",
        buttons: !0,
        dangerMode: !0,
        closeOnCancel: !0
    }
}

function load_template(url){

        let response = '';
        
        $.post({
            url: base_url + 'template/load',
            async: false,
            dataType: 'text',
            data: {
                "template-path": url
            }

        }).done(function( data ) {

            response = data;

        }).fail(function( error ) {
            
            response = error;

            console.error( 'Error! Invalid Flavor.Utils.loadData `url`: ' + url );
        });

        return response;
    
}

