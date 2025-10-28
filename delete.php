<?php
  extract($_GET);

  try{
    include ("dbconn.php");

    $sql = "delete from products where product_id = $product_id";

    if (mysqli_query($conn, $sql)) {
      header("Location:management.php?message=delete prodcut id($product_id) successfully!");
    }else{
      header("Location:management.php?message=delete prodcut id($product_id) fail!");
    }

  }catch(Exception $e){
    echo "database error".$e->getMessage();
  }
?>