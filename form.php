<!DOCTYPE html>
<head>
    <title>data from form</title>
</head>

<body>
    <?php
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
        if (isset($_GET["emotion"])) $emotion = $_GET["emotion"];
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


</body>
</html>