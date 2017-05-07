<?php
session_start();
//connect to database
$db=mysqli_connect("sql2.njit.edu","sk2423","IR8VDFjJC","sk2423");
if(isset($_POST['login_btn']))
{
    $email=mysqli_real_escape_string($db,$_POST['email']);
    $sql_email="SELECT Email FROM user_info WHERE Email='$email'" ;
    
    $result_email=mysqli_query($db,$sql_email);
    
    if(mysqli_num_rows($result_email)==1)
    {
    $password=mysqli_real_escape_string($db,$_POST['password']);
    
    //$password=md5($password); //Remember we hashed password before storing last time
    
    $sql_password="SELECT Password FROM user_info WHERE Password='$password'" ;
    
    $result_password=mysqli_query($db,$sql_password);
        
    if(mysqli_num_rows($result_password)==1)
    {
        $_SESSION['message']="You are now Loggged In";
        $_SESSION['email']=$email;
        header("location:home.php");
    }
		else
		{
		   $_SESSION['message']="Password is wrong";
		}
    }
   else
   {
            $_SESSION['message']="Emailis incorrect";
   }    
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Register , login and logout user php mysql</title>
  <link rel="stylesheet" type="text/css" href="style.css"/>
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
<form method="post" action="login.php">
  <table>
     <tr>
           <td>Email : </td>
           <td><input type="text" name="email" class="textInput"></td>
     </tr>
      <tr>
           <td>Password : </td>
           <td><input type="password" name="password" class="textInput"></td>
     </tr>
      <tr>
           <td></td>
           <td><input type="submit" name="login_btn" class="Log In"></td>
     </tr>
  
</table>
</form>
</body>
</html>
