<?php
@session_start();
unset($_SESSION["email"]);
session_destroy();
setcookie("userName", "", -1);
header("Location: home.php");
?>
