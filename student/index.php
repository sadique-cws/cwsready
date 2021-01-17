<?php include('include/header.php'); ?>
<style>
    .cards{
        background-image: url('../images/5.svg'); background-size:cover; background-position:bottom;color:white;
    }
    .icon{
        background-color:#4f5d64;
    }
</style>
    <div class="container-fluid">
        <div class="row">
            <?php include('include/sidebar.php'); ?>
            <div class="p-5 content2" >
                <div class="container">
                    <div class="card border-0 shadow-sm bg-light text-black">
                        <div class="card-body">
                        <h1 class="display-4">Welcome To Code With SadiQ Family</h1>
                        <p class="lead">CWS is an on-demand marketplace for top Web programming engineers, developers, consultants, architects, programmers, and tutors. Get your projects built by vetted web programming freelancers or learn from expert mentors with team training & coaching experiences in <strong>Project based training.</strong></p>
                        </div>
                    </div>
                </div>
                <div class="container mt-4">
                    <div class="row row-cols-lg-3 row-cols-1 row-cols-sm-2 g-2 row-cols-md-3">
                        <div class="col">
                            <div class="card cards p-4 border-0 shadow-sm" style="background-image: url('../images/5.svg'); background-size:cover; background-position:bottom;">
                                <div class="card-body d-flex">
                                    <div class="d h5 mt-3">Course</div>
                                    <div class="icon ms-auto p-3 rounded-circle " style="heihgt:65px; width:65px;"><i class="fa fa-file fa-2x ms-1"></i></div>
                                    <a href="mycourse.php" class="stretched-link"></a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card-border-0 bg-light shadow-sm">
                                <div class="card cards p-4">
                                    <div class="card-body d-flex">
                                        <div class="d h5 mt-3">Payment</div>
                                        <div class="icon ms-auto p-3 rounded-circle" style="heihgt:65px; width:65px;"><i class="fa fa-dollar fa-2x ms-2"></i></div>
                                        <a href="payments.php" class="stretched-link"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card-border-0 bg-light shadow-sm">
                                <div class="card cards p-4">
                                    <div class="card-body d-flex">
                                        <div class="d h5 mt-3">Profile</div>
                                        <div class="icon ms-auto p-3 rounded-circle" style="heihgt:65px; width:65px;"><i class="fa fa-user fa-2x ms-1"></i></div>
                                        <a href="profile.php" class="stretched-link"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<?php include('include/footer.php'); ?>