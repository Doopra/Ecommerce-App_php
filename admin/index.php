<?php
        include('../includes/connect.php');
        include('../functions/common_functions.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

     <!--- bootstrap cdn-->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">

      <!--- font awesome cdn-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     
    <link rel="stylesheet" href="../css/style.css">

</head>
<body>
    <!--- nav bar--->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../images/logo.png" class="logo" alt="">

                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="#" class="nav-link"> Welcome Guest</a>
                        </li>
                    </ul>
                </nav>


                
            </div>


        </nav>

        <div class="bg-light">
              <h3 class="text-center p-2">Manage Details</h3>
        </div>

        <!-------- menu section -------->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div class="px-5">
                        <a href="#"><img src="../images/womanPointing.png" class="admin_image" alt=""></a>
                        <p class="text-light text-center">Admin Name</p>
                </div>
                <div class="button text-center">
                    <button class="btn btn-info my-1"><a href="insert_product.php" class="text-light nav-link">Insert Products</a></button>
                    <button class="btn btn-info my-1"><a href="index.php?view_products" class="text-light nav-link">View Products</a></button>
                    <button class="btn btn-info my-1"><a href="index.php?insert_category" class="text-light nav-link">Insert Categories</a></button>
                    <button class="btn btn-info my-1"><a href="" class="text-light nav-link">View Categories</a></button>
                    <button class="btn btn-info my-1"><a href="index.php?insert_brands" class="text-light nav-link">Insert Brands</a></button>
                    <button class="btn btn-info my-1"><a href="" class="text-light nav-link">View Brands</a></button>
                    <button class="btn btn-info my-1"><a href="" class="text-light nav-link">All Orders</a></button>
                    <button class="btn btn-info my-1"><a href="" class="text-light nav-link">All Payments</a></button>
                    <button class="btn btn-info my-1"><a href="" class="text-light nav-link">List Users</a></button>
                    <button class="btn btn-info my-1"><a href="" class="text-light nav-link">Logout</a></button>
                </div>
            </div>
        </div>

        <!---------- fourth child--------------->
        <div class="container">
            <?php
                if(isset($_GET['insert_category'])){
                    include('insert_categories.php');
                }
           
                if(isset($_GET['insert_brands'])){
                    include('insert_brands.php');
                }
                if(isset($_GET['view_products'])){
                    include('view_products.php');
                }
                if(isset($_GET['edit_product'])){
                    include('edit_product.php');
                }

                ?>
            
        </div>
        


        <?php
            include('../includes/footer.php');
        ?>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>