<?php include('includes/header.php'); ?>
<?php include('includes/top-bar.php'); ?>
<?php include('includes/nav-bar.php'); ?>
<div class="text-center" border="color:red">
	<form  name="frmForgot" id="frmForgot" method="post" onSubmit="return validate_forgot();">
	<h1>Forgot Password?</h1>
		<?php if(!empty($success_message)) { ?>
		<div class="success_message"><?php echo $success_message; ?></div>
		<?php } ?>

		<div id="validation-message">
			<?php if(!empty($error_message)) { ?>
		<?php echo $error_message; ?>
		<?php } ?>
		</div>
		
		<div class="field-group">
			<div><label for="email">Email</label></div>
			<div><input type="text" name="user-email" id="user-email" class="input-field"></div>
		</div>
		<br />
		<div class="field-group">
			<div><input type="submit" name="forgot-password" id="forgot-password" value="Submit" class="btn btn-success"></div>
		</div>	
	</form>
</div>
  <?php include('includes/footer.php'); ?>