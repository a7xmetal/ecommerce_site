<?php 
require('top.php');
$userdata = check_login($con);
if(isset($_GET['id'])){
	$product_id=mysqli_real_escape_string($con,$_GET['id']);
	if($product_id>0){
		$get_product=get_product($con,'','',$product_id);
	}else{
		?>
		<script>
		window.location.href='index.php';
		</script>
		<?php
	}
}else{
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}
?>

 <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/4.jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.php">Home</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <a class="breadcrumb-item" href="categories.php?id=<?php echo $get_product['0']['categories_id']?>"><?php echo $get_product['0']['categories']?></a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active"><?php echo $get_product['0']['name']?></span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Product Details Area -->
        <section class="htc__product__details bg__white ptb--100">
            <!-- Start Product Details Top -->
            <div class="htc__product__details__top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                            <div class="htc__product__details__tab__content">
                                <!-- Start Product Big Images -->
                                <div class="product__big__images">
                                    <div class="portfolio-full-image tab-content">
                                        <div role="tabpanel" class="tab-pane fade in active" id="img-tab-1">
                                            <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$get_product['0']['image']?>">
                                        </div>
                                    </div>
                                </div>
                                <!-- End Product Big Images -->
                                
                            </div>
                        </div>
                        <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12 smt-40 xmt-40">
                            <div class="ht__product__dtl">
                                <h2><?php echo $get_product['0']['name']?></h2>
                                <ul  class="pro__prize">
                                    <li class="old__prize"><?php echo $get_product['0']['mrp']?></li>
                                    <li><?php echo $get_product['0']['price']?></li>
                                </ul>
                                <p class="pro__info"><?php echo $get_product['0']['short_desc']?></p>
                                <div class="ht__pro__desc">
                                    <div class="sin__desc">
                                        <p><span>Availability:</span> In Stock</p>
                                    </div>
									<div class="sin__desc">
                                        <p><span>Qty:</span> 
										<select id="qty">
											<option>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
											<option>5</option>
											<option>6</option>
											<option>7</option>
											<option>8</option>
											<option>9</option>
											<option>10</option>
										</select>
										</p>
                                    </div>
                                    <div class="sin__desc align--left">
                                        <p><span>Categories:</span></p>
                                        <ul class="pro__cat__list">
                                            <li><a href="#"><?php echo $get_product['0']['categories']?></a></li>
                                        </ul>
                                    </div>


<?php if(isset($_SESSION['USER_LOGIN']) && $_SESSION['USER_LOGIN']=='yes'){?>
<div class="rating">
                                    <?php
        $uid = $userdata['id'];
        $id= $_GET['id'];
        $sql = "SELECT * FROM rating WHERE customer_id = '$uid' AND product_id = '$id'";
        $result = mysqli_query($con, $sql);
        $rows = mysqli_num_rows($result);
        if ($rows > 0) {
          $rating = mysqli_fetch_array($result);
          $rid = $rating['rid'];
          $rating = $rating['rating'];
        ?>
          <div class="star-wrapper">
            <p class="px">Your Review</p>
            <a href="rating.php?re=5&rid=<?php echo $rid; ?>" class="fas fa-star s1" onclick="return confirm('Are you sure want to update rate?')" title="5"></a>
            <a href="rating.php?re=4&rid=<?php echo $rid; ?>" class="fas fa-star s2" onclick="return confirm('Are you sure want to update rate?')" title="4"></a>
            <a href="rating.php?re=3&rid=<?php echo $rid; ?>" class="fas fa-star s3" onclick="return confirm('Are you sure want to update rate?')" title="3"></a>
            <a href="rating.php?re=2&rid=<?php echo $rid; ?>" class="fas fa-star s4" onclick="return confirm('Are you sure want to update rate?')" title="2"></a>
            <a href="rating.php?re=1&rid=<?php echo $rid; ?>" class="fas fa-star s5" onclick="return confirm('Are you sure want to update rate?')" title="1"></a>
          </div>
          <script>
            <?php

            while ($rating >= 1) {
            ?>
              document.getElementsByClassName('s<?php echo 6 - $rating; ?>')[0].style.color = "red";
            <?php
              $rating--;
            }
            ?>
          </script>
        <?php } else {
        ?>
          <div class="star-wrapper">
            <p class="px">Please Give Your Review</p>
            <a href="rating.php?rate=5&hid=<?php echo $id; ?>" class="fas fa-star s1" onclick="return confirm('Are you sure want to rate?')" title="5"></a>
            <a href="rating.php?rate=4&hid=<?php echo $id; ?>" class="fas fa-star s2" onclick="return confirm('Are you sure want to rate?')" title="4"></a>
            <a href="rating.php?rate=3&hid=<?php echo $id; ?>" class="fas fa-star s3" onclick="return confirm('Are you sure want to rate?')" title="3"></a>
            <a href="rating.php?rate=2&hid=<?php echo $id; ?>" class="fas fa-star s4" onclick="return confirm('Are you sure want to rate?')" title="2"></a>
            <a href="rating.php?rate=1&hid=<?php echo $id; ?>" class="fas fa-star s5" onclick="return confirm('Are you sure want to rate?')" title="1"></a>
          </div>
        <?php } ?>
        </div>
        <?php }else 
        {echo '<div>Please login to rate this item.</div>'; }?>



                                    </div>
									
                                </div>
								<a class="fr__btn" href="javascript:void(0)" onclick="manage_cart('<?php echo $get_product['0']['id']?>','add')">Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Product Details Top -->
        </section>
        <section class="htc__produc__decription bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <!-- Start List And Grid View -->
                        <ul class="pro__details__tab" role="tablist">
                            <li role="presentation" class="description active"><a href="#description" role="tab" data-toggle="tab">description</a></li>
                            <li role="presentation" class="description active"><a href="#description" role="tab" data-toggle="tab">rating</a></li>

                        </ul>
                        <!-- End List And Grid View -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="ht__pro__details__content">
                            <!-- Start Single Content -->
                            <div role="tabpanel" id="description" class="pro__single__content tab-pane fade in active">
                                <div class="pro__tab__content__inner">
                                    <?php echo $get_product['0']['description']?>
                                </div>
                            </div>

                            <div role="tabpanel" id="rating" class="pro__single__content tab-pane fade in active">
                                <div class="pro__tab__content__inner">
                                    <?php 
                                       
                                    ?>
                                </div>
                            </div>


                            
                            <!-- End Single Content -->
                            
                        </div>
                    </div>
                </div>
            </div>
        </section> 
<?php require('footer.php'); ?>     