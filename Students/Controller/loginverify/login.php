<?php
include './../../../model/Connection.php';


session_start();



$UserName =$_POST["UserName"];
$password =  $_POST["Password"];

$sql = "SELECT * FROM `tbl_student` WHERE tbl_student.Student_Email = '$UserName' AND tbl_student.password = '$password'";

$result =  $conn->query($sql);


if (mysqli_num_rows($result)>0) {
    // output data of each row
    while($row = mysqli_fetch_array($result)) {

        $_SESSION["User"] = $row["Student_Name"];
        $_SESSION["StuID"] = $row["Student_ID"];

        $_SESSION["Address"] = $row["Student_Address"];
        $_SESSION["Phone"] = $row["Student_Phone"];

        


        header('Location:./../../view/dashboard.php');
    }
} else {

    header('Location:./../../index.php');

}

    ?>