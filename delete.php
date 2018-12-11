<?php
require "connect.php";

$id = $_GET['del'];
$query = $db->query("DELETE FROM `users` WHERE user_id='$id' LIMIT 1;");

header("Refresh:0 url=./log_in.php");
?>