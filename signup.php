<?php 
require_once('init.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
  padding: 14px 20px;
  background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
  padding: 16px;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
     width: 100%;
  }
}
</style>
</head>
<body>

<div>
   <b> <?php
   if (isset($_REQUEST['username'])) {
    include ("init.php");
        $id = $_REQUEST['id'];
        $username = $_REQUEST['username'];
        $password = $_REQUEST['password'];
        $cpassword = $_REQUEST['cpassword'];
    if (($password == $cpassword)){
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $ins="INSERT INTO users SET   username='$username', password='$hash'";
         $result = mysqli_query($conn, $ins); 
        if($result){
            echo "<div class='form'>
                  <h3>You are registered successfully!</h3><br/>
                  <p class='link'>Click here to <a href='loginform.php'>Login</a></p>
                  </div>";
        } 
        else {
            echo "Username already registered try different one";
        }
    }
    else{
        echo "password do not match";
    }
        
   }
    ?></b>
</div>
<?php

?>

<form action="signup.php" style="border:1px solid #ccc">
  <div class="container">
    <h1>Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="username"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="username" required>
      

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>

    <label for="cpassword"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="cpassword"  required>
    
    <label>
      <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
    </label>
    
    <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

    <div class="clearfix">
      
      <button type="submit" class="signupbtn" name="submit" value="Register">Sign Up</button>
    </div>
  </div>
</form>


</body>
</html>
