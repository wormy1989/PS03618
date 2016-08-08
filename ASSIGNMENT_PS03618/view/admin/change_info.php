<?php include "../view/website/header_myinfo.php";
$objQuest = null;
$objQuest = new customer();
$quest = $objQuest->getUserByUserName($_SESSION['username']);
$userid = $quest[0];
$usename = $quest [1];
$password = $quest [2];
$fullname = $quest[3];
$email = $quest[4];
$phone = $quest[5];
$avatar = $quest[6];
?>
<section id="">
    <div id="">
    	<center><h1 style=" margin: 20px; color: #900; font-size: 24px;">Chỉnh sửa thông tin thành viên</h1></center>
        <form action="?action=change_info_action" method="post" enctype="multipart/form-data">
              
        <center><table>
            <tr><td colspan="2" align="center"><img src="../controller/images/<?php echo "$avatar" ?>" width="100px"/></td></tr>       
            <tr>
                <td>
                    <label for="txtTen">Tên thành viên</label></td>
                 </td>
                 <td align="left">
                     <input style="" type="text" name="txtTen"  value="<?php echo"$fullname" ?>">
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
                    <label for="txtEmail">Email</label></td>
                 </td>
                 <td align="left">
                     <input type="text" name="txtEmail" value="<?php echo "$email" ?>">
                 </td>
            </tr>
            <tr>
                <td>
                    <label for="txtPhone">Phone</label></td>
                 </td>
                 <td align="left">
                     <input type="text" name="txtPhone" value="<?php echo "$phone" ?>">
                 </td>
            </tr>
                    
            <tr> 
                 <td align="left">
                     <input type="hidden" name="txtID" value="<?php echo"$userid" ?>">
                 </td>
            </tr>
            
            <tr>
                <td></td>
                <br/>
                <td>
                <input type="submit" name="submit" value="Chỉnh sửa thông tin thành viên"/> 
                </td>
            </tr>
            
        </table></center>
        </form>
         <br>
        <div class="clear"></div>
 </div>
 </section>
<?php include "../view/website/footer.php";?>

