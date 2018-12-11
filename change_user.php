<?php
require "connect.php";

$id = $_POST['id'];
$first = $_POST['first_name'];
$last = $_POST['last_name'];
$password = md5(md5(trim($_POST['password'])));
$photo = $_FILES['photo']['name'];
$folder = "images/";
$result_path = "$folder"."$photo";
move_uploaded_file($_FILES['photo']['tmp_name'], "$result_path");

$sql = "UPDATE `users` SET `first_name`='$first', `last_name`='$last', `password`='$password', `photo`='$result_path' WHERE `user_id`=$id;";
mysqli_query($db, $sql);
mysqli_close($db);

header("Location: ./log_in.php");
?>