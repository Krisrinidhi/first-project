<?php
session_start(); 
	//connect to database
	$db = mysqli_connect("sql2.njit.edu","sk2423","IR8VDFjJC","sk2423");

if (isset($_GET['Id']) && is_numeric($_GET['Id']))
{ 		
	$delete = $_GET['Id'];
	$delete_query = "DELETE FROM todo WHERE Id= $delete";
	mysqli_query($db,$delete_query);
	header("Location: home.php");
}
else
{
	header("Location: home.php");
}
?>