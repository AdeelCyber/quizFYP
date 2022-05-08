<?php
session_start();

unset($_SESSION['usernamee']);

session_unset();
session_destroy();
header("Location: login.php");
// echo '<script>window.location.href = "login.php"</script>';
?>