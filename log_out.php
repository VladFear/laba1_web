<?php
require "connect.php";
unset($_SESSION['logged_user']);
echo $_SESSION['logged_user'];
header("Location: ./index.php");
?>