<?php

$db_name = 'mysql:host=localhost;dbname=lilac';
$user_name = 'root';
$user_password = '';
$conn = new PDO($db_name, $user_name, $user_password);



session_start();

if (isset($_SESSION['user_id'])) {
  $user_id = $_SESSION['user_id'];
} else {
  $user_id = '';
  header('location:user_login.php');
};

if (isset($_POST['checkout'])) {

  $name = $_POST['fullname'];
  $mobile = $_POST['mobile'];
  $email = $_POST['email'];
  $method = $_POST['method'];
  $address = $_POST['address'] . "," . $_POST['city'] . "," . $_POST['state'];
  $total_products = $_POST['total_products'];
  $total_price = $_POST['total_price'];

  $check_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
  $check_cart->execute([$user_id]);

  if ($check_cart->rowCount() > 0) {

    $insert_order = $conn->prepare("INSERT INTO `orders`(user_id, name, number, email, method, address, total_products, total_price) VALUES(?,?,?,?,?,?,?,?)");
    $insert_order->execute([$user_id, $name, $mobile, $email, $method, $address, $total_products, $total_price]);

    $delete_cart = $conn->prepare("DELETE FROM `cart` WHERE user_id = ?");
    $delete_cart->execute([$user_id]);

    $message[] = 'order placed successfully!';
  } else {
    $message[] = 'your cart is empty';
  }
}

?>

<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    body {
      font-family: Arial;
      font-size: 17px;
      padding: 8px;
    }

    * {
      box-sizing: border-box;
    }

    .row {
      display: -ms-flexbox;
      /* IE10 */
      display: flex;
      -ms-flex-wrap: wrap;
      /* IE10 */
      flex-wrap: wrap;
      margin: 0 -16px;
    }

    .col-25 {
      -ms-flex: 25%;
      /* IE10 */
      flex: 25%;
    }

    .col-50 {
      -ms-flex: 50%;
      /* IE10 */
      flex: 50%;
    }

    .col-75 {
      -ms-flex: 75%;
      /* IE10 */
      flex: 75%;
    }

    .col-25,
    .col-50,
    .col-75 {
      padding: 0 16px;
    }

    .container {
      background-color: #f2f2f2;
      padding: 5px 20px 15px 20px;
      border: 1px solid lightgrey;
      border-radius: 3px;
    }

    input[type=text] {
      width: 100%;
      margin-bottom: 20px;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }

    input[type=number] {
      width: 100%;
      margin-bottom: 20px;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }

    select {
      width: 100%;
      margin-bottom: 20px;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }

    option {
      width: 100%;
      margin-bottom: 20px;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }

    label {
      margin-bottom: 10px;
      display: block;
    }

    .icon-container {
      margin-bottom: 20px;
      padding: 7px 0;
      font-size: 24px;
    }

    .btn {
      background-color: #04AA6D;
      color: white;
      padding: 12px;
      margin: 10px 0;
      border: none;
      width: 100%;
      border-radius: 3px;
      cursor: pointer;
      font-size: 17px;
    }

    .btn:hover {
      background-color: #45a049;
    }

    a {
      color: #2196F3;
    }

    hr {
      border: 1px solid lightgrey;
    }

    span.price {
      float: right;
      color: grey;
    }

    /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
    @media (max-width: 800px) {
      .row {
        flex-direction: column-reverse;
      }

      .col-25 {
        margin-bottom: 20px;
      }
    }


    .display-orders {
      text-align: center;
      padding-bottom: 0;
      border: .2rem solid black;

    }

    .display-orders p {
      display: inline-block;
      padding: 1rem 2rem;
      margin: 1rem .5rem;
      font-size: 2rem;
      text-align: center;
      border: .2rem solid black;
      background-color: white;
      box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .1);
      border-radius: .5rem;
    }

    .display-orders p span {
      color: red;
    }

    .display-orders .grand-total {
      margin-top: 1.5rem;
      margin-bottom: 2.5rem;
      font-size: 2.5rem;
      color: #666;
    }

    .display-orders .grand-total span {
      color: red;
    }
  </style>
</head>

<body>
  <div class="row">
    <div class="col-75">
      <div class="container">
        <form action="" method="POST">

          <h3>Your Orders</h3>
          <div class="display-orders">
            <?php
            $grand_total = 0;
            $cart_items[] = '';
            $select_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
            $select_cart->execute([$user_id]);
            if ($select_cart->rowCount() > 0) {
              while ($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)) {
                $cart_items[] = $fetch_cart['name'] . ' (' . $fetch_cart['price'] . ' x ' . $fetch_cart['quantity'] . ') - ';
                $total_products = implode($cart_items);
                $grand_total += ($fetch_cart['price'] * $fetch_cart['quantity']);
            ?>
                <p> <?= $fetch_cart['name']; ?> <span>(<?= '₹ ' . $fetch_cart['price'] . '/- x ' . $fetch_cart['quantity']; ?>)</span> </p><br>
            <?php
              }
            } else {
              echo '<p class="empty">your cart is empty!</p>';
            }
            ?>
            <input type="hidden" name="total_products" value="<?= $total_products; ?>">
            <input type="hidden" name="total_price" value="<?= $grand_total; ?>" value="">
            <div class="grand-total">grand total : <span>₹ <?= $grand_total; ?>/-</span></div>
          </div>

          <div class="row">
            <div class="col-50">
              <h3>Billing Address</h3>
              <label for="fname"><i class="fa fa-user"></i> Full Name</label>
              <input type="text" id="fname" name="fullname" placeholder="Full Name">
              <label for="mob"><i class="fa fa-mobile"></i> Phone Number</label>
              <input type="number" min="0" max="9999999999" onkeypress="if(this.value.length == 10) return false;" id="mob" name="mobile" placeholder="Phone number">
              <label for="email"><i class="fa fa-envelope"></i> Email</label>
              <input type="text" id="email" name="email" placeholder="xxx@example.com">
              <label for="method"><i class="fa fa-doller"></i> Payment Method</label>
              <select name="method" id="method">
                <option value="Cash on Delivery">Cash on Delivery</option>
                <option value="Phonepay"><i class="fas fa-phonepay"></i> Phonepay</option>
                <option value="PayTM"><i class="fas fa-paytm"></i>PayTM</option>
              </select>
              <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
              <input type="text" id="adr" name="address" placeholder="Address">
              <label for="city"><i class="fa fa-institution"></i> City</label>
              <input type="text" id="city" name="city" placeholder="Mumbai">

              <div class="row">
                <div class="col-50">
                  <label for="state">State</label>
                  <input type="text" id="state" name="state" placeholder="Maharashtra">
                </div>
              </div>
            </div>



          </div>
          <label>
            <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
          </label>
          <input type="submit" name="checkout" value="Place Order" class="btn">
        </form>
      </div>
    </div>

  </div>

</body>

</html>