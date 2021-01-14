<?php include '../include/config.php';
check_session($_SESSION['admin'], 'adminlogin');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-light navbar-expand-lg">
        <div class="container">
            <a href="" class="navbar-brand">CWS | Admin panel</a>
        </div>
    </nav>
    <nav class="navbar navbar-expand-lg sticky-top shadow-sm bg-light">
        <div class="container">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="students.php">Students</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="newadmission.php">New admission</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="courses.php">Courses</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="payments.php">Payments</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="deactivestudents.php">Deactivated students</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?= $_SESSION['admin']; ?>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">My Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-danger" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</body>
</html> 
