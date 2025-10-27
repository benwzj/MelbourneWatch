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
        <h2>Product Management System - Add New Product</h2>
        <form 
          method="post" 
          action="add_action.php" 
        >
          <div class="mb-3">
            <label for="product_name">Product Name</label>
            <input 
              class="form-control" 
              type="text" 
              id="product_name" 
              name="product_name" 
              aria-describedby="emailHelp"
            />
          </div>
          <div class="mb-3">
            <label for="model_no">Model No</label>
            <input 
              class="form-control" 
              type="text" 
              id="model_no" 
              name="model_no" 
            />
          </div>
          <div class="mb-3">
            <label for="price">Price</label>
            <input 
              class="form-control" 
              type="text" 
              id="price" 
              name="price" 
            />
          </div>
          <div class="mb-3">
            <label for="overview">Overview</label>
            <textarea 
              class="form-control" 
              type="text" 
              id="overview" 
              name="overview" 
              rows=4
            >
            </textarea>
          </div>
          <div class="mb-3">
            <label for="image_1">Image 1</label>
            <input 
              class="form-control" 
              type="text" 
              id="image_1" 
              name="image_1" 
            />
          </div>
          <div class="mb-3">
            <label for="image_2">Image 2</label>
            <input 
              class="form-control" 
              type="text" 
              id="image_2" 
              name="image_2" 
            />
          </div>
          <div class="mb-3">
            <label for="overview">Image 3</label>
            <input 
              class="form-control" 
              type="text" 
              id="image_3" 
              name="image_3" 
            />
          </div>
          <div class="mb-3">
            <label for="image_4">Image 4</label>
            <input 
              class="form-control" 
              type="text" 
              id="image_4" 
              name="image_4" 
            />
          </div>

          <button 
            class="btn btn-primary"
            type="submit"
          >
            Add New product
          </button>
        </form>
      </div>
    </div>
  </body>
</html>
