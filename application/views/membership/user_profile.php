<?php

$this->load->view('membership/header');

?>


<?php echo form_open('membership/profile_user',array('id'=>'userform','name'=>'userform')); ?>
<fieldset>
<legend>Profile</legend>

<p>
<label for="address">Addres</label><input type="text" name="address" value="<?php echo $user_profile[0]->address;?>">
</p>


<p>
<label for="city">City</label><input type="text" name="city" value="<?php echo $user_profile[0]->city;?>">
</p>


<p>
<label for="state">Sate</label><input type="text" name="state" value="<?php echo $user_profile[0]->state;?>">
</p>

<p>
<label for="phone">Phone</label><input type="text" name="phone" value="<?php echo $user_profile[0]->phone;?>">
</p>


<p>
<label for="mobile">Mobile</label><input type="text" name="mobile" value="<?php echo $user_profile[0]->mobile;?>">
</p>


</fiedlset>
<input type="hidden" name="user_id" value="<?php echo $user_profile[0]->user_id ?>">
<input type="submit" name="sent" value="Accept">

</form>


<?php
$this->load->view('membership/footer');
?>
