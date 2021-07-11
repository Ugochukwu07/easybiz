<header>
        <div class="header-top wow fadeInDown">
            <div class="container-fluid">
                <div class="row bg-info p-1">
                    <div class="col-12 col-md-6 text-muted text-center">
                        <p class="bg-white p-1 mb-1 d-inline-block"><?php echo $_SESSION['bemail']; ?></p>
                    </div>
                    <div class="col-12 col-md-6 text-muted text-center">
                        <p class="bg-white p-1 mb-1 d-inline-block">+<?php echo $_SESSION['bphone']; ?></p>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light p-1">
            <a class="navbar-brand wow zoomInDown" data-wow-delay="3s" href="<?php echo BASE_URL . '/index/' . $_SESSION['plink']; ?>"><img src="<?php echo BASE_URL . '/users/assets/images/' . $_SESSION['blogo']; ?>" class="img-fluid" width="80px" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto col-md-7 nav-justified">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo BASE_URL . '/index/' . $_SESSION['plink']; ?>">My Store <span class="sr-only">(current)</span></a>
                    </li>
                <?php if($page === 'profile'):?>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact Esaibiz</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#about-me">About Me</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#plans">Plans</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo BASE_URL . '/users/store/products/';?>">Products</span></a>
                    </li>
                <?php endif;?>
                <?php if($page === "product"):?>
                    <li class="nav-item active">
                        <a href="" id="my-dropdown" class="dropdown-toggle nav-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Catigories</a>
                        <div class="dropdown">
                            <div class="dropdown-menu" aria-labelledby="my-dropdown">
                                <a class="dropdown-item active" href="<?php echo BASE_URL . '/users/store/products/catigories/';?>">View</a>
                                <a class="dropdown-item" href="<?php echo BASE_URL . '/users/store/products/catigories/add.php';?>">Add</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#plans">Plans</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo BASE_URL. '/users/store/users/dashboard';?>">Profile</span></a>
                    </li>
                    <li class="nav-item active">
                        <a href="" id="my-dropdown" class="dropdown-toggle nav-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Products</a>
                        <div class="dropdown">
                            <div class="dropdown-menu" aria-labelledby="my-dropdown">
                                <a class="dropdown-item" href="<?php echo BASE_URL. '/users/store/products/add.php';?>">Add Products</a>
                                <a class="dropdown-item" href="<?php echo BASE_URL. '/users/store/products/';?>">View All</a>
                            </div>
                        </div>
                    </li>
                <?php endif;?>
                </ul>
                <a href="<?php echo BASE_URL . '/logout.php'; ?>" class="btn btn-danger ml-auto">Logout</a>
            </div>
        </nav>
    </header>