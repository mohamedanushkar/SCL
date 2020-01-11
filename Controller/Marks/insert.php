<?php
//insert.php
$connect = mysqli_connect("localhost", "root", "", "finalsystemdb");

 $Exam_ID = $_POST["Exam_ID"];   
 $Student_ID = $_POST["Student_ID"];
 $Marks = $_POST["Marks"];

 $query = '';
 for($count = 0; $count<count($Student_ID); $count++)
 {
    $Exam_ID_clean= mysqli_real_escape_string($connect, $Exam_ID[0]); 
 
  $Student_ID_Clean = mysqli_real_escape_string($connect, $Student_ID[$count]);
  $Marks_Clean = mysqli_real_escape_string($connect, $Marks[$count]);

  if($Exam_ID_clean != '' && $Student_ID_Clean != '' && $Marks_Clean != '' )
  {
   $query .= '
   INSERT INTO result(ExamID, Student_id, Marks) 
   VALUES("'.$Exam_ID_clean.'", "'.$Student_ID_Clean.'", "'.$Marks_Clean.'"); 
   ';
  }
 }
 if($query != '')
 {
  if(mysqli_multi_query($connect, $query))
  {
   echo '<p style="background-color: #EBF8A4; border-left: 5px solid red; padding: 10px; border-radius: 10px; font-family:  sans-serif">
   Date Inserted
    </p>';
  }
  else
  {
   echo '<p style="background-color: #F8C740; border-left: 5px solid red; padding: 10px; border-radius: 10px; font-family:  sans-serif">
   Error
    </p>';
  }
 }
 else
 {
 echo '<p style="background-color: #F8C740; border-left: 5px solid red; padding: 10px; border-radius: 10px; font-family:  sans-serif">
   All Fields Are Reqiured
    </p>';
 }

?>
