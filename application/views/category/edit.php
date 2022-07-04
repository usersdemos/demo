<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
	<div class="row">
		<?php if (validation_errors()) : ?>
			<div class="col-md-12">
				<div class="alert alert-danger" role="alert">
					<?= validation_errors() ?>
				</div>
			</div>
		<?php endif; ?>
		<?php if (isset($error)) : ?>
			<div class="col-md-12">
				<div class="alert alert-danger" role="alert">
					<?= $error ?>
				</div>
			</div>
		<?php endif; ?>
		<div class="col-md-12 col-md-offset-4">
			<div class="page-header">
				<h1>Category Edit</h1>
			</div>
			<form id="update_category" method="post" enctype="multipart/form-data">
				<input type="hidden" class="form-control" id="id" name="id" placeholder="Enter a category name" required data-msg-required="Please enter category name" value="<?=$id;?>" >
				<div class="form-group row">
					<div class="col-md-4">
					<label for="category_name">Name</label>
					<input type="text" class="form-control" id="category_name" name="category_name" placeholder="Enter a category name" required data-msg-required="Please enter category name"  value="<?=$category_name;?>" remote="<?php echo base_url('category/check_category/'.$id); ?>" data-msg-remote="This category is already exists!">
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-4">
					<label for="description">Description</label>
					 <textarea class="form-control" id="description" name="description" placeholder="Enter your description" rows="3" required data-msg-required="Please enter description"><?=$description;?></textarea>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-4">
					<label for="image">Image</label>
					<input type="hidden" id="old_image" name="old_image" value="<?=$category_image;?>">
					<input type="file" class="form-control" id="image" name="image" placeholder="Enter a image" accept="image/*" data-msg-accept="Please upload file in these format only (jpg, jpeg, png)." >
					<image src="<?=base_url($category_image)?>" width="75px" height="75px">
					</div>
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-default jsSubmit" value="Submit">
				</div>
			</form>
		</div>
	</div>
</div>