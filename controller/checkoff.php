<?php
session_start();
//connect to database
$db = mysqli_connect("sql2.njit.edu","sk2423","IR8VDFjJC","sk2423");

if (isset($_GET['Id']) && is_numeric($_GET['Id']))
{ 		
	$checkoff = $_GET['Id'];
	$checkoff_query = "UPDATE todo SET Status='Complete' WHERE Id=$checkoff";
	mysqli_query($db,$checkoff_query);
	header("Location: home.php");
}
else
{
	header("Location: home.php");
}
?>
