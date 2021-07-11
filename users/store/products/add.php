<?php 
    include('../../../path.php');
    include(ROOT_PATH . '/app/controllers/products.php');
    include(ROOT_PATH . '/app/includes/errors.php');
    usersOnly();
    $title = 'Add Products';
    $page = "product";
    $categories = selectAll('category', ['store_id' => $_SESSION['store_id']]);
    #dd($categories);
    if (empty($categories)) {
        $link = BASE_URL . '/users/store/products/catigories/add.php';
        $_SESSION['message'] = 'Create a Category First' . '<br><br><a class="px-5 py-1 text-white col-6 bg-success rounded" href="'. $link .'">Add<a/>';
        $_SESSION['type'] = 'error';
    }
    include(ROOT_PATH . '/app/includes/message.php');
?>
<!DOCTYPE html>
<html lang="en">

<?php include(ROOT_PATH . '/app/includes/links.php'); ?>

<body>
    <?php include(ROOT_PATH . '/app/includes/header-close.php');?>
    <!-- Pricing Modal -->
    <div class="modal clearfix" tabindex="-1" role="dialog" id="pricingModal" aria-labelledby="pricingModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Plans</h5>
                    <button type="button" class="bg-danger btn text-white" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="pricing">Select Plan</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                                  <option></option>
                                  <option>Starter</option>
                                  <option>Gold</option>
                                  <option>Lite</option>
                                  <option>Diamond</option>
                                  <option>PRO</option>
                                </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Change" class="btn btn-success">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary text-left">Re-New Current Plan</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row p-md-2">
            <div class="col-12 text-center">
                <h4 class="">Add Product</h4>
                <span class="text-danger">Important*</span>
            </div>
            <form class="col-md-9 col-12 mx-auto bg-light p-md-3 rounded" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
                <div class="row p-2">
                    <div class="form-group col-md-6 col-12 border p-1 rounded mb-1">
                        <label for="image1" class="h5">Product Image 1<span class="text-danger">*</span></label>
                        <input type="file" class="form-control" id="image1" name="image1">
                    </div>
                    <div class="form-group col-md-6 col-12 border p-1 rounded mb-1">
                        <label for="image2" class="h5">Product Image 2<span class="text-danger">*</span></label>
                        <input type="file" class="form-control" id="image2" name="image2">
                    </div>
                    <div class="form-group col-md-6 col-12 border p-1 rounded">
                        <label for="image3" class="h5">Product Image 3<span class="text-danger">*</span></label>
                        <input type="file" class="form-control" id="image3" name="image3">
                    </div>
                    <div class="form-group col-md-6 col-12 border p-1 rounded">
                        <label for="image4" class="h5">Product Image 4<span class="text-danger">*</span></label>
                        <input type="file" class="form-control" id="image4" name="image4">
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="h5">Name<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Jeans" value="<?php echo $name?>">
                </div>
                <div class="row">
                    <div class="form-group col-6">
                        <label for="price_old" class="h5">Old Price<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="price_old" name="price_old" value="<?php echo $old_price?>">
                        <small>eg. <del>5000</del></small>
                    </div>
                    <div class="form-group col-6">
                        <label for="price_new" class="h5">New Price<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="price_new" name="price_new" value="<?php echo $new_price?>">
                        <small>eg. 7000</small>
                    </div>
                </div>
                <div class="form-group">
                    <label for="cat" class="h5">Catigories<span class="text-danger">*</span></label>
                    <select name="cat" id="cat" class="form-control">
                        <option value=""></option>
                        <?php foreach ($categories as $key => $category):?>
                            <option value="<?php echo $category['id']?>"><?php echo $category['title']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <small>Select Cartigories</small>
                </div>
                <div class="form-group">
                    <label for="about" class="h5">Product Describtion<span class="text-danger">*</span></label>
                    <textarea name="about" id="about" cols="30" rows="5" class="form-control"><?php echo $about?></textarea>
                    <small>Write and expanded desicrbtion of the product</small>
                </div>
                <div class="form-group">
                    <input type="checkbox" name="ava" id="ava">
                    <label for="ava">Avaliable</label>
                    <small>(Mark if product is avaliable)</small>
                </div>
                <div class="flex justify-between">
                    <div class="form-group" style="width: 35%;">
                        <input type="submit" value="Add" class="btn btn-block btn-primary" id="create-product" name="create-product">
                    </div>
                    <div class="form-group" style="width: 35%;">
                        <button type="reset" class="btn btn-danger btn-block">Clear</button>
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