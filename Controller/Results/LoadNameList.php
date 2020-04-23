<?php
include '../../model/Connection.php';



$BatchID = $_POST["id22"];
$output = '';
$query = "SELECT `tbl_student`.`Student_Name` , tbl_student.Student_ID FROM tbl_batch_students INNER JOIN tbl_student ON tbl_student.Student_ID = tbl_batch_students.Student_ID WHERE tbl_batch_students.Batch_ID ='$BatchID' ";
$result = $conn-> query( $query);



if ($result -> num_rows > 0)
{
    $output .= '<option value="0">-- Select Value--</option>';
    while ($row = $result -> fetch_assoc()){
        $output .= '<option value="'.$row["Student_ID"].'">'.$row["Student_Name"].'</option>';
    }
}

echo  $output;
?>
