<?php 
include('../../../path.php');
include(ROOT_PATH . '/app/controllers/brands.php');
include(ROOT_PATH . '/app/includes/message.php');
include(ROOT_PATH . '/app/includes/errors.php');
usersOnly();
$title = 'About Brand';
?>
<!DOCTYPE html>
<html lang="en">
<?php include(ROOT_PATH . '/app/includes/links.php'); ?>

<body>
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
    </header>
    <div class="container-fluid">
        <div class="row min-h-screen bg-white">
            <div class="col-12 col-md-9 mx-auto mt-5">
                <div class="progress rounded-full" style="height: 15px;">
                    <div class="progress-bar bg-success rounded-full" style="width: 40%" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">Step 2</div>
                </div>
            </div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="col-12 my-auto">
                <div class="row mt-2">
                    <div class="col-12 text-center p-2">
                        <span class="font-bold">Brand Information <span class="text-danger">(Important)</span></span>
                    </div>
                    <div class="col-md-5 col-12 mx-auto images text-left p-3 rounded">
                        <div class="form-group">
                            <label for="bname">Brand Name<span class="text-danger">*</span></label>
                            <input id="bname" class="form-control" type="text" name="bname" placeholder="Easibiz" value="<?php echo $bname; ?>">
                            <small>Please Input your brand name or company name eg. Ezaibiz</small>
                        </div>
                        <div class="form-group">
                            <label for="bemail">Brand Email<span class="text-danger">*</span></label>
                            <input id="bemail" class="form-control" type="email" name="bemail" placeholder="support.easibiz@gmail.com" value="<?php echo $bemail; ?>">
                            <small>We will not share your email with any third party</small>
                        </div>
                        <div class="form-group">
                            <label for="bphone">Brand Phone<span class="text-danger">*</span></label>
                            <input id="bphone" class="form-control" type="number" name="bphone" placeholder="+23481 4344 0606" value="<?php echo $bphone; ?>">
                            <small>Please include your country code eg. +234, +442 etc.(Must be Whatsapp)</small>
                        </div>
                        <div class="form-group">
                            <label for="bwelcom">Brand Slogan<span class="text-danger">*</span></label>
                            <input id="bwelcom" class="form-control" type="text" name="bwelcom" placeholder="Welcome to Easibiz.com...."  value="<?php echo $bwelcom; ?>">
                            <small>eg. Wellcome to brand name, here we....</small>
                        </div>
                        <div class="form-group">
                            <label for="currency">Currency<span class="text-danger">*</span></label>
                            <input type="text" name="currency" id="currency" class="form-control" placeholder="NGN" value="<?php echo $currency; ?>">
                            <small>Please ensure to input your based currency abbrivation. Eg US Dollar is USD etc.</small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-3 mx-auto text-center my-4">
                        <a href="<?php echo BASE_URL . '/users/store/reg/images.php'; ?>" class="btn btn-danger btn-block next-btn">Previous</a>
                    </div>
                    <div class="col-12 col-md-3 mx-auto text-center my-4">
                        <input type="submit" value="Next" name="brand-btn" id="brand-btn" class="btn btn-info btn-block next-btn">
                    </div>
                </div>
            </form>
        </div>

        <!-- Footer -->
        <div class="row bg-black text-center text-white p-2 footer">
            <div class="col-12 p-1"><i class="fa fa-home"></i>&nbsp;Designed by Ekwueme Ugochukwu</div>
        </div>
    </div>

    <?php include(ROOT_PATH . '/app/includes/links-b.php'); ?>
</body>

</html>