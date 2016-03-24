<?php 
	date_default_timezone_set('UTC');
	$date = date("F j, Y, g:i a");
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<link rel="stylesheet" type="text/css" href="front_styles.css" />
		<title>My Sample Projects</title>
	</head>
<body>
<main id="container">
	<header>
		<h1>My Sample Projects</h1>
	</header>

	<section>
		<ul id="front_nav">		
			<li><a href = "./blogs">Blogs Page</a></li>
			<li><a href = "./cms">CMS Page</a></li>
			<li><a href = "./esp/esp.php">ESP Page</a></li>
		</ul>
	</section>
	
	<footer>
		<!-- <p> Copyright &copy; <?= date('Y'); ?> Project Samples </p> -->
		<p>All projects have links to the other.</p>
	</footer>
</main>
</body>
</html>