<?php  
session_start();
include('config.php');
include('function.php');
if(isset($_SESSION ['username'])){
  include("navbar.php");
        $username=$_SESSION['username'];
        $id=$_SESSION['id'];
        if(isset($_GET['do'])){
            $do=$_GET['do'];

        }
        else
        $do='manage';

        if($do=='manage'){

          echo "<h1 class='text center'>Manage Page</h1>";

            $qu="SELECT * FROM users";
            $result=mysqli_query($cn,$qu);
           // $row=mysqli_fetch_array($result);
            ?>
<table class="table table-dark table-striped">
  <thead>
    <tr>

    <th scope="col">user_id</th>
    <th scope="col">user_name</th>
    <th scope="col">User_email</th>
    <th scope="col">Delete Users</th>
    <th scope="col">Edit Users</th>    
    </tr>
  </thead>
  <tbody>
   
    <?php   
    while( $row=mysqli_fetch_array($result)){
    echo " <tr>
     <td>$row[user_id]</td>
     <td>$row[username]</td>
     <td>$row[email]</td>
     <td><a href='member.php?do=delete&user_id=$row[user_id]&search=user' class='btn btn-danger'>delete</a></td>
     <td><a href='?do=edit&user_id=$row[user_id]&search=user' class='btn btn-primary'>edit</a></td>

   </tr>";


}
    ///////////////
    
    ?>
  </tbody>
</table>
<a href="member.php?do=add&search=user" class="btn btn-primary " ><i class="fas fa-plus"></i>add member</a>  
<?php }




elseif($do=='add'){
  echo "<h1 class='text center'>Add Member</h1>";
  
echo '<div class="registration-form">

<form action="?do=insert&search=user" method="post">
<div class="form-icon">
    <span><i class="icon icon-user"></i></span>
</div>
<div class="form-group">
    <input type="text" name="username" class="form-control item" id="username" placeholder="Username">
</div>

<div class="form-group">
    <input type="password" name="pass" class="form-control item" id="password" placeholder="Password">
</div>
<div class="form-group">
    <input type="text" name="email" class="form-control item" id="email" placeholder="Email">
</div>


<div class="form-group">
<button  type="submit" class="btn btn-primary"> Add Member</button>
</div>
</form>
<div class="social-media">
<h5>Sign up with social media</h5>
<div class="social-icons">
    
</div>
</div>
</div>';

}

elseif($do=='insert'){
if($_SERVER['REQUEST_METHOD'] === 'POST'&& $_POST['username']<>''&& $_POST['pass']<>''&& $_POST['email']<>''){
  $username=$_POST['username'];
  $pass=$_POST['pass'];
  $email=$_POST['email'];
  $checkname="SELECT username from users where username='$username'";
  $checkresult=mysqli_query($cn,$checkname);
  $nameIsExits=mysqli_num_rows($checkresult);
  if($nameIsExits>0){back("this name is exist",3,'false');}
    else{
$qu="INSERT INTO users (username,password,email) VALUES ('$username','$pass','$email')";
$result=mysqli_query($cn,$qu);

back("successfully done",3,'true');}

}
else{
  echo'<div class="alert alert-danger" role="alert">
  <h4>you cant add members.</h4>
  </div>';}
}


elseif($do=='delete'){
  $id=$_GET['user_id'];
  $qu="DELETE FROM users WHERE user_id= $id";
  $result=mysqli_query($cn,$qu);
  echo'<div class="alert alert-success" role="alert">
<h4>successfully deleted.</h4>
</div>';


}

elseif($do=='edit'){


$id=$_GET['user_id'];
$qu="SELECT * FROM users where user_id=$id ";
$result=mysqli_query($cn,$qu);
$row=mysqli_fetch_array($result);
$name=$row['username'];
$pass=$row['password'];
$email=$row['email'];
$opass=$row['password'];
$id=$row['user_id'];
$r=mysqli_num_rows($result);
if($r>0){
  echo "<div class='registration-form'>

  <form action='?do=update&user_id=$id&search=user' method='post' >
  <div class='form-icon'>
      <span><i class='icon icon-user'></i></span>
  </div>
  <div class='form-group'>
      <input type='text' name='username' class='form-control item' id='username' placeholder='Username'autocomplete='off' value='$name'>
  </div>
  
  <div class='form-group'>
     <input type='hidden' name='opass' class='form-control item' id='password' placeholder='Password' value='$opass'>

      <input type='password' name='npass' class='form-control item' id='password' placeholder='old Password' autocomplete='new-password'>
  </div>
  <div class='form-group'>
      <input type='text' name='email' class='form-control item' id='email' placeholder='Email'value='$email'>
  </div>
  
  
  <div class='form-group'>
  <button  type='submit' class='btn btn-primary'> Edit Member</button>
  </div>
  </form>  
  </div>
  </div>
  </div>";
  }
}
  elseif($do=='update'){

    if(isset($_POST['username'])){
      $username=$_POST['username'];
      $opass=$_POST['opass'];
      $npass=$_POST['npass'];
      $email=$_POST['email'];
      $id=$_GET['user_id'];
      if(empty($npass)){
        $pass=$opass;
      }
      else{
        $pass=$npass;
      }
      $qu="UPDATE users SET username = '$username',password='$pass', email='$email' WHERE users.user_id =$id";
      $result=mysqli_query($cn,$qu);
      echo'<div class="alert alert-success" role="alert">
      <h4>successfully Updated.</h4>
      </div>';
      

   }
    else{
    echo "not here";}
}




}








       ?>
       
       
       
       
        




