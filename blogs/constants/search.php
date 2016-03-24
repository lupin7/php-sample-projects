<?php if(!isset($_SESSION['username'])): ?>
	<pre id="login-signup-link" style="float:right; margin-top:-50px;"><a href="login_signup.php">Login/Sign Up</a></pre>
<?php else: ?>
	<pre id="login-signup-link" style="float:right; margin-top:-50px;">Welcome, <?= $_SESSION['username'] ?>! | <a href="/samples/blogs/account_process/logout.php">Log Out</a></pre>
	<pre id="login-signup-link" style="float:right; margin-top:-35px;"><a href="login_signup.php">Sign Up</a></pre>
<?php endif; ?>
<form method="post" action="result.php">
    <p class="search">
        <input id="search" name="search" type="text" style="background-color: white"/>
        <input type="submit" value="Search" style="background-color: white"/>
    </p>
</form>