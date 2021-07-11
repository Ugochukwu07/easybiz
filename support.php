<?php include('path.php'); 
$page = 'support';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Support | Easibiz.com</title>
    <link rel="stylesheet" href="./assets/css/style.min.css">
    <link rel="stylesheet" href="./assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="./assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="./assets/css/owl.theme.green.min.css">
    <link rel="stylesheet" href="./assets/css/tailwind.min.css">
    <link rel="stylesheet" href="./assets/css/bootall.min.css">
    <link rel="stylesheet" href="./assets/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./assets/css/animate.css">
    <script src="./assets/js/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
</head>

<body>
    <!-- <header>
        <div class="header-top wow fadeInDown">
            <div class="container-fluid">
                <div class="row bg-info p-1">
                    <div class="col-12 col-md-6 text-muted text-center">
                        <p class="bg-white p-1 mb-1 d-inline-block">ekwuemeugochukwu83@gmail.com</p>
                    </div>
                    <div class="col-12 col-md-6 text-muted text-center">
                        <p class="bg-white p-1 mb-1 d-inline-block">+23481-4344-0606</p>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light p-1">
            <a class="navbar-brand wow zoomInDown" data-wow-delay="3s" href="./index.html"><img src="./assets/images/LogoMakr_3aGKEM.png" class="img-fluid" width="80px" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto col-md-9 nav-justified">
                    <li class="nav-item active">
                        <a class="nav-link" href="./index.html">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#clients">Clients</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#faq">FAQ</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#terms">Terms</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Users</a>
                        <div class="dropdown-menu dropdown-menu-md-right text-sm-left text-center border-0 wow fadeInDown" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item text-success" href="#" data-toggle="modal" data-target="#loginModal">Login</a>
                            <a class="dropdown-item  text-info" href="#" data-toggle="modal" data-target="#signup">SignUp</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#contact">Contact US</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header> -->
<?php include(ROOT_PATH . '/app/includes/header_open.php'); ?>
    <div class="container-fluid">
        <div class="row hotlines text-center">
            <div class="col-12 mt-2 p-1 wow fadeInDown">
                <h1 class="text-success bg-white p-2"><i class="fa fa-phone-square"></i>&nbsp;Our Hot Lines</h1>
            </div>
            <div class="container-lg">
                <div class="row bg-white rounded-full border border-2 border-dark mb-5">
                    <div class="col-4 my-auto">
                        <i class="fa fa-envelope-o icon text-primary"></i>
                    </div>
                    <div class="col-8 my-auto">
                        <p class="text-success"><u>support@easibiz.com</u></p>
                    </div>
                </div>
                <div class="row bg-white rounded-full border border-2 border-dark mb-5">
                    <div class="col-4 my-auto">
                        <i class="fa fa-envelope icon text-orange-700"></i>
                    </div>
                    <div class="col-8 my-auto">
                        <p class="text-success"><u>info@easibiz.com</u></p>
                    </div>
                </div>
                <div class="row bg-white rounded-full border border-2 border-dark mb-5">
                    <div class="col-4 my-auto">
                        <i class="fa fa-whatsapp icon text-success"></i>
                    </div>
                    <div class="col-8 my-auto">
                        <p class="text-success"><u>+23481-4344-0606</u></p>
                    </div>
                </div>
                <div class="row bg-white rounded-full border border-2 border-dark mb-5">
                    <div class="col-4 my-auto">
                        <i class="fa fa-globe icon text-success"></i>
                    </div>
                    <div class="col-8 my-auto">
                        <p class="text-success"><u>Nnamdi Azikiwe University Awka, Anambra State, Nigeria</u></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row faq bg-light mb-2" id="faq">
            <div class="col-12 text-center p-2">
                <h3><i class="fa fa-question-circle"></i>&nbsp;FQA</h3>
            </div>
            <div class="col-md-6 col-12 pl-md-5 pr-md-5">
                <div id="accordion" class="accordion">
                    <div class="collapsed" data-toggle="collapse" href="#collapseOne" id="collapsed">
                        <span>Q. Lorem ipsum dolor sit amet consectetur.</span>
                    </div>
                    <div id="collapseOne" class="collapse" data-parent="#accordion">
                        <span>A. Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste excepturi consequatur ex nesciunt sit modi magni pariatur optio accusamus ullam!</span>
                    </div>
                    <div class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" id="collapsed">
                        <span>Q. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus?</span>
                    </div>
                    <div id="collapseTwo" class="collapse" data-parent="#accordion">
                        <span>A. Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste excepturi consequatur ex nesciunt sit modi magni pariatur optio accusamus ullam!</span>
                    </div>
                    <div class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" id="collapsed">
                        <span>Q. Lorem ipsum dolor sit amet consectetur.</span>
                    </div>
                    <div id="collapseThree" class="collapse" data-parent="#accordion">
                        <span>A. Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste excepturi consequatur ex nesciunt sit modi magni pariatur optio accusamus ullam!</span>
                    </div>
                    <div class="collapsed" data-toggle="collapse" href="#collapseFour" id="collapsed">
                        <span>Q. Lorem ipsum dolor sit amet consectetur.</span>
                    </div>
                    <div id="collapseFour" class="collapse" data-parent="#accordion">
                        <span>A. Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste excepturi consequatur ex nesciunt sit modi magni pariatur optio accusamus ullam!</span>
                    </div>
                    <div class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" id="collapsed">
                        <span>Q. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus?</span>
                    </div>
                    <div id="collapseFive" class="collapse" data-parent="#accordion">
                        <span>A. Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste excepturi consequatur ex nesciunt sit modi magni pariatur optio accusamus ullam!</span>
                    </div>
                    <div class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" id="collapsed">
                        <span>Q. Lorem ipsum dolor sit amet consectetur.</span>
                    </div>
                    <div id="collapseSix" class="collapse" data-parent="#accordion">
                        <span>A. Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste excepturi consequatur ex nesciunt sit modi magni pariatur optio accusamus ullam!</span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 my-auto">
                <img src="./assets/images/startup-594090_1920.jpg" class="img-fluid img-thumbnail" alt="">
            </div>
            <div class="col-12"><span>...</span></div>
        </div>
        <div class="terms row pl-md-5 pr-md-5" id="terms">
            <div class="col-12">
                <h3 class="title">Terms and Conditions</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quam nam illum facere vel placeat tempora laudantium accusantium optio nesciunt enim error eum rerum temporibus, ducimus ea iste excepturi iure cumque repudiandae qui asperiores
                    neque distinctio harum saepe. Architecto, aut dolorum, excepturi iste maiores laboriosam hic exercitationem iusto ut dolores enim odio, perferendis natus a numquam provident nam nulla. Alias facilis aspernatur modi esse numquam sit
                    animi praesentium iusto molestiae maiores, blanditiis nam! Quidem saepe maiores nesciunt alias inventore non maxime cupiditate id iure, tempore aliquam tempora repudiandae qui voluptate culpa.
                </p>
                <ul>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>
                </ul>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quam nam illum facere vel placeat tempora laudantium accusantium optio nesciunt enim error eum rerum temporibus, ducimus ea iste excepturi iure cumque repudiandae qui asperiores
                    neque distinctio harum saepe. Architecto, aut dolorum, excepturi iste maiores laboriosam hic exercitationem iusto ut dolores enim odio, perferendis natus a numquam provident nam nulla. Alias facilis aspernatur modi esse numquam sit
                    animi praesentium iusto molestiae maiores, blanditiis nam! Quidem saepe maiores nesciunt alias inventore non maxime cupiditate id iure, tempore aliquam tempora repudiandae qui voluptate culpa.
                </p>
            </div>
            <div class="col-12">
                <h3 class="title">Policy</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quam nam illum facere vel placeat tempora laudantium accusantium optio nesciunt enim error eum rerum temporibus, ducimus ea iste excepturi iure cumque repudiandae qui asperiores
                    neque distinctio harum saepe. Architecto, aut dolorum, excepturi iste maiores laboriosam hic exercitationem iusto ut dolores enim odio, perferendis natus a numquam provident nam nulla. Alias facilis aspernatur modi esse numquam sit
                    animi praesentium iusto molestiae maiores, blanditiis nam! Quidem saepe maiores nesciunt alias inventore non maxime cupiditate id iure, tempore aliquam tempora repudiandae qui voluptate culpa.
                </p>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quam nam illum facere vel placeat tempora laudantium accusantium optio nesciunt enim error eum rerum temporibus, ducimus ea iste excepturi iure cumque repudiandae qui asperiores
                    neque distinctio harum saepe. Architecto, aut dolorum, excepturi iste maiores laboriosam hic exercitationem iusto ut dolores enim odio, perferendis natus a numquam provident nam nulla. Alias facilis aspernatur modi esse numquam sit
                    animi praesentium iusto molestiae maiores, blanditiis nam! Quidem saepe maiores nesciunt alias inventore non maxime cupiditate id iure, tempore aliquam tempora repudiandae qui voluptate culpa.
                </p>
            </div>
        </div>
        <div class="row sec bg-light pl-md-5 pr-md-5 p-2" id="sec">
            <div class="col-12">
                <h3 class="title"><i class="fa fa-shield"></i> Security</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quam nam illum facere vel placeat tempora laudantium accusantium optio nesciunt enim error eum rerum temporibus, ducimus ea iste excepturi iure cumque repudiandae qui asperiores
                    neque distinctio harum saepe. Architecto, aut dolorum, excepturi iste maiores laboriosam hic exercitationem iusto ut dolores enim odio, perferendis natus a numquam provident nam nulla. Alias facilis aspernatur modi esse numquam sit
                    animi praesentium iusto molestiae maiores, blanditiis nam! Quidem saepe maiores nesciunt alias inventore non maxime cupiditate id iure, tempore aliquam tempora repudiandae qui voluptate culpa.
                </p>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quam nam illum facere vel placeat tempora laudantium accusantium optio nesciunt enim error eum rerum temporibus, ducimus ea iste excepturi iure cumque repudiandae qui asperiores
                    neque distinctio harum saepe. Architecto, aut dolorum, excepturi iste maiores laboriosam hic exercitationem iusto ut dolores enim odio, perferendis natus a numquam provident nam nulla. Alias facilis aspernatur modi esse numquam sit
                    animi praesentium iusto molestiae maiores, blanditiis nam! Quidem saepe maiores nesciunt alias inventore non maxime cupiditate id iure, tempore aliquam tempora repudiandae qui voluptate culpa.
                </p>
                <ul>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>
                </ul>
            </div>
        </div>
        <div class="row gallery p-3 p-md-5 text-center pb-md-0" id="clients">
            <div class="col-12 p-1 wow fadeInDown">
                <h3 class="title"><i class="fa fa-users mb-1"></i> Clients</h3><br>

            </div>
            <div class="col-12 p-md-5 p-2 aa m-md-1 mb-1 wow fadeInDown">
                <div class="background"></div>
                <div class="col-12 text-white my-auto p-5">
                    <h4 class="mt-5">Lorem ipsum dolor sit amet.</h4>
                    <span class="mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, aspernatur?</span>
                </div>
            </div>
            <div class="col-12 col-md-3 bb ml-md-1 mb-1 wow fadeInRight">
                <div class="background"></div>
                <div class="col-12 text-white my-auto p-5">
                    <h4 class="mt-5">Lorem ipsum dolor sit amet.</h4>
                    <span class="mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, aspernatur?</span>
                </div>
            </div>
            <div class="col-12 col-md-5 cc mx-auto mb-1 wow fadeInDown">
                <div class="background"></div>
                <div class="col-12 text-white my-auto p-5">
                    <h4 class="mt-5">Lorem ipsum dolor sit amet.</h4>
                    <span class="mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, aspernatur?</span>
                </div>
            </div>
            <div class="col-12 col-md-3 dd ml-md-1 mb-1 wow fadeInRight">
                <div class="background"></div>
                <div class="col-12 text-white my-auto p-5">
                    <h4 class="mt-5">Lorem ipsum dolor sit amet.</h4>
                    <span class="mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, aspernatur?</span>
                </div>
            </div>
            <div class="col-12 p-md-5 p-3 ee m-md-1 wow fadeInUp">
                <div class="background"></div>
                <div class="col-12 text-white my-auto p-5">
                    <h4 class="mt-5">Lorem ipsum dolor sit amet.</h4>
                    <span class="mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, aspernatur?</span>
                </div>
            </div>
        </div>
        <div class="row partner">
            <div class="col-12 text-center my-auto"></div>
        </div>
        <?php include(ROOT_PATH . '/app/includes/footer_open.php');?>
    </div>

    <script src="./assets/js/jquery.min.js"></script>
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <script src="./assets/js/owl.carousel.min.js"></script>
    <script src="./assets/js/typed.js"></script>
    <script>
        $('.owl-carousel.blog-carousel').owlCarousel({
            loop: true,
            autoplay: true,
            autoplayTimeout: 12000,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        });
    </script>
    <script src="./assets/js/scripts.js"></script>
    <script src="./assets/js/custom.js"></script>
</body>

</html>

</html>