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
            echo "background-color: #00838f;";
        }
    ?>
    
}

#header.active {
     box-shadow: 0 0 10px rgba(0,0,0,0.4); 
     background-color: #00838f; 
     /* background-image: url('images/bbg.jpg'); */
     /* background-image: linear-gradient(315deg, #485461 0%, #28313b 74%); */
    
}
<?php include("css/style.php"); ?>
</style>
<body>
<div class="header" style="
    background-image: url('images/1.svg'); background-size:cover; background-position:bottom;">
    <a class="menu-toggle rounded text-white d-lg-none d-block" href="#">
                <i class="fa fa-bars fa-2x mt-1"></i>
            </a>
            <nav id="sidebar-wrapper">
                <ul class="sidebar-nav">
                    <li class="sidebar-brand shadow-sm">
                        <a class="js-scroll-trigger text-decoration-none" href="#page-top">Code With SadiQ</a>
                    </li>
                    <li class="sidebar-nav-item">
                        <a class="js-scroll-trigger" href="#">Home</a>
                    </li>
                    <li class="sidebar-nav-item">
                        <a class="js-scroll-trigger" href="#">Login</a>
                    </li>
                    <li class="sidebar-nav-item">
                        <a class="js-scroll-trigger" href="#">Apply For Addmission</a>
                    </li>
                    <li class="sidebar-nav-item">
                        <a class="js-scroll-trigger" href="#">About</a>
                    </li>
                    <li class="sidebar-nav-item">
                        <a class="js-scroll-trigger" href="#"></a>
                    </li>
                </ul>
            </nav>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="header"  style="">
        <div class="container">
            <a href="index.php" class="navbar-brand">Code With SadiQ</a>
            <ul class="navbar-nav">
                <li class="navbar-nav"><a href="" class="nav-link text-white">Home</a></li>
                <li class="navbar-nav"><a href="login.php" class="nav-link text-white">Login</a></li>
                <li class="navbar-nav"><a href="apply.php" class="nav-link text-white btn-danger " style="border-radius:25px;">Apply Addmission</a></li>
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
            <div class="col-lg-8">
            <h1 class="display-4 text-white">Welcome To Code with SadiQ</h1>
            <p class="lead text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus perspiciatis tenetur cupiditate odit iusto doloribus doloremque? Dolorum, dolor! Laudantium nemo, nobis possimus esse assumenda ab labore libero? Fuga, incidunt aspernatur.</p>
        
            </div>     
        </div>
    </div>
    <?php } ?>
</div>
