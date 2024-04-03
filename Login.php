<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
        <link rel="stylesheet" type="text/css"href="style.css"/>
        <title>Đăng nhập</title>
</head>
<body>
    <div id="wrapper">
        <form action="" method="post">
            <table>
                <tr>
                    <td>Tên đăng nhập</td>
                    <td>
                        <input type="text" size="20" name="txtUser"/>
                    </td>
                </tr>
                <tr>
                    <td>Mật khẩu</td>
                    <td>
                        <input type="password" size="20" name="txtPass"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="Đăng nhập" name="btnLogin"/>
                    </td>
                    <td>
                        <input type="reset" value="Làm lại" name="btnReset"/>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <?php
    if(isset($_POST['btnLogin'])){
        if($_POST['txtUser'] == 'admin'&&$_POST['txtPass']=='admin'){
            $_SESSION['User']='admin';
            echo '<script type="text/javascript"> window.location="admin.php";</script>';
        }
        else{
            echo '<script type="text/javascript"> alert("Sai tên đăng nhập hoặc mật khẩu");</script>';
        }
    }
    ?>
</body>
</html>