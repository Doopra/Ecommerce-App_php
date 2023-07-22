<?php

    if(isset($_GET['edit_product'])){
        $edit_id = $_GET['edit_product'];
        $get_data = "SELECT * FROM `products` WHERE product_id=$edit_id";
        $get_query = mysqli_query($conn, $get_data);
        $row = mysqli_fetch_assoc($get_query);
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_keywords = $row['product_keywords'];
        $category_id = $row['category_id'];
        $brand_id = $row['brand_id'];
        $product_image1 = $row['product_image1'];
        $product_image2 = $row['product_image2'];
        $product_image3 = $row['product_image3'];
        $product_price = $row['product_price'];


        // fetching categories name

        $select_cat = "SELECT * FROM `categories` WHERE category_id =$category_id";
        $result_query = mysqli_query($conn, $select_cat);
        $row_cat = mysqli_fetch_assoc($result_query);
        $category_title = $row_cat['category_title'];
        

        // fetching categories name

        $select_brand = "SELECT * FROM `brands` WHERE brand_id=$brand_id";
        $result_brand = mysqli_query($conn, $select_brand);
        $row_brand = mysqli_fetch_assoc($result_brand);
        $brand_title = $row_brand['brand_title'];
        
    }

?>
	 	 	 	 	 	 	 	 	

<div class="container mt-5">
    <h1 class="text-center ">
        Edit Product
    </h1>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_title" class="form-label"> Product Title</label>
            <input type="text" class="form-control" value="<?php echo $product_title ?>" name="product_title" required>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_description" class="form-label"> Product Description</label>
            <input type="text" class="form-control" value="<?php echo $product_description ?>" name="product_description" required>
        </div>
        
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_keywords" class="form-label"> Product Keywords</label>
            <input type="text" class="form-control" value="<?php echo $product_keywords ?>" name="product_keywords" required>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
        <label for="product_keywords" class="form-label"> Product Categories</label>
            <select name="product_category" class="form-select">
             
                <option value="<?php echo $category_id ?>"><?php echo $category_title ?></option>
                <?php
                    $select_cat_all = "SELECT * FROM `categories` ";
                    $result_query_all = mysqli_query($conn, $select_cat_all);
                    while($row_cat_all = mysqli_fetch_assoc($result_query_all)){
                        $category_title_all = $row_cat_all['category_title'];
                        echo "
                               <option value='$category_id'>$category_title_all</option>
                            ";
                    }
                   
                    
                ?>
                
                
            </select>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
        <label for="product_keywords" class="form-label"> Product Brands</label>
            <select name="product_brand" class="form-select">
          
                <option value="<?php echo $brand_id ?>"><?php echo $brand_title ?></option>
                
                <?php
                     $select_brand_all = "SELECT * FROM `brands`";
                     $result_brand_all = mysqli_query($conn, $select_brand_all);
                     while($row_brand_all = mysqli_fetch_assoc($result_brand_all)){
                        
                        $brand_title_all = $row_brand_all['brand_title'];
                        
                        echo "<option value='$brand_id'>$brand_title_all</option>";
                     }
                     
                     
            ?>
                
            </select>
        </div>

        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image1" class="form-label"> Product Image1</label>
            <div class="d-flex">
            <input type="file" class="form-control w-90 m-auto" name="product_image1" >
            <img src="./product_images/<?php echo $product_image1?>" style="width:100px; height:100px">
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image1" class="form-label"> Product Image1</label>
            <div class="d-flex">
            <input type="file" class="form-control w-90 m-auto" name="product_image2" >
            <img src="./product_images/<?php echo $product_image2?>" style="width:100px; height:100px" alt="">
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image1" class="form-label"> Product Image1</label>
            <div class="d-flex">
            <input type="file" class="form-control w-90 m-auto" name="product_image3" >
            <img src="./product_images/<?php echo $product_image3?>" style="width:100px; height:100px" alt="">
            </div>
        </div>

        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_price" class="form-label"> Product price</label>
            <input type="text" class="form-control" value="<?php echo $product_price ?>" name="product_price" required>
        </div>
        <div class=" w-50 m-auto mb-4 ">
            
            <input type="submit" class="btn btn-info px-3 mb-3" value="Update Product" name="edit_product" required>
        </div>
        
        
    </form>
</div>

<?php
    if(isset($_POST['edit_product'])){
        $product_title = mysqli_real_escape_string($conn, $_POST['product_title']);
        $product_description = mysqli_real_escape_string($conn, $_POST['product_description']);
        $product_keyword = mysqli_real_escape_string($conn, $_POST['product_keywords']);
        $product_category = $_POST['product_category'];
        $product_brand = $_POST['product_brand'];
        $product_image1 = $_FILES['product_image1']['name'];
        $product_image1 = $_FILES['product_image2']['name'];
        $product_image1 = $_FILES['product_image3']['name'];

        $temp_image1 = $_FILES['product_image1']['tmp_name'];
        $temp_image2 = $_FILES['product_image2']['tmp_name'];
        $temp_image3 = $_FILES['product_image3']['tmp_name'];



         //checking empty condition
         if($product_title=='' or $product_description=='' or $product_keyword=='' or $product_category=='' or $product_brand=='' or $product_price=='' or $product_image1=='' or $product_image2=='' or $product_image3==''){
            echo"<script> alert('please fill all the fields')</script>";
            exit();
        } else{
            move_uploaded_file($temp_image1, "./product_images/$product_image1");
            move_uploaded_file($temp_image2, "./product_images/$product_image2");
            move_uploaded_file($temp_image3, "./product_images/$product_image3");


            $insert_products_query = "UPDATE products SET product_title='$product_title',product_description='$product_description',product_keywords='$product_keyword',category_id='$product_category',brand_id='$product_brand',product_image1='$product_image1',product_image2='$product_image2',product_image3='$product_image3',product_price='$product_price', date=NOW() WHERE product_id=$edit_id";

            $con_query = mysqli_query($conn, $insert_products_query);
            if($con_query){
                echo"<script> alert('Product Edited Successfully')</script>";
                echo "<script>window.open('index.php','_self')</script>";
            }




        }


    }