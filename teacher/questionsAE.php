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
    <script type="text/javascript" src="assets/js/quizMgmt.js"></script>


</head>

<div class="container px-6 mx-auto grid ">
    <div id="staffboxDiv" style="" >
        </div>
    <div class="px-4 py-3  mb-8 mt-8 bg-white dark:bg-gray-800 rounded-lg shadow-md ">
        <div class="flex items-center justify-between  rounded-lg ">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                
            </h2>

            <div class="overflow-hidden flex items-center justify-center">

                <!-- Rounded switch -->
                <!-- <label class="switch">
                    {% if product.is_active %}
                    <input id="activeSwi" type="checkbox" checked>
                    {% else %}
                    <input id="activeSwi" type="checkbox">
                    {% endif %}
                    <span class="slider round"></span>
                </label> -->


            </div>

        </div>
        <div class="">
            <h2 class="text-gray-700 dark:text-gray-400 text-lg">
                QUIZ NAME : 
            <?php
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $sql = "SELECT * FROM `quiz` WHERE `id` = '$id'";
                $result = mysqli_query($mysqli, $sql);
                $row = mysqli_fetch_assoc($result);
                echo $row['QuizName'];
            }
            ?> | Question No. <bold id="Qcount"><?php echo $_GET['count']; ?></bold>
            </h2>

            <form method="post" id="queForm" enctype="multipart/form-data" action="changes.php">
            <div>

            <img id="Pimg"
                 style="height:180px; margin:auto; left:0; right:0; "
                 class="object-scale-down shadow-md h-48   w-96 p-4 max-w-0 bg-white rounded-lg shadow-xs dark:bg-gray-800"
                 src="https://www.pngmart.com/files/14/<?php echo $_GET['count']?>-Number-PNG-Photos.png" alt="">
            

                
            <div style="justify-content:center;" class="flex mt-4 items-center ">
            
                <input type="file" id="img" hidden name="img" onchange="onImageChange(this)" accept="image/*">

                <label for="img"
                       class="flex items-center justify-between px-4 py-2 text-gray-700 dark:text-gray-200 text-sm font-medium leading-5 text-white transition-colors duration-150 shadow-xs  border border-transparent rounded-lg active:bg-white  focus:outline-none focus:shadow-outline-purple">
                    <span>Upload image</span>

                </label>
                

                
            </div>
        </div>


        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Question</span>
            <input id="question" name="new_question"
                   class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                   placeholder="">
        </label>
        <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-2">
        <label class="block mt-4  text-sm">
        <span class="text-gray-700 mt-4 dark:text-gray-400">Option A</span>
        <input  id="optA" name="optA"
               class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
               >
    </label>
        <label class="block mt-4  text-sm">
        <span class="text-gray-700 mt-4 dark:text-gray-400">Option B</span>
        <input  id="optB" name="optB"
               class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
               >
    </label>
</div>
<div class="grid gap-6 mb-4 md:grid-cols-2 xl:grid-cols-2">
        <label class="block mt-4  text-sm">
        <span class="text-gray-700 mt-4 dark:text-gray-400">Option C</span>
        <input  id="optC" name="optC"
               class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
               >
    </label>
        <label class="block mt-4  text-sm">
        <span class="text-gray-700 mt-4 dark:text-gray-400">Option D</span>
        <input  id="optD" name="optD"
               class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
               >
    </label>
</div>
        <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Correct Option
                </span>
            <select id="correct" name="correct" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                
                <option value="a" >Option A</option>
                <option value="b">Option B</option>
                <option value="c">Option C</option>
                <option value="d">Option D</option>
                
            </select>
        </label>
        <input type="hidden" id="Qid" name="id" value="<?php echo $id; ?>">
        </div>
        </form>
        <div class="grid mb-4 md:grid-cols-2 xl:grid-cols-2">
        <button id="finalQ" style="user-select: none;border-radius: 10px 0 0 10px;border-style: solid;border-right-color: gray;"
                
                
                class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent  active:bg-purple-800 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            Done
        </button>
        <button id="addQ" style="user-select: none;border-radius: 0 10px 10px 0;"
                
                
                class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent  active:bg-purple-800 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            Add Another Question
        </button>
        
</div>
    </div>
</div>


