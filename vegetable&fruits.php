

<?php
  require_once 'init.php';
$sql = "SELECT *FROM vegetableandfruits;  ";

$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>unique grocery store</title>
  <link rel="stylesheet" href="css/main.css"/>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="unique.css">
  <script src="unique.js"></script>
  <link rel="stylesheet" href="css/bootstrap.min.css"/>
  <link rel="stylesheet" href="css/main.css"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scaleable=no">
  <script src="js/bootstrap.min.js"></script>
</head>
<body>
<nav>

<div class="jumbotron text-center">
  <table class = "table">
  <button type=""><h1><a href="index.php">Unique Grocery Store</a></h1></button>
    <div class="wrapper">
    </div>


      <tr>
        <th>
          <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="index.php"> Home </a>

  <!-- departments-->
  <div class="w3-container">

  <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-black"><h2>Departments</h2></button>

  <div id="id01" class="w3-modal">
    <div class="w3-modal-content">
      <div class="w3-container">
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
        <table>
          <tr>
            <td>
              <a href="vegetable&fruits.php">Vegetable & Fruits </a>
            </td>
            <td> <a href="pharmacy.php"> Pharmacy </a>
            </td>
            <td>
              <a href ="clothing.php"> Clothing </a>
            </td>
          </tr>
        </table>

      </div>
    </div>
  </div>
</div>
  <!-- coded -->
   <a href="myaccount.php">My Account</a>
  <a href="#">About</a>
  <a href="#">Contact us </a>
  <a href="#" class="fa fa-facebook"></a>
<a href="#" class="fa fa-twitter"></a>
<a href="#" class="fa fa-google"></a>
<a href="#" class="fa fa-linkedin"></a>
<a href="#" class="fa fa-youtube"></a>

  <!--contact footer -->
  
</div>

<div id="main">

  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Menu</span>
</div>

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
          </script>   </th>

        <th> <form class="example" action="" method="post">
  <input type="text" placeholder="Search.." name="search">
  <button type="submit"><i class="fa fa-search"></i></button>
</form>
<?php print("$output"); ?>
</th>
  <th> 
  <?php
    session_start();
  if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
    $loggedin= true;
  }
  else{
      $loggedin=false;
  }
  
  if(!$loggedin){
      echo '<div class="dropdown">
    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
      Login
    </button>
    <div class="dropdown-menu">
       <form action="loginform.php">
      <input type="text" placeholder="Username" name="username">
      <input type="password" placeholder="Password" name="password">
      <button type="submit">Login</button>
      </li><button type=""><a href="signup.php">Sign up </a></button></li>
         </form>
    
    </div>
  </div>
 

  
        </th>';
        }
    
        if($loggedin) { 
        echo '<th><div> <button class="logout"><a href="logout.php">Logout</a></button>
        </div>
        </th>';
        }
        ?>


        <th><div><a href="cart.php"> <i class="fasfa-shopping-cart"></i>
           🛒Cart <span id="cart-item" class="badge badge-danger">0</a> 
       
        </span>
        </a> </div></th>
       
      </tr>

      </table>
    </nav>
<!--Image insert -->
<div id="background-image">
  <div id="image-1"> </div>
  <div id="image-2"> </div>
</div>


<div class="col-sm-12"></div>
<!-- main content of Vegetable and fruits-->
<h2 class="text-center">Vegetable and fruits</h2>
<div class="col-sm-10">
  <div class="row">
<?php
  while($vegetableandfruits = mysqli_fetch_assoc($result)):
  ?>
    <div class="col-sn-6 col-md-4 col-lg-3 mb-2">
      <h4><?= $vegetableandfruits['title']; ?></h4>
      <img src="<?= $vegetableandfruits['image']; ?>" alt="<?= $vegetableandfruits['title']; ?>" id="images"/>
      <p class="list-price text-danger"> List Price: <s>$<?=$vegetableandfruits['list_price']; ?></s> </p>
      <p class="price"> New Price: $<?=$vegetableandfruits['price']; ?> </p>
      <p class="description"> About Product:<br /> <?=$vegetableandfruits['description']; ?> </p>
      
       <div class="card-footer p-1">
        <form action="action.php" method="post">
      <p> <input type="number" name="qty" value="1" min="1" style="width: 60px;"></p>
      <input type="hidden" name="id" value="<?=$vegetableandfruits['id']; ?>" >  
      <input type="hidden" name="title" value="<?=$vegetableandfruits['title']; ?>">  
      <input type="hidden" name="price" value="<?=$vegetableandfruits['price']; ?>">  
      <input type="hidden" name="image" value="<?=$vegetableandfruits['image']; ?>">  
      <input type="hidden" name="product_code" value="<?=vegetableandfruits['product_code']; ?>">
        <input type="submit" class="btn btn-info btn-block" value="🛒 Add to cart" name="addtocart">  
        

       </form>
        </div>
      </div>

<?php endwhile; ?>
</div>

</div>



<footer class="text-center" id="footer">&copy: Copyright 2020-2021 Unique Grocery Store </footer>

<!-- details model -->
<?php include 'details-modal-levis.php';
      include 'details-modal-apple.php';



?>

</body>
</html>
