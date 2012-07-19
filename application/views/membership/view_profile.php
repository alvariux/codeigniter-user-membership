<?php
$this->load->view('membership/header');
?>



<a href="<?php echo $this->config->item('base_url');?>index.php/membership">Home</a>

<table>
<caption>User</caption>
<thead>
<th scope="col">Address</th>
<th scope="col">City</th>
<th scope="col">State</th>
<th scope="col">Phone</th>
<th scope="col">Mobile</th>
</thead>

<tbody>
<tr>
<td><?php echo $user_profile[0]->address ?></td>
<td><?php echo $user_profile[0]->city ?></td>
<td><?php echo $user_profile[0]->state ?></td>
<td><?php echo $user_profile[0]->phone ?></td>
<td><?php echo $user_profile[0]->mobile ?></td>
</tbody>
</table>

<?php
$this->load->view('membership/footer');
?>
