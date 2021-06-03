<?php session_start(); ?>
<?php include_once('connect.php'); ?>
<?php include_once('nav.php'); ?>
<?php include_once('lib.php'); ?>

<?php
if(!isActive()) {
    header("Location: ./home.php");
    exit();
}
?>

<?php

if(isset($_POST['question1']) &&
   isset($_POST['question2']) &&
   isset($_POST['question3']) &&
   isset($_POST['question4']) &&
   isset($_POST['question5'])) {

  $question1 = dehack($_POST['question1']);
  $question2 = dehack($_POST['question2']);
  $question3 = dehack($_POST['question3']);
  $question4 = dehack($_POST['question4']);
  $question5 = dehack($_POST['question5']);
  $score = 0;
  $test_id = dehack($_GET['q']);
  
  $sql = "SELECT * FROM Answer_sheet WHERE test_id = $test_id"; // sql selection
  $testKey = array();
  $res = $db->query($sql);    // database query
  
  while($row = mysqli_fetch_assoc($res)) { // while rows exist
    array_push($testKey, $row['answer1']); //save correct answer for each question
  }

    if($question1 == $testKey[0]){
      $score += 1;
    }
    if($question2 == $testKey[1]){
      $score += 1;
    }
    if($question3 == $testKey[2]){
      $score += 1;
    }
    if($question4 == $testKey[3]){
      $score += 1;
    }
    if($question5 == $testKey[4]){
      $score += 1;
    }

    $score = ($score/5)*100;

  $time = date(Y) . "-" . date(m) . "-" . date(d) . " " . date(H) . ":" . date(i) . ":" . date(s);
  $user = $_SESSION['user_id'];

  $sql = "SELECT * FROM Results WHERE user_id = $user AND test_id = $test_id";
  $res = mysqli_query($db, $sql);

  if(mysqli_num_rows($res) != 0){
    $userResult = "UPDATE Results SET score = $score, time_stamp = '$time' WHERE user_id = $user AND test_id = $test_id";
    if($db->query($userResult)){
      header("Location: https://cs.csubak.edu/~nkalar/CMPS3680/project3/results.php");
      exit();
    }
    echo "DATABASE ERROR<br><br>";
  }
  else {
    $userResult = "INSERT INTO Results ( user_id, test_id, score, time_stamp) VALUES ($user, $test_id, $score,'$time')";

    if($db->query($userResult)){
      header("Location: https://cs.csubak.edu/~nkalar/CMPS3680/project3/results.php");
      exit();
    }
    echo "DATABASE ERROR<br><br>";
  }
}
?>

<?php
if(isset($_GET['q'])) {
    $test_id = dehack($_GET['q']); //escapes post from test.php
    $sql = "SELECT * FROM Answer_sheet WHERE test_id = $test_id"; // sql selection
    $sqlImg = "SELECT * FROM Tests WHERE test_id = $test_id";
    $imgSrc = $db->query($sqlImg);
    $imgSrc = mysqli_fetch_assoc($imgSrc);
    $res = $db->query($sql);    // database query

    echo "<img src='images/" . $imgSrc['image'] . "'>";
    echo "<form action='test.php?q=" . $test_id . "' method='POST'>";
    while($row = mysqli_fetch_assoc($res)) { // while rows exist
        echo $row['question_number'] . ") " . $row['question_text'] . "<br>\n"; //display question number and text
        
        $answer = array();
        
        array_push($answer, dehack($row['answer1']), dehack($row['answer2']), dehack($row['answer3']), dehack($row['answer4']));  //adds answers to array
        shuffle($answer); //shuffles order of array
        
        for($i = 0; $i < count($answer); $i++){ // displays answers as radios
            echo "<input type='radio' name='question" . $row['question_number'] . "' value='" . $answer[$i] ."'>" . $answer[$i] . "<br>\n";
        }
        echo "<hr>\n";
        echo "<br>\n";
    }
    echo '<button class="btn btn-primary" type="submit">Submit Test</button>';
    echo "</form>";
}
?>

<?php include_once('footer.php'); ?>
