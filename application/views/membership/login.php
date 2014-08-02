<?php
$this->load->view('membership/header');
?>

<?php echo form_open('membership/login',array('id'=>'userform','name'=>'userform','class'=>'form-signin','role'=>'form')); ?>

<div class="row">

	<div class="col-lg-6 col-lg-offset-3">

		<h2>Please sign in</h2>

		<input type="text" name="username" class="form-control" placeholder="Username" required autofocus />
		<input type="password" name="password" class="form-control" placeholder="Password" required />
		<input name="sent" class="btn btn-lg btn-primary btn-block" type="submit" value="Sign in" />
		</form>
	</div>

</div>

<?php
$this->load->view('membership/footer');
?>