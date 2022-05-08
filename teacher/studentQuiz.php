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
    <div id="staffboxDiv" style="" >
            <button style="position:relative;float:right;margin-top:10px;margin-bottom:1px;margin-right:10px" onclick='$( "#mainBox" ).html(page)'
                    class="flex items-center justify-between px-2 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-full active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                    aria-label="Edit">
                Back
            </button>
        </div>
    <div class="px-4 py-3  mb-8 mt-8 bg-white dark:bg-gray-800 rounded-lg shadow-md ">
        <div class="flex items-center justify-between  rounded-lg ">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            <?php $id = $_GET['id'];
            $query = "SELECT * from students where id = '$id'";
            $result = mysqli_query($mysqli,$query);
            $row = mysqli_fetch_assoc($result);
            $r = "SELECT AVG(obtainedMarks) AS average FROM `obtained` WHERE Student = '$id'";
                        $result1 = mysqli_query($mysqli, $r);
                        $row1 = mysqli_fetch_array($result1);
                        
            ?>
            </h2>


        </div>
        

        <div  id="filterCard"
              class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
            >
            <h2 class="dark:text-gray-100 font-bold">
            Student Name : <?php echo $row['Name']; ?></h2>
              <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-2">
                <label class="block mt-4 text-sm">
                  <span class="text-gray-700 dark:text-gray-400">
                    Average Marks
                  </span>
                  <input style="text-align:center" disabled value="<?php 
                  if ($row1['average'] == NULL) {
                    echo "N/A";
                } else {
                    echo $row1['average'];
                }
                  ?>"
                   class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                   placeholder="">
                </label>
                <label class="block mt-4 text-sm">
                  <span class="text-gray-700 dark:text-gray-400">
                    Average Remarks
                  </span>
                  <input style="text-align:center" disabled value="<?php 

                      if ($row1['average'] == NULL) {
                          echo "N/A";
                      } else if($row1['average'] <50) {
                          echo "Fail";
                      }
                      else if($row1['average'] >=50 && $row1['average'] <70) {
                          echo "Pass";
                      }
                      else if($row1['average'] >=70 && $row1['average'] <90) {
                          echo "Good";
                      }
                      else if($row1['average'] >=90) {
                          echo "Excellent";
                      }
                      ?>"
                   class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                   placeholder="">
                </label>
              </div>
            </div>

            <div class="w-full overflow-hidden rounded-lg shadow-xs">
      <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
          <thead>
            
            <tr
              class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
            >
              <th class="px-4 py-3">Quiz Title</th>
              <th class="px-4 py-3">Marks</th>
              <th class="px-4 py-3">Percentage</th>
              <th class="px-4 py-3">Remarks</th>
              <th class="px-4 py-3">Time Taken</th>
              <th class="px-4 py-3">Date</th>
              <th class="px-4 py-3">Group</th>
            </tr>
          </thead>
          <tbody
            class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
          >
          <?php 
          $query2 = "SELECT * FROM `obtained` where student = $id  ORDER BY id DESC";
          $result2 = mysqli_query($mysqli, $query2);
          while($row2=mysqli_fetch_array($result2)){
          ?>
            <tr class="text-gray-700 dark:text-gray-400">
              <td class="px-4 py-3">
                <div class="flex items-center text-sm">
                  <!-- Avatar with inset shadow -->
                  
                  <div>
                    <p class="font-semibold"><?php 
                    $q2 = "SELECT * FROM quiz where id=".$row2['quizID'];
                    $r2 = mysqli_query($mysqli, $q2);
                    $row3 = mysqli_fetch_assoc($r2);
                    echo $row3['QuizName'];
                    ?></p>
                    
                  </div>
                </div>
              </td>
              <td class="px-4 py-3 text-sm">
                <?php echo $row2['correct'].'/'.$row3['total'] ?>
              </td>
              <td class="px-4 py-3 text-sm">
                <p class="text-gray-600 dark:text-gray-400">
                  <?php echo $row2['obtainedMarks'] ?>
                </p>
              </td>
              <td class="px-4 py-3 text-sm">
                <p class="text-gray-600 dark:text-gray-400">
                  <?php echo $row2['remarks'] ?>
                </p>
              </td>
              <td class="px-4 py-3 text-sm">
                <p class="text-gray-600 dark:text-gray-400">
                  <?php echo $row2['timeTaken'] ?>
                </p>
              </td>
              <td class="px-4 py-3 text-sm">
                <?php echo $row2['date'] ?>
              </td>
              <td class="px-4 py-3 text-sm">
                <?php $grp = $row3['grp'];
                $q3 = "SELECT * FROM `allowedgroup` where id=$grp";
                $r3 = mysqli_query($mysqli, $q3);
                $row4 = mysqli_fetch_assoc($r3);
                echo $row4['groupName'];
                ?>
            </tr>

            <?php } ?>
          </tbody>
        </table>
      </div>
      <div
        class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800"
      >
        
        
      </div>

    </div>
</div>

<script type="text/javascript" src="assets/js/quizMgmt.js"></script>