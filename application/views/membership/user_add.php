<?php

$this->load->view('membership/header');

?>



<?php echo form_open('membership/add_user',array('id'=>'userform','name'=>'userform')); ?>

<fieldset>
<legend>Add user</legend>

<p>
<label for="firstname">Firstname</label><input type="text" name="firstname" value="">
</p>

<p>
<label for="lastname">Lastname</label><input type="text" name="lastname" value="">
</p>

<p>
<label for="username">Username</label><input type="text" name="username" value="">
</p>

<p>
<label for="password">Password</label><input type="password" name="password" value="">
</p>

<p>
<label for="email">Email</label><input type="text" name="email" value="">
</p>


</fiedlset>
<input type="submit" name="sent" value="Accept">

</form>

<?php
$this->load->view('membership/footer');
?>
