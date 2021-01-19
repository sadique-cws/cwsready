 
<?php include('include/header.php'); 
if(isset($_SESSION['student'])){
    redirect('index');
}
if(isset($_POST['login'])){
    $phone = $_POST['phone'];
    $password = sha1($_POST['password']);
    $query = countRecord('students',"contact = '$phone' and password = '$password' or email = '$phone' and password = '$password'");
    if($query > 0){
        $_SESSION['student'] = $phone;
        if(isset($_SESSION['redirect'])){
            $redirect = $_SESSION['redirect'];
            echo "<script>open('$redirect','_self')</script>";
            unset($_SESSION['redirect']);
        }
        redirect('student/index');
    }
    else{
        $error_message = "Phone or Password is incorrect !";
    }
}
?>
<div class="container-fluid pt-5" style="background:url('images/bgs.png');background-attachment:fixed; height:90vh;background-repeat:none; background-size:cover; background-position:50% 50%;">
        <div class="row pt-5">
            <div class="col-lg-4 col-md-4 col-sm-5 mx-auto justify-content-center">
                <div class="card border-0 shadow-sm text-white px-3" style="background:rgba(0, 0, 0, 0.318);backdrop-filter: blur(10px);">
                    <div class="card-head bg-dark text-white border rounded-circle text-center mx-auto" style="height:70px; width:70px; margin-top:-30px;"><i class="fa fa-2x mt-3 fa-user text-center"></i></div>
                    <div class="card-body">
                    <?php if(isset($error_message)): ?>
                        <div class="alert alert-danger" role="alert"><?= $error_message;  ?></div>
                    <?php endif; ?>
                        <form action="login.php" method="post">
                        <div class="mb-3">
                            <label >Email or Phone</label>
                            <input type="text" name="phone"  class="form-control bg-transparent text-white shadow-none rounded-0">
                        </div>
                        <div class="mb-3">
                            <label >Password</label>
                            <input type="password" name="password" class="form-control bg-transparent text-white shadow-none rounded-0">
                            
                        </div>
                        <span><a href="forget_password.php" class="text-decoration-none text-white mb-3 float-end">forgot password..?</a></span>
                        <div class="mb-3">
                            <input type="submit"   name="login" value="Login" class="btn btn-info  w-100">
                        </div>  
                        <a href="apply.php" class="text-info float-end text-decoration-none">I'm New</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include('include/footer.php'); ?>

