<?php
function valid($TodoItem, $Description , $DueDate, $DueTime, $error)
{
?>
<!DOCTYPE HTML >
<html>
<head>
<title>Insert Records</title>
</head>
<body>
<?php

if ($error != '')
{
echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';
}
?>

<form action="" method="post">
<table border="1">
<tr>
<td colspan="2"><b><font color='Red'>Insert Records </font></b></td>
</tr>
<tr>
<td width="179"><b><font color='#663300'>ToDoItem<em>*</em></font></b></td>
<td><label>
<input type="text" name="ToDoItem" value="<?php echo $ToDoItem; ?>" />
</label></td>
</tr>

<tr>
<td width="179"><b><font color='#663300'>Description<em>*</em></font></b></td>
<td><label>
<input type="text" name="Description" value="<?php echo $Description; ?>" />
</label></td>
</tr>

<tr>
<td width="179"><b><font color='#663300'>DueDate<em>*</em></font></b></td>
<td><label>
<input type="text" name="DueDate" value="<?php echo $DueDate; ?>" />
</label></td>
</tr>

<tr>
<td width="179"><b><font color='#663300'>DueTime<em>*</em></font></b></td>
<td><label>
<input type="text" name="DueTime" value="<?php echo $DueTime; ?>" />
</label></td>
</tr>

<tr align="Right">
<td colspan="2"><label>
<input type="submit" name="submit" value="Insert Records">
</label></td>
</tr>
</table>
</form>
</body>
</html>
<?php
}

include( ./model/database.php);

if (isset($_POST['submit']))
{
	
	$ToDoItem 	= mysqli_real_escape_string($db ,$_POST['ToDoItem']);
	$Description= mysqli_real_escape_string($db,$_POST['Description']);
	$DueDate 	= mysqli_real_escape_string($db,$_POST['DueDate']);
	$DueTime 	= mysqli_real_escape_string($db,$_POST['DueTime']);
	$status 	= "Incomplete"	;
if ($ToDoItem == '' || $Description == '' || $DueDate == '' || $DueTime == '')
{

$error = 'Please enter the details!';

valid($ToDoItem, $Description, $DueDate, $DueTime ,$error);
}
else
{

$result=mysqli_query($db,"INSERT INTO todo(ToDoItem,Description,DueDate,DueTime,Status) VALUES ('$ToDoItem','$Description','$DueDate','$DueTime', '$status')")
or die(mysqli_error());

header("Location: home.php");
}
}
else
{
valid('','','','');
}
?>
<?php
function valid($TodoItem, $Description , $DueDate, $DueTime, $error)
{
?>
<!DOCTYPE HTML >
<html>
<head>
<title>Insert Records</title>
</head>
<body>
<?php

if ($error != '')
{
echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';
}
?>

<form action="" method="post">
<table border="1">
<tr>
<td colspan="2"><b><font color='Red'>Insert Records </font></b></td>
</tr>
<tr>
<td width="179"><b><font color='#663300'>ToDoItem<em>*</em></font></b></td>
<td><label>
<input type="text" name="ToDoItem" value="<?php echo $ToDoItem; ?>" />
</label></td>
</tr>

<tr>
<td width="179"><b><font color='#663300'>Description<em>*</em></font></b></td>
<td><label>
<input type="text" name="Description" value="<?php echo $Description; ?>" />
</label></td>
</tr>

<tr>
<td width="179"><b><font color='#663300'>DueDate<em>*</em></font></b></td>
<td><label>
<input type="text" name="DueDate" value="<?php echo $DueDate; ?>" />
</label></td>
</tr>

<tr>
<td width="179"><b><font color='#663300'>DueTime<em>*</em></font></b></td>
<td><label>
<input type="text" name="DueTime" value="<?php echo $DueTime; ?>" />
</label></td>
</tr>

<tr align="Right">
<td colspan="2"><label>
<input type="submit" name="submit" value="Insert Records">
</label></td>
</tr>
</table>
</form>
</body>
</html>
<?php
}

include( ./model/database.php);

if (isset($_POST['submit']))
{
	
	$ToDoItem 	= mysqli_real_escape_string($db ,$_POST['ToDoItem']);
	$Description= mysqli_real_escape_string($db,$_POST['Description']);
	$DueDate 	= mysqli_real_escape_string($db,$_POST['DueDate']);
	$DueTime 	= mysqli_real_escape_string($db,$_POST['DueTime']);
	$status 	= "Incomplete"	;
if ($ToDoItem == '' || $Description == '' || $DueDate == '' || $DueTime == '')
{

$error = 'Please enter the details!';

valid($ToDoItem, $Description, $DueDate, $DueTime ,$error);
}
else
{

$result=mysqli_query($db,"INSERT INTO todo(ToDoItem,Description,DueDate,DueTime,Status) VALUES ('$ToDoItem','$Description','$DueDate','$DueTime', '$status')")
or die(mysqli_error());

header("Location: home.php");
}
}
else
{
valid('','','','');
}
?>
