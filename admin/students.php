
<?php include "header.php"?>
<div class="container-fluid mt-5">
    <table class="table table-stripped shadow-sm">
        <tr class="bg-secondary text-light text-capitalize">
            <th>id</th>
            <th>student</th>
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
        $students=callingRecords('students', "status='2'");
        if($students != 0):

        foreach($students as $student){
            ?>
            <tr >
                <td><?= $student['id'];?></td>
                <td>
                    <card class="border-rounded-circle border-1">
                        <img class="card-img-top" src="../images/<?= $student['dp']?>" style="width: 30px; height: 30px;  object-fit: contain" alt="">
                    </card>
                    <?= $student['name'];?>
                </td>
                <td><?= $student['father_name'];?></td>
                <td><?= $student['contact'];?></td>
                <td><?= $student['email'];?></td>
                <td><?= $student['gender'];?></td>
                <td><?= $student['dob'];?></td>
                <td><?= $student['address'];?></td>
                <td><?= $student['education'];?></td>
                <td>
                    <div class="btn-group">

                        <a href="studentcourses.php?id=<?= $student['id'];?>" target="_blank" class="btn btn-info btn-sm">view course</a>
                        <a href="payments.php?id=<?= $student['id']?>" target="_blank" class="btn btn-warning mx-1 btn-sm">view payment</a>
                        <form action="students.php" method="post">
                            <input type="hidden" name="student_id" value="<?= $student['id']; ?>">
                            <button class="btn btn-danger btn-sm" name="deactivate">deactivate</button>
                        </form>
                        <a href="createstudentsession.php?id=<?= $student['id']?>" target="_blank" class="btn btn-success mx-1 btn-sm"><strong>login</strong></a>
                    </div>
                </td>
            </tr>
        <?php } else:?>
            <tr>
                <th colspan="10">No records Found</th>
            </tr>
            <?php endif; ?>
    </table>
</div>
<?php include "footer.php";

if(isset($_POST['deactivate'])){
    $id = $_POST['student_id'];
    updateRecord('students', "status='3'", "id='$id'");
    updateRecord('student_course', "status='0'", "student_id='$id'");
    redirect('students');
}
?>



