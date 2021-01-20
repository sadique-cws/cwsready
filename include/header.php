<?php include('include/config.php'); ?>

</html> 

    <title>Code with SadiQ</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css">
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>
<style>
    #header {
    transition: all 0.15s linear;
    height:62px;
    <?php 
        $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri_segments = explode('/', $uri_path);
        if($uri_segments[2] != 'login.php'){
            echo "background-color: #048591;";
        }
        if(isset($_SESSION['student'])){
            $id = $_SESSION['student'];
            $student = callingRecord('students',"contact = '$id' or email = '$id'"); 
        }
    ?>
    
}

#header.active {
     box-shadow: 0 0 10px rgba(0,0,0,0.4); 
     background-color: #048591; 
     /* background-image: url('images/bbg.jpg'); */
     /* background-image: linear-gradient(315deg, #485461 0%, #28313b 74%); */
    
}

<?php include("css/style.php"); ?>
</style>
<?php $_SESSION['logout_redirect'] = $_SERVER['REQUEST_URI']; ?>
<body>
<div class="header" style="
    background-image: url('images/1.svg'); background-size:cover; background-position:bottom;">
    <a class="menu-toggle rounded d-lg-none text-white d-block" href="#">
                <i class="fa fa-bars fa-2x"></i>
            </a>
            <nav id="sidebar-wrapper" style="background-image: url('images/5.svg');background-color:black; background-size:cover; background-position:bottom;">
                <?php if(isset($_SESSION['student'])): ?>
                <ul class="sidebar-nav">
                    <li class="sidebar-brand shadow-sm h-100">
                        <a class="js-scroll-trigger text-decoration-none" href="#page-top">
                            <div class="dp bg-danger mx-auto mt-4 rounded-circle" style="width:70px; height:70px;"><img src="images/<?= $student['dp']; ?>" alt="" class="img-fluid rounded-circle"></div>
                            <h5 class="text-center text-white mt-2"><?= $student['name']; ?></h5>
                        </a>
                    </li>
                    <li class="sidebar-nav-item ">
                        <a class="js-scroll-trigger" href="student/index.php">Dashboard</a>
                    </li>
                    <li class="sidebar-nav-item">
                        <a class="js-scroll-trigger" href="student/mycourse.php">Course</a>
                    </li>
                    <li class="sidebar-nav-item">
                        <a class="js-scroll-trigger" href="student/payments.php">Payment</a>
                    </li>
                    <li class="sidebar-nav-item">
                        <a class="js-scroll-trigger" href="student/profile.php">Profile</a>
                    </li>
                    <li class="sidebar-nav-item">
                        <a class="js-scroll-trigger" href="student/logout.php"><i class="fa fa-power-off text-danger"></i> Logout</a>
                    </li>
                </ul>
                <?php else: ?>
                    <ul class="sidebar-nav">
                    <li class="sidebar-brand shadow-sm h-100">
                        <a class="js-scroll-trigger text-decoration-none" href="#page-top">
                            Code With Sadiq
                        </a>
                    </li>
                    <li class="sidebar-nav-item ">
                        <a class="js-scroll-trigger" href="index.php">Home</a>
                    </li>
                    <li class="sidebar-nav-item">
                        <a class="js-scroll-trigger" href="apply.php">Apply For Addmission</a>
                    </li>
                    <li class="sidebar-nav-item">
                        <a class="js-scroll-trigger" href="login.php">Login</a>
                    </li>
                    <li class="sidebar-nav-item">
                        <a class="js-scroll-trigger" href="#">Contact</a>
                    </li>
                    
                </ul>
                <?php endif; ?>
            </nav>
    <nav class="navbar navbar-expand-lg navbar-expand-sm navbar-expand-md navbar-dark fixed-top" id="header"  style="">
        <div class="container">
            <a href="index.php" class="navbar-brand">Code With SadiQ</a>
            <ul class="navbar-nav">
            <?php if(isset($_SESSION['student'])): ?>
                <!-- <div class="d-flex">
                    <div class="bg-dark rounded-circle " style="height:45px; width:45px;"><img src="images/2002.jpeg" alt="" class="img-fluid w-100 rounded-circle border-0"></div>
                    <span class="mt-2 ms-2 text-white"><h6 class="h5 fw-light">name</h6></span>
                </div>     -->
                <li class=" dropdown">
                    <a class="nav-link d-flex dropdown" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="bg-dark rounded-circle " style="height:45px; width:45px;"><img src="images/<?= $student['dp']; ?>" alt="" class="img-fluid w-100 rounded-circle border-0"></div>
                        <span class="mt-2 ms-2 text-white"><h6 class="h5 fw-light"><?= $student['name']; ?></h6></span>
                    </a>

                    <ul class="dropdown-menu rounded-0" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="student/index.php">Dashboard</a></li>
                        <li><a class="dropdown-item" href="student/profile.php">Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="student/logout.php"><i class="fa fa-power-off"></i>  Logout</a></li>
                    </ul>
                </li>
            <?php else: ?>
                <li class="navbar-nav"><a href="login.php" class="nav-link text-white">Login</a></li>
                <li class="navbar-nav"><a href="apply.php" class="nav-link text-white btn-danger " style="border-radius:25px;">Apply Addmission</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
    
    <?php 
        $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri_segments = explode('/', $uri_path);
        if($uri_segments[2] == 'index.php' or $uri_segments[2] == null  ){
        
    ?>
    <div class="container-fluid p-5" style="">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-7 col">
                <h1 class="h1 fw-light text-white">Welcome To Code with SadiQ</h1>
                <p class=" text-white">CWS is an on-demand marketplace for top Web programming engineers, developers, consultants, architects, programmers, and tutors. Get your projects built by vetted web programming freelancers or learn from expert mentors with team training & coaching experiences in <strong>Project based training.</strong></p>
                <div class="quote shadow p-3" style="border-left:3px solid white;">
                    <p class="lead text-white h6"><strong>We Believe:</strong> Knowledge is not skill. Knowledge plus ten thousand times is skill.</p>
                </div>
                </div> 
                <div class="col hero">
                    <img src="images/hero.png" class="img-fluid" alt="" srcset="">
                </div>
            </div>   
        </div>

    </div>
    <?php } ?>
</div>
