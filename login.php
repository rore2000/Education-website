<?php
ini_set('display_errors',"1");
include 'connect.php';
session_start();

$email="";
$pass="";

echo "<br>out";

if(isset($_POST['submit_login'])){
  echo "<br>INSIDE";

  $email=$_POST['email'];
  $pass=$_POST['pass'];
  $pass=md5($pass);


  $query="SELECT userID from users where email='$email' and pass='$pass' ";
  $result = mysqli_query($con,$query);
  $id= mysqli_fetch_array($result);
  $_SESSION['userID']=$id['userID'];
  header('location:userPage.html');

}

 ?>
