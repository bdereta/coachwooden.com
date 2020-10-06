<?php

if ($result) {
	echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction(1, '$url', '$message');</script>";
} else {
	echo "File has not been selected.";	
}

?>