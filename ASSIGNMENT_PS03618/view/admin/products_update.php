<?php include "../view/website/header_admin.php";
$objQuest = null;
$objQuest = new sanpham();
$quest = $objQuest->getProductById($_GET['id']);
$productid = $quest[0];
$productname = $quest[1];
$productimage = $quest[2];
$productprice = $quest[3];
$productdes = $quest[4];
?>
<section id="">
    <div id="">
    	<center><h1 style=" margin: 20px; color: #900; font-size: 24px;">Chỉnh sửa sản phẩm</h1></center>
        <form action="?action=update_product_action" method="post" enctype="multipart/form-data">
              
        <center><table>
            <tr><td colspan="2" align="center"><img src="../controller/images/<?php echo "$productimage" ?>" width="300px"/></td></tr>       
            <tr>
                <td>
                    <label for="txtTenSP">Tên sản phẩm</label></td>
                 </td>
                 <td align="left">
                     <input style="width: 330px" type="text" name="txtTenSP"  value="<?php echo"$productname" ?>">
                 </td>
            </tr>
            
            <tr>
                <td>
                    <label for="file">Chọn hình ảnh</label></td>
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
                     <input type="text" name="txtGiaSP" value="<?php echo "$productprice" ?>">
                 </td>
            </tr>
            
            <tr>
                <td>
                    <label for="txtMotaSP">Mô tả sản phẩm</label></td>
                 </td>
                 <td align="left">
                     <textarea name="txtMotaSP" id="txtGioithieu" cols="40" rows="15"  ><?php echo"$productdes"?></textarea>
                 </td>
            </tr>
            
            <tr>
                
                 <td align="left">
                     <input type="hidden" name="txtIDSP" value="<?php echo"$productid" ?>">
                 </td>
            </tr>
            
            <tr>
                <td colspan="2" align="center">
                <input type="submit" name="submit" value="Chỉnh sửa sản phẩm"/>
                
            </tr>
            
        </table></center>
        </form>
         <br>
        <div class="clear"></div>
 </div>
 </section>
<?php include "../view/website/footer.php";?>

