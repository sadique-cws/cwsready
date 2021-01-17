 
<?php include('include/header.php'); 

if(isset($_GET['course_id'])){
    $id= $_GET['course_id'];
    if(isset($_SESSION['student'])){
        $s_id = $student['id'];
    }
    $record = callingRecord('course',"id = '$id'");
    $course_count = countRecord('student_course',"student_id = '$s_id' and course_id = '$id'");
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

    ul {
        padding: 0px;
    }

    li {
        display: flex;
        flex-direction: row;
        align-items: center;
        margin-bottom: 5px;
    }

    li p {
        margin-left: 30px;
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
            border-radius: 40px;
        }

        
        .profile_desc_section {
            margin-left: 0px;
            margin-bottom: 10px;
            margin-top: 40px;
        }

       
    }

</style>
<div class="container-fluid mt-5 pt-5">
    <div class="container card border-0 shadow mb-5 pb-5" style="border-radius:40px;">
        <section class="profile_container">
            <div class="profile_img_section">
                <img class="profile_img-LG" src="images/<?= $record['image']; ?>" />
            </div>

            <div class="profile_desc_section">
                <h2><?= $record['title']; ?></h2>
                <h3 class="h5 text-dark"></h3>
                <h6 class="text-success">Rs. 700 /- month</h6>
                <p class="description mt-3"><?= $record['description']; ?><p>
                
                <h3 class="mt-2">Select</h3>
                <?php if(!isset($_SESSION['student'])){ ?>
                    <a href="login.php" class="btn btn-info">Add Course</a>
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
</div>
<?php include('include/footer.php'); 

if(isset($_POST['add_course'])){
    $user_id = $studen['id'];

    $data = [
        'student_id' => $student['id'],
        'course_id' => $_POST['course_id'],
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
