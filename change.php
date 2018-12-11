<?php
require "connect.php";

$id = $_GET['ch'];
$sql_query = "SELECT `first_name`, `last_name`, `password` FROM `users` WHERE `user_id`=$id LIMIT 1;";
$query = mysqli_query($db, $sql_query);
$d = mysqli_fetch_assoc($query);
$first = $d['first_name'];
$last = $d['last_name'];
$password = $d['password'];

echo "<a href='./log_in.php'>Return</a>";
echo "<br>";
echo "<br>";

echo "<form action='./change_user.php' method='POST' enctype='multipart/form-data'>";
echo "<fieldset style='width: 300px;'>";
echo "<legend>Info</legend>";
echo "<label>ID: </label>";
echo "<input style='display: block;' type='text' name='id' value='$id' readonly></input>";
echo "<label>Change First Name: </label>";
echo "<input style='display: block;' type='text' name='first_name' value='$first'></input>";
echo "<label>Change Second Name: </label>";
echo "<input style='display: block;' type='text' name='last_name' value='$last'></input>";
echo "<label>Change Password: </label>";
echo "<input style='display: block;' type='password' name='password'></input>";
echo "<label>Change Photo: </label>";
echo "<input style='display: block;' type='file' name='photo'>";
echo "</fieldset>";
echo "<br>";
echo "<input type='submit' name='change' value='Submit'</input>";
echo "</form>";
?>