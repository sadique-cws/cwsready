 
<?php require_once('include/header.php'); ?>
<!-- <div class="container-fluid p-5 shadow" style="background-color: #485461;
background-image: linear-gradient(315deg, #485461 0%, #28313b 74%);"">
        <div class="container">
            <h1 class="display-4 text-white">Welcome To Code with SadiQ</h1>
            <p class="lead text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus perspiciatis tenetur cupiditate odit iusto doloribus doloremque? Dolorum, dolor! Laudantium nemo, nobis possimus esse assumenda ab labore libero? Fuga, incidunt aspernatur.</p>
        </div>
    </div> -->
    <div class="container mt-4">
        <div class="head mb-3" style="border-bottom: 2px solid  #485461;">
            <div class="d-inline-flex py-2 px-4 text-white bd-highlight" style=" background-color:  #485461;">Our Courses</div>
            <a href="" class="text-muted text-decoration-none float-end">view all</a>
        </div>
        <div class="row row-cols-lg-4 row-cols-1 row-cols-sm-2 g-3 row-cols-md-3 mb-5">
           <?php $courses = callingRecords('course'); foreach($courses as $course): ?>
            <div class="col mb-3">
                <a href="course.php?course_name=<?= $course['title']; ?>&course_id=<?= $course['id']; ?>" class="text-decoration-none text-dark">
                    <div class="card border-0 shadow-sm post-item">
                        <img src="images/<?= $course['image']; ?>" class="card-img-top w-100 img-fluid img-responsive" style="object-fit:cover; height:263px;" alt="">
                        <div class="card-body">
                            <h4><?= $course['title']; ?></h4>
                            <p class="text-success h6">₹ 700 /- month</p>
                            <p class="small"><i class="fa text-dark fa-clock-o"></i> about 2 months</p>
                            <!-- <span class="d-flex">
                                <div class="box"><img src="images/2002.jpeg" alt="" style="height:50px; width:50px;" class="img-fluid rounded-circle"></div>
                                <h6>sadique Hussain</h6>
                            </span> -->
                        </div>
                    </div>
                </a>
            </div>
           <?php endforeach; ?>
        </div>
    </div>
<?php include('include/footer.php'); ?>