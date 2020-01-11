<?php

//insert.php
include '../../model/Connection.php';
$Exam_Name = $_POST["Exam_Name"];
if ($Exam_Name != '') {

    $query = "INSERT INTO `Exam_Name`(`Exam_Name`)VALUES('$Exam_Name')";
    $conn->query($query);


    $last_id = $conn->insert_id;

    echo "<td>{$last_id}</td>";
    echo "<td>{$Exam_Name}</td>";
    echo " <td> <a  class='edit' data-id='{$row["id"]}'> <i  class='fa fa-edit'></i></a></td>";
    echo "<td>  <a  class='del' data-id='{$row["id"]}'> <i  class='fa fa-trash'></i></a></td>";
    echo "<script language='javascript' type='text/javascript'>";
    echo "alert('Record Inserted Successfully');";
    echo "</script>";
} else {

    echo "<script language='javascript' type='text/javascript'>";
    echo "alert('all fields are required');";
    echo "</script>";
}
?>
