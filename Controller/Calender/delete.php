<?php

//delete.php

if(isset($_POST["id"]))
{

    include '../../model/Connection.php';

    $ID = $_POST["id"];


    $sql = "DELETE from tbl_events WHERE id='$ID'";
    $conn->query($sql);

}

?>
