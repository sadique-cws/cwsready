
<?php include "header.php";
$id = '';
if(isset($_GET['id'])) {
    $id = $_GET['id'];
}
if(isset($_GET['filter']) == 'deactivated') {
    $active_status = 0;
}else{
    $active_status = 1;
}
?>
<div class="container mt-5">
    <div class="card border-0 my-1 shadow-sm bg-light">
        <div class="card-body py-1">
            <?php

            if($active_status ==0){

                ?>
                <a type="button"
                    <?php if($id==null):?>
                        href="studentcourses.php"
                    <?php else:?>
                        href="studentcourses.php?id=<?= $id?>"
                    <?php endif;?>
                   class="btn btn-success btn-sm shadow-sm px-4" ><strong>View active records</strong></a>
            <?php }
            else{
                $pay_status=0; ?>
                <a type="button"
                    <?php if($id==null):?>
                        href="studentcourses.php?filter=deactivated"
                    <?php else:?>
                        href="studentcourses.php?id=<?= $id?>&filter=deactivated"
                    <?php endif;?>
                   class="btn btn-secondary btn-sm shadow-sm" ><strong>View deactivated records</strong></a>
            <?php }?>
        </div>
    </div>
    <table class="table table-stripped shadow-sm">
        <tr class="bg-secondary text-light text-capitalize">
            <th>id</th>
            <th>student</th>
            <th>course</th>
            <th>date of joining</th>
            <th>status</th>
            <th>action</th>
        </tr>
        <?php
        if($id==null):
            $scs=callingRecords("student_course JOIN students ON (student_course.student_id=students.id and student_course.status='$active_status' and student_course.course_request='0') JOIN course
         ON student_course.course_id=course.id", "",'student_course.id, student_course.date_of_join, student_course.status, student_course.course_request, students.name, students.dp, course.title');
        else:
            $scs=callingRecords("student_course JOIN students ON (student_course.student_id=students.id and student_course.status='$active_status' and student_course.student_id='$id' and student_course.course_request='0') JOIN course
         ON student_course.course_id=course.id", "",'student_course.id, student_course.date_of_join, student_course.status, student_course.course_request, students.name, students.dp, course.title');
        endif;
        foreach($scs as $sc):
        ?>
        <tr>
            <td><?= $sc['id']?></td>
            <td>
                <card class="border-rounded-circle border-1">
                    <img class="card-img-top" src="../images/<?= $sc['dp']?>" style="width: 30px; height: 30px;  object-fit: contain" alt="">
                </card>
                <?= $sc['name'];?>
            </td>            <td><?= $sc['title']?></td>
            <td><?= $sc['date_of_join']?></td>
            <td>
                <?php if($sc['status']==0):?><div class="badge bg-secondary">paused</div><?php else:?>
                <div class="badge bg-success">active</div><?php endif;?>

                <?php if($sc['course_request']==1):?>
                    <div class="badge bg-light shadow-sm text-success">requested</div>
                <?php elseif ($sc['course_request']==2):?>
                    <div class="badge bg-danger">rejected</div>
                <?php endif;?>
            </td>
            <td>
                <form action="update.php" method="post" target="_blank">
                    <input type="hidden" name="id" value="<?= $sc['id']?>">
                    <?php if($sc['course_request']==1):?>
                        <?php if($sc['status']==0):?>
                            <button class="btn btn-success btn-sm px-3" name="accept_request"><strong>accept</strong></button>
                            <button class="btn btn-danger btn-sm px-3" name="reject_request"><strong>reject</strong></button>
                        <?php elseif($sc['status']==1):?>
                            <button class="btn btn-secondary btn-sm px-3" name="pause_status"><strong>pause</strong></button>
                        <?php endif;?>

                    <?php elseif ($sc['course_request']==0):?>
                        <?php if($sc['status']==0):?>
                            <button class="btn btn-success btn-sm px-3" name="accept_request"><strong>activate</strong></button>
                        <?php elseif($sc['status']==1):?>
                            <button class="btn btn-secondary btn-sm px-3" name="pause_status"><strong>pause</strong></button>
                        <?php endif;?>
                    <?php elseif ($sc['course_request']==2):?>
                        <button class="btn btn-warning btn-sm" name="undo_rejection"><strong>undo rejection</strong></button>
                    <?php endif;?>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>

<?php include "footer.php";?>
