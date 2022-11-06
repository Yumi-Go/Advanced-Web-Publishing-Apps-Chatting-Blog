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
    var description = document.getElementById("description").value;
    querystring += "description=" + encodeURI(description);
    // querystring += "&";

    location = "form.php" + querystring;
}


function showOutput() {

	// var request = "db.php?message=" + document.getElementById('description').value;
	var request = "/index.php";

	var xhr = new XMLHttpRequest(); 
   	xhr.open ("GET", request);
   	
   	xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
		    // document.getElementById("output").innerHTML = xhr.request;
            document.getElementById("output").innerHTML = document.getElementById("description").value;

		} 		
	};
	
	xhr.send(null);
}


var button = document.getElementById("sendButton");
// button.addEventListener("click", sendData);
button.addEventListener("click", showOutput);
