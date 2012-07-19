<?php
$this->load->view('membership/header');
?>


<a href="<?php echo $this->config->item('base_url');?>index.php/membership/add_user">Add new user</a>&nbsp;
<a href="<?php echo $this->config->item('base_url');?>index.php/membership">Home</a>

<table>
<caption>User</caption>
<thead>
<th scope="col">Firstname</th>
<th scope="col">Lastname</th>
<th scope="col">User</th>
<th scope="col">Email</th>
<th scope="col">&nbsp;</th>
</thead>

<tbody>
<?php foreach($user_list as $item): ?>
<tr>
<td><?php echo $item->firstname ?></td>
<td><?php echo $item->lastname ?></td>
<td><?php echo $item->username ?></td>
<td><?php echo $item->email ?></td>
<td>
<a href="<?php echo $this->config->item('base_url');?>index.php/membership/edit_user/<?php echo $item->id?>">Edit</a>&nbsp;
<a href="<?php echo $this->config->item('base_url');?>index.php/membership/profile_user/<?php echo $item->id?>">Profile</a>&nbsp;
<a href="<?php echo $this->config->item('base_url');?>index.php/membership/user_roles/<?php echo $item->id?>">Roles</a>&nbsp;
<a href="<?php echo $this->config->item('base_url');?>index.php/membership/change_password/<?php echo $item->id?>">Change password</a>&nbsp;
<a href="<?php echo $this->config->item('base_url');?>index.php/membership/delete_user/<?php echo $item->id?>">Delete</a>&nbsp;
</td>
</tr>

<?php endforeach;?>
</tbody>
</table>

<?php
$this->load->view('membership/footer');
?>
