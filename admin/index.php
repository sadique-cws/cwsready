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
    <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">
        <div class="col">
            <a href="students.php" class="nav-link card bg-danger text-light">
                <div class="card-body p-4">
                    <div class="h3 card-title text-capitalize">total students</div>
                    <p class="lead float-end"><?= countRecord('students')?></p>
                </div>
            </a>
        </div>
        <div class="col">
            <a href="courses.php" class="nav-link card bg-info text-light">
                <div class="card-body p-4">
                    <div class="h3 card-title text-capitalize">total courses</div>
                    <p class="lead float-end"><?= countRecord('course')?></p>
                </div>
            </a>
        </div>
        <div class="col">
            <a href="payments.php" class="nav-link card bg-success text-light">
                <div class="card-body p-4">
                    <div class="h3 card-title text-capitalize">Payments</div>
                    <p class="lead float-end">Total due: 31,740/-</p>
                </div>
            </a>
        </div>
        <div class="col">
            <a href="newadmission.php" class="nav-link card bg-warning text-light">
                <div class="card-body p-4">
                    <div class="h3 card-title text-capitalize">New Admission</div>
                    <p class="lead float-end"><?= countRecord('students', 'status=1')?></p>
                </div>
            </a>
        </div>
    </div>
</div>
<?php include "footer.php"?>

</body>
</html>
