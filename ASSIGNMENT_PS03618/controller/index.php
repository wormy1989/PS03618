<?php
 include '../model/connect.php';
 include '../model/user.php';
 include '../model/product.php';
 include '../model/order.php';
 include '../model/cart.php';
  include '../model/contact.php';
 
 include '../model/class.phpmailer.php';
 include '../model/class.smtp.php';
 
 
 header('Content-Type: text/html; charset=utf-8');
 // Khởi tạo session
     session_start();
     
    // Tạo mảng thông tin về giỏ hàng
    if(!isset($_SESSION['cartview']))
        $_SESSION['cartview'] = array(); 
          
    if(isset($_GET["action"])){
         $action=$_GET["action"]; 
     }
     elseif (isset($_POST['action']))
     {
         $action=$_POST["action"];
     }
     else{
         $action="home";
     }
    
     //Xóa dữ liệu của biến Messages
    unset($_SESSION['messages']);
    unset($_SESSION['check']);
    
    switch ($action){
    //Gọi trang chủ
    case "home":
        include "../view/website/home.php";
        break;
    case "home_login":
        include "../view/website/home_login.php";
        break;
    case "home_logout":
        include "../view/website/home_logout.php";
        break;
    case "login":
        include '../view/website/login.php';
        break;
    case "register":
        include '../view/website/register.php';
        break; 
    case "contact":
        include '../view/website/contact.php';
        break; 
    case "contact_login":
        include '../view/website/contact_login.php';
        break;    
    
    case "login_action":
        
            $username = $_POST['txtusername'];
            $_SESSION['username'] = $username;
            $pass = $_POST['txtpassword'];
            $_SESSION['password'] = $pass;
            
            $password = md5($pass);
            
            $remember = $_POST['remember'];
            
            if ($username=="" || $password=="")
            {
                // Tạo mặc định biến Session cho người dùng sau khi đăng nhập thành công
                $_SESSION['messages'] = "Bạn phải nhập thông tin đầy đủ";
                include "../view/website/login.php";
                break;
            }
            else
            { 
                $user = new customer();
                $b = $user ->getUserByUserName($username);
                if($b)
                {
                    $c = $user->checkUser($username,$password);
                    if ($c)
                        {
                            if($remember == false)
                            {
                                $time=time()+60*10;
                                setcookie("user","$username",$time);
                                setcookie("pass","$password",$time);
                            }
                            $_SESSION['username'] = $username;
                            //include '../view/index.php';
                            include '../view/website/product_login.php';
                            break;
                        }
                    else
                        {
                            $_SESSION['username']= $username;
                            include '../view/website/login_passfail.php';
                        }
                }
                else 
                {   
                    $_SESSION['messages'] = "Tên đăng nhập chưa chính xác !";
                    include "../view/website/login.php";
                    break;           
                }
                break;
                         
        //        if($user->checkUser($username,$password))
        //        {                  
        //           $result = $user->userid($username, $password);
        //           $userid = $result[0];
                // Tạo mặc định biến Session cho người dùng sau khi đăng nhập thành công
        //            if($remember == false)
        //            {
          //              $time=time()+60*10;
            //            setcookie("user","$username",$time);
            //            setcookie("pass","$password",$time);
            //        }
                    
                  
            //        $_SESSION['username'] = $username;
            //        //include '../view/index.php';
            //        include '../view/website/product_login.php';
             //       break;
            //         }
            //    else
            //    {
            //        $_SESSION['messages'] = "Tên đăng nhập chưa chính xác !";
            //        include "../view/website/login.php";
            //        break;
        //        }          
           }
        
            
    case "addUser":
        
        $username   = isset($_POST['username']) ? mysql_escape_string($_POST['username']) : '';
        $pass  = isset($_POST['password']) ? mysql_escape_string($_POST['password']) : '';
        $fullname   = isset($_POST['fullname'])    ? mysql_escape_string($_POST['fullname']) : '';
        $email      = isset($_POST['email'])    ? mysql_escape_string($_POST['email']) : '';
        $phone      = isset($_POST['phone'])    ? (int)$_POST['phone'] : '';
        
        $password = md5($pass);
        
        $user = new customer();
        if ($username==""||$password==""||$fullname==""||$email==""||$phone=="")
            {
                // Tạo mặc định biến Session cho người dùng sau khi đăng nhập thành công
                $_SESSION['messages'] = "Bạn phải nhập thông tin đầy đủ";
                include "../view/website/register.php";
                break;
            }
        else
            {
                if($user->checkPassword($username,$email)== FALSE)
                {                  
               // Tạo mặc định biến Session cho người dùng sau khi đăng nhập thành công
                $_SESSION['messages'] = "Đăng ký thành công! Bạn có thể đăng nhập!";
                $user->insertUser($username, $password, $fullname, $email, $phone);   
                //include '../view/index.php';
                include '../view/website/login.php';
                break;
                }
                else
                {
                    $_SESSION['messages'] = "Tài khoản đã được đăng ký!";
                    include "../view/website/register.php";
                    break;
                }
            }
    case "product":
       
        $action="product";   
        include '../view/website/product.php';
        break;   
    
    case "product_login":
        include '../view/website/product_login.php';
        break;
    
    case "admin_login":
        include '../view/admin/admin_login.php';
        break;
    
    case "cpanel":
        include '../view/admin/cpanel.php';
        break;
    case "cpanel_list":
        include '../view/admin/cpanel_list.php';
        break;
          
    case "login_admin":
        
            $username = $_POST['txtusername'];
            $_SESSION['username'] = $username;
            $pass = $_POST['txtpassword'];
            $_SESSION['password'] = $pass;
            
            $password =  md5($pass);
            
            $user = new customer();
            if ($username=="" || $password=="")
            {
                // Tạo mặc định biến Session cho người dùng sau khi đăng nhập thành công
                $_SESSION['messages'] = "Bạn chưa nhập Username hay Password!";
                include "../view/website/admin_login.php";
                break;
            }
            else
            {
                if($user->checkUser($username,$password))
                {                  
                   $result = $user->userid($username, $password);
                   $userid = $result[0];
                // Tạo mặc định biến Session cho người dùng sau khi đăng nhập thành công
                $_SESSION['check'] = $username;
                //include '../view/index.php';
                    if($username=="admin" || $username=="viethung")                      
                    {
                        include '../view/admin/cpanel.php';
                        break;
                    }
                    else
                    {   
                        $_SESSION['messages'] = "Tài khoản của bạn không thể đăng nhập vào Admin Cpanel!";
                        include "../view/admin/admin_login.php";
                        break;
                    }
                }
                else
                {
                    $_SESSION['messages'] = "Tên đăng nhập chưa chính xác!";
                    include "../view/admin/admin_login.php";
                    break;
                }
            }         
        case "add_cart_login":
            echo add_item($_POST['productkey'],$_POST['itemqty']);
            include "../view/website/product_addcart_login.php";
            break;
        case "show_cart_login":
            include '../view/website/product_addcart_login.php';
            break;    
        
        case "add_cart":
            echo add_item($_POST['productkey'],$_POST['itemqty']);
            include "../view/website/product_addcart.php";
            break;
        case "show_cart":
            include '../view/website/product_addcart.php';
            break;
        case "update_cart":
             $new_list = $_POST['newqty'];
             
             foreach($new_list as $key => $qty)
             {
                
                 if($_SESSION['cartview'][$key] != $qty)
                 {
                    update_item($key,$qty);
                 }
             }
             
            include '../view/website/product_addcart_login.php';
            break;
        case "empty_cart":
             unset($_SESSION['cartview']);
             include '../view/website/product_addcart_login.php';
             break;  
      
    //Xóa sản phẩm
        case "delete_product":
            $id =$_GET['ProductID'];
            echo "$id";
            $del = new sanpham();
            $del ->Deleteproduct($id);
            header ("Location:../controller/index.php?action=cpanel_list");
            break;     
    //Chỉnh sửa sản phẩm
       
        case "update_product":
            include "../view/admin/products_update.php";
            break;
        case "update_product_action":
           
            if (isset($_FILES["file"]))
            {
                $productimage = $_FILES["file"]["name"];
                move_uploaded_file($_FILES["file"]["tmp_name"],"../controller/images/" . $_FILES["file"]["name"]);
            }
            else
            {           
                $objQuest = new sanpham();
                $quest = $objQuest->getProductById($_GET['id']);
                $productimage = $quest[2];
            }
            
            $tensanpham =$_POST['txtTenSP'];
            $id=$_POST['txtIDSP'];
            $price = $_POST['txtGiaSP'];
            $mota = $_POST['txtMotaSP'];

            $edit = new sanpham();
            $edit ->Editproduct($tensanpham, $productimage, $price, $mota, $id);
            header ("Location:../controller/index.php?action=cpanel_list");
            
            
            break;
        
        //Add sản phẩm
        case "add_product":
            include "../view/admin/add_products.php";
            break;
        case "add_product_action":
            $tensanpham = $_POST['txtTenSP'];
            $image = $_FILES["file"]["name"];
            $price = $_POST['txtGiaSP'];
            $mota = $_POST['txtMotaSP'];
            move_uploaded_file($_FILES["file"]["tmp_name"],"../controller/images/" . $_FILES["file"]["name"]);
            $pro = new sanpham();
            $pro ->Addproduct($tensanpham, $image, $price, $mota);
            header ("Location:../controller/index.php?action=cpanel_list");
        break;
        
        case "payments":
        include "../view/website/products_payments.php";

        break;
        
        
        case "payments_action":    
            $cus =$_POST['txtuser'];
            $productname = $_POST['itemname'];
            $productprice = $_POST['itemcost'];
            $quantity = $_POST['itemqty'];
            
            $donhang = new hoadon();
            $donhang ->insertOrder($cus,$productname,$productprice,$quantity);
                //include '../view/index.php';
            $_SESSION['messages'] = "Thanh toán thành công!";           
            include "../view/website/products_payments.php";
            break;

        case "details":
            include "../view/website/product_detail.php";
            break;
        case "details_login":
            include "../view/website/product_detail_login.php";
            break;
        case "order_list":
            include "../view/admin/order_list.php";
            break;
        case "contact_list":
            include "../view/admin/contact_list.php";
            break;
        case "myinfo":
            include "../view/admin/myinfo.php";
            break;
        case "user_list":
            include "../view/admin/user_list.php";
            break;
        case "change_info":
            include "../view/admin/change_info.php";
            break;
        case "change_info_action":
            if (isset($_FILES["file"]))
            {
                $avatar = $_FILES["file"]["name"];
                move_uploaded_file($_FILES["file"]["tmp_name"],"../controller/images/" . $_FILES["file"]["name"]);
            }
            else
            {           
                $objQuest = new customer();
                $quest = $objQuest->getUserByUserName($username);
                $avatar = $quest[6];
            }
            
            $fullname =$_POST['txtTen'];
            $id=$_POST['txtID'];
            $phone = $_POST['txtPhone'];
            $email = $_POST['txtEmail'];
                    
            $edit = new customer();
            $edit ->updateUser($id, $fullname, $email, $phone, $avatar);
            header ("Location:../controller/index.php?action=myinfo");
            
            break;
        case "change_pass":
            include "../view/admin/change_pass.php";
            break;
        case "change_pass_action":
  
            $id=$_POST['txtID'];
            $password = $_POST['txtPass'];

            $edit = new customer();
            $edit ->changePass($id, $password);
            header ("Location:../controller/index.php?action=myinfo");
            
            break;   
        
        case "contacts_action":
      
        $name = $_POST['txtname'];
        $subject = $_POST['txttitle'];
        $content = $_POST['txtcontent'];

        $mail = new PHPMailer;
        $mail->isSMTP(); // đặt phương thức gửi thư là smtp
        $mail->Host = 'smtp.gmail.com'; //địa chỉ tên miền server smtp
        $mail->SMTPAuth = true; // Bật tính năng xác thức SMTP
        $mail->Username = 'pdviethung511@gmail.com'; // SMTP username
        $mail->Password = 'HYV030405'; // SMTP password
        $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587; // cổng kết nối tới máy chủ smtp, 587 hoặc 465
        $mail->From = 'pdviethung511@gmail.com'; //địa chỉ email người gửi
        $mail->FromName = $name;
        $mail->addAddress('pdviethung511@gmail.com'); //địa chỉ người nhận
        $mail->addReplyTo('pdviethung511@gmail.com'); 
        $mail->isHTML(true); // đặt là true - định dạng email gửi đi làm html
        $mail->Subject = $subject ;
        $mail->Body = $content;
        if(!$mail->send()) {
        echo 'Không thể gửi thư'; 
        echo '<br/>';
        echo 'Mailer Error (lỗi): ' . $mail->ErrorInfo;
        echo '<br/>';
        echo "<a href='../index.php'>Back</a>";
        } 
        else {
        echo 'Thư đã được gửi đi';
        echo '<br/>';
        echo "<a href='../index.php'>Back</a>";
        }
        break;
}
?>
