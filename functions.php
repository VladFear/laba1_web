<?php
function visualizeTable($data=null)
{
    // Соединямся с БД
    require "connect.php";

    if ($data['role'] === "user")
    {
        $sql_query = "SELECT `user_id` FROM `users` WHERE `login`='{$_SESSION['logged_user']}' LIMIT 1;";
        $query = mysqli_query($db, $sql_query);
        $d = mysqli_fetch_assoc($query);
        $id = $d['user_id'];
        echo "<a name =\"ch\" href='./change.php?ch=$id'>Change info</a>";
    }

    $sql_query = "SELECT * FROM `users`";
    $result = $db->query($sql_query);
    $row_count = $result->num_rows;
    $field_count = $result->field_count - 1;
    
    echo "<table id='table_id' border=1 style='margin: auto; border-collapse: collapse;'>";
    echo "<tr>";
    echo "<td>ID</td>";
    echo "<td>FirstName</td>";
    echo "<td>LastName</td>";
    echo "<td>Login</td>";
    echo "<td>Role</td>";
    echo "<td>Photo</td>";

    if ($data['role'] === "admin")
    {
        echo "<td>Delete</td>";
        echo "<td>Change</td>";
    }
    
    echo "</tr>";
    echo "<tbody id='table1'>";
    while ($row = $result->fetch_array())
    {
        echo "<tr>";
        echo "<td>".$row['user_id']."</td>";
        echo "<td>".$row['first_name']."</td>";
        echo "<td>".$row['last_name']."</td>";
        echo "<td>".$row['login']."</td>";
        echo "<td>".$row['role']."</td>";
        echo "<td>".'<IMG width = "100" src="'.$row['photo'].'">'."</td>";

        if ($data['role'] === "admin")
        {
            echo "<td><a name = \"del\" href='./delete.php?del=".$row["user_id"]."' style='width:100%; display:block; height:100%;'>Delete user</a></td>";
            echo "<td><a name = \"ch\" href='./change.php?ch=".$row["user_id"]."' style='width:100%; display:block; height:100%;'>Change info</a></td>";
        }
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";

    $result->close();
    mysqli_close($db);
}
?>