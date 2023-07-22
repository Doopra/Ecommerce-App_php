<?php
    include('../includes/connect.php');
    if(isset($_POST['insert_cat'])){
        $category_title=$_POST['cat_title'];
        $select_query = "SELECT * FROM categories WHERE category_title='$category_title'";
        $result_select = mysqli_query($conn, $select_query);
        $number = mysqli_num_rows($result_select);
        if($number > 0){
            echo "<script> alert('Category already exist')</script>";
        } else{
        $insert_query = "INSERT INTO categories (category_title) VALUES('$category_title')";
        $result = mysqli_query($conn, $insert_query);
        if($result){
            echo "<script> alert('Category has been inserted successfully')</script>";
        }
    }
    }
?>



<h3 class="text-center p-2">Insert Categories</h3>
<form action="" method="post" class="mb-2 p-5">


    
<div class="input-group w-90 mb-2">
  <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" name="cat_title" placeholder="Insert categories" aria-label="Username" aria-describedby="basic-addon1">
</div>
<div class="input-group w-10 mb-2">
  
  <input type="submit" class="form-control bg-info text-light p-2" name="insert_cat" value="Insert categories" aria-label="Categories" >
</div>

</form>