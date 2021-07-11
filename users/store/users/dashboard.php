<?php 
    include('../../../path.php');
    include(ROOT_PATH . '/app/controllers/users.php');
    include(ROOT_PATH . '/app/helpers/plans.php');
    usersOnly();
    $title = $_SESSION['firstname'] . ' Dashboard';
    $page = 'profile';
    $product = selectAll('products', ['store_id' => $_SESSION['store_id']]);
    $total_pro = count($product);
    $plan = selectOne('plans', ['id' => $_SESSION['plan_id']]);
    $date = selectOne('plan_sub', ['trans_ref' => $_SESSION['trans_ref']]);
    $startTime = strtotime(date('Y-m-d'));
    $endTime = strtotime($date['endTime']);
    $daysRemain = $endTime - $startTime;
    $daysRemain = round($daysRemain / (60*60*24));
    #dd($_SESSION);
?>

<!DOCTYPE html>
<html lang="en">
<?php include(ROOT_PATH . '/app/includes/links.php'); ?>

<body>

<?php include(ROOT_PATH . '/app/includes/header-close.php'); 
    include(ROOT_PATH . '/app/includes/message.php');?>
    <div class="container-fluid">
        <div class="container wow fadeInDown">
            <!-- Profile -->
            <div class="row profile mt-1">
                <div class="col-12 text-center mt-3 wow zoomInDown">
                    <h4 class="bg-primary p-2 col-md-3 col-8 text-white rounded-full mx-auto">Dashboard</h4>
                </div>
                <div class="col-12 col-md-5 text-center my-auto">
                    <img src="<?php echo BASE_URL . '/users/assets/images/' . $_SESSION['image'];?>" alt="Profile Image" class="img-thumbnail col-md-10 col-12 mx-auto d-block img-fluid rounded-full" style="height: 250px;">
                </div>
                <div class="col-md-7 col-12">
                    <dl class="p-md-2 p-1 bg-white rounded">
                        <div class="row bg-light rounded">
                            <dt class="col-sm-3 rounded">Full Name</dt>
                            <dd class="col-sm-9 rounded"><?php echo $_SESSION['firstname'] . '  ' . $_SESSION['lastname'];?></dd>
                        </div>
                        <div class="row rounded">
                            <dt class="col-sm-3">Email</dt>
                            <dd class="col-sm-9"><?php echo $_SESSION['email']; ?></dd>
                        </div>
                        <div class="row bg-light rounded">
                            <dt class="col-sm-3 rounded">Brand Name</dt>
                            <dd class="col-sm-9 rounded"><?php echo $_SESSION['bname'];?></dd>
                        </div>
                        <div class="row rounded">
                            <dt class="col-sm-3 text-truncate">Phone Number</dt>
                            <dd class="col-sm-9"><?php echo $_SESSION['phone_number']; ?></dd>
                        </div>
                        <div class="row bg-light rounded">
                            <dt class="col-sm-3 rounded">UserID</dt>
                            <dd class="col-sm-9 rounded"><?php echo 'UID' . $_SESSION['id']; ?></dd>
                        </div>
                        <div class="row rounded">
                            <dt class="col-sm-3 text-truncate">Personal Domain</dt>
                            <dd class="col-sm-9">https://eazybiz.com/<?php echo $_SESSION['plink']; ?></dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
        <!-- Owner -->
        <div class="row bg-dark text-white owner-info p-md-5 p-1 mb-2" id="about-me">
            <div class="col-12 text-center mt-3 wow zoomInDown">
                <h4 class="bg-primary p-2 col-md-3 col-8 text-white rounded-full mx-auto">About Me</h4>
            </div>
            <div class="wow fadeInLeft col-12 col-md-7 my-auto">
                <h4 class="text-white bg-primary d-inline-block"><?php echo $_SESSION['firstname'] . '  ' . $_SESSION['lastname'];?></h4>
                <span class="text-white blockquote-footer">Owner <cite><?php echo $_SESSION['bname'];?></cite></span>
                <hr>
                <p><?php echo $_SESSION['about'];?></p>
            </div>
            <div class="col-12 col-md-5 my-auto wow fadeInRight">
                <img src="<?php echo BASE_URL . '/users/assets/images/' . $_SESSION['image'];?>" alt="" class="img-fluid pull-left m-2 img-thumbnail">
            </div>
            <div class="col-12 text-center">
                <a href="<?php echo BASE_URL . '/users/store/bio-complet.php?action=edit&id=' . $_SESSION['id']; ?>" class="btn btn-info col-md-4 col-12 wow fadeInDown" data-wow-duration="2s">Edit</a></div>
        </div>
        <!-- Chart -->
        <div class="row chart wow fadeIn">
            <div class="col-md-8 col-12 mx-auto">
                <canvas id="myChart" width="100%" height=""></canvas>
            </div>
        </div>
        <div class="row stat text-center bg-light p-3 pt-5 pb-5">
            <div class="col-12 col-md-3 wow fadeInDown">
                <i class="fa fa-file-code-o icon"></i>
                <h5 class="text-info ">Total Files Uploaded</h5>
                <span><?php echo $total_pro; ?></span>
            </div>
            <div class="col-12 col-md-3 wow fadeInDown">
                <i class="fa fa-gift icon"></i>
                <h5 class="text-info ">Current Package</h5>
                <span><?php echo $plan['name']; ?></span>
            </div>
            <div class="col-12 col-md-3 wow fadeInDown">
                <i class="fa fa-rebel icon"></i>
                <h5 class="text-info ">Days Remaining</h5>
                <span><?php echo $daysRemain; ?> Days</span>
            </div>
            <div class="col-12 col-md-3 wow fadeInDown">
                <i class="fa fa-users icon"></i>
                <h5 class="text-info ">Total Visitors</h5>
                <span>56</span>
            </div>
        </div>
        <div class="row" style="background-image: url(<?php echo BASE_URL . '/assets/images/cool-background.png'?>);  background-position: center; background-repeat: no-repeat; background-size: cover;">
        <div class="container">
            <!-- Packages -->
            <div class="row packages p-md-3 p-1">
                <div class="col-12 text-center mt-3 wow fadeInDown" data-wow-duration="2s">
                    <h4 class="bg-pink-400 border-white border p-2 col-md-3 col-10 text-white rounded-full mx-auto">Packages</h4>
                </div>
                <div class="col-md-4 col-12 wow fadeInDown" data-wow-duration="2s">
                    <div class="card col-12">
                        <span class="text-center text-4xl mt-2 text-pink-600"><?php echo $plan['icon']; ?></span>
                        <div class="card-body p-0">
                            <div class="flex justify-between">
                                <h5 class="card-title p-md-2"><?php echo $plan['name']?></h5>
                                <p class="rounded-l-full bg-green-700 text-white pl-md-4 p-1">Active</p>
                            </div>
                            <p class="text-mono">Current Package Subscribed</p>
                        </div>
                        <ul class="list-group list-group-flush text-1xl">
                            <li class="list-group-item text-success"><i class="fa fa-product-hunt"></i>&nbsp;<?php echo $plan['plimit']; ?> Product
                                <span class="text-danger">Upload Limit</span>
                            </li>
                            <li class="list-group-item"><i class="fa fa-cloud"></i>&nbsp;<?php echo $plan['duration']; ?> Days Limit</li>
                            <li class="list-group-item"><i class="fa fa-mortar-board"></i>&nbsp;30 Days <span class="text-danger">Left</span></li>
                        </ul>
                        <div class="row p-md-1 p-2">
                            <div class="col-12 col-md-5 m-auto bg-orange-600 rounded">
                                <a href="#plans" class="m-1 btn btn-block text-white">Change</a>
                            </div>
                            <div class="col-12 col-md-5 m-auto bg-green-600 rounded">
                                <a href="?plan_id=<?php echo $plan['id']; ?>" class="m-1 btn btn-block text-white">Renew Plan</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mx-auto col-12 p-2">
                    <h3 class="bg-dark text-white rounded-full border-white border col-12 blockquote-footer">Other Packages</h3>
                    <div class="row">
                        <div class="col-md-5 col-12">
                            <div class="list-group" id="list-tab" role="tablist">
                                <?php
                                    $plan_groups = selectAll('plans', ['pgroup' => $plan['pgroup']]);
                                    #dd($plan_groups);
                                    $x = 0;
                                    foreach ($plan_groups as $key => $plan):?>
                                <?php 
                                    if ($x === 0) {
                                        $x++;
                                        $act = 'active';
                                    }else{
                                        $x++;
                                        $act = '';
                                    }
                                ?>
                                    <a class="list-group-item p-2 list-group-item-action <?php echo $act; ?>" id="list-<?php echo $x; ?>-list" data-toggle="list" href="#list-<?php echo $x; ?>" role="tab" aria-controls="<?php echo $x; ?>"><?php echo $plan['name']; ?></a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="col-md-7 col-12 text-dark mt-md-0 mt-2">
                            <div class="tab-content" id="nav-tabContent">
                            <?php
                            $plan_groups = selectAll('plans', ['pgroup' => $plan['pgroup']]);
                            #dd($plan_groups);
                            $x = 0;
                            foreach ($plan_groups as $key => $plan):?>
                            <?php
                                if($x === 0){
                                    $x++;
                                    $t_pane = 'active show';
                                    $t_id = 'list-' . $x;
                                    $t_aria = $t_id . '-list';
                                }else {
                                    $x++;
                                    $t_pane = '';
                                    $t_id = 'list-' . $x;
                                    $t_aria = $t_id . '-list';
                                }
                            ?>
                                <div class="tab-pane fade <?php echo $t_pane; ?>" id="<?php echo $t_id; ?>" role="tabpanel" aria-labelledby="<?php echo $t_aria; ?>">
                                    <div class="card p-2">
                                        <div class="card-body flex justify-between"><?php echo $plan['icon']; ?></i>
                                            <h5 class="card-title my-auto"><?php echo $plan['name']; ?></h5>
                                        </div>
                                        <ul class="list-group list-group-flush text-1xl">
                                            <li class="list-group-item text-success"><i class="fa fa-product-hunt"></i>&nbsp;<?php echo $plan['plimit']; ?> Product
                                                <span class="text-danger">Upload Limit</span>
                                            </li>
                                            <li class="list-group-item"><i class="fa fa-mortar-board"></i>&nbsp;<?php echo $plan['exduration']; ?> Days Extra</li>
                                            <li class="list-group-item"><i class="fa fa-cloud"></i>&nbsp;<?php echo $plan['duration']; ?> Days Limit</li>
                                            <li class="list-group-item"><i class="fa fa-money"></i>&nbsp;NGN <?php echo $plan['price']; ?></li>
                                        </ul>
                                        <div class=" bg-green-600 rounded-full mt-1">
                                            <a href="?plan_id=<?php echo $plan['id']; ?>" class="card-link btn btn-block text-white">Switch</a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!-- Other Plans -->
        <div class="row bg-light mt-2 p-md-3 p-1 oplans" id="plans">
            <div class="col-12 text-center mt-3 wow zoomInDown">
                <h4 class="bg-primary p-2 col-md-3 col-8 text-white rounded-full mx-auto">Plans</h4>
            </div>
            <div class="col-md-9 col-12 mx-auto bg-green-100 p-3">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs nav-justified nav-pills wow fadeInDown border-dark rounded border p-1" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="one-month-tab" data-toggle="tab" href="#one-month" role="tab" aria-controls="one-month" aria-selected="true">1 Month Plans(LITE)</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="three-months-tab" data-toggle="tab" href="#three-months" role="tab" aria-controls="three-months" aria-selected="false">3 Months Plan(GOLD)</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="six-months-tab" data-toggle="tab" href="#six-months" role="tab" aria-controls="six-months" aria-selected="false">6 Months Plan(DIAMOND)</a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="one-month" role="tabpanel" aria-labelledby="one-month-tab">
                        <?php $acc_id = 'LITE';?>
                            <div class="accordion mt-2 mx-auto col-md-9 col-12" id="<?php echo $acc_id; ?>">
                            <?php 
                                $x = 0;
                                $plans = selectAll('plans', ['duration' => 30]);
                                foreach($plans as $key => $plan):
                                ?><?php
                                if ($x === 0) {
                                    $show = 'show';
                                    $x++;
                                }else{
                                    $show = '';
                                    $x++;
                                }
                            ?>
                            <div class="panel panel-primary">
                                <div class="panel-header bg-primary" id="heading<?php echo $x;?>">
                                    <h2 class="mb-0">
                                        <button class="btn text-white btn-block text-left text-2xl" type="button" data-toggle="collapse" data-target="#collapse<?php echo $x;?>" aria-expanded="true" aria-controls="collapse<?php echo $x;?>">
                                    <i class="fa fa-plus"></i> <?php echo $plan['name']; ?>
                                  </button>
                                    </h2>
                                </div>
                                <div id="collapse<?php echo $x;?>" class="collapse <?php echo $show; ?> border-success border rounded" aria-labelledby="heading<?php echo $x;?>" data-parent="#<?php echo $acc_id; ?>">
                                    <div class="panel-body p-2">
                                        <ul class="list-group list-group-flush text-leading-2">
                                            <li class="list-group-item text-success"><i class="fa fa-product-hunt"></i>&nbsp;<?php echo $plan['plimit']; ?> Product
                                                <span class="text-danger">Upload Limit</span>
                                            </li>
                                            <li class="list-group-item"><i class="fa fa-mortar-board"></i><?php echo $plan['exduration']; ?> Days Extra</li>
                                            <li class="list-group-item"><i class="fa fa-cloud"></i>&nbsp;<?php echo $plan['duration']; ?> Days Time Limit</li>
                                            <li class="list-group-item"><i class="fa fa-money"></i>&nbsp;NGN <?php echo $plan['price']; ?></li>
                                        </ul>
                                        <div class="col-10 col-md-4 mx-auto mt-1">
                                            <a href="?plan_id=<?php echo $plan['id']; ?>" class="btn btn-success btn-block"><i class="fa fa-check-circle"></i>&nbsp;Subscribe</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="three-months" role="tabpanel" aria-labelledby="three-months-tab">
                        <?php $acc_id = 'GOLD';?>
                            <div class="accordion mt-2 mx-auto col-md-8 col-12" id="<?php echo $acc_id; ?>">
                            <?php 
                            $x = 0;
                            $plans = selectAll('plans', ['duration' => 90]);
                            foreach($plans as $key => $plan):
                            ?><?php
                            if ($x === 0) {
                                $show = 'show';
                                $x++;
                            }else{
                                $show = '';
                                $x++;
                            }
                            ?>
                                <div class="panel panel-primary ">
                                    <div class="panel-header bg-primary" id="heading<?php echo $x;?>">
                                        <h2 class="mb-0">
                                            <button class="btn text-white btn-block text-left text-2xl" type="button" data-toggle="collapse" data-target="#collapse<?php echo $x;?>" aria-expanded="true" aria-controls="collapse<?php echo $x;?>">
                                        <i class="fa fa-plus"></i> <?php echo $plan['name']; ?>
                                    </button>
                                        </h2>
                                    </div>
                                    <div id="collapse<?php echo $x;?>" class="collapse <?php echo $show; ?>" aria-labelledby="heading<?php echo $x;?>" data-parent="#<?php echo $acc_id; ?>">
                                        <div class="panel-body mb-2">
                                            <ul class="list-group list-group-flush text-1xl">
                                                <li class="list-group-item text-success"><i class="fa fa-product-hunt"></i>&nbsp;<?php echo $plan['plimit']; ?> Product
                                                    <span class="text-danger">Upload Limit</span>
                                                </li>
                                                <li class="list-group-item"><i class="fa fa-mortar-board"></i><?php echo $plan['exduration']; ?> Days Extra</li>
                                                <li class="list-group-item"><i class="fa fa-cloud"></i>&nbsp;<?php echo $plan['duration']; ?> Days Time Limit</li>
                                                <li class="list-group-item"><i class="fa fa-money"></i>&nbsp;NGN <?php echo $plan['price']; ?></li>
                                            </ul>
                                            <div class="col-12 col-md-5 mx-auto p-2">
                                                <a href="?plan_id=<?php echo $plan['id']; ?>" class="btn btn-success btn-block"><i class="fa fa-check-circle"></i>&nbsp;Subscribe</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php endforeach; ?>
                            </div>
                    </div>
                    <div class="tab-pane fade" id="six-months" role="tabpanel" aria-labelledby="six-months-tab">
                        <?php $acc_id = 'DIAMOND';?>
                            <div class="accordion mt-2 mx-auto col-md-8 col-12" id="<?php echo $acc_id; ?>">
                            <?php 
                            $x = 0;
                            $plans = selectAll('plans', ['duration' => 180]);
                            foreach($plans as $key => $plan):
                            ?><?php
                            if ($x === 0) {
                                $show = 'show';
                                $x++;
                            }else{
                                $show = '';
                                $x++;
                            }
                            ?>
                                <div class="panel panel-primary ">
                                    <div class="panel-header bg-primary" id="heading<?php echo $x;?>">
                                        <h2 class="mb-0">
                                            <button class="btn text-white btn-block text-left text-2xl" type="button" data-toggle="collapse" data-target="#collapse<?php echo $x;?>" aria-expanded="true" aria-controls="collapse<?php echo $x;?>">
                                        <i class="fa fa-plus"></i> <?php echo $plan['name']; ?>
                                    </button>
                                        </h2>
                                    </div>
                                    <div id="collapse<?php echo $x;?>" class="collapse <?php echo $show; ?>" aria-labelledby="heading<?php echo $x;?>" data-parent="#<?php echo $acc_id; ?>">
                                        <div class="panel-body mb-2">
                                            <ul class="list-group list-group-flush text-1xl">
                                                <li class="list-group-item text-success"><i class="fa fa-product-hunt"></i>&nbsp;<?php echo $plan['plimit']; ?> Product
                                                    <span class="text-danger">Upload Limit</span>
                                                </li>
                                                <li class="list-group-item"><i class="fa fa-mortar-board"></i><?php echo $plan['exduration']; ?> Days Extra</li>
                                                <li class="list-group-item"><i class="fa fa-cloud"></i>&nbsp;<?php echo $plan['duration']; ?> Days Time Limit</li>
                                                <li class="list-group-item"><i class="fa fa-money"></i>&nbsp;NGN <?php echo $plan['price']; ?></li>
                                            </ul>
                                            <div class="col-12 col-md-5 mx-auto p-2">
                                                <a href="?plan_id=<?php echo $plan['id']; ?>" class="btn btn-success btn-block"><i class="fa fa-check-circle"></i>&nbsp;Subscribe</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php endforeach; ?>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        <div class="row bg-black text-center text-white p-2 footer">
            <div class="col-12 p-1"><i class="fa fa-home"></i>&nbsp;Designed by Ekwueme Ugochukwu</div>
        </div>
    </div>

    <?php include(ROOT_PATH . '/app/includes/links-b.php'); ?>
</body>

</html>