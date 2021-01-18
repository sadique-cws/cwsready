<?php
include 'header.php';
if(isset($_POST['undo_rejection'])){
    $id = $_POST['id'];
    updateRecord('student_course', "course_request='1'", "id='$id'");
}

if(isset($_POST['accept_request'])){
    $id = $_POST['id'];
    updateRecord('student_course', "status='1',course_request='0'", "id='$id'");
}
if(isset($_POST['reject_request'])){
    $id = $_POST['id'];
    updateRecord('student_course', "course_request='2'", "id='$id'");
}
if(isset($_POST['pause_status'])){
    $id = $_POST['id'];
    updateRecord('student_course', "status='0'", "id='$id'");
}
if(isset($_POST['pay'])){
    $now = new DateTime();
    $date = $now->format('Y-m-d');
    $id = $_POST['pay_id'];
    updateRecord('payments', "status='1', date_of_payment='$date'", "id='$id'");
}
if(isset($_POST['undo_pay'])){
    $id = $_POST['pay_id'];
    updateRecord('payments', "status='0', date_of_payment=null", "id='$id'");
}
echo "<script>window.close()</script>";