
    <header>
        <div class="header-top wow fadeInDown">
            <div class="container-fluid">
                <div class="row bg-info p-1">
                    <div class="col-12 col-md-6 text-muted text-center">
                        <p class="bg-white p-1 mb-1 d-inline-block"><?php echo $store['bemail']; ?></p>
                    </div>
                    <div class="col-12 col-md-6 text-muted text-center">
                        <p class="bg-white p-1 mb-1 d-inline-block">+<?php echo $store['bphone']; ?></p>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light p-1">
            <a class="navbar-brand wow zoomInDown" data-wow-delay="3s" href="<?php echo BASE_URL . '/index/' . $_GET['plink']; ?>"><img src="<?php echo BASE_URL . '/users/assets/images/' .$store['blogo']; ?>" class="img-fluid" width="80px" alt="<?php echo $store['bname']; ?>"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto col-md-6 nav-justified">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo BASE_URL . '/index/' . $_GET['plink']; ?>">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <?php if(!empty($_SESSION['id'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo BASE_URL . '/users/store/users/dashboard'; ?>">Profile</a>
                    </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact Me</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#about-me">About Me</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#cat">Categories</span></a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0 col-md-3">
                    <input class="form-control mr-sm-auto col-9" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-auto" type="submit">Search</button>
                </form>
            </div>
        </nav>
    </header>