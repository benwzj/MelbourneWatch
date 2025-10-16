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
        // const cart = getCartStorage ();
        // if (cart) updateCartDisplay (cart);
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
    <nav class="navbar navbar-expand-lg bg-body-tertiary navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="home.php">Melbourne Watch Gallery</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="about.php">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.php">Product Management</a>
            </li>
          </ul>
          <form class="d-flex" role="search">
            <input
              class="form-control me-2"
              type="search"
              placeholder="Search"
              aria-label="Search"
            />
            <button class="btn btn-outline-success" type="submit">
              Search
            </button>
          </form>
        </div>
      </div>
    </nav>

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
          $conn=mysqli_connect("localhost","Ben","","melbourne_watch_gallery");
          // Check connection
          if (mysqli_connect_errno())
          {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
          }

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
                <button class="product_des_add" onclick="addItem('$productId')">
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
      <div class="shopping_cart">
        <div class="cart_title">
           Shopping Cart
        </div>
        <div class="cart_list" id="cart_list">
          
        </div>
        <div class="cart_bottom">
          <div class="cart_bottom_text">
            <p>Total</p>
            <p id="total_price">$0</p>
          </div>
          <div class="cart_bottom_checkout">
            <div>Check out</div>
            <div class="cart_bottom_checkout_number" id="checkout_number">3</div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
