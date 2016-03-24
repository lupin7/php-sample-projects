<?php
	require('connect.php');        // connect to the database
    session_start();

    // Select query for all the rows
	$select_all = "SELECT * FROM blogs ORDER BY datetime DESC";
    $result = $db->query($select_all);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
    <title>Blog - All Archived Posts</title>
    <link rel="stylesheet" href="styles.css" type="text/css" />
</head>
<body>
    <div id="wrapper">
        <div id="header">
            <h1><a href="index.php">Blog - Archive</a></h1>

            <?php include 'constants/search.php'; ?>

        </div> 
        
        <?php include 'constants/navigation.php'; ?>
		
        <!-- if the query contains rows -->
		<?php if ($result->num_rows): ?>
        <h3>Blog Archives:</h3>
        <ul id="posts">
            <?php while($row = $result->fetch_assoc()): ?>
                <li>
                    <!-- link the title to the show.php?id=(containing id) -->
                	<h2><a href="show.php?id=<?= $row['id'] ?>"><?= $row['title'] ?></a></h2>
                    <!-- format the date, put them in a <small> tag, 
                         edit text contains link to editing the post,
                         and a view link for a full view of the content -->
                    <?php $date = date('F d, Y - h:iA', strtotime($row['datetime'])); ?>
                	<small><?= $date ?> - 
                        <a href="show.php?id=<?= $row['id'] ?>">
                            <span class="blue_link">view</span>
                        </a> - 
                        <a href="edit.php?id=<?= $row['id'] ?>"><span class="blue_link">edit</span>
                        </a>
                    </small>
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