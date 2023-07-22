<?php
    include('../includes/connect.php');
    if(isset($_POST['insert_product'])){
        $product_title = mysqli_real_escape_string($conn, $_POST['product_title']);
        $product_description = mysqli_real_escape_string($conn, $_POST['product_description']);
        $product_keyword = mysqli_real_escape_string ($conn, $_POST['product_keyword']);
        $product_category = mysqli_real_escape_string($conn, $_POST['product_category']);
        $product_brand = mysqli_real_escape_string($conn, $_POST['product_brand']);
        $product_price = $_POST['product_price'];
        $product_status = "true";

        // accessing image name

        $product_image1 = $_FILES['product_image1']['name'];
        $product_image2 = $_FILES['product_image2']['name'];
        $product_image3 = $_FILES['product_image3']['name'];

        // accessing temp name
        $temp_image1 = $_FILES['product_image1']['tmp_name'];
        $temp_image2 = $_FILES['product_image2']['tmp_name'];
        $temp_image3 = $_FILES['product_image3']['tmp_name'];

        //checking empty condition
        if($product_title=='' or $product_description=='' or $product_keyword=='' or $product_category=='' or $product_brand=='' or $product_price=='' or $product_image1=='' or $product_image2=='' or $product_image3==''){
            echo"<script> alert('please fill all the fields')</script>";
            exit();
        }else{
            //if fields are not empty move images to the right folders
            move_uploaded_file($temp_image1, "./product_images/$product_image1");
            move_uploaded_file($temp_image2, "./product_images/$product_image2");
            move_uploaded_file($temp_image3, "./product_images/$product_image3");

            //insert query
            $insert_products = "INSERT INTO products (product_title,product_description,product_keywords,category_id,brand_id,product_image1,product_image2,product_image3,product_price,date,status) values ('$product_title','$product_description','$product_keyword','$product_category','$product_brand','$product_image1','$product_image2','$product_image3','$product_price',NOW(),'$product_status')";

            $result = mysqli_query($conn, $insert_products);
            if($result){
                echo"<script> alert('Product Inserted Successfully')</script>";
            }
        }

    }

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
<body class="bg-light">

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
                    <button class="btn btn-info my-1"><a href="" class="text-light nav-link">View Products</a></button>
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

     <div class="container mt-3">
        <h1 class="text-center">Insert Products</h1>

        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline mb-4 m-auto w-50">
                <label for="product_title" class="form-label">Product title</label>
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter product title" required>
            </div>
            <div class="form-outline mb-4 m-auto w-50">
                <label for="product_description" class="form-label">Product Description</label>
                <input type="text" name="product_description" id="product_description" class="form-control" placeholder="Enter product description" required>
            </div>
            <div class="form-outline mb-4 m-auto w-50">
                <label for="product_keyword" class="form-label">Product keyword</label>
                <input type="text" name="product_keyword" id="product_keyword" class="form-control" placeholder="Enter product keyword" required>
            </div>
            <div class="form-outline mb-4 m-auto w-50">
                <select name="product_category" id="" class="form-select ">
                     <option value="">Select a Category</option>
                    <?php

                        $select_query = "SELECT * FROM categories";
                        $result_query = mysqli_query($conn, $select_query);
                        while($row = mysqli_fetch_assoc($result_query)){
                            $category_title = $row['category_title'];
                            $category_id = $row['category_id'];
                            echo "<option value='$category_id'>$category_title</option>";
                        }

                    ?>
                
                </select>
            </div>
            <div class="form-outline mb-4 m-auto w-50">
                <select name="product_brand" id="" class="form-select ">
                    <option value="">Select a Brand</option>
                    <?php

                    $select_query = "SELECT * FROM brands";
                    $result_query = mysqli_query($conn, $select_query);
                    while($row = mysqli_fetch_assoc($result_query)){
                        $brand_title = $row['brand_title'];
                        $brand_id = $row['brand_id'];
                        echo "<option value='$brand_id'>$brand_title</option>";
                    }

                    ?>
                </select>
            </div>

            <div class="form-outline mb-4 m-auto w-50">
                <label for="product_image1" class="form-label">Product image 1</label>
                <input type="file" name="product_image1" id="product_image1" class="form-control"  required>
            </div>
            <div class="form-outline mb-4 m-auto w-50">
                <label for="product_image2" class="form-label">Product image 2</label>
                <input type="file" name="product_image2" id="product_image2" class="form-control"  required>
            </div>
            <div class="form-outline mb-4 m-auto w-50">
                <label for="product_image3" class="form-label">Product image 3</label>
                <input type="file" name="product_image3" id="product_image3" class="form-control"  required>
            </div>


            <div class="form-outline mb-4 m-auto w-50">
                <label for="product_price" class="form-label">Product price</label>
                <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter product price" required>
            </div>

            <div class="form-outline mb-4 m-auto w-50">
                <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3"  value="Insert Products" >
            </div>
        </form>
     </div>
    
        

       
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>