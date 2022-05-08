<?php
session_start();
if(isset($_SESSION['user_id'])){
  header("Location:index.php");
}
include_once("configuration.php");

?>
<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
    <style>
.loader {
  border: 3px solid #858585;
    border-radius: 50%;
    border-top: 3px solid white;
    width: 22px;
    height: 22px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 1s linear infinite;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - Quizzer</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <script src="https://cdn.tailwindcss.com"></script>


    <link rel="icon" href="assets/img/icon.png" type="image/icon type">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
    <script
      src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
      defer
    ></script>
    <script src="/assets/js/init-alpine.js"></script>

  </head>
  <body>
  <div class="flex items-center min-h-screen p-6 bg-gray-50 ">
      <div
        class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl "
      >
        <div class="flex flex-col overflow-y-auto md:flex-row">
          <div class="h-32 md:h-auto md:w-1/2">
            <img
              aria-hidden="true"
              class="object-cover w-full h-full "
              src="assets/img/quizLogo.jpg"
              alt="Quizzer"
            />
            
          </div>
          <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
            <div class="w-full">
              <h1
                class="mb-4 text-xl font-semibold text-gray-700 "
              >

                Quizzer | Student Panel
                
              </h1>

              <form id="loginForm">
                
              <label class="block text-sm">
                <span class="text-gray-700 ">Username</span>

                <input
                        name="username" id="username"
                  class="block w-full mt-1 text-sm bg-gray-100 p-2 rounded-lg focus:border-purple-400 focus:outline-none focus:shadow-outline-purple "
                  placeholder="Username"
                />
              </label>
              <label class="block mt-4 text-sm">
                <span class="text-gray-700 ">Password</span>
                <input name="password" id="password"
                  class="form block w-full mt-1 text-sm bg-gray-100 p-2 rounded-lg focus:border-purple-400 focus:outline-none focus:shadow-outline-purple  form-input"
                  placeholder="***************"
                  type="password"
                />
              </label>
              <p id="popup" style="font-size:15px">
              </p>
              
              <button id="loginBtn"  style="user-select: none;"
                class="form block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-green-500 border border-transparent rounded-lg active:bg-green-800 hover:bg-green-700 focus:outline-none focus:shadow-outline-purple"

              >
               Log In
              </button>
              </form>
              <hr class="my-8" />
                 <div><a class="hover:text-green-500" style="float:right;" href="registration.php">Not A User? Register</a></div>
            </div>

          </div>
        </div>
      </div>
      <script type="text/javascript" src="assets/js/logginHandler.js"></script>
      <script src="assets/js/main.js"></script>
    </div>
  </body>
</html>
