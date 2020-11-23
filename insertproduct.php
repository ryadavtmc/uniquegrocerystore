<?php
require_once "init.php";

 
  $title = $_REQUEST['title'];
  $price = $_REQUEST['price'];
  $list_price = $_REQUEST['list_price'];
  $description = $_REQUEST['description'];
  $image = $_FILES['/unique/images']['tmp_name'];
  $product_code = $_REQUEST['product_code'];

  $ins="INSERT INTO products SET  title='$title', price='$price', list_price ='$list_price' , description = '$description' , image='$image' , product_code='$product_code' ";
  
  //$ins = "INSERT INTO products ( title, price, list_price)
//VALUES ( '$title', '$price', '$list_price')";

     $result = mysqli_query($conn, $ins); 
     if($result){
         
         echo "Record Added Secussfully.";
     }else{
         echo "Record not Added";
     }
     
 
?>
<script type="text/javascript">
    window.location="admin.php";
    </script>