<?php

    class sanpham 
    {
    var $ProductID = null;
    var $ProductName = null;
    var $ProductImage ="images/";
    var $ProductPrice =null;
    var $ProductDesc =null;
    var $ProductGroup =null;
    
    public function __construct() { }
    // Lấy danh sách sản phẩm từ database
    function getList()
    {
         $db = new connect();
         $select = "select * from product";
         $result = $db->getList($select);
         return $result;
    }
    //Thêm sản phẩm mới 
    function Addproduct($tensanpham,$image,$price,$mota)
     {
            $db = new connect();
            $query = "INSERT INTO product(ProductName,ProductImage,ProductPrice,ProductDesc) VALUES ('$tensanpham','$image','$price','$mota')";
            $db->exec($query);
     }
     //Update sản phẩm
    function Editproduct($tensanpham,$image,$price,$mota,$id)
     {
         $db = new connect();
         $query = "UPDATE product set ProductName='$tensanpham',ProductImage='$image',ProductPrice='$price',ProductDesc='$mota' where ProductID='$id'";
         $db->exec($query);
     }
     //Xoá sản phẩm
    function Deleteproduct($id)
        {
            $db = new connect();
            $query = "delete from product where ProductID = '$id'";
            $db->exec($query);
        }
    function getList_DESC()
    {
         $db = new connect();
         $select = "select * from product ORDER BY ProductID DESC";
         $result = $db->getList($select);
         return $result;
     }
     
     // Lấy danh sách sản phẩm có liệt kê theo trang
     function getListPage($from,$to)
    {
         $db = new connect();
         $select = "select * from product ORDER BY ProductID DESC limit $from,$to";
         $result = $db->getList($select);
         return $result;
    }
     
    function getListPageOrderProduct($from,$to)
    {
         $db = new connect();
         $select = "select * from product ORDER BY ProductID DESC limit $from,$to";
         $result = $db->getList($select);
         return $result;
    }
     function CountProduct()
    {
        $db = new connect();
        $select = "select Count(*) from product";
        $result = $db->getInstance($select);
        return $result; 
    }
    
     function CountProductAll()
    {
        $db = new connect();
        $select = "select Count(*) from product";
        $result = $db->getInstance($select);
        return $result; 
    }
     
     // Lấy thông tin chi tiết sản phẩm theo ID
     function getProductById($id)
    {
         $db = new connect();
         $select = "select * from product where ProductID='$id'";
         $result=$db->getInstance($select);
         return $result;
    }
}     
?>

