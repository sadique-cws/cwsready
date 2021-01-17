 
<?php include('include/header.php'); ?>
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
	width: 300px;
	border-radius: 40px;

	object-fit: cover;
	object-position: 50% 50%;

	background-position: 40% 50%;
}

.flag_wrapper {
	width: 50px;
	height: 50px;
	background-color: #f2f2f2;
	border-radius: 100%;
	position: relative;
	top: -70px;
	left: 230px;
}

.flag {
	width: 30px;
	height: 30px;
	position: absolute;
	right: 0;
	left: 0;
	top: 0;
	bottom: 0;
	margin: auto auto;
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
		border-radius: 100%;
	}

	.flag_wrapper {
	}

	.profile_desc_section {
		margin-left: 0px;
		margin-bottom: 10px;
		margin-top: -40px;
	}

	.info {
		margin-top: 10px;
		margin-left: 33px;
	}
}

</style>
<div class="container-fluid">
    <div class="row">
        <?php include('include/sidebar.php'); ?>
        <div class="p-5 content2">
            
            <!-- <div class="container mt-5">
                <div class="row ">
                    <div class="col">
                        <div class="card border-0 shadow-sm" style="border-radius:25px 25px;">
                            <div class="dp bg-danger mx-auto shadow-sm rounded-circle" style="height:130px; width:130px; margin-top:-57px;"><img src="../images/<?= $user['dp']; ?>" alt="" class="img-fluid rounded-circle w-100"></div>
                            <div class="card-body mx-auto" style="width:100%;">
                                <table class="table table-hover table-sm table-md table-borderless">
                                    <tr>
                                        <th><h5>Name</h5></th>
                                        <td class="w-25 "><?= $user['name']; ?></td>
                                    </tr>
                                    <tr>
                                        <th><h5>Father Name</h5></th>
                                        <td class="w-25 "><?= $user['father_name']; ?></td>
                                    </tr>
                                    <tr>
                                        <th><h5>Contact</h5></th>
                                        <td class="w-25 w-sm-auto"><?= $user['contact']; ?></td>
                                    </tr>
                                    <tr>
                                        <th><h5>Email</h5></th>
                                        <td class="w-25"><?= $user['email']; ?></td>
                                    </tr>
                                    <tr>
                                        <th><h5>Date Of Birth</h5></th>
                                        <td class="w-25"><?= $user['dob']; ?></td>
                                    </tr>
                                    <tr>
                                        <th><h5>Gender</h5></th>
                                        <td class="w-25"><?= $user['gender']; ?></td>
                                    </tr>
                                    <tr>
                                        <th><h5>Education</h5></th>
                                        <td class="w-25"><?= $user['education']; ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

            <div class="col">
                <section class="profile_container">
                    <div class="profile_img_section">
                        <img class="profile_img-LG" src="../images/<?= $user['dp']; ?>" />
                        <div class="flag_wrapper">
                            <img class="flag" src="https://emojipedia-us.s3.dualstack.us-west-1.amazonaws.com/thumbs/240/apple/271/flag-south-korea_1f1f0-1f1f7.png" alt="South Korean Flag" />
                        </div>
                    </div>

                    <div class="profile_desc_section">
                        <h2><?= $user['name']; ?></h2>
                        <h3 class="h5 text-dark">+91 <?= $user['contact']; ?> </h3>
                        <h3 class="h5 text-dark"><?= $user['email']; ?></h3>
                        <h3 class="h5 mt-n3 text-dark">Father - <?= $user['father_name']; ?></h3>
                        <h6>D.O.B : <?= $user['dob']; ?></h6>
                        <p class="lead"><?= $user['address']; ?></p>
                        <p class="description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto explicabo assumenda ipsa illum asperiores, nemo suscipit numquam iusto nobis nam labore voluptatibus ea autem ab praesentium atque. Excepturi, quibusdam animi!<p>
                        <h3>Selected Course</h3>
                        <div class="interests">
						<?php  
							$s_id = $user['id'];
							$calling = joinRecord('course','student_course','course.id = student_course.course_id',"student_id = $s_id");
							foreach($calling as $row): ?>
                            <span class="interests_item"><?= $row['title']; ?></span>
						<?php endforeach; ?>
                        </div>
                    </div>

                </section>
            </div>

        </div>
    </div>
</div>
<?php include('include/footer.php'); ?>