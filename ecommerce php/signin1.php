<?php
include("connect.php");
if(isset($_POST['username'])&&isset($_POST['pass'])&&isset($_POST['email'])){
$username=$_POST['username'];
$pass=$_POST['pass'];
$email=$_POST['email'];
if(empty($username)||empty($pass)||empty($email)){
header('location:signup1.php');
exit();}
else {

 $qu="SELECT username from users where username='$username'";
 $result=mysqli_query($cn,$qu);
 $row=mysqli_num_rows($result);
 if($row>0){
 echo "this user name is taken ";
 header('location:signup1.php') ; }
else
$qu1="INSERT INTO  users (username,password,email) VALUES ('$username','$pass','$email')";
$resul1t=mysqli_query($cn,$qu1);
header('location:index1.php');




}

}












?>