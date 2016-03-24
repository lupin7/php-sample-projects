<?php
	require('connect.php');        // connect to the database
    session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
    <title>Blog - Accounts</title>
    <link rel="stylesheet" href="styles.css" type="text/css" />
</head>
<body>
	<div id="wrapper">
        <div id="header">
            <h1><a href="index.php">Blog - Accounts</a></h1>

            <?php include 'constants/search.php'; ?>

        </div> 
		
        <?php include 'constants/navigation.php'; ?>
		<div id="login-signup">
			<h2> Accounts </h2>
			<div id="login">
				<table width="100%" border="0" cellpadding="3" cellspacing="1">
					<tr>
						<td><h3> Login </h3></td>
					</tr>
					<form name="form_login" method="post" action="./account_process/checklogin.php">
					<tr>
						<td>Username: </td>
						<td><input name="myusername" type="text" id="myusername"></td>
					</tr>
					<tr>
						<td>Password: </td>
						<td><input name="mypassword" type="password" id="mypassword"></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" name="Submit" value="Login"></td>
					</tr>
					</form>
				</table>
			</div>
			<div id="sign_up">
				<table width="100%" border="0" cellpadding="3" cellspacing="1">
					<tr>
						<td><h3> Sign Up </h3></td>
					</tr>
					<form name="form_signup" method="post" action="./account_process/process_signup.php">
					<tr>
						<td>Username: </td>
						<td><input name="myusername" type="text" id="myusername"></td>
					</tr>
					<tr>
						<td>Password: </td>
						<td><input name="mypassword" type="password" id="mypassword"></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" name="Submit" value="Sign Up"></td>
					</tr>
					</form>
				</table>
			</div>
		</div>
		<div id="footer">
            <h5>Copywrong <?= date('Y') ?> - Every Rights</h5>
        </div> 
	</div>
</body>
</html>