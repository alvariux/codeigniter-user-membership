<?php
$this->load->view('membership/header');
?>

<?php echo form_open('membership/login',array('id'=>'userform','name'=>'userform')); ?>

<fieldset>
<legend>Sign in</legend>
<p>
<label for="username">User</label><input type="text" name="username" >
</p>

<p>
<label for="password">Password</label><input type="password" name="password" >
</p>

</fieldset>

<input type="submit" name="sent" value="Sign in">

</form>

<?php
$this->load->view('membership/footer');
?>