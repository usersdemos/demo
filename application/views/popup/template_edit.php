<form id="update_category" method="post" enctype="multipart/form-data">

		<input type="hidden" class="form-control" id="id" name="id" placeholder="Enter a category name" required data-msg-required="Please enter category name" value="{{:id}}">

		<div class="form-group row">
			<label class="col-12 col-sm-3 col-form-label" for="category_name">Name</label>
			<div class="col-12 col-sm-9">
				<input type="text" class="form-control" id="category_name" name="category_name" placeholder="Enter a category name" required data-msg-required="Please enter category name" value="{{:category_name}}">
			</div>
		</div>

		<div class="form-group row">
			<label class="col-12 col-sm-3 col-form-label" for="description">Description</label>
			<div class="col-12 col-sm-9">
			 	<textarea class="form-control" id="description" name="description" placeholder="Enter your description" rows="3" required data-msg-required="Please enter description">{{:description}}</textarea>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-12 col-sm-3 col-form-label" for="image">Image</label>
			<div class="col-12 col-sm-9">
				<input type="file" class="form-control" id="image" name="image" placeholder="Enter a image" accept="image/*" data-msg-accept="Please upload file in these format only (jpg, jpeg, png)." >
				<image src="<?=base_url()?>{{:category_image}}" width="75px" height="75px">
			</div>
		</div>

		<div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="submit" class="btn btn-primary jsEditCategory">Save changes</button>
		</div>							
</form>
      