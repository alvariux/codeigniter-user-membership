<?php

$this->load->view('membership/header');

?>



<?php echo form_open('membership/save_user',array('id'=>'userform','name'=>'userform')); ?>

<fieldset>
<legend>Edit user</legend>

<p>
<label for="firstname">Firstname</label><input type="text" name="firstname" value="<?php echo $user_data[0]->firstname ?>">
</p>

<p>
<label for="lastname">Lastname</label><input type="text" name="lastname" value="<?php echo $user_data[0]->lastname ?>">
</p>

<p>
<label for="username">Username</label><input type="text" name="username" value="<?php echo $user_data[0]->username ?>">
</p>

<p>
<label for="email">Email</label><input type="text" name="email" value="<?php echo $user_data[0]->email ?>">
</p>


</fiedlset>
<input type="hidden" name="user_id" value="<?php echo $user_data[0]->id ?>">
<input type="submit" name="sent" value="Accept">

</form>

<?php
$this->load->view('membership/footer');
?>
