<?php 
  
 $aadharnoErr =$usernameErr= $emailErr=$passwordErr=$passwordconfirmErr=$mobilenoErr= "";
$aadharno=$username = $email  =$password=$passwordconfirm=$mobileno= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
  if (empty($_POST["aadharno"])) {
    $aadharnoErr = "aadharno is required";
  } else {
    $aadharno = test_input($_POST["aadharno"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[0-9]*$/",$aadharno)) {
      $aadharnoErr = "Only numbers allowed"; 
    }}
  
  if (empty($_POST["username"])) {
    $usernameErr = "Name is required";
  } else {
    $username = test_input($_POST["username"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$username)) {
      $usernameErr = "Only letters and white space allowed"; 
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
  }
    
   if (empty($_POST["password"])) {
    $passwordErr = "password is required";
  } else {
    $password = test_input($_POST["password"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $password)) {
    $passwordErr= "the password does not meet the requirements!";
    }
  }
   if ($_POST["passwordconfirm"]!=$_POST["password"]) {
    $passwordconfirmErr = "the passwords do not match";
  } 
  
if (empty($_POST["mobileno"])) {
    $mobilenoErr = "mobileno is required";
  } else {
    $mobileno = test_input($_POST["mobileno"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[0-9]*$/",$mobileno)) {
      $mobilenoErr = "Only numbers allowed"; 
    }
  }
  

if ((!empty($_POST["username"])) && (!empty($_POST["aadharno"])) &&(!empty($_POST["email"])) && (!empty($_POST["mobileno"]))&&(!empty($_POST["password"])) && (!empty($_POST["passwordconfirm"])) && ($_POST["passwordconfirm"]==$_POST["password"]))
{
  function Connect()
{
 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $dbname = "oas";
 
 // Create connection
 $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die($conn->connect_error);
 
 return $conn;
}

$conn    = Connect();
  $query = "INSERT INTO user_detail(aadharno,username,email,mobileno,password) VALUES ('$aadharno','$username','$email','$mobileno','$password')";
$success = $conn->query($query);

  
  echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Succesfully Registered')
    window.location.href='logn.php';
    </SCRIPT>");
$conn->close();
}}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration</title>
  <link rel="stylesheet" type="text/css" href="stylereg.css">
</head>
<style>
.error1 {
  color:#ff0000;
  display:inline-block;
}
</style>
<body>
  <div class="header">
  	<h2>Register</h2>
  </div>

  <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    
  	<div>
  	  Aadhar no
  	  <input type="text" name="aadharno"><span class="error1">*<?php echo $aadharnoErr;?></span>
  	</div>
    <div >
      Username
      <input type="text" name="username"><span class="error1">* <?php echo $usernameErr;?></span>
    </div>
  	<div >
  	  Email
  	  <input type="email" name="email" ><span class="error1">* <?php echo $emailErr;?></span>
  	</div>
    <div >
      Mobile no
      <input type="text" name="mobileno" ><span class="error1">* <?php echo $mobilenoErr;?></span>
    </div>
  	<div >
  	  Password
  	  <input type="password" name="password"><span class="error1">* <?php echo $passwordErr;?></span>
  	</div>
  	<div >
  	  Confirm password
  	  <input type="password" name="passwordconfirm"><span class="error1">* <?php echo $passwordconfirmErr;?></span>
  	</div>
  	<div >
  	  <input type="submit"  name="register" value="Register">
  	</div>
  	
  </form>
</body>

</html>