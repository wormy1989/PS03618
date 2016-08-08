<?php include "../view/website/header_admin.php";?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Quản trị - Sản phẩm - Danh sách</title>
<style>
    .tbl_list tr { border:#000 dashed 1px};
    .tbl_list th { border-right:#000 dashed 1px;};
    .tbl_list table img {margin-top:100px};
</style>
</head>
<body>
<h2 style="color:#C00; text-align:center">DANH SÁCH SẢN PHẨM</h2>
<br>
<center>
<table class="tbl_list" width="80%" cellpadding="10">
<tr>
    <th style="border-right:#fff dashed 1px;background-color: #000;color: #ffffff;">ID</th>
    <th style="border-right:#fff dashed 1px;background-color: #000;color: #ffffff;">Hình ảnh</th>
    <th style="border-right:#fff dashed 1px;background-color: #000;color: #ffffff;">Tên sản phẩm</th>
    <th style="border-right:#fff dashed 1px;background-color: #000;color: #ffffff;">Giá bán</th>
    <th style="border-right:#fff dashed 1px;background-color: #000;color: #ffffff;">Edit</th>
    <th style="border-right:#fff dashed 1px;background-color: #000;color: #ffffff;">Delete</th>
</tr>


          <tr>
            <?php
        $pro = new sanpham();
        
        
        $display = 4;
        if(isset($_GET['page']) && (int)$_GET['page']) {
                $page = $_GET['page'];
            } else { //neu chua xac dinh, thi tim so trang
                $count = $pro->CountProduct();
                $record = $count[0];
                
                if($record > $display) {
                    $page = ceil($record/$display);
                } else {
                    $page = 1;
                }
            }
        $start = (isset($_GET['start']) && (int)$_GET['start']>=0) ? $_GET['start'] : 0;

        $result = $pro->getListPageOrderProduct($start,$display);
        $dem =0;
        while($set = $result -> fetch()):
            $dem++;?>
           
           <center>
             
                <th style="border-right:#000 dashed 1px;line-height: 150px"><?php echo $set['ProductID']?></th>
                <th style="border-right:#000 dashed 1px"><a href=""><img src="<?php echo '../controller/images/'.$set['ProductImage'] ?>" width="150px"/></a></th>
                <th style="border-right:#000 dashed 1px"><?php echo $set['ProductName']?></th>
                <th style="border-right:#000 dashed 1px"><?php echo number_format($set['ProductPrice'])?></th>
                <th style="border-right:#000 dashed 1px"><a href="?action=update_product&id=<?php echo "$set[ProductID]";?>">Sửa</a></th>
                <th style="border-right:#000 dashed 1px"><a href="?action=delete_product&ProductID=<?php echo "$set[ProductID]";?>">Xóa</a></th>
                      
           </center>
           
           <?php
        if($dem%1==0)
       {
        echo '</tr><tr>';
       }
        endwhile;
      
      ?>
        
          </tr>
          
 
            
            <?php 
            
            if($page > 1) { //hien thi so trang
                
                $next = $start + $display;
                $prev = $start - $display;
                $current = ($start/$display)+1;?>
                <center><table class="products_list_pages">
                        <tr>
                            <?php  //Hiển thị trang trước
                                if($current !=1) {
                                echo "<td><a href='index.php?action=$action&start=$prev&page=$page'>Previous</a></td>";
                                } ?>
                            
                            <?php //Hiển thị số link trang
                                for($i=1;$i<=$page;$i++) {
                                    if($current != $i) {
                                    echo "<td><a href='index.php?action=$action&start=".($display*($i-1))."&page=$page'>$i</a></td>";
                                } else {
                                    echo "<td class='current'>$i</td>";
                                }
                                } //kết thúc vòng lặp for
                               ?>
                            
                                <?php //Hiển thị trang kế tiếp

                                 if($current != $page) {
                                     echo "<td><a href='index.php?action=$action&start=$next&page=$page'>Next</a></td>";
                                 }

                                }
                                ?>
                        </tr>
                
                </table></center>



</table>
</center>
</body>
</html>                
<?php include "../view/website/footer.php";?>
