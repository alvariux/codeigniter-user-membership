<?php
$this->load->view('membership/header');

?>
<a href="<?php echo $this->config->item('base_url');?>index.php/membership">Home</a>
<br><br>

<?php

echo $message;

$this->load->view('membership/footer');
?>
