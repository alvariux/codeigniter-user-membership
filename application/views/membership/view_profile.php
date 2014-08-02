<?php
$this->load->view('membership/header');
?>

<?php
$this->load->view('membership/menu');
?>


<br/><br/>

<div class="container" role="main">

	<h1>Profile</h1>

	<div class="row">
		<div class="col-md-12">

			<table class="table table-bordered">
			<thead>
			<tr>
			<th scope="col">Address</th>
			<th scope="col">City</th>
			<th scope="col">State</th>
			<th scope="col">Phone</th>
			<th scope="col">Mobile</th>
			</tr>
			</thead>

			<tbody>
			<tr>
			<td><?php echo $user_profile[0]->address ?></td>
			<td><?php echo $user_profile[0]->city ?></td>
			<td><?php echo $user_profile[0]->state ?></td>
			<td><?php echo $user_profile[0]->phone ?></td>
			<td><?php echo $user_profile[0]->mobile ?></td>
			</tr>
			</tbody>
			</table>
		</div>
	</div>
</div>

<?php
$this->load->view('membership/footer');
?>
