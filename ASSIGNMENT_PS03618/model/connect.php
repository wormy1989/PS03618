 <?php
        class connect {
            // Khởi tạo thuộc tính cho lớp connect
            var $db=null;
            //Kết nối database
            public function __construct()
            {
                $conn='mysql:host=localhost;dbname=nikeshop';
                $user='root';
                $pass='';
                $this->db=new PDO($conn,$user,$pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            }
        
            // Lấy tất cả dữ liệu từ database
            public function getList($select)
            {
                $results = $this->db->query($select);
                return $results;
            }
            
            //Tạo phương thức lấy 1 kết quả của bảng
            
             public function getInstance($select)
             { 
                $results = $this->db->query($select);
                $result = $results->fetch();
                return $result;                
             }
            
            //Tạo phương thức thực thi các câu lệnh Insert, Update, Delete:
            public function exec($query)
             {
                $result = $this->db->exec($query);
                return $result; 
             }
        }
        ?>