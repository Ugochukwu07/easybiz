<?php include('path.php');
include(ROOT_PATH . '/app/controllers/users.php');
$page = 'index';
$title = "Home";
?>
<?php if(isset($_GET['plink'])): ?>
    <?php
        $store = selectOne('stores', ['plink' => $_GET['plink']]);
        $title = $store['bname'];
        $_GET['id'] = $store['id'];
        $description = $store['bwelcom'];
        require(ROOT_PATH . '/users/store/index.php');
    ?>
<?php else: ?>
    <!DOCTYPE html>
    <html lang="en">
    <?php include(ROOT_PATH . '/app/includes/links.php');?>
    <body>
    <?php include(ROOT_PATH . '/app/includes/header_open.php'); ?>
        <div class="container-fluid">
            <div class="row landing min-h-screen wow fadeInDown">
                <div class="col-12 text-center text-sm-left col-md-8 col-sm-10 mx-auto mt-32 text">
                    <h1 class="welcome mt-5"><span class="type"></span></h1>
                </div>
                <div class="col-12 col-md-8 row mx-auto text-center wow backInDown button-pad">
                    <a href="<?php echo BASE_URL . '/users/access/1'; ?>" class="border-2 border-white text-white col-md-4 col-10 col-sm-5 mx-auto h-8 rounded-full">Get Started</a>
                    <a href="<?php echo BASE_URL . '/users/access'; ?>" class="border-2 border-white text-white col-md-4 col-10 col-sm-5 mx-auto h-8 rounded-full">Login</a> 
                </div>
            </div>
            <div class="row text-center mb-2 steps pl-sm-5 pr-sm-5 bg-gray-300">
                <div class="title_col col-12 mx-auto col-md-12 text-center mb-4">
                    <h2 class="title">Simple Steps to Get <span class="text-primary">Started</span></h2>
                    <hr>
                </div>
                <div class="col-12 col-sm-6 col-md-4 border border-right-0 border-bottom-2 border-left-0 border-secondary box wow fadeInRight">
                    <i class="fa fa-user-circle icon"></i><br>
                    <h4 class="mb-1">Sign Up For an Account.</h4>
                    <span class="text-dark">Sign up for a free 7 days account to get started using our platform</span>
                </div>
                <div class="col-md-4 col-12 col-sm-6 box wow fadeInRight">
                    <i class="fa fa-money icon"></i><br>
                    <h4 class="mb-1">Select a Desered Plan.</h4>
                    <span class="text-dark">Select a package plan from our wild range of plans avaliable</span>
                </div>
                <div class="col-md-4 col-12 col-sm-6 border border-right-0 border-bottom-2 border-left-0 border-secondary  box wow fadeInRight">
                    <i class="fa fa-upload icon"></i><br>
                    <h4 class="mb-1">Upload Your Products.</h4>
                    <span class="text-dark">Upload your product fast and easy through out encryipted network.</span>
                </div>
                <div class="col-md-4 mx-auto col-12 col-sm-6 border-bottom-0 box wow fadeInRight">
                    <i class="fa fa-share icon"></i><br>
                    <h4 class="mb-1">Share your Product</h4>
                    <span class="text-dark">Then you can share your landing page link your target customers.</span>
                </div>
            </div>
            <div class="more row text-center text-md-left p-3" id="more">
                <div class="col-12 col-md-8 p-3 pl-md-5 my-auto">
                    <h2>How it works</h2>
                    <p class="">Eazibiz is an digital platform who's goal is to allow its users to host his or her products and services online. It provides its users with a unique webpage where the products and services of the users are displayed. And its gives it users
                        a unique link, that will then share to their targeted customers via Facebook and other social medias.</p>
                    <small>Want more information? Click the <span>More Info</span> button below.</small> <br>
                    <a href="<?php echo BASE_URL . '/how-it-works'; ?>" class="btn rounded-full btn-primary col-12 col-md-5 more-bttn">More Info</a>
                </div>
                <div class="col-12 col-md-4 my-auto">
                    <img src="<?php echo BASE_URL . '/assets/images/morning-2264051_1280.jpg'; ?>" alt="" class="img-fluid rounded">
                </div>
            </div>
            <div class="row catch p-md-5 text-center text-white mb-1 text-2xl">
                <div class="background"></div>
                <div class="owl-carousel owl-theme catch-p">
                    <div class="item">
                        <div class="col-md-5 col-12 mx-auto p-3 text-center">
                            <img src="<?php echo BASE_URL . '/assets/images/easibiz.png'; ?>" class="img-fluid rounded-full mx-auto" style="width: auto !important;" alt=""><br>
                            <span class="">Since i have been using this platform eazibiz.com. I have been very satified by there services. My customers can reach me with ease. <strong>Thank You for providing such sercives</strong></span>
                            <hr>
                            <div class="blockquote-footer">Store Owner</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="col-md-5 col-12 mx-auto p-3 text-center">
                            <img src="<?php echo BASE_URL . '/assets/images/easibiz.png'; ?>" class="img-fluid rounded-full mx-auto" style="width: auto !important;" alt=""><br>
                            <span class="">Since i have been using this platform eazibiz.com. I have been very satified by there services. My customers can reach me with ease. <strong>Thank You for providing such sercives</strong></span>
                            <hr>
                            <div class="blockquote-footer">Store Owner</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="col-md-5 col-12 mx-auto p-3 text-center">
                            <img src="<?php echo BASE_URL . '/assets/images/easibiz.png'; ?>" class="img-fluid rounded-full mx-auto" style="width: auto !important;" alt=""><br>
                            <span class="">Since i have been using this platform eazibiz.com. I have been very satified by there services. My customers can reach me with ease. <strong>Thank You for providing such sercives</strong></span>
                            <hr>
                            <div class="blockquote-footer">Store Owner</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="col-md-5 col-12 mx-auto p-3 text-center">
                            <img src="<?php echo BASE_URL . '/assets/images/easibiz.png'; ?>" class="img-fluid rounded-full mx-auto" style="width: auto !important;" alt=""><br>
                            <span class="">Since i have been using this platform eazibiz.com. I have been very satified by there services. My customers can reach me with ease. <strong>Thank You for providing such sercives</strong></span>
                            <hr>
                            <div class="blockquote-footer">Store Owner</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row signup text-center wow fadeInDown">
                <div class="col-12 my-auto p-md-5 p-2">
                    <i class="fa fa-handshake-o icon"></i><br>
                    <span class="text-5xl wow fadeInDown" data-wow-duration="2s">THE KEY TO SUCCESS IS TO START <br> BEFORE YOU GET READY</span>
                    <br> <a href="<?php echo BASE_URL . '/users/access/1'; ?>" class="btn btn-info btn-lg col-md-4 col-12 wow fadeInDown">Get Started</a>
                    <hr class="bg-white">
                    <br>
                    <small class="border border-2 p-2 text-white bg-dark d-sm-inline d-block">Sign Up for an account to start uploading your products and services.</small>
                </div>
            </div>
            <div class="row login text-center text-white wow fadeInDown mt-1">
                <div class="col-12 my-auto p-md-5 p-2">
                    <i class="fa fa-user-circle icon"></i><br>
                    <span class="text-3xl wow fadeInDown" data-wow-duration="2s">Already Signed up, Login into your <br class="d-none d-md-block"> account to enjoy our services</span>
                    <br> <br> <a href="<?php echo BASE_URL . '/users/access'; ?>" class="btn btn-info btn-lg col-4 wow fadeInDown">Login</a>
                    <hr class="bg-white">
                    <br>
                    <small class="border border-2 p-2 text-white bg-dark d-sm-inline d-block">Login and start uploading your products and services.</small>

                </div>
            </div>
            <div class="row about text-white p-2 bg-dark">
                <div class="col-12 col-md-12 mt-2 wow fadeInDown">
                    <h3 class="p-2 bg-green-500 col-md-4 mx-auto rounded-full text-center">About <span class="text-dark">Eazibiz.com</span></h3>
                    <hr class="bg-light">
                </div>
                <div class="col-12 paddind"></div>
                <div class="col-12 col-md-5 my-auto">
                    <video width="100%" height="" autoplay loop class="img-thumbnail">
                    <source src="<?php echo BASE_URL . '/assets/images/video.mp4'; ?>" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                </div>
                <div class="col-12 col-md-7 my-auto pb-md-3 pb-1">
                    <div class="col-12 text-2xl text-center">
                        <i class="fa fa-home"></i><span class="p-1 rounded">Eazibiz.com</span>
                    </div>
                    <hr class="bg-white">
                    <p>Once again, I will love to welcome you on this amazing and head line making platform. Easybiz is a new platform that allows it's users which is you. To upload your products and services on our platform. This is highly important for those who wants to upgrade to the digital world. Here at Easybiz we host mini stores online for people.</p>
                    <p>The idea of a platform that does what we do here at Easybiz started in minds of two great individuals, who we came proudly call our founders namely Mr. Ekwueme Ugochukwu and Mr. Ekwueme Paul(two brothers). They started putting in the work by desiging, brainstorming and putting together the technical funtionalities which makes this platform amazing and beautiful. Their sole aim was to make available people's products and services where they at not available. Their helping smaller brands or sole individual markets to get an online presence by providing a platform where there can upload their goods and services. All for a small token. And we have been doing that and many more for a period of 1 year. Within that amount of time we have hosted up to 12 brands and individual marketers and so far they have been happy with out services.</p>
                    <a href="<?php echo BASE_URL . '/users/access/1'; ?>" class="btn more-btn col-md-5 col-12">Get Started</a>
                    <a href="<?php echo BASE_URL . '/about'; ?>" class="btn more-btn  col-md-5 col-12">More Info</a>
                </div>
                <div class="col-12 paddind"></div>
            </div>
            <div class="row py-5 py-md-0 pricing" style="background: url(./assets/images/plann.jpg);background-position: center;background-attachment: fixed; background-size: cover;">
                <div class="col-md-6 ml-md-5 text-center brief text-md-left p-2 col-10 mx-auto my-auto bg-white rounded p-md-3">
                    <h4>Plans</h4>
                    <p class="">loldokf doos osof so soof ow dodf wo lorme krmow mwomodr, loldokf doos osof so soof ow dodf wo lorme krmow mwomodr loldokf doos osof so soof ow dodf wo lorme krmow mwomodrloldokf doos osof so soof ow dodf wo lorme krmow mwomodr</p>
                    <a href="<?php echo BASE_URL; ?>/users/access/1" class="btn btn-success mb-2 mb-md-0">Start Your free 7 days trial now</a>
                    <a href="<?php echo BASE_URL . '/plan.php'; ?>" class="btn btn-info">More Plans</a>
                </div>
                <div class="col-md-5 col-12 p-md-3 my-auto">
                    <br>
                    <div class="col-10 col-md-7 free text-center plan wow fadeInDown rounded bg-whit mx-auto p-3">
                        <i class="fa fa-gift icc icon"></i></h5>
                        <br><span class="mt-4">Lite 1.0</span>
                        <hr><span>5 Products Limit</span>
                        <hr><span>30 Days</span>
                        <hr><span>5 Extra Days</span>
                        <hr><span>NGN 1500</span>
                        <a href="<?php echo BASE_URL; ?>/users/access/1" class="btn btn-block btn-info mt-4">Get Started</a>
                        <p class="text-danger mt-2">*This plan will enable you upload only a maximum of 5 products which will be active for a period of 30 days.</p>
                    </div>
                </div>
            </div>
            <?php include(ROOT_PATH . '/app/includes/blog.php');?>
            <div class="row social p-3">
                <?php $stores = selectAllLimit('stores', ['status' => 1], 1, 15); ?>
                <div class="col-12 col-md-12 text-left">
                    <h4>Our Users</h4>
                    <hr>
                </div>
                <div class="owl-carousel owl-theme back">
                <?php foreach($stores as $key => $store):?>
                <?php $user = selectOne('users', ['store_id' => $store['id']]); ?>
                    <div class="item">
                        <div class="col-12 col-md-12 mb-2">
                            <img src="<?php echo BASE_URL . '/users/assets/images/' . $store['blogo']; ?>" alt="" class="img-fluid col-12" style="height: 200px;">
                            <dl class="row p-2 bg-white rounded">
                                <dt class="col-sm-4 text-center text-sm-right">Brand Name</dt>
                                <dd class="col-sm-8 text-center text-sm-left"><?php echo $store['bname']; ?></dd>

                                <dt class="col-sm-4 text-center text-sm-right">Email</dt>
                                <dd class="col-sm-8 text-center text-sm-left"><?php echo $store['bemail']; ?></dd>

                                <dt class="col-sm-4 text-center text-sm-right">Owner</dt>
                                <dd class="col-sm-8 text-center text-sm-left"><?php echo $user['firstname'] . $user['lastname']; ?></dd>

                                <dt class="col-sm-4 text-center text-sm-right">Phone</dt>
                                <dd class="col-sm-8 text-center text-sm-left"><?php echo $store['bphone']; ?></dd>

                                <dt class="col-sm-4 text-center text-sm-right">UserID</dt>
                                <dd class="col-sm-8 text-center text-sm-left">USD<?php echo $user['id']; ?></dd>
                            </dl>
                            <a href="<?php echo BASE_URL . '/index/' . $store['plink']; ?>" class="btn btn-block btn-primary">Visit</a>
                        </div>
                    </div>
                <?php endforeach; ?>
                </div>
            </div>
            <?php include(ROOT_PATH . '/app/includes/contact.php');?>
            
            <?php include(ROOT_PATH . '/app/includes/footer_open.php');?>
        </div>
        <?php include(ROOT_PATH . '/app/includes/links-b.php'); ?>
        <script>
            var typed = new Typed(".type", {
                strings: ["Welcome to <span class='bg-light rounded p-1 border border-dark border-2 text-black-50'>Eazibiz.com</span> <br> We <span class='bg-warning rounded p-1 border border-dark border-2'>sepecify</span> in hosting your <span class='bg-primary rounded p-1 border border-dark border-2'>business</span> online."],
                typeSpeed: 140
            });
        </script>
    </body>
    </html>
<?php endif; ?>