<?php 
session_start();
if(isset($_SESSION['username'])){
include("config.php");
include("navbar.php");
            if(isset($_GET["do"])){
            $do=$_GET["do"];


            }
            else{
                $do='manage';
            }

if($do=='manage'){
 echo "<h1 class='text center'>Manage Page</h1>";

$qu="SELECT * FROM categories";
$result=mysqli_query($cn,$qu);?>
<table class="table table-dark table-striped">
<thead>
  <tr>

  <th scope="col">#id</th>
  <th scope="col">name</th>
  <th scope="col">Descirption</th>
  <th scope="col">Ordering</th>
  <th scope="col">Delete category</th>
  <th scope="col">Edit category</th>    
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
         <td><a href='?do=delete&cat_id=$row[id]&search=category' class='btn btn-danger'>delete</a></td>
         <td><a href='?do=edit&cat_id=$row[id]&search=category' class='btn btn-primary'>edit</a></td>
    
       </tr>";
    
    
    }
    ?>
    </tbody>
</table>
<a href="?do=add&search=category" class="btn btn-primary " ><i class="fas fa-plus"></i>add category</a>  

<?php
}
elseif($do=='delete'){
$id=$_GET['cat_id'];
$qu="DELETE FROM categories WHERE id=$id";
$delete=mysqli_query($cn,$qu);
echo'<div class="alert alert-success" role="alert">
<h4>successfully deleted.</h4>
</div>';
}
elseif($do=='add'){
    echo '<div class="registration-form">

    <form action="?do=insert&search=category" method="post">
    <div class="form-icon">
        <span><i class="icon icon-user"></i></span>
    </div>
    <div class="form-group">
        <input type="text" name="name" class="form-control item" id="name" placeholder="name">
    </div>
    
    <div class="form-group">
        <input type="text" name="description" class="form-control item" id="description" placeholder="description">
    </div>
    <div class="form-group">
        <input type="text" name="order" class="form-control item" id="order" placeholder="ordering">
    </div>
    
    
    <div class="form-group">
    <button  type="submit" class="btn btn-primary"> Add Category</button>
    </div>
    </form>
    <div class="social-media">
    <div class="social-icons">
        
    </div>
    </div>
    </div>';



}

elseif($do=='insert'){
if(isset($_POST['name'])&& $_POST['name']<>'' && $_POST['description']<>''&& $_POST['order']<>''){
$name=$_POST['name'];
$description=$_POST['description'];
$order=$_POST['order'];
$qu="SELECT * FROM categories where name='$name'";
$result=mysqli_query($cn,$qu);
$num=mysqli_num_rows($result);
if($num<>1){
    $qu1="INSERT INTO categories (name,description,ordering) VALUES ('$name','$description','$order')";
    $result1=mysqli_query($cn,$qu1);
    echo'<div class="alert alert-success" role="alert">
<h4>successfully Added.</h4>
</div>';

}


}
else{
    echo'<div class="alert alert-danger" role="alert">
    <h4>you cant add categories.</h4>
    </div>';}

}
elseif($do=='edit'){
    if(isset($_GET['cat_id'])){
        $id=$_GET['cat_id'];
        $qu="SELECT * FROM categories where id=$id ";
        $result=mysqli_query($cn,$qu);
        $row=mysqli_fetch_array($result);
        $name=$row['name'];
        $discripe=$row['description'];
        $order=$row['ordering'];
        $id=$row['id'];

    
    echo "<div class='registration-form'>

    <form action='?do=update&cat_id=$id &search=category' method='post'>
    <div class='form-icon'>
        <span><i class='icon icon-user'></i></span>
    </div>
    <div class='form-group'>
        <input type='text' name='name' class='form-control item' id='name' placeholder='name' value='$name'>
    </div>
    
    <div class='form-group'>
        <input type='text' name='description' class='form-control item' id='description' placeholder='description' value='$discripe'>
    </div>
    <div class='form-group'>
        <input type='text' name='order' class='form-control item' id='order' placeholder='ordering' value='$order'>
    </div>
    
    
    <div class='form-group'>
    <button  type='submit' class='btn btn-primary'> Add Category</button>
    </div>
    </form>
    <div class='social-media'>
    <div class='social-icons'>
        
    </div>
    </div>
    </div>";}
    }

    elseif($do=='update'){
    if(isset($_POST['name'])){
        $name=$_POST['name'];
        $description=$_POST['description'];
        $order=$_POST['order'];
        $id=$_GET['cat_id'];
        $qu="SELECT * FROM categories where name='$name'";
        $result=mysqli_query($cn,$qu);
        $num=mysqli_num_rows($result);
        if($num<>1){
            $qu1="UPDATE categories SET name = '$name', description='$description',ordering='$order' WHERE categories.id =$id";            
            $result1=mysqli_query($cn,$qu1);
            echo'<div class="alert alert-success" role="alert">
        <h4>successfully Updated.</h4>
        </div>';
        
        }

    } 

        

    }



}






















?>