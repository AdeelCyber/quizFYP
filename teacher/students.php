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
    <link rel="stylesheet" href="{% static 'assets/css/switch5.css' %}">
</head>
<div class="container grid px-6 mx-auto">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        All Students

        <div id="staffboxDiv" style="float: right;margin-right:10px">
            <button onclick='page =$("#mainBox").html();  $( "#mainBox" ).load( "addStudent.php")'
                    class="flex items-center justify-between px-2 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-full active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                    aria-label="Edit">
                &plus; Add Student
            </button>
        </div>
    </h2>
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <div class="p-4 text-sm font-semibold tracking-wide text-left text-black uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                <button
                    onclick="selectAll(this)" 
                    class=" items-center justify-between px-2 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent  active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                    aria-label="Edit">
                Select All
            </button>
            <div style="float:right">
            Change Selected Students' Group to 
            <select id="multipleGroup" class="mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 rounded-full form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" id="group">
            
            <?php
            $sql1 = "select * from allowedgroup where isActive = 1";
            $result1 = mysqli_query($mysqli, $sql1);
            while($row1 = mysqli_fetch_assoc($result1)){
                
                echo "<option value='".$row1['id']."'>".$row1['groupName']."</option>";
            }
            ?>
            </select>
            <button
                    onclick="changeGroup()" 
                    class=" items-center justify-between px-2 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent  active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                    aria-label="Edit">
                Go
            </button>
            </div>
                </div>
                <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">Name</th>
                    <th class="px-4 py-3">Email</th>
                    <th class="px-4 py-3">Average Marks</th>
                    <th class="px-4 py-3">Group</th>
                    <th class="px-4 py-3">Quizzes Taken</th>
                    
                </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                <?php $results = mysqli_query($mysqli, "SELECT * FROM students");
                 while ($row = mysqli_fetch_array($results)) {
                     $Sid = $row['id'];
                     ?>
                
                <tr id="<?php echo $row['id'] ?>" class="text-gray-700 dark:text-gray-400">
                
                    <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                        <div class="form-check">
                    <input class="checker form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" value="" id="flexCheckDefault">
                    
                </div>
                            <div>
                                <p class="font-semibold"><?php echo ($row['Name']); ?></p>

                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-3 text-sm">
                    <?php echo ($row['Email']); ?>
                    </td>
                    <td class="px-4 py-3 text-xs">
                    <?php $student =  $row['id'];
                        $r = "SELECT AVG(obtainedMarks) AS average FROM `obtained` WHERE Student = '$student'";
                        $result1 = mysqli_query($mysqli, $r);
                        $row1 = mysqli_fetch_array($result1);
                        if ($row1['average'] == NULL) {
                            echo "0";
                        } else {
                            echo $row1['average'];
                        }
                    ?>
                    </td>
                    <td class="px-4 py-3 text-sm">
                    <label class="block mt-4 text-sm">
                
            <select id="grp" onchange="change(this,<?php echo $row['id'] ?>)" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                <?php $r = mysqli_query($mysqli, "select * from allowedgroup where isActive = 1");
    while ($row2 = mysqli_fetch_array($r)) { 
                ?>
                <option <?php if ($row2['id'] == $row['grp']) { ?> selected <?php } ?> value="<?php echo $row2['id'] ?>" ><?php echo $row2['groupName'] ?></option>
                <?php } ?>
                
            </select>
        </label>
                    </td>
                    <td style="cursor:pointer" onclick='page =$("#mainBox").html(); $( "#mainBox" ).load("studentQuiz.php?id="+<?php echo $Sid; ?>);'  class="px-4 py-3 text-md">
                    <bold style="float:left"> View Quiz Taken</bold> <svg style="float:left" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="ml-4 bi bi-arrow-right-circle" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
                    </svg> 
                    
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
<script type="text/javascript" src="assets/js/studentMgmt.js"></script>