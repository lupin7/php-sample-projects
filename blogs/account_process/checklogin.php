<?php
	ob_start();
    session_start();
	require('../connect.php');
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

	$returnedpassword="";
	$myusername=$_POST['myusername']; 
	$mypassword=$_POST['mypassword']; 

	$sql="SELECT password FROM $tbl_name WHERE username='$myusername' \n limit 1";
	// $result=mysql_query($sql);
	// $result = $mysqli->query($sql);
	$result = $db->query($sql);
	while ($row = $result->fetch_assoc()) {
	    $returnedpassword=$row['password'];
	}

	// take clean password and encrypt it
	$checkpassword = hash("sha512", $mypassword);

	// If returned password matches entered password, valid login
	if($checkpassword==$returnedpassword){
		// Register $myusername and redirect to file "login_success.php"
		session_start();
		$_SESSION['username'] = $myusername;
		// header("location:login_success.php");
	} 
	// else {
	// 	echo "Wrong Username or Password";

	// 	// never echo these out in production!!!!!
	// 	echo "<pre>$sql</pre>";
	// 	echo "user is ".$myusername;
	// 	echo "<br />db pass  is ".$returnedpassword;
	// 	echo "<br />form pass is ".$mypassword;
	// 	echo "<br />encryped pass is ".$checkpassword;
	// }
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
			<?php if(!isset($_SESSION['username'])): ?>
				<h3> Something went wrong. </h3>
				<pre><a href="/samples/blogs/login_signup.php">Try again</a></pre>
			<?php else: ?>
				<h3>Successfully logged in as: <?= $myusername; ?></h3>
			<?php endif; ?>
		</div>
		<div id="footer">
            <h5>Copywrong <?= date('Y') ?> - Every Rights</h5>
        </div> 
	</div>
</body>
</html>