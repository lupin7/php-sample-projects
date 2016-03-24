<?php
	ob_start();
	$host="localhost"; // Host name 
	$username="root"; // Mysql username 
	$password=""; // Mysql password 
	$db_name="serverside"; // Database name 
	$tbl_name="members"; // Table name 
	// $db_name="mydb"; // Database name 
	// $tbl_name="users"; // Table name 

	$mysqli = new mysqli($host, $username, $password, $db_name);

	/* check connection */
	if ($mysqli->connect_errno) {
	    printf("Connect failed: %s\n", $mysqli->connect_error);
	    exit();
	}

	$returnedpassword="";
	$myusername=$_POST['myusername']; 
	$mypassword=$_POST['mypassword']; 

	$sql="SELECT password FROM $tbl_name WHERE username='$myusername' \n limit 1";
	// $result=mysql_query($sql);
	$result = $mysqli->query($sql);
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
		header("location:login_success.php");
	} else {
		echo "Wrong Username or Password";

		// never echo these out in production!!!!!
		echo "<pre>$sql</pre>";
		echo "user is ".$myusername;
		echo "<br />db pass  is ".$returnedpassword;
		echo "<br />form pass is ".$mypassword;
		echo "<br />encryped pass is ".$checkpassword;
	}
	ob_end_flush();
?>


<?php

// ob_start();
// $host="localhost"; // Host name 
// $username="root"; // Mysql username 
// $password="password"; // Mysql password 
// $db_name="serverside"; // Database name 
// $tbl_name="members"; // Table name 

// $mysqli = new mysqli($host, $username, $password, $db_name);

// /* check connection */
// if ($mysqli->connect_errno) {
//     printf("Connect failed: %s\n", $mysqli->connect_error);
//     exit();
// }

// $myusername=$_POST['myusername']; 
// $mypassword=$_POST['mypassword']; 

// $sql="SELECT password FROM $tbl_name WHERE username='$myusername' \n limit 1";
// // $result=mysql_query($sql);
// $result = $mysqli->query($sql);
// while ($row = $result->fetch_assoc()) {
//     $returnedpassword=$row['password'];
// }
// // If returned password matches entered password, valid login
// if($mypassword==$returnedpassword){
// // Register $myusername and redirect to file "login_success.php"
// session_start();
// $_SESSION['username'] = $myusername;
// header("location:login_success.php");
// }
// else {
// echo "Wrong Username or Password";
// echo "<pre>$sql</pre>";
// }
// ob_end_flush();
?>
