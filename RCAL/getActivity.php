<?php

include_once 'DBConnect.php';
section_start();
$sql = "SELECT * FROM activity";
$result = mysql_query($sql) or die(mysql_error());
?>