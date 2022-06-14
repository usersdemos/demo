<div class="container">
		
<div class="row">
	
<div class="col-md-12">
<div class="page-header clearfix">
<h2 class="pull-left">popup List</h2>
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
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Add
</button>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleEditModal" onclick="editPopup('14');" >
  edit
</button>


<button type="button" disabled class="btn btn-danger jsBulkDelete jsDelete" data-id="">edit</button>
</div>
</div>
</div>        
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       			<form id="create_category" method="post" enctype="multipart/form-data">
							<div class="form-group row">
								
								<label class="col-12 col-sm-3 col-form-label" for="category_name">Name</label>
								<div class="col-12 col-sm-9">
								<input type="text" class="form-control" id="category_name" name="category_name" placeholder="Enter a category name" required data-msg-required="Please enter category name">
								</div>
							</div>
							<div class="form-group row">
								
								<label class="col-12 col-sm-3 col-form-label" for="description">Description</label>
								<div class="col-12 col-sm-9">
								 <textarea class="form-control" id="description" name="description" placeholder="Enter your description" rows="3" required data-msg-required="Please enter description"></textarea>
								</div>
								
							</div>
							<div class="form-group row">
							
								<label class="col-12 col-sm-3 col-form-label" for="image">Image</label>
								<div class="col-12 col-sm-9">
								<input type="file" class="form-control" id="image" name="image" placeholder="Enter a image" accept="image/*" data-msg-accept="Please upload file in these format only (jpg, jpeg, png)." required data-msg-required="Please enter image" data-rule-required="true">
								</div>
							</div>
							<div class="modal-footer">
							        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							        <button type="submit" class="btn btn-primary jsSubmit">Save changes</button>
							</div>							
				</form>
      </div>
    </div>
  </div>
</div>



<!-- model edit -->
<div class="modal fade" id="exampleEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      </div>
    </div>
  </div>
</div>