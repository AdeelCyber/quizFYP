<?php
    include_once("configuration.php");
    if(isset($_POST['newStudent']))
    {
        $Name = mysqli_real_escape_string($mysqli,$_POST['newStudent']);
        $Email = mysqli_real_escape_string($mysqli,$_POST['student_email']);
        $Password = mysqli_real_escape_string($mysqli,$_POST['pass']);
        $Password = md5($Password);
        $grp = mysqli_real_escape_string($mysqli,$_POST['grp']);
        
        $req = mysqli_query($mysqli, "INSERT INTO `students`( `Name`, `Email`, `Password`, `grp`) VALUES ('$Name','$Email','$Password','$grp')");
        if($req)
        {
            $data = "New Student Added";
        }
        else
        {
            $data = "Error in Adding New Student";
        }

    }
    if(isset($_POST['newQuiz']))
    {
        $quizName = mysqli_real_escape_string($mysqli,$_POST['newQuiz']);
        $type = mysqli_real_escape_string($mysqli,$_POST['type']);
        $grp = mysqli_real_escape_string($mysqli,$_POST['grp']);
        $req = mysqli_query($mysqli, "INSERT INTO `quiz`( `QuizName`, `type`, `grp`,`isActive`) VALUES ('$quizName','$type','$grp','1')");
        if($req)
        {
            $data = mysqli_insert_id($mysqli);
        }
        else
        {
            $data = "Error in Adding New Quiz";
        }
    }
    if(isset($_POST['new_group']))
    {
        $grpName = mysqli_real_escape_string($mysqli,$_POST['new_group']);
        $isActive = mysqli_real_escape_string($mysqli,$_POST['isActive']);

        $req = mysqli_query($mysqli, "INSERT INTO `allowedgroup`( `groupName`,`isActive`) VALUES ('$grpName','$isActive')");
        if($req)
        {
            $data = mysqli_insert_id($mysqli);
        }
        else
        {
            $data = "Error in Adding New Group";
        }
    }
    if(isset($_POST['new_question']))
    {
        $question = mysqli_real_escape_string($mysqli,$_POST['new_question']);
        $option1 = mysqli_real_escape_string($mysqli,$_POST['optA']);
        $option2 = mysqli_real_escape_string($mysqli,$_POST['optB']);
        $option3 = mysqli_real_escape_string($mysqli,$_POST['optC']);
        $option4 = mysqli_real_escape_string($mysqli,$_POST['optD']);
        $answer = mysqli_real_escape_string($mysqli,$_POST['correct']);
        $quiz=mysqli_real_escape_string($mysqli, $_POST['id']);
        if(isset($_FILES["img"]))
        {
        $pic = $_FILES["img"]["name"];
        
        $destination_path = realpath(__DIR__ . DIRECTORY_SEPARATOR . '/..');
        $target_path = $destination_path . '\\questions\\'.basename($pic);
        move_uploaded_file($_FILES['img']['tmp_name'], $target_path);
        }
        else{
            $pic = "NULL";
        }
        $req = mysqli_query($mysqli, "INSERT INTO `questions`( `question`, `a`, `b`, `c`, `d`, `correct`, `pic`, `quizID`) VALUES ('$question','$option1','$option2','$option3','$option4','$answer','$pic','$quiz')");
        if($req)
        {
        
            $data = $quiz;
        }
        else
        {

            $data = "Error in Adding New Question";
        }
    }
    if(isset($_POST['finalQ']))
    {
        $final = mysqli_real_escape_string($mysqli,$_POST['finalQ']);
        $qid = mysqli_real_escape_string($mysqli,$_POST['Qid']);
        $query = mysqli_query($mysqli, "UPDATE `quiz` SET `total`='$final' WHERE `id`='$qid'");
        if($query)
        {
            $data = $final;
        }
        else
        {
            $data = "Error in Updating Total Questions";
        }
    }
    if(isset($_POST['changeStudentGroup']))
    {
        $student = mysqli_real_escape_string($mysqli,$_POST['changeStudentGroup']);
        $grp = mysqli_real_escape_string($mysqli,$_POST['grp']);
        $query = mysqli_query($mysqli, "UPDATE `students` SET `grp`='$grp' WHERE `id`='$student'");
        if($query)
        {
            $data = $grp;
        }
        else
        {
            $data = "Error in Updating Student Group";
        }
    }
    if(isset($_POST['changeQuizStatus']))
    {
        $quiz = mysqli_real_escape_string($mysqli,$_POST['changeQuizStatus']);
        $status = mysqli_real_escape_string($mysqli,$_POST['status']);
        $query = mysqli_query($mysqli, "UPDATE `quiz` SET `isActive`='$status' WHERE `id`='$quiz'");
        if($query)
        {
            $data = $status;
        }
        else
        {
            $data = "Error in Updating Group Status";
        }
    }
    if(isset($_POST['changeGrpStatus']))
    {
        $grp = mysqli_real_escape_string($mysqli,$_POST['changeGrpStatus']);
        $status = mysqli_real_escape_string($mysqli,$_POST['status']);
        $query = mysqli_query($mysqli, "UPDATE `allowedgroup` SET `isActive`='$status' WHERE `id`='$grp'");
        if($query)
        {
            $data = $status;
        }
        else
        {
            $data = "Error in Updating Group Status";
        }
    }
    if(isset($_POST['changeMultipleGroup']))
    {
        $students = $_POST['changeMultipleGroup'];
        $grp = mysqli_real_escape_string($mysqli,$_POST['grp']);

            $query = mysqli_query($mysqli, "UPDATE `students` SET `grp`='$grp' WHERE id IN $students");
        
        if($query)
        {
            $data = $grp;
        }
        else
        {
            $data = "Error in Updating Student Group";
        }
    }
    if(!isset($data))
    {
        $data = "No Response";
    }
    header('Content-type: application/json');
    echo json_encode( $data );
    ?>