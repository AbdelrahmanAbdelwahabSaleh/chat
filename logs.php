<?php
$con = mysql_connect('localhost','root','12345678');
mysql_select_db('chatbox', $con);
$result1 = mysql_query("SELECT * FROM logs ORDER BY id ASC");
while($extract = mysql_fetch_array($result1)) {
	echo "<span>" . $extract['username'] . "</span>: <span>" . $extract['msg'] . "</span><br />";
}