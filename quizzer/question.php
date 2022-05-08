<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
}
include_once('configuration.php');
$qid = $_GET['qid'];
$questions = "SELECT * FROM `questions` WHERE `quizID`='$qid' ORDER BY id DESC";
$result = mysqli_query($mysqli, $questions);
$num = 1;
$qNo = $_GET['question'];


while($q = mysqli_fetch_array($result))
{
    
    if($num == $qNo)
    {
        $questionID = $q['id']; 
    }

    $num++;
}
$query = "SELECT * FROM `questions` WHERE `id`='$questionID'";
$result = mysqli_query($mysqli, $query);
$r = mysqli_fetch_assoc($result);

if( $r['pic'] != "NULL" || $r['pic'] == ""){
    $pic = $r['pic'];

?>
<div>
              <img src="../questions/<?php echo $pic; ?>" 
               alt=""
               class="object-scale-down"
               >
          </div>  
<?php }
if($r['pic'] == "NULL" || $r['pic'] == "")
{
    $col = "col-span-2";
}
else{
    $col = "col-span-1";
}
?>
<div class="<?php echo $col ?> ">
            <h1 class="p-6  sm:text-2xl text-xl font-medium title-font text-gray-900"> -
            <?php  echo $r['question'] ?>
            </h1>
            <div class="flex ">
            <div class="divide-y divide-dotted divide-green-500">
            <div class="form-check p-4">
                <input class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-green-500 checked:border-green-500 focus:outline-none transition duration-200 mt-1 bg-no-repeat  bg-contain float-left mr-2 cursor-pointer" type="radio" name="answer" id="a" >
                <label class="form-check-label inline-block text-gray-800" for="a">
                    <?php echo $r['a'] ?>
                </label>
                </div>
                <div class="form-check p-4">
                <input class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-green-500 checked:border-green-500 focus:outline-none transition duration-200 mt-1 bg-no-repeat  bg-contain float-left mr-2 cursor-pointer" type="radio" name="answer" id="b" >
                <label class="form-check-label inline-block text-gray-800" for="b">
                    <?php echo $r['b'] ?>
                </label>
                </div>
                <div class="form-check p-4">
                <input class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-green-500 checked:border-green-500 focus:outline-none transition duration-200 mt-1 bg-no-repeat  bg-contain float-left mr-2 cursor-pointer" type="radio" name="answer" id="c" >
                <label class="form-check-label inline-block text-gray-800" for="c">
                    <?php echo $r['c'] ?>
                </label>
                </div>
                <div class="form-check p-4">
                <input class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-green-500 checked:border-green-500 focus:outline-none transition duration-200 mt-1 bg-no-repeat  bg-contain float-left mr-2 cursor-pointer" type="radio" name="answer" id="d" >
                <label class="form-check-label inline-block text-gray-800" for="d">
                    <?php echo $r['d'] ?>
                </label>
                </div>
                
            </div>
            </div>
            <p id="popup" class="text-red-500" style="font-size:15px"></p>
            <bold id="questionID" hidden><?php echo $questionID ?></bold>
            <?php if($num == $qNo+1){ ?>
            <button id="submitQuiz" style="position:absolute;right:0;bottom:10px" type="button" class="text-white flex justify-end bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
            Submit Quiz</button>
            <?php } else{ ?>
                <button id="nextQuestion" style="position:absolute;right:0;bottom:10px" type="button" class="text-white flex justify-end bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
            Next Question </button>
            <?php 
            
         } ?>
            </div>
            <script src="assets/js/questionHandler.js"></script>

            
