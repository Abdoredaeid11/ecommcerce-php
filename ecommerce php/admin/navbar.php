<?php 
include("head.php");
include("config.php");
?>  
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">E-Commerce</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="home.php?search=''">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="../index1.php?search=''">HomePage</a>
        </li>
        <li class="nav-item">
                <a class="nav-link" href="member.php?do=manage&search=user">Member <span class="badge bg-secondary">
      <?php $qu="SELECT COUNT(username) as count FROM users";
$result=mysqli_query($cn,$qu);
$num=mysqli_fetch_array($result);
echo $num['count'];?> </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="category.php?do=manage&search=category">Category<span class="badge bg-secondary"><?php $result1=mysqli_query($cn,"SELECT COUNT(name) as count from categories");
          $num1=mysqli_fetch_array($result1);
          echo $num1['count']; ?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="../index1.php?search=''">HomePage</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="#">Sign up</a>
        </li>
      </ul>
      <?php $search=$_GET['search']?>
      <form action="search.php?search=<?php echo $search;?>" class="d-flex" method="POST">
      <input type="search" class="form-control mr-2 " name="<?php echo $search;?>" placeholder="search">
      <input  class="btn btn-outline-success" type="submit" value="search" name="submit">
      </form>
    </div>
  </div>
</nav>