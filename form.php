<!-- <!DOCTYPE html>
<head>
    <title>data from form</title>
</head>

<body>
    <?php
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
        $text = "";
        if (isset($_GET["emotion"])) $emotion = $_GET["emotion"];
        if (isset($_GET["description"])) $description = $_GET["description"];
    ?>

	<p><b>emotion: </b>
	
	<?php
        if (isset($emotion)) {
            if ($emotion == "Angry") {
                echo "[Angry]";
            } else {
                echo "[Happy]";
            }
        } else {
            echo "";
        }
    ?>

    <p><b>Description: </b>

    <?php
        // if (empty($sendText)) {
        //     $sendText = "";
        // } else {
        //     echo $sendText;
        // }

        if (isset($description) && $description != "") {
            echo $description;
        } else {
            echo "none provided";
        }

    ?>


</body>
</html> -->