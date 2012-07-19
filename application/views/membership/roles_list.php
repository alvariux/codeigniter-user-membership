<?php
$this->load->view('membership/header');
?>


<a href="<?php echo $this->config->item('base_url');?>index.php/membership/add_role">Add new role</a>&nbsp;
<a href="<?php echo $this->config->item('base_url');?>index.php/membership">Home</a>

<table>
<caption>Roles</caption>
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

<?php
$this->load->view('membership/footer');
?>
