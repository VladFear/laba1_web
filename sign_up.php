<?php
include("functions.php");

if (isset($_POST['button_sig_up']))
{
    require "connect.php";
    $err = [];

    if (!preg_match("/^[a-zA-Z0-9]+$/", $_POST['login']))
        $err[] = "Error input!";
    
    if (strlen($_POST['login']) < 3 or strlen($_POST['login']) > 40)
        $err[] = "Wrong size of login!";

    if ( strlen(trim($_POST['first'])) == 0 or strlen(trim($_POST['last'])) == 0)
        $err[] = "Empty name(first or last).";
    
    $query = mysqli_query($db, "SELECT user_id FROM `users` WHERE login='".mysqli_real_escape_string($db, $_POST['login'])."';");
    if (mysqli_num_rows($query) > 0)
        $err[] = "Пользователь с таким логином уже существует в базе данных";

    // Если нет ошибок, то добавляем в БД нового пользователя
    if (count($err) == 0)
    {
        $user = $_POST['login'];
        // Убираем лишние пробелы и делаем двойное хеширование
        $password = md5(md5(trim($_POST['password'])));
        $first = $_POST['first'];
        $last = $_POST['last'];
        $role = "user";
        $photo_default = "images/default.png";

        $sql = "INSERT INTO `users` (first_name, last_name, login, role, password, photo) VALUES ('$first', '$last', '$user', '$role', '$password', '$photo_default')";
        if (mysqli_query($db, $sql)) 
        {
            echo "New record created successfully<br>";
            $_SESSION['logged_user'] = $_POST['login'];
            echo "Hello, <b>$user</b><br>";
        	echo "<a href='./log_out.php'>Exit</a><br>";
            //mysqli_close($db);
            visualizeTable();
        } 
        else 
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);;
    }
    else
    {
        echo "<b>При регистрации произошли следующие ошибки:</b><br>";
        foreach ($err AS $error)
            echo $error."<br>";
    }
    mysqli_close($db);
}
?>
