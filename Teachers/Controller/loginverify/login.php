<?php
include './../../../model/Connection.php';


session_start();




$UserName =$_POST["UserName"];
$password =  $_POST["Password"];

$sql = "SELECT * FROM `tbl_teachers` WHERE tbl_teachers.Teachert_Email = '$UserName' AND tbl_teachers.password = '$password'";

$result =  $conn->query($sql);


if (mysqli_num_rows($result)>0) {
    // output data of each row
    while($row = mysqli_fetch_array($result)) {

        $_SESSION["User"] = $row["Teacher_Name"];
        $_SESSION["TechID"] = $row["Teacher_ID"];

        $_SESSION["Address"] = $row["Teacher_Address"];
        $_SESSION["Phone"] = $row["Teacher_Phone"];

        


        header('Location:./../../view/dashboard.php');
    }
} else {

    header('Location:./../../../index.php');

}

    ?>