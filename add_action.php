<?php
  extract($_POST);

  try{
    include ("dbconn.php");
    $overview_real = mysqli_real_escape_string ($conn, $overview);
    $product_name_real = mysqli_real_escape_string ($conn, $product_name);

    $sql = "insert into products(product_name, model_no, price, overview, image_1, image_2, image_3, image_4) 
    values('$product_name_real', '$model_no', $price, '$overview_real', '$image_1', '$image_2', '$image_3', '$image_4')";

    if (mysqli_query($conn, $sql)) {
      $new_id = mysqli_insert_id($conn);
      // header("Location:product.php?product_id=$new_id");
      header("Location:management.php?message=insert new prodcut id($new_id) successfully!");
    }else{
      header("Location:management.php?message=insert new prodcut id($new_id) fail!");
    }

  }catch(Exception $e){
    echo "database error".$e->getMessage();
  }
?>