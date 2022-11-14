<html>
<head>
    <style>
        #img { width: 60px; }
        .avatar { margin: 1em; }
    </style>
	<title>Add New Emoticons</title>
</head>

<body>

<!-- <script>
    function addEmotion() {
    
        const imageNodeList = document.getElementsByName('image');
        var image_name = document.getElementById("image_name").value;
   
        // var querystring = "?";
        // var rbs = document.querySelectorAll('input[name="image"]');
        // var image = null;
        // for (var i = 0; i < rbs.length; i++) {
        //     if (rbs[i].checked) {
        //         image = rbs[i].value;
        //         break;
        //     }
        // }
        // querystring = "image=" + escape(image) + "&";

        var querystring = "?";
        imageNodeList.forEach((node) => {
            if (node.checked) {
                querystring += "image=" + escape(node.value) + "&";
            }
        });

        querystring += "image_name="+escape(image_name);
        location = "add-emotion-to-db.php"+querystring;
    }

    window.addEventListener('load', function(){
        document.getElementById("submitButton").addEventListener("click", addEmotion);
    });


</script> -->

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

    function findExts ($fileName) {
        $ext = pathinfo($fileName, PATHINFO_EXTENSION);
        return $ext;
    }

    function findName ($fileName) {
        $fName = pathinfo($fileName, PATHINFO_FILENAME);
        return $fName;
    }

    $imageFormats = array('png', 'jpg', 'jpeg', 'gif');
    $imgDir = 'images/';
    $filesInDir = scandir($imgDir);

    echo "
    <div class = 'avatar'>
        <form action = 'add-emotion-to-db.php' method = 'post'>
            <label for='image_name'>Name: </label>
            <input type='text' id='image_name' name='image_name'><br>
            <input type='radio' id='no_image' name='image' value='None'>
            <label for='no_image'>No Image</label><br>
    ";

    // $radiobtn_echo = '';
    // foreach ($filesInDir as $currentImage) {
    //     // $safeCurrentImage = urlencode($currentImage);
    //     $tempExt = findExts($currentImage);
    //     if (in_array($tempExt, $imageFormats)) {
    //         $imageNo = findName($currentImage);
    //         $imageSrc = $imgDir.$currentImage;   
    //         $phrase = "<p>for check: $currentImage</p>\n
    //         <input type='radio' id='$imageNo' name='image' value='$imageNo'>\n
    //         <label for='$imageNo'><img src='$imageSrc' id='img'></label><br>\n";
    //         $radiobtn_echo = $radiobtn_echo . ' ' . $phrase;
    //     }
    // }
    // echo "$radiobtn_echo";


    foreach ($filesInDir as $currentImage) {
        // $safeCurrentImage = urlencode($currentImage);
        $tempExt = findExts($currentImage);
        if (in_array($tempExt, $imageFormats)) {
            $imageNo = findName($currentImage);
            $imageSrc = $imgDir.$currentImage;
            echo "<p>for check: $currentImage</p><input type='radio' id='$imageNo' name='image' value='$imageNo'><label for='$imageNo'><img src='$imageSrc' id='img'></label><br>";
        }
    }

    echo "<br><br><input type='submit' id='submit' name='submit' value='Submit'></form></div>";

?>
</body>
</html>