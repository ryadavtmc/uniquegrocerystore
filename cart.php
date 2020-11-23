<?php
require_once "init.php";

 session_start();
  if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
    $loggedin= true;
  }
  else{
      $loggedin=false;
  }

  if(!$loggedin){
      header("location: loginform.php");
  }


?>
<?php
  require_once 'init.php';
$sql = "SELECT *FROM cart;  ";

$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>unique grocery store</title>
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
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  </head>
  <body>
  <?php
  while($cart = mysqli_fetch_assoc($result)):
  ?>
  

  
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Cart Items</th>
                        <th>Quantity</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Total</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="col-sm-8 col-md-6">
                        <div class="media">
                            <a class="thumbnail pull-left" href="#"> <img src="<?= $cart['image']; ?>" alt="<?= $cart['title']; ?>" id="images"/> </a>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="#"><?= $cart['title']; ?></a></h4>
                                <h5 class="media-heading"> by <a href="#">Brand name</a></h5>
                                <span>Status: </span><span class="text-success"><strong>In Stock</strong></span>
                            </div>
                        </div>


                        <td class="col-sm-1 col-md-1 text-center"><strong><?=$cart['qty']; ?></strong></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>$<?=$cart['price']; ?></strong></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong><?php echo $cart['price']+$cart['qty']; ?></strong></td>
                        <td class="col-sm-1 col-md-1">
                        
                        <button type="submit" class="btn btn-danger">
                            <span class="glyphicon glyphicon-remove" name="id" value="Remove"></span> <a href="delete.php?id=<?php echo $cart["id"]; ?>" >Remove 
                        </a></button>
                        </td>
                    </tr>
                    
                        </div></td>
                        
                    
                    <tr>
                        
                        
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Estimated shipping</h5></td>
                        <td class="text-right"><h5><strong>$2.39</strong></h5></td>
                    </tr>
                    <tr>
                        <?php
                        $counting = $cart['price'];
                        $countingqty = $cart['qty'];
                        $shippingcost=2.39;
                        $totalof=$counting+$countingqty;
                        $Total = $counting*$countingqty+$shippingcost;

                        ?>
                        <td>   </td>
                         <td>   </td>
                        <td>   </td>
                        <td><h3>Total</h3></td>
                        <td class="text-right"><h3><strong><?php echo $Total; ?></strong></h3></td>
                    </tr>
                    <tr>
                       
                        <td>   </td>
                         <td>   </td>
                        <td>   </td>
                        <td><a href="index.php">
                        <button type="button" class="btn btn-default">
                            <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                        </button></a></td>
                        <td>
                        <button type="button" class="btn btn-success"><a href="checkout.php" >
                            Checkout <span class="glyphicon glyphicon-play"></span>
                        </button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php endwhile; ?>


  </body>
  </html>
