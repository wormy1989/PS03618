<?php include "../view/website/header.php";?>
<?php
if(empty($_SESSION['messages']))
        {
            $messages="";
            
        }
        else
        {
            $messages=$_SESSION['messages'];
        }
?>
<!--- start-content---->
		<div class="content login-box">
			<div class="login-main">
				<div class="wrap">
					<h1>CREATE AN ACCOUNT</h1>
					<div class="register-grids">
						<form method="post" name="contact" action="?action=addUser">  
								<div class="register-top-grid">
										<h3>PERSONAL INFORMATION</h3>
										<div>
											<span>Name<label>*</label></span>
											<input name="fullname" type="text" id="txtfullname"  />
										</div>
										<div>
											<span>Email Address<label>*</label></span>
											<input name="email" type="text" id="txtemail"  />
										</div>
										<div>
											<span>Phone<label>*</label></span>
											<input name="phone" type="text" id="txtphone"  /> 
										</div>
										<div class="clear"> </div>
											<a class="news-letter" href="#">
												<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i>Sign Up for Newsletter</label>
											</a>
										<div class="clear"> </div>
								</div>
								<div class="clear"> </div>
								<div class="register-bottom-grid">
										<h3>LOGIN INFORMATION</h3>
										<div>
											<span>Username<label>*</label></span>
											<input name="username" type="text" id="txtusername"  />
										</div>
										<div>
											<span>Password<label>*</label></span>
											<input name="password" type="text" id="txtpassword"  />
										</div>
										<div class="clear"> </div>
								</div>
								<div class="clear"> </div>
                                                                <input type="submit" value="submit" name="register" />
                                                                <input type="submit" value="reset" name="reset" style="margin-left: 10px;" />
                                                                <br><br><br>
                                                                <p><?php echo $messages?></p>
                                                                
                                                                
                                                          
						</form>
					</div>
				</div>
			</div>
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
						</ul>
					</div>
					<div class="clear"> </div>
				</div>
			</div>
                </div>
		<!---- //End-bottom-grids---->
<?php include "../view/website/footer.php";?>

