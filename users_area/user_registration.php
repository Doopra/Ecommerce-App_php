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
    <title>Registration Page</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">

    <!--- font awesome cdn-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="./css/style.css">
</head>
<body>

    <div class="container-fluid mt-5 mb-4">
        <h2 class="text-center">New User Registration</h2>

        <div class="row d-flex algin-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-outline mb-4">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" id="username" class="form-control" placeholder="Enter your username" name="username" required>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" id="email" class="form-control" placeholder="Enter your email" name="email" required>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="image" class="form-label">User Image</label>
                        <input type="file" id="image" class="form-control"  name="image" required>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" class="form-control" placeholder="Enter your password" name="password" required>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <input type="password" id="confirm_password" class="form-control" placeholder="Confirm password" name="confirm_password" required>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" id="address" class="form-control" placeholder="Enter your address" name="address" required>
                    </div>

                    <div class="form-outline mb-4">
                        <label for="contact" class="form-label">Contact</label>
                        <input type="text" id="contact" class="form-control" placeholder="Enter your contact" name="contact" required>
                    </div>
                    <div class="mt-4 pt-2">
                        <input type="submit" value="Register" class="bg-info py-2 px-3 border-0" name="user_register">
                        <p class="small mt-2 pt-1">Already have an account? <a href="user_login.php" class="text-danger">Login</a></p>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
    


    
</body>
</html>

<?php

    if(isset($_POST['user_register'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $hash_password = password_hash($password, PASSWORD_DEFAULT);
        $confirm_password = $_POST['confirm_password'];
        $address = $_POST['address'];
        $contact = $_POST['contact'];
        $image = $_FILES['image']['name'];
        $image_temp = $_FILES['image']['tmp_name'];
        $user_ip = getIPAddress();


        //select query
        $select_query = "SELECT * FROM `user_table` WHERE  username='$username' OR user_email='$email'";
        $result = mysqli_query($conn, $select_query);
        $count_rows = mysqli_num_rows($result);
        if($count_rows>0){

            echo"<script>alert('Username or Email already exist')</script>";

        }elseif($password!=$confirm_password){
            echo"<script>alert('Password does not match')</script>";
        }
        
        else{

        //move images
         
        move_uploaded_file($image_temp,"./user_images/$image");
        //insert query

        $insert_query = "INSERT INTO `user_table` (username,user_email,user_password,user_image,user_ip,user_address,user_mobile) VALUES('$username','$email','$hash_password','$image','$user_ip','$address','$contact')";
        $exe_query = mysqli_query($conn, $insert_query);
        
        if($exe_query){
            echo"<script>alert('User Registered Successfully')</script>";
        } else{
            die(mysqli_error($conn));
        }
    }

    
    //selecting cart items
    $select_cart_items =  "SELECT * from `cart_details` where ip_address = '$user_ip'";
    $result_cart = mysqli_query($conn, $select_cart_items);
    $rows_cart_count = mysqli_num_rows($result_cart);
    if($rows_cart_count > 0){
        $_SESSION['username'] = $username;
        echo"<script>alert('you have items in the cart')</script>";
        echo"<script>window.open('../checkout.php','_self')</script>";
    } else{
        echo"<script>window.open('../index.php','_self')</script>";

    }
    }


?>