<?php
$this->load->view('membership/header');
?>


<?php
$this->load->view('membership/menu');
?>

<br/><br/>

<div class="jumbotron">
	<?php
	echo "<h1>User ".$user_data[0]->username."</h1>";
	?>
</div>

<div class="container" role="main">

	<h1>Roles</h1>

	<?php echo form_open('membership/add_user_role',array('id'=>'userform2','name'=>'userform2','role'=>'form')); ?>
	
	<div class="form-group">
		<label for="role_id">Add role to user</label>
		<select class="form-control" name="role_id" id="role_id">
		<option value=""></option>
		<?php
		foreach($role_list as $item)
		{
			echo '<option value="'.$item->id.'" ';
			echo '>'.$item->name.'</option>'."\n";
		}
		?>
		</select>
	</div>
	
	<input type="hidden" name="user_id" value="<?php echo $user_data[0]->id?>">
	<input class="btn btn-primary" type="submit" name="sent" value="Accept">
	</form>


	<br>
	<table class="table table-bordered">	
	<thead>
	<tr>
	<th>name</th>
	<th>&nbsp;</th>
	</tr>
	</thead>

	<tbody>
	<?php foreach($user_roles as $item): ?>
	<tr>
	<td><?php echo $item->name ?></td>
	<td>
	<a href="<?php echo $this->config->item('base_url');?>index.php/membership/delete_user_role/<?php echo $user_data[0]->id?>/<?php echo $item->role_id?>">Delete</a>&nbsp;
	</td>
	</tr>

	<?php endforeach;?>
	</tbody>
	</table>

</div>

<?php
$this->load->view('membership/footer');
?>
