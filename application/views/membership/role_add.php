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

			<?php echo form_open('membership/add_role',array('id'=>'userform','name'=>'userform','role'=>'form')); ?>

			<div class="form-group">
				<label for="name">Name</label>
				<input class="form-control" type="text" name="name" id="name" value="">
			</div>

			<input class="btn btn-primary" type="submit" name="sent" value="Accept">

			</form>
		</div>
	</div>
</div>

<?php
$this->load->view('membership/footer');
?>
