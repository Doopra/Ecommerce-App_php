<?php
session_start();
include('../includes/connect.php');
include('../functions/common_functions.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-Commerce</title>

  <!--- bootstrap cdn-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">

  <!--- font awesome cdn-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


  <link rel="stylesheet" href="../includes/css/style.css">

</head>

<body>



  <nav class="navbar navbar-expand-lg bg-info">
    <div class="container-fluid">
      <img src="./images/logo.png" alt="" class="logo">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../display_all.php">Products</a>


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
        if (!isset($_SESSION['username'])) {
          echo "<a href='#' class='nav-link'> Welcome Guest</a>";
        } else {
          echo "<a href='#' class='nav-link'> Welcome " . $_SESSION['username'] . "</a>";
        }
        ?>

      </li>
      <?php

      if (!isset($_SESSION['username'])) {
        echo "<li class='nav-item'>
                  <a href='user_login.php' class='nav-link'>Login </a>
                  </li>";
      } else {
        echo "<li class='nav-item'>
                  <a href='user_logout.php' class='nav-link'>Logout </a>
                </li>";
      }
      ?>
    </ul>
  </nav>


  <div class="row">
    <div class="col-md-2">
      <ul class="navbar-nav bg-secondary text-center" style="height:100vh">
        <li class="nav-item bg-info">
          <a href="#" class="nav-link text-light">
            <h4>Your profile</h4>
          </a>
        </li>


        <?php
        $username = $_SESSION['username'];
        $user_image = "SELECT * FROM `user_table` WHERE username='$username'";
        $user_image_result = mysqli_query($conn, $user_image);
        $row_image = mysqli_fetch_array($user_image_result);
        $user_image = $row_image['user_image'];

        echo "<li class='nav-item'>
                    <img src='./user_images/$user_image' class='profile_img my-4' style='width:250px'>
                    </li>"


        ?>




        <li class="nav-item">
          <a href="profile.php" class="nav-link text-light">Pending Orders</a>
        </li>
        <li class="nav-item">
          <a href="profile.php?edit_account" class="nav-link text-light">Edit Account</a>
        </li>
        <li class="nav-item">
          <a href="profile.php?my_orders" class="nav-link text-light">My orders</a>
        </li>
        <li class="nav-item">
          <a href="profile.php?delete_account" class="nav-link text-light">Delete Account</a>
        </li>
        <li class="nav-item">
          <a href="./user_logout.php" class="nav-link text-light">Logout</a>
        </li>


      </ul>
    </div>


    <div class="col-md-10">
      <?php get_user_order_details();
        if(isset($_GET['edit_account'])){
          include('edit_account.php');
        }
        if(isset($_GET['my_orders'])){
          include('user_orders.php');
        }
        if(isset($_GET['delete_account'])){
          include('delete_account.php');
        }
      ?>
    </div>
    
  </div>
  

  <?php 
  
    include('../includes/footer.php');

  ?>