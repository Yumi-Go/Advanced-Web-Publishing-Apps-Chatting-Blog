<!DOCTYPE html>
<html>
    <head>
        <title>Chat</title>
    </head>
    <body>
        <script>

            window.onload = init;
            
            function init () {
                document.getElementById("sendButton").onclick = showOutput;
            }

            function showOutput() {
                var request = "db.php?message=" + escape(document.getElementById('description').value);
                // var request = "index.php";
                var xhr = new XMLHttpRequest(); 
                xhr.open ("GET", request);
                var description = document.getElementById("description").value;
                var result = ""
                const emotionNodeList = document.getElementsByName('emotion');

                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        // document.getElementById("output").innerHTML = xhr.request;

                        if (document.getElementById("angry").checked || document.getElementById("happy").checked) {
                            emotionNodeList.forEach((node) => {
                                if (node.checked) {
                                    result = result + node.value;
                                }
                            });
                        }
                        result = result + "\n" + description;
                        document.getElementById('output').innerText = result;
                        for (var i = 0; i < emotionNodeList.length; i++) {
                            emotionNodeList[i].checked = false;
                            document.getElementById("description").value = "";
                        }
                    } 		
                };

                xhr.send(null);
                

            }

            // var button = document.getElementById("sendButton");
            // // button.addEventListener("click", sendData);
            // button.addEventListener("click", showOutput);

        </script>
        
        <p><a href = 'add-emotion-form.php'>Add New Emoticons</a></p>
        <h1>Live Blog</h1>
        <!-- <p>Choose Emotion</p> -->
        <form>
            <p>Choose Emotion:</p>
            <input type="radio" id="angry" name="emotion" value="Angry">
            <label for="angry">Angry</label>
            <input type="radio" id="happy" name="emotion" value="Happy">
            <label for="happy">Happy</label>
            <br><br>
            <input type="text" id="description" name="description">
            <input type="button" id="sendButton" name="sendButton" value="Send">
        </form>

        <!-- use Ajax to return 20 most recent messages -->
        <h1>Results</h1>

        <div id = "output">
        </div>
          
          
          
          
          
          <!-- <script src="script.js"></script> -->
    </body>
</html>