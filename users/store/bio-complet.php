<?php 
    include('../../path.php');
    include(ROOT_PATH . '/app/controllers/brands.php');
    include(ROOT_PATH . '/app/includes/message.php');
    include(ROOT_PATH . '/app/includes/errors.php');
    usersOnly();
    if(isset($_GET['action'])) {
        if ($_GET['action'] === 'edit') {
            $title = 'Edit ' . $store['bname'];
            $btn = 'upgrade-brandi';
        }else{
            header('location:' . BASE_URL . '/404.php');
            exit();  
        }
    }else{
        $title = "Bio Complete";  
        $btn = 'complet-bio';
    }

    $user = selectOne('users', ['id' => $_SESSION['id']]);
    if(!$user){
        header('location:' . BASE_URL . '/404.php');
        exit();
    }

?>
<!DOCTYPE html>
<html lang="en">
<?php include(ROOT_PATH . '/app/includes/links.php'); ?>

<body>
<?php include(ROOT_PATH . '/app/includes/header-users.php'); ?>
    <div class="container-fluid bg-blue-300">
        <div class="container">
            <div class="row">
                <div class="col-12 p-2 mt-1 mb-1">
                    <h3 class="title">Brand Registration</h3>
                </div>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="border border-2 rounded brand p-2 mt-2 mb-2 mx-auto col-12 row bg-white" enctype="multipart/form-data">
                    <?php if(isset($_GET['action'])):?>
                    <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
                    <?php endif;?>
                    <div class="col-12 col-md-6">
                        <div class="col-12">
                            <h4>Brand</h4>
                            <small class="text-danger">*Important</small>
                        </div>
                        <div class="form-group">
                            <label for="blogo">Brand Logo<span class="text-danger">*</span></label>
                            <input id="blogo" class="form-control" type="file" name="blogo">
                            <small>Please Please upload a High Quality Logo</small>
                        </div>
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
                        <div class="form-group">
                            <label for="baddress">Brand Address<span class="text-danger">*</span></label>
                            <input id="baddress" class="form-control" type="text" name="baddress" value="<?php echo $baddress; ?>">
                            <small>Where to locate you.</small>
                        </div>
                        <div class="form-group">
                            <label for="baddress2">Brand Address(Google Map)<span class="text-danger">(optional)</span></label>
                            <input id="baddress2" class="form-control" type="text" name="baddress2" value="<?php echo $baddress2; ?>">
                            <small>Copy your google map embeded location code and paste here.</small>
                        </div>
                        <div class="form-group">
                            <label for="bfblink">FaceBook Page Link</label>
                            <input type="text" class="form-control" id="bfblink" name="bfblink" placeholder="http://facebook.com/official_easibiz" value="<?php echo $bfblink; ?>">
                        </div>
                        <div class="form-group">
                            <label for="binstalink">Instagram Handel</label>
                            <input type="text" class="form-control" id="binstalink" name="binstalink" placeholder="http://instagram.com/easibiz_official" value="<?php echo $binstalink; ?>">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="col-12">
                            <h4>Owner</h4>
                            <small class="text-danger">*Important</small>
                        </div>
                        <div class="form-group">
                            <label for="image">Owner Image <span class="text-danger">*</span></label>
                            <input id="image" class="form-control" type="file" name="image">
                            <small>Please provide us with a high quality image</small>
                        </div>
                        <div class="form-group">
                            <label for="pname">Full Name <span class="text-danger">*</span></label>
                            <input id="pname" class="form-control" placeholder="John Doe" type="text" name="pname" value="<?php echo $user['firstname'] . " " . $user['lastname']; ?>">
                            <small>eg. Jone Doe</small>
                        </div>
                        <div class="form-group">
                            <label for="email">Personal Email<span class="text-danger">*</span></label>
                            <input id="email" class="form-control" placeholder="example@email.com" type="email" name="email" value="<?php echo $user['email']; ?>">
                            <small>Eg. johndoe1234@gmail.com</small>
                        </div>
                        <div class="form-group">
                            <label for="phone">Personal Phone<span class="text-danger">*</span></label>
                            <input id="phone" class="form-control" placeholder="+2348143440606" type="number" name="phone"  value="<?php echo $user['phone_number']; ?>">
                            <small>Please include your country code eg. +234, +442 etc.</small>
                        </div>
                        <div class="form-group">
                            <label for="paddress">Home Address<span class="text-danger">*</span></label>
                            <input id="paddress" class="form-control" type="text" name="paddress" value="<?php echo $paddress; ?>">
                            <small>$th Avenue St Luios Cath....</small>
                        </div>
                        <div class="form-group">
                            <label for="pfblink">Personal FaceBook Contact Link</label>
                            <input type="text" class="form-control" id="pfblink" name="pfblink" placeholder="http://facebook.com/official_easibiz" value="<?php echo $pfblink; ?>">
                        </div>
                        <div class="form-group">
                            <label for="pinstalink">Personal Instagram Handel</label>
                            <input type="text" class="form-control" id="pinstalink" name="pinstalink" placeholder="http://instagram.com/easibiz_official" value="<?php echo $pinstalink; ?>">
                        </div>
                        <div class="form-group">
                            <label for="about">About You<span class="text-danger">*</span></label>
                            <textarea rows="7" cols="7" class="form-control" placeholder="My name is...." id="about" name="about"><?php echo $about; ?></textarea>
                            <small>Please write extensively about yourself.</small>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 mx-auto">
                        <button class="btn btn-block btn-primary btn-lg" id="<?php echo $btn; ?>" name="<?php echo $btn?>" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <footer class="row text-white text-center">
            <div class="col-12 col-md-12 bg-dark p-2 text-center">
                <span>eazibiz.com <i class="fa fa-copyright"></i>copyright&nbsp;2020</span>
            </div>
        </footer>
    </div>
    <?php include(ROOT_PATH . '/app/includes/links-b.php'); ?>
</body>

</html>