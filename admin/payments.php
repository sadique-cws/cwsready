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
<div class="container mt-5">
    <table class="table table-stripped shadow-sm">
        <tr class="bg-secondary text-light text-capitalize">
            <th>S. NO</th>
            <th>Student</th>
            <th>payment_id</th>
            <th>course</th>
            <th>fee</th>
            <th>month</th>
            <th>year</th>
            <th>action</th>
        </tr>

        <?php
        $payments=callingRecords('payments JOIN students ON payments.student_id=students.id');
        foreach($payments as $payment){
            ?>
            <tr>
                <td><?= $payment['id'];?></td>
                <td><?= $payment['name'];?></td>
                <td>
                    <div class="btn-group">
                        <a href="" class="btn btn-success">activate</a>
                        <a href="" class="btn btn-info mx-1">Edit</a>
                        <a href="" class="btn btn-danger">delete</a>
                    </div>
                </td>
            </tr>
        <?php }?>
    </table>
</div>
<?php include "footer.php"?>

</body>
</html>

