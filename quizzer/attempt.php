<?php
session_start();
include_once("configuration.php");
if(isset($_POST['questionID']) && isset($_POST['selected']))
{
    $qid =  mysqli_real_escape_string($mysqli,$_POST['questionID']);
    $selected =  mysqli_real_escape_string($mysqli,$_POST['selected']);
    $sql = "SELECT * FROM `questions` WHERE `id`='$qid'";
    $result = mysqli_query($mysqli, $sql);
    $r = mysqli_fetch_assoc($result);
    if($r['correct']==$selected)
    {
        $data = "correct";
    }
    else
    {
        $data = "Wrong";
    }
}
if(isset($_POST['correctAns']) && isset($_POST['student']))
{
    $score =  mysqli_real_escape_string($mysqli,$_POST['correctAns']);
    $student =  mysqli_real_escape_string($mysqli,$_POST['student']);
    $correct = mysqli_real_escape_string($mysqli,$_POST['correct']);
    $quizID =  mysqli_real_escape_string($mysqli,$_POST['quiz']);
    $time =  mysqli_real_escape_string($mysqli,$_POST['time']);
    $date= mysqli_real_escape_string($mysqli,$_POST['date']);
    $remarks = mysqli_real_escape_string($mysqli,$_POST['remarks']);
    $sql = "INSERT INTO `obtained`( `student`, `obtainedMarks`, `remarks`, `timeTaken`, `date`, `quizID`,`correct`) VALUES ('$student','$score','$remarks','$time','$date','$quizID','$correct')";
    $result = mysqli_query($mysqli, $sql);
    if($result)
    {
        $data = "Submitted";
    }
    else
    {
        $data = "Not Submitted";
    }
}
if(!isset($data))
{
    $data = "No Response";
}
header('Content-type: application/json');
    echo json_encode( $data );
?>
