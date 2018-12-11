<?php
include("functions.php");
require "connect.php";

$query = mysqli_query($db, "SELECT user_id, password, role FROM `users` WHERE login='".mysqli_real_escape_string($db, $_POST['login'])."' LIMIT 1");
$data = mysqli_fetch_assoc($query);

if (($data['password'] === md5(md5($_POST['password']))))
{
    $user = $_POST['login'];
    echo "Hello, <b>$user</b><br>";
    echo "<a href='./log_out.php'>Exit</a><br>";
    $_SESSION['logged_user'] = $_POST['login'];
    //mysqli_close($db);
    visualizeTable($data);
}
elseif ($_SESSION['logged_user'])
{
    $user = $_SESSION['logged_user'];
    $query = mysqli_query($db, "SELECT user_id, password, role FROM `users` WHERE login='$user' LIMIT 1");
    $data = mysqli_fetch_assoc($query);

    echo "Hello, <b>$user</b><br>";
    echo "<a href='./log_out.php'>Exit</a><br>";
    visualizeTable($data);
}
else
    echo "Wrong login/password.";
mysqli_close($db);
?>
