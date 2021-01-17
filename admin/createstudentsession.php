<?php include 'header.php';
$id = $_GET['id'];
$student = callingRecord('students', "id='$id'");
$username = $student['email'];
$_SESSION['student']=$username;
redirect('../student/mycourse');