<?php

$this->load->view('membership/header');

?>



<?php echo form_open('membership/save_role',array('id'=>'userform','name'=>'userform')); ?>

<fieldset>
<legend>Edit user</legend>

<p>
<label for="name">Name</label><input type="text" name="name" value="<?php echo $role_data[0]->name ?>">
</p>

</fiedlset>
<input type="hidden" name="role_id" value="<?php echo $role_data[0]->id ?>">
<input type="submit" name="sent" value="Accept">

</form>

<?php
$this->load->view('membership/footer');
?>
