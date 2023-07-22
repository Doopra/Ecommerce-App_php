
<?php


include('./includes/connect.php');


    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">

    <style></style>
</head>
<body>
<?php
        $user_ip = getIPAddress();
        $get_user = "SELECT * FROM `user_table` WHERE user_ip='$user_ip'";
        $result = mysqli_query($conn, $get_user);
        $run_query = mysqli_fetch_array($result);
        $user_id = $run_query['user_id'];
        $username = $run_query['username'];

?>

<div id="wrapper">
  <div id="container">

    <div id="info">
      
      <img id="product" src="./images/capsicum.png"/>

      <a href="./users_area/order.php?user_id=<?php echo $user_id ?>"> pay offline </a>
      

      <div id="price">

        <h2 class="mt-5 text-center">Kindly make your payment <?php echo $username ?></h2>

      </div>
    </div>

    <div id="payment">

      <form id="checkout">

        <input class="card" id="visa" type="button" name="card" value="">
        <input class="card" id="mastercard" type="button" name="card" value="">

        <label>Credit Card Number</label>
        <input id="cardnumber" type=text pattern="[0-9]{13,16}" name="cardnumber" requierd="true" placeholder="0123-4567-8901-2345">

        <label>Card Holder</label>
       <input id="cardholder" type="text" name="name" requierd="true" maxlength="50" placeholder="Cardholder">

        <label>Expiration Date</label>
        <label id="cvc-label">CVC/CVV</label>
        <div id="left">
            <select name="month" class="select-custom-content " id="month" onchange="" size="1">
              <option value="00">MM</option>
              <option value="01">01</option>
              <option value="02">02</option>
              <option value="03">03</option>
              <option value="04">04</option>
              <option value="05">05</option>
              <option value="06">06</option>
              <option value="07">07</option>
              <option value="08">08</option>
              <option value="09">09</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
            </select>
        
            <select name="year" id="year" onchange="" size="1">
              <option value="00">YY</option>
              <option value="01">16</option>
              <option value="02">17</option>
              <option value="03">18</option>
              <option value="04">19</option>
              <option value="05">20</option>
              <option value="06">21</option>
              <option value="07">22</option>
              <option value="08">23</option>
              <option value="09">24</option>
              <option value="10">25</option>
            </select>
        </div>


        <input id="cvc" type="text" placeholder="Cvc/Cvv" maxlength="3" />

        <input class="btn btn-secondary mt-3" type="button" name="purchase" value="Purchase">
      </form>
    </div>

  </div>
</div>
    
</body>
</html>