<?php
require_once('Cart.php');
session_start();
if (isset($_SESSION['Cart'])) {
    $cart=unserialize(($_SESSION['Cart']));
    $items=$cart->GetCart();
    $id=$_REQUEST['id'];
    switch($_REQUEST['type']){
        case '0':$items[$id]->setSL($items[$id]->getSL()+1);break;
        case '1':if($items[$id]->getSL()> 1){
            $items[$id]->setSL($items[$id]->getSL()-1);
                }
                else
                    $cart->RemoveItem($id);
                break;
        case '2':$cart->RemoveItem($id);break;
    }
    $_SESSION['Cart']=serialize($cart);
    echo '<script type="text/javascript"> window.location="ShowCart.php";</script>';
    include('ViewCart.php');
}
?>