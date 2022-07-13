<?php  
session_start();
if(isset($_SESSION['username'])){
    include('config.php');
    include('navbar.php');

if(isset($_GET['do'])){
    $do=$_GET['do'];
}
else{
$do='manage';}

if($do=='manage'){
  echo "<h1 class='text center'>Manage Page</h1>";

            $qu="SELECT items.*,users.username,categories.name as category_name FROM items 
            INNER JOIN categories ON categories.id=items.category_id
            inner join users      ON users.user_id=items.member_id
            ";
            $result=mysqli_query($cn,$qu);
           // $row=mysqli_fetch_array($result);
            ?>
<table class="table table-dark table-striped">
  <thead>
    <tr>

    <th scope="col">item_id</th>
    <th scope="col">name</th>
    <th scope="col">discription</th>
    <th scope="col">rating</th>
    <th scope="col">price</th>    
    <th scope="col">username</th>    
    <th scope="col">category_name</th>
    <th scope="col">Delete Item</th>    
    <th scope="col">Edit Item</th>  
    <th scope="col">Out Stock</th>    
  
    


    </tr>
  </thead>
  <tbody>
   
    <?php   
    while($row=mysqli_fetch_array($result)){
    $id=$row['item_id'];
    echo " <tr>
     <td>$row[item_id]</td>
     <td>$row[name]</td>
     <td>$row[discription]</td>
     <td>$row[rating]</td>
     <td>$row[price]</td>
     <td>$row[username]</td>
     <td>$row[category_name]</td>";
    
    echo" <td><a href='item.php?do=delete&item_id=$id&search=item' class='btn btn-danger'>delete</a></td>
     <td><a href='?do=edit&item_id=$id&search=item' class='btn btn-primary'>edit</a></td>";
     ?>
     <?php 
      if($row['stock']==0){
        echo"<td><a href='?do=active&item_id=$id&search=' class='btn btn-info'>Out Stock</a></td>";}
        elseif($row['stock']==1){
          echo"<td><a href='?do=unactive&item_id=$id&search=' class='btn btn-success'>In Stock </a></td>";

        }
      
?>

   </tr>
   <?php



}
    ///////////////
    
    ?>
  </tbody>
</table>
<a href="item.php?do=add&search=user" class="btn btn-primary " ><i class="fas fa-plus"></i>add item</a>  

<?php }




elseif($do=='add'){
    
    
    echo "<h1 class='text center'>Add Item</h1>"; ?>
  
     <div class="registration-form">
    
    <form action="?do=insert&search=''" method="post">
    <div class="form-icon">
        <span><i class="icon icon-user"></i></span>
    </div>
    <div class="form-group">
    <label for="inputAddress" class="form-label">name</label>

        <input type="text" name="name" class="form-control item" id="name" placeholder="name">
    </div>
    
    <div class="form-group">
    <label for="inputAddress" class="form-label">discription</label>

        <input type="text" name="discription" class="form-control item" id="discription" placeholder="discription">
    </div>
    
    <div class="form-group">
    <label for="inputAddress" class="form-label">Stock</label>

    <input type="text" name="stock" class="form-control item" id="stock" placeholder="stock">
</div>
<div class="form-group">
<label for="inputAddress" class="form-label">rating</label>

<label for="inputAddress" class="form-label">Rating</label>
<select name="rating" class="form-select" aria-label="disable select">
<option value="1">*</value>
<option value="2">**</value>
<option value="3">***</value>
<option value="4">****</value>
<option value="5">*****</value>
</select>
</div>
<br>
<div class="form-group">
<label for="inputAddress" class="form-label">price</label>

<input type="text" name="price" class="form-control item" id="price" placeholder="price">
</div>
<div class="form-group">
<label for="inputAddress" class="form-label">categories</label>
<select name="category" class="form-select" aria-label="disable select">
<?php
$qu="SELECT * FROM categories ";
$result=mysqli_query($cn,$qu);
while($row = mysqli_fetch_array($result)){
$id=$row['id'];
$name=$row['name'];
echo "<option value='$id'>$name</option>";

}
?>
</select>
</div>
<br>
<div class="form-group">
<label for="inputAddress" class="form-label">members</label>
<select name="member" class="form-select" aria-label="disable select">
<?php
$qu1="SELECT * FROM users ";
$result1=mysqli_query($cn,$qu1);
while($row1=mysqli_fetch_array($result1)){
$id1=$row1['user_id'];
$name1=$row1['username'];
echo "<option value='$id1'>$name1</option>  ";

}
?>
</select>
</div>
<br>
     <div class="form-group">
    <button  type="submit" class="btn btn-primary"> Add Item</button>
    </div>
    </form>
 
        
    </div>
    </div>
    </div>
<?php
}
elseif($do=='delete'){ 

    if(isset($_GET['item_id'])){
    $id=$_GET['item_id'];
    $qu="DELETE FROM items where item_id=$id";
    $result=mysqli_query($cn,$qu);
    echo'<div class="alert alert-success" role="alert">
    <h4>successfully Added.</h4>
    </div>';

    }
  
}
elseif($do=='edit'){
  if(isset($_GET['item_id'])){      
  $id=$_GET['item_id'];
  $qu="SELECT items.*,username,categories.name as cat_name FROM items inner join users on users.user_id=items.member_id inner join categories on categories.id=items.category_id where item_id=$id";
  $result=mysqli_query($cn,$qu);
  $row=mysqli_fetch_array($result);
  
  
  $id=$row['item_id'];
  $name=$row['name'];
  $discription=$row['discription'];
  $rating=$row['rating'];
  $price=$row['price'];
  $username=$row['username'];
  $cat_name=$row['cat_name'];
  $stock=$row['stock'];
  $cat_id=$row['category_id'];
  $member_id=$row['member_id']
  ?>
  <div class="registration-form">
      
  <form action="?do=update&item_id=<?php echo $id;?>&search=''" method="post">
  <div class="form-icon">
      <span><i class="icon icon-user"></i></span>
  </div>
  <div class="form-group">
  <label for="inputAddress" class="form-label" >name</label>
  
      <input type="text" name="name" class="form-control item" id="name" placeholder="name" value="<?php echo $name;?>">
  </div>
  
  <div class="form-group">
  <label for="inputAddress" class="form-label">discription</label>
  
      <input type="text" name="discription" class="form-control item" id="discription" placeholder="discription" value="<?php echo $discription;?>">
  </div>
  
  <div class="form-group">
  <label for="inputAddress" class="form-label" >Stock</label>
  
  <input type="text" name="stock" class="form-control item" id="stock" placeholder="stock" value="<?php echo $stock;?>">
  </div>
  <div class="form-group">
  <label for="inputAddress" class="form-label">rating</label>
  
  <label for="inputAddress" class="form-label">Rating</label>
  <select name="rating" class="form-select" aria-label="disable select">
    <?php function selected1($rating){
      if($rating==1){echo 'selected="selected"';}}
      function selected2($rating){
        if($rating==2){echo 'selected="selected"';}}
        function selected3($rating){
          if($rating==3){echo 'selected="selected"';}}
          function selected4($rating){
            if($rating==4){echo 'selected="selected"';}}
            function selected5($rating){
              if($rating==5){echo 'selected="selected"';}}
      ?>
    
  
  <option value="1" <?php  selected1($rating);?>>*</value>
  <option value="2"<?php  selected2($rating);?> >**</value>
  <option value="3" <?php  selected3($rating);?>>***</value>
  <option value="4"<?php  selected4($rating);?>>****</value>
  <option value="5" <?php  selected5($rating);?>>*****</value>
  </select>
  </div>
  <br>
  <div class="form-group">
  <label for="inputAddress" class="form-label">price</label>
  <input type="text" name="price" class="form-control item" id="price" placeholder="price" value="<?php echo $price;?>">

  <br>
   <div class="form-group">
  <button  type="submit" class="btn btn-primary"> Updated Item</button>
  </div>
  </form>
  
      
  </div>
  </div>
  </div>
  <?php
   }
  }
  

  elseif($do=="update"){
    if(isset($_POST['name'])){
      $name=$_POST['name'];
      $discription=$_POST['discription'];
      $stock=$_POST['stock'];
      $rating=$_POST['rating'];
      $price=$_POST['price'];
      $date=date("Y/m/d");
      $id=$_GET['item_id'];

     
      $qu="UPDATE items SET name='$name',discription='$discription',stock=$stock,date='2022-05-20',rating=$rating,price='$price' where item_id=$id";
     $result=mysqli_query($cn,$qu);
      echo'<div class="alert alert-success" role="alert">
    <h4>successfully Updated.</h4>
    </div>';
    }

  }
  elseif($do=='active'){
    if(isset($_GET['item_id'])){
     $id=$_GET['item_id'];
     $qu="SELECT stock FROM items where item_id=$id";
     $result=mysqli_query($cn,$qu);
     $num=mysqli_num_rows($result);
     if($num>0){
       $qu1="update items set stock=1 where item_id=$id ";
       $result1=mysqli_query($cn,$qu1);
       header('location:item.php?do=manage&search=item');

     }

    }
  }
  elseif($do=='unactive'){
    if(isset($_GET['item_id'])){
     $id=$_GET['item_id'];
     $qu="SELECT stock FROM items where item_id=$id";
     $result=mysqli_query($cn,$qu);
     $num=mysqli_num_rows($result);
     if($num>0){
       $qu1="update items set stock=0 where item_id=$id ";
       $result1=mysqli_query($cn,$qu1);
       header('location:item.php?do=manage&search=item');

     }

    }
  }








elseif($do='insert'){
  if(isset($_POST['name'])){
    $name=$_POST['name'];
    $discribe=$_POST['discription'];
    $stock=$_POST['stock'];
    $rating=$_POST['rating'];
    $price=$_POST['price'];
    $category=$_POST['category'];
    $member=$_POST['member'];
    $date=date("Y/m/d");
    $qu="INSERT INTO items (name,discription,date,stock,rating,price,category_id,member_id) VALUES ('$name','$discribe','$date',$stock,$rating,'$price',$category,$member)";
    $result=mysqli_query($cn,$qu);
    echo'<div class="alert alert-success" role="alert">
    <h4>successfully Added.</h4>
    </div>';
    

  }  
}







}




?>

