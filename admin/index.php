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
            <div class="card bg-danger text-light">
                <div class="card-body p-4">
                    <div class="h3 card-title text-capitalize">total students</div>
                    <p class="lead float-end">153</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card bg-info text-light">
                <div class="card-body p-4">
                    <div class="h3 card-title text-capitalize">total courses</div>
                    <p class="lead float-end">31</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card bg-success text-light">
                <div class="card-body p-4">
                    <div class="h3 card-title text-capitalize">Payments</div>
                    <p class="lead float-end">Total due: 31,740/-</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card bg-warning text-light">
                <div class="card-body p-4">
                    <div class="h3 card-title text-capitalize">New Admission</div>
                    <p class="lead float-end">41</p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"?>

</body>
</html>
