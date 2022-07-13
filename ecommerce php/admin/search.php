<?php  
session_start();
if(isset($_POST['user'])){
    include("config.php");
    include("navbar.php");
    $name=$_POST['user'];
    $qu="SELECT * FROM users where username like '%$name%'";
    $result=mysqli_query($cn,$qu);
    ?>
<table class="table table-dark table-striped">
  <thead>
    <tr>

    <th scope="col">user_id</th>
    <th scope="col">user_name</th>
    <th scope="col">User_email</th>
    <th scope="col">Delete Users</th>
    <th scope="col">Add Users</th>    
    </tr>
  </thead>
  <tbody>
<?php 
while($row=mysqli_fetch_array($result)){
    echo " <tr>
    <td>$row[user_id]</td>
    <td>$row[username]</td>
    <td>$row[email]</td>
    <td><a href='member.php?do=delete&user_id=$row[user_id]&search=user' class='btn btn-danger'>delete</a></td>
    <td><a href='member.php?do=edit&user_id=$row[user_id]&search=user' class='btn btn-primary'>edit</a></td>
  </tr>";
}
?>
  </tbody>
</table>
<?php
}
elseif(isset($_POST['category'])){
    include("config.php");
    include("navbar.php");
    $name=$_POST['category'];
    $qu="SELECT * FROM categories where name like '%$name%'";
    $result=mysqli_query($cn,$qu);
    ?>
<table class="table table-dark table-striped">
<thead>
  <tr>

  <th scope="col">#id</th>
  <th scope="col">name</th>
  <th scope="col">Descirption</th>
  <th scope="col">Ordering</th>
  <th scope="col">Delete Users</th>
  <th scope="col">Add Users</th>    
  </tr>
</thead>
<tbody>
<?php 
   while( $row=mysqli_fetch_array($result)){
    echo " <tr>
     <td>$row[id]</td>
     <td>$row[name]</td>
     <td>$row[description]</td>
     <td>$row[ordering]</td>
     <td><a href='category.php?do=delete&cat_id=$row[id]&search=category' class='btn btn-danger'>delete</a></td>
     <td><a href='category.php?do=edit&cat_id=$row[id]&search=category' class='btn btn-primary'>edit</a></td>
   </tr>";}
?>
  </tbody>
</table>
<?php
}







?>