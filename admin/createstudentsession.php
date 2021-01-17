<?php include 'header.php';
$id = $_GET['id'];
$student = callingRecord('students', "id='$id'");
echo $username = $student['email'];
$_SESSION['student']=$username;
echo $_SESSION['student'];
redirect('../student/mycourse');