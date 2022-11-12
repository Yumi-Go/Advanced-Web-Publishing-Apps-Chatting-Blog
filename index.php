<!DOCTYPE html>
<html>
    <head>
        <title>Chat</title>
    </head>
    <body>
        <p><a href = 'add-emotion-form.php'>Add New Emoticons</a></p>
        <h1>Live Blog</h1>
        <!-- <p>Choose Emotion</p> -->
        <form action="form.php" method = get>
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
          
          
          
          
          
          <script src="script.js"></script>
    </body>
</html>