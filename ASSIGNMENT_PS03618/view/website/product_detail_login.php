<?php include "../view/website/header_login.php";
$objQuest = null;
$objQuest = new sanpham();
$quest = $objQuest->getProductById($_GET['id']);
$productid = $quest[0];
$productname = $quest[1];
$productimage = $quest[2];
$productprice = $quest[3];
$productdes = $quest[4];
?>
<div class="content details-page">
    <div class="product-details">
        <div class="wrap">
            <ul class="product-head">
		<li><a href="#">Home</a> <span>::</span></li>
		<li class="active-page"><a href="#">Product Page</a></li>
		<div class="clear"> </div>
            </ul>
            <div class="details-left">
					<div class="details-left-slider">
						<ul id="etalage">
							<li>
								<a href="#">
                                                                    <img src="../controller/images/<?php echo "$productimage" ?>" width="400px" style="margin-left: 3%"/>
								</a>
							</li>
                                                </ul>
                                        </div>
                    <div class="details-left-info">
                                        <div class="details-right-head">
                                        <form action="?action=add_cart_login" method="post">    
						<h1><?php echo"$productname" ?></h1>
						<ul class="pro-rate">
							<li><a class="product-rate" href="#"> <label> </label></a> <span> </span></li>
							<li><a href="#">0 Review(s) Add Review</a></li>
						</ul>
                                                <input type="hidden" name="productkey" value="<?php echo $quest['ProductID'];?>"/>
						<p class="product-detail-info">Sản phẩm giầy thể thao của Nike. Thích hợp với các mon thể thao chạy bộ, đá bóng, cầu lông, với các màu sắc bắt mắt và trẻ trung cũng như sang trọng thích hợp và nhiều đối tượng sử dụng.</p>
						<a class="learn-more" href="#"><h3>MORE DETAILS</h3></a>
                                                <br>
						<div class="product-more-details">
							<ul class="price-avl">
								<li class="price"><label><?php echo "$productprice" ?>&#163;</label></li>
								<li class="stock"><i>In stock</i></li>
								<div class="clear"> </div>                                 
							</ul>
							<ul class="prosuct-qty">
								<span>Quantity:</span>
								<select name="itemqty">  
                                                                <?php for($i=1;$i<=10;$i++): ?>
                                                                <option value="<?php echo $i; ?>">
                                                                <?php echo $i?>
                                                                </option>
                                                                <?php endfor; ?>
                                                                </select>
							</ul>
							<input type="submit" value="add to cart"/>
                                            </form>
							<ul class="product-share">
								<h3>All so Share On</h3>
								<ul>
									<li><a class="share-face" href="#"><span> </span> </a></li>
									<li><a class="share-twitter" href="#"><span> </span> </a></li>
									<li><a class="share-google" href="#"><span> </span> </a></li>
									<li><a class="share-rss" href="#"><span> </span> </a></li>
									<div class="clear"> </div>
								</ul>
							</ul>
						</div>
					</div>
                                        
                    </div>
                    
            </div>
            <div class="details-right">
                    <a href="#">SEE MORE</a>
            </div>
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
<!---- //End-bottom-grids---->
<div class="clear"></div>
<?php include "../view/website/footer.php";?>

