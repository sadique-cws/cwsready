 
 
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
                    </tr>
                    <?php $sr=0;  
                    $s_id = $user['id'];
                    $calling = joinRecord('course','student_course','course.id = student_course.course_id',"student_id = $s_id");
                    foreach($calling as $row): ?>
                        <tr>
                            <td><?= $sr+=1; ?></td>
                            <td><?= $row['image']; ?></td>
                            <td><?= $row['title']; ?></td>
                        </tr>
                        <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include('include/footer.php'); ?>