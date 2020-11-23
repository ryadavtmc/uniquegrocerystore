<?php
  require_once 'init.php';
 
  
  $query = "DELETE FROM products WHERE id = '" . $_GET["id"] . "'";
  $data = mysqli_query($conn,$query);
  $checkdata = "SELECT * from products";
  if($data)
  {
      echo "Your product is Removed";
  }
  elseif($checkdata == $empty)
  {
      echo '<script type="text/javascript">
    window.location="index.php";
    </script>';
  }
  else
  {
      echo "Error product is not deleted";
  }


?>

<script type="text/javascript">
    window.location="admin.php";
    </script>