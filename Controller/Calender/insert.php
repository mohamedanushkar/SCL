
<?php


if(isset($_POST["title"]))
{
    include '../../model/Connection.php';
    $title = $_POST["title"];
    $Start = $_POST["start"];
    $end = $_POST["end"];





    $query = "
 INSERT INTO tbl_events 
 (title, start_event, end_event) 
 VALUES ('$title', '$Start', '$end')
 ";

    $conn->query($query);



}


?>

