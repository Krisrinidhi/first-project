<?php
session_start();
//connect to database
$db = mysqli_connect("sql2.njit.edu","sk2423","IR8VDFjJC","sk2423");

if(isset($_POST['register_btn']))
{
    $firstname	=	mysqli_real_escape_string($db,$_POST['firstname']);
    $lastname	=	mysqli_real_escape_string($db,$_POST['lastname']);
    $email		=	mysqli_real_escape_string($db,$_POST['email']);
    $password	=	mysqli_real_escape_string($db,$_POST['password']);
    $password2	=	mysqli_real_escape_string($db,$_POST['password2']); 
    $usrtel		=	mysqli_real_escape_string($db,$_POST['usrtel']);
    $bday		=	mysqli_real_escape_string($db,$_POST['bday']);               
    $gender		=	mysqli_real_escape_string($db,$_POST['gender']);
    if (!empty($email)) 
	{
		$sql_email	= "SELECT Email FROM user_info WHERE Email = '$email'";
		$email_query= mysqli_query($db,$sql_email);
		$count		= mysqli_num_rows($email_query);
        if($count==0)
		{
			if($password==$password2)
			{           //Create User
			//	$password=md5($password); //hash password before storing for security purposes
				$sql="INSERT INTO user_info(FirstName,LastName,Email,Password,PhoneNumber,BirthDate,Gender) VALUES('$firstname','$lastname','$email','$password','$usrtel','$bday','$gender')";
				mysqli_query($db,$sql);  
				$_SESSION['message']="You are now logged in"; 
				$_SESSION['firstname']=$firstname;
				header("location: ./'controller'/'home.php'");  //redirect home page
			}
			else
			{
				$_SESSION['message']="The two password do not match";   
			}
		}
		else
		{
             $_SESSION['message']="Email is already exists"; 
        }
			
	}
			
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Register , login and logout user php mysql</title>
  <link rel="stylesheet" type="text/css" href=" ./view/style.css"/>
</head>
<body>
<div class="header">
    <h1>Register, login and logout user php mysql</h1>
</div>
<?php
    if(isset($_SESSION['message']))
    {
         echo "<div id='error_msg'>".$_SESSION['message']."</div>";
         unset($_SESSION['message']);
    }
?>
<form method="post" action="register.php">
  <table>
     <tr>
           <td>First name : </td>
           <td><input type="text" name="firstname" class="textInput"></td>
     </tr>
     <tr>
           <td>Last name : </td>
           <td><input type="text" name="lastname" class="textInput"></td>
     </tr>
     <tr>
           <td>Email : </td>
           <td><input type="email" name="email" class="textInput"></td>
     </tr>
     <tr>
           <td>Password : </td>
           <td><input type="password" name="password" class="textInput"></td>
     </tr>
     <tr>
           <td>Retype Password : </td>
           <td><input type="password" name="password2" class="textInput"></td>
     </tr>
     <tr>
           <td>Phone Number: </td>
           <td><input type="tel" name="usrtel" class="textInput"></td>
     </tr>
     <tr>
           <td>Birthday: </td>
           <td><input type="date" name="bday" class="textInput"></td>
     </tr>
     <tr>
           <td>Gender: </td>
           <td><input type="radio" name="gender" value="male" checked> Male<br>
               <input type="radio" name="gender" value="female"> Female<br>
               <input type="radio" name="gender" value="other"> Other
           </td>
     </tr>
     <tr>
           <td></td>
           <td><input type="submit" name="register_btn" class="Register"></td>
     </tr>
     
</table>
</form>
</body>
</html>
