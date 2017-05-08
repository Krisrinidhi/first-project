<?php
include( ./model/database.php);
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
        header("location: ./controller/home.php");
    }
		else
		{
		   $_SESSION['message']="Password is wrong. Try again using the same email address.";
		}
    }

   else
   {
            $_SESSION['message']="Email address does not exist.";
   }    
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>LOGIN PAGE</title>
  <link rel="stylesheet" type="text/css" href=" ./view/style.css"/>
</head>
<body>
<div class="header">
    <h1>LOGIN</h1>
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
           <td><center>Email : </center></td>
           <td><input type="text" name="email" class="textInput"></td>
     </tr>
      <tr>
           <td><center>Password : </center></td>
           <td><input type="password" name="password" class="textInput"></td>
     </tr>
      <tr>
           <td></td>
           <td><center><input type="submit" name="login_btn" class="Log In"></center></td>
     </tr>
  
</table>
</form>
<p><a href="register.php"><center>Sign Up</center></a></p>
</body>
</html>
