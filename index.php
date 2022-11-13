<!DOCTYPE html> 
<html>
    <head>
        <style>
            #output{
                width: 300px;
                height: 300px;
                border: 1px solid black;
                overflow: scroll;
            }

            .result {
                font-family: helvetica, sans-serif;
                background: #f2f2f2; 
                border-top: 0.5px solid #bfbfbf;
                border-bottom: 0.5px solid #bfbfbf;
                padding: 5px;
            }
            
            .result:hover {
                background: pink;
            }
        </style>
        <title>Chat</title>
    </head>
    <body>
        <script>

            function sendData() {

                const emotionNodeList = document.getElementsByName('emotion');
                var description = document.getElementById("description").value;


                // var request = "list-messages-from-db.php?message=" + escape(document.getElementByName('description').value) + escape(document.getElementById('description').value);
                // var request = "list-messages-from-db.php?";
                var querystring = "";

                emotionNodeList.forEach((node) => {
                    if (node.checked) {
                        querystring = "emotion=" + escape(node.value) + "&";
                    }
                });

                // var rbs = document.querySelectorAll('input[name="emotion"]');
                // var selection = null;
                // for (var i = 0; i < rbs.length; i++) {
                //     if (rbs[i].checked) {
                //         selection = rbs[i].value;
                //         break;
                //     }
                // }

                querystring += "description="+escape(description);

                // /* Check which emotion was selected in radio button */
                // if (isset($emotion)) {
                //     if ($emotion == "Angry") {
                //         echo "emotion: Angry";
                //     } else {
                //         echo "emotion : Happy";
                //     }
                // } else {
                //     echo "emotion not entered";
                // }


                // var request = "index.php";
                var xhr = new XMLHttpRequest(); 
                xhr.open ("POST", "add-message-to-db.php");
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                var result = ""

                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        
                        // if (document.getElementById("angry").checked || document.getElementById("happy").checked) {
                        //     emotionNodeList.forEach((node) => {
                        //         if (node.checked) {
                        //             result = result + node.value;
                        //         }
                        //     });
                        // }
                        // result = result + "\n" + description;
                        // document.getElementById('output').innerText = result;
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

                // var querystring = "";

                // /* Check which emotion was selected in radio button */
                // if (isset($emotion)) {
                //     if ($emotion == "Angry") {
                //         echo "emotion: Angry";
                //     } else {
                //         echo "emotion : Happy";
                //     }
                // } else {
                //     echo "emotion not entered";
                // }

                var xhr = new XMLHttpRequest(); 
                xhr.open ("GET", "list-messages-from-db.php");

                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        document.getElementById("output").innerHTML = xhr.responseText;



                        // if (document.getElementById("angry").checked || document.getElementById("happy").checked) {
                        //     emotionNodeList.forEach((node) => {
                        //         if (node.checked) {
                        //             result = result + node.value;
                        //         }
                        //     });
                        // }
                        // result = result + "\n" + description;
                        // document.getElementById('output').innerText = result;
                        // for (var i = 0; i < emotionNodeList.length; i++) {
                        //     emotionNodeList[i].checked = false;
                        //     document.getElementById("description").value = "";
                        // }
                    }
                };

                xhr.send(null);

            }

            // var button = document.getElementById("sendButton");
            // // button.addEventListener("click", sendData);
            // button.addEventListener("click", showOutput);

            window.addEventListener('load', function(){
                document.getElementById("sendButton").addEventListener("click", sendData);
            });
            window.addEventListener('load', function(){
                document.getElementById("sendButton").addEventListener("click", showOutput);
            });
            


        </script>
        
        <p><a href = 'add-emotion-form.php'>Add New Emoticons</a></p>
        <h1>Live Blog</h1>
        <!-- <p>Choose Emotion</p> -->
        <form action = "add-message-to-db.php" method = "POST">
            <p>Choose Emotion:</p>
            <input type="radio" id="angry" name="emotion" value="1">
            <label for="angry">Angry</label>
            <input type="radio" id="happy" name="emotion" value="2">
            <label for="happy">Happy</label>
            <br><br>
            <input type="text" id="description" name="description">
            <input type="button" id="sendButton" name="sendButton" value="Send">
        </form>

        <h1>Results</h1>

        <div id = "output">
        </div>
          
          
          
          
          
          <!-- <script src="script.js"></script> -->
    </body>
</html>