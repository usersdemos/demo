<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
	<div class="row">

		<div class="col-md-12">
			<div class="alert alert-danger print-error-msg d-none" role="alert">
				<?= validation_errors() ?>
			</div>
		</div>
		<div class="col-md-12 col-md-offset-4">
			<div class="page-header">
				<h1>Category Create</h1>
			</div>
			<form action="<?=base_url('category/save_category')?>" id="create_category" method="post" enctype="multipart/form-data">
				<div class="form-group row">
					<div class="col-md-4">
					<label for="category_name">Name</label>
					<input type="text" class="form-control" id="category_name" name="category_name" placeholder="Enter a category name" required data-msg-required="Please enter category name" remote="<?php echo base_url(); ?>category/check_category" data-msg-remote="This category is already exists!">
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-4">
					<label for="description">Description</label>
					 <textarea class="form-control" id="description" name="description" placeholder="Enter your description" rows="3" required data-msg-required="Please enter description"></textarea>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-4">
					<label for="image">Image</label>
					<input type="file" class="form-control" id="image" name="image" placeholder="Enter a image" accept="image/*" data-msg-accept="Please upload file in these format only (jpg, jpeg, png)." required data-msg-required="Please enter image" data-rule-required="true">
					</div>
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-default jsSubmit" value="Submit">
				</div>
			</form>
		</div>
	</div>
</div>