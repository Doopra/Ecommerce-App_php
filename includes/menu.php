<?php

  
  
  include('./functions/common_functions.php');
  

?>



<nav class="navbar navbar-expand-lg bg-info">
  <div class="container-fluid">
    <img src="./images/logo.png" alt="" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">Products</a>
        </li>
        <?php
            if(isset($_SESSION['username'])){
              echo "<li class='nav-item'>
              <a class='nav-link' href='./users_area/profile.php'>My Account</a>
            </li>";
            } else{
              echo "<li class='nav-item'>
              <a class='nav-link' href='./users_area/user_registration.php'>Register</a>
            </li>";
            }
        ?>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><li class="fa-solid fa-cart-shopping nav-link" style="padding-right: 0;"></li><sup ><?php cart_item(); ?> </sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total Price: <?php  total_cart_price(); ?></a>
        </li>
        
        
      </ul>
      <form class="d-flex" role="search" action="search_product.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <input type="submit" value="Search" class="btn btn-outline-secondary" name="search_data_product">
        
      </form>
    </div>
  </div>
</nav>

<!-- second child--->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <?php
            if (!isset($_SESSION['username'])){
              echo "<a href='#' class='nav-link'> Welcome Guest</a>"; 
            } else{
              echo "<a href='#' class='nav-link'> Welcome ".$_SESSION['username']."</a>";
            }
          ?>
            
        </li>
        <?php

              if(!isset($_SESSION['username'])){
                  echo "<li class='nav-item'>
                  <a href='./users_area/user_login.php' class='nav-link'>Login </a>
                  </li>";
                } else{
                echo "<li class='nav-item'>
                  <a href='./users_area/user_logout.php' class='nav-link'>Logout </a>
                </li>";
              }
        ?>
    </ul>
</nav>
