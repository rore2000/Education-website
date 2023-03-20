<?php
//session_start();
ini_set('display_errors',"1");
include 'connect.php';
include 'login.php';
$userID= $_SESSION['userID'];
//echo "userID??".$userID;
$quizID=$_GET['quizID'];
$score=0;

echo ">>>".$quizID;
$query="SELECT * FROM Quiz where quizID='$quizID' ";
$result= mysqli_query($con,$query);
$result=mysqli_fetch_array($result);
$Q1=$result['Q1'];
$Q2=$result['Q2'];
$Q3=$result['Q3'];
$Q4=$result['Q4'];
$ch1=$result['ch1'];
$ch2=$result['ch2'];
$ch3=$result['ch3'];
$ch4=$result['ch4'];
$ans1=$result['ans1'];
$ans2=$result['ans2'];
$ans3=$result['ans3'];
$ans4=$result['ans4'];

$ch1= explode('\n',$ch1);
$ch2= explode('\n',$ch2);
$ch3= explode('\n',$ch3);
$ch4= explode('\n',$ch4);


//print_r($result);

?>

<html lang="en" dir="ltr">
  <head>
    <title> Quiz Page</title>
    <link rel="stylesheet" href="style.css">

  </head>
  <body>



    <br>
    <img class="Ml_image" src="ML.png" alt="">
    <div class="largebox">


      <form action="quiz.php?quizID=1" name = 'quizform' method="post">
        <?php
         echo '<span class="question">'.$Q1.'</span>'.'<br>';

        foreach ($ch1 as $key => $value) {
          $key=$key+1;
          //echo '<li>'.$value.'</li>'.'<br>';
          echo "<input type='radio' name='q1' value='$key' >" ;
          echo $value.'<br>';
          //echo "key??".$key;
        }


        echo '<br>'.'<span class="question">'.$Q2.'</span>'.'<br>';

       foreach ($ch2 as $key => $value) {
         $key=$key+1;
         echo "<input type='radio' name='q2' value='$key' >" ;
         echo $value.'<br>';
       }

       echo '<br>'.'<span class="question">'.$Q3.'</span>'.'<br>';

      foreach ($ch3 as $key => $value) {
        $key=$key+1;
        echo "<input type='radio' name='q3' value='$key' >" ;
        echo $value.'<br>';
      }

      echo '<br>'.'<span class="question">'.$Q4.'</span>'.'<br>';

     foreach ($ch4 as $key => $value) {
       $key=$key+1;
       echo "<input type='radio' name='q4' value='$key' >" ;
       echo $value.'<br>';
     }



        ?>


      <a href="quiz.php?quizID=<?php echo $quizID; ?>"> <input class="button" type="submit" name="submit_ans" value="Submit"></a><br>
      <a href="userPage.html"><input  class="button" type="button" name="goHome" value="back to home page"></a><br>
      </form>
<?php


if(isset($_POST['submit_ans'])){
  //echo "insiiiiiiide";
  if($_POST['q1']===$ans1) {echo "<span class='correct'> Qustion(1) is correct</span><br>";$score+=1;}  else { echo "<span class='wrong'> Qustion(1) is wrong</span><br>";}
  if($_POST['q2']===$ans2) {echo "<span class='correct'> Qustion(2) is correct</span><br>";$score+=1;}  else { echo "<span class='wrong'> Qustion(2) is wrong</span><br>";}
  if($_POST['q3']===$ans3) {echo "<span class='correct'> Qustion(3) is correct</span><br>"; $score+=1;} else { echo "<span class='wrong'> Qustion(3) is wrong</span><br>";}
  if($_POST['q4']===$ans4) {echo "<span class='correct'> Qustion(4) is correct</span><br>";$score+=1;}  else { echo "<span class='wrong'> Qustion(4) is wrong</span><br>";}
  echo "<br>"."<span class='score'> your score is ".$score."/4"."</span>";
  $update="UPDATE users set score=$score where userID='$userID' ";
  $result= mysqli_query($con,$update);

}

 ?>




    </div>
  </body>
</html>
