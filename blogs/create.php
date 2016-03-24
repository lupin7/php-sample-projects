<?php
	// require('authenticate.php');       // require an authentication
    session_start();
    $redirect_javascript =  '<script type="text/javascript"> '.
                                'alert("Please log in/register."); '.
                                'window.location.href="login_signup.php"'.
                            '</script>';
    if(!isset($_SESSION['username'])) {
        echo $redirect_javascript;
    }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
    <title>Blog - Create a New Post</title>
    <link rel="stylesheet" href="styles.css" type="text/css" />
</head>
<body>
    <div id="wrapper">
        <div id="header">
            <h1><a href="index.php">Blog - New Post</a></h1>

            <?php include 'constants/search.php'; ?>

        </div> 
		
        <?php include 'constants/navigation.php'; ?>
        
        <!-- action done by process.php -->
        <form method="post" action="process.php">
            <fieldset>
                <legend>New Blog Post</legend>
                <p>
                    Title: 
                    <br />
                    <input id="title" name="title" type="text" size="40" style="background-color: white"/>
                </p>
                <p>
                    Content: 
                    <br />
                    <textarea id="content" name="content" rows="10" cols="50" style="background-color: white"></textarea>
                </p>
                <p><input type="submit" value="Create" style="background-color: white"/></p>
            </fieldset>
        </form>
	    <div id="footer">
            <h5>Copywrong <?= date('Y') ?> - Every Rights</h5>
        </div> 
    </div>
</body>
</html>