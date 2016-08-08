<?php include "../view/website/header.php";?>              
<!----start-image-slider---->
		<div class="img-slider">
			<div class="wrap">
			<ul id="jquery-demo">
			  <li>
			    <a href="#slide1">
			      <img src="../controller/images/slide-1.jpg" alt="" />
			    </a>
			    <div class="slider-detils">
			    	<h3>MENS FOOT BALL <label>BOOTS</label></h3>
			    	<span>Stay true to your team all day, every day, game day.</span>
			    	<a class="slide-btn" href="details.html"> Shop Now</a>
			    </div>
			  </li>
			  <li>
			    <a href="#slide2">
			      <img src="../controller/images/slide-4.jpg"  alt="" />
			    </a>
			     <div class="slider-detils">
			    	<h3>MENS FOOT BALL <label>BOOTS</label></h3>
			    	<span>Stay true to your team all day, every day, game day.</span>
			    	<a class="slide-btn" href="details.html"> Shop Now</a>
			    </div>
			  </li>
			  <li>
			    <a href="#slide3">
			      <img src="../controller/images/slide-1.jpg" alt="" />
			    </a>
			     <div class="slider-detils">
			    	<h3>MENS FOOT BALL <label>BOOTS</label></h3>
			    	<span>Stay true to your team all day, every day, game day.</span>
			    	<a class="slide-btn" href="details.html"> Shop Now</a>
			    </div>
			  </li>
			</ul>
			</div>
		</div>
		<div class="clear"> </div>
		<!----//End-image-slider---->
		<!----start-price-rage--->
		<div class="wrap">
			<div class="price-rage">
				<h3>Weekly selection:</h3>
				<div id="slider-range">
				</div>
			</div>
		</div>
		<!----//End-price-rage--->
		<!--- start-content---->
		<div class="content">
			<div class="wrap">
				<div class="content-left">
                		<br>
						<div class="content-left-bottom-grid">
							
							<div class="content-left-bottom-grids">
								<div class="content-left-bottom-grid1">
									<img src="../controller/images/foot-ball.jpg" title="football" />
									<h5><a href="details.html">Nike Strike PL Hi-Vis</a></h5>
									<span> Football</span>
									<label>&#163; 375</label>
								</div>
								<div class="content-left-bottom-grid1">
									<img src="../controller/images/jarse.jpg" title="jarse" />
									<h5><a href="details.html">Nike Strike PL Hi-Vis</a></h5>
									<span> Football</span>
									<label>&#163; 375</label>
								</div>
							</div>
						</div>
				</div>
				<div class="content-right">
                                    <h4 style="font-weight: bold">PRODUCTS NEW:</h4>
                                    <br>
					<div class="product-grids">
						<!--- start-rate---->
							<script src="../controller/js/jstarbox.js"></script>
							<link rel="stylesheet" href="../controller/css/jstarbox.css" type="text/css" media="screen" charset="utf-8" />
							<script type="text/javascript">
								jQuery(function() {
									jQuery('.starbox').each(function() {
										var starbox = jQuery(this);
										starbox.starbox({
											average: starbox.attr('data-start-value'),
											changeable: starbox.hasClass('unchangeable') ? false : starbox.hasClass('clickonce') ? 'once' : true,
											ghosting: starbox.hasClass('ghosting'),
											autoUpdateAverage: starbox.hasClass('autoupdate'),
											buttons: starbox.hasClass('smooth') ? false : starbox.attr('data-button-count') || 5,
											stars: starbox.attr('data-star-count') || 5
										}).bind('starbox-value-changed', function(event, value) {
											if(starbox.hasClass('random')) {
												var val = Math.random();
												starbox.next().text(' '+val);
												return val;
											} 
										})
									});
								});
							</script>
							<!---//End-rate---->
							<!---caption-script---->
							<!---//caption-script---->
                                        <?php
                        $pro = new sanpham();


                        $display = 3;
                        if(isset($_GET['page']) && (int)$_GET['page']) {
                                $page = $_GET['page'];
                            } else { //neu chua xac dinh, thi tim so trang
                                $count = $pro->CountProduct();
                                $record = $count[0];

                                if($record > $display) {
                                    $page = ceil($record/$display);
                                } else {
                                    $page = 1;
                                }
                            }
                        $start = (isset($_GET['start']) && (int)$_GET['start']>=0) ? $_GET['start'] : 0;

                        $result = $pro->getListPageOrderProduct($start,$display);
                        $dem =0;
                        while($set = $result -> fetch()):
                            $dem++;
                ?>                                        
                                                        
                <div class="product-grid fade" style="width: 30%">
                    <div class="product-grid-head">
                            <ul class="grid-social">
				<li><a class="facebook" href="#"><span> </span></a></li>
				<li><a class="twitter" href="#"><span> </span></a></li>
				<li><a class="googlep" href="#"><span> </span></a></li>
				<div class="clear"> </div>
			    </ul>
			<div class="block">
                            <div class="starbox small ghosting"> </div> <span> (46)</span>
			</div>
                    </div>

			<div class="product-pic">
                            <a href="#"><img src="<?php echo '../controller/images/'.$set['ProductImage'] ?>"/></a>
			<p>
                            <a href="#"><?php echo $set['ProductName']?></a>
                            <span style="font-weight: bold; font-size: 1em; color: #000"><?php echo number_format($set['ProductPrice'])?>&#163;</span>
			</p>
			</div>
			<div class="product-info" >
                            <div class="product-info-cust" style="width: 30%;">
				<a href="?action=details&id=<?php echo "$set[ProductID]";?>">Details</a>         
                            </div>
                            <div class="product-info-price" style="width: 30%;">
                                <a href="?action=details&id=<?php echo "$set[ProductID]";?>">BUY</a>
                            </div>
				<div class="clear"> </div>
			</div>
			<div class="more-product-info">
                            <span> </span>
			</div>
		</div>
                <?php
        if($dem%3==0)
       {
        echo '</div><div>';
       }
        endwhile;   
      ?>
                                        </div>
                                    
                                    <div class="clear"> </div>
                                </div>
                        </div>
                    </div>
			<div class="clear"> </div>
                <!---- start-bottom-grids---->
		<div class="bottom-grids">
                    <div class="bottom-top-grids">
				<div class="wrap">
					<div class="bottom-top-grid">
                                            <h4>PRODUCTS</h4>
						<ul>
							<li><a href="#">MEN</a></li>
                                                        <li><a href="#">WOMEN</a></li>
							<li><a href="#">KIDS</a></li>
							<li><a href="#">SPORTS</a></li>
						</ul>
					</div>
					<div class="bottom-top-grid">
						<h4>REGISTER</h4>
						<p>Create one account to manage everything you do with Nike, from your shopping preferences to your Nike+ activity.</p>
						<a class="learn-more" href="?action=register">Learn more</a>
					</div>
					<div class="bottom-top-grid last-bottom-top-grid">
						<h4>WEBSITE</h4>
						<ul>
							<li><a href="?action=admin_login">Admin Cpanel</a></li>
                                                        <li><a href="?action=login">Login</a></li>
                                                        <li><a href="?action=home">Home</a></li>
						</ul>
					</div>
					<div class="clear"> </div>
				</div>
			</div>
                </div>
                <div class="clear"> </div>
		<!---- //End-bottom-grids---->
		<!--- //End-content---->
<?php include "../view/website/footer.php";?>