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

			<?php echo form_open('membership/profile_user',array('id'=>'userform','name'=>'userform','role'=>'form')); ?>
		
			<div class="form-group">
			<label for="address">Addres</label>
			<input class="form-control"  type="text" name="address" value="<?php echo $user_profile[0]->address;?>">
			</div>
			

			<div class="form-group">
			<label for="city">City</label>
			<input class="form-control" type="text" name="city" value="<?php echo $user_profile[0]->city;?>">
			</div>
			

			<div class="form-group">
			<label for="state">Sate</label>
			<input class="form-control" type="text" name="state" value="<?php echo $user_profile[0]->state;?>">
			</div>
			
			<div class="form-group">
			<label for="phone">Phone</label>
			<input class="form-control" type="text" name="phone" value="<?php echo $user_profile[0]->phone;?>">
			</div>
			

			<div class="form-group">
			<label for="mobile">Mobile</label>
			<input class="form-control" type="text" name="mobile" value="<?php echo $user_profile[0]->mobile;?>">
			</div>
					
			<input type="hidden" name="user_id" value="<?php echo $user_profile[0]->user_id ?>">
			<input class="btn btn-primary" type="submit" name="sent" value="Accept">

			</form>
		</div>
	</div>

<?php
$this->load->view('membership/footer');
?>
