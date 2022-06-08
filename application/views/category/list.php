<div class="container">
		
<div class="row">
	
<div class="col-md-12">
<div class="page-header clearfix">
<h2 class="pull-left">Category List</h2>
</div>
<?php if($this->session->flashdata('message') != ""){ ?>
<div class="alert alert-success alert-dismissible" role="alert">
  <?=$this->session->flashdata('message');?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php } ?>
<div class="col-md-12 text-right">
<a type="button" class="btn btn-success" href="<?=base_url('category/create')?>">Add</a>
<button type="button" disabled class="btn btn-danger jsBulkDelete jsDelete" data-id="">Delete</button>
</div>
<input type="hidden" name="selected_ids" id="selected_ids" value="" >
<table id="category_list" class="display gridTable" style="width:100%">
	<thead>
		<tr>
			<th data-priority='0' data-orderable="false" class="text-secondary py-3" >
        <input type="checkbox" id="bulkDelete">
      </th>
			<th data-priority='1'>Category name</th>
			<th data-priority='2'>Description</th>
			<th data-priority='3'>Image</th>
			<th data-priority='4'>Date</th>
			<th data-priority='1'>Action</th>
		</tr>
	</thead>
</table>
</div>
</div>        
</div>
