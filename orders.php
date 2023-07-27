<?php

//include 'config.php';

session_start();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    $user_id = '';
    header('location:user_login.php');
};

include 'cart_and_wishlist.php';

require('header.php');

?>
<!-- shop section starts -->
<section class="shop" id="shop" method="POST">
    <h1 class="heading">Orders<span></span></h1>
    <div class="box-container" method="POST">

        <?php
        $connection = mysqli_connect("localhost", "root", "", "lilac");
        $query = "SELECT * FROM `orders` where user_id='$user_id'";
        $query_run = mysqli_query($connection, $query);

        if (mysqli_num_rows($query_run) > 0) {
            while ($row = mysqli_fetch_assoc($query_run)) {


        ?>
                <div method="post" class="box">
                 
                    <div class="content">
                        <h3><?php echo "Name: ".$row['name']; ?></h3>
                        <h3><?php echo "Phone no: ".$row['number']; ?></h3>
                        <h3><?php echo "Email: ". $row['email']; ?></h3>
                        <h3><?php echo "Method of payment: ". $row['method']; ?></h3>
                        <h3><?php echo "Address: ".$row['address']; ?></h3>
                        <h3><?php echo "Total Products: ". $row['total_products']; ?></h3>
                        <h3><?php echo "Total Price: ". $row['total_price']; ?></h3>
                        <h3><?php echo "Ordered On: ".$row['placed_on']; ?></h3>
                        <h3><?php echo "Payment Status: ".$row['payment_status']; ?></h3>
                        
                    </div>
            </div>
        <?php
            }
        } else {
            echo '<p class="empty">no orders found!</p>';
        }
        ?>


    </div>
</section>
<!-- shop section ends -->
<?php require('footer.php'); ?>