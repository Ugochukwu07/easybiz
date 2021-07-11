<?php 
    include('../../../path.php');
    include(ROOT_PATH . '/app/controllers/products.php');
    include(ROOT_PATH . '/app/includes/message.php');
    usersOnly();
    if (empty($_SESSION['id'])) {
        header('location:' . BASE_URL . '/404.php');
        exit();
    }
    $title = 'Products';
    $page = "product";
    $title_main = 'All Products';

    if (isset($_POST['searchp'])) {
        $title_main = ucwords('you searched for ') . "'" . $_POST['searchp'] . "'";
        $products = search($_POST['searchp']);
        $totalPages = count($products)/$results_per_page;
    }else{
        $totalPages = count(selectAll('products', ['store_id' => $_SESSION['store_id']])) / $results_per_page;
        $products = selectAllLimit('products', ['store_id' => $_SESSION['store_id']], $start, $results_per_page);
    }
?>
<!DOCTYPE html>
<html lang="en">

<?php include(ROOT_PATH . '/app/includes/links.php'); ?>

<body>

<?php include(ROOT_PATH . '/app/includes/header-close.php'); ?>
    <div class="container-fluid">
        <div class="container">
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
                    <h5><?php echo $title_main; ?></h5>
                </div>
                <div class="col-12 pl-md-5 pr-md-5 p-0">
                    <table class="table table-striped rounded table-responsive table-bordered">
                        <thead>
                            <tr>
                                <th scope="">#</th>
                                <th scope="" class="">Name</th>
                                <th scope="" class="" colspan="">About</th>
                                <th scope="" colspan="">Catigory</th>
                                <th scope="" colspan="2">Price</th>
                                <th scope="" colspan="3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($products as $key => $product): ?>
                        <?php
                            if (empty($products['cat_id'])) {
                                $products['cat_id'] = 'Null';
                            }
                            $category = selectOne('category', ['id' => $product['cat_id']]); 
                        ?>
                            <tr>
                                <th scope="row"><?php echo $key + 1; ?></th>
                                <td><?php echo $product['name']; ?></td>
                                <td><?php echo $product['about']; ?></td>
                                <td><?php echo $category['title']; ?></td>
                                <td><?php echo $product['price_old']; ?></td>
                                <td><?php echo $product['price_new']; ?></td>
                                <td><a href="<?php echo BASE_URL . '/users/store/products/edit.php?id=' . $product['id']; ?>" class="text-success underline">Edit</a></td>
                                <td><a href="<?php echo '?del_id=' . $product['id']; ?>" class="text-danger underline">Delete</a></td>
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