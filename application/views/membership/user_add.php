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


			<?php echo form_open('membership/add_user',array('id'=>'userform','name'=>'userform','role'=>'form')); ?>

			<div class="form-group">
				<label for="firstname">Firstname</label>
				<input type="text" class="form-control" name="firstname" id="firstname" value="">
			</div>			

			<div class="form-group">
				<label for="lastname">Lastname</label>
				<input type="text" class="form-control" name="lastname" id="lastname" value="">
			</div>			

			<div class="form-group">
				<label for="username">Username</label>
				<input type="text" class="form-control" name="username" id="username" value="">
			</div>			

			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" class="form-control" name="password" id="password" value="">
			</div>

			<div class="form-group">
				<label for="email">Email</label>
				<input type="text" class="form-control" name="email" id="email" value="">
			</div>

			<input type="submit" name="sent" value="Accept">

			</form>
		</div>
	</div>
</div>

<?php
$this->load->view('membership/footer');
?>
