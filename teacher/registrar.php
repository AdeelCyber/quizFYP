<?php
session_start();
if(isset($_SESSION['usernamee'])){
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
    <title>Login - JK Dashboard</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="assets/css/tailwind.output.css" />

    <link rel="icon" href="assets/img/icon.png" type="image/icon type">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
    <script
      src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
      defer
    ></script>
    <script src="/assets/js/init-alpine.js"></script>

  </head>
  <body>
  <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
      <div
        class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800"
      >
        <div class="flex flex-col overflow-y-auto md:flex-row">
          <div class="h-32 md:h-auto md:w-1/2">
            <img
              aria-hidden="true"
              class="object-cover w-full h-full dark:hidden"
              src="assets/img/quizLogo.png"
              alt=""
            />
            <img
              aria-hidden="true"
              class="hidden object-cover w-full h-full dark:block"
              src="assets/img/quizLogo.png"
              alt=""
            />
          </div>
          <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
            <div class="w-full">
            <form id="registerForm">
              <h1 style="text-align:center"
                class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200"
              >

                 Quizzer | Teacher Registration
                <h2 style="text-align:center" class="text-sm text-gray-400">To Register You Must Enter The Master Password Correctly.</h2>
                <label class="block text-sm p-6">
                <span class="text-gray-700 dark:text-gray-400">Master Password</span>

                <input type="password"
                        name="master" id="master" required
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="********"
                />
              </label>
                <hr>
              </h1>

              
                
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Username</span>

                <input
                        name="name" id="name" required
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Admin"
                />
              </label>
              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Password</span>
                <input name="pass" id="pass" required
                  class="form block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="***************"
                  type="password"
                />
              </label>
              <p id="errors" style="color:red;font-size:15px">
              </p>
              <!-- You should use a button here, as the anchor is only used for the example  -->
              <button id="loginBtn"  style="user-select: none;"
                class="form block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-800 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"

              >
               Register
              </button>
              </form>
              <hr class="my-8" />
              <div><a class="dark:text-gray-400" style="float:right;" href="login.php">Already Registered? Log In</a></div>

            </div>

          </div>
        </div>
      </div>
      <script type="text/javascript" src="assets/js/registrar.js"></script>
    </div>
  </body>
</html>
