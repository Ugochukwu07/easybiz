<div class="row product-slider text-center p-2">
    <div class="col-12">
        <h2 class="mb-3 text-primary title">Trending Products</h2>
    </div>
    <div class="owl-carousel owl-theme">
        <?php foreach($products as $key => $product):?>
            <div class="item m-1 rounded">
                <div class="product bg-white pb-1">
                    <img src="<?php echo BASE_URL . '/users/assets/products/' . $product['image1']; ?>" alt="<?php echo $product['name']; ?>" class="img-fluid rounded-t">
                    <div class="text-box">
                        <a href="<?php echo BASE_URL . '/users/store/single/' . $product['id'] . '/'. $_GET['id']; ?>" class="text-green-800">
                            <h6 class="tracking-wider leading-loose"><?php echo ucwords($product['name']); ?></h6>
                        </a>
                        <ul class="list-inline" style="font-size: .8rem;">
                            <li class="list-inline-item text-danger border border-danger p-1"><del><i class="fa fa-money"></i> &nbsp;<?php echo $store['currency'] . ' ' . $product['price_old']; ?></del></li>
                            <li class="list-inline-item text-success border border-success p-1"><i class="fa fa-money"></i> &nbsp;<?php echo $store['currency'] . ' ' . $product['price_new']; ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>