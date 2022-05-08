<?php 
session_start();
include_once("configuration.php");
if(isset($_POST['newUser']) && isset($_POST['password']))
{
  $username =  mysqli_real_escape_string($mysqli,$_POST['newUser']);
  $username = strtolower($username);
  $password =  mysqli_real_escape_string($mysqli,$_POST['password']);
  $password = md5($password);
  $email = mysqli_real_escape_string($mysqli,$_POST['email']);
  $grp = mysqli_real_escape_string($mysqli,$_POST['grp']);
  $sql1 = "SELECT * FROM `students` WHERE `email`='$email'";
    $result1 = mysqli_query($mysqli, $sql1);
        if(mysqli_num_rows($result1)==0)
        {
            $sql = "INSERT INTO `students`( `Name`, `Password`,`Email`,`grp`) VALUES ('$username','$password','$email','$grp')";
            $result = mysqli_query($mysqli, $sql);
                if($result)
                {
                    $data = "success";
                }
                else
                {
                    $data = "Error in Adding New User";
                }
                echo $data;
        }
        else
        {
            $data = "notUnique";
            echo $data;
        }
}
if(isset($_POST['username']) && isset($_POST['password']))
{
  $username =  mysqli_real_escape_string($mysqli,$_POST['username']);
  $username = strtolower($username);
  $password =  mysqli_real_escape_string($mysqli,$_POST['password']);
  $password = md5($password);
  $sql = "SELECT * FROM `students` WHERE `Email`='$username' AND `Password`='$password'";
  $result = mysqli_query($mysqli, $sql);
    $r = mysqli_fetch_assoc($result);
    if($r['Email']==$username && $r['Password']==$password)
    {
        $_SESSION['user_id'] = $r['id'];
        $data = "LoggedIn";
    }
    else
    {
        $data = "Username or Password Incorrect";
    }
    echo $data;
}

?>