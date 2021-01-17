 
<?php include('include/header.php'); ?>
    <div class="container-fluid bg-light mt-4 pt-5">
        <div class="row mt-3">
            <div class="col-lg-6 mx-auto mb-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-header border-0 bg-white"><h4>Apply Form </h4> <hr></div>
                    <div class="card-body">
                        <form action="apply.php" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control rounded-0 shadow-none">
                            </div>
                            <div class="mb-3">
                                <label for="f_name">Father's Name</label>
                                <input type="text" name="father_name" id="f_name" class="form-control rounded-0 shadow-none">
                            </div>
                            <div class="row">
                                <div class="mb-3 col">
                                    <label for="contact">Contact</label>
                                    <input type="text" name="contact" id="contact" class="form-control rounded-0 shadow-none">
                                </div>
                                <div class="mb-3 col">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control rounded-0 shadow-none">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="gender">Gender</label>
                                <select name="gender" id="gender" class="form-control rounded-0">
                                    <option value="" selected disabled hidden>Select Gender</option>
                                    <option value="m">Male</option>
                                    <option value="f">Female</option>
                                    <option value="0">Others</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="edu">Education</label>
                                <input type="text" name="education" class="form-control shadow-none rounded-0">
                            </div>
                            <div class="mb-3">
                                <label for="dob">DOB</label>
                                <input type="date" name="dob" id="dob" class="form-control rounded-0 shadow-none">
                            </div>
                            <div class="mb-3">
                                <label for="address">Address</label>
                                <textarea name="address" id="address" cols="30" rows="5" class="form-control rounded-0"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="dp">Image</label>
                                <input name="dp" id="dp" type="file"  class="form-control rounded-0">
                            </div>
                            <div class="mb-3">
                                <label for="pass">Password</label>
                                <input name="password" id="pass" type="password"  class="form-control rounded-0">
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
<?php 
    if(isset($_POST['send'])){
                
        $image = $_FILES['dp']['name'];
        $tmp_name = $_FILES['dp']['tmp_name'];
        move_uploaded_file($tmp_name,"images/$image");

        $data = [
            'name' => $_POST['name'],
            'father_name' => $_POST['father_name'],
            'contact' => $_POST['contact'],
            'email' => $_POST['email'],
            'gender' => $_POST['gender'],
            'education' => $_POST['education'],
            'dob' => $_POST['dob'],
            'dp' => $image,
            'address' => $_POST['address'],
            'password' => sha1($_POST['password']),
        ];

        $query = insertRecords('students',$data);
        if($query){
            redirect(index);
        }else{
            echo "something went wrong";
        }
    }
    ?>