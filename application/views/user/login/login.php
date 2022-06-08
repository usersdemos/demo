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
				<h1>Login</h1>
			</div>
			<form action="<?=base_url('login')?>" id="login_user" method="post">
				<div class="form-group row">
					<div class="col-md-4">
					<label for="username">Username</label>
					<input type="text" class="form-control" id="username" name="username" placeholder="Your username" required data-msg-required="Please enter username">
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-4">
					<label for="password">Password</label>
					<input type="password" class="form-control" id="password" name="password" placeholder="Your password" required data-msg-required="Please enter password">
					</div>
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-default jsSubmit" value="Login">
				</div>
			</form>
		</div>
	</div>
</div>