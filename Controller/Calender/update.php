
<?php

//update.php



if(isset($_POST["id"]))
{


    include '../../model/Connection.php';
    $ID = $_POST["id"];
    $title = $_POST["title"];
    $Start = $_POST["start"];
    $end = $_POST["end"];


    $query = " UPDATE tbl_events  SET title='$title', start_event='$Start', end_event='$end'  WHERE id='$ID' ";










    $conn->query($query);
}

?>
