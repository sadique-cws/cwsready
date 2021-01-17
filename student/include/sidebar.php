<div class=" p-0 student-sidebar d-none d-lg-block" style="min-height:90vh;height:auto;width:20%; background-image: url('../images/5.svg'); background-size:cover; background-position:bottom;">
                    <div class="profile">
                        <div class="dp bg-danger mx-auto mt-4 rounded-circle" style="width:70px; height:70px;"><img src="../images/<?= $user['dp']; ?>" alt="" class="img-fluid rounded-circle"></div>
                        <h5 class="text-center text-white mt-2"><?= $user['name']; ?></h5>
                        <!-- <div class="coll d-flex container">
                            <div class="b1"><i class="fa fa-user text-white"></i></div>
                            <div class="b1"><i class="fa fa-power-off text-white"></i></div>
                        </div> -->
                    </div>
                <div class="list-group mt-5">
                    
                    <a href="index.php" class="list-group-item rounded-0 list-group-item-action text-light border-0 p-3 list">Dashboard</a>
                    <a href="mycourse.php" class="list-group-item rounded-0 list-group-item-action text-light border-0 p-3 list">Courses</a>
                    <a href="payments.php" class="list-group-item rounded-0 list-group-item-action text-light border-0 p-3 list">Payments</a>
                    <a href="profile.php" class="list-group-item rounded-0 list-group-item-action text-light border-0 p-3 list">Profile</a>
                    <a href="setting.php" class="list-group-item rounded-0 list-group-item-action text-light border-0 p-3 list">Setting</a>
                    <a href="logout.php" class="list-group-item rounded-0 list-group-item-action text-light border-0 p-3 list"><i class="fa text-danger fa-power-off"></i> Logout</a>
                </div>
            </div>