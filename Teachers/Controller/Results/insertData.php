<?php
include './../../../model/Connection.php';

$Batch = $_POST["BatchNumber"];
$StudentList = $_POST["StudentList"];
$Subject = $_POST["Subject_ID"];
$Marks = $_POST["Marks"];



$query = '';

for($count = 0; $count<count($Marks); $count++)
{
    $Subject_Clean = mysqli_real_escape_string($conn, $Subject[$count]);
    $Marks_Clean = mysqli_real_escape_string($conn, $Marks[$count]);

    $query .= "INSERT INTO `tbl_exam_results`(`Exam_ID`, `Subject_ID`, `Student_ID`, `Marks`) VALUES ('$Batch','$Subject_Clean','$StudentList','$Marks_Clean');";

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
