

<?php
  require_once 'init.php';
$sql = "SELECT *FROM clothing;  ";

$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>unique grocery store</title>
  <link rel="stylesheet" href="css/main.css"/>
  <link rel="stylesheet" href="contact.css"
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
<div class="col-md-3"></div>
<!-- main content of Clothing-->
<h2 class="text-center">Clothing</h2>
<div class="col-md-8">
  <div class="row">
<?php
  while($clothing = mysqli_fetch_assoc($result)):
  ?>
    <div class="col-md-3">
      <h4><?= $clothing['title']; ?></h4>
      <img src="<?= $clothing['image']; ?>" alt="<?= $clothing['title']; ?>" id="images"/>
      <p class="list-price text-danger"> List Price: <s>$<?=$clothing['list_price']; ?></s> </p>
      <p class="price"> New Price: $<?=$clothing['price']; ?> </p>
      <p class="description"> About Product:<br /> <?=$clothing['description']; ?> </p>
      
       <div class="card-footer p-1">
       <form action="action.php" method="post">
      <p> <input type="number" name="qty" value="1" min="1" style="width: 60px;"></p>
      <input type="hidden" name="id" value="<?=$clothing['id']; ?>" >  
      <input type="hidden" name="title" value="<?=$clothing['title']; ?>">  
      <input type="hidden" name="price" value="<?=$clothing['price']; ?>">  
      <input type="hidden" name="image" value="<?=$clothing['image']; ?>">  
      <input type="hidden" name="product_code" value="<?=$clothing['product_code']; ?>">
        <input type="submit" class="btn btn-info btn-block" value="🛒 Add to cart" name="addtocart">  
        

       </form>
        </div>
      </div>

<?php endwhile; ?>
</div>

</div>
<a href="index.php" class="button">Go back to Home </a>
<footer class="text-center" id="footer">&copy: Copyright 2020-2021 Unique Grocery Store </footer>

<!-- details model -->
<?php include 'details-modal-levis.php';
      include 'details-modal-apple.php';



?>

</body>
</html>
