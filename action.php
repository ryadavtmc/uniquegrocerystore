<?php

session_start();
include ("init.php");
$id =$_REQUEST['id'];
$price=$_POST['price'];
$title=$_POST['title'];
$qty=$_POST['qty'];
$image=$_POST['image'];
$product_code=$_POST['product_code'];

$total_price=$_POST['total_price'];

$ins="INSERT INTO cart SET id='$id',  title='$title', price='$price', image='$image', qty='$qty',  product_code='$product_code', total_price='$total_price'";
$conn->query($ins);
header("location: index.php");


?>