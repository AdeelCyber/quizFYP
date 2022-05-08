<?php 
 session_start();
 
 if(!isset($_SESSION['usernamee'])){
 	header("location:login.php");
   ?>
   <script>window.location.href = "login.php"</script>
   <?php
 }
 include_once("configuration.php");
?>
<head>


    <link rel="stylesheet" href="assets/css/switch5.css">
    <script type="text/javascript" src="assets/js/products.js"></script>


</head>

<div class="container px-6 mx-auto grid ">
<div id="staffboxDiv" style="">
        <button style="position:relative;float:right;margin-top:10px;margin-bottom:1px;margin-right:10px"
            onclick='$( "#mainBox" ).html(page)'
            class="flex items-center justify-between px-2 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-full active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
            aria-label="Edit">
            Back
        </button>
    </div>
    <div class="px-4 py-3  mb-8 mt-6 bg-white dark:bg-gray-800 rounded-lg shadow-md ">
        <div class="flex items-center justify-between  rounded-lg ">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                NEW QUIZ
            </h2>


        </div>
        

        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Quiz Name</span>
            <input id="quizName" value=""
                   class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                   placeholder="">
        </label>
    
        <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Quiz Type
                </span>
            <select id="quizType" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                
                <option value="Goal Based" >Goal Based</option>
                <option value="Scenario Based">Scenario Based</option>
                
                
            </select>
        </label>
        <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Group
                </span>
            <select id="quizGrp" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                <?php 
                $query = "SELECT * FROM `allowedgroup` where isActive =1";
                $results = mysqli_query($mysqli, $query);
                while($row = mysqli_fetch_assoc($results)){
                    ?>
                                        <option value="<?php echo $row['id'] ?>" ><?php echo $row['groupName'] ?></option>

                    <?php
                }
                ?>
                
                
                
                
            </select>
        </label>


        <button id="newQuizS" style="user-select: none;"
                type="button" onclick="newQuiz()"
                
                class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-800 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            Next
        </button>

    </div>
</div>

<script type="text/javascript" src="assets/js/quizMgmt.js"></script>