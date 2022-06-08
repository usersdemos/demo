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
				<h1>Product Create</h1>
			</div>
			<form action="<?=base_url('product/save_product')?>" id="create_product" method="post" enctype="multipart/form-data">

				<div class="form-group row">
					<div class="col-md-4">
					<label for="category">Category</label>
					    <select class="form-control" id="category" name="category" required data-msg-required="Please select category" >
						    <option value="">--Select Category--</option>
						    <?php foreach($categories as $category){?>
						    <option value="<?=$category['id']?>"><?=$category['category_name']?></option>
						    <?php } ?>	
					    </select>					
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-4">
					<label for="category">Categories</label>
					    <select class="js-example-basic-multiple js-states form-control" id="categories" name="categories[]" multiple="multiple" required data-msg-required="Please select category">
						    <?php foreach($categories as $category){?>
						    <option value="<?=$category['id']?>"><?=$category['category_name']?></option>
						    <?php } ?>	
					    </select>					
					</div>
				</div>													
				<div class="form-group row">
					<div class="col-md-4">
					<label for="product_name">Product Name</label>
					<input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter a product name" required data-msg-required="Please enter product name">
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-4">
					<label for="description">Price</label>
					 <input type="text" class="form-control" id="price" name="price" placeholder="Enter a price" required data-msg-required="Please enter price">
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-4">
					<label for="image">Image</label>
					<input type="file" class="form-control" id="image_name" name="image_name[]" multiple="multiple" placeholder="Enter a image" accept="image/*" data-msg-accept="Please upload file in these format only (jpg, jpeg, png)." required data-msg-required="Please enter image" data-rule-required="true">
					</div>
				</div>
				<div class="attribure">
					
				</div>				
				<div class="form-group">
					<input type="submit" class="btn btn-default jsSubmit" value="Submit">
				</div>
			</form>
		</div>
	</div>
</div>