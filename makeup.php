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
    <h1 class="heading"><span>makeup</span></h1>
    <div class="box-container" method="POST">

        <?php
        $connection = mysqli_connect("localhost", "root", "", "lilac");
        $query = "SELECT * FROM `products` where category = 'Makeup'";
        $query_run = mysqli_query($connection, $query);

        if (mysqli_num_rows($query_run) > 0) {
            while ($row = mysqli_fetch_assoc($query_run)) {


        ?>
                <form action="" method="post" class="box">
                    <input type="hidden" name="pid" value="<?php echo $row['id']; ?>">
                    <input type="hidden" name="name" value="<?php echo $row['name']; ?>">
                    <input type="hidden" name="price" value="<?php echo $row['price'] - ($row['price'] * 0.15); ?>">
                    <input type="hidden" name="image" value="<?php echo $row['images']; ?>">
                    <div class="img">
                        <img src="admin/upload/<?php echo $row['images']; ?>">
                        <div class="icons">
                            
                            <!-- <a href="#" class="fas fa-heart"></a> -->
                           
                        </div>
                    </div>
                    <div class="content">
                        <h3><?php echo $row['name']; ?></h3>
                        <div class="price">Rs.<?php echo $row['price'] - ($row['price'] * 0.15); ?>-<span>Rs.<?php echo $row['price']; ?></span></div>
                        <button type="submit" name="add_to_cart" class="btn2">Add to cart</button>
                    </div>
                </form>
        <?php
            }
        } else {
            echo '<p class="empty">no products found!</p>';
        }
        ?>


    </div>
</section>
<!-- shop section ends -->
<?php require('footer.php'); ?>