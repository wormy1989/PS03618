<?php include "../view/website/header.php";?>

 <div class="main_content">
    	<div class="showtext">
            
        <?php
        if(isset($_SESSION['check']))
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
                <center><h1>Danh sách sản phẩm </h1><center>
                
            <form action="../controller/index.php" method="post">
            <input type="hidden" name="action" value="update_cart"/>
            <center>
            <table>
          
                <tr>
                    <td> Tên sản phẩm</td>
                    <td>Giá</td>
                    <td>Hình ảnh</td>
                    <td>Số lượng</td>
                    <td>Thành tiền</td>
                </tr> 
                
                
        <?php
         foreach($_SESSION['cartview'] as $key => $item):
                $cost = number_format($item['cost'],2);
                $total = number_format($item['total'],2);
        
        ?>
          <tr>
             <td> <?php echo $item['name'];?> </td>
             <td> <?php echo $cost?> </td>
             <td> <img src="../controller/images/<?php echo $item['img'];?>" width="100px" /> </td> 
             <td> <input type="text" name="newqty[<?php echo $key; ?>]" value="<?php echo $item['qty']; ?>" size="4" class="cart_list_qty"/> </td>
             
             <td> <?php echo $total; ?> </td> 
             
              
         </tr>
         
         <?php endforeach; ?>   
         
         
         <tr>
             <td colspan="3" style="text-align: center; background:#666; color:#900; font-size: 12px;">
                 <b>Tổng tiền</b>
             </td>
             <td colspan="2"> 
                 <h3><?php echo get_subtotal();?> VND</h3>
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
            </center>>
            <br/>
             <p>Chọn "Update cart" để cập nhật số lượng hàng. Chọn 0 để bỏ mặt hàng.</p>
        </form>
                        
                        
                        <center>
                        <table>
          
                <tr>
                    <td>
                        <a href="?action=payments"><img src="../controller/images/payments.png" width="50"></a><p><b>Thanh toán</b> </p>
                    </td>
                    <td>
                        <a href="?action=home"><img src="../controller/images/shop-cart-add-icon.png" width="50"></a><p><b>Thêm sản phẩm</b> </p>
                    </td>
                    <td>
                        <a href="?action=empty_cart"><img src="../controller/images/shopping-cart-remove-icon.png" width="50"></a> <p><b>Xóa giỏ hàng</b> </p>
                    </td>
                    
                </tr>
                        </table>
                        </center>
                        
                        
                        
          <?php } ?>
          <?php }
          else
          {
            echo '<center>';
            echo '<br/><br/>';
            echo '<h3>';
            echo('Bạn phải đăng nhập để thực hiện chức năng này');
            echo '</h3>';
            echo '<br/>';
            echo '<form action="?action=login" method="post" ><input type="submit" name="go_to_register" value="Đi đến trang đăng nhâp" 
                     style="cursor:pointer;color: #FFF; background:#990000; border:1px solid #663333; margin:5px; padding:5px;" /></form>';
            echo '</center>';
            echo '<br/><br/>';
            echo '<br/><br/>';
            echo '<br/><br/>';
          }
           ?>

    </div>
        <div class="clear"></div>
    </div><!--End #main_content-->
<?php include "../view/website/footer.php";?>

