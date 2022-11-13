<html>
<head>
    <style>
        #img { width: 60px; }
        .avatar { margin: 1em; }
    </style>
	<title>Add New Emoticons</title>
</head>

<body>

<?php
	 
    // $emoticonGroup = array(
    //     "01.png",
    //     "02.png",
    //     "03.png",
    //     "04.png",
    //     "05.png",
    //     "06.png",
    //     "07.png",
    //     "08.png"
    // );

    // if (isset($_GET["image"])) {
    //     $currentImage = $_GET["image"];
    //     echo "<img src = 'emoticons/$currentImage'></a><br>$currentImage</div>";
        
    //     if (isset($_GET["prev"])) {
        
    //         $prevPage = $_GET["prev"];
    //         // $prevPage = $_SERVER['HTTP_REFERER']

    //         if(isset($prevPage)) {
    //             // echo $prevPage;
    //             echo "<p><a href = 'index.php?list=$prevPage'>Back to Emoticons List</a>";
    //         }
    //         // else {
    //         //     echo "<a href="/">Back to Emoticons List</a>";
    //         // }

        
    //     }
	 
    // }

?>

	<h1>Create New Emoticon</h1>

    

<!-- 
CREATE TABLE 'messages' (
  'id' int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  'emotion_id' int NOT NULL,
  'description' text NOT NULL,
  'time' datetime NOT NULL
);

CREATE TABLE 'emotions' (
  'id' int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  'image' varchar NULL, 
  'name' varchar NOT NULL
);
-->
	 
<?php
    // $images = $emoticonGroup;

    function findExts ($fileName) {
        $ext = pathinfo($fileName, PATHINFO_EXTENSION);
        return $ext;
    }

    $imageFormats = array('png', 'jpg', 'jpeg', 'gif');
    $imgDir = 'images/';
    $filesInDir = scandir($imgDir);

    echo "
    <div class = 'avatar'>
        <form action = 'add-emotion-to-db.php' method = 'POST'>
            <label for='name'>Name: </label>
            <input type='text' id='name' name='name'><br>
            <input type='radio' id='no_image' name='images' value='0'>
            <label for='no_image'>No Image</label><br>
    ";

    $counter = 1;

    foreach ($filesInDir as $currentImage) {
        // $safeCurrentImage = urlencode($currentImage);

        $tempExt = findExts($currentImage);
        if (in_array($tempExt, $imageFormats)) {
            $image_id = 'image'.$counter;
            $image_src = $imgDir.$currentImage;
            echo "
            <input type='radio' id='$image_id' name='images' value='$counter'>
            <label for='image_id'><img src='$image_src' id='img'></label>
            <br>
            ";
            $counter++;
        }
    }
    
    echo "
            <br><br>
            <input type='button' id='submitButton' name='submitButton' value='Submit'>
        </form>
    </div>
    ";


        //     <div class = 'avatar'>
        //         <a href = 'add_emoticon.php?image=$safeCurrentImage&prev=index.php'><img src = 'emoticons/$currentImage'></a><br>$currentImage
        //     </div>
        // ";
        
?>
</body>
</html>