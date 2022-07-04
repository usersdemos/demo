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
				<h1>Product Edit</h1>
			</div>
			<form id="update_product" method="post" enctype="multipart/form-data">
				<input type="hidden" id="product_id" name="product_id" value="<?=$id;?>">
				<div class="form-group row">
					<div class="col-md-4">
					<label for="category">Category <?=$category_id?></label>
					    <select class="form-control" id="category" name="category" required data-msg-required="Please select category" >
						    <option value="">--Select Category--</option>
						    <?php foreach($categories as $category){ ?>
						    <option value="<?=$category['id']?>" <?php if($category_id ==$category['id']){?> selected <?php } ?>><?=$category['category_name']?></option>
						    <?php } ?>	
					    </select>					
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-4">
					<label for="category">Categories</label>
						<?php $selected_categories = explode(',',$category_ids)?>
					    <select class="js-example-basic-multiple js-states form-control" id="categories" name="categories[]" multiple="multiple" required data-msg-required="Please select category">
						    <?php foreach($categories as $category){?>
						    <option value="<?=$category['id']?>" <?php if(in_array($category['id'],$selected_categories)){?> selected <?php } ?>><?=$category['category_name']?></option>
						    <?php } ?>	
					    </select>					
					</div>
				</div>													
				<div class="form-group row">
					<div class="col-md-4">
					<label for="product_name">Product Name</label>
					<input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter a product name" required data-msg-required="Please enter product name" value="<?=$product_name;?>">
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-4">
					<label for="description">Price</label>
					 <input type="text" class="form-control" id="price" name="price" placeholder="Enter a price" required data-msg-required="Please enter price" value="<?=$price;?>">
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-4">
					<label for="image">Image</label>
					<input type="file" class="form-control" id="image_name" name="image_name[]" multiple="multiple" placeholder="Enter a image" accept="image/*" data-msg-accept="Please upload file in these format only (jpg, jpeg, png).">
					<?php 
					$product_images = explode(',',$product_image);
					foreach($product_images as $img){ ?>
						<image src="<?=base_url($img)?>" width="75px" height="75px">
						<input type="hidden" id="old_image" name="old_image[]" value="<?=$img;?>">
					<?php } ?>
					
					</div>
				</div>
<!-- start: Product attribute -->
			<?php foreach($attributes as $key => $attributes){ 
				$index = 1+$key++;
			?>
				<div class="after-add-more" id="attribute<?=$index;?>">
				        <input type="hidden" id="product_attribute_id" name="product_attribute_id[<?=$index;?>]" value=""/>                   
				        <div class="form-group row">
				        	<div class="col-md-4">
					            <label class="control-label">Attribute</label>
					            <select class="form-control jsAttribute" id="attribute" name="attribute[<?=$index;?>]" required data-msg-required="Please select attribute" >
				                    <option value="">--Select Attribute--</option>
				                </select>
				        	</div>
				        </div>
				        <div class="form-group row">
				        	<div class="col-md-4">
					            <label class="control-label">Sub Attribute</label>
					            <input type="hidden" id="hidden_sub_attribute_val" value="" />
					            <select class="form-control jsSubAttribute" id="sub_attribute" name="sub_attribute[<?=$index;?>]" required data-msg-required="Please select sub attribute" >
				                    <option value="">--Select Sub Attribute--</option> 
				                </select>
				            </div>
				        </div>
				        <div class="form-group row">
				        	<div class="col-md-4">
				            	<label class="control-label">Value</label>
				            	<input type="hidden" id="hidden_val" value="" />
				            	<input maxlength="200" type="text" id="value" name="value[<?=$index;?>]" class="form-control jsAttributeValue" placeholder="Enter value" required data-msg-required="Please enter value" />
				            </div>
				        </div>
				        <div class="form-group row change">
				        	<?php if($key == 1 ){ ?>
					            <label for="">&nbsp;</label>
					            <a class="btn btn-success add-more">+ Add More</a>
				        	<?php }else{ ?>
				        		<label for=''>&nbsp;</label><br/>
				        		<a class='btn btn-danger remove jsRemoveAttribute' id="">- Remove</a>
				        	<?php } ?>
				        </div>
				</div>
			<?php } ?>
<!-- end: Product attribute -->
				<div class="attribure">
					
				</div>				
				<div class="form-group">
					<input type="submit" class="btn btn-default jsSubmit" value="Submit">
				</div>
			</form>
		</div>
	</div>
</div>