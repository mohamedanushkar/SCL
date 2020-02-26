
<?php






include '../../model/Connection.php';

$data = array();


$query = "SELECT * FROM tbl_events ORDER BY id";
$result = mysqli_query($conn, $query);
foreach($result as $row)
{
    $data[] = array(
        'id'   => $row["id"],
        'title'   => $row["title"],
        'start'   => $row["start_event"],
        'end'   => $row["end_event"]
    );
}

echo json_encode($data);

?>