<?php
$conn = mysqli_connect('localhost','root');
mysqli_select_db($conn,'lilac');
session_start();
#for forgotPassword
if(isset($_POST['sendlink'])){
    $email = $_POST['email'];
     $query = "SELECT * FROM registered_user WHERE `email`='$email'";
    $result = mysqli_query($conn,$query);
    if($result)
    {
        if(mysqli_num_rows($result)==1)
        {
            echo"<script>alert();</script>";

            }
            else
            {
                echo"<script>alert('Server down!Try again later');</script>";
            }
        echo"<script>window.location.href='index.php'
            ;</script>";

        }
        else
        {
            echo"<script>alert('Email Not Found');</script>";
        }

}
    else
    {
       

    }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X_UA_Compatible" content="IE=edge">
		<meta name="viewport" content="width-device-width,initial-scale=1.0">
		<title>Beautify</title>
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
		<!--font cdn link-->
		<!-- custom css file link -->
         <link rel="stylesheet" href="style2.css">
       </head>
<body>
	<script src="script.js"></script>
  <!--register section end-->

<!--reset password section start-->
 <div class="container">
   <form method="POST" action="forgotpass.php" class="login active">
    <h2 class="title">Reset Password</h2>
    <div class="form-group">
        <label for="email">email</label>
        <div class="input-group">
        <input type="email" name="email" placeholder="Enter Email Address">
        <i class='bx bx-envelope'></i>
    </div>
    </div>
    <button type="submit" onclick="popup()" class="btn-submit" name="sendlink">Send Link</button>
   </form>
<!--reset password section end-->
</body>
</html>
