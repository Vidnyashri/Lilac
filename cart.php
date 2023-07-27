<?php

$connection = mysqli_connect("localhost", "root", "", "lilac");

session_start();

if (isset($_SESSION['user_id'])) {
   $user_id = $_SESSION['user_id'];
} else {
   $user_id = '';
   header('location:user_login.php');
};

if (isset($_POST['delete'])) {
   $cart_id = $_POST['cart_id'];
   $delete_cart_item = "DELETE FROM `cart` WHERE id = '$cart_id'";
   $delete_cart_run = mysqli_query($connection, $delete_cart_item);
}

if (isset($_GET['delete_all'])) {
   $delete_cart = "DELETE FROM `cart` WHERE user_id = '$user_id'";
   $delete_cart_run = mysqli_query($connection, $delete_cart);
   header('location:cart.php');
}

if (isset($_POST['update_qty'])) {
   $cart_id = $_POST['cart_id'];
   $qty = $_POST['qty'];
   $qty = filter_var($qty, FILTER_SANITIZE_STRING);
   $update_qty = "UPDATE `cart` SET quantity = '$qty' WHERE id = '$cart_id'";
   $update_run = mysqli_query($connection, $update_qty);
   $message[] = 'cart quantity updated';
}

require('header.php');

?>


<section class="shop" id="shop" method="POST">
   <h1 class="heading">shopping <span>cart</span></h1>
   <div class="box-container" method="POST">

      <?php
      $grand_total = 0;
      $connection = mysqli_connect("localhost", "root", "", "lilac");
      $query = "SELECT * FROM `cart`";
      $query_run = mysqli_query($connection, $query);

      if (mysqli_num_rows($query_run) > 0) {
         while ($row = mysqli_fetch_assoc($query_run)) {


      ?>
            <form action="" method="post" class="box">
               <input type="hidden" name="cart_id" value="<?= $row['id']; ?>">
               <input type="hidden" name="pid" value="<?php echo $row['pid']; ?>">
               <input type="hidden" name="name" value="<?php echo $row['name']; ?>">
               <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
               <input type="hidden" name="image" value="<?php echo $row['image']; ?>">
               <div class="img">
                  <img src="admin/upload/<?php echo $row['image']; ?>">
                  <div class="icons">
                    
                  </div>
               </div>
               <div class="content">
                  <h3><?php echo $row['name']; ?></h3>

                  <div class="price">₹ <?= $row['price']; ?>/-</div>
                  <input type="number" style="border:inset; height:auto; border-color:coral;" name="qty" class="price" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="<?= $row['quantity']; ?>">
                  <button type="submit" class="btn2" name="update_qty"><i class="fas fa-edit"></i></button>

               </div>
               <div class="content">
                  <h3>sub total : <span>₹ <?= $sub_total = ($row['price'] * $row['quantity']); ?>/-</span></h3>
                  <button type="submit" value="delete item" onclick="return confirm('delete this from cart?');" class="btn2" name="delete">Delete</button>
               </div>
            </form>
      <?php

            $grand_total += $sub_total;
         }
      } else {
         echo '<p class="empty">Cart is empty!</p>';
      }
      ?>

   </div>




</section>


<section class="shop" id="shop">
   <h1 class="heading">shopping <span>total</span></h1>
   <div class="box-container">
      <div class="box">
         <div class="content">
            <h3>grand total : <span>₹ <?= $grand_total; ?>/-</span></h3>
         </div>
         <div class="content">
         <a href="shop.php" class="btn2">Continue shopping</a><br>
         <a href="cart.php?delete_all" class="btn2 <?= ($grand_total > 1) ? '' : 'disabled'; ?>" onclick="return confirm('delete all from cart?');">delete all item</a><br>
         <a href="checkout.php" class="btn2 <?= ($grand_total > 1) ? '' : 'disabled'; ?>">proceed to checkout</a>
   
         </div>
      </div>
   </div>
</section>
<!-- shop section ends -->
<?php require('footer.php'); ?>







<script src="js/script.js"></script>