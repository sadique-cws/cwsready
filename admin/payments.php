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
<div class="container mt-5">
    <table class="table table-stripped shadow-sm">
        <tr class="bg-secondary text-light text-capitalize">
            <th>ID</th>
            <th>Student</th>
            <th>course</th>
            <th>fee</th>
            <th>month</th>
            <th>year</th>
            <th>status</th>
            <th>action</th>
        </tr>

        <?php
        $payments=callingRecords('payments JOIN students ON payments.student_id=students.id JOIN student_course
         ON payments.sc_id=student_course.id JOIN course ON student_course.course_id=course.id', '',
    'payments.id, students.name, course.title, payments.amount, payments.due_months, payments.status');
        foreach($payments as $payment){
            ?>
            <tr>
                <td><?= $payment['id'];?></td>
                <td><?= $payment['name'];?></td>
                <td><?= $payment['title'];?></td>
                <td><?= $payment['amount'];?></td>
                <td><?= $payment['due_months'];?></td>
                <td><?= $payment['year'];?></td>
                <td>
                    <?php if($payment['status'] == 1){ ?>
                        <div class="badge rounded-pill px-3 text-dark bg-info">paid</div>
                    <?php }
                    else{ ?>
                        <div class="badge rounded-pill px-3 bg-warning text-dark">pending</div>
                    <?php } ?>
                </td>
                <td>
                    <div class="btn-group">
                        <?php if($payment['status']==1){?>
                            <a href="" class="btn btn-danger btn-sm">undo payment</a>
                        <?php } else{?>
                            <a href="" class="btn btn-success btn-sm px-3">pay</a>
                        <?php }?>
                    </div>
                </td>
            </tr>
        <?php }?>
    </table>
</div>
<?php include "footer.php"?>

</body>
</html>

