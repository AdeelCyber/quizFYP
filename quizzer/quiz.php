<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
}
include_once('configuration.php');
$id = $_SESSION['user_id'];
$sql = "SELECT * FROM `students` WHERE `id`='$id'";
$result = mysqli_query($mysqli, $sql);
$r = mysqli_fetch_assoc($result);
$qid = $_GET['qid'];
$sql = "SELECT * FROM `quiz` WHERE `id`='$qid'";
$result = mysqli_query($mysqli, $sql);
$q = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
     <script src="https://kit.fontawesome.com/a81368914c.js"></script>
     <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.2/dist/flowbite.min.css" />
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $q['QuizName'] ?> | Quizzer </title>
</head>
<body  style="background-image: url('assets/img/sectionBG.jpg');background-size: cover;">
<div id="quizBox"  class=" overflow-y-auto justify-center  fixed w-full md:inset-0  md:h-full">
    <div class=" p-4 w-full  h-full md:h-auto">
        
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 divide-y divide-dotted divide-green-500">
           
            <div class="flex justify-between items-center py-10 px-12 divide-x divide-green-500">
                <h3  class="text-xl font-medium text-gray-900 dark:text-white">
                    Quiz Title : <?php echo $q['QuizName'] ?>
                </h3>
                <h1 hidden id="quizID"><?php echo $q['id'] ?></h1>
                <div class="">
                    <h4 class=" p-6  text-xs text-green-500 tracking-widest font-medium  title-font ">
                        Avg Solving Time
                    </h4>
                    <h1 class="p-6  sm:text-3xl text-2xl font-medium title-font text-gray-900"><?php 
                    $query2= " SELECT AVG('timetaken') as average FROM `obtained` WHERE quizID = '$qid'";
                        $result2 = mysqli_query($mysqli, $query2);
                        if (mysqli_num_rows($result2) > 0) {
                        $r2 = mysqli_fetch_assoc($result2);
                            if($r2['average']==NULL){
                                echo "N/A";
                            }
                            else{
                                echo $r2['average'];
                                ?> Mins<?php
                            }
                        }
                        else{
                            echo "N/A";
                        }
                    
                    
                    ?></h1>
                </div>
            </div>
           
            <div class="p-6 space-y-6">
                <p hidden id="studentID"><?php echo $id ?></p>
                <p class="text-base leading-relaxed text-black dark:text-gray-400">
                    Quiz Type : <?php echo $q['type'] ?>
                </p>
                <p class="text-base leading-relaxed text-black dark:text-gray-400">
                    Total Questions : <bold id="totalQ"><?php echo $q['total'] ?></bold>
                </p>
                <p class="text-base leading-relaxed text-black dark:text-gray-400">
                    Passing Criteria : 50% 
                </p>
            </div>
           
            <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                <button id="startQuiz" type="button" class="text-white bg-green-500 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Start Quiz</button>
                <a href='index.php' class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Return Home</a>
            </div>
        </div>
    </div>
</div>
<div id="mainQuestionBox" style="display:none"  class=" overflow-y-auto justify-center  fixed w-full md:inset-0  md:h-full">
    <div class=" p-4 w-full  h-full md:h-auto">
        <div class="p-10 relative bg-white rounded-lg shadow dark:bg-gray-700 divide-y divide-dotted divide-green-500">
                <div class="flex justify-between items-center py-6 px-12 divide-x divide-green-500">
                <h3  class="text-xl font-medium text-gray-900 dark:text-white">
                    Question No. <bold id="currentQ">1</bold>
                </h3>
                
                <div class="">
                    <h4 class=" p-6  text-xs text-green-500 tracking-widest font-medium  title-font ">
                        Elapsed Time
                    </h4>
                    <h1 id="timer" class="p-6  sm:text-3xl text-2xl font-medium title-font text-gray-900">
                    00:00</h1>
                </div>
            </div>
                <p style="text-align: right" class="text-red-700">
                &#10008; Do Not Reload The Page &#10008;</p>
            
            <div id="questionBox" class="grid grid-cols-2 gap-4">
        
        </div>
    </div>
</div>
</body>
<script src="assets/js/main.js"></script>
<script src="assets/js/quizzer.js"></script>
<script src="assets/js/quizHandler.js"></script>

</html>