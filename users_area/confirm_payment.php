<?php

    include('../includes/connect.php');
    session_start();

    if(isset($_GET['order_id'])){
        $order_id = $_GET['order_id'];
        $select_data = "SELECT * FROM `user_orders` WHERE order_id = $order_id";
        $result = mysqli_query($conn, $select_data);
        $row_fetch = mysqli_fetch_assoc($result);
        $invoice_number = $row_fetch['invoice_number'];
        $total_due = $row_fetch['amount_due'];
        
    }
    if(isset($_POST['confirm_payment'])){
        $invoice_number = $_POST['invoice_number'];
        $amount = $_POST['amount'];
        $payment_mode = $_POST['payment_mode'];
        $insert_query = "INSERT INTO `user_payments` (order_id,	invoice_number,	amount,	payment_mode) VALUES($order_id,$invoice_number,$amount,'$payment_mode')";
        $result = mysqli_query($conn, $insert_query);
        if($result){
            echo "<script class='text-center text-light'> alert('Successfully Completed Payment ')</script></h3>";
            echo "<script> window.open('profile.php?my_orders','_self')</script>";
        }

        $update_orders = "UPDATE `user_orders` SET order_status='Complete' WHERE order_id=$order_id";
        $result_orders_query = mysqli_query($conn, $update_orders);
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
     <!--- bootstrap cdn-->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">

<!--- font awesome cdn-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>
<body class="bg-secondary">

    
        <h2 class="text-center text-light my-5">Confirm Payment</h2>
        <div class="container my-5">
            <form action="" method="post">
                <div class="form-outline my-4 text-center">
                    <input type="text" class="form-control w-50 m-auto" name="invoice_number" value="<?php echo $invoice_number?>">
                </div>
                <div class="form-outline my-4 text-center">
                    <input type="text" class="form-control w-50 m-auto" name="amount" value="<?php echo $total_due ?>">
                </div>
                <div class="form-outline my-4 text-center">
                   <select name="payment_mode" id="" class="form-select w-50 m-auto">
                    <option >Select payment mode</option>
                    <option >UPI</option>
                    <option >Netbanking</option>
                    <option >Paypal</option>
                    <option >Cash on Delivery</option>
                    <option >Payoffline</option>
                   </select>
                </div>

                <div class="form-outline my-4 text-center">
                    <input type="submit" class="bg-info py-2 px-3 border-0" value="Confirm Payment" name="confirm_payment">
                </div>
            </form>
        </div>
    
    
</body>
</html>