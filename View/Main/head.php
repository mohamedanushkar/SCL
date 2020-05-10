<?php
// Start the session
session_start();


// if(isset($_SESSION['User']) && !empty($_SESSION['User'])) {
//     if((time() - $_SESSION['last_login_timestamp']) > 60) // 900 = 15 * 60
//     {
//         header('location:./../../index.php');
//     }
//     else
//     {
//         $_SESSION['last_login_timestamp'] = time();

//     }
// }
// else{
//     header('location:./../../index.php');
// }

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>School Management System</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
<?php
include 'links.php';
?>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
