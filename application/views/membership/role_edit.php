<?php
$this->load->view('membership/header');
?>

<?php
$this->load->view('membership/menu');
?>

<br/><br/>

<div class="container" role="main">

	<h1>Roles</h1>

	<div class="row">

		<div class="col-md-12">

			<?php echo form_open('membership/save_role',array('id'=>'userform','name'=>'userform')); ?>

			<div class="form-group">
				<label for="name">Name</label>
				<input class="form-control" type="text" name="name" id="name" value="<?php echo $role_data[0]->name ?>">
			</div>
			
			<input type="hidden" name="role_id" value="<?php echo $role_data[0]->id ?>">
			<input class="btn btn-primary" type="submit" name="sent" value="Accept">

			</form>
		</div>
	</div>
</div>

<?php
$this->load->view('membership/footer');
?>
