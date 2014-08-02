<?php
$this->load->view('membership/header');
?>

<?php
$this->load->view('membership/menu');
?>


<br/><br/>

<div class="container" role="main">

	<h1>Change password</h1>

	<div class="row">
		<div class="col-md-12">

			<?php echo form_open('membership/change_password',array('id'=>'userform','name'=>'userform','role'=>'form')); ?>
			
			<div class="form-group">
			<label for="password">Password</label>
			<input class="form-control" type="password" name="password" value="">
			</div>			
		
			<input type="hidden" name="user_id" value="<?php echo $user_data[0]->id ?>">
			<input class="btn btn-primary" type="submit" name="sent" value="Accept">

			</form>
		</div>
	</div>
</div>

<?php
$this->load->view('membership/footer');
?>
