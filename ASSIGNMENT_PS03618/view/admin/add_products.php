<?php include "../view/website/header_admin.php";?>
<section id="">
    <div id="">
    	<center><h1 style=" margin: 20px; color: #900; font-size: 24px;">Thêm sản phẩm</h1></center>
        <form action="?action=add_product_action" method="post" enctype="multipart/form-data">
              
        <center><table>
               
            <tr>
                <td>
                    <label for="txtTenSP">Tên sản phẩm</label></td>
                 </td>
                 <td align="left">
                     <input style="width: 330px" type="text" name="txtTenSP"  value="">
                 </td>
            </tr>
            
            <tr>
                <td>
                    <label for="file">Chọn hình ảnh sản phẩm</label></td>
                 </td>
                 <td align="left">
                     <input type="file" name="file" id="file">
                 </td>
            </tr>
            <br>
            <tr>
                <td>
                    <label for="txtGiaSP">Giá sản phẩm</label></td>
                 </td>
                 <td align="left">
                     <input type="text" name="txtGiaSP" value="">
                 </td>
            </tr>
             <br>
            <tr>
                <td>
                    <label for="txtMotaSP">Mô tả sản phẩm</label></td>
                 </td>
                 <td align="left">
                     <textarea name="txtMotaSP" id="txtGioithieu" cols="40" rows="15"  ></textarea>
                 </td>
            </tr>
            
            <tr>
                <td colspan="2" align="center">
                <input type="submit" name="submit" value="Thêm sản phẩm"/>
                
            </tr>
            
        </table></center>
        </form>
         <br>
        <div class="clear"></div>
 </div>
 </section>
<?php include "../view/website/footer.php";?>

