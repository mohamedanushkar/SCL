<?php

include './../../model/Connection.php';
 $Batch = $_POST["Batch"];
 $Teacher = $_POST["Teacher"];
 $Subject = $_POST["Subject"];
$Date = $_POST["Date"];
$StartTime = $_POST["StartTime"];
$EndTime = $_POST["EndTime"];



$query2 = "INSERT INTO `tbl_exam_schedule`( `Batch_ID`, `Teacher_ID`) VALUES('$Batch','$Teacher')";
$conn->query($query2);

$last_id = $conn-> insert_id;
 $query = '';
 for($count = 0; $count<count($Subject); $count++)
 {
  $Subject_Clean= mysqli_real_escape_string($conn, $Subject[$count]);
  $Date_Clean= mysqli_real_escape_string($conn, $Date[$count]);
  $StartTime_Clean = mysqli_real_escape_string($conn, $StartTime[$count]);
  $EndTime_Clean = mysqli_real_escape_string($conn, $EndTime[$count]);

   $query .= "INSERT INTO `exam_subjects`(`Exam_ID`, `Subject_ID`, `Date`, `Start_Time`, `End_Time`) VALUES ('$last_id','$Subject_Clean','$Date_Clean','$StartTime_Clean','$EndTime_Clean');";

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
