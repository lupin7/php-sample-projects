<?php
	ob_start();
	require('../connect.php');
	session_start();
	// $host="localhost"; // Host name 
	// $username="root"; // Mysql username 
	// $password=""; // Mysql password 
	// $db_name="serverside"; // Database name 
	$tbl_name="members"; // Table name 

	// $mysqli = new mysqli($host, $username, $password, $db_name);

	/* check connection */
	if ($db->connect_errno) {
	    printf("Connect failed: %s\n", $db->connect_error);
	    exit();
	}

	$myusername=$_POST['myusername']; 
	$mypassword=$_POST['mypassword']; 

	// salt needs to match what is used on the check login page
	$encrypted_password = hash("sha512", $mypassword); 
	$sql="insert into $tbl_name (username,password) values ('$myusername','$encrypted_password')";
	if (!$db->query($sql)) {
	    echo "INSERT failed: (" . $db->errno . ") " . $db->error;
	}  

	ob_end_flush();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
    <title>Blog - Accounts</title>
    <link rel="stylesheet" href="../styles.css" type="text/css" />
</head>
<body>
	<div id="wrapper">
        <div id="header">
            <h1><a href="index.php">Blog - Accounts</a></h1>
            <?php include '../constants/search.php'; ?>
        </div> 
		
        <?php include '../constants/navigation.php'; ?>

        <div id="login-signup">
			<h2> Accounts </h2>
			<h3>Successfully signed up as: <?= $myusername; ?></h3>
			<pre><a href="../login_signup.php">Log In</a></pre>
		</div>
		<div id="footer">
            <h5>Copywrong <?= date('Y') ?> - Every Rights</h5>
        </div> 
	</div>
</body>
</html>