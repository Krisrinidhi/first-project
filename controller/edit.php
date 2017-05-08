<!DOCTYPE HTML >
<html>
<head>
  <title>Edit your record!! </title>
<body>
<?php
session_start(); 
if ($error != '')
{
echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';
}

session_start();
//connect to database
$db = mysqli_connect("sql2.njit.edu","sk2423","IR8VDFjJC","sk2423");;	
	$edit_id = $_GET['Id'];
	$edit_query = "SELECT Id, Email, ToDoItem, Description , Status, DueDate , DueTime FROM todo WHERE  Id= $edit_id" ;
    $edit_query_result = mysqli_query($db,$edit_query);
	$edit_data = mysqli_fetch_array($edit_query_result);	

	echo '
		<form action="" method="post">
		<table border="1"> 
		<tr><td colspan="2"><b><font color="Red">Edit Records </font></b></td></tr>
		<tr><td width="179"><b><font color="663300">ToDoItem<em>*</em></font></b></td><td><label><input type="text" name="ToDoItem" value="'.$edit_data['ToDoItem'].'"/></label></td></tr>
		<tr><td width="179"><b><font color="#663300">Description<em>*</em></font></b></td><td><label><input type="text" name="Description" value="'.$edit_data['Description'].'" /></label></td></tr>
		<tr><td width="179"><b><font color="#663300">DueDate<em>*</em></font></b></td><td><label><input type="text" name="DueDate" value="'.$edit_data['DueDate'].'" /></label></td></tr>
		<tr><td width="179"><b><font color="#663300">DueTime<em>*</em></font></b></td><td><label><input type="text" name="DueTime" value="'.$edit_data['DueTime'].'" /></label></td></tr>		
		<tr align="Right"><td colspan="2"><label><input type="submit" name="submit" value="submit"></table></form>';

if (isset($_POST['submit']))
{	
	$ToDoItem1 	= mysqli_real_escape_string($db ,$_POST['ToDoItem']);
	
	$Description1= mysqli_real_escape_string($db,$_POST['Description']);

	$DueDate1 	= mysqli_real_escape_string($db,$_POST['DueDate']);
	
	$DueTime1 	= mysqli_real_escape_string($db,$_POST['DueTime']);
	
	$update_query =  "UPDATE todo SET ToDoItem = '$ToDoItem1',Description = '$Description1',DueDate = '$DueDate1',DueTime ='$DueTime1' WHERE Id = $edit_id" ;
	mysqli_query($db,$update_query)
	or die(mysqli_error());	
	header("Location: home.php");
}
else
{
	valid('','','','');
}

?>
</body>
</html>


