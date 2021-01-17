 
 
 
<?php include('include/header.php'); 

if(isset($_POST['update'])){
    $current_pass = sha1($_POST['current_password']);
    $new_password = sha1($_POST['new_password']);
    $s_id = $user['id'];
    $check = countRecord('students',"password = '$current_pass'");

    if($check != 0){
        $result = mysqli_query($connect,"UPDATE students SET password = '$new_password' WHERE id = '$s_id'");
        if($result){
            echo "<script>alert('Password Successfully Updated')</script>";
        }else{
            echo "<script>alert('Something Went Wrong')</script>";
        }
    }else{
        echo "<script>alert('Kuch Toh Garbar h.!')</script>";
    }
}

?>

<div class="container-fluid">
    <div class="row">
        <?php include('include/sidebar.php'); ?>
        <div class="p-5 content2">
            <div class="container mt-5">
                <div class="card border-light">
                    <div class="card-header border-light rounded-0"><h5 class="text-muted">Change Password</h5></div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="mb-3">
                                <label >Current Password</label>
                                <input type="password" name="current_password" class="form-control rounded-0 shadow-none">
                            </div>
                            <div class="mb-3">
                                <label >New Password</label>
                                <input type="password" name="new_password" class="form-control rounded-0 shadow-none">
                            </div>
                            <div class="mb-3">
                                <input type="submit" name="update" class="btn btn-info w-100 rounded-0 shadow-none">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('include/footer.php'); ?>