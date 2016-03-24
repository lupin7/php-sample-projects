<?php
	// Put this code in first line of web page. 
	session_start();
	session_destroy();

	// logout and go back to homepage
	header("Location: /samples/blogs/");
?>