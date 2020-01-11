<?php

include '../../model/Connection.php';

$id = $_POST["id"];


if ($id == '') {
    echo 'error';
} else {
    $sql = "DELETE FROM `finalsystemdb`.`Exam_Name` WHERE Exam_Name_ID = '$id'";
    $conn->query($sql);
    echo "<script language='javascript' type='text/javascript'>";
    echo "alert('Deleted Student Record');";
    echo "</script>";
}
?>
