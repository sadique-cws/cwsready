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
        $students=callingRecords('students', 'status=1');
        foreach($students as $student){
            ?>
            <tr >
                <td><?= $student['id'];?></td>
                <td>
                    <card class="border-rounded-circle border-1">
                        <img class="card-img-top" src="../images/<?= $student['dp']?>" style="width: 30px; height: 30px;  object-fit: contain" alt="">
                    </card>
                    <?= $student['name'];?>
                </td>                <td><?= $student['father_name'];?></td>
                <td><?= $student['contact'];?></td>
                <td><?= $student['email'];?></td>
                <td><?= $student['gender'];?></td>
                <td><?= $student['dob'];?></td>
                <td><?= $student['address'];?></td>
                <td><?= $student['education'];?></td>
                <td>
                    <div class="btn-group">
                        <form action="newadmission.php" method="post">
                            <input type="hidden" name="student_id" value="<?= $student['id']; ?>">
                            <button class="btn btn-success btn-sm" name="accept">Accept</button>
                        </form>
                        <form action="newadmission.php" method="post">
                            <input type="hidden" name="student_id" value="<?= $student['id']; ?>">
                            <button class="btn btn-danger btn-sm mx-1" name="delete">delete this student</button>
                        </form>
                        <a href="createstudentsession.php?id=<?= $student['id']?>" target="_blank" class="btn btn-success mx-1 btn-sm"><strong>login</strong></a>
                    </div>
                </td>
            </tr>
        <?php }?>
    </table>
</div>
<?php include "footer.php";
if(isset($_POST['accept'])){
    $id = $_POST['student_id'];
    updateRecord('students', "status='2'", "id='$id'");
    redirect('newadmission');
}?>
<?php include "footer.php";
if(isset($_POST['delete'])){
    $id = $_POST['student_id'];
    deleteRecord('students', "id='$id'");
    redirect('newadmission');
}?>

</body>
</html>

