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
      if ((isset($_COOKIE["txtusername"]) && (isset($_COOKIE["txtpassword"]))))
      {
          $user=$_COOKIE["txtusername"];
          $pass=$_COOKIE["txtpassword"];
      }
?>     
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <div class="content login-box">
			<div class="login-main">
				<div class="wrap">
					<h1></h1>
                                        <div class="login-right" style="float: left;">
						<h3>LOGIN CPANEL</h3>
						<p></p>
						<form method="post" name="contact" action="?action=login_admin" >
							<div>
								<span>Username<label>*</label></span>
								<input name="txtusername" type="text" id="txtusername"  /> 
							</div>
							<div>
								<span>Password<label>*</label></span>
                                                                <input name="txtpassword" type="password" id="txtpassword" style="width: 97.5%; padding:2% 0 2% 1.5%; opacity: 0.3;"/>
							</div>
							<a class="forgot" href="#">Forgot Your Password?</a>
							<input type="submit" value="Login" name="login" />
                                                        <p><?php echo $messages?></p>
						</form>
					</div>
					<div class="clear"> </div>
				</div>
			</div>
		</div>
    <?php include "../view/website/footer.php";?>

