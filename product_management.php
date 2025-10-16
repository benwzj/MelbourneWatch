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
    <link rel="stylesheet" href="main.css" />
    <link rel="stylesheet" href="product_management.css" />
    <title>Melbourne Watch Gallery</title>
  </head>
  <body>
    <!-- Navigation bar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="home.html">Melbourne Watch Gallery</a>
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
              <a class="nav-link" href="about.html">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.html">Product Management</a>
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

    <div class = 'management_content'>
      <div class="management_list">
        <div class="management_item management_item_title">
          <div class="management_id management_title">Product ID</div>
          <div class="management_img management_title">
            Image
          </div>
          <div class="management_name management_title">Prodcut Name</div>
          <div class="management_price management_title">Price</div>
          <div class="management_action management_action_title ">Actions</div>
        </div>
        <?php
          $conn=mysqli_connect("localhost","Ben","","melbourne_watch_gallery");
          // Check connection
          if (mysqli_connect_errno())
          {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
          }

          $result = mysqli_query($conn,"SELECT * FROM products");
          while($row = mysqli_fetch_array($result))
          {
            // echo $row['product_name'] . " " . $row['price'];
            // echo "<br />";
            $name = $row["product_name"];
            $price = $row["price"];
            $img = $row["image_1"];
            $id = $row["product_id"];
            $text = <<<EOT
              <div class="management_item">
                <div class="management_id">$id</div>
                <div class="management_img">
                  <img 
                    src="$img" 
                    alt="image for product $id"
                  >
                </div>
                <div class="management_name">$name</div>
                <div class="management_price">$price</div>
                <div class="management_action">Edit, Delete, Preview</div>
              </div>
              EOT;
            echo $text;
          }

          mysqli_close($conn);
        ?>
        
      </div>
    </div>
  </body>
</html>
