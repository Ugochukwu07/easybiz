
    <header>
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
            <a class="navbar-brand wow zoomInDown" data-wow-delay="3s" href="<?php echo BASE_URL . '/index'; ?>"><img src="<?php echo BASE_URL . '/assets/svg/logo.svg'; ?>" class="img-fluid" width="180px" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto col-md-9 nav-justified">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo BASE_URL . '/index.php'; ?>">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <?php if($page === 'index'):?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Services</a>
                            <div class="dropdown-menu border-0 text-sm-left text-center wow fadeInDown" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?php echo BASE_URL . '/index.php#more'; ?>">Store Hosting</a>
                                <a class="dropdown-item" href="<?php echo BASE_URL . '/index.php#plan'; ?>">Pricing</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo BASE_URL . '/support.php#sec'; ?>">Security</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Enquires</a>
                            <div class="dropdown-menu text-sm-left text-center wow fadeInDown border-0" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item text-success" href="<?php echo BASE_URL . '/support#faq'; ?>">FQA</a>
                                <a class="dropdown-item" href="<?php echo BASE_URL . '/support#terms'; ?>">Policy</a>
                                <a class="dropdown-item" href="#contact">Contact Us</span></a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo BASE_URL . '/support#terms'; ?>">Terms & Conditions</a>
                            </div>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="<?php echo BASE_URL . '/about';?>">About</span></a>
                        </li>
                    <?php endif;?>
                    <?php if($page === 'about'): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="#location">Location</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#clients">Clients</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">Contact</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#blog">Blog</span></a>
                        </li>
                    <?php endif;?>
                    <?php if($page === 'support'): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="#faq">FAQ</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#terms">Terms</span></a>
                        </li><li class="nav-item">
                            <a class="nav-link" href="#clients">Clients</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">Contact</span></a>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Users</a>
                        <div class="dropdown-menu dropdown-menu-md-right text-sm-left text-center border-0 wow fadeInDown" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item text-success" href="<?php echo BASE_URL . '/users/access'; ?>">Login</a>
                            <a class="dropdown-item  text-info" href="<?php echo BASE_URL . '/users/access/1'; ?>">SignUp</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>