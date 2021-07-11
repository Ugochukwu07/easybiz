
<footer class="row bg-green-700 text-dark clients">
    <div class="container-fluid">
        <div class="row p-2">
        <div class="col-12 flex p-2 footer-bag">
                <img src="<?php echo BASE_URL . '/assets/images/LogoMakr_3aGKEM.png'; ?>" alt="" class="img-fluid mx-auto">
                <img src="<?php echo BASE_URL . '/assets/images/americanexpress.png'; ?>" alt="" class="img-fluid mx-auto">
                <img src="<?php echo BASE_URL . '/assets/images/visacard.png'; ?>" alt="" class="img-fluid mx-auto">
                <img src="<?php echo BASE_URL . '/assets/images/mastercard.png'; ?>" alt="" class="img-fluid mx-auto">
            </div>
            <div class="col-md-3 col-sm-2 col-12 footer-bag text-white">
                <a href="<?php echo BASE_URL . '/users/store/index.php?id=' . $_GET['id']; ?>">
                    <h2 class="position-relative">Store</h2>
                </a>
                <ul>
                    <li class=""><a href="#"><i class="fa fa-mail-forward"></i>&nbsp;Contact</a></li>
                    <li class=""><a href="<?php echo BASE_URL . '/users/access'; ?>"><i class="fa fa-user"></i>&nbsp;Login</a></li>
                    <li class=""><a href="<?php echo $store['bfblink']; ?>"><i class="fa fa-facebook-official"></i>&nbsp;FaceBook</a></li>
                    <li class=""><a href="<?php echo $store['binstalink']; ?>"><i class="fa fa-instagram"></i>&nbsp;Instagram</a></li>
                </ul>
            </div>
            <div class="col-md-3 col-sm-4 col-12 footer-bag text-white">
            <div class="border border-white rounded p-1 mb-2">
                <span class="underline">Store Address</span><br>
                <p><?php echo $store['baddress']; ?></p>
                </div>
            <div class="border border-white rounded p-1">
                <span class="underline">Owner Address</span><br>
                <p><?php echo $user['paddress']; ?></p>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-12 footer-bag">
                        <a href="#">
                            <h2>Other Services</h2>
                        </a>
                        <ul>
                            <li><a href="#"><i class="fa fa-desktop" aria-hidden="true"></i>&nbsp;Web Desgin</a></li>
                            <li><a href="#"><i class="fa fa-modx"></i>&nbsp;Graphics Design</a></li>
                            <li><a href="#"><i class="fa fa-android"></i>&nbsp;Andriod Apps</a></li>
                            <li><a href="#"><i class="fa fa-bar-chart"></i>&nbsp;Forex Trading</a></li>
                        </ul>
            </div>
            <div class="col-12 col-md-3 footer-bag p-2">
                        <a href="#">
                            <h2>Service Boosting</h2>
                        </a>
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook-f" aria-hidden="true"></i>&nbsp;Facebook Ads</a></li>
                            <li><a href="#"><i class="fa fa-youtube-play"></i>&nbsp;YouTube In-Stream Ads</a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i>&nbsp;Instagram Ads</a></li>
                            <li><a href="#"><i class="fa fa-google"></i>&nbsp;Google Ads</a></li>
                        </ul>
            </div>
            <div class="col-md-6 col-12 mx-auto text-center">
                        <span class="text-white d-block">This store is hosted by easibiz.com. Easibiz is an online store hosting platform, that host peoples products and services only. Click the link below for more information</span>
                        <a href="<?php echo BASE_URL . '/.'; ?>" class="btn btn-dark col-md-5 col-12">Easibiz</a>
            </div>
                </div>
                <div class="row bg-black text-center text-white p-2">
                    <div class="col-12 p-1"><i class="fa fa-home"></i>&nbsp;Designed by Ekwueme Ugochukwu</div>
                </div>
            </div>
</footer>