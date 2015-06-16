<?php
    $conn = mysql_connect("localhost", "root", "123") or die("无法连接数据库！");
	mysql_select_db("qq_reply", $conn) or die("无法打开数据库");
?>