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
<?php include "../include/config.php"?>
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
        $students=callingRecords('students', 'status=1');
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

                        <a href="studentpayments.php" target="_blank" class="btn btn-success btn-sm">Accept</a>
                        <a href="" class="btn btn-danger btn-sm mx-1">delete this student</a>
                    </div>
                </td>
            </tr>
        <?php }?>
    </table>
</div>
<?php include "footer.php"?>

</body>
</html>

