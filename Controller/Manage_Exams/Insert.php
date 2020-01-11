
<?php

//insert.php
include '../../model/Connection.php';


$Grade_ID = $_POST["Grade_ID"];
$Exam_Name_ID = $_POST["Exam_Name_ID"];
$Subject_ID = $_POST["Subject_ID"];
$Exam_Time = $_POST["Exam_Time"];
$Date = $_POST["Date"];



if ($Grade_ID != '') {

    $sql = "INSERT INTO `exam`(`Grade_ID`, `Subject_ID`, `Exam_Name_ID`, `Exam_Time`, `Date`) VALUES('$Grade_ID','$Subject_ID','$Exam_Name_ID','$Exam_Time','$Date')";

    $conn->query($sql);
    $last_id = $conn->insert_id;
    echo "<td>{$last_id}</td>";
    echo "<td>{$Grade_ID}</td>";
    echo "<td>{$Exam_Name_ID}</td>";
    echo "<td>{$Subject_ID}</td>";
    echo "<td>{$Exam_Time}</td>";
    echo "<td>{$Date}</td>";

    echo " <td> <a  class='edit' data-id='{$last_id}'> <i  class='fa fa-edit'></i></a></td>";
    echo "<td>  <a  class='del' data-id='{$last_id}'> <i  class='fa fa-trash'></i></a></td>";
    echo "<script language='javascript' type='text/javascript'>";
    echo "alert('Date Entered Successfully');";
    echo "</script>";
} else {

    echo "<script language='javascript' type='text/javascript'>";
    echo "alert('all fields are required');";
    echo "</script>";
}
?>
