<?php
    include('../includes/connect.php');
    if(isset($_POST['insert_brands'])){
        $brand_title=$_POST['brand_title'];
        $select_query = "SELECT * FROM brands WHERE brand_title='$brand_title'";
        $result_select = mysqli_query($conn, $select_query);
        $number = mysqli_num_rows($result_select);
        if($number > 0){
            echo "<script> alert('Brand already exist')</script>";
        } else{
        $insert_query = "INSERT INTO brands (brand_title) VALUES('$brand_title')";
        $result = mysqli_query($conn, $insert_query);
        if($result){
            echo "<script> alert('Category has been inserted successfully')</script>";
        }
    }
    }
?>

<h3 class="text-center p-2">Insert Brands</h3>
<form action="" method="post" class="mb-2 p-5">


    
<div class="input-group w-90 mb-2">
  <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" name="brand_title" placeholder="Insert Brands" aria-label="Username" aria-describedby="basic-addon1">
</div>
<div class="input-group w-10 mb-2">
  
  <button type="submit" class="form-control bg-info text-light p-2" name="insert_brands" aria-label="Brands" aria-describedby="basic-addon1">Insert Brands </button>
</div>

</form>