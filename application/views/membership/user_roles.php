<?php
$this->load->view('membership/header');
?>

<a href="<?php echo $this->config->item('base_url');?>index.php/membership">Home</a>
<br>

<?php

echo "User: ".$user_data[0]->username;
?>
<br><br>

<?php echo form_open('membership/add_user_role',array('id'=>'userform2','name'=>'userform2')); ?>
<fieldset>
<legend>Roles</legend>

<p>
<label for="role">Add role to user</label>
<select name="role_id">
<option value=""></option>
<?php
foreach($role_list as $item)
{
	echo '<option value="'.$item->id.'" ';
	echo '>'.$item->name.'</option>'."\n";
}
?>
</select>
</p>

</fieldset>
<input type="hidden" name="user_id" value="<?php echo $user_data[0]->id?>">
<input type="submit" name="sent" value="Accept">
</form>


<br>
<table>
<caption>User Roles</caption>
<thead>
<th scope="col">name</th>
<th scope="col">&nbsp;</th>
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

<?php
$this->load->view('membership/footer');
?>
