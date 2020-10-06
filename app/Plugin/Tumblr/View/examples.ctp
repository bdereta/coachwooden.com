<?php
//twitter account (single user)
//limit is optional
//template is optional (defaults to 'default')
?>

<?php 
if (isset($instagram)) {
	echo $this->Instagram->get_content($instagram); 
}
?>