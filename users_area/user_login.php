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
    <title>Login Page</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">

    <!--- font awesome cdn-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="./css/style.css">
</head>
<body>

    <div class="container-fluid w-50 mt-5">
        <h2 class="text-center">Login Page</h2>

        <div class="row d-flex algin-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" id="username" class="form-control" placeholder="Enter your username" name="username" required>
                    </div>
                    
                    
                    <div class="form-outline mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" class="form-control" placeholder="Enter your password" name="password" required>
                    </div>
                   

                    
                    <div class="mt-4 pt-2">
                        <input type="submit" value="Login" class="bg-info py-2 px-3 border-0" name="user_register">
                        <p class="small mt-2 pt-1">Don't have an account? <a href="user_registration.php" class="text-danger">Register</a></p>
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
    $password = $_POST['password'];

    $select_query = "SELECT * FROM `user_table` where username='$username'";
    $result = mysqli_query($conn, $select_query);
    $row_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);
    $user_ip = getIPAddress();

    //cart item
    $select_query_cart = "SELECT * FROM `cart_details` where ip_address='$user_ip'";
    $select_cart = mysqli_query($conn, $select_query_cart);
    $row_count_cart = mysqli_num_rows($select_cart);
    if($row_count>0){
        $_SESSION['username'] = $username;
        if(password_verify($password, $row_data['user_password'])){
            if($row_count==1 AND $row_count_cart==0){
                $_SESSION['username'] = $username;
                echo"<script>alert('Login Successfully')</script>";
                echo"<script>window.open('profile.php','_self')</script>";
            }else{
                echo"<script>alert('Login Successfully')</script>";
                echo"<script>window.open('../payment.php','_self')</script>";
            }
        } else{
                echo"<script>alert('Invalid Credentials')</script>";
        }
        
        } else{
                echo"<script>alert('Invalid Credentials')</script>";
       
        }
}



?>