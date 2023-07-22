
     <h3 class="text-danger my-5 text-center"> Delete Account</h3>
     <form action="" method="post" class="mt-5 " >
        <div class="form-outline mb-4">
            <input type="submit" value="Delete Account" name="delete" class="form-control w-50 m-auto text-center">
        </div>
        <div class="form-outline mb-4">
            <input type="submit" value="Don't Delete Account" name="dont_delete" class="form-control w-50 m-auto text-center mt-5">
        </div>
     </form>


     <?php

        $username_session = $_SESSION['username'];
        if(isset($_POST['delete'])){
            $delete_query = "DELETE FROM `user_table` WHERE username='$username_session'";
            $delete_result = mysqli_query($conn, $delete_query);
            if($delete_query){
                session_destroy();
                echo "<script> alert('Account Deleted Successfully')</script>";
                echo "<script> window.open('../index.php','_self')</script>";
            }
        }
        if(isset($_POST['dont_delete'])){
            echo "<script> window.open('profile.php','_self')</script>";

        }