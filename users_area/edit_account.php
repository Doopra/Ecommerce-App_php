<?php
    if(isset($_GET['edit_account'])){
        $user_session_name = $_SESSION['username'];
        $select_query = "SELECT * FROM `user_table` WHERE username='$user_session_name'";
        $result_query = mysqli_query($conn, $select_query);
        $row_fetch  = mysqli_fetch_array($result_query);
        $user_id = $row_fetch['user_id'];
        $username = $row_fetch['username'];
        $user_email = $row_fetch['user_email'];
        $user_address = $row_fetch['user_address'];
        $user_mobile = $row_fetch['user_mobile'];
    }

    if(isset($_POST['user_update'])){
        $update_id = $user_id;
        $username = $_POST['username'];
        $user_email = $_POST['user_email'];
        $user_address = $_POST['user_address'];
        $user_mobile = $_POST['user_mobile'];
        $user_image = $_FILES['user_image']['name'];
        $user_image_tmp = $_FILES['user_image']['tmp_name'];
        move_uploaded_file($user_image_tmp,"./user_images/$user_image");

        //update query
        $update_data = "UPDATE `user_table` SET username='$username', user_email='$user_email', user_image='$user_image', user_address='$user_address', user_mobile='$user_mobile' WHERE user_id='$update_id'";

        $update_query = mysqli_query($conn, $update_data);

        if($update_query){
            echo "<script>alert('Data updated successfully')</script>";
            echo "<script>window.open('user_logout.php','_self')</script>";
        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .edit_img{
            width: 100px;
            height: 100px;
        }
    </style>
</head>
<body>
    <h3 class="text-center text-success mb-4 my-5"> Edit Account</h3>
    <form action="" method="post" enctype="multipart/form-data" class="text-center">
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" name="username" value="<?php echo $username ?>" placeholder="Your username">
            <input type="email" class="form-control w-50 m-auto my-4" name="user_email" value="<?php echo $user_email ?>" placeholder="Your email">
            <input type="file" class="form-control w-50 m-auto my-4" name="user_image">
            <img src="./user_images/<?php echo $user_image ?>" class="edit_img" alt="">
            <input type="text" class="form-control w-50 m-auto my-4" name="user_address" value="<?php echo $user_address ?>" placeholder="Your address">
            <input type="phone" class="form-control w-50 m-auto my-4" name="user_mobile" value="<?php echo $user_mobile ?>" placeholder="Your phone number">
            <input type="submit" class="btn btn-info my-5" name="user_update" value="Update">
        </div>
    </form>
</body>
</html>