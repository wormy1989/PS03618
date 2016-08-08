<?php
class customer 
{
    var $id = null; 
    var $username = null; 
    var $password = null;
    var $name = null; 
    var $email = null;
    var $phone = null;
    
    public function __construct() {} 
    
    public function checkUser($username,$password) 
    { 
        $db = new connect();               
        $select="select * from user where UserName='$username' and Password='$password'"; 
        $result = $db->getInstance($select); 
        //echo $select; 
        if($result!=null) 
            return true; 
        else 
            return false; 
    }
    
    public function userid($username,$password) 
    { 
        $db = new connect();               
        $select="select UserID from user where Username='$username' and Password='$password'"; 
        $result = $db->getInstance($select);
        return $result;
    }
    
    public function permision($username,$password) 
    { 
        $db = new connect(); 
        $select = "select * from user where Username='$username' and Password='$password' "; 
        return $db->getList($select); 
       
    }   
    public function checkPassword($username,$email) 
    { 
        $db = new connect();               
        $select="select * from user where Username='$username' or Email='$email'"; 
        $result = $db->getInstance($select); 
        //echo $select; 
        if($result!=null) 
            return true; 
        else 
            return false; 
    }
    public function checkaddUser($username){
        
        $db = new connect();                   
        $select = "SELECT * FROM user WHERE Username = '$username'";      
        $result = $db->getInstance($select); 
        if($result!=null) 
            return true; 
        else 
            return false; 
       
    } 
    public function getPassword(){ 
        $pass_length = 8;         
        $symbol = "~!@#$%^&*(){}[];?><,./"; 
        $symbol_count = strlen($symbol); 
        $index = mt_rand(0,$symbol_count); 
        $this->password = substr($symbol,$index,1); 
        $this->password .= chr(mt_rand(48,57)); 
        $this->password .= chr(mt_rand(65,90));
        while(strlen($this->password) < $pass_length) 
        { 
            $this->password .= chr(mt_rand(97,122)); 
        }                
        $this->password = str_shuffle($this->password);         
        return $this->password; 
    }
    
    public function checkInfo($username,$email)
     {
        $db = new connect(); 
        $select="select * from users where Username='$username' and Email='$email'";
        $result = $db->getInstance($select);
        // echo $select;
        if($result!=null)
        return true;
        else
        return false;
    }    
    public function insertUser($username,$password,$fullname,$email,$phone)
    { 
        $db = new connect();
        $query = "INSERT INTO user (Username,Password,FullName,Email,Phone) VALUES ('$username','$password','$fullname','$email','$phone')";
        $db->exec($query);
    } 
    function updateUser($id, $fullname, $email, $phone, $avatar)
                {
        $db = new connect();
        $select = "update user set Fullname = '$fullname',Email = '$email',Phone = '$phone',Avatar='$avatar' where userid=$id";
        $result = $db ->exec($select);
        return $result;
    }
    function getInfoById($username)
    {
            $db = new connect();
            $select = "select * from user where Username='$username'";
            $result = $db->getList($select);
            $quest = $result->fetch();
            return $quest;
    }  
    function getListExceptUser($username){
        $db = new connect();
        $select = "select * from user where username <> '$username'";
        $result = $db ->getList($select);
        return $result;
    }
    function getListPageExceptUser($username,$from,$to)
    {
        $db = new connect();
        $select = "select * from user where username <> '$username' limit $from,$to";
        $result = $db ->getList($select);
        return $result;
    }
    function getUserByUserName($username){
        $db = new connect();
        $select = "select * from user where username = '$username'";
        $result = $db ->getInstance($select);
        return $result;
    }
    function countUser()
    {
        $db = new connect();
        $select = "select count(*) from user";
        $result = $db ->getInstance($select);
        return $result[0];
    }
    function changePass($id,$password)
    {
        $db = new connect();
        $select = "update user set Password = '$password' where UserId='$id'" ;
        $result = $db ->getInstance($select);
        return $result[0];
    }
}
?>
