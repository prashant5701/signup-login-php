<!DOCTYPE html>
<html>
<meta charset="utf-8">
<link rel="stylesheet" href="style.css" />
</head>
<body>
<?php
require('db.php');
// If form submitted, insert values into the database.

if (isset($_REQUEST['first_name'])){
        $first_name=$_POST['first_name'];
        $last_name=$_POST['last_name'];
        $email=$_POST['email'];
        $password=$_POST['password'];
       

$query = "INSERT INTO `users`(`first_name`, `last_name`, `email`, `password`) 
VALUES ('$first_name','$last_name','$email','".md5($password)."')";

        $result = mysqli_query($con,$query);
        
        if($result){
                
                ?>
<script type="text/javascript">
        alert("successfully registered");
window.location = "login.php";
</script>      
    <?php
            }

    }
    
    else{
?>
<div class ="signup-box" >
<h1>Sign Up</h1>
        <h4>It's free and only takes a minute.</h4>
<form name="registration" action="" method="post">
            <label>First Name</label>
            <input type="text" name="first_name" placeholder="" required />
            <label>Last Name</label>
            <input type="text" name="last_name" placeholder="" required />
            <label>Email</label>
            <input type="email" name="email" placeholder="" required />
            
         
            <label>password</label>
            <input type="password" name="password" placeholder="" required />

            <input type="submit" value="Register" name="submit">     

           

</form>
<p>
            By clicking Sign up button ,you agree to our ,<br>
            <a href="#">Terms and Conditions</a>and <a href="#">Privacy and Policy</a>
        </p>

    </div>
    <p class="para-2"> Already have an account ?<a href="login.php">Login here</a></p>
</div>
<?php } ?>
</body>
</html>
