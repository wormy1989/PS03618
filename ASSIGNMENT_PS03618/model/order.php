<?php
class hoadon {
    public function __construct() {}   
    // Tạo hóa đơn khi người dùng nhấn nút Thanh toán
    // Thêm danh sách chi tiết sản phẩm từng hóa đơn
    public function insertOrder($cus,$productname,$productprice,$quantity)
    {
        $db = new connect();
        $date = new DateTime("now");
        $orderdate = $date->format("Y-m-d");
        $query = "INSERT INTO nikeshop.order(OrderID,OrderDate,Customer,ProductName,ProductPrice,Quantity) VALUES (null,'$orderdate','$cus','$productname','$productprice','$quantity')";
        $db->exec($query); $int = $db->getInstance("select OrderID from nikeshop.order order by OrderID desc limit 1");
        return $int[0];
    }
    public function insertOrderDetail($productname,$productprice,$quantity,$total)
    {
        $db = new connect();
        $query = "insert into nikeshop.orderdetail(ProductName,ProductPrice,Quantity,Totals) values('$productname','$productprice','$quantity','$total')";
        $db->exec($query); $int = $db->getInstance("select OrderID from nikeshop.order order by OrderID desc limit 1");
        return $int[0];
    }  
    function getListPageOrder($from,$to)
    {
        $db=new connect();
        $select = "select * from order ORDER BY OrderID DESC limit $from,$to";
        $result=$db->getList($select);
        return $result;
    }
    function CountOrder()
    {
        $db = new connect();
        $select = "select Count(*) from order";
        $result = $db->getList($select);
        return $result; 
    }
}
?>
