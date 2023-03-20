<?php
echo "start";
ini_set('display_errors',"1");
include 'connect.php';

echo "whaaaaaat";

session_start();


$name="";
$email="";
$pass="";
$passCon="";

echo "<br>deeee1";

if(isset($_POST['submit_reg'])){
  echo "<br>deeeeINSIDE";




  $name=$_POST['name'];
  $email=$_POST['email'];
  $pass=$_POST['pass'];
  $passCon=$_POST['passCon'];/* cheeeeeeeeck*/
  $pass=md5($pass);

  echo "name=".$name;
  echo "emai;=".$email;

  $query="INSERT INTO users (email, name, pass) VALUES('$email','$name','$pass')";
  mysqli_query($con,$query);
  /*header('location:userPage.php');*/
  header('location:login.html');

}


 ?>
