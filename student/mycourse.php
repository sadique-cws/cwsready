 
 
<?php include('include/header.php'); ?>

<div class="container-fluid">
    <div class="row">
        <?php include('include/sidebar.php'); ?>
        <div class="p-5 content2">
            
            <div class="container mt-3">
                <table class="table shadow-sm table-borderless table-md table-sm table-responsive">
                    <tr class="bg-dark text-white">
                        <th class="py-2">Sr No.</th>
                        <th class="py-2">Logo</th>
                        <th class="py-2">Course Title</th>
                        <th class="py-2">Start Date</th>
                        <th class="py-2">Status</th>
                    </tr>
                    <?php $sr=0;  
                    $s_id = $user['id'];
                    $calling = joinRecord('course','student_course','course.id = student_course.course_id',"student_id = $s_id");
                    if($calling != 0):
                    foreach($calling as $row): ?>
                        <tr class="border-bottom">
                            <td><?= $sr+=1; ?></td>
                            <td><img src="../images/<?= $row['image']; ?>" class="img-fluid bg-dark rounded-circle" style="height:55px; width:55px; object-cover:fit;" alt=""></td>
                            <td><?= $row['title']; ?></td>
                            <td><?php $date = new DateTime($row['date_of_join']); echo $date->format('d/m/Y') ?></td>
                            <td><?php if($row['course_request'] == 0): ?>
                                <a href="#" class="btn btn-info disabled btn-sm">Requested</a>
                                <?php elseif($row['course_request']== 1): ?>
                                <a href="#" class="btn btn-success disabled btn-sm">Pequest Accepted</a>
                                <?php else: ?>
                                <a href="#" class="btn btn-danger disabled btn-sm">Rejected</a>
                                <?php endif; ?>
                                
                            </td>
                        </tr>
                        <?php endforeach; else:?>
                        <tr><td>No Records Found.!</td></tr>
                        <?php endif; ?>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include('include/footer.php'); ?>