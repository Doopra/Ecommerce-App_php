<?php



session_start();

include('./includes/connect.php');
    
    

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce checkout page</title>

    <!--- bootstrap cdn-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">

    <!--- font awesome cdn-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="./css/style.css">

</head>
<body>
    <div class="container-fluid p-0">
    <?php
 include('functions/common_functions.php');
 

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
        <li class="nav-item">
          <a class="nav-link" href="./users_area/user_registration.php">Register</a>
        </li>
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
                  <a href='./users_area/user_login.php' class='nav-link'> Login </a>
                  </li>";
                } else{
                echo "<li class='nav-item'>
                  <a href='./users_area/user_logout.php' class='nav-link'> Logout </a>
                </li>";
              }
        ?>
    </ul>
</nav>

<!-- third child--->
<div class="bg-light">
    <h3 class="text-center"> Saviour  Store</h3>
    <p class="text-center">Communications is at the heart of e-commerce and community</p>
</div>


<!---- fourth child------>
<div class="row px-1">
    <div class="col-md-12">
        <div class="row">

            <?php
                if(isset($_SESSION['username'])){
                    include('payment.php');
                }
                else{
                    
                    include('users_area/user_login.php'); 
                }
            ?>
           
           
        </div>
    </div>





    <div class="col-md-2 bg-secondary p-1">
        <!--- brand ---->
       

        <!-----categpries --->
      

    </div>
</div>

<?php
    include('./includes/footer.php');
?> 
</div>
    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>