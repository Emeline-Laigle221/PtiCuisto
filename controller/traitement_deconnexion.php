<?php
session_start();
$_SESSION["type"] = 0;
$_SESSION["id"] = 0;
header("Location: ../index.php");
?>