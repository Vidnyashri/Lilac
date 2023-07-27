<?php include('header.php');?>
<!--header section end-->
<!--about section start-->
<section class="about" id="about">
	<div class="img">
		<img src="images/about3.jpg" alt="">
	</div>
	<div class="content">
		<div class="box"></div>
		
		<h2>About<span> Us...</span></h2>
		<p>Welcome to "LILAC".Founded in year 2022[Shop Location:Thane,Wagle Estate,West].We now serve customers out of India also.We hope you enjoy our products as much as we enjoy offering them to you.If you have any questions or comments ,please don't hesitate to contact us.</p>
		
	</div>
    <div class="icons-container">
        <div class="icons">
            <i class="fas fa-address-card"></i>
            <p>address card</p>
        </div>
        <div class="icons">
            <i class="fas fa-award"></i>
            <p>award cards</p>
        </div>
        <div class="icons">
            <i class="fas fa-gift"></i>
            <p>gift cards</p>
		</div>
	</div>
</section>
<!--about section end-->
<!-- message section starts -->
<section class="message" id="message">
    <form action="">
        <h3>get in <span>touch</span></h3>
        <input type="text" name="full_name" placeholder="full name" class="box">
        <input type="email" name="email" placeholder="email" class="box">
        <input type="number" name="phoneno" placeholder="phone" class="box">
        <textarea placeholder="message" name="msg" class="box" cols="30" rows="10"></textarea>
        <a href="lilac\website\admin\feedbackdata.php "><input type="submit" value="send message" class="btn2"></a>
    </form>
</section>

<!-- message section ends -->

<?php include('footer.php');?>