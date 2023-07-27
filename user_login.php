<?php require('config.php');

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X_UA_Compatible" content="IE=edge">
		<meta name="viewport" content="width-device-width,initial-scale=1.0">
		<title>Beautify</title>
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
		<!-- custom css file link -->
         <link rel="stylesheet" href="style2.css">
       </head>
<body>
   
<!--login section start-->
 <div class="container">
   <form method="POST" action="login_register.php" class="login active">
    <h2 class="title">Login with your account</h2>
    <div class="form-group">
        <label for="email">email</label>
        <div class="input-group">
        <input type="email" name="email" placeholder="Enter Email Address or  Username">
        <i class='bx bx-envelope'></i>
    </div>
    </div>
    <div class="form-group">
        <label for="password">password</label>
        <div class="input-group">
        <input type="password" pattern=".{8,}" name="password" placeholder="Enter Password">
        <i class='bx bx-lock-alt'></i>
    </div>
    <span class="help-text">At least 8 characters</span>
    </div>
    <button type="submit" onclick="popup()" class="btn-submit" name="login">Login</button>
    <a href="forgotpass.php">Forgot Password?</a>
    <p>I don't have an account.<a href="#" onclick="switchForm('register',event)">Register</a></p>
   </form>
<!--login section end-->

<!--register section start-->
    <form method="POST" action="login_register.php" class="register">
    <h2 class="title">Register your account</h2>
 
    <div class="form-group">
        <label for="email">Full name</label>
        <div class="input-group">
        <input type="text" name="fullname" placeholder="Enter your full Name">
        <i class='bx bx-envelope'></i>
    </div>
    </div>
    <div class="form-group">
        <label for="text">Username</label>
        <div class="input-group">
        <input type="text" name="username" placeholder="Enter User Name">
        <i class='bx bx-envelope'></i>
    </div>
    </div>
    <div class="form-group">
        <label for="email">email</label>
        <div class="input-group">
        <input type="email" name="email" placeholder="Enter your Email">
        <i class='bx bx-envelope'></i>
    </div>
    </div>
    <div class="form-group">
        <label for="password">password</label>
        <div class="input-group">
        <input type="password" pattern=".{8,}" name="password" placeholder="Enter Password">
        <i class='bx bx-lock-alt'></i>
    </div>
    <span class="help-text">At least 8 characters</span>
    </div>
    <div class="form-group">
        <label for="confrim-pass"> confrim password</label>
        <div class="input-group">
        <input type="password" pattern=".{8,}" name="confrim-pass" placeholder="Enter Confrim Password">
        <i class='bx bx-lock-alt'></i>
    </div>
    <span class="help-text">Confrim password must be same with password </span>
    </div>

    <button type="submit" onclick="popup()" class="btn-submit" name="register">Register</button>
    
    <p>I already have an account.<a href="#" onclick="switchForm('login',event)">login</a></p>
   </form>
 </div>
<script src="script.js"></script>
  <!--register section end-->
</body>
</html>
