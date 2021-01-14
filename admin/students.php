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
            <th>contact</th>
            <th>e-mail</th>
            <th>gender</th>
            <th>dob</th>
            <th>education</th>
            <th>address</th>
            <th>action</th>
        </tr>
        <tr >
            <td>1</td>
            <td>name</td>
            <td>98765</td>
            <td>e-mail</td>
            <td>gender</td>
            <td>12/03/1998</td>
            <td>education</td>
            <td>gandhi nagar, purnea</td>
            <td>
                <div class="btn-group">
                    <a href="" class="btn btn-success">active/deactivate</a>
                    <a href="studentcourses.php" target="_blank" class="btn btn-info">view course</a>
                    <a href="studentpayments.php" target="_blank" class="btn btn-warning">view payment</a>
                </div>
            </td>
        </tr>
    </table>
</div>
<?php include "footer.php"?>

</body>
</html>

