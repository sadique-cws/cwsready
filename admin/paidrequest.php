
<?php include "header.php"?>
<div class="container mt-5">
    <table class="table table-stripped shadow-sm">
        <tr class="bg-secondary text-light text-capitalize">
            <th>ID</th>
            <th>Student</th>
            <th>course</th>
            <th>fee</th>
            <th>month</th>
            <th>Date of payment</th>
            <th>action</th>
        </tr>

        <?php
            $payments=callingRecords("payments JOIN students ON (payments.student_id=students.id and payments.status='0' and pay_request='1') JOIN student_course
         ON payments.sc_id=student_course.id JOIN course ON student_course.course_id=course.id", "",
                'payments.id, students.name, course.title, payments.amount, payments.due_months, payments.date_of_payment, payments.status');
        foreach($payments as $payment){
            ?>
            <tr>
                <td><?= $payment['id'];?></td>
                <td><?= $payment['name'];?></td>
                <td><?= $payment['title'];?></td>
                <td><?= $payment['amount'];?></td>
                <td><?php $date = new DateTime($payment['due_months']);echo $date->format('m/Y')?></td>

                <td>
                    <?php
                    $get_pay_date = $payment['date_of_payment'];
                    if($get_pay_date):$pay_date=new DateTime($get_pay_date);
                        echo $pay_date->format('d/m/Y'); endif;?>
                </td>
                <td>
                    <div class="btn-group">
                        <form action="paidrequest.php" method="post">
                            <input type="hidden" name="pay_id" value="<?= $payment['id'];?>">
                            <button class="btn btn-success btn-sm px-3" name="accept"><strong>accept</strong></button>
                        </form>
                        <form action="paidrequest.php" method="post">
                            <input type="hidden" name="pay_id" value="<?= $payment['id'];?>">
                            <button class="btn btn-danger btn-sm ms-1 px-3" name="reject"><strong>reject</strong></button>
                        </form>

                    </div>
                </td>
            </tr>
        <?php }?>
    </table>
</div>
<?php include "footer.php";
if(isset($_POST['accept'])){
    $id = $_POST['pay_id'];
    updateRecord('payments', "status='1'", "id='$id'");
    redirect('paidrequest');
}
if(isset($_POST['reject'])){
    $id = $_POST['pay_id'];
    updateRecord('payments', "pay_request='2'", "id='$id'");
    redirect('paidrequest');
}
?>

