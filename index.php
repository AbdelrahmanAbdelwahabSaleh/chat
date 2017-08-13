<html>
<head>
<title>Chat Box</title>
<script src="http://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script>
function submitChat() {
	if(form1.uname.value == '' || form1.msg.value == '') {
		alert("ALL FIELDS ARE MANDATORY!!!");
		return;
	}
	var uname = form1.uname.value;
	var msg = form1.msg.value;
	var xmlhttp = new XMLHttpRequest();
	
	xmlhttp.onreadystatechange = function() {
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById('chatlogs').innerHTML = xmlhttp.responseText;
		}
	}
	
	xmlhttp.open('GET','insert.php?uname='+uname+'&msg='+msg,true);
	xmlhttp.send();

}
$(document).ready(function(e){
	$.ajaxSetup({
		cache: false
	});
	setInterval( function(){ $('#chatlogs').load('logs.php'); }, 2000 );
});

$(".msg").on('keyup', function (e) {
    if (e.keyCode == 13) {
        submitChat();
    }
});


</script>
</head>
<body>
<div id="chatlogs">
LOADING CHATLOG...
</div>
<form name="form1">
Enter Your Chatname: <input type="text" name="uname" /> <br />
Your Message: <br />
<input type="text" name="msg" id="msg" /><br />
<input type="button" value="Send" name="send" id="sub" onclick="submitChat()" />
</form>
</body>