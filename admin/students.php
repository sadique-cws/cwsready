<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php include "header.php"?>
<div class="container-fluid mt-5">
    <table class="table table-stripped shadow-sm">
        <tr class="bg-secondary text-light text-capitalize">
            <th>id</th>
            <th>name</th>
            <th>father name</th>
            <th>contact</th>
            <th>e-mail</th>
            <th>gender</th>
            <th>dob</th>
            <th>education</th>
            <th>address</th>
            <th>action</th>
        </tr>

        <?php
        $students=callingRecords('students', 'status=2');
        foreach($students as $student){
            ?>
            <tr >
                <td><?= $student['id'];?></td>
                <td><?= $student['name'];?></td>
                <td><?= $student['father_name'];?></td>
                <td><?= $student['contact'];?></td>
                <td><?= $student['email'];?></td>
                <td><?= $student['gender'];?></td>
                <td><?= $student['dob'];?></td>
                <td><?= $student['address'];?></td>
                <td><?= $student['education'];?></td>
                <td>
                    <div class="btn-group">

                        <a href="studentcourses.php" target="_blank" class="btn btn-info btn-sm">view course</a>
                        <a href="studentpayments.php" target="_blank" class="btn btn-warning mx-1 btn-sm">view payment</a>
                        <form action="students.php" method="post">
                            <input type="hidden" name="student_id" value="<?= $student['id']; ?>">
                            <button class="btn btn-danger btn-sm" name="deactivate">deactivate this student</button>
                        </form>
                    </div>
                </td>
            </tr>
        <?php }?>
    </table>
</div>
<?php include "footer.php";

if(isset($_POST['deactivate'])){
    $id = $_POST['student_id'];
    updateRecord('students', "status='3'", "id='$id'");
    redirect('students');
}
?>

</body>
</html>

