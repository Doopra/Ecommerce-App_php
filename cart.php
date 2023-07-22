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
    include ('includes/menu.php');
    ?>
<!-- third child--->
<div class="bg-light">
    <h3 class="text-center">Hidden Store</h3>
    <p class="text-center">Communications is at the heart of e-commerce and community</p>
</div>


<!---- fourth child------>


<div class="container">
    <div class="row">
        <form action="" method="post">
        <table class="table table-bordered text-center">
            
            <tbody>

            <?php


            global $conn;
            $ip = getIPAddress();
            $total_price = 0;
            $cart_query = "SELECT * FROM `cart_details` WHERE ip_address='$ip' ";
            $result = mysqli_query($conn, $cart_query);
            $result_count = mysqli_num_rows($result);
            if($result_count > 0){
                echo "
                <thead>
                <tr>
                    <th>Product TItle</th>
                    <th> Image</th>
                    <th> Quantity</th>
                    <th> Total Price</th>
                    <th>Action</th>
                    <th colspan='2'>Operations</th>
                </tr>

            </thead>
                ";
            while($row = mysqli_fetch_array($result)){
                $product_id = $row['product_id'];
                $select_product = "SELECT * FROM `products` WHERE product_id = '$product_id'";
                $result_products = mysqli_query($conn, $select_product);
                while($row_product_price = mysqli_fetch_array($result_products)){
                    $product_price = array($row_product_price['product_price']);
                    $price_table = $row_product_price['product_price'];
                    $product_title = $row_product_price['product_title'];
                    $product_image1 = $row_product_price['product_image1'];
                    $product_value =array_sum($product_price);
                    $total_price+=$product_value;
            

?>
                
                <tr>
                    <td><?php echo $product_title ?></td>
                    <td> <img src="admin/product_images/<?php echo $product_image1 ?>" class="cart_img"> </td>
                    <td> <input type="text" name="qty" class="form-input w-50"> </td>

                    <?php 
                        $ip = getIPAddress();
                        if(isset($_POST['update_cart'])){
                            $quantities = $_POST['qty'];
                            $update = "update `cart_details` set quantity=$quantities where ip_address = '$ip'";
                            $result_products_quantity = mysqli_query($conn, $update);
                            $total_price = $total_price * $quantities;
                        }


                    ?>
                    <td>$<?php echo $price_table ?></td>
                    <td> <input type="checkbox" name="removeItem[]" value="<?php echo $product_id ?>">  </td>
                    <td>
                        
                        <input type="submit" name="update_cart" value="Update" class="btn btn-primary p-2 mx-2">
                        
                       

                        <input type="submit" class="btn btn-danger p-2" value="Remove Cart" name="remove_cart">
                    </td>
                </tr>

                <?php      }}}
                    else{
                        echo "<h2 class='text-center text-danger'>Cart is empty</h2>";
                    }
                ?>
            </tbody>
        </table>

        <div class="d-flex mb-5">

        <?php


global $conn;
$ip = getIPAddress();
$total_price = 0;
$cart_query = "SELECT * FROM `cart_details` WHERE ip_address='$ip' ";
$result = mysqli_query($conn, $cart_query);
$result_count = mysqli_num_rows($result);
if($result_count > 0){
    echo "
            
        <h4 class='px-3'>Subtotal: <strong class='text-info'> $total_price</strong></h4>
            <a href='index.php' class='btn btn-secondary p-3 py-2 mb-4 mx-3'> Continue shopping</a>
            <a href='./checkout.php' class='btn btn-info p-3 py-2 mb-4'> Checkout</a>

            ";
} else{
    echo "<a href='index.php' class='btn btn-secondary p-3 py-2 mb-4 mx-3'> Continue shopping</a>";
}
?>
        </div>
    </div>
</div>
</form>


<!----- function to remove cart------->

<?php
 function remover_cart_item(){
    global $conn;
    if(isset($_POST['remove_cart'])){
        foreach($_POST['removeItem'] as $remove_id){
            echo $remove_id;
            $delete_query = "DELETE from `cart_details` where product_id=$remove_id";
            $execute_delete_query = mysqli_query($conn, $delete_query);
            if($execute_delete_query){
                echo "<script> alert('Cart Deleted Successfully') </script>";
                echo "<script> window.open('cart.php','_self') </script>";
            }
            
        }

    }
 }
 echo $remove_cart = remover_cart_item();

?>

<?php
    include('includes/footer.php');
?> 
</div>
    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>