<?php 
include('../../path.php');
include(ROOT_PATH . '/app/database/db.php');
include(ROOT_PATH . '/app/helpers/mail.php');

if (isset($_GET['id']) && isset($_GET['product'])) {
    $store = selectOne('stores', ['id' => $_GET['id'], 'status' => 1]);
    if (empty($store)) {
        header('location: ' . BASE_URL . '/users/store/expired.php');
        exit();
    }

    $product = selectOne('products', ['id' => $_GET['product'], 'store_id' => $_GET['id']]);
    if (empty($product)) {
        header('location:' . BASE_URL . '/404.php');
        exit();
    }
    $products = selectAll('products', ['store_id' => $_GET['id']]);
    $user = selectOne('users', ['store_id' => $_GET['id']]);
    $title = $store['bname'];
}
#dd($products);
$text = 'Hello ' . $store['bname'] . '. ' . 'I saw your online store at eazybiz.com and am interested in one of your product.' . ' ############################# # Product Id: ' . $product['id'] . 
        '# Product name: ' . $product['name'] . ' 
        # Old Price: ' . $product['price_old'] . ' 
        # New Price: ' . $product['price_new'] . ' 
        # 
        # My name is ___________.';
$url = whatsapp($store['bphone'], $text);
$text2 = 'Hello my name is_______';
$url2 = whatsapp($store['bphone'], $text2);
?>
<!DOCTYPE html>
<html lang="en">

<?php include(ROOT_PATH . '/app/includes/links.php'); ?>

<body>
    <?php include(ROOT_PATH . '/app/includes/header-users-index.php'); ?>
    <div class="container-fluid bg-blue-100">
        <div class="container wow fadeInDown">
            <div class="row product-main p-md-3 bg-white rounded">
                <div class="col-12 col-md-5 p-2">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active wow fadeInLeft" id="first" role="tabpanel" aria-labelledby="first-tab" data-wow-duration="3s">
                            <img src="<?php echo BASE_URL . '/users/assets/products/' . $product['image1']; ?>" alt="" class="img-fluid img-thumbnail mx-auto">
                        </div>
                        <div class="tab-pane fade wow fadeInLeft" id="secound" role="tabpanel" aria-labelledby="secound-tab" data-wow-duration="3s">
                            <img src="<?php echo BASE_URL . '/users/assets/products/' . $product['image2']; ?>" alt="" class="img-fluid img-thumbnail mx-auto">
                        </div>
                        <div class="tab-pane fade wow fadeInLeft" id="third" role="tabpanel" aria-labelledby="third-tab" data-wow-duration="3s">
                            <img src="<?php echo BASE_URL . '/users/assets/products/' . $product['image3']; ?>" alt="" class="img-fluid img-thumbnail mx-auto">
                        </div>
                        <div class="tab-pane fade wow fadeInLeft" id="fourth" role="tabpanel" aria-labelledby="fourth-tab" data-wow-duration="3s">
                            <img src="<?php echo BASE_URL . '/users/assets/products/' . $product['image4']; ?>" alt="" class="img-fluid img-thumbnail mx-auto">
                        </div>
                    </div>
                    <ul class="nav mx-auto rounded p-1 col-12 text-center" id="myTab" role="tablist">
                        <li class="nav-item col-md-3 col-3" role="presentation">
                            <a class="nav-link active" id="first-tab" data-toggle="tab" href="#first" role="tab" aria-controls="first" aria-selected="true">
                                <img src="<?php echo BASE_URL . '/users/assets/products/' . $product['image1']; ?>" alt="" class="img-fluid">
                            </a>
                        </li>
                        <li class="nav-item col-md-3 col-3" role="presentation">
                            <a class="nav-link" id="secound-tab" data-toggle="tab" href="#secound" role="tab" aria-controls="secound" aria-selected="false">
                                <img src="<?php echo BASE_URL . '/users/assets/products/' . $product['image2']; ?>" alt="" class="img-fluid">
                            </a>
                        </li>
                        <li class="nav-item col-md-3 col-3" role="presentation">
                            <a class="nav-link" id="third-tab" data-toggle="tab" href="#third" role="tab" aria-controls="third" aria-selected="true">
                                <img src="<?php echo BASE_URL . '/users/assets/products/' . $product['image3']; ?>" alt="" class="img-fluid">
                            </a>
                        </li>
                        <li class="nav-item col-md-3 col-3" role="presentation">
                            <a class="nav-link" id="fourth-tab" data-toggle="tab" href="#fourth" role="tab" aria-controls="fourth" aria-selected="false">
                                <img src="<?php echo BASE_URL . '/users/assets/products/' . $product['image4']; ?>" alt="" class="img-fluid">
                            </a>
                        </li>
                    </ul>
                    <hr>
                        <?php if($product['status']):?>
                    <div class="col-6 mx-auto bg-green-600 text-center p-1 text-white rounded">
                        <h6 class="my-auto"><i class="fa fa-check"></i>&nbsp;Available</h6>
                    </div>
                        <?php else: ?>
                    <div class="col-6 mx-auto bg-red-600 text-center p-1 text-white rounded">
                        <h6 class="my-auto"><i class="fa fa-times"></i>&nbsp;Unavailable</h6>
                    </div>
                        <?php endif; ?>
                        <?php include(ROOT_PATH . '/app/includes/price.php'); ?>
                        <a href="<?php echo $url; ?>" class="btn btn-success btn-block mt-5" style="animation: bounce 1s infinite">Buy Now</a>

                </div>
                <div class="col-12 col-md-7 p-md-2 my-auto text-md-left p-2">
                    <div class="col-12 text-black text-center">
                        <h4 class="title tracking-wider"><?php echo $product['name']; ?></h4>
                    </div>
                    <hr>
                   <?php include(ROOT_PATH . '/app/includes/price.php'); ?>
                    <div class="col-md-10 col-12 mx-auto" style="box-shadow: 2px 3px 4px silver;">
                        <?php echo $product['about']; ?>
                    </div>
                    <div class="col-12 col-md-4 mb-2 mx-auto p-2">
                    
                        <a href="<?php echo $url; ?>" class="btn btn-success btn-block" style="animation: bounce 1s infinite">Buy Now</a>
                    </div>
                </div>
            </div>
            <?php include(ROOT_PATH . '/app/includes/product-slider.php'); ?>
        </div>
        <!-- Owner -->
        <div class="row owner-info p-md-5 p-1 bg-dark text-white" id="about-me">
            <div class="wow fadeInLeft col-12 col-md-7 my-auto">
                <h4 class="text-white bg-primary d-inline-block px-4 rounded"><?php echo $user['firstname'] . ' ' . $user['lastname']; ?></h4>
                <span class="blockquote-footer text-white">Owner <cite><?php echo $store['bname']; ?></cite></span>
                <hr class="bg-white">
                <p><?php echo $user['about']; ?></p>
            </div>
            <div class="col-12 col-md-5 my-auto wow fadeInRight">
                <img src="<?php echo BASE_URL . '/users/assets/images/' . $user['image']; ?>" alt="<?php echo $user['firstname'] . ' ' . $user['lastname']; ?>" class="img-fluid pull-left m-2 img-thumbnail">
            </div>
            <div class="col-12 text-center">
                <a href="<?php echo $url2; ?>" class="btn btn-info col-md-4 col-12 wow fadeInDown" data-wow-duration="2s">Contact</a></div>
        </div>
        <?php include(ROOT_PATH . '/app/includes/footer-users-index.php'); ?>
    </div>
   <?php include(ROOT_PATH . '/app/includes/links-b.php'); ?>
</body>

</html>