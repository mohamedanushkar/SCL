<?php


$servername = "localhost";
$username = "root";
$password = "";
$database = "finalsystemdb";

//Create connection
$conn = new mysqli($servername, $username, $password, $database);


if ($conn -> connect_error){
    die("Connection Failed: ".$conn->connect_error);
}


function runQuary($myCommand="",$msg="")
{
	
    global $conn;

	try
	{
		if (mysqli_query($conn, $myCommand)) {
			echo "<script type='text/javascript'>alert('{$msg}')</script>";
		}
		else {

            $error =  mysqli_error($conn);
            echo "<script type='text/javascript'>alert('{$error}')</script>";
			

		}
	}
	catch (exception $ex)
	{
        echo "<script type='text/javascript'>alert('{$ex -> getMessage()}')</script>";
		
	}
	finally
	{
		mysqli_close($conn);
	}

}