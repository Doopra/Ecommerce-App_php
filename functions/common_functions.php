<?php

   


    function getproducts(){
        global $conn;

        if(!isset($_GET['category'])){
            if(!isset($_GET['brand'])){
        $select_query = "SELECT * FROM `products` order by rand() LIMIT 0,4";
            $result_query = mysqli_query($conn, $select_query);
            
            while($row = mysqli_fetch_assoc($result_query)){
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $brand_id = $row['brand_id'];
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];
                $category_id = $row['category_id'];
            echo " <div class='col-md-4 mb-2'>
            <div class='card' >
                <img src='admin/product_images/$product_image1' class='card-img-top' alt='...'>
                <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <p class='card-text'>$product_description</p>
                    <p class='card-text'>$$product_price</p>
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                </div>
            </div>
        </div>";
            };
    }
}}

//getting all products

function get_all_products(){

    global $conn;

    if(!isset($_GET['category'])){
        if(!isset($_GET['brand'])){
    $select_query = "SELECT * FROM `products` order by rand()";
        $result_query = mysqli_query($conn, $select_query);
        
        while($row = mysqli_fetch_assoc($result_query)){
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $brand_id = $row['brand_id'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
        echo " <div class='col-md-4 mb-2'>
        <div class='card' >
            <img src='admin/product_images/$product_image1' class='card-img-top' alt='...'>
            <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <p class='card-text'>$$product_price</p>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
            </div>
        </div>
    </div>";
        };
}
}}



// get unique categories

function get_uniquecategories(){
    global $conn;

    if(isset($_GET['category'])){
        $category_id = $_GET['category'];       
        $select_query = "SELECT * FROM `products` where category_id=$category_id";
            $result_query = mysqli_query($conn, $select_query);
            $num_of_rows = mysqli_num_rows($result_query);
            if($num_of_rows == 0){
                echo "<h2 class='text-center text-danger'>No stock for this category </h2>";
            }
            
            while($row = mysqli_fetch_assoc($result_query)){
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $brand_id = $row['brand_id'];
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];
                $category_id = $row['category_id'];
            echo " <div class='col-md-4 mb-2'>
            <div class='card' >
                <img src='admin/product_images/$product_image1' class='card-img-top' alt='...'>
                <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <p class='card-text'>$product_description</p>
                    <p class='card-text'>$$product_price</p>
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                </div>
            </div>
        </div>";
        };
}
}

// get unique brands

function get_unique_brands(){
    global $conn;

    if(isset($_GET['brand'])){
        $brand_id = $_GET['brand'];       
        $select_query = "SELECT * FROM `products` where brand_id=$brand_id";
            $result_query = mysqli_query($conn, $select_query);
            $num_of_rows = mysqli_num_rows($result_query);
            if($num_of_rows == 0){
                echo "<h2 class='text-center text-danger'>This brand is not available for service </h2>";
            }
            
            while($row = mysqli_fetch_assoc($result_query)){
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $brand_id = $row['brand_id'];
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];
                $category_id = $row['category_id'];
            echo " <div class='col-md-4 mb-2'>
            <div class='card' >
                <img src='admin/product_images/$product_image1' class='card-img-top' alt='...'>
                <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <p class='card-text'>$product_description</p>
                    <p class='card-text'>$$product_price</p>
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                </div>
            </div>
        </div>";
        };
}
}

//getting brands
    function getbrands(){

        global $conn;

        $select_brands = "SELECT * FROM brands";
        $result_brands = mysqli_query($conn, $select_brands);
        while($row_data = mysqli_fetch_assoc($result_brands)){
            $brand_title = $row_data['brand_title'];
            $brand_id = $row_data['brand_id'];
            echo " <li class='nav-item '>
            <a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_title</h4></a>
        </li>";
        }

        
    }

    //getting categories

    function getcategories(){
        global $conn;

        $select_category = "SELECT * FROM categories";
                $result_category = mysqli_query($conn, $select_category);
                while($row_data = mysqli_fetch_assoc($result_category)){
                    $category_title = $row_data['category_title'];
                    $category_id = $row_data['category_id'];
                    echo " <li class='nav-item '>
                    <a href='index.php?category=$category_id' class='nav-link text-light'>$category_title</h4></a>
                </li>";
                }
    }


    // searching products function

    function search_product(){

        global $conn;
        if(isset($_GET['search_data_product'])){

        $search_data_value = $_GET['search_data'];
        $search_query = "SELECT * FROM `products` where product_keywords like '%$search_data_value%'";
            $result_query = mysqli_query($conn, $search_query);

            $num_of_rows = mysqli_num_rows($result_query);
            if($num_of_rows == 0){
                echo "<h2 class='text-center text-danger'>$search_data_value is not available  </h2>";
            }
            
            while($row = mysqli_fetch_assoc($result_query)){
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $brand_id = $row['brand_id'];
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];
                $category_id = $row['category_id'];
            echo " <div class='col-md-4 mb-2'>
            <div class='card' >
                <img src='admin/product_images/$product_image1' class='card-img-top' alt='...'>
                <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <p class='card-text'>$product_description</p>
                    <p class='card-text'>$$product_price</p>
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                </div>
            </div>
        </div>";
            };
    }

    }


    // view details function

    function view_details(){

        global $conn;

        if(isset($_GET['product_id'])){
        if(!isset($_GET['category'])){
            if(!isset($_GET['brand'])){
                $product_id = $_GET['product_id'];
        $select_query = "SELECT * FROM `products` WHERE product_id=$product_id";
            $result_query = mysqli_query($conn, $select_query);
            
            while($row = mysqli_fetch_assoc($result_query)){
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $brand_id = $row['brand_id'];
                $product_image1 = $row['product_image1'];
                $product_image2 = $row['product_image2'];
                $product_image3 = $row['product_image3'];
                $product_price = $row['product_price'];
                $category_id = $row['category_id'];
            echo " <div class='col-md-4 mb-2'>
            <div class='card' >
                <img src='admin/product_images/$product_image1' class='card-img-top' alt='...'>
                <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <p class='card-text'>$product_description</p>
                    <p class='card-text'>$$product_price</p>
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                    <a href='index.php' class='btn btn-secondary'>Back</a>
                </div>
            </div>
            </div>
        
        
        
        <div class='col-md-8'>

        <!---- related images---->
        <div class='row'>
            <div class='col-md-12'>
                <h4 class='text-center text-info mb-5'>Related Products</h4>
            </div>

            <div class='col-md-6'>
            <img src='admin/product_images/$product_image2' class='card-img-top' alt='...'>
                
            </div>
            <div class='col-md-6'>
            <img src='admin/product_images/$product_image3' class='card-img-top' alt='...'>

            </div>
        </div>

    </div>
        
        
        
        
        ";
            };
    }
}
    }
}




// get ip address function 

function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip; 


// add to cart function
function cart(){
    if(isset($_GET['add_to_cart'])){
        global $conn;
        $ip = getIPAddress();
        $get_product_id = $_GET['add_to_cart'];
        $select_query = "SELECT * FROM `cart_details` WHERE ip_address='$ip' AND product_id=$get_product_id";
        $result_query = mysqli_query($conn, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);

        if($num_of_rows > 0){
            echo "<script> alert('This item exist already in the cart') </script>";
            echo "<script> window.open('index.php','_self') </script>";
        } else{
            $insert_query = "INSERT INTO `cart_details` (product_id, ip_address,quantity) VALUES ($get_product_id, '$ip',0)";
            $result_query = mysqli_query($conn, $insert_query);
            echo "<script> alert('Added to cart') </script>";
            echo "<script> window.open('index.php','_self') </script>";

        }

    }
}



// function to get cart item numbers
function cart_item(){

    if(isset($_GET['add_to_cart'])){
        global $conn;
        $ip = getIPAddress();
        $select_query = "SELECT * FROM `cart_details` WHERE ip_address='$ip' ";
        $result_query = mysqli_query($conn, $select_query);
        $count_cart_items = mysqli_num_rows($result_query);

        } else{
            global $conn;
        $ip = getIPAddress();
        $select_query = "SELECT * FROM `cart_details` WHERE ip_address='$ip'";
        $result_query = mysqli_query($conn, $select_query);
        $count_cart_items = mysqli_num_rows($result_query);

        }
        echo $count_cart_items;

    }

    // total price function

    function total_cart_price(){
        global $conn;
        $ip = getIPAddress();
        $total = 0;
        $cart_query = "SELECT * FROM `cart_details` WHERE ip_address='$ip' ";
        $result = mysqli_query($conn, $cart_query);
        while($row = mysqli_fetch_array($result)){
            $product_id = $row['product_id'];
            $select_product = "SELECT * FROM `products` WHERE product_id = '$product_id'";
            $result_products = mysqli_query($conn, $select_product);
            while($row_product_price = mysqli_fetch_array($result_products)){
                $product_price = array($row_product_price['product_price']);
                $product_value =array_sum($product_price);
                $total+=$product_value;
            }
        }
        echo $total;

    }

    // get user order details

    function get_user_order_details(){
        global $conn;
        $username = $_SESSION['username'];
        $get_details = "SELECT * FROM `user_table` WHERE username='$username'";
        $result_query = mysqli_query($conn, $get_details);
        while($row_query = mysqli_fetch_array($result_query)){
            $user_id = $row_query['user_id'];
            if(!isset($_GET['edit_account'])){
                if(!isset($_GET['my_orders'])){
                    if(!isset($_GET['delete_account'])){
                        $get_orders = "SELECT * FROM `user_orders` WHERE user_id=$user_id AND order_status = 'pending'";
                        $result_orders_query = mysqli_query($conn, $get_orders);
                        $row_count = mysqli_num_rows($result_orders_query);
                        if($row_count > 0){
                            echo "<h3 class='text-center text-success my-2'> You have <span class='text-danger'>$row_count</span> pending orders</h3>";
                            echo " <a href='profile.php?my_orders'><h4 class='text-center text-info'> View Orders </h4></a>";
                        }
                    }
                }
            }
        }
    }
    

   


?>