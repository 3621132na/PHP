<?php
$items=$cart->GetCart();
$titles=array("Tên điện thoại", "Giá", "Số lượng", "Thêm/Giảm/Xóa", "Thành tiền");
$total=0;
echo '<table>';
echo '<tr>';
foreach($titles as $title){
    echo '<th>'.$title.'</th>';
}
echo '</tr>';
foreach($items as $id=>$value){
    echo '<tr>';
    echo '<td>'.$value->GetTen().'</td>';
    echo '<td style="text-algin:right">'.$value->getGia().'</td>';
    echo '<td style="text-algin:right">'.$value->getSL().'</td>';
    $t=$value->getSL()*$value->getGia();
    $total+=$t;
    echo '<td>
        <a href="EditCart.php?type=0&id='.$id.'">Thêm</a>
        <a href="EditCart.php?type=1&id='.$id.'">Giảm</a>
        <a href="EditCart.php?type=2&id='.$id.'">Xóa</a>
        </td>
    ';
    echo '<td style="text-algin:right">'.$t.'</td>';
    echo '</tr>';
}
echo '<tr><td></td>
<td></td>
<td colspan="3" style="text-algin:right; color:red; font-weight:bold">Tổng tiền:'.$total.'</td></tr>';
echo '</table><br/><a href="PhoneShop.php">Trang chủ</a>';
?>