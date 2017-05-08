<!DOCTYPE html>

<html>
<body>
<head>
  <title>HOME</title>
  <link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<div class="header">
    <h1>HOME PAGE</h1>
</div>
<h1>WELCOME TO YOUR PAGE</h1>
<div>
    <h4>TABLES<?php echo $_SESSION['firstname']; 
?></h4></div>
</div>
<?php
session_start(); 
//connect to database
$db = mysqli_connect("sql2.njit.edu","sk2423","IR8VDFjJC","sk2423");
$email=mysqli_real_escape_string($db,$_POST['email']);
$Incomplete_query = "SELECT Id, Email, ToDoItem, Description , Status, DueDate , DueTime FROM todo WHERE  Status= 'incomplete'  ";
// AND Email='krisrinidhi@gmail.com' ";
//Email= '$Email' and
$result_count_1 = mysqli_query($db,$Incomplete_query);
 if (mysqli_num_rows($result_count_1)>0)
 {
		
			echo "<table border='1' cellpadding='10'>";
			echo "<tr>
			<th><font color='Black'>ToDoItem</font></th>
			<th><font color='Black'>Description</font></th>
			<th><font color='Black'>DueDate</font></th>
			<th><font color='Black'>DueTime</font></th>
			<th><font color='Black'>Edit</font></th>
			<th><font color='Black'>Delete</font></th>
			<th><font color='Black'>check off</font></th>
			</tr>";
	  while($row = mysqli_fetch_assoc($result_count_1)) 
	  {
			
			echo "<tr>";
			echo '<td><b><font color="#663300">' . $row['ToDoItem'] . '</font></b></td>';
			echo '<td><b><font color="#663300">' . $row['Description'] . '</font></b></td>';
			echo '<td><b><font color="#663300">' . $row['DueDate'] . '</font></b></td>';
			echo '<td><b><font color="#663300">' . $row['DueTime'] . '</font></b></td>';
			echo '<td><b><font color="#663300"><a href="edit.php?Id=' . $row['Id'] . '">Edit</a></font></b></td>';
			echo '<td><b><font color="#663300"><a href="delete.php?Id=' . $row['Id'] . '">Delete</a></font></b></td>';
			echo '<td><b><font color="#663300"><a href="checkoff.php?Id=' . $row['Id'] . '">checkoff</a></font></b></td>';
			echo "</tr>";
	  }
	  echo "</table>";
}
?>
<p><a href="insert.php">Insert new incomplete record</a></p>
<?php
session_start(); 
//connect to database
$db = mysqli_connect("sql2.njit.edu","sk2423","IR8VDFjJC","sk2423");
$email=mysqli_real_escape_string($db,$_POST['email']);




    if(isset($_SESSION['message']))
    {
         echo "<div id='error_msg'>".$_SESSION['message']."</div>";
         unset($_SESSION['message']);
    }


$complete_query = "SELECT Id, Email, ToDoItem, Description , Status, DueDate , DueTime FROM todo WHERE  Status= 'Complete'  " ;

//Email= '$Email' and AND Email='krisrinidhi@gmail.com' "
$result_count = mysqli_query($db,$complete_query);
 if (mysqli_num_rows($result_count)>0)
 {
		echo "<table border='1' cellpadding='10'>";
		echo "<tr>
		<th><font color='Red'>ToDoItem</font></th>
		<th><font color='Red'>Description</font></th>
		<th><font color='Red'>DueDate</font></th>
		<th><font color='Red'>DueTime</font></th>
		<th><font color='Red'>Edit</font></th>
		<th><font color='Red'>Delete</font></th>
		</tr>";
	  while($row = mysqli_fetch_assoc($result_count)) 
	  {
			echo "<tr>";
			echo '<td><b><font color="#663300">' . $row['ToDoItem'] . '</font></b></td>';
			echo '<td><b><font color="#663300">' . $row['Description'] . '</font></b></td>';
			echo '<td><b><font color="#663300">' . $row['DueDate'] . '</font></b></td>';
			echo '<td><b><font color="#663300">' . $row['DueTime'] . '</font></b></td>';
			echo '<td><b><font color="#663300"><a href="edit.php?Id=' . $row['Id'] . '">Edit</a></font></b></td>';
			echo '<td><b><font color="#663300"><a href="delete.php?Id=' . $row['Id'] . '">Delete</a></font></b></td>';
			echo "</tr>";
	  }
	  echo "</table>";
 }
 

 ?>
<p><a href="insert_complete.php">Insert new complete record</a></p>
<a href="logout.php">Log Out</a>
</body>
</html>