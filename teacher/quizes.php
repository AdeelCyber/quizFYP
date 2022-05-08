
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
        All Quizzes

        <div  style="float: right;margin-right:10px">
            <button onclick='page =$("#mainBox").html();  $( "#mainBox" ).hide().load( "newquiz.php").show("")'
                    class="flex items-center justify-between px-2 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-full active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                    aria-label="Edit">
                &plus; Add New Quiz
            </button>
        </div>
    </h2>
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                <th hidden class="px-4 py-3">Q. ID</th>
                    <th class="px-4 py-3">Quiz Name</th>
                    <th class="px-4 py-3">Quiz Type</th>
                    <th class="px-4 py-3">Group Name</th>
                    <th class="px-4 py-3">Total Questions</th>
                    <th colspan='3' style="text-align:center" class="px-4 py-3 col-span-2">Actions</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">

                <?php 
                $query = "SELECT * FROM quiz where total IS NOT NULL ORDER BY id DESC ";
                $result = mysqli_query($mysqli, $query);
            
                while($row = mysqli_fetch_array($result)){
                    
                ?>
                <tr class="text-gray-700 dark:text-gray-400">
                <td hidden class="px-4 py-3">
                        <p class="font-semibold"><?php $Qid = $row['id']; echo $Qid ?></p>
                    </td>
                    <td class="px-4 py-3">
                        <p class="font-semibold"><?php echo $row['QuizName'] ?></p>
                    </td>
                    <td class="px-4 py-3 text-sm">
                        <?php echo $row['type'];
                         ?>
                    </td>
                    <td class="px-4 py-3 text-sm">
                        <?php
                        $gid = $row['grp'];
                        $q3 = "SELECT * FROM allowedgroup WHERE id = '$gid'";
                        $r3 = mysqli_query($mysqli, $q3);
                        $row3 = mysqli_fetch_assoc($r3);
                        echo $row3['groupName'];
                        ?>
                    </td>
                    <td class="px-4 py-3 text-sm">
                        <?php
                        if($row['total'])
                        {
                            echo $row['total'];
                        }
                        else
                        {
                            echo "0";
                        }
                        ?>
                    </td>
                    
                    <td class=" py-3">
                        <div class="flex items-center text-sm">
                            <button type="button" onclick='page = $( "#mainBox" ).html();$( "#mainBox" ).load("questions.php?qid=<?php echo $Qid ?>")' class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                    aria-label="Edit">
                                
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder2-open" viewBox="0 0 16 16">
  <path d="M1 3.5A1.5 1.5 0 0 1 2.5 2h2.764c.958 0 1.76.56 2.311 1.184C7.985 3.648 8.48 4 9 4h4.5A1.5 1.5 0 0 1 15 5.5v.64c.57.265.94.876.856 1.546l-.64 5.124A2.5 2.5 0 0 1 12.733 15H3.266a2.5 2.5 0 0 1-2.481-2.19l-.64-5.124A1.5 1.5 0 0 1 1 6.14V3.5zM2 6h12v-.5a.5.5 0 0 0-.5-.5H9c-.964 0-1.71-.629-2.174-1.154C6.374 3.334 5.82 3 5.264 3H2.5a.5.5 0 0 0-.5.5V6zm-.367 1a.5.5 0 0 0-.496.562l.64 5.124A1.5 1.5 0 0 0 3.266 14h9.468a1.5 1.5 0 0 0 1.489-1.314l.64-5.124A.5.5 0 0 0 14.367 7H1.633z"/>
</svg>
                            </button>
                            
                        </div>
                    </td>
                    
                    <td  class=" py-3 text-xs">
                    <?php if($row['isActive']==1)
                    {
                        ?>
                        <span onclick="changeQuizStatus(<?php echo $row['id'].','.$row['isActive'] ?>)" style="cursor: pointer;"
                        class="px-2 py-1 font-semibold leading-tight text-orange-500 bg-orange-100 rounded-full dark:bg-orange-500 dark:text-orange-100"
                        >
                        Close?
                        </span>
                    <?php
                    }
                    else
                    {
                        ?>
                        <span onclick="changeQuizStatus(<?php echo $row['id'].','.$row['isActive'] ?>)" style="cursor: pointer;"
                        class="px-2 py-1 font-semibold leading-tight text-green-500 bg-green-100 rounded-full dark:bg-green-500 dark:text-green-100"
                        >
                        Open?
                        </span>
                        <?php
                    }
                        ?>
                    </td>
                    <td class="py-3">
                        <div class="flex items-center space-x-4 text-sm">
                        <button onclick='page = $( "#mainBox" ).html();$( "#mainBox" ).load("results.php?qid=<?php echo $Qid ?>")'
                    class="flex items-center justify-between px-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                    aria-label="Edit">
                View Results
            </button>

                        </div>
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
<script type="text/javascript" src="assets/js/quizMgmt.js"></script>