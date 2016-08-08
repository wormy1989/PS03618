<?php include "../view/website/header_login.php";?>
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
    <style>
    /*Cart_list_info*/
        .cart_list { text-align:center; }
        .cart_list td{ border:1px groove #CCC; padding:0 5px;}
        .cart_list_title{ background:#CCC; color:#900; font-size:16px; font-weight:bold;}
        .cart_list_options td{text-align:center; padding: 20px;}
        .cart_list_qty{ text-align:center;}
    </style>
    <div class="main_content">
    	<div class="showtext">
            
        <?php
        if(isset($_SESSION['check']))
        {
        }
             else
          {    
             if(!isset($_SESSION['cartview']) || count($_SESSION['cartview'])==0)
             {
                echo"<center>";
                echo '<br/><br/>';
                echo"<h3>";
                echo('Bạn chưa chọn sản phẩm nào');
                echo"</h3>";
                echo '<br/><br/>';
                echo('Giỏ hàng rỗng');
                echo"</center>";
                echo '<br/><br/>';
                echo '<br/><br/>';
                unset($_SESSION['tongtien']);
             }
             else
             {
        ?>
            <center><h1 style=" font-weight: bold">Danh sách sản phẩm</h1><center>
            <br>
                
            <form action="?action=payments_action" method="post" enctype="multipart/form-data" >          
            
            <span><label>Tên người mua:</label></span>
            <input name="txtuser" value="<?php echo $user; ?>"/>
            
            <br>
            <br>
            <table class="cart_list" style="width: 70%;">
          
                <tr>
                    <td class="cart_list_title"> Tên sản phẩm</td>
                    <td class="cart_list_title">Giá</td>
                    <td class="cart_list_title">Hình ảnh</td>
                    <td class="cart_list_title">Số lượng</td>
                    <td class="cart_list_title">Thành tiền</td>
                </tr> 
                
                
        <?php
         foreach($_SESSION['cartview'] as $key => $item):
                $cost = number_format($item['cost'],0);
                $total = number_format($item['total'],0);
        
        ?>
          <tr>
             <td> <input hidden="" name="itemname" value="<?php echo $item['name'];?>" /><?php echo $item['name'];?> </td>
             <td> <input hidden="" name="itemcost" value="<?php echo $cost;?>" /><?php echo $cost?> </td>
             <td> <p><img src="../controller/images/<?php echo $item['img'];?>" width="100px" /></p> </td> 
             <td> <input hidden="" name="itemqty" value="<?php echo $item['qty']; ?>" /><text type="text" name="newqty[<?php echo $key; ?>]" value="<?php echo $item['qty']; ?>" size="" class="cart_list_qty" /></p> </td>
             
             <td> <?php echo $total; ?></td> 
             
              
         </tr>
         
         <?php endforeach; ?>   
         
         
         <tr>
             <td colspan="3" style="text-align: center; background:#666; color:#900; font-size: 12px;">
                 <h3>Tổng tiền</h3>
             </td>
             <td colspan="2"> 
                 <h3><?php echo get_subtotal();?>&#163;</h3>
                 <?php
                    $tongtien = get_subtotal();
                    $tongsanpham = get_subtotalitem();                 
                    $_SESSION['tongtien']=$tongtien;
                    $_SESSION['tongsanpham']=$tongsanpham;
                 ?>
             </td>
         </tr>
         
         <tr>
             <td colspan="5">
                 <input type="submit" value="Payment" style="cursor:pointer;color: #FFF; background:#990000; border:1px solid #663333; margin:5px; padding:5px;"/>
                 <p><?php echo $messages?></p>
            </td>
         </tr>
             </table>
            <br/>
        
        </form>    
          <?php } ?>
          <?php }
           ?>

    </div>
        <div class="clear"></div>
    </div><!--End #main_content-->
<?php include "../view/website/footer.php";?>
