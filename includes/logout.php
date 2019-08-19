<?php
session_start();
unset($_SESSION["id"]);
session_destroy();
header("Location://localhost/Gas-Agency/Admin/login.php");
?>