 
<?php 
include('include/header.php');
include("include/sendSms.php");

$success = "";
$error_message = "";

 if(!empty($_POST["forget"])) {
    $_SESSION['contact'] =  $_POST["phone"];
	$result = mysqli_query($connect,"SELECT * FROM students WHERE contact='" . $_POST["phone"] . "'");
	$count  = mysqli_num_rows($result);
	if($count>0) {
		// generate OTP
		 $otp = rand(100000,999999);
		// Send OTP
		//$mail_status = send($_POST["phone"],"your Secure OTP is : ". $otp);
		//$_SESSION['otp'] = $otp;
			$result = mysqli_query($connect,"INSERT INTO otp_expiry(otp,is_expired,create_at) VALUES ('" . $otp . "', 0, '" . date("Y-m-d H:i:s"). "')");
			$current_id = mysqli_insert_id($connect);
			if(!empty($current_id)) {
				$success=1;
			}
    } 
    else {
		$error_message = "Phone not exists!";
	}
}
if(!empty($_POST["otp_submit"])) {
    $otp = $_POST['otp'];
    $count = countRecord('otp_expiry',"otp = '$otp' AND is_expired!=1 AND NOW() <= DATE_ADD(create_at, INTERVAL 24 HOUR)");
	if($count != 0) {
		$result = mysqli_query($connect,"UPDATE otp_expiry SET is_expired = 1 WHERE otp = '" . $_POST["otp"] . "'");
        $success = 2;	
        
	} else {
		$success =1;
		$error_message = "Invalid OTP!";
	}	
}
if(!empty($_POST['new_password'])){
    $contact = $_SESSION['contact'];
    $new_pass = sha1($_POST['new_password']);
    $result = mysqli_query($connect,"UPDATE students SET password = '$new_pass' WHERE contact = '$contact'");
    if($result){
        echo "<script>alert('Password Successfully Updated')</script>";
        unset($_SESSION['contact']);
        redirect('login');
    }
}
?>

<div class="container-fluid pt-5" style="background:url('images/bgs.png');background-attachment:fixed; height:90vh;background-repeat:none; background-size:cover; background-position:50% 50%;">
        <div class="row pt-5">
            <div class="col-lg-4 col-md-4 col-sm-5 mx-auto justify-content-center">
                <div class="card border-0 shadow-sm text-white px-3" style="background:rgba(0, 0, 0, 0.318);backdrop-filter: blur(10px);">
                    <div class="card-head bg-dark text-white border rounded-circle text-center mx-auto" style="height:70px; width:70px; margin-top:-30px;"><i class="fa fa-2x mt-3 fa-user text-center"></i></div>
                    <div class="card-body">
                    <?php if($error_message!=""):?>
                        <div class="alert alert-danger"><?= $error_message;?> </div>
                    <?php endif;?>
                        <form action="" method="post">
                        <?php
                         if($success == 1): ?>
                        <div class="mb-3">
                            <label >Enter OTP</label>
                            <input type="text" name="otp"  class="form-control bg-transparent text-white shadow-none rounded-0">
                        </div>
                        <div class="mb-3">
                            <input type="submit" name="otp_submit" value="Validate" class="btn btn-info  w-100">
                        </div>  
                        <?php elseif($success == 2): ?>
                            <div class="mb-3">
                            <label >Enter New Password</label>
                            <input type="password" name="new_password"  class="form-control bg-transparent text-white shadow-none rounded-0">
                        </div>
                        <div class="mb-3">
                            <input type="submit" name="password_change" value="Change" class="btn btn-info  w-100">
                        </div>
                        <?php else: ?>
                        <div class="mb-3">
                            <label >Enter Phone No</label>
                            <input type="text" name="phone"  class="form-control bg-transparent text-white shadow-none rounded-0">
                        </div>
                        <div class="mb-3">
                            <input type="submit" name="forget" value="Send OTP" class="btn btn-info  w-100">
                        </div>  
                        <?php endif;?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include('include/footer.php'); ?>
