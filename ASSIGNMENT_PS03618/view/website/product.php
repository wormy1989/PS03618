<?php include "../view/website/header.php";?>
<div class="content product-box-main">
    <div class="wrap">
        <div class="content-left">
            <div class="content-left-top-brands">
                    <h3>Categories</h3>
		<ul>
                    <li><a href="#">ALL</a></li>
                    <li><a href="#">MEN</a></li>
                    <li><a href="#">WOMEN</a></li>
                    <li><a href="#">SPORTS</a></li>
                    <li><a href="#">NEW</a></li>
                    <li><a href="#">SALE</a></li>
		</ul>
                   
            </div>
            
	</div>	
          
<!--- end_left---->
        <div class="content-right product-box">
            <div class="product-box-head">
                <div class="product-box-head-left">
                    <h3>Products <span>(500)</span></h3>
                </div>
            <div class="product-box-head-right">
                <ul>
                    <li><span>Sort ::</span><a href="#"> </a></li>
                    <li><label> </label> <a href="#"> Popular</a></li>
                    <li><label> </label> <a href="#"> New</a></li>
                    <li><label> </label> <a href="#"> Discount</a></li>
                    <li><span>Price ::</span><a href="#">Low High</a></li>
                </ul>
            </div>
            <div class="clear"> </div>
            </div>
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
                    
                <?php
                        $pro = new sanpham();


                        $display = 6;
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
         
        <?php 
            
            if($page > 1) { //hien thi so trang
                
                $next = $start + $display;
                $prev = $start - $display;
                $current = ($start/$display)+1;
        ?>  
                                                                                                  
            <div class="clear"></div>                                            
            <div class="products_list_pages">
                        
                            <?php  //Hiển thị trang trước
                                if($current !=1) {
                                echo "<td><a href='index.php?action=$action&start=$prev&page=$page'>Previous</a></td>";
                                } ?>
                            
                            <?php //Hiển thị số link trang
                                for($i=1;$i<=$page;$i++) {
                                    if($current != $i) {
                                    echo "<td><a href='index.php?action=$action&start=".($display*($i-1))."&page=$page'>$i</a></td>";
                                } else {
                                    echo "<td class='current'>$i</td>";
                                }
                                } //kết thúc vòng lặp for
                            ?>
                            
                            <?php //Hiển thị trang kế tiếp

                                 if($current != $page) {
                                     echo "<td><a href='index.php?action=$action&start=$next&page=$page'>Next</a></td>";
                                }
                                }
                            ?>  

            </div>                                                                                               
            </div>
        </div>
    </div>
    <div class="clear"></div>
</div>
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
<!---- //End-bottom-grids---->
<div class="clear"></div>
<?php include "../view/website/footer.php"?>

