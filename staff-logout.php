<?php
session_start();
session_destroy();
header("location: staff-home.php");
?>