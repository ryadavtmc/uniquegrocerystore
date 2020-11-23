<?php
 include ("init.php");
?>



<?php
  
$sql = "SELECT *FROM products;  ";

$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
 
  <title>Admin Pannel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: 1500px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;} 
    }
    #imgages {
  border: 1px solid #ddd;
  border-radius: 4px;
  padding: 5px;
  width: 150px;
}
  </style>
  
</head>

<body>
  
  

<div class="container-fluid">
 
  <div class="row content">
    <div class="col-sm-3 sidenav">
     
      <ul class="nav nav-pills nav-stacked">
            <div class="row">
            
      <div class="col-sm-12">
      
        <h3 class="text-center text-info">Add products</h3>
        <form action="insertproduct.php" method="post" >
        
          <div class="form-group">
            <input type="text" name="title"  class="form-control" placeholder="Product title" required>
          </div>
          <div class="form-group">
            <input type="text" name="price"  class="form-control" placeholder="Price" required>
          </div>
          <div class="form-group">
            <input type="text" name="list_price"  class="form-control" placeholder="List price" required></div>
            <div class="form-group">
            <input type="text" name="description"  class="form-control" placeholder="Product description" required>
          </div>
          <div class="form-group">
            <input type="text" name="product_code"  class="form-control" placeholder="Product code" required></div>
          <div class="form-group">
            <div class="form-group">
  <label for="sel1">Select Departments:</label>
  <select class="form-control" id="sel1">
    <option>Vegetable & fruits</option>
    <option>Pharmacy</option>
    <option>Clothing</option>
    <option>Products</option>
  </select>
</div>
 <div class="form-group">
            <input type="hidden" name="image" value="<?= $photo; ?>">
            <input type="file" name="image" class="custom-file">
            <img src="<?= $photo; ?>" width="120" >
          </div>
<div class="form-group">
            <button type="submit"  class="btn btn-primary btn-block" name ="insert" value="submit">Add Record</button>
            </div>
          
        </form>
        
      </div> 
      </ul><br>
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search Products..">
        <span class="input-group-btn">
          <button class="btn btn-default" type="button">
            <span class="glyphicon glyphicon-search"></span>
          </button>
        </span>
      </div>
    </div>

    <div class="col-sm-9">
      <h2 class="center"> <p class="text-center"><button type="button" class="btn btn-dark"><a href="admin.php">Admin Pannel</a></button></p></h2>
      <div class="container">
      
                                        
  <button onclick="myFunction()" type="button" class="btn btn-primary">Vegetable & fruits</button>
  <p id="demo"></p>
  <button type="button" class="btn btn-primary">Featured Products</button>
  <button type="button" class="btn btn-primary">Clothing</button>
  <button type="button" class="btn btn-primary">Pharmacy</button>
  
</div>

      <hr>
      
      

     
      
        </div>
        
        <div class="col-sm-8">

<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Title</th>
      <th scope="col">Price</th>
      <th scope="col">image</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <?php
  while($products = mysqli_fetch_assoc($result)):
  ?>
<script>
function myFunction() {
  document.getElementById("demo").innerHTML = "<?= $products['title']; ?>";
}
</script>
  
  <tbody>
    <tr>
      <th scope="row"><?=$products['id']; ?></th>
      <td><h4><?= $products['title']; ?></h4></td>
      <td><p class="price"> New Price: $<?=$products['price']; ?> </p></td>
      <td> <img src="<?= $products['image']; ?>" alt="<?= $products['title']; ?>" width="100" height="100" id="images"/ ></td>
      <td><button type="button" class="btn btn-danger" ><a href="delproducts.php?id=<?php echo $products["id"]; ?>" >Delete</a></button>
    </tr>
    
  </tbody>
  <?php endwhile; ?>
</table>
</div>
          
           
  </div>        
      
       
   </div>
 


<footer class="container-fluid">
  <p>Footer Text</p>
</footer>

</body>
</html>
