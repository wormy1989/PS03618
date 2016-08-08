<?php
class contact {
    //Khởi tạo thuộc tính cho lớp users
        var $id = null;
        var $name = null;
        var $email = null;
        var $phone = null;
        var $mess = null;
        
        public function __construct() { }
     //Khởi tạo phương thức lấy danh sách từ form liên hệ
        function getContactlist() 
        { 
            $db = new connect();
            $select = "select * from contacts";
            return $db->getList($select);
        }              
     //Lấy thông tin từ contact theo ID
        function getListById($id)
         {
            $db = new connect();
            $select = "select * from contacts where ContactID='$id'";
            $result = $db->getList($select);
            $quest = $result->fetch();
            return$quest;
         }  
         
      //Khai báo phương thức thêm thông tin từ form liên hệ
         function addContact($Name,$Email,$Phone,$Mess)
          { 
            $db = new connect();
            $query = "INSERT INTO contacts(ContectName,ContactEmail,ContactPhone,ContactDecs) VALUES ('$Name','$Email','$Phone','$Mess')";
            $db->exec($query);
          }   
      
          //Khai báo phương thức xoá thông tin liên hệ
        function deleteContact($id)
         {
            $db = new connect();
            $query = "delete from contact where ContactID = $id";
            $db->exec($query);
         }
            function CountContact()
        {
        $db = new connect();
        $select = "select Count(*) from contact";
        $result = $db->getInstance($select);
        return $result; 
        }
        
        function getListPageContact($from,$to)
        {
         $db = new connect();
         $select = "select * from contact ORDER BY ContactID DESC limit $from,$to";
         $result = $db->getList($select);
         return $result;
        }
}
?>
