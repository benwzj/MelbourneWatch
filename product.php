<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
      crossorigin="anonymous"
    ></script>
    <script src="script.js"></script>
    <script>
      document.addEventListener("DOMContentLoaded", () => {
        // console.log ("addEventListener => DOMContentLoade");
        const cart = getCartStorage ();
        if (cart) updateCartDisplay (cart);
        //initialProuctPage ();

        // Get the main image element
        const mainImage = document.querySelector(".product_images_big_img");

        // Get all thumbnails
        const thumbnails = document.querySelectorAll(".product_images_small");

        // Add mouseover event to each thumbnail
        thumbnails.forEach(thumbnail => {
          thumbnail.addEventListener("mouseover", () => {
            mainImage.src = thumbnail.src; // Change main image
          });
        });
      });
    </script>
    <link rel="stylesheet" href="main.css" />
    <link rel="stylesheet" href="product.css" />
    <link rel="stylesheet" href="cart.css" />
    <title>Melbourne Watch Gallery</title>
  </head>
  <body>
    <!-- Navigation bar -->
    <?php
      include("navbar.php");
    ?>

    <!-- Header -->
    <div class="header">
      <img
        class="logo"
        src="https://ecs.gbca.edu.au/moodle/images/logo.jpg"
        alt="company logo"
      />
      <h1>Melbourne Watch Gallery</h1>
    </div>
    
    <!-- Product detail -->
    <div class="product_content">
      <?php
          $productId = $_GET['product_id'];
          include("dbconn.php");

          $result = mysqli_query($conn,"SELECT * FROM products WHERE product_id=".$productId);
          while($row = mysqli_fetch_array($result))
          {
            // echo $row['product_name'] . " " . $row['price'];
            // echo "<br />";
            $name = $row["product_name"];
            $price = $row["price"];
            $img1 = $row["image_1"];
            $img2 = $row["image_2"];
            $img3 = $row["image_3"];
            $img4 = $row["image_4"];
            $overview = $row["overview"];
            $modelNo = $row["model_no"];
            $array = [];
            $array["price"] = $price;
            $array["image"] = $img1;
            $array["id"] = $productId; 
            $array["name"] = $name;
            $product = json_encode($array);

            $text = <<<EOT
              <div class="product_images">
                <div class="product_images_big">
                      <img 
                        class="product_images_big_img"
                        src="$img1" 
                        alt="image1 for product $productId"
                      >
                    </div>
                    <div  class="product_images_list">
                      <img 
                        class="product_images_small"
                        src="$img1" 
                        alt="image1 for product $productId"
                      >
                      <img 
                        class="product_images_small"
                        src="$img2"
                        alt="image2 for product $productId"
                      >
                      <img 
                        class="product_images_small"
                        src="$img3"
                        alt="image3 for product $productId"
                      >
                      <img 
                        class="product_images_small"
                        src="$img4"
                        alt="image4 for product $productId"
                      >
                    </div>
              </div>
              <div class="product_des">
                <div class="product_des_title">
                  $name
                </div>
                <div class="product_des_model">
                  $modelNo
                </div>
                <div class="product_des_price">
                  $$price
                </div>
                <button class="product_des_add" onclick='addItem($product)'>
                  Add to Cart
                </button>
                <div class="product_des_overview">
                  Product Overview
                </div>
                <div class="product_des_des">
                  $overview
                </div>
              </div>
              EOT;
            echo $text;
          }

          mysqli_close($conn);
        ?>


      <!-- shopping_cart -->
      <?php
        include("cart.php");
      ?>
    </div>
  </body>
</html>
