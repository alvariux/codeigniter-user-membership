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

	<div class="col-md-8">
		<table class="table table-bordered">		
		<thead>
		<tr>
		<th>Firstname</th>
		<th>Lastname</th>
		<th>User</th>
		<th>Email</th>
		<th>&nbsp;</th>
		</tr>
		</thead>

		<tbody>
		<?php foreach($user_list as $item): ?>
		<tr>
		<td><?php echo $item->firstname ?></td>
		<td><?php echo $item->lastname ?></td>
		<td><?php echo $item->username ?></td>
		<td><?php echo $item->email ?></td>
		<td>

		<div class="dropdown">
	        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu<?php echo $item->id; ?>" data-toggle="dropdown">
	    		Actions
	    		<span class="caret"></span>
    		</button>
	        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu<?php echo $item->id; ?>">
	          <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo $this->config->item('base_url');?>index.php/membership/edit_user/<?php echo $item->id?>">Edit</a></li>
	          <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo $this->config->item('base_url');?>index.php/membership/profile_user/<?php echo $item->id?>">Profile</a></li>
	          <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo $this->config->item('base_url');?>index.php/membership/user_roles/<?php echo $item->id?>">Roles</a></li>
	          <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo $this->config->item('base_url');?>index.php/membership/change_password/<?php echo $item->id?>">Change password</a></li>
	          <li class="divider"></li>
	          <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo $this->config->item('base_url');?>index.php/membership/delete_user/<?php echo $item->id?>">Delete</a></li>
	        </ul>
      	</div>
		
		</td>
		</tr>

		<?php endforeach;?>
		</tbody>
		</table>
	</div>

	<div class="col-md-4">
		<a class="btn btn-primary" href="<?php echo $this->config->item('base_url');?>index.php/membership/add_user">Add new user</a>&nbsp;
	</div>
</div><!-- row -->


</div><!-- container -->


<?php
$this->load->view('membership/footer');
?>
