<?php
$conn =mysqli_connect('localhost','root');

mysqli_select_db($conn,'lilac');
session_start();
#for login
if(isset($_POST['checkout'])){
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$cardname = $_POST['cardname'];
$cardno = $_POST['cardno'];
$expmonth = $_POST['expmonth'];
$expyear = $_POST['expyear'];
$cvv = $_POST['cvv'];

  $sql_query = "INSERT INTO cart(fullname,email,address,city,state,cardname,cardno,expmonth,expyear,cvv)
VALUES('$fullname', '$email', '$address','$city','$state','$cardname','$cardno','$expmonth','$expyear','$cvv')";
$result = mysqli_query($conn,$sql_query);
if(mysqli_query($conn,$sql_query))
    {
      echo"<script>alert('registration successful');</script>";
    }
    
    else
    {
      echo"<script>alert('registration failed');</script>";
 
    }
    mysqli_close($conn);
}
?>