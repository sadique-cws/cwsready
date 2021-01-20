 
<?php include('include/header.php'); include('include/sendSms.php'); if(isset($_SESSION['student'])){ redirect('student/index'); } ?>


<?php 
    if(isset($_POST['send'])){
        $contact = $_POST['contact'];
        $email = $_POST['email'];
        echo $student_count = countRecord('students',"contact = '$contact' or email = '$email'");

        // $image = $_FILES['dp']['name'];
        // $tmp_name = $_FILES['dp']['tmp_name'];
        // move_uploaded_file($tmp_name,"images/$image");

        $image = uniqid('uploaded_', true) . '_' . strtolower(pathinfo($_FILES['dp']['name'], PATHINFO_EXTENSION));
        move_uploaded_file($_FILES['dp']['tmp_name'], 'images/' . $image);
        

        if($student_count == 0){
        
        $name_error = $father_error = $contact_error = $email_error = $gender_error = $education_error = $dob_error = $dp_error = $address_error = $password_error = "";
        
        $name_flag = $father_flag  = $contact_flag = $email_flag = $gender_flag  = $education_flag  = $dob_flag  = $dp_flag  = $address_flag  = $password_flag  = 0;

        $data = [];
        
        
        if(empty($_POST['name'])){
            $name_error = "Name field is Empty";    
        }
        else{
            $data['name'] = test_input($_POST['name']);   
            $name_flag = 1;
        }
        
        if(empty($_POST['father_name'])){
            $father_error = "Father field is Empty";
        }
        else{
            $data['father_name'] = test_input($_POST['father_name']);  
            $father_flag = 1;
        }
        
        if(empty($_POST['contact'])){
            $contact_error = "Contact fields is Empty";
            
        }
        else{
            $data['contact'] = $_POST['contact'];
            $contact_vali = preg_match("/^[0-9]{10}$/", $data['contact']);
            if($contact_vali){
                $contact_flag = 1;
            }else{
                $contact_error = "Contact Must be 10 digits";
            }
           
        }
        
        if(empty($_POST['email'])){
            $email_error = "Email fields is Empty";
        }
        else{
            $data['email'] = $_POST['email'];
            $email_flag = 1;
        }
        
        if(empty($_POST['gender'])){
            $gender_error = "Gender field is Empty";   
        }
        else{
            $data['gender'] = $_POST['gender'];
            $gender_flag = 1;
        }
        
        if(empty($_POST['education'])){
            $education_error = "education field is Empty";
        }
        else{
            $data['education'] = $_POST['education'];
            $education_flag = 1;
        }
        
        if(empty($_POST['dob'])){
            $dob_error = "date of birth field is empty";
        }
        else{
            $data['dob'] = $_POST['dob'];
            $dob_flag = 1;
        }
        
        if(empty($_POST['address'])){
            $address_error = "address field is empty";
        }
        else{
            $data['address'] = $_POST['address'];
            $address_flag = 1;
        }
        if(empty($_POST['password'])){
            $password_error = "password field is empty";
        }
        else{
            $data['password'] = sha1($_POST['password']);
            $password_flag = 1;
        }
        //image validation
        $data['dp'] = $image;
        $dp_flag = 1;
        if($name_flag==1 && $father_flag==1 && $contact_flag == 1 && $email_flag == 1 && $gender_flag == 1 && $education_flag == 1 && $dob_flag == 1 && $address_flag == 1 && $password_flag == 1 ){
    
            $query = insertRecords('students',$data);
             if($query){
                $_SESSION['student'] = $email;
                $msg = send($_POST["contact"],"Your account is created successfully but still pending for Review");
    
                redirect('student/index');
            }else{
                echo "<script>alert('Something went wrong')</script>";
            }
        }
        }
        else{
            echo "<script>alert('Already Have an Account')</script>";
            redirect('login');
        }
    }
    ?>
    

    <div class="container-fluid bg-light mt-4 pt-5">
        <div class="row mt-3">
            <div class="col-lg-6 mx-auto mb-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-header border-0 bg-white"><h4>Apply Form </h4> <hr></div>
                    <div class="card-body">
                        <form action="apply.php" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="<?= ($name_error!="")? "is-invalid" : ""; ?> form-control rounded-0 shadow-none text-capitalize">
                                <p class="small text-danger"><?= $name_error; ?></p>
                            </div>
                            <div class="mb-3">
                                <label for="f_name">Father's Name</label>
                                <input type="text" name="father_name" id="f_name" class="<?= ($father_error!="")? "is-invalid" : ""; ?> form-control rounded-0 shadow-none text-capitalize">
                                <p class="small text-danger"><?= $father_error; ?></p>
                            </div>
                            <div class="row">
                                <div class="mb-3 col">
                                    <label for="contact">Contact</label>
                                    <input type="text" name="contact" id="contact" class="<?= ($contact_error!="")? "is-invalid" : ""; ?> form-control rounded-0 shadow-none text-capitalize">
                                    <p class="small text-danger"><?= $contact_error; ?></p>
                                </div>
                                <div class="mb-3 col">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="<?= ($email_error!="")? "is-invalid" : ""; ?> form-control rounded-0 shadow-none">
                                    <p class="small text-danger"><?= $email_error; ?></p>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="gender">Gender</label>
                                <select name="gender" id="gender" class="<?= ($gender_error!="")? "is-invalid" : ""; ?>  form-control rounded-0">
                                    <option value="" selected disabled hidden>Select Gender</option>
                                    <option value="m">Male</option>
                                    <option value="f">Female</option>
                                    <option value="0">Others</option>
                                </select>
                                <p class="small text-danger"><?= $gender_error; ?></p>
                            </div>
                            <div class="mb-3">
                                <label for="edu">Education</label>
                                <input type="text" name="education" class="<?= ($education_error!="")? "is-invalid" : ""; ?> form-control shadow-none rounded-0 text-capitalize">
                                <p class="small text-danger"><?= $education_error; ?></p>
                            </div>
                            <div class="mb-3">
                                <label for="dob">DOB</label>
                                <input type="date" name="dob" id="dob" class="<?= ($dob_error!="")? "is-invalid" : ""; ?> form-control rounded-0 shadow-none text-capitalize">
                                <p class="small text-danger"><?= $dob_error; ?></p>
                            </div>
                            <div class="mb-3">
                                <label for="address">Address</label>
                                <textarea name="address" id="address" cols="30" rows="5" class="<?= ($address_error!="")? "is-invalid" : ""; ?> form-control rounded-0 text-capitalize"></textarea>
                                <p class="small text-danger"><?= $address_error; ?></p>
                            </div>
                            <div class="mb-3">
                                <label for="dp">Image</label>
                                <input name="dp" id="dp" type="file"  class="form-control rounded-0 <?= ($dp_error!="")? "is-invalid" : ""; ?> ">
                            </div>
                            <div class="mb-3">
                                <label for="pass">Password</label>
                                <input name="password" id="pass" type="password"  class="form-control <?= ($password_error!="")? "is-invalid" : ""; ?>  rounded-0">
                                <p class="small text-danger"><?= $password_error; ?></p>
                            </div>
                            <div class="mb-3">
                                <input type="submit" name="send" value="Submit" class="btn btn-info w-100 rounded-0">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include('include/footer.php'); ?>