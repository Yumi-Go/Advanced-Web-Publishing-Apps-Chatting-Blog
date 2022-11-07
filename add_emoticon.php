<title>Add New Emoticons</title>

<style>
    .avatar img {width: 60px;}
	.avatar { margin: 1em; }
</style>	

<?php
	 
    $emoticonGroup = array(
        "01.png",
        "02.png",
        "03.png",
        "04.png",
        "05.png",
        "06.png",
        "07.png",
        "08.png"
    );

    if (isset($_GET["image"])) {
	
?>
	
	<h1>New Emoticon</h1>
		
<?php

        $currentImage = $_GET["image"];
        echo "<img src = 'emoticons/$currentImage'></a><br>$currentImage</div>";
        
        if (isset($_GET["prev"])) {
        
            $prevPage = $_GET["prev"];
            // $prevPage = $_SERVER['HTTP_REFERER']

            if(isset($prevPage)) {
                // echo $prevPage;
                echo "<p><a href = 'index.php?list=$prevPage'>Back to Emoticons List</a>";
            }
            // else {
            //     echo "<a href="/">Back to Emoticons List</a>";
            // }

        
        }
	 
    }	

?>

	<h1>List of Emoticons</h1>
	
	 
<?php
    $emoticons = $emoticonGroup;

    foreach ($emoticons as $currentImage) {
        $safeCurrentImage = urlencode($currentImage);
        
        
        echo "<div class = 'avatar'><a href = 'add_emoticon.php?image=$safeCurrentImage&prev=index.php'><img src = 'emoticons/$currentImage'></a><br>$currentImage</div>";
        
    }

?>
