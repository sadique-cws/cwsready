 
<?php include('include/header.php'); 

if(isset($_GET['course_id'])){
    $id= $_GET['course_id'];
    if(isset($_SESSION['student'])){
        $s_id = $student['id'];
        $course_count = countRecord('student_course',"student_id = '$s_id' and course_id = '$id'");
    }
    $record = callingRecord('course',"id = '$id'");
    
}
?>
<style>
        h2 {
        font-size: 36px;

        margin-bottom: 15px;
    }

    h3 {
        font-size: 24px;
        font-weight: 500;
        color: rgba(34, 34, 34, 0.5);

        margin-bottom: 25px;
        margin-top: 0px;
    }

    .profile_container,
    .info,
    .back {
        margin: 60px 100px 0px;
        max-width: 900px;
        display: flex;
        overflow-x: hidden;
    }


    .profile_img-LG {
        height: 400px;
        width: 350px;
        border-radius: 20px;

        object-fit: cover;
        object-position: 50% 50%;

        background-position: 40% 50%;
    }


    .description {
        margin-bottom: 30px;
        margin-top: 0px;
    }

    .profile_img_section {
        margin-right: 50px;
    }

    .profile_desc_section {
        display: flex;
        flex-direction: column;

        margin-left: 50px;
    }

    .interests_item {
        display: inline-block;
        padding: 5px 15px;
        margin-right: 7.5px;
        margin-bottom: 10px;
        line-height: 35px;
        background-color: #e6e6e6;
        border-radius: 5px;

        color: rgba(34, 34, 34, 0.5);
    }

    @media screen and (max-width: 1000px) {
        .profile_container,
        .info,
        .back {
            margin: 60px 33px 0px;
        }

        .profile_container {
            flex-direction: column;
        }

        .profile_img_section {
            margin: 0 auto;
        }

        .profile_img-LG {
            width: 300px;
            height: 300px;
            border-radius: 25px;
        }

        
        .profile_desc_section {
            margin-left: 0px;
            margin-bottom: 10px;
            margin-top: 40px;
        }

       
    }

</style>
<div class="container-fluid pt-5 bg-light">
    <div class="container mt-5 card border-0 shadow-sm mb-5 pb-5" style="border-radius:35px;">
        <section class="profile_container">
            <div class="profile_img_section">
                <img class="profile_img-LG" src="images/<?= $record['image']; ?>" />
            </div>

            <div class="profile_desc_section">
                <h2><?= $record['title']; ?></h2>
                <h3 class="h5 text-dark"></h3>
                <h6 class="text-success">₹ 700 /- month</h6>
                <p class="description mt-3"><?= $record['description']; ?><p>
                
                <h3 class="mt-2">Select</h3>
                <?php if(!isset($_SESSION['student'])){ ?>
                    <a href="login.php" class="btn btn-info">Add Course</a>
                    <?php $_SESSION['redirect'] = $_SERVER['REQUEST_URI']; ?>
                <?php } else{ ?>
                    <?php $active_status = $student['status']; if($active_status == '2'): ?>
                <?php if($course_count == 0): ?>
                <form action="course.php?course_name=<?= $_GET['course_name']; ?>&course_id=<?= $_GET['course_id']; ?>" method="post">
                    <input type="text" name="course_id" value="<?php echo $_GET['course_id']; ?>" hidden>
                    <input type="submit" value="Add course" name="add_course" class="btn btn-info btn">
                </form> 
                <?php else: ?>
                    <span class="alert alert-secondary px-4 py-2"><strong>You Are Already Assigned For This Course</strong></span>
                <?php endif; elseif($active_status == '1'): ?>
                    <span class="alert alert-warning px-4 py-2"><strong>Your Account is still to Verify</strong></span>
                    <?php else: ?>
                        <span class="alert alert-danger px-4 py-2 "><strong>You Account is Deactive !</strong></span>
                <?php endif; ?>
                <?php } ?>
            </div>

        </section>
        
    </div>
    <div class="container">
            <div class="head mb-3" style="border-bottom: 2px solid  #485461;">
                <div class="d-inline-flex py-2 px-4 text-white bd-highlight" style=" background-color:  #485461;">Related Courses</div>
                <a href="#" class="text-muted text-decoration-none float-end">view all</a>
            </div>

            <div class="row row-cols-1 row-cols-lg-4 row-cols-md-3 row-cols-sm-2">
                <?php $courses = mysqli_query($connect,"SELECT * FROM course where id!= $id order by RAND() limit 4"); while($course = mysqli_fetch_array($courses)): ?>
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
            <?php endwhile;  ?>
            </div>
        </div>
</div>
<?php include('include/footer.php'); 

if(isset($_POST['add_course'])){
    $data = [
        'student_id' => $student['id'],
        'course_id' => $_POST['course_id'],
        'status'=>0
    ];
    

    if($course_count == 0){
        $query = insertRecords('student_course',$data);
        if($query){
            redirect('student/mycourse');
        }
        else{
            echo "<script>alert('This course is not available for you')</script>";
        }
    }else{
        echo "<script>alert('This course Already selected')</script>";
    }

   
}
?>
