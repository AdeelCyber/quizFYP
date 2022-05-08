<?php

include_once("configuration.php");

if(isset($_GET['students']))
{
    $range = $_GET['students'];
    $range = ($range -1)*10;

    $req = mysqli_query($mysqli, "SELECT * FROM `students` OFFSET $range ROWS FETCH NEXT 10 ROWS ONLY; ");
    if($req)
    {
        $data = mysqli_fetch_all($req,MYSQLI_ASSOC);
    }
    else
    {
        $data = "Error in Fetching Students";
    }
}
if(isset($_GET['quiz']))
{
    $range = $_GET['quiz'];
    $range = ($range -1)*10;
    $req = mysqli_query($mysqli, "SELECT * FROM `quiz` OFFSET $range ROWS FETCH NEXT 10 ROWS ONLY; ");
    if($req)
    {
        $data = mysqli_fetch_all($req,MYSQLI_ASSOC);
    }
    else
    {
        $data = "Error in Fetching Quiz";
    }
}
if(isset($_GET['groups']))
{
    $range = $_GET['groups'];
    $range = ($range -1)*10;
    $req = mysqli_query($mysqli, "SELECT * FROM `groups` OFFSET $range ROWS FETCH NEXT 10 ROWS ONLY; ");
    if($req)
    {
        $data = mysqli_fetch_all($req,MYSQLI_ASSOC);
    }
    else
    {
        $data = "Error in Fetching Groups";
    }
}
if(isset($_GET['obtainedMarks']))
{
    $req = mysqli_query($mysqli, "SELECT * FROM `quiz_questions`");
    if($req)
    {
        $data = mysqli_fetch_all($req,MYSQLI_ASSOC);
    }
    else
    {
        $data = "Error in Fetching Quiz Questions";
    }
}
if(!isset($data))
{
    $data = "No Response";
}
header('Content-type: application/json');
    echo json_encode( $data );

?>