<?php
    if (!isset($_SESSION)) 
     session_start();
/*$vno  = $vmodel ="";
$vnoErr = $vmodelErr ="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
      $data = htmlspecialchars($data);
    return $data;
  }
  if (empty($_POST["vno"])) {
    $vnoErr = "vehicleno is required";
  } else {
    $vno = test_input($_POST["vno"]);

    if (!preg_match("/^[0-9]*$/",$vehicleno)) {
      $vehiclenoErr = "Only numbers allowed"; 
    }
  
  if (empty($_POST["vmodel"])) {
    $nooflitErr = "Vehicle model is required";
  } else {
    $vmodel = test_input($_POST["vmodel"]);
 
    if (!preg_match("/^[0-9A-Za-z ]*$/",$vmodel)) {
      $vmodelErr = "Only numbers and letters allowed"; 
    }
  }

if ((!empty($_POST["vno"])) && (!empty($_POST["vmodel"])))
{
  */
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
//$fuel=$_POST['fuel'];
$uname = $_SESSION['username'];
//echo $uname;
$query1="SELECT mobileno from user_detail where username='$uname'";
$result=mysqli_query($conn,$query1);
if (!$result){
    die("BAD!");
}
if (mysqli_num_rows($result)==1){
    $row = mysqli_fetch_array($result);
    $mobileno=$row['mobileno'];

  //  echo $mobileno;

    
}
else{
    echo "not found!";
}
$_SESSION['mobno']=$mobileno;
//$mobileno = $row['mobileno'];
$vtype=$_POST['vtype'];
$servtype=$_POST['servtype'];
$vno=$_POST['vno'];
$vmodel=$_POST['vmodel'];
$location=$_POST['location'];
//$date=$_POST['vdate'];
//$time=$_POST['vtime'];
  $query = "INSERT INTO repair_orders(mobileno,vno,vtype,vmodel,servtype,location) VALUES ('$mobileno','$vno','$vtype','$vmodel','$servtype','$location')";
  $success =mysqli_query($conn,$query);
  
  echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Order Registered')
    window.location.href='logout.php';
    </SCRIPT>");
$conn->close();
}

?>

<html>
<head>
<style>
.service select[type="vehicletype"]
{
width="500px";
}


</style>
</head>

<body>
<div class="service">
<form align="center" action="" method="post">
 <h2 style=" text-align:center;"><font color="#000" size="6"> 24 Hrs on-spot Bike &amp; Car care.</font></h2>
 
<input type="text"  name="location" id="location" placeholder="location"/>
<input type="text" name="vno" id="vehiclenumber" placeholder="vehicle number"/>
</br></br>

Vehicle type: <select id="vehicletype" name="vtype">

<option value="car">car</option>
<option value="bike">bike</option>
</select>

<input type="text" name="vmodel" id="vehiclemodel" placeholder="vehicle model"/></br></br>
Service type: <select id="servtype" name="servtype">

<option value="flattyre">Flat Tyre INR 350</option>
<option value="startingproblem">Starting Problem INR 400</option>
<option value="breakdownsupport">Breakdown Support INR 400</option>
<option value="custodyservice">Custody Service INR 400</option>
<option value="keylockoutassistance">Key Lockout Assistance INR 700</option>
</select>



</br></br>
<label>Date: </label>
	<input type="date" name="vdate" id="date"/>
<label>Time: </label>
	<input type="datetime" name="vtime" id="time"/>
	</br></br>
<input type="submit" name="booknow" id="booknow"/>



</form>
</div>

</body>

</html>

								