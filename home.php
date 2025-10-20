

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
        let cart = getCartStorage ();
        if (cart) {
          updateCartDisplay (cart);
        }
      });

    </script>
    <link rel="stylesheet" href="main.css" />
    <link rel="stylesheet" href="home.css" />
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

    <!-- Home Content -->
    <div class="home_content">
      <div class="product_list">
        <?php
          include("dbconn.php");
          $result = mysqli_query($conn,"SELECT * FROM products");
          while($row = mysqli_fetch_array($result))
          {
            $name = $row["product_name"];
            $price = $row["price"];
            $img = $row["image_1"];
            $id = $row["product_id"];
            $array = [];
            $array["price"] = $price;
            $array["image"] = $img;
            $array["id"] = $id; 
            $array["name"] = $name;
            $product = json_encode($array);
            $text = <<<EOT
              <div class="product_item"> 
                <a class="item_context" href="product.php?product_id=$id">
                  <h5>$name</h5>
                  <img 
                    class="item_img"
                    src="$img"
                    alt="garmin-vivoactive-5-smart-watch-black-slate"
                  >
                </a>
                <div class="item_bottom">
                  <div class="item_price">$$price</div>
                  <button class="item_add" onclick='addItem($product)'>
                    Add to Cart
                  </button>
                </div>
              </div>
            EOT;
            echo $text;
          }

          mysqli_close($conn);
        ?>
      </div>

      <!-- shopping_cart -->
      <?php
        include("cart.php");
      ?>
    </div>
  </body>
</html>
