 
<?php include('include/header.php'); ?>
<div class="container-fluid pt-5" style="background:url('images/bg.png'); height:90vh;background-repeat:none; background-size:cover; background-position:50% 50%;">
        <div class="row pt-5">
            <div class="col-lg-4 col-md-4 col-sm-5 mx-auto justify-content-center">
                <div class="card border-0 shadow-sm text-white" style="background:rgba(0, 0, 0, 0.718);;">
                    <div class="card-head bg-dark text-white border rounded-circle text-center mx-auto" style="height:70px; width:70px; margin-top:-30px;"><i class="fa fa-2x mt-3 fa-user text-center"></i></div>
                    <div class="card-body">
                        <form action="login.php" method="post">
                        <div class="mb-3">
                            <label >Email or Phone</label>
                            <input type="text" name="phone"  class="form-control shadow-none rounded-0">
                        </div>
                        <div class="mb-3">
                            <label >Password</label>
                            <input type="password" name="password" class="form-control shadow-none rounded-0">
                        </div>
                        <div class="mb-3">
                            <input type="submit"   name="login" value="Login" class="btn btn-info  w-100">
                        </div>  
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include('include/footer.php'); ?>

<?php if(isset($_POST['login'])){
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $query = countRecord('students',"contact = '$phone' or email = '$phone' and password = '$password'");
    if($query > 0){
        $_SESSION['student'] = $phone;
        redirect('student/index');
    }
    else{
        echo "something went wrong";
    }
}
?>