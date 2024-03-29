<!DOCTYPE html> 
<html>
    <head>
        <style>

            #home_wrapper {
                width: 100%;
                text-align: center;
            }

            #output{
                width: 500px;
                height: 300px;
                padding: 0;
                margin: 0;
                border: 1px solid black;
                overflow: scroll;
                display: inline-block;            }

            .radioLabel {
                vertical-align: middle;
            }

            [type="radio"] {
            vertical-align: middle;
        }

        </style>
        <title>Chat</title>
    </head>
    <body>
        <script>

            function sendData() {

                const emotionNodeList = document.getElementsByName('emotion');
                var description = document.getElementById("description").value;
                var querystring = "";

                emotionNodeList.forEach((node) => {
                    if (node.checked) {
                        querystring = "emotion=" + escape(node.value) + "&";
                    }
                });
                querystring += "description="+escape(description);
                var xhr = new XMLHttpRequest(); 
                xhr.open ("POST", "add-message-to-db.php");
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                var result = ""

                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        for (var i = 0; i < emotionNodeList.length; i++) {
                            emotionNodeList[i].checked = false;
                            document.getElementById("description").value = "";
                        }
                    } 		
                };

                xhr.send(querystring);
                
            }



            function showOutput() {

                const emotionNodeList = document.getElementsByName('emotion');
                var description = document.getElementById("description").value;

                var xhr = new XMLHttpRequest(); 
                xhr.open ("GET", "list-messages-from-db.php");

                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        document.getElementById("output_txt").innerHTML = xhr.responseText;
                    }
                };

                xhr.send(null);

            }

            window.addEventListener('load', function(){
                document.getElementById("sendButton").addEventListener("click", sendData);
            });
            window.addEventListener('load', function(){
                document.getElementById("sendButton").addEventListener("click", showOutput);
            });
            


        </script>


        <p><a href = 'add-emotion-form.php'>Add New Emoticons</a></p>
        <div id = 'home_wrapper'>
            <h1>Live Blog</h1>
            <!-- <p>Choose Emotion</p> -->
            <form action = "add-message-to-db.php" method = "POST">
                <p>Choose Emotion:</p>
    
                <?php  
                    $db = mysqli_connect ('localhost', 'R00195941_db', 'LiftThanStand');
                    mysqli_select_db ($db, 'R00195941_db');
                    $charset_set = mysqli_set_charset ($db, 'utf8');

                    $current_result = mysqli_query ($db, "SELECT id, imgName FROM emotions;");

                    while ($row = mysqli_fetch_array($current_result)) {
                        echo "<input type='radio' id='{$row['id']}' name='emotion' value='{$row['id']}'><label for='{$row['id']}'><span class = 'radioLabel'>{$row['imgName']}<span class = 'radioLabel'></label>";
                    }
                ?>
                <br><br>
                <input type="text" id="description" name="description">
                <input type="button" id="sendButton" name="sendButton" value="Send">
            </form>

            <h1>Results</h1>

            <div id = "output">
                <div id = "output_img"></div>
                <div id = "output_txt"></div>
            </div>
        </div>
    </body>
</html>