<?php
$this->load->view('membership/header');
?>

<?php
$this->load->view('membership/menu');
?>


<br/><br/>

<div class="container" role="main">

	<h1>Users</h1>

	<div class="row">
		<div class="col-md-12">

			<?php echo form_open('membership/save_user',array('id'=>'userform','name'=>'userform','role'=>'form')); ?>

			<div class="form-group">
				<label for="firstname">Firstname</label>
				<input type="text" class="form-control" name="firstname" id="firstname" value="<?php echo $user_data[0]->firstname ?>">
			</div>			

			<div class="form-group">
				<label for="lastname">Lastname</label>
				<input type="text" class="form-control" name="lastname" id="lastname" value="<?php echo $user_data[0]->lastname ?>">
			</div>			

			<div class="form-group">
				<label for="username">Username</label>
				<input type="text" class="form-control" name="username" id="username" value="<?php echo $user_data[0]->username ?>">
			</div>			

			<div class="form-group">
				<label for="email">Email</label>
				<input type="text" class="form-control" name="email" id="email" value="<?php echo $user_data[0]->email ?>">
			</div>			
			
			<input type="hidden" name="user_id" value="<?php echo $user_data[0]->id ?>">
			<input class="btn btn-primary" type="submit" name="sent" value="Accept" />

			</form>
		</div>

</div>

<?php
$this->load->view('membership/footer');
?>
