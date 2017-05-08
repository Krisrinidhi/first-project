<?php
include( ./model/databse.php);

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
