<?php include('path.php');
include(ROOT_PATH . '/app/controllers/plans.php');
$page = 'index';
$title = "Our Plans";?>
<!DOCTYPE html>
<html lang="en">
<?php include(ROOT_PATH . '/app/includes/links.php');?>
    <body>
    <?php include(ROOT_PATH . '/app/includes/header_open.php'); ?>
    <div class="container-fluid">
        <div class="row intro_plan text-left md:px-16 sm:px-2">
            <div class="col-md-7 col-12 mt-md-5">
                <span class="font-sans m-auto font-bold plan-title">Lorem, ipsum dolor.</span>
                <p class="plan-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo dolor illum delectus magnam ullam eum tempora. Quae asperiores, magnam molestias tempore harum unde, deserunt enim quidem expedita soluta, ducimus est architecto placeat. Deserunt
                    molestias nostrum molestiae id magnam nulla debitis dolores, ad ex dolorem iste similique consectetur dicta dolorum mollitia expedita voluptatum reprehenderit? Dolore tempore accusantium voluptatum similique pariatur dolor officia
                    inventore, nobis velit deleniti neque minus. Impedit sed exercitationem assumenda cum aut aperiam fugit harum eos magnam, sit vel incidunt itaque nobis! Tempora voluptas voluptatum officiis. Reiciendis, officia dignissimos nulla a
                    beatae similique quis at provident ducimus consequatur eius.
                </p>
            </div>
            <div class="col-md-5 col-12 mt-md-5 my-auto">
                <img src="./assets/svg/plan.svg" class="img-fluid" alt="">
            </div>
            <div class="col-12 text-center">
                <i class="fa fa-caret-down icon wow bounceInDown"></i>
            </div>
        </div>
        <div class="row lite md:px-32 sm:px-16 text-center">
            <div class="col-12 my-2">
                <h4 class="lite-title rounded-full px-5 py-1">Lite</h4>
            </div>
            <?php $plans = selectAll($table, ['pgroup' => 'LITE']);
            $x = 0;
            foreach ($plans as $plan):
            ?><?php if ($x === 1){$odd = '';}else{$odd = 'md:mt-16';}?>
            <div class="col-md-3 col-sm-5 col-10 mx-auto lite-box plan wow fadeInDown rounded bg-white p-2 <?php echo $odd;?>">
                <?php echo $plan['icon'];?>
                <br><span class="mt-3"><?php echo $plan['name']; ?></span>
                <hr><span><?php echo $plan['plimit']; ?> Products Limit</span>
                <hr><span><?php echo $plan['duration']; ?> Days</span>
                <hr><span><?php echo $plan['exduration']; ?> Extra Days</span>
                <hr><span>NGN <?php echo $plan['price']; ?></span>
                <a href="<?php echo BASE_URL; ?>/users/access/1" class="btn btn-block btn-info mt-4">Get Started</a>
                <p class="text-danger mt-2"><?php echo $plan['about']; ?></p>
            </div>
            <?php
            $x++;
            endforeach;
            ?>
        </div>
        <div class="row gold pt-md-2 md:px-32 sm:px-16 text-center">
            <div class="col-12 my-2">
                <h4 class="gold-title rounded-full px-5 py-1">Gold</h4>
            </div>
            <?php $plans = selectAll($table, ['pgroup' => 'GOLD']);
            $x = 0;
            foreach($plans as $plan):
            ?><?php if ($x === 1){$odd = 'md:mt-16';}else{$odd = '';}?>
            <div class="col-md-3 col-10 mx-auto gold-box plan wow fadeInDown rounded bg-white p-2 <?php echo $odd; ?>">
            <?php echo $plan['icon'];?>
                <br><span class="mt-3"><?php echo $plan['name'];?></span>
                <hr><span><?php echo $plan['plimit'];?> Products Limit</span>
                <hr><span><?php echo $plan['duration'];?> Days</span>
                <hr><span><?php echo $plan['exduration'];?> Extra Days</span>
                <hr><span>NGN <?php echo $plan['price'];?></span>
                <a href="<?php echo BASE_URL; ?>/users/access/1" class="btn btn-block btn-warning text-white mt-4">Get Started</a>
                <p class="text-danger mt-2"><?php echo $plan['about'];?></p>
            </div>
            <?php $x++; endforeach; ?>
        </div>
        <div class="row diamond pt-md-3 md:px-32 sm:px-16 text-center">
            <div class="col-12 mb-2">
                <h4 class="diamond-title rounded-full px-5 py-1">Diamond</h4>
            </div>
            <?php $plans = selectAll($table, ['pgroup' => 'DIAMOND']); 
            $x = 0;
            foreach($plans as $plan):
            ?><?php if($x === 0){$odd = 'md:mt-16';}elseif($x === 1){$odd = 'md:mt-8';}else{$odd = '';}?>
            <div class="col-md-3 col-10 mx-auto diamond-box plan wow fadeInDown rounded bg-white p-2 <?php echo $odd; ?>">
            <?php echo $plan['icon'];?>
                <br><span class="mt-3"><?php echo $plan['name'];?></span>
                <hr><span><?php echo $plan['plimit'];?> Products Limit</span>
                <hr><span><?php echo $plan['duration'];?> Days</span>
                <hr><span><?php echo $plan['exduration'];?> Extra Days</span>
                <hr><span>NGN <?php echo $plan['price'];?></span>
                <a href="<?php echo BASE_URL; ?>/users/access/1" class="btn btn-block btn-secondary mt-4">Get Started</a>
                <p class="text-danger mt-2"><?php echo $plan['about'];?></p>
            </div>
            <?php $x++; endforeach; ?>
            <!-- 
            <div class="col-md-3 col-10 mx-auto diamond-box plan wow fadeInDown rounded bg-white p-2 ">
                <i class="fa fa-product-hunt icc icon"></i></h5>
                <br><span class="mt-3">Lite 1.0</span>
                <hr><span>5 Products Limit</span>
                <hr><span>30 Days</span>
                <hr><span>5 Extra Days</span>
                <hr><span>NGN 1500</span>
                <a href="<?php echo BASE_URL; ?>/users/access/1" class="btn btn-block btn-info mt-4">Get Started</a>
                <p class="text-danger mt-2">*This plan will enable you upload only a maximum of 5 products which will be active for a period of 30 days.</p>
            </div>
            <div class="col-md-3 col-10 mx-auto diamond-box plan wow fadeInDown rounded bg-white p-2">
                <i class="fa fa-product-hunt icc icon"></i></h5>
                <br><span class="mt-3">Lite 1.0</span>
                <hr><span>5 Products Limit</span>
                <hr><span>30 Days</span>
                <hr><span>5 Extra Days</span>
                <hr><span>NGN 1500</span>
                <a href="<?php echo BASE_URL; ?>/users/access/1" class="btn btn-block btn-info mt-4">Get Started</a>
                <p class="text-danger mt-2">*This plan will enable you upload only a maximum of 5 products which will be active for a period of 30 days.</p>
            </div> -->
        </div>

        <?php include(ROOT_PATH . '/app/includes/footer_open.php');?>
    </div>
    <?php include(ROOT_PATH . '/app/includes/links-b.php'); ?>
</body>

</html>