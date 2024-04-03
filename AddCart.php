<?php
require_once('Cart.php');
session_start();
$cart;
if(!isset($_SESSION['Cart']))
    $cart=new Cart();
else
    $cart=unserialize($_SESSION['Cart']);
$id=$_REQUEST['id'];
$ten=$_REQUEST['ten'];
$gia=$_REQUEST['gia'];
$item=new Item($id,$ten,$gia,'');
$cart->InsertItem($item);
$_SESSION['Cart']=serialize($cart);
echo '<script type="text/javascript"> window.location="PhoneShop.php";</script>';