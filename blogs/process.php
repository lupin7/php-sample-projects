<?php
	require('connect.php');			// connect to the database
    session_start();
	
	// if the title and contents contain values
	if( (isset($_POST['title']) && isset($_POST['content']) )  ){
		// store them in variables
        $title = $_POST['title'];
        $content = $_POST['content'];
        // pre-process the content
        $content = $db->real_escape_string($content);
        
        // adjust the timezone, grab today's date in a variable
        // date_default_timezone_set("Canada/Central");
        $today = date('Y-m-d H:i:s');
        // insert query
        $add_post  = "INSERT INTO blogs (title, content, datetime) VALUES ('{$title}', '{$content}', '{$today}')";
	
  		// if the length of the string of both the title and content is greater than 0
        if( strlen($title) > 0 && strlen($content) > 0 ){
        	// execute the query
        	$result = $db->query($add_post);
        	// redirect to the index
        	header('Location: index.php');
        	exit;
        }
        // if both or one of them are empty
        else{
        	// create an error message out of html
	    	echo "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN'
   					'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>
					<html xmlns='http://www.w3.org/1999/xhtml' lang='en' xml:lang='en'>
					<head>
					    <title>ERROR - New Post</title>
					    <link rel='stylesheet' href='styles.css' type='text/css' />
					</head>
					<body>
					    <div id='wrapper'>
					 		<h2>An error occured while processing your post.</h2>
	    					<p>Both the title and content must be at least one character.</p>
	    					<p><a href='index.php'> Return to home page </a></p>
					        <div id='footer'>
                                <h5>Copywrong <?= date('Y') ?> - Every Rights</h5>
                            </div> 
                        </div>
					</body>
					</html>";
    	}
    }
?>