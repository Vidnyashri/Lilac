<?php require('config.php');

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X_UA_Compatible" content="IE=edge">
		<meta name="viewport" content="width-device-width,initial-scale=1.0">
		<title>lilac</title>
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
		<!--font cdn link-->
        <!-- custom css file link -->
         <link rel="stylesheet" href="style2.css">
       </head>
<body>
	<form action="#" class="register">
    <h2 class="title">Register your account</h2>
    <div class="form-group">
        <label for="email">email</label>
        <div class="input-group">
        <input type="email" id="email" placeholder="Enter Email Address Or Phone Number">
        <i class='bx bx-envelope'></i>
    </div>
    </div>
    <div class="form-group">
        <label for="password">password</label>
        <div class="input-group">
        <input type="password" pattern=".{8,}" id="password" placeholder="Enter Password">
        <i class='bx bx-lock-alt'></i>
    </div>
    <span class="help-text">At least 8 characters</span>
    </div>
    <div class="form-group">
        <label for="confrim-pass"> confrim password</label>
        <div class="input-group">
        <input type="password" pattern=".{8,}" id="confrim-pass" placeholder="Enter Confrim Password">
        <i class='bx bx-lock-alt'></i>
    </div>
    <span class="help-text">Confrim password must be same with password </span>
    </div>
    <button type="submit" class="btn-submit">Register</button>
    <p>I already have an account.<a href="#" onclick="switchForm('login',event)">login</a></p>
   </form>
 </div>
 <script src="script.js"></script>
<!--login section end-->
</body>
</html>
