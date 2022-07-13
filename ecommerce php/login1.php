<?php  
session_start();
include('connect.php');


if(isset($_POST['username']) && isset ($_POST['pass'])){
$username=$_POST['username'];
$pass=$_POST['pass'];
if(empty($username)||empty($pass)){
header('location:index1.php');
exit();
}
else{
$qu="SELECT username,user_id FROM users where username='$username' AND password='$pass'";
$result=mysqli_query($cn,$qu);
$r=mysqli_fetch_array($result);
$id=$r['user_id'];
$row=mysqli_num_rows($result);
echo $row;
if($row>0){
$_SESSION['username']=$username;
$_SESSION['id']=$id;
//echo $username . $id;
header('location:home1.php');

}

else{
    header('location:index1.php');
    exit();
}

}



}







?>