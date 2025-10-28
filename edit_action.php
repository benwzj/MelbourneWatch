<?php
  extract($_POST);

  try{
    include ("dbconn.php");
    $overview_real = mysqli_real_escape_string ($conn, $overview);
    $product_name_real = mysqli_real_escape_string ($conn, $product_name);

    $sql = "UPDATE products SET product_name = '$product_name_real', 
      model_no = '$model_no', price = $price, overview = '$overview_real', 
      image_1 = '$image_1', image_2 = '$image_2', image_3 = '$image_3', image_4 = '$image_4'  
      WHERE product_id = $product_id ";

    if (mysqli_query($conn, $sql)) {
      // header("Location:product.php?product_id=$new_id");
      header("Location:management.php?message=Update prodcut id($product_id) successfully!");
    }else{
      header("Location:management.php?message=Update prodcut id($product_id) fail!");
    }

  }catch(Exception $e){
    echo "database error".$e->getMessage();
  }
?>