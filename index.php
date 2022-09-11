<?php require('top.php');
require_once("functions.inc.php");
$userdata = check_login($con);
?>
<div class="body__overlay"></div>
        
        <!-- Start Slider Area -->
        <!-- Start Category Area -->
        <section class="htc__category__area ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section__title--2 text-center">
                            <h2 class="title__line">LATEST Products Here</h2>
                        </div>
                    </div>
                </div>
                <div class="htc__product__container">
                    <div class="row">
                        <div class="product__list clearfix mt--30">
							<?php
							$get_product=get_product($con,4);
							foreach($get_product as $list){
							?>
                            <!-- Start Single Category -->
                            <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                                <div class="category">
                                    <div class="ht__cat__thumb">
                                        <a href="product.php?id=<?php echo $list['id']?>">
                                            <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image']?>" alt="product images" width="10px">
                                        </a>
                                    </div>
                                    
                                    <div class="fr__product__inner">
                                        <a href="product.php?id=<?php echo $list['id']?>">
                                        <h4><?php echo $list['name']?></h4>
                                        </a>

                                        <ul class="fr__pro__prize">
                                            
                                            <li><?php echo $list['price']?></li>
                                        </ul>
                                </div>
                                </div>
                            </div>
							<?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
        if(isset($userdata)){
            $id = $userdata['id'];
        $sql = "SELECT * FROM rating WHERE customer_id = '$id'";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) > 0) { ?>
        <section class="htc__category__area ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section__title--2 text-center">
                            <h2 class="title__line">Recommend Products Here</h2>
                        </div>
                    </div>
                </div>
                <div class="htc__product__container">
                    <div class="row">
                        <div class="product__list clearfix mt--30">
							<?php
                            include "recommend_test.php";
                            foreach ($recommend_list as $key => $value) {

                                $sql = "SELECT * FROM product WHERE name = '$key'";
                                $result = mysqli_query($con, $sql);
                                while ($row = mysqli_fetch_array($result)) {
							?>
                            <!-- Start Single Category -->
                            <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                                <div class="category">
                                    <div class="ht__cat__thumb">
                                        <a href="product.php?id=<?php echo $row['id']?>">
                                            <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image']?>" alt="product images" width="10px">
                                        </a>
                                    </div>
                                    
                                    <div class="fr__product__inner">
                                        <a href="product.php?id=<?php echo $row['id']?>">
                                        <h4><?php echo $row['name']?></h4>
                                        </a>

                                        <ul class="fr__pro__prize">
                                            
                                            <li><?php echo $row['price']?></li>
                                        </ul>
                                </div>
                                </div>
                            </div>
							<?php } }?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php } }?>
<?php require('footer.php'); ?> 