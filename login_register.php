<?php
$conn =mysqli_connect('localhost','root');

mysqli_select_db($conn,'lilac');
session_start();

#for login
if(isset($_POST['login'])){
	$email = $_POST['email'];
	 $password = $_POST['password'];
	$query = "SELECT * FROM registered_user WHERE `email`='$email'";
	$result = mysqli_query($conn,$query);
	if($result)
	{
		if(mysqli_num_rows($result)==1)
		{
			$result_fetch = mysqli_fetch_assoc($result);
			if($result_fetch['password'] == $password)
	 		{
	 			if($result_fetch['user_type'] == "user"){
					$_SESSION['user_id'] = $result_fetch['id'];
				 header('location:index.php');
				}
				elseif($result_fetch['user_type'] == "admin"){
					$_SESSION['admin_id'] = $result_fetch['id'];
				 header('location: admin/index.php');
				}
				else{
					echo "Invalid user";
				}
				 
	 		}
	 		else
	 		{
	 			echo"<script>alert('Incorrect Password');</script>";
	 		}

		}	
		else
		{
			echo"<script>alert('email or user name not registred');</script>";
		}

	}
	else
	{
		echo"<script>alert('query cannot run');</script>";
	}
}




#for registration
if(isset($_POST['register']))
{	
	 $fullname = $_POST['fullname'];
	 $username = $_POST['username'];
	 $email = $_POST['email'];
	 $password = $_POST['password'];
	 $sql="SELECT * FROM registered_user WHERE `username`='$username' OR `email`='$email'";
	 $result = mysqli_query($conn,$sql);

	 if ($result) 
	 {
	 	if(mysqli_num_rows($result)>0)
	 	{
	 		$result_fetch = mysqli_fetch_assoc($result);
	 		if($result_fetch['username'] == $username)
	 		{
	 			echo"<script>alert('user name already taken');</script>";
	 		}
	 		else
	 		{
	 			echo"<script>alert('email already registred');</script>";
	 		}
	 	}
	 	else
	 	{
	 	
	 		$sql_query = "INSERT INTO registered_user (full_name,username,email,password)
	 VALUES ('$fullname','$username','$email','$password')";
	 	if(mysqli_query($conn,$sql_query))
	 	{
	 		echo"<script>alert('registration successful');</script>";
			header('location:user_register.php');
	 	}
	 	
	 	else
	 	{
	 		echo"<script>alert('registration failed');</script>";
	 	}
		
	 } 
	}
	 
	 mysqli_close($conn);
}
?>