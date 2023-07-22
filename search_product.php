<?php

    include('includes/connect.php');

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

    <link rel="stylesheet" href="./css/style.css">

</head>
<body>
    <div class="container-fluid p-0">
   <?php 
    include('includes/menu.php');

?>
<!-- third child--->
<div class="bg-light">
    <h3 class="text-center">Hidden Store</h3>
    <p class="text-center">Communications is at the heart of e-commerce and community</p>
</div>


<!---- fourth child------>
<div class="row">
    <div class="col-md-10">
        <div class="row">

        <?php
            
            search_product();
            get_uniquecategories();
            get_unique_brands();

        ?>
           
           
        </div>
    </div>





    <div class="col-md-2 bg-secondary p-1">
        <!--- brand ---->
        <ul class="navbar-nav me-auto text-center">
            <li class="nav-item bg-info">
                <a href="#" class="nav-link text-light"><h4> Delivery Brands</h4></a>
            </li>

            <?php

            getbrands();

            ?>

        </ul>

        <!-----categpries --->
        <ul class="navbar-nav me-auto text-center">
            <li class="nav-item bg-info">
                <a href="#" class="nav-link text-light"><h4> Categories</h4></a>
            </li>
            <?php

                getcategories();
                

            ?>

        </ul>

    </div>
</div>

<?php
    include('includes/footer.php');
?> 
</div>
    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 