
<?php include "header.php"?>
<div class="container mt-5">
    <div class="card border-0 my-1 shadow-sm bg-light">
        <div class="card-body py-1">
            <a type="button" data-bs-toggle="modal" data-bs-target="#courseFormModal" class="nav-link border-0"><strong>+ add new course</strong></a>
        </div>
    </div>
    <table class="table table-stripped shadow-sm">
        <tr class="bg-secondary text-light text-capitalize">
            <th>S. NO</th>
            <th>course title</th>
            <th>description</th>
            <th>action</th>
        </tr>
        <?php
        $courses=callingRecords('course');
        foreach($courses as $course){
            ?>
            <tr>
                <td><?= $course['id'];?></td>
                <td><?= $course['title'];?></td>
                <td><?= $course['description'];?></td>
                <td>
                    <div class="btn-group">
                        <a href="" class="btn btn-info btn-sm mx-1">Edit</a>
                        <a href="" class="btn btn-danger btn-sm">delete</a>
                    </div>
                </td>
            </tr>
        <?php }?>
    </table>
</div>
<?php include "footer.php"?>

<div class="modal fade" id="courseFormModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <div class="modal-body m-5">
                <button type="button" class="btn-close float-end small" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="lead text-center">Course details</div>
                <form action="courses.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="" class="col-form-label">Course Title</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="col-form-label">Image</label>
                        <input type="file" name="image" class="form-control-file">
                    </div>
                    <div class="mb-3">
                        <label for="" class="col-form-label">Description</label>
                        <textarea name="description" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <button name="send" class="btn btn-info float-end px-4 text-dark"><strong>Save</strong></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
if(isset($_POST['send'])){

    $image = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    move_uploaded_file($tmp_name,"../images/$image");

    $data = [
        'title' => $_POST['title'],
        'image' => $image,
        'description' => $_POST['description'],
    ];

    $query = insertRecords('course',$data);
    if($query){
        redirect('courses');
    }else{
        echo "something went wrong";
    }
}
?>

</body>
</html>

