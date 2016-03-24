<!-- 
    Blogs:
    - Blogs sample project
    - Shows an excerpt of the 5 latest posts or updates with timestamps. 
    - These can either be viewed or edited
    - Included in every page is a search bar that searches the database for keywords and shows which posts contain those keywords
    - Navigation included on all pages with access to the CMS and ESP game page.
-->

<?php
	require('connect.php');        // connect to the database

    // Select query for the latest 5 posts
	$select_5  = "SELECT * FROM blogs ORDER BY datetime DESC LIMIT 5";
    $result = $db->query($select_5);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
    <title>Blog - Home Page</title>
    <link rel="stylesheet" href="styles.css" type="text/css" />
</head>
<body>
    <div id="wrapper">
        <div id="header">
            <h1><a href="index.php">Blog - Index</a></h1>

            <?php include 'constants/search.php'; ?>

        </div> 
		
        <?php include 'constants/navigation.php'; ?>

		<?php if ($result->num_rows): ?>
        <h3>5 Latest Blog Posts:</h3>
        <ul id="posts">
            <?php while($row = $result->fetch_assoc()): ?>
                <li>
                    <!-- link the title to the show.php?id=(containing id) -->
                	<h2><a href="show.php?id=<?= $row['id'] ?>"><?= $row['title'] ?></a></h2>
                	
                    <!-- format the date, put them in a <small> tag, 
                         edit text contains link to editing the post -->
                    <?php $date = date('F d, Y - h:iA', strtotime($row['datetime'])); ?>
                    <small><?= $date ?> - 
                        <a href="edit.php?id=<?= $row['id'] ?>">
                            <span class="blue_link">edit</span>
                        </a>
                    </small>
                	
                    <!-- store content -->
                    <?php $content = $row['content'] ?>
                    
                    <!-- condition if the characters of the post is more than 200,
                         truncate the text and put a link to it's full post -->
                    <?php if(strlen($content) > 200): ?>
                        <p><?= substr($content, 0, 200) ?> ... 
                            <a href="show.php?id=<?= $row['id'] ?>"> 
                                <span class="blue_link">Read Full Post</span> 
                            </a>
                        </p>
                    <?php else: ?>
                    
                    <!-- whole content of the row if not more than 200 characters -->
                        <p><?= $content ?></p>
                    <?php endif ?>
                </li>
            <?php endwhile ?>
        </ul>
        
        <?php else: ?>
        <!-- when no blog post -->
            <p>There are no blog posts in our system.</p>
        <?php endif ?>
        
        <div id="footer">
            <h5>Copywrong <?= date('Y') ?> - Every Rights</h5>
        </div> 
	</div>
</body>
</html>