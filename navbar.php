
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
        <?php
          session_start();
          if(isset($_SESSION["username"])){
            $username = $_SESSION["username"];
            echo "  
              <li class='nav-item'>
                <a class='nav-link' href='management.php'>Product Management</a>
              </li>
              <li class='nav-item'>
                <a class='nav-link' href='login.php'>Add New Product</a>
              </li>
              <li class='nav-item'>
                <a class='nav-link' href='logout.php'>Logout</a>
              </li>
              <li class='nav-item'>
                <a class='nav-link' href=''>Hi $username</a>
              </li>
            ";
          }else{
            echo "  
              <li class='nav-item'>
                <a class='nav-link' href='login.php'>Product Management</a>
              </li>
            ";
          }
        ?>
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
