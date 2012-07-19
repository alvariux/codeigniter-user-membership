<?php

$this->load->view('membership/header');

?>



<?php echo form_open('membership/change_password',array('id'=>'userform','name'=>'userform')); ?>

<fieldset>
<legend>Change password</legend>

<p>
<label for="password">Password</label><input type="password" name="password" value="">
</p>

</fiedlset>
<input type="hidden" name="user_id" value="<?php echo $user_data[0]->id ?>">
<input type="submit" name="sent" value="Accept">

</form>

<?php
$this->load->view('membership/footer');
?>
