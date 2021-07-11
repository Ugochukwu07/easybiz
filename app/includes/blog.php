
        <div class="row blog pl-md-5 pr-md-5 p-2" id="blog" style="overflow-x: hidden;">
            <?php
            $url = "http://newsapi.org/v2/everything?q=digital%20%marketing&from=2020-09-14&sortBy=publishedAt&apiKey=896ff0be567945939518e5b28ddae309";
            $list = file_get_contents($url);
            $json = json_decode($list, true);
            ?>
            <div class="col-12 text-center wow fadeInDown">
                <h3 class="title"><i class="fa fa-edit"></i>Blog</h3>
            </div>
            <div class="owl-carousel owl-theme blog-carousel wow fadeInDown bg-light rounded">
                <?php foreach ($json['articles'] as $obj): ?>
                    <div class="item p-3" style="height= 300px !important; overview: hidden;">
                        <div class="col-12">
                            <img src="<?php echo $obj['urlToImage']; ?>" alt="" class="img-fluid img-thumbnail" style="height: 250px;">
                        </div>
                        <div class="col-12 pt-2 pb-2">
                            <h5><a href="<?php echo $obj['url']; ?>" class="text-dark"><?php echo $obj['title']; ?></a></h5>
                        </div>
                        <ul class="list-group list-group-horizontal">
                            <li class="list-group-item flex-fill"><i class="fa fa-user"></i>&nbsp;<?php echo $obj['author'];?></li>
                            <li class="list-group-item flex-fill"><i class="fa fa-calendar"></i>&nbsp;<?php echo $obj['publishedAt'];?></li>
                        </ul>
                        <div class="col-12 bg-white p-2 mt-1">
                            <p><?php echo $obj['description'];?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>