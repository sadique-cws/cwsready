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
    <div class="card border-0 my-1 shadow-sm bg-light">
        <div class="card-body py-1">
            <?php
            $id = '';
            if(isset($_GET['id'])){
                $id = $_GET['id'];
            }

            if(isset($_GET['filter']) =='paid_records'){
                $pay_status=1;

                ?>
                <a type="button"
                   <?php if($id==null):?>
                        href="payments.php"
                    <?php else:?>
                       href="payments.php?id=<?= $id?>"
                   <?php endif;?>
                   class="btn btn-success btn-sm shadow-sm" ><strong>View unpaid records</strong></a>
            <?php }
            else{
                $pay_status=0; ?>
                <a type="button"
                    <?php if($id==null):?>
                        href="payments.php?filter=paid_records"
                    <?php else:?>
                        href="payments.php?id=<?= $id?>&filter=paid_records"
                    <?php endif;?>
                   class="btn btn-primary btn-sm shadow-sm px-4" ><strong>View paid records</strong></a>
            <?php }?>
            <a href="updatepayments.php" class="btn btn-sm btn-info shadow-sm float-end px-4"><strong>Update Payments</strong></a>
        </div>
    </div>
    <table class="table table-stripped shadow-sm">
        <tr class="bg-secondary text-light text-capitalize">
            <th>ID</th>
            <th>Student</th>
            <th>course</th>
            <th>fee</th>
            <th>Payment Generate date</th>
            <?php if(isset($_GET['filter'])):?>
            <th>Date of payment</th>
            <?php endif;?>
            <th>status</th>
            <th>action</th>
        </tr>

        <?php
        if($id==null):
        $payments=callingRecords("payments JOIN students ON (payments.student_id=students.id and payments.status='$pay_status') JOIN student_course
         ON payments.sc_id=student_course.id JOIN course ON student_course.course_id=course.id", "",
    'payments.id, students.name, course.title, students.dp, payments.amount, payments.due_months, payments.pay_request, payments.date_of_payment, payments.status');
        else:
            $payments=callingRecords("payments JOIN students ON (payments.student_id=students.id and payments.status='$pay_status' and students.id='$id') JOIN student_course
         ON payments.sc_id=student_course.id JOIN course ON student_course.course_id=course.id", "",
                'payments.id, students.name, students.dp, course.title, payments.amount, payments.pay_request, payments.due_months, payments.date_of_payment, payments.status');
        endif;
        foreach($payments as $payment){
            ?>
            <tr>
                <td><?= $payment['id'];?></td>
                <td>
                    <card class="border-rounded-circle border-1">
                        <img class="card-img-top" src="../images/<?= $payment['dp']?>" style="width: 30px; height: 30px;  object-fit: contain" alt="">
                    </card>
                    <?= $payment['name'];?>
                </td>                <td><?= $payment['title'];?></td>
                <td><?= $payment['amount'];?></td>
                <td><?php $date = new DateTime($payment['due_months']);echo $date->format('d/m/Y')?></td>

                <?php if(isset($_GET['filter'])):?>
                    <td>
                        <?php
                        $get_pay_date = $payment['date_of_payment'];
                        if($get_pay_date):$pay_date=new DateTime($get_pay_date);
                            echo $pay_date->format('d/m/Y'); endif;?>
                    </td>
                <?php endif;?>
                <td>
                    <?php if($payment['status'] == 1){ ?>
                        <div class="badge rounded-pill px-3 text-dark bg-info">paid</div>
                    <?php }
                    else{ ?>
                        <div class="badge rounded-pill px-3 bg-warning text-dark">pending</div>
                    <?php } ?>
                    <?php if($payment['pay_request'] == 1){ ?>
                        <div class="badge rounded-pill px-3 bg-success">accepted</div>
                    <?php }
                    elseif($payment['pay_request'] == 2){ ?>
                        <div class="badge rounded-pill px-3 bg-danger">rejected</div>
                    <?php } ?>

                </td>
                <td>
                    <div class="btn-group">
                        <?php if($payment['status']=='1'){?>
                            <form target="_blank" action="update.php" method="post">
                                <input type="hidden" name="pay_id" value="<?= $payment['id'];?>">
                                <button class="btn btn-danger btn-sm px-3" name="undo_pay">undo pay</button>
                            </form>
                        <?php } else{?>
                            <form target="_blank" action="update.php" method="post">
                                <input type="hidden" name="pay_id" value="<?= $payment['id'];?>">
                                <button class="btn btn-success btn-sm px-3" name="pay">pay</button>
                            </form>
                        <?php }?>
                    </div>
                </td>
            </tr>
        <?php }?>
    </table>
</div>
<?php include "footer.php";?>

</body>
</html>

