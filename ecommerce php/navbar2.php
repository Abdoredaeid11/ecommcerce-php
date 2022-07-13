<?php 
include("head1.php");
include("connect.php");
?>  
<nav class="navbar navbar-expand-lg navbar-light bg-light" >
  <div class="container-fluid">
    <a class="navbar-brand" href="#">E-Commerce</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="home1.php">Home</a>
        </li>
       
        <li class="nav-item">
          <a class="nav-link" href="category.php?do=manage&search=category">Categories</a>
        </li>
        
        <li class="nav-item">
        <a class="nav-link" href="Item.php">Items</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="#">Sign up</a>
        </li>
      </ul>
      
    </div>
  </div>
</nav>

<nav class="navbar navbar-expand-lg navbar-light bg-light" >
  <div class="container-fluid">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
      <li class="nav-item"><?php
$qu="SELECT * From categories order by id ";
$result=mysqli_query($cn,$qu);

while($fetch=mysqli_fetch_array($result)){
  echo '<li><a class="nav-link" href="category.php? . pagename='?><?php echo $fetch["name"];echo'"';echo'>';?><?php  echo $fetch["name"];?></a></li><?php
}
        ?></li>
      </ul>
      
    </div>
  </div>
</nav>


