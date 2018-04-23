<?php
     session_start();
$vehicleno = $nooflit ="";
$vehiclenoErr =$nooflitErr= "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	function test_input($data) {
 	  $data = trim($data);
	  $data = stripslashes($data);
  	  $data = htmlspecialchars($data);
  	return $data;
	}
  if (empty($_POST["vehicleno"])) {
    $vehiclenoErr = "vehicleno is required";
  } else {
   	$vehicleno = test_input($_POST["vehicleno"]);

    if (!preg_match("/^[0-9]*$/",$vehicleno)) {
      $vehiclenoErr = "Only numbers allowed"; 
    }}
  
  if (empty($_POST["nooflit"])) {
    $nooflitErr = "No of litres is required";
  } else {
    $nooflit = test_input($_POST["nooflit"]);
 
    if (!preg_match("/^[0-9]*$/",$nooflit)) {
      $nooflitErr = "Only numbers allowed"; 
    }
  }

if ((!empty($_POST["vehicleno"])) && (!empty($_POST["nooflit"])))
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
$fuel=$_POST['fuel'];
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
  $query = "INSERT INTO fuel_orders(mobileno,vehicleno,nooflit,fuel) VALUES ('$mobileno','$vehicleno','$nooflit','$fuel')";
  $success =mysqli_query($conn,$query);
  
  echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Order Registered')
    window.location.href='Locationsearch.php';
    </SCRIPT>");
$conn->close();
}}
?>
<!DOCTYPE html>
<html>
<head>
 <title>Login</title>
<link rel="stylesheet"  href="stylefueldel.css">
 
</head>
<body>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	
		<div class=.dropdown>
			
			Vehicle Type:
				<select name="vehicle" >
  					<option value="bike">Bike</option>
  					<option value="car">Car</option>
				</select>
			 
			</div>

		<div class="input-group">
				<input type="text" name="vehicleno" placeholder="vehicle no" ><span class="error1">*<?php echo $vehiclenoErr;?></span>
		</div>
		<div class=.dropdown>
			
			Vehicle Type:
				<select name="vehicle" >
  					<option value="bike">Bike</option>
  					<option value="car">Car</option>
				</select>
			 
			</div>
		
			<div class="input-group">
			<button type="submit" class="btn" name="Estimated_Cost" >Place Order</button>
			</div>
    </form>
	</body>
	</html>
	
+