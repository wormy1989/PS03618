<?php include "../view/website/header.php";
        $remember = null;
        if(empty($_SESSION['messages']))
        {
            $messages="";          
        }
        else
        {
            $messages=$_SESSION['messages'];
        }
        if ((isset($_COOKIE["user"]) && (isset($_COOKIE["pass"]))))
        {
          $user=$_COOKIE["user"];
          $pass=$_COOKIE["pass"];
        }
        else
        {
          $user="";
          $pass="";
        }
?>     
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <div class="content login-box">
			<div class="login-main">
				<div class="wrap">
					<h1>LOGIN OR CREATE AN ACCOUNT</h1>
					<div class="login-left">
						<h3>NEW CUSTOMERS</h3>
						<p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
						<a class="acount-btn" href="?action=register">Creat an Account</a>
					</div>
					<div class="login-right">
						<h3>REGISTERED CUSTOMERS</h3>
						<p>If you have an account with us, please log in.</p>
						<form method="post" action="?action=login_action" >
							<div>
								<span>Username<label>*</label></span>
								<input name="txtusername" type="text" id="txtusername" value="<?php echo"$user"?>"  /> 
							</div>
							<div>
								<span>Password<label>*</label></span>
                                                                <input name="txtpassword" type="password" id="txtpassword" value="<?php echo"$pass"?>" style="width: 97.5%; padding:2% 0 2% 1.5%; opacity: 0.3;"/>
							</div>
                                                      
                                                    <a class="forgot" href="#"><input name="remember" type="checkbox" checked="check"/>Remember</a>
							<a class="forgot" href="?action=admin_login">Admin Cpanel</a>
                                                        <a class="forgot" href="#">Forgot Your Password?</a>
							<input type="submit" value="Login" name="login" />
                                                        <p><?php echo $messages?></p>
						</form>
    
					</div>
					<div class="clear"> </div>
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