<?php 
session_start();
include_once("configuration.php");
if(isset($_POST['newUser']) && isset($_POST['password']))
{
    $master = mysqli_real_escape_string($mysqli,$_POST['master']);
    if($master == "master")
    {
        $username =  mysqli_real_escape_string($mysqli,$_POST['newUser']);
        $password =  mysqli_real_escape_string($mysqli,$_POST['password']);
        $password = md5($password);
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($mysqli, $sql);
        $row = mysqli_fetch_assoc($result);
        if($row['username'] == $username)
        {
            echo "Username already exists";
        }
        else
        {
        $sql = "INSERT INTO `users`( `username`, `password`) VALUES ('$username','$password')";
        $result = mysqli_query($mysqli, $sql);
            if($result)
            {
                $data = "New User Added";
            }
            else
            {
                $data = "Error in Adding New User";
            }
            echo $data;
        }
    }
    else
    {
        echo "Invalid Master Password";
    }
}
if(isset($_POST['username']) && isset($_POST['password']))
{
  $username =  mysqli_real_escape_string($mysqli,$_POST['username']);
  $password =  mysqli_real_escape_string($mysqli,$_POST['password']);
  $password = md5($password);
  $sql = "SELECT * FROM `users` WHERE `username`='$username' AND `password`='$password'";
  $result = mysqli_query($mysqli, $sql);
    $r = mysqli_fetch_assoc($result);
    if($r['username']==$username && $r['password']==$password)
    {
        $data = "LoggedIn";
        $_SESSION['usernamee'] = $username;
    }
    else
    {
        $data = "Username or Password Incorrect";
    }
    echo $data;
}

?>