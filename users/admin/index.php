<?php 
    include('../../path.php');
    include(ROOT_PATH . '/app/controllers/products.php');
    adminOnly();
    $title = $_SESSION['firstname'] . ' Dashboard';
    $totalProducts = count($products);

    if (isset($_POST['searchp'])) {
        $title_main = ucwords('you searched for ') . "'" . $_POST['searchp'] . "'";
        $products = search($_POST['searchp']);
        if (empty($products)) {
            $_SESSION['message'] = ucwords('sorry, no product by the title ') . "'<span class='underline'>" . $_POST['searchp'] . "'</span>";
            $_SESSION['type'] = 'error';
        }
        $totalPages = count($products)/$results_per_page;
    }else{
        $totalPages = count(selectAll('products', [])) / $results_per_page;
        $products = selectAllLimit('products', [], $start, $results_per_page);
    }

?>

<!DOCTYPE html>
<html lang="en">
<?php include(ROOT_PATH . '/app/includes/links.php'); ?>

<body>
<?php include(ROOT_PATH . '/app/includes/admin-header.php'); 
    include(ROOT_PATH . '/app/includes/message.php');?>
    <div class="container-fluid">
        <div class="container pt-3">
            <div class="row stat text-center bg-light p-3 pt-5 pb-5">
                <div class="col-12 col-md-3 wow fadeInDown">
                    <i class="fa fa-file-code-o icon"></i>
                    <h5 class="text-info ">Total Files Uploaded</h5>
                    <span><?php echo $totalProducts; ?></span>
                </div>
                <div class="col-12 col-md-3 wow fadeInDown">
                    <i class="fa fa-user icon"></i>
                    <h5 class="text-info ">Total Users</h5>
                    <span><?php echo count(selectAll('users', ['admin' => 0])); ?></span>
                </div>
                <div class="col-12 col-md-3 wow fadeInDown">
                    <i class="fa fa-user-secret icon"></i>
                    <h5 class="text-info ">Inactive Stores</h5>
                    <span><?php echo count(selectAll('stores', ['status' => 0])); ?></span>
                </div>
                <div class="col-12 col-md-3 wow fadeInDown">
                    <i class="fa fa-money icon"></i>
                    <h5 class="text-info ">Total Revenue</h5>
                    <span>NGN 2876197</span>
                </div>
            </div>
            <div class="row">
            
            <div class="col-12 mt-2 mb-3">
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="bg-dark p-3 rounded mb-2">
                        <h5 class="text-green-300">Search Products</h5>
                        <div class="form-group">
                            <label for="search" class="text-2xl text-white">Search</label>
                            <input type="text" name="searchp" id="searchp" class="form-control" placeholder="Search...">
                        </div>
                    </form>
                </div>
                <div class="col-12 text-center mb-2">
                    <h5>All Products</h5>
                </div>
                <div class="col-12 pl-md-5 pr-md-5 p-0">
                    <table class="table table-striped rounded table-responsive table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col" colspan="">Description</th>
                                <th scope="col">Store</th>
                                <th scope="col" colspan="">Price</th>
                                <th scope="col" colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($products as $key => $product): ?>
                        <?php $store = selectOne('stores', ['id' => $product['store_id']]); ?>
                            <tr>
                                <th scope="row"><?php echo $key + 1; ?></th>
                                <td><?php echo $product['name']; ?></td>
                                <td><?php echo $product['about']; ?></td>
                                <td><?php echo $store['bname']; ?></td>
                                <td><?php echo $store['currency'] . ' ' . $product['price_new']; ?></td>
                                <td><a href="?del_id=<?php echo $product['id']; ?>" class="text-danger">Delete</a></td>
                                <?php if ($product['status']): ?>
                                    <td><a href="?status=0&p_id=<?php echo $product['id']; ?>" class="text-info underline">Unpublish</a></td>
                                <?php else: ?>
                                    <td><a href="?status=1&p_id=<?php echo $product['id']; ?>" class="text-primary underline">Publish</a></td>
                                <?php endif;?>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <?php include(ROOT_PATH . '/app/includes/paging.php'); ?>
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