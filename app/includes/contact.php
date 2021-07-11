<div class="row contact p-md-3 text-white" id="contact">
    <div class="col-12 col-md-6 mx-auto p-2">
        <?php include(ROOT_PATH . '/app/helpers/contact.php'); ?>
        <?php include(ROOT_PATH . '/app/includes/message.php'); ?>
        <?php include(ROOT_PATH . '/app/includes/errors.php'); ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <h2 class="text-center p-2 wow fadeInDown">Contact Us</h2>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control wow fadeInDown" id="email" name="email" value="<?php echo $email; ?>" aria-describedby="emailHelp" placeholder="example@email.com">
                <small>We will not share your email with any third party</small>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="number" class="form-control wow fadeInDown" id="phone" name="phone" value="<?php echo $phone; ?>" aria-describedby="phoneHelp" placeholder="+2348143440606">
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea class="form-control wow fadeInDown" id="message" name="message" rows="7" placeholder="Message"><?php echo $message; ?></textarea>
            </div>
            <div class="text-center">
                <button type="submit" name="submit_contact" class="btn btn-lg border wow fadeInDown border-2 border-white col-6 text-white">Contact Us</button>
            </div>
        </form>
    </div>
</div>