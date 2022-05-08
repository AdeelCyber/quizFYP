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
</head>
<div class="container grid px-6 mx-auto">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        All Groups

        <div id="staffboxDiv" style="float: right;margin-right:10px">
            <button onclick='page =$("#mainBox").html();  $( "#mainBox" ).hide().load( "createGroup.php").show("")'
                    class="flex items-center justify-between px-2 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-full active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                    aria-label="Edit">
                &plus; Add Group
            </button>
        </div>
    </h2>
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">Group Name</th>
                    <th class="px-4 py-3">Total Students</th>
                    <th class="px-4 py-3">Status</th>
                    
                    
                </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                <?php $query ="SELECT * FROM allowedgroup";
                $result = mysqli_query($mysqli,$query); 
                 while ($row = mysqli_fetch_array($result)) { ?>
                
                <tr class="text-gray-700 dark:text-gray-400 p-4">
                    <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                            
                            <div>
                                <p class="font-semibold"><?php echo ($row['groupName']); ?></p>

                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-3 text-sm">
                    <?php $gID  = $row['id'];
                     $query2 = "SELECT COUNT(id) as count from students where grp = $gID";
                        $result2 = mysqli_query($mysqli, $query2);
                        $row2 = mysqli_fetch_array($result2);
                        echo $row2['count']; 
                     ?>
                    </td>
                    <td onclick="changeGrpStatus(<?php echo $row['id'].','.$row['isActive'] ?>)" class="px-4 py-3 text-xs">
                    <?php if($row['isActive']==1)
                    {
                        ?>
                        <span style="cursor: pointer;"
                        class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100"
                        >
                        Active
                        </span>
                    <?php
                    }
                    else
                    {
                        ?> 
                        <span style="cursor: pointer;" id ="blocks"
                  class=" px-2 py-1  font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:text-white dark:bg-orange-600"
                >
                  Inactive
                </span>
                        <?php
                    }
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
<script type="text/javascript" src="assets/js/grpMgmt.js"></script>