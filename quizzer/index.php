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

?>


<!DOCTYPE html>
<html lang="en">
<head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">

  <style>
   
.fadeInX {
            animation: fadeInAnimation ease 2s;
            animation-iteration-count: 1;
            animation-fill-mode: forwards;
        }
        @keyframes fadeInAnimation {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
          }

@keyframes slideInLeft {
        0% {
          transform: translateX(-100%);
        }
        100% {
          transform: translateX(0);
        }
      }
      .hheader {
        animation: 1s ease-out 0s 1 slideInLeft;
        background: #666;
        padding: 40px;
      }
  </style>
    <meta charset="UTF-8">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
     <script src="https://kit.fontawesome.com/a81368914c.js"></script>
     <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.2/dist/flowbite.min.css" />
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <title>Quizzer | Home</title>
</head>
<body style="background-image: url('assets/img/sectionBG.jpg');background-size: cover;">
<nav style="background-color: rgba(240, 248, 255, 0.7);"  class="fixed hheader bg-transparent w-full z-40 px-2 sm:px-4 py-2.5 ">
  <div class="container flex flex-wrap justify-between items-center mx-auto">
  <a href="https://flowbite.com" class="flex items-center">
      
      <span style="font-family: 'Montserrat', sans-serif;" class="self-center text-xl font-semibold whitespace-nowrap text-green-500">
      <bold style="font-family: 'Shadows Into Light', cursive;">Quizzer </bold> | Online Quiz Marker</span>
  </a>
  <div class="flex items-center md:order-2">
      <button type="button" class="flex mr-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" type="button" data-dropdown-toggle="dropdown">
        <span class="sr-only">Menu</span>
        <img class="w-8 h-8 rounded-full" src="assets/img/user.jpg" alt="">
      </button>
      <!-- Dropdown menu -->
      <div class="hidden z-50 my-4 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600" id="dropdown">
        <div class="py-3 px-4">
          <span class="block text-sm text-gray-900 dark:text-white"><?php echo $r['Name'] ?></span>
          <span class="block text-sm font-medium text-gray-500 truncate dark:text-gray-400"><?php echo $r['Email'] ?></span>
        </div>
        <ul class="py-1" aria-labelledby="dropdown">
          
          
          <li>
            <a href="logout.php" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</a>
          </li>
        </ul>
      </div>
      <button data-collapse-toggle="mobile-menu-2" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mobile-menu-2" aria-expanded="false">
      <span class="sr-only">Open main menu</span>
      <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
      <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
    </button>
  </div>
  <div class="hidden justify-between items-center w-full md:flex md:w-auto md:order-1" id="mobile-menu-2">
    <ul class="flex flex-col mt-4 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium">
      <li>
        <a href="index.php" class="block py-2 pr-4 pl-3 text-green-500  rounded md:text-white md:bg-transparent md:text-white md:p-0 dark:text-white" aria-current="page">Home</a>
      </li>
      <li>
        <a href="pastquiz.php" class="block py-2 pr-4 pl-3 text-gray-500 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-green-500 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Quiz History</a>
      </li>
      
    </ul>
  </div>
  </div>
</nav>
<section  class="fadeInX text-gray-600 body-font">
  <div class="container px-5 py-24 mx-auto">
    <div class=" bg-white shadow-l rounded-full text-center mb-20">
      <h2 class=" p-6  text-xs text-green-500 tracking-widest font-medium  title-font ">Average Marks</h2>
      <h1 class="p-6  sm:text-3xl text-2xl font-medium title-font text-gray-900"><?php 
      $q4 = "SELECT AVG(obtainedMarks) as average FROM `obtained` WHERE `student` = '$id'";
      $r4 = mysqli_query($mysqli,$q4);
      $r4 = mysqli_fetch_assoc($r4);
      if($r4['average'] == NULL){
        echo "N/A";
      }
      else{
        echo $r4['average']."%";
      }

      ?></h1>
    </div>
    <div class="flex flex-col text-center w-full mb-20">
      
      <h1 class="sm:text-3xl text-2xl font-medium title-font text-green-500">Pending Quizzes</h1>
    </div>
    <div class="flex flex-wrap -m-4">
      <?php
      $grp = $r['grp'];
      $query = "SELECT * FROM quiz WHERE  id NOT IN (SELECT quizID from obtained where student = '$id') AND  grp = $grp AND total IS NOT NULL AND isActive=1 ";
      $result = mysqli_query($mysqli, $query);
      while($row = mysqli_fetch_array($result))
      {
      ?>
      <div class="p-4 md:w-1/2">
        <div class="flex rounded-lg h-full shadow-xl bg-gray-100 p-8 rounded-full flex-col animationX ">
          <div class="flex items-center mb-3" style="cursor:default !important">
            <div class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-full bg-green-500 text-white flex-shrink-0">
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
              </svg>
            </div>
            <h2 class="text-gray-900 text-lg hover:text-black title-font font-medium">Quiz Title : <?php echo $row['QuizName'] ?></h2>
          </div>
          <div class="flex-grow">
            <p style="cursor:default !important" class="leading-relaxed text-base">Total Questions : <?php echo $row['total'] ?></p>
            <p style="cursor:default !important" class="leading-relaxed text-base">Quiz Type : <?php echo $row['type'] ?></p>
            <a style="cursor:pointer" href="quiz.php?qid=<?php echo $row['id'] ?>" class="mt-3 text-green-500 inline-flex items-center">Start Quiz
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                <path d="M5 12h14M12 5l7 7-7 7"></path>
              </svg>
            </a>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
</section>
</body>
<script src="https://unpkg.com/flowbite@1.4.2/dist/flowbite.js"></script>
<script src="assets/js/main.js"></script>
</html>