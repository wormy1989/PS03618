<?php include "../view/website/header_myinfo.php";
$objQuest = null;
$objQuest = new customer();
$quest = $objQuest->getInfoById($_SESSION['username']);
$userid = $quest[0];
$username = $quest[1];
$password = $quest[2];
$avatar = $quest[6];
?>
<section id="">
    <div id="">
    	<center><h1 style=" margin: 20px; color: #900; font-size: 24px;">Đổi mật khẩu</h1></center>
        <form action="?action=change_pass_action" method="post" enctype="multipart/form-data">
              
        <center><table>
            <tr><td colspan="2" align="center"><img src="../controller/images/<?php echo "$avatar" ?>" width="100px"/></td></tr>       
            <tr>
                <td>
                    <label for="txtName">Username</label></td>
                 </td>
                 <td align="left">
                     <label><?php echo"$username" ?></label>
                 </td>
            </tr>
            <tr>
                <td>
                    <label for="txtPass">New Password</label></td>
                 </td>
                 <td align="left">
                     <input type="password" name="txtPass" value="">
                 </td>
            </tr>                   
            <tr> 
                 <td align="left">
                     <input type="hidden" name="txtID" value="<?php echo"userid" ?>">
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

