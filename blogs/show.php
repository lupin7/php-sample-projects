<?php
	require('connect.php');        // connect to the database
    session_start();

    // get the id with GET superglobal
    $id_num = $_GET['id'];
    // select query for the specific id number
    $select_blog  = "SELECT * FROM blogs WHERE id='{$id_num}' ";
    $result = $db->query($select_blog);

    // Check for numericality of the id, redirect to index page
    if(!is_numeric($id_num)){
        header('Location: index.php');
    }

    // loop through each row/the row to be obtained
    while($row = $result->fetch_assoc()){
        // store the title and content in variables
        $title = $row['title'];
        $content = $row['content'];

        // redefine the contents into it's original format with replace
        $content = str_replace("\r\n","\n",$content);
        // split each of the separated paragraphs
        $paragraphs = preg_split("/[\n]{2,}/",$content);
        // loop around to each paragraphs
        foreach ($paragraphs as $key => $p) {
            // add the <p> tags and replace the newlines(\n) to <br /> tags
            $paragraphs[$key] = "<p>".str_replace("\n","<br />",$paragraphs[$key])."</p>";
        }
        // redefine the content to contain paragraphs with it's own <p> tag
        $content = implode("", $paragraphs);
        // retrieve the datetime it was created
        $datetime = $row['datetime'];
    }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
    <title>Blog - <?= $title ?></title>
    <link rel="stylesheet" href="styles.css" type="text/css" />
</head>
<body>
    <div id="wrapper">
        <div id="header">
            <h1><a href="index.php">Blog - <?= $title ?></a></h1>
        
            <?php include 'constants/search.php'; ?>

        </div> 
		
        <?php include 'constants/navigation.php'; ?>

        <ul id="posts">
            <li>
                <!-- link the title to the show.php?id=(containing id) -->
                <h2><a href="show.php?id=<?= $id_num ?>"><?= $title ?></a></h2>
                <!-- format the date, put them in a <small> tag, 
                     edit text contains link to editing the post -->
                <?php $date = date('F d, Y - h:iA', strtotime($datetime)); ?>
                <small><?= $date ?> - 
                    <a href="edit.php?id=<?= $id_num ?>">
                        <span class="blue_link">edit</span>
                    </a>
                </small>
                <!-- display the content -->
                <?= $content ?>
            </li>
        </ul>
        <div id="footer">
            <h5>Copywrong <?= date('Y') ?> - Every Rights</h5>
        </div> 
    </div>
</body>
</html>