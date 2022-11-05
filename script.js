function sendData() {
    var querystring = "?";
    if (document.getElementById("angry").checked || document.getElementById("happy").checked) {
        if (document.getElementById("angry").checked) {
            var emotion = "Angry";
        } else {
            var emotion = "Happy";
        }
        querystring += "emotion=" + encodeURI(emotion);
        querystring += "&";
    }
    location = "form.php" + querystring;
}

var button = document.getElementById("sendButton");
button.addEventListener("click", sendData);

