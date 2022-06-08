<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
	</main>

	<footer id="site-footer" role="contentinfo">
	</footer>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
	<script src="<?= base_url('asset/js/script.js') ?>"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.js"></script>	
	<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/js/dataTables.checkboxes.min.js"></script>
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.templates/beta1/jquery.tmpl.js"></script>
	<script src="https://www.jsviews.com/download/jsrender.min.js"></script>
	<script type="text/javascript" src="<?=base_url();?>asset/js/common.js"></script>

	<?php if($this->router->fetch_class() == 'user'){?>
	<?php if($this->router->fetch_method() == 'register'){ ?>	
	<script src="<?=base_url();?>asset/js/register/create.js"></script>
	<?php } ?>
	<?php if($this->router->fetch_method() == 'login'){ ?>	
	<script src="<?=base_url();?>asset/js/register/login.js"></script>
	<?php } ?>	
	<?php } ?>

	<!-- category -->
	<?php if($this->router->fetch_class() == 'category'){?>
	<?php if($this->router->fetch_method() == 'index'){ ?>	
	<script src="<?=base_url();?>asset/js/category/list.js"></script>
	<?php }?>
	<?php if($this->router->fetch_method() == 'create'){ ?>	
	<script src="<?=base_url();?>asset/js/category/create.js"></script>
	<?php } ?>
	<?php if($this->router->fetch_method() == 'edit'){ ?>	
	<script src="<?=base_url();?>asset/js/category/edit.js"></script>
	<?php } ?>	
	<?php } ?>

	<!-- product -->
	<?php if($this->router->fetch_class() == 'product'){?>
	<?php if($this->router->fetch_method() == 'index'){ ?>	
	<script src="<?=base_url();?>asset/js/product/list.js"></script>
	<?php }?>
	<?php if($this->router->fetch_method() == 'create'){ ?>	
	<script src="<?=base_url();?>asset/js/product/create.js"></script>
	<?php } ?>
	<?php if($this->router->fetch_method() == 'edit'){ ?>	
	<script src="<?=base_url();?>asset/js/product/edit.js"></script>
	<?php } ?>	
	<?php } ?>						 

</body>
</html>