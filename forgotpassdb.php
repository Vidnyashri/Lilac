<?php require('config.php');

$conn = mysqli_connect('localhost','root');

mysqli_select_db($conn,'lilac');
session_start();

if(isset($_POST['sendlink'])){
    $email = $_POST['email'];
    $query = "SELECT * FROM registered_user WHERE `email` = '$email'";
    $result = mysqli_query($conn,$query);
    if($result)
    {
        echo"<script>alert('run query');</script>";

    }
    else
    {
        echo"<script>alert('Cannot run query');</script>";
    }
}
?>