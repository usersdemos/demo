  $(document).ready(function() {
      $('.js-example-basic-multiple').select2();
      jQuery.validator.addMethod("dollarsscents", function(value, element) {
          return this.optional(element) || /^\d{0,4}(\.\d{0,2})?$/i.test(value);
      }, "You must include two decimal places");

      $("#create_product").validate({
        rules: {
            images: {
                extension: "jpg|jpeg|png"
            },
            price: {
                required: true,
                dollarsscents: true
            }                
        },
        errorElement: "span",
        errorPlacement: function (error, element) {
            error.addClass("help-block");
                error.insertAfter(element);
        },
        submitHandler: function (form) { // for demo
            return false;
        }        
    });
    
    add_attribute();

  });

$(document).on('click', '.jsSubmit', function(e){
  e.preventDefault();
    form = $('#create_product');
     var formData = new FormData(form[0]);
    if(form.valid()){
          $.ajax({
            type: 'post',
            url: base_url+'/product/save_product',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,           
            success: function (result) {
              res = JSON.parse(result);
              if(res.success == true){
                window.location.replace(base_url+"product");
              }else{
                $(".print-error-msg").removeClass('d-none');
                $(".print-error-msg").html(res.error);
              }
            }
          });
    }
});

var index = 1;
$("body").on("click",".add-more",function(){ 
    index++;
    var html = $("#attribute1").first().clone().attr('id', 'attribute' + index);
    $(html).find(".change").html("<label for=''>&nbsp;</label><br/><a class='btn btn-danger remove'>- Remove</a>");
    $(html).find('.jsAttribute').attr('name','attribute['+index+']');
    $(html).find('.jsSubAttribute').attr('name','sub_attribute['+index+']');
    $(html).find('.jsAttributeValue').attr('name','value['+index+']');
    $(".after-add-more").last().after(html);
});

$("body").on("click",".remove",function(){ 
    $(this).parents(".after-add-more").remove();
});


function add_attribute(){
    $.ajax({
      type: 'post',
      url: base_url+'/product/get_attribute',
      data: { index: index},
      success: function (result) {
        res = JSON.parse(result); 
        let url= "product/template/attribute_add_more";
        let html = load_template(url);
        var template = $.templates(html);
        var htmlOutput = template.render(res);
        $(".attribure").html(htmlOutput);
      }
    });
}


$(document).on('change', '.jsAttribute', function(e){
  e.preventDefault();
    var div_id = $(this).closest('.after-add-more').attr("id");
    form = $('#create_product');
    get_sub_attribute($(this).val(),div_id);
});


function get_sub_attribute(id,div_id){
    var div = $('#'+div_id);
    var tmp_data =[{'id': '','name': '---Select Sub Attribute---','custom': ''}];
    $.ajax({
      type: 'POST',
      url: base_url+'/product/get_sub_attribute',
      data: { id: id },         
      success: function (result) {
        res = JSON.parse(result);
        $.each(res.sub_attribute, function(key, value) {
            var res_data = {
                'id': value.id,
                'name': value.sub_attribute_name,
                'custom': '',
            }
            tmp_data.push(res_data);
        });
        let url= "template/template_dropdown";
        let html = load_template(url);
        var template = $.templates(html);
        var htmlOutput = template.render(tmp_data);
        $(".jsSubAttribute",div).html(htmlOutput);
        $(".jsAttributeValue",div).val('');
      }
    });
}

$(document).on('change', '.jsSubAttribute', function(e){
  e.preventDefault();
  var div_id = $(this).closest('.after-add-more').attr("id");
  get_attribute_value($(this).val(),div_id);
});

function get_attribute_value(id,div_id){
  var div = $('#'+div_id);
    $.ajax({
      type: 'POST',
      url: base_url+'/product/get_attribute_value',
      data: { id: id },         
      success: function (result) {
        res = JSON.parse(result);
        if(res.value !=""){
          $(".jsAttributeValue",div).val(res.value);
        }else{
          $(".jsAttributeValue",div).val('');
        }
      }
    });
}



