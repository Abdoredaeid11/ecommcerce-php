<?php  
session_start();
if(isset($_SESSION['username'])){
include("config.php");
include("navbar.php");

?>
<div class="container">
    
    <div class="row">

	<div class="four col-md-3">
		<div class="counter-box colored">
        <i class="fa  fa-user"></i>
			<span class="counter"><?php $qu="SELECT COUNT(username)as count FROM users";
            $result=mysqli_query($cn,$qu);
            $num=mysqli_fetch_array($result);
            echo $num['count'];
            ?></span>
			<p>Members</p>
		</div>
	</div>
	<div class="four col-md-3">
		<div class="counter-box">
        <i class="fa  fa-shopping-cart"></i>
			<span class="counter"><?php  
            $qu1="SELECT count(name) as count from categories";
            $result1=mysqli_query($cn,$qu1);
            $num1=mysqli_fetch_array($result1);
            echo $num1['count'];
            
            ?></span>
			<p>Categories</p>
		</div>
	</div>
	<div class="four col-md-3">
		<div class="counter-box">
			<i class="fa  fa-shopping-cart"></i>
			<span class="counter"><?php $item="SELECT COUNT(name) as itemcount from items";
			$itemresult=mysqli_query($cn,$item);
			$itemnum=mysqli_fetch_array($itemresult);
			echo $itemnum['itemcount'];  ?></span>
			<p>Items</p>
		</div>
	</div>
	 
  </div>	
</div>






<?php 






}

?>