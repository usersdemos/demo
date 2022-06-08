$(document).ready(function(){
$('#product_list').DataTable({
      'order': [[1, 'asc']],	      	
		"processing": true,
		"serverSide": true,
		responsive: true,
		"ajax": base_url+'product/get_product_list',
		});

});

$(document).on('click', '.jsDelete', function(event) {
	if($(this).attr('data-id') != ''){
		var ids = $(this).attr('data-id');
	}else{
		var ids = $('#selected_ids').val();
	}
	swal.fire(getAlert()).then((result) => {
	  if (result.isConfirmed) {
		$.ajax({
	      type: 'post',
	      url: base_url+'/product/delete_product',
	      data:{"ids":ids},
	      dataType: "json",          
	      success: function (res) {
	      	Swal.fire(res.message, '', 'success');
	      	setTimeout(function() {
			   $("#product_list").dataTable().fnDraw();
			}, 3000);
	      }
	  }); 
	  }
	});

});