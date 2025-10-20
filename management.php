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
    <link rel="stylesheet" href="management.css" />
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

    <div class = 'management_content'>
      <div class = 'management_list'>
       <h2 class="management_title">Product Management System</h2>
        <div class="table-responsive-md"> 
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Product ID</th>
                <th scope="col">Image</th>
                <th scope="col">Product Name</th>
                <th scope="col">Price</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php
                include("dbconn.php");

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
                    <tr>
                      <th scope="row"> $id</th>
                      <td>
                        <img 
                          class="management_img"
                          src="$img" 
                          alt="image for product $id"
                        >
                      </td>
                      <td>$name</td>
                      <td>$price</td>
                      <td>
                        <a href="edit.php?product_id=$id">Edit</a>,
                        <a href="delete.php?product_id=$id">Delete</a>,
                        <a href="product.php?product_id=$id">Preview</a>
                      </td>
                    </tr>
                  EOT;
                  echo $text;
                }
                mysqli_close($conn);
              ?>         
            </tbody>

          </table>
        </div>
      </div>
    </div>
  </body>
</html>
