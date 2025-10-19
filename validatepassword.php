
<?php
  extract($_POST);

  $hashedpassword = md5($password);
  try{
    include("dbconn.php");
    $sql = "SELECT * FROM users WHERE username='$username' and password='$hashedpassword'";
    // $sql = "SELECT * FROM users";
    $result = mysqli_query($conn, $sql);
    if (mysqli_affected_rows($conn) === 1){
      session_start();
      $_SESSION["username"] = $username;
      header("Location:product_management.php");
    }else{
      header("Location:login.php?message=Wrong Username or Password!");
    }

  }catch(Exception $e){
    echo "database error".$e->getMessage();
  }
?>