

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

        <!-- 
        <div class="product_item">
          <a class="item_context" href="product.html?product_id=1">
            <h5>Garmin vivoactive 5 (Black/Slate) 44mm domn Band</h5>
            <img 
              class="item_img"
              src="https://cdn.shopify.com/s/files/1/0024/9803/5810/products/665844-Product-0-I-638307609604535334_600x600.jpg?v=1695164595" 
              alt="garmin-vivoactive-5-smart-watch-black-slate"
            >
          </a>
          <div class="item_bottom">
            <div class="item_price">$350</div>
            <button class="item_add" onclick="addItem('1')">
              Add to Cart
            </button>
          </div>
        </div>
        <div class="product_item">
          <a class="item_context" href="product.html?product_id=2">
            <h5>Apple Watch Ultra 49mm GPS + Cellular</h5>
            <img 
              class="item_img"
              src="https://cdn.shopify.com/s/files/1/0024/9803/5810/files/663051-Product-0-I-638615422208592294_600x600.jpg?v=1725945498" 
              alt="apple smart-watch-black-slate"
            >
          </a>
          <div class="item_bottom">
            <div class="item_price">$1259</div>
            <button class="item_add" onclick="addItem('2')">
              Add to Cart
            </button>
          </div>
        </div>
         <div class="product_item">
          <a class="item_context" href="product.html?product_id=1">
            <h5>Apple Watch Series 10 46mm GPS and Cellular Ocean Band </h5>
            <img 
              class="item_img"
              src="https://www.jbhifi.com.au/cdn/shop/files/656226-Product-0-I-638615334006044870.jpg?v=1725937968" 
              alt="apple watch ate"
            >
          </a>
          <div class="item_bottom">
            <div class="item_price">$1288</div>
            <button class="item_add" onclick="addItem('3')">
              Add to Cart
            </button>
          </div>
        </div>
         <div class="product_item">
          <a class="item_context" href="product.html?product_id=2">
            <h5>Apple Watch SE 40mm GPS + Cellular Golden Case</h5>
            <img 
              class="item_img"
              src="https://www.jbhifi.com.au/cdn/shop/files/785301-Product-0-I-638615484605550148.jpg?v=1725965189" 
              alt="apple watch"
            >
          </a>
          <div class="item_bottom">
            <div class="item_price">$355</div>
            <button class="item_add" onclick="addItem('4')">
              Add to Cart
            </button>
          </div>
        </div>
         <div class="product_item">
          <a class="item_context" href="product.html?product_id=2">
            <h5>Samsung Galaxy Watch7 LTE 44mm GPS + Cellular Red Band</h5>
            <img 
              class="item_img"
              src="https://cdn.shopify.com/s/files/1/0024/9803/5810/files/754671-Product-0-I-638562494404549905_600x600.jpg?v=1720653615" 
              alt="Samsung"
            >
          </a>
          <div class="item_bottom">
            <div class="item_price">$690</div>
            <button class="item_add" onclick="addItem('5')">
              Add to Cart
            </button>
          </div>
        </div>
         <div class="product_item">
          <a class="item_context" href="product.html?product_id=1">
            <h5>Huawei Watch GT 5 Pro 46mm Titanium Case GPS + goodle</h5>
            <img 
              class="item_img"
              src="https://www.jbhifi.com.au/cdn/shop/files/792215-Product-0-I-638675180408414794.jpg?v=1731921316" 
              alt="Huawei"
            >
          </a>
          <div class="item_bottom">
            <div class="item_price">$599</div>
            <button class="item_add" onclick="addItem('6')">
              Add to Cart
            </button>
          </div>
        </div> -->
      </div>

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
          <button class="cart_bottom_checkout" onclick="cartCheckout()">
            <div>Check out</div>
            <div class="cart_bottom_checkout_number" id="checkout_number">3</div>
          </button>
        </div>
      </div>
    </div>
  </body>
</html>
