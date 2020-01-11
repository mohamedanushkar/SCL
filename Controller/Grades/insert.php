<?php

//insert.php
include '../../model/Connection.php';
$teacher_ID = $_POST["Teacher_ID"];
$Grade_Name = $_POST["GradeName"];
if ($Grade_Name != '') {

    $query = "INSERT INTO `Grade`(`Teachers_ID`,`Grade_Name`)VALUES('$teacher_ID','$Grade_Name')";
    $conn->query($query);


    $last_id = $conn->insert_id;

    echo "<td>{$last_id}</td>";
    echo "<td>{$teacher_ID}</td>";
    echo "<td>{$Grade_Name}</td>";
    echo "<td> <button type='button' class='btn btn-sm btn-info edit'  data-id='{$last_id}'> <i class='fa fa-edit'></i></button></td>";
    echo "<td> <button type='button' class='btn btn-sm btn-danger del' data-id='{$last_id}'> <i class='fa fa-trash'></i></button></td>";
    echo "<script language='javascript' type='text/javascript'>";
    echo "alert('Record Inserted Successfully');";
    echo "</script>";
} else {

    echo "<script language='javascript' type='text/javascript'>";
    echo "alert('all fields are required');";
    echo "</script>";
}
?>
