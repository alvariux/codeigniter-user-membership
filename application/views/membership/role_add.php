<?php

$this->load->view('membership/header');

?>



<?php echo form_open('membership/add_role',array('id'=>'userform','name'=>'userform')); ?>

<fieldset>
<legend>Add role</legend>

<p>
<label for="name">Name</label><input type="text" name="name" value="">
</p>

</fiedlset>
<input type="submit" name="sent" value="Accept">

</form>

<?php
$this->load->view('membership/footer');
?>
