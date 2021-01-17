 
 
 
<?php include('include/header.php'); ?>

<div class="container-fluid">
    <div class="row">
        <?php include('include/sidebar.php'); ?>
        <div class="p-5 content2">
            
        <div class="container mt-5">
        <table class="table table-stripped table-responsive shadow-sm table-sm">
            <tr class="bg-secondary text-light text-capitalize">
                <th>Sr No</th>
                <th>course</th>
                <th>fee</th>
                <th>Due month</th>
                <th>Date of payment</th>
                <th>Status</th>
                <th></th>
            </tr>

            <?php
            $sr = 0;
            $id = $user['id'];
                $payments=callingRecords("payments JOIN students ON (payments.student_id=students.id and payments.student_id = '$id') JOIN student_course
            ON payments.sc_id=student_course.id JOIN course ON student_course.course_id=course.id", "",
                    'payments.id, students.name, course.title, payments.amount, payments.due_months, payments.date_of_payment, payments.status, payments.pay_request');
            if($payments != 0):
                    foreach($payments as $payment){
                ?>
                <tr>
                    <td><?= $sr +=1;?></td>
                    <td><?= $payment['title'];?></td>
                    <td><?= $payment['amount'];?></td>
                    <td><?php $date = new DateTime($payment['due_months']);echo $date->format('M-Y')?></td>

                    <td>
                        <?php
                        $get_pay_date = $payment['date_of_payment'];
                        if($get_pay_date):$pay_date=new DateTime($get_pay_date);
                            echo $pay_date->format('d/m/Y'); endif;?>
                    </td>
                    <td>
                    
                        <?php if($payment['status'] == 0 and $payment['pay_request'] == 0): ?>
                            
                            <a href="" class="btn btn-danger disabled btn-sm">Dues</a>
                            <?php elseif($payment['pay_request'] ==1 and $payment['status'] == 0): ?>
                            <a href="" class="btn btn-warning disabled btn-sm">Requested</a>
                            <?php elseif($payment['status'] == 1 and $payment['pay_request'] == 1):?> 
                                <a href="" class="btn btn-success disabled btn-sm">Paid</a>
                            <?php endif; ?>
                    </td>
                    <td>
                        <?php if($payment['pay_request'] == 0 and$payment['status'] == 0 or $payment['pay_request'] == 2 and$payment['status'] == 0 ): ?>
                            <form action="payments.php" method="post">
                                <input type="hidden" name="pay_id" value="<?= $payment['id'];?>">
                                <button class="btn btn-success btn-sm px-3" name="request"><strong>Pay Request</strong></button>
                            </form>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php } else:?>
            <tr>
                <td>No Records Found</td>
            </tr>
            <?php endif; ?>
        </table>
        </div>
<?php
if(isset($_POST['request'])){
    $id = $_POST['pay_id'];
    $date=new DateTime();
    $pay_date = $date->format('Y-m-d');
    updateRecord('payments', "pay_request='1', status='0',date_of_payment='$pay_date'", "id='$id'");
    redirect('payments');
}


?>
        </div>
    </div>
</div>
<?php include('include/footer.php'); ?>