<?php
class Item
{
    private $id,$ten,$gia,$anh,$soluong;
    public function __construct($id,$ten,$gia,$anh)
    {
        $this->id=$id;
        $this->ten=$ten;
            $this->gia=$gia;
            $this->anh=$anh;
            $this->soluong=1;
    }
    public function __destruct()
    {
        $this->id=$this->ten=$this->gia=$this->anh=$this->soluong=null;
    }
    public function getId()
    {
        return $this->id;
    }
    public function getTen(){
        return $this->ten;
    }
    public function getGia(){
        return $this->gia;
    }
    public function getSL(){
        return $this->soluong;
    }
    public function setSL($soluong){
        $this->soluong=$soluong;
    }

}