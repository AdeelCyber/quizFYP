
<?php 
 session_start();
 
 if(!isset($_SESSION['usernamee'])){
 	header("location:login.php");
   ?>
   <script>window.location.href = "login.php"</script>
   <?php
 }  include_once("configuration.php");
 ?>
<head>
    <link rel="stylesheet" href="assets/css/switch5.css">
</head>
<div class="container grid px-6 mx-auto">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        <?php 
        $qid=$_GET['qid'];
        $query="SELECT * FROM `quiz` WHERE `id` = '$qid'";
        $result=mysqli_query($mysqli,$query);
        $row=mysqli_fetch_assoc($result);
        echo $row['QuizName'];
        ?>
         | Total Questions <?php echo $row['total'] ?>
        <div id="staffboxDiv" style="float: right;margin-right:10px">
        <button style="position:relative;right:0;margin-top:10px;margin-bottom:1px;margin-right:10px" onclick='$( "#mainBox" ).hide().html(page).show("")'
                    class="flex items-center justify-between px-2 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-full active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                    aria-label="Edit">
                Back
            </button>
        </div>
    </h2>
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                <th class="px-4 py-3">Question</th>
                    <th class="px-4 py-3">Correct Option</th>
                    <th class="px-4 py-3">Option A</th>
                    <th class="px-4 py-3">Option B</th>
                    <th class="px-4 py-3">Option C</th>
                    <th class="px-4 py-3">Option D</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">

                <?php 
                $query2 = "SELECT * FROM questions where quizID = $qid ORDER BY id DESC";
                $result2 = mysqli_query($mysqli, $query2);
            
                while($row2 = mysqli_fetch_array($result2)){
                    
                ?>
                <tr class="text-gray-700 dark:text-gray-400">
                <td class="px-4 py-3">
                        <p class="font-semibold"><?php echo $row2['question']; ?></p>
                    </td>
                    <td class="px-4 py-3">
                        <p class="font-semibold"><?php echo $row2['correct'] ?></p>
                    </td>
                    <td class="px-4 py-3 text-sm">
                        <?php echo $row2['a'];
                         ?>
                    </td>
                    <td class="px-4 py-3 text-sm">
                        <?php
                            echo $row2['b'];
                        ?>
                    </td>
                    <td class="px-4 py-3 text-sm">
                        <?php
                            echo $row2['c'];
                        ?>
                    </td>
                    <td class="px-4 py-3 text-sm">
                        <?php
                            echo $row2['d'];
                        ?>
                    </td>
                </tr>
                <?php } ?>

                </tbody>
            </table>
        </div>
        <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                <span class="flex items-center col-span-3">
                  
                </span>
            <span class="col-span-2"></span>
            <!-- Pagination -->
        </div>
    </div>
</div>
<script  ></script>