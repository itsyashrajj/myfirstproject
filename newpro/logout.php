<?php

$conn=mysqli_connect("localhost","root","","students");
session_start();
session_unset();
session_destroy();
header("location://localhost/register/index.php");

?>