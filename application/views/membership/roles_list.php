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

		<div class="col-md-8">

			<table class="table table-bordered">
			<thead>
			<th scope="col">name</th>
			<th scope="col">&nbsp;</th>
			</thead>

			<tbody>
			<?php foreach($roles_list as $item): ?>
			<tr>
			<td><?php echo $item->name ?></td>
			<td>
			<a href="<?php echo $this->config->item('base_url');?>index.php/membership/edit_role/<?php echo $item->id?>">Edit</a>&nbsp;
			<a href="<?php echo $this->config->item('base_url');?>index.php/membership/delete_role/<?php echo $item->id?>">Delete</a>&nbsp;
			</td>
			</tr>

			<?php endforeach;?>
			</tbody>
			</table>
		</div>

		<div class="col-md-4">
			<a class="btn btn-primary" href="<?php echo $this->config->item('base_url');?>index.php/membership/add_role">Add new role</a>&nbsp;
		</div>
	</div>
</div>

<?php
$this->load->view('membership/footer');
?>
