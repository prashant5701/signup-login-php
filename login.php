<?php
// Enter your Host, username, password, database below.
$con = mysqli_connect("localhost","root","","db");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>

<!DOCTYPE html>
<html>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<?php
require('db.php');
session_start();
// If form submitted, insert values into the database.

if (isset($_POST['email'])){
	$email = $_POST['email'];
	$password = md5($_POST['password']);
 
	$sql = "select * from users where email = '$email' and password = '$password'";  
	$result = mysqli_query($con, $sql);  
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
	$count = mysqli_num_rows($result);  
	  
	if($count == 1){  
		echo "<h1>Login successful </h1>";  
	}  
	else{  
		echo "<h1>  Invalid username or password</h1>";  
	}     
 
}



else{
?>
<div class="login-box" class="form">
        <h1>Login</h1>
        <form action="" method="post" name="login" >
            <label>Email</label>
            <input type="email" name="email" placeholder="email" required />
            <label>Password</label>
            <input type="password" name="password" placeholder="password" required />
           <br>
            <input  name="submit" type="submit" value="Login" />

        </form>
    </div>
    <p class="para-2">Do not have a account?<a href="register.php">Sign Up Here</a></p>

<?php } ?>
</body>
</html>


