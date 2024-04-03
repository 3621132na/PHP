<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION['User']))
    echo '<script type="text/javascript">window.location="Login.php"</script>'
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<body>
    <div id="wrapper">
        <form action="" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td></td>
                    <td>
                        <?php
                        echo 'Xin chào'.$_SESSION['User'].'<a href="Thoat.php">Thoát</a>';
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Tên điện thoại</td>
                    <td>
                        <input type="text" name="txtName"/>
                    </td>
                </tr>
                <tr>
                    <td>Giá điện thoại</td>
                    <td>
                        <input type="number" name="txtPrice" min="0" max="300000000"/>
                    </td>
                </tr>
                <tr>
                    <td>Ảnh</td>
                    <td>
                        <input type="file" name="txtImage"/>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" value="Thêm"name="btnAdd"/>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <?php
    require_once('DbAccess.php');
    if (isset($_POST['btnAdd'])) {
        $ten=$_POST['txtName'];
        $gia=$_POST['txtPrice'];
        $file=$_FILES['txtImage'];
        move_uploaded_file($file['tmp_name'],'images/'.$file['name']);
        $mysqli=new DbConnect();
        $mysqli->executeInsertPhone($ten,$gia,$file['name']);
    }
    ?>
</body>
</html>