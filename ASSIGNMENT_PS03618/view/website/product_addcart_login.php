<?php include "../view/website/header_login.php";?>
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
                
            <form action="?action=update_cart" method="post">
            <input type="hidden" name="action" value="update_cart"/>
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
             <td> <?php echo $item['name'];?> </td>
             <td> <?php echo $cost?> </td>
             <td> <img src="../controller/images/<?php echo $item['img'];?>" width="100px" /> </td> 
             <td> <input type="text" name="newqty[<?php echo $key; ?>]" value="<?php echo $item['qty']; ?>" size="" class="cart_list_qty"/> </td>
             
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
                 <input type="submit" value="Update Cart" style="cursor:pointer;color: #FFF; background:#990000; border:1px solid #663333; margin:5px; padding:5px;"/>
                 
            </td>
         </tr>
             </table>
            <br/>
             <p>Chọn "Update cart" để cập nhật số lượng hàng. Chọn 0 để bỏ mặt hàng.</p>
        </form>
                        
                        
                        <center><table class="cart_list_options">
          
                <tr>
                    <td>
                        <a href="?action=payments"><img src="../controller/images/payments.png" width="50"></a><p><b>Thanh toán</b> </p>
                    </td>
                    <td>
                        <a href="?action=product_login"><img src="../controller/images/shop-cart-add-icon.png" width="50"></a><p><b>Thêm sản phẩm</b> </p>
                    </td>
                    <td>
                        <a href="?action=empty_cart"><img src="../controller/images/shopping-cart-remove-icon.png" width="50"></a> <p><b>Xóa giỏ hàng</b> </p>
                    </td>                   
                </tr>
                        </table></center>
                        
                        
                        
          <?php } ?>
          <?php }
           ?>

    </div>
        <div class="clear"></div>
    </div><!--End #main_content-->
<?php include "../view/website/footer.php";?>

