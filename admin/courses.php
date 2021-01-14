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
                        <a href="" class="btn btn-sm btn-success">activate</a>
                        <a href="" class="btn btn-info btn-sm mx-1">Edit</a>
                        <a href="" class="btn btn-danger btn-sm">delete</a>
                    </div>
                </td>
            </tr>
        <?php }?>
    </table>
</div>
<?php include "footer.php"?>

</body>
</html>

