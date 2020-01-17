<?php

include '../../model/Connection.php';
$id = $_POST["StuID"];
$Title = $_POST["NoticeTitle"];
$Dis= $_POST["Description"];
$date = date("Y-m-d");






if ($id != '') {

    $sql = "INSERT INTO `tbl_notice`(`Notice_Title`, `Description`, `Date`, `Student_ID`) VALUES ('$Title','$Dis','$date','$id')";

    $conn->query($sql);

   
    
    echo "<script language='javascript' type='text/javascript'>";
    echo "alert('Date Entered Successfully');";
    echo "</script>";
} else {

    echo "<script language='javascript' type='text/javascript'>";
    echo "alert('all fields are required');";
    echo "</script>";
}
?>

