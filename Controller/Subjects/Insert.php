<?php

//insert.php
include '../../model/Connection.php';
$Subject_Name = $_POST["Subject_Name"];
if ($Subject_Name != '') {

    $query = "INSERT INTO `Subject`(`Subject_Name`)VALUES('$Subject_Name')";
    $conn->query($query);


    $last_id = $conn->insert_id;

    echo "<td>{$last_id}</td>";
    echo "<td>{$Subject_Name}</td>";
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
