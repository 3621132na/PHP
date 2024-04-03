<?php
session_start();
require_once('MySQLiCONNECT.php');
if(isset($_SESSION['connection'])){
    $link=unserialize($_SESSION['connection']);
    if(isset($_REQUEST['Ma'])){
        $Ma=$_REQUEST['Ma'];
        $query='DELETE FROM tblSINHVIEN where Ma=?';
        $stmt=$link->GetMySQL()->prepare($query);
        $stmt->bind_param('s',$Ma);
        $stmt->execute();
    }
    echo '<script type="text/javascript">window.location="MYSQLI.php"</script>';
    exit();
}