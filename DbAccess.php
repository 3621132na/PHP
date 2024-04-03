<?php
class DbConnect{
    const host='localhost';
    const user='root';
    const pass='';
    const db= 'dbtest';
    private $link;
    public function __construct() {
        $this->link = new mysqli(self::host, self::user, self::pass, self::db);
        if(mysqli_connect_errno())
            echo mysqli_connect_errno();
    }
    public function __destruct() {
        $link=NULL;
    }
    public function query($query){
        return $this->link->query($query);
    }
    public function executeInsertPhone($ten,$gia,$anh){
        $query="INSERT INTO tblPhone(Ten, Gia, Anh) VALUES (?,?,?)";
        $stmt=$this->link->prepare($query);
        $stmt->bind_param('sss',$ten,$gia,$anh);
        return $stmt->execute();
    }
}
?>