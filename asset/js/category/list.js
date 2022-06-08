$(document).ready(function(){
$('#category_list').DataTable({
      'order': [[1, 'asc']],	      	
		"processing": true,
		"serverSide": true,
		responsive: true,
		"ajax": base_url+'category/get_category_list',

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
	      url: base_url+'/category/delete_category',
	      data:{"ids":ids},
	      dataType: "json",          
	      success: function (res) {
	      	Swal.fire(res.message, '', 'success');
	      	setTimeout(function() {
			   $("#category_list").dataTable().fnDraw();
			}, 3000);
	      }
	  }); 
	  }
	});

});
