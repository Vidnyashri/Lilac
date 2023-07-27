<?php

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

require ('header.php');

?>
<!-- shop section starts -->
<section class="shopview" id="shop">
    
    <div class="box-container">

<?php
$pid = $_GET['pid'];
$connection=mysqli_connect("localhost","root","","lilac");
                    $query = "SELECT * FROM `products` where id='$pid'";
                    $query_run=mysqli_query($connection, $query);

                    if(mysqli_num_rows($query_run) > 0)
                    {
                        while($row = mysqli_fetch_assoc($query_run))
                        {


?>

        <div class="boxview">
            <div class="img">
                <img src="admin/upload/<?php echo $row['images'];?>">
                <div class="icons">
                <a href="#" class="fas fa-shopping-cart"></a>
                    
                </div>
            </div>
            <div class="content">
                <h3><?php echo $row['name'];?></h3>
                <div class="price">Rs.<?php echo $row['price']-($row['price']*0.15);?>-<span>Rs.<?php echo $row['price'];?></span></div>
                <div><a href="cart.php?pid=<?php echo $row['id']; ?>" class="btn2">add to cart</a></div>
               
            </div>
        </div>
        <?php 
                        }
                    }
                    else{
                        echo "No  Products Found";
                    }
        ?>

        
      
    </div>
</section>
<!-- shop section ends -->
<?php require('footer.php');?>