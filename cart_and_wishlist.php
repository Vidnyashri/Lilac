<?php

$connection = mysqli_connect("localhost", "root", "", "lilac");
        

if(isset($_POST['add_to_wishlist'])){

   if($user_id == ''){
      header('location:user_login.php');
   }else{
    $user_id = $_SESSION['user_id'];

      $pid = $_POST['pid'];
      $pid = filter_var($pid, FILTER_SANITIZE_STRING);
      $name = $_POST['name'];
      $name = filter_var($name, FILTER_SANITIZE_STRING);
      $price = $_POST['price'];
      $price = filter_var($price, FILTER_SANITIZE_STRING);
      $image = $_POST['image'];
      $image = filter_var($image, FILTER_SANITIZE_STRING);

      $check_wishlist_numbers = "SELECT * FROM `wishlist` WHERE name = '$name' AND user_id = '$user_id'";
      $check_wishlist_run = mysqli_query($connection,$check_wishlist_numbers);

      $check_cart_numbers = "SELECT * FROM `cart` WHERE name = '$name' AND user_id = '$user_id'";
      $check_cart_run = mysqli_query($connection,$check_cart_numbers);

      if(mysqli_num_rows($check_wishlist_run) > 0){
         $message[] = 'already added to wishlist!';
      }elseif(mysqli_num_rows($check_cart_run) > 0){
         $message[] = 'already added to cart!';
      }else{
         $insert_wishlist = "INSERT INTO `wishlist`(user_id, pid, name, price, image) VALUES('$user_id','$pid','$name','$price','$image')";
         $insert_wishlist_run = mysqli_query($connection,$insert_wishlist);
         $message[] = 'added to wishlist!';
      }

   }

}

if(isset($_POST['add_to_cart'])){

   if($user_id == ''){
      header('location:user_login.php');
   }else{

      $pid = $_POST['pid'];
      $pid = filter_var($pid, FILTER_SANITIZE_STRING);
      $name = $_POST['name'];
      $name = filter_var($name, FILTER_SANITIZE_STRING);
      $price = $_POST['price'];
      $price = filter_var($price, FILTER_SANITIZE_STRING);
      $image = $_POST['image'];
      $image = filter_var($image, FILTER_SANITIZE_STRING);
      
      $check_cart_numbers = "SELECT * FROM `cart` WHERE name = '$name' AND user_id = '$user_id'";
      $check_cart_run = mysqli_query($connection,$check_cart_numbers);;

      if(mysqli_num_rows($check_cart_run) > 0){
         $message[] = 'already added to cart!';
      }else{

         $check_wishlist_numbers = "SELECT * FROM `wishlist` WHERE name = '$name' AND user_id = '$user_id'";
         $check_wishlist_run = mysqli_query($connection,$check_wishlist_numbers);;

         if(mysqli_num_rows($check_wishlist_run) > 0){
            $delete_wishlist = "DELETE FROM `wishlist` WHERE name = '$name' AND user_id = '$user_id'";
            $delete_run = mysqli_query($connection,$delete_wishlist);
         }

         $insert_cart = "INSERT INTO `cart`(user_id, pid, name, price, image) VALUES('$user_id','$pid','$name','$price','$image')";
         $insert_run = mysqli_query($connection,$insert_cart);
         $message[] = 'added to cart!';
         
      }

   }

}

?>