<?php
if (isset($_REQUEST['username'])) {
    include ("init.php");
       
        $username = $_REQUEST['username'];
        $password = $_REQUEST['password'];
        
    
       // $ins="Select * from users where username='$username' AND password='$password'";
       $ins="Select * from users where username='$username' ";
       
         $result = mysqli_query($conn, $ins); 
         $num = mysqli_num_rows($result);
         if ($num ==1){
             while($row=mysqli_fetch_assoc($result)){
                 if(password_verify($password, $row['password'])){
                        $login = true;
                        session_start();
                        $_SESSION['loggedin']=true;
                        $_SESSION['username']=$username;
                        header("location: index.php");

                 }
                 else{
                     echo"Username and password do not match";
                 }
                 

             }
             
             
         }
         else{
             
             
              echo "Username and password do not match";
              
            
         }
}
    ?>



<!DOCTYPE html> 
<html> 
<style> 
    /*set border to the form*/ 
      
    form { 
        border: 3px solid #f1f1f1; 
    } 
    /*assign full width inputs*/ 
      
    input[type=text], 
    input[type=password] { 
        width: 100%; 
        padding: 12px 20px; 
        margin: 8px 0; 
        display: inline-block; 
        border: 1px solid #ccc; 
        box-sizing: border-box; 
    } 
    /*set a style for the buttons*/ 
      
    button { 
        background-color: #4CAF50; 
        color: white; 
        padding: 14px 20px; 
        margin: 8px 0; 
        border: none; 
        cursor: pointer; 
        width: 100%; 
    } 
    /* set a hover effect for the button*/ 
      
    button:hover { 
        opacity: 0.8; 
    } 
    /*set extra style for the cancel button*/ 
      
    .cancelbtn { 
        width: auto; 
        padding: 10px 18px; 
        background-color: #f44336; 
    } 
    /*centre the display image inside the container*/ 
      
    .imgcontainer { 
        text-align: center; 
        margin: 24px 0 12px 0; 
    } 
    /*set image properties*/ 
      
    img.avatar { 
        width: 40%; 
        border-radius: 50%; 
    } 
    /*set padding to the container*/ 
      
    .container { 
        padding: 16px; 
    } 
    /*set the forgot password text*/ 
      
    span.psw { 
        float: right; 
        padding-top: 16px; 
    } 
    /*set styles for span and cancel button on small screens*/ 
      
    @media screen and (max-width: 300px) { 
        span.psw { 
            display: block; 
            float: none; 
        } 
        .cancelbtn { 
            width: 100%; 
        } 
    } 
</style> 
  
<body> 
  
     
    
    
    <!--Step 1 : Adding HTML-->
    <form action="loginform.php"> 
        <div class="imgcontainer"> 
            <h2>Login</h2>
        </div> 
  
        <div class="container"> 
            <label><b>Username</b></label> 
            <input type="text" placeholder="Enter Username" name="username" required> 
  
            <label><b>Password</b></label> 
            <input type="password" placeholder="Enter Password" name="password" required> 
  
            <button type="submit">Login</button> 
            <input type="checkbox" checked="checked"> Remember me 
        </div> 
  
        <div class="container" style="background-color:#f1f1f1"> 
            <button type="button" class="Register"><a href="signup.php">Register</button> 
            
            
        </div> 
    </form> 
  <div class="button"><a href="index.php">Go to Home page</a></div>
</body> 
  
</html> 