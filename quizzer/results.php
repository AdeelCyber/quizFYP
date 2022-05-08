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
$qid = $_GET['quiz'];
$sql = "SELECT * FROM `quiz` WHERE `id`='$qid'";
$result = mysqli_query($mysqli, $sql);
$quiz = mysqli_fetch_assoc($result);
$sql = "SELECT * FROM `obtained` WHERE `quizID`='$qid'";
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
    <title>Result - <?php echo $r['Name'] ?></title>
</head>
<body  style="background-image: url('assets/img/sectionBG.jpg');background-size: cover;">
<section  class="fadeInX text-gray-600 body-font">
  <div class="container px-5 py-24 mx-auto">
    <div class=" bg-white shadow-l rounded-b-3xl text-center mb-20 divide-y divide-double">
    <div>
      <h2 class=" p-6  text-lg text-green-500 tracking-widest font-medium  title-font ">Hey <?php echo $r['Name'] ?>!</h2>
      <h1 class="p-6  sm:text-3xl text-2xl font-medium title-font text-gray-900"><?php 
      $q4 = "SELECT * FROM `obtained` WHERE `quizID` = '$qid'";
      $r4 = mysqli_query($mysqli,$q4);
      $r4 = mysqli_fetch_assoc($r4);
      
      if($r4['obtainedMarks'] < 50){
        echo "Alas! You scored ".$r['obtainedMarks']."% and failed the quiz. Better luck next time!";
        ?> &#128533;<?php
      }
      else if($r4['obtainedMarks'] >= 50 && $r4['obtainedMarks'] < 70){
        echo "You have scored ".$r4['obtainedMarks']."% marks. You have passed the quiz. You can do better!";
        ?> 	&#128522; <?php
      }
      else if($r4['obtainedMarks'] >= 70 && $r4['obtainedMarks'] < 90){
        echo "You have scored ".$r4['obtainedMarks']."% marks. You have passed the quiz. Keep it Up!";
        ?> &#128521; <?php
      }
      else if($r4['obtainedMarks'] >= 90 ){
        echo "Excellento! You have scored ".$r4['obtainedMarks']."% marks. You have passed the quiz. Keep it Up!";
        ?> &#128513; <?php
      }
      
      ?></h1>
      <p style="text-align: right" class="px-10 text-black">
               Dated : <?php echo $q['date'] ?></p>
      </div>

      <div class="container px-10 mx-auto grid ">
          <div  id="filterCard"
              class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800 divide-y divide-green-500"
            >
            <div class="first">
            <h2 class="dark:text-gray-100 "> You answered <bold class="font-bold"><?php echo $q['correct'] ?> out of <?php echo $quiz['total'] ?> </bold> questions correctly.</h2>
            <br>
            <h2 class="dark:text-gray-100  pb-4"> It took you <bold class="font-bold"><?php echo $q['timeTaken'] ?> </bold> minutes to attempt this quiz.</h2>
            </div>
            <div class="second">

            <h2 class="pt-8 dark:text-gray-100 font-bold underline decoration-green-500 underline-offset-1"> See How Others did</h2>
                <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-2">
                
                    <label class="block mt-4 text-sm divide-y divide-green-500 ">
                    <span class="text-gray-700 dark:text-gray-400">
                        Average Marks
                    </span>
                    <input class="font-bold w-full rounded-full p-4" style="text-align:center" disabled value="<?php 
                    $q4 = "SELECT AVG(obtainedMarks) as average FROM `obtained` WHERE `quizID` = '$qid'";
                    $r4 = mysqli_query($mysqli,$q4);
                    $obtainedx = mysqli_fetch_assoc($r4);

                    if ($obtainedx['average'] == NULL) {
                        echo "N/A";
                    } else {
                        echo $obtainedx['average'];
                        ?>% <?php
                    }
                    ?>"
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    placeholder="">
                    </label>
                    <label class="block mt-4 text-sm divide-y divide-green-500">
                    <span class="text-gray-700 ">
                        Average Remarks
                    </span>
                    <input class="font-bold w-full rounded-full p-4" style="text-align:center" disabled value="<?php 

                    if ($obtainedx['average'] == NULL) {
                        echo "N/A";
                    } else if($obtainedx['average'] <50) {
                        echo "Fail";
                    }
                    else if($obtainedx['average'] >=50 && $obtainedx['average'] <70) {
                        echo "Pass";
                    }
                    else if($obtainedx['average'] >=70 && $obtainedx['average'] <90) {
                        echo "Good";
                    }
                    else if($obtainedx['average'] >=90) {
                        echo "Excellent";
                    }
                    ?>"
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    placeholder="">
                    </label>
                </div>
                
                
            </div> 
            
            </div>
            <button onclick="window.location.href='index.php'" style="" type="button" class="text-white flex justify-center bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
            Return Home</button>
      </div>
    </div>
</body>
</html>