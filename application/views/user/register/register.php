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
				<h1>Register</h1>
			</div>
			<form action="<?=base_url('register')?>" id="register_user" method="post">
				<div class="form-group row">
					<div class="col-md-4">
					<label for="username">Username</label>
					<input type="text" class="form-control" id="username" name="username" placeholder="Enter a username" required data-msg-required="Please enter username">
					<p class="help-block">At least 4 characters, letters or numbers only</p>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-4">
					<label for="email">Email</label>
					<input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required data-msg-required="Please enter email">
					<p class="help-block">A valid email address</p>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-4">
					<label for="password">Password</label>
					<input type="password" class="form-control" id="password" name="password" placeholder="Enter a password" required data-msg-required="Please enter password">
					<p class="help-block">At least 6 characters</p>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-4">
					<label for="password_confirm">Confirm password</label>
					<input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Confirm your password" required data-msg-required="Please enter confirm password">
					<p class="help-block">Must match your password</p>
					</div>
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-default jsSubmit" value="Register">
				</div>
			</form>
		</div>
	</div>
</div>