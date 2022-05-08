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


    <link rel="stylesheet" href="assets/css/switch5.css">
    <script type="text/javascript" src="assets/js/products.js"></script>


</head>

<div class="container px-6 mx-auto grid ">
    <div id="staffboxDiv" style="">
        <button style="position:relative;right:0;margin-top:10px;margin-bottom:1px;margin-right:10px"
            onclick='$( "#mainBox" ).hide().html(page).show("")'
            class="flex items-center justify-between px-2 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-full active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
            aria-label="Edit">
            Back
        </button>
    </div>
    <div class="px-4 py-3  mb-8 mt-8 bg-white dark:bg-gray-800 rounded-lg shadow-md ">
        <div class="flex items-center justify-between  rounded-lg ">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Add Group
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


        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Name</span>
            <input id="name" value=""
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                placeholder="name">
        </label>
           
        <label class="flex items-center mt-4 dark:text-gray-400">
                  <input id="isActive" type="checkbox" class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                  <span class="ml-2">
                   Is Active
                  </span>
                </label>
        <button id="submit" style="user-select: none;" type="button" 
            class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-800 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            Submit
        </button>

    </div>
</div>
<script type="text/javascript" src="assets/js/addgroup.js"></script>
