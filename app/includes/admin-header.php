
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
            <a class="navbar-brand wow zoomInDown" data-wow-delay="3s" href="<?php echo BASE_URL;?>"><img src="<?php echo BASE_URL . '/assets/svg/logo.svg'; ?>" class="img-fluid" width="180px" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto col-md-7 nav-justified">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo BASE_URL . '/users/admin/'; ?>">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo BASE_URL . '/users/admin/users/'; ?>">Users</span></a>
                    </li>
                    <li class="nav-item active">
                        <a href="" id="my-dropdown" class="dropdown-toggle nav-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Staff</a>
                        <div class="dropdown">
                            <div class="dropdown-menu" aria-labelledby="my-dropdown">
                                <a class="dropdown-item active" href="<?php echo BASE_URL . '/users/admin/staff/contact/';?>">Contact</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo BASE_URL . '/users/admin/store/plans/'; ?>">Plans</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo BASE_URL . '/users/admin/store/'; ?>">Stores</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo BASE_URL . '/users/admin/store/catigories/'; ?>">Categories</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo BASE_URL . '/users/admin/'; ?>">Products</span></a>
                    </li>
                </ul>
                <a href="<?php echo BASE_URL . '/logout.php'; ?>" class="btn btn-danger ml-auto">Logout</a>
            </div>
        </nav>
    </header>