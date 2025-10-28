<?php
  $product_id = $_GET['product_id'];
  include("dbconn.php");

  $result = mysqli_query($conn,"SELECT * FROM products WHERE product_id=".$product_id);
  $row = mysqli_fetch_array($result);
?>

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

    <!-- edit content -->
    <div class="main_content">
      <div >
        <h2 class="bottom_margin40">Product Management System - Edit product</h2>
        <form 
          method="post" 
          action="edit_action.php" 
        >
          <div class="mb-3">
            <label for="product_name">Product Name</label>
            <input 
              class="form-control" 
              type="text" 
              id="product_name" 
              name="product_name" 
              value="<?php echo $row["product_name"];?>"
              required
            />
          </div>
          <div class="mb-3">
            <label for="model_no">Model No</label>
            <input 
              class="form-control" 
              type="text" 
              id="model_no" 
              name="model_no" 
              value="<?php echo $row["model_no"];?>"
              required
            />
          </div>
          <div class="mb-3">
            <label for="price">Price</label>
            <input 
              class="form-control" 
              type="number"
              id="price" 
              name="price" 
              value="<?php echo $row["price"];?>"
              required
            />
          </div>
          <div class="mb-3">
            <label for="overview">Overview</label>
            <textarea 
              class="form-control" 
              type="text" 
              id="overview" 
              name="overview" 
              required
              rows=4
            ><?php echo $row["overview"];?></textarea>
          </div>
          <div class="mb-3">
            <label for="image_1">Image 1</label>
            <input 
              class="form-control" 
              type="text" 
              id="image_1" 
              name="image_1" 
              value="<?php echo $row["image_1"];?>"
              required
            />
          </div>
          <div class="mb-3">
            <label for="image_2">Image 2</label>
            <input 
              class="form-control" 
              type="text" 
              id="image_2" 
              name="image_2" 
              value="<?php echo $row["image_2"];?>"
              required
            />
          </div>
          <div class="mb-3">
            <label for="image_3">Image 3</label>
            <input 
              class="form-control" 
              type="text" 
              id="image_3" 
              name="image_3" 
              value="<?php echo $row["image_3"];?>"
              required
            />
          </div>
          <div class="mb-3">
            <label for="image_4">Image 4</label>
            <input 
              class="form-control" 
              type="text" 
              id="image_4" 
              name="image_4" 
              value="<?php echo $row["image_4"];?>"
              required
            />
          </div>
            <input 
              class="form-control" 
              type="hidden"
              id="product_id" 
              name="product_id" 
              value="<?php echo $product_id;?>"
            />
          <button 
            class="btn btn-primary"
            type="submit"
          >
            Save Change
          </button>
        </form>
      </div>
    </div>
  </body>
</html>
