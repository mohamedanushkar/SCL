<?php
include './../../../model/Connection.php';

$Batch = $_POST["Batchno"];
$StudentList = $_POST["Student"];
$Subject = $_POST["Subject_ID"];
$Marks = $_POST["Marks"];



$query = '';

for($count = 0; $count<count($Marks); $count++)
{
    $Subject_Clean = mysqli_real_escape_string($conn, $Subject[$count]);
    $Marks_Clean = mysqli_real_escape_string($conn, $Marks[$count]);

    $query .= "INSERT INTO `tbl_exam_results`(`Exam_ID`, `Subject_ID`, `Student_ID`, `Marks`) VALUES ('$Batch','$Subject_Clean','$StudentList','$Marks_Clean');";


    runQuary("UPDATE `tbl_exam_schedule` SET `Status`='marked' WHERE tbl_exam_schedule.Exam_ID = 'Batch'","updated");
}
if($query != '')
{


 if(mysqli_multi_query($conn, $query))
    {
        echo '<script>alert("Data Inserted")</script>';
    }
    else
    {
        echo '<script>alert("Error")</script>';
    }
}
else
{
    echo '<script>alert("All Fields Are Required")</script>';
}

?>
