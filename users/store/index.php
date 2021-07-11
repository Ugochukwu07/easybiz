<?php 
#include('../../path.php');
#include(ROOT_PATH . '/app/database/db.php');
#include(ROOT_PATH . '/app/helpers/middleware.php');
include(ROOT_PATH . '/app/helpers/paging.php');
#include(ROOT_PATH . '/app/helpers/mail.php');

if (isset($_GET['id'])) {
    expiredStore();
    $store = selectOne('stores', ['id' => $_GET['id']]);
    $title = $store['bname'];
    $page = 'single';
    $categories = selectAll('category', ['store_id' => $_GET['id']]);
    $user = selectOne('users', ['store_id' => $_GET['id']]);
    if (empty($store['baddress2'])) {
       $store['address2'] = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.1517614336967!2d7.119684314265893!3d6.243721728085937!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x104378edb8d8e37d%3A0x9f32c5103b825233!2sNnamdi%20Azikiwe%20University!5e0!3m2!1sen!2sng!4v1598825666748!5m2!1sen!2sng';
    }
    $totalPages = count(selectAll('products', ['store_id' => $_GET['id']])) / $results_per_page;
    $products = selectAllLimit('products', ['store_id' => $_GET['id']], $start, $results_per_page);

    
    $text2 = 'Hello my name is_______';
    $url2 = whatsapp($store['bphone'], $text2);
}else {
    header('location: ' . BASE_URL . '/.');
    exit();
}
#dd($products);
?>
<!DOCTYPE html>
<html lang="en">
<?php include(ROOT_PATH . '/app/includes/links.php'); ?>

<body>
<?php include(ROOT_PATH . '/app/includes/header-users-index.php'); ?>
    <div class="container-fluid">
        <div class="row intro_client mb-1 wow fadeInDown text-white" style="min-height: 100vh;">
            <div class="col-12 col-md-8 col-sm-10 mx-auto mt-4 text-center">
                <h1 class="welcome mt-5"><span class="type"></span></h1>
            </div>
            <div class="col-12 col-md-5 mx-auto text-center wow backInDown button-pad">
                <span class="p-3 border border-white text-2xl pl-5 pr-5">Thank You</span>
            </div>
        </div>
        <div class="container wow fadeInDown">
            <?php include(ROOT_PATH . '/app/includes/product-slider.php'); ?>
        </div>
        <!-- Search Box -->
        <div class="row search-box p-4 bg-dark text-white">
            <div class="col-12 col-md-6 my-auto p-md-5 p-1 text-center">
                <h2 class="text-capitalize">Serach for your favorite products below</h2>
                <form method="GET" class="">
                    <div class="form-group">
                        <input type="text" class="form-control wow fadeInDown" id="product-tag" name="product-tag">
                    </div>
                    <input type="submit" class="btn col-6 btn-primary wow slideInLeft">
                </form>
            </div>
            <div class="col-12 col-md-6 my-auto">
                <img src="<?php echo BASE_URL . '/assets/images/startup-594090_1920.jpg'; ?>" alt="" class="img-fluid img-thumbnail rounded wow fadeInDown">
            </div>
        </div>
        <!-- Products -->
        <div class="container">
            <div class="row products-main p-md-3 p-1">
                <div class="col-12 mb-2">
                    <h3 class="title">Recent Products</h3>
                </div>
                <?php foreach($products as $key => $product):?>
                <div class="col-md-3 col-sm-4 col-12 product wow fadeInDown" style="font-size: .9rem;">
                    <div class="bg-green-900 text-white rounded" style="width: 100%;">
                        <img src="<?php echo BASE_URL . '/users/assets/products/' . $product['image1']; ?>" alt="<?php echo $product['name']; ?>" class="img-fluid card-img-top">
                        <div class="p-2">
                            <h6 class="tracking-wider leading-loose"><?php echo $product['name']; ?></h6>
                            <p class="card-text"><?php echo substr($product['about'], 0, 130) . '...';?></p>
                            <ul class="list-inline text-center">
                            <li class="list-inline-item text-red-500 bg-white border border-danger p-1"><del><i class="fa fa-money"></i> &nbsp;<?php echo $store['currency'] . ' ' . $product['price_old']; ?></del></li>
                            <li class="list-inline-item text-green-600 bg-white border border-success p-1"><i class="fa fa-money"></i> &nbsp;<?php echo $store['currency'] . ' ' . $product['price_new']; ?></li>
                            </ul>
                            <div class="flex justify-content-between">
                                <?php require(ROOT_PATH . '/app/includes/whatsapp.php'); ?>
                                <a href="<?php echo $url; ?>" class="btn bg-white btn-outline-primary">Buy Now</a>
                                <a href="<?php echo BASE_URL . '/users/store/single.php?product=' . $product['id'] . '&id='. $_GET['id']; ?>" class="btn btn-outline-success bg-white">More Info</a></div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                <?php include(ROOT_PATH . '/app/includes/paging.php'); ?>
            </div>
        </div>
        <div class="row categories bg-gray-900 text-white text-md-left p-3 p-md-0" id="cat">
            <div class="col-12 col-md-4 my-auto p-3 text-center">
                <h2 class="title text-4xl wow fadeInDown" data-wow-duration="4s">Categories</h2>
            </div>
            <div class="col-12 row mx-auto col-md-8 my-auto text-2xl wow fadeInDown" data-wow-duration="3s">
                <?php foreach($categories as $key => $category):?>
                    <div class="col-6 col-md-3"><i class="fa fa-check"></i>&nbsp;<a href="<?php echo BASE_URL . '/users/store/index.php?cate_id=' . $category['id'];?>" class="text-white"><?php echo $category['title']; ?></a></div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="row location bg-gray-200 p-3" id="location">
            <div class="col-12 text-center wow fadeInDown">
                <h3 class="title">Location</h3><br>
                <i class="fa fa-map-marker icon"></i>
            </div>
            <div class="col-md-8 col-12 map wow fadeInLeft">
                <iframe src="<?php echo $store['address2']; ?>"
                    width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
            <div class="col-md-4 bg-white col-12 map-about wow fadeInRight">
                <dl class="row p-2 rounded">
                    <dt class="col-sm-4 text-center text-sm-left">Brand Name</dt>
                    <dd class="col-sm-8 text-center text-sm-left"><?php echo $store['bname']; ?></dd>

                    <dt class="col-sm-4 text-center text-sm-left">Email</dt>
                    <dd class="col-sm-8 text-center text-sm-left"><?php echo $store['bemail']; ?></dd>

                    <dt class="col-sm-4 text-center text-sm-left">Owner</dt>
                    <dd class="col-sm-8 text-center text-sm-left"><?php echo $user['firstname'] . ' ' . $user['lastname']; ?></dd>

                    <dt class="col-sm-4 text-center text-sm-left">Phone</dt>
                    <dd class="col-sm-8 text-center text-sm-left">+<?php echo $store['bphone']; ?></dd>

                    <dt class="col-sm-4 text-center text-sm-left">UserID</dt>
                    <dd class="col-sm-8 text-center text-sm-left"><?php echo 'USDS' . $user['id']; ?></dd>
                </dl>
            </div>
        </div>
        <!-- Owner -->
        <div class="row owner-info p-md-5 p-1 bg-dark text-white" id="about-me">
            <div class="wow fadeInLeft col-12 col-md-7 my-auto">
                <h4 class="text-white bg-primary d-inline-block px-4 rounded"><?php echo $user['firstname'] . ' ' . $user['lastname']; ?></h4>
                <span class="blockquote-footer text-white">Owner <cite><?php echo $store['bname']; ?></cite></span>
                <hr class="bg-white">
                <?php echo $user['about']; ?>
            </div>
            <div class="col-12 col-md-5 my-auto wow fadeInRight">
                <img src="<?php echo BASE_URL . '/users/assets/images/' . $user['image']; ?>" alt="<?php echo $user['firstname'] . ' ' . $user['lastname']; ?>" class="img-fluid pull-left m-2 img-thumbnail">
            </div>
            <div class="col-12 text-center">
                <a href="<?php echo $url2; ?>" class="btn btn-info col-md-4 col-12 wow fadeInDown" data-wow-duration="2s">Contact</a></div>
        </div>
        <?php include(ROOT_PATH . '/app/includes/footer-users-index.php'); ?>
        <!-- Modal
                <div class="modal fade modal-md" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="productModalLabel">Lorem ipsum dolor sit amet</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h5 class="text-center">Lorem ipsum dolor sit amet.</h5>
                                <img src="https://assets.hongkiat.com/uploads/revolutionary-products/oculus-rift.jpg" alt="" class="img-fluid">
                                <ul class="list-inline text-uppercase">
                                    <li class="list-inline-item"><del><i class="fa fa-money"></i> &nbsp;ngn 5000</del></li>
                                    <li class="list-inline-item right"><i class="fa fa-money"></i> &nbsp;ngn 2000</li>
                                </ul>
                                <p class="text-dark">Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt fugit aperiam nulla magnam, expedita accusantium laborum adipisci soluta nisi maiores est deserunt eaque, non neque voluptatum laudantium saepe! Cum quia
                                    blanditiis nemo, a optio quaerat modi odio nam officiis eveniet asperiores obcaecati sint inventore consectetur labore placeat eum distinctio repellendus!</p>
                                <p class="text-dark">Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt fugit aperiam nulla magnam, expedita accusantium laborum adipisci soluta nisi maiores est deserunt eaque, non neque voluptatum laudantium saepe! Cum quia
                                    blanditiis nemo, a optio quaerat modi odio nam officiis eveniet asperiores obcaecati sint inventore consectetur labore placeat eum distinctio repellendus!</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <a href="https://api.whatsapp.com/send?phone=2348143440606&text=Hey,%20I%20just%20saw%20a%20product%20on%20your%20online%20store.%20Product%20id%20is%20PR09478" class="btn btn-primary">Buy Now</a>

                            </div>
                        </div>
                    </div>
                </div> -->
    </div>

<?php include(ROOT_PATH . '/app/includes/links-b.php'); ?>
    <script>
        var typed = new Typed(".type", {
            strings: ["<?php echo $store['bwelcom']; ?>"],
            typeSpeed: 140
        });
    </script>
</body>

</html>