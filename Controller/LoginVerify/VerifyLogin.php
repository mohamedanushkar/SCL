<?php
include '../../model/Connection.php';


session_start();


$UserName =$_POST["UserName"];
$password =  $_POST["Password"];

$sql = "SELECT * FROM `tbl_users` WHERE tbl_users.User_Name = '$UserName' AND tbl_users.Password = '$password'";

$result =  $conn->query($sql);



if (mysqli_num_rows($result)>0) {
    // output data of each row
    while($row = mysqli_fetch_array($result)) {

        $_SESSION["User"] = $row["Name"];
        $_SESSION['last_login_timestamp'] = time();
        header('Location:./../../View/management/Dashboard.php');
    }
} else {

    header('Location:./../../index.php');

}

    ?>