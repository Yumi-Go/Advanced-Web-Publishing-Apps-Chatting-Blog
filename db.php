<html>
<head>
	<title> Message Board </title>
</head>
<body>
<!-- 

We will use this table


CREATE TABLE `dblab2` (
  `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `subject` text NOT NULL,
  `post` text NOT NULL
);


-->

<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $db = mysqli_connect ("127.0.0.1", "R00195941_db", "LiftThanStand");
    mysqli_select_db ($db, "R00195941_db");
    $charset_set = mysqli_set_charset ($db, 'utf8');



    /* Get the user data */

    $new_emotion = $_POST['emotion'];

    $new_description = $_POST['description'];


    /* escape the user input to make it safe to place in a query */
    $safe_subject = mysqli_real_escape_string($db, $new_subject);
    $safe_post = mysqli_real_escape_string($db, $new_post);

    

    

    /* Send the SQL query to the database and store the result */

    $result = mysqli_query ($db, "INSERT into dblab2 (subject, post) VALUES ('$safe_subject','$safe_post');");

    /* Check if the query was successful */
    if ($result) 
    {
        echo "<p>Message was added!</p>";
    }
    else
    {
        echo "Error!";
    }
?>



<p>Enter <a href = "form.html">a new message</a></p>
<p>View <a href = "display-messages.php">list of posts</a></p>

</body>
</html>