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
    <link rel="stylesheet" href="login.css" />
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

    <!-- login content -->
    <div class='login_content'>
      <form 
        method="post" 
        action="validatepassword.php" 
        class="login_form" 
      >
        <div  class="single_block">
          <label for="username">Username</label>
          <input 
            class="login_input" 
            type="text" 
            id="username" 
            name="username" 
            aria-describedby="emailHelp"
          />
        </div>
        <div class="single_block">
          <label for="password">Password</label>
          <input 
            class="login_input" 
            type="password" 
            id="password" 
            name="password" 
          />
        </div>
        <div class="single_block" >
          <button 
            class="login_button"
            type="submit"
          >
            Login
          </button>
        </div>
        <?php
          extract($_GET);
          if (isset($message)){
            echo "<div class='login_error'>$message</div>";
          }
        ?>
      </form>
    </div>
  </body>
</html>
