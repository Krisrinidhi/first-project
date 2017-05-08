<?php
include( ./model/database.php);

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
