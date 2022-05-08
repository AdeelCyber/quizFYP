<?php 
 session_start();
 
 if(!isset($_SESSION['usernamee'])){
 	header("location:login.php");
   ?>
<script>
window.location.href = "login.php"
</script>
<?php
 }
 include_once("configuration.php");
?>
  <head>
    
  
    <script src="assets/js/init-alpine.js"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css"
    />
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"
      defer
    ></script>
    <script src="assets/js/charts-lines.js" defer></script>
    <script src="assets/js/charts-pie.js" defer></script>
    <script src="assets/js/charts-bars.js" defer></script>
  </head>
<div class="container px-6 mx-auto grid">
    <h2
      class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
    >
      Dashboard
    </h2>
    <!-- CTA -->
    <!-- Cards -->
    <div class="grid gap-6 mb-6 md:grid-cols-1 xl:grid-cols-1">
      <!-- Card -->
      <div
        class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
      >
      <div
          class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500"
        >
         
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path
              d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"
            ></path>
          </svg>
        </div>
        <div>
          <p
            onclick="openFullscreen()" class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
          >
            Quiz Taken
          </p>
          <p name="members" id="members" class="text-lg font-semibold text-gray-700 dark:text-gray-200" >
            <?php 
            $query = "SELECT COUNT(id) as count FROM obtained";
            $result = mysqli_query($mysqli, $query);
            $row = mysqli_fetch_assoc($result);
            echo $row['count'];
            ?></p>
        </div>
      </div>
      <!-- Card -->
      </div>
      <div class="grid gap-6 mb-6 md:grid-cols-2 xl:grid-cols-2">
      <!-- Card -->
      <div
        class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
      >
      <div
          class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500"
        >
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path
              d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"
            ></path>
          </svg>
        </div>
        <div>
          <p
            class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
          >
            Total Passed
          </p>
          <p
            class="text-lg font-semibold text-gray-700 dark:text-gray-200"
          >
          <?php 
            $query = "SELECT COUNT(id) as count FROM obtained where obtainedMarks>=50";
            $result = mysqli_query($mysqli, $query);
            $row = mysqli_fetch_assoc($result);
            echo $row['count'];
            ?></p>
          </p>
        </div>
      </div>
      <!-- Card -->
      <div
        class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
      >
      <div
          class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500"
        >
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path
              d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"
            ></path>
          </svg>
        </div>
        <div>
          <p
            class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
          >
            Total Failed
          </p>
          <p
            class="text-lg font-semibold text-gray-700 dark:text-gray-200"
          >
          <?php 
            $query = "SELECT COUNT(id) as count FROM obtained where obtainedMarks<50";
            $result = mysqli_query($mysqli, $query);
            $row = mysqli_fetch_assoc($result);
            echo $row['count'];
            ?>
          </p>
        </div>
      </div>
    </div>

    <!-- New Table -->
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
      <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
          <thead>
            
            <tr
              class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
            >
              <th class="px-4 py-3">Student</th>
              <th class="px-4 py-3">Result</th>
              <th class="px-4 py-3">Quiz Title</th>
              <th class="px-4 py-3">Time Taken</th>
              <th class="px-4 py-3">Date</th>
            </tr>
          </thead>
          <tbody
            class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
          >
          <?php 
          $query2 = "SELECT * FROM `obtained` ORDER BY id DESC LIMIT 3";
          $result2 = mysqli_query($mysqli, $query2);
          while($row2=mysqli_fetch_array($result2)){
          ?>
            <tr class="text-gray-700 dark:text-gray-400">
              <td class="px-4 py-3">
                <div class="flex items-center text-sm">
                  <!-- Avatar with inset shadow -->
                  <div
                    class="relative hidden w-8 h-8 mr-3 rounded-full md:block"
                  >
                    <img
                      class="object-cover w-full h-full rounded-full"
                      src="https://img.icons8.com/color/48/fa314a/user.png"
                      alt=""
                      loading="lazy"
                    />
                    <div
                      class="absolute inset-0 rounded-full shadow-inner"
                      aria-hidden="true"
                    ></div>
                  </div>
                  <div>
                    <p class="font-semibold"><?php 
                    $sID = $row2['student'];
                    $q2 = "SELECT * FROM students where id=$sID";
                    $r2 = mysqli_query($mysqli, $q2);
                    $row3 = mysqli_fetch_assoc($r2);
                    echo $row3['Name'];
                    ?></p>
                    
                  </div>
                </div>
              </td>
              <td class="px-4 py-3 text-sm">
                <?php echo $row2['remarks'].' -- '.$row2['obtainedMarks'] ?>%
              </td>
              <td class="px-4 py-3 text-sm">
                <p class="text-gray-600 dark:text-gray-400 font-semibold">
                  <?php
                  $quiz = $row2['quizID'];
                  $q3 = "SELECT * FROM quiz where id=$quiz";
                  $r3 = mysqli_query($mysqli, $q3);
                  $row4 = mysqli_fetch_assoc($r3);
                  echo $row4['QuizName'];
                  ?>
                </p>
              </td>
              <td class="px-4 py-3 text-sm">
                <p class="text-gray-600 dark:text-gray-400">
                  <?php echo $row2['timeTaken'] ?> mins
                </p>
              </td>
              <td class="px-4 py-3 text-sm">
                <?php echo $row2['date'] ?>
              </td>
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