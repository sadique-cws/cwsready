<style>
    .facebook, .twitter, .linkedin, .github{
        transition:.3s all linear;
        color:#6c757d;
    }
    .facebook:hover{
        color:#4267B2;
    }
    .linkedin:hover{
        color:#0e76a8;
    }
    .twitter:hover{
        color:#1DA1F2;
    }
    .github:hover{
        color:#fafafa;
    }
    </style>
    <footer style="background-color: #26272b; position:relative; bottom:0; background:url('../images/footer.png'); background-size:cover; background-position:50% 50%;" class="p-3 bg-dark">
        <div class="container py-5">
            <div class="row row-cols-lg-2 row-cols-md-2 rows-cols-sm-2 row-cols-1">
                <div class="col mb-4">
                    <div class="ad-pro d-flex">
                        <div class="img"><img src="../images/sadiq.jfif" style="height:100px; width:100px;border-radius:20px;" class="img-fluid" alt=""></div>
                        <span class=" ms-2 text-light"><h5>Sadique Hussain</h5><p class="small h6 text-muted">Tutor</p></span>
                    </div>
                    <div class="phone d-flex mt-4">
                        <span class=" text-muted pt-1"><i class="fa fa-phone"></i></span>
                        <span class=" ms-2 text-light text-muted">+91 9546805580</span>
                    </div>
                    <div class="email d-flex mt-3">
                        <span class=" text-muted pt-1"><i class="fa fa-envelope"></i></span>
                        <span class=" ms-2 text-light text-muted">cwspurnea@gmail.com</span>
                    </div>
                    <div class="email d-flex mt-3">
                        <span class=" text-muted pt-1"><i class="fa fa-map-marker"></i></span>
                        <span class=" ms-2 text-light text-muted"> K. Haat Thana Chowk, Purnia <br> Bihar 854301</span>
                    </div>
                </div>
                <div class="col ">
                <h5 class="text-white">Connect With Us</h5>
                    <a class="facebook d-flex mt-3 text-decoration-none" href="https://www.facebook.com/cwspurnea/" >
                        <span class=" pt-1"><i class="fa fa-facebook-square fa-2x"></i></span>
                        <span class=" ms-2 mt-2">facebook</span>
                    </a>
                    <a class="linkedin d-flex mt-3 text-decoration-none" href="" >
                        <span class=" pt-1"><i class="fa fa-linkedin-square fa-2x"></i></span>
                        <span class=" ms-2 mt-2">Linkedin</span>
                    </a>
                    <a class="github d-flex mt-3 text-decoration-none" href="https://github.com/sadique-cws" >
                        <span class=" pt-1"><i class="fa fa-github-square fa-2x"></i></span>
                        <span class=" ms-2 mt-2">Git Hub</span>
                    </a>
                    <a class="twitter d-flex mt-3 text-decoration-none" href="" >
                        <span class=" pt-1"><i class="fa fa-twitter-square fa-2x"></i></span>
                        <span class=" ms-2 mt-2">Twitter</span>
                    </a>
                    
                </div>
            </div>
        </div>
        <div class="container border-top border-secondary py-3 pb-0 justify-content-middle">
            <h6 class="text-muted fw-light">Developed By <a href="https://github.com/vikas-vm" class="text-light text-decoration-none">Vikas</a> & <a href="https://github.com/alok9038" class="text-light text-decoration-none">Alok</a> (student of CWS)</h6>
        </div>
    </footer>
    <!-- JavaScript Bundle with Popper -->
    <script>
        $(window).scroll(function() {     
            var scroll = $(window).scrollTop();
            if (scroll > 0) {
                $("#header").addClass("active");
            }
            else {
                $("#header").removeClass("active");
            }
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="../css/main.js"></script>
</body>
</html> 
