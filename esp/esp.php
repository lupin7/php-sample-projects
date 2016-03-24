<!-- 
    ESP (Extrasensory Perception) card game:
    - ESP sample project,
    - On top, are the links to 2 other sample projects
    - The page updates with counts for every attempt
    - A right guess or clicking 'Reset' automatically picks another card and set attempts to zero
-->

<?php
	session_start();

	$selected = '';
	$chosen = '';

	$number = range(1,5);
	$picked = array_rand($number, 1) + 1;

	if( !isset($_SESSION['chosen']) && !isset($_SESSION['count']) ) {
		$_SESSION['chosen'] = $picked;
		$count = 0;
		$_SESSION['count'] = $count;
	}
	else {
		$chosen = $_SESSION['chosen'];
		$count = $_SESSION['count'];
	}

	if( isset($_POST['submit']) && isset($_POST['card']) ) {
		$selected = $_POST['card'];
		
		if($selected == $chosen) {
			$_SESSION['count'] += 1;
			session_destroy();
		} else {
			$_SESSION['count'] += 1;
		}
	} elseif( isset($_POST['reset']) ) {
		$_SESSION['chosen'] = $picked;
		$_SESSION['count'] = 0;
	}

	$chosen = $_SESSION['chosen'];
	$count = $_SESSION['count'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>ESP Game</title>
    <link rel="stylesheet" href="styles.css" type="text/css" />
</head>
<body>
	<section>
		<header>
			<p id="page_links"><a href="../blogs">Blogs Page</a>  <a href="../cms">CMS Page</a></p>
			<?php if($_SESSION['count'] == 0 || (isset($_POST['submit']) && isset($_POST['card']) && $_POST['card'] == $_SESSION['chosen']) ): ?>
				<h1>ESP Test in Progress</h1>
			<?php else: ?>
				<h1>ESP Test in Progress - Attempt: <?= $_SESSION['count'] ?></h1>
			<?php endif ?>
		</header>
		
		<?php if(isset($_POST['submit']) && isset($_POST['card']) && 
				 $_POST['card'] != $_SESSION['chosen']): ?>
			<h3>Please Make a Guess Again: </h3>
		<?php elseif(isset($_POST['submit']) && isset($_POST['card']) &&
					 $_POST['card'] == $_SESSION['chosen']): ?>
			<h3>You are correct after <?= $_SESSION['count'] ?> tries! I have picked a new symbol; guess again:</h3>
		<?php else: ?>
			<h3>Make a Guess: </h3>
		<?php endif ?>
		<form method='post' action='./esp.php'>
		<div>	
			<p class="spread">
				<img src='img/1.jpg' alt='' />
				<br/>
				<input type='radio' name='card' value='1' class="rad">
			</p>
			<p class="spread">
				<img src='img/2.jpg' alt='' />
				<br/>
				<input type='radio' name='card' value='2' class="rad">
			</p>
			<p class="spread">
				<img src='img/3.jpg' alt='' />
				<br/>
				<input type='radio' name='card' value='3' class="rad">
			</p>
			<p class="spread">
				<img src='img/4.jpg' alt='' />
				<br/>
				<input type='radio' name='card' value='4' class="rad">
			</p>
			<p class="spread">
				<img src='img/5.jpg' alt='' />
				<br/>
				<input type='radio' name='card' value='5' class="rad">
			</p>

            <p class="center">
            	<input type="submit" name="submit" value="Submit" style="background-color: white" />
            	<input type="submit" name="reset" value="Reset" style="background-color: white" />
            </p>
		</div>
		</form>
	</section>
</body>
</html>	