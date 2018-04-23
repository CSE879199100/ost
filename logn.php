<?php
   include("config.php");
    if (!isset($_SESSION)) 
	   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
     $_SESSION['username']= $myusername;
      
      $sql = "SELECT * FROM user_detail WHERE username= '$myusername'  and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
        
         header("location:logout.php");
      }else {
         $message = "Username and/or Password incorrect.\\nTry again.";
  echo "<script>alert('$message');</script>";
  
  
      }
   }
?>
<html>
<head>
 <title>Login</title>
 <link rel="stylesheet" a href="stylelogn.css">
 <link rel="stylesheet" a href="css\font-awesome.min.css">
 <link rel="stylesheet" a href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootsrap.min.css">
</head>
<body>
 <div class="container">
 <img src="log.jpg"/>
 <form method="POST" action="">
 <div class="form-input">
 <input type="text" name="username" placeholder="Enter username"/> 
 </div>
 <div class="form-input">
 <input type="password" name="password" placeholder="password"/>
 </div>
 <div>
 <input type="submit" type="submit" value="LOGIN" class="btn-login"/>
 </div>
 <div>
 <a href="register.php">Don't have an account</a>
 </div>
<!--<i class="glyphicon glyphicon-user"></i>-->
 </form>
 </div>
</body>
</html>