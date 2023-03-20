<?php
ini_set('display_errors',"1");
include 'connect.php';

$lessonID=$_GET['lessonID'];
$query="SELECT * FROM lesson where lessonID='$lessonID' ";
$result= mysqli_query($con,$query);
$result=mysqli_fetch_array($result);
$title=$result['title'];
$content=$result['content'];
$content= explode('\n',$content);

?>

<html lang="en" dir="ltr">
  <head>
    <title> Lesson Page</title>
    <link rel="stylesheet" href="style.css">

  </head>
  <body>



    <br>
    <img class="Ml_image" src="ML.png" alt="">
    <div class="mediumbox">

      <ul>
        <?php
        //echo "count=".count($content); // 5
        foreach ($content as $key => $value) {
          echo '<li>'.$value.'</li>'.'<br> <br>';
        }
        //echo "title:".$title.'<br>';
        //echo "content:".$content;
        ?>
      </ul>

      <a href="quiz.php?quizID=<?php echo $lessonID;?>"><input  class="button" type="submit" name="goQuiz" value="Go to quiz"></a><br>
      <a href="userPage.html"><input  class="button" type="submit" name="goHome" value="back to home page"></a><br>




    </div>
  </body>
</html>
