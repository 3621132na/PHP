<?php
session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <body>
        <form action="" method="post">
            <table>
                <tr>
                    <th>QUẢN LÝ SINH VIÊN</th>
                </tr>
                <tr>
                    <td>Mã sinh viên</td>
                    <td>
                        <input type="text" size="10" name="txtMa"/>
                    </td>
                </tr>
                <tr>
                    <td>Tên sinh viên</td>
                    <td>
                        <input type="text" size="50" name="txtTen"/>
                    </td>
                </tr>
                <tr>
                    <td>Lớp</td>
                    <td>
                        <input type="text" size="20" name="txtLop"/>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" value="Thêm"name="btnThem"/>
                    </td>
                </tr>
                <tr>
                    <table>
                        <tr>
                            <th colspan="4">DANH SÁCH SINH VIÊN</th>
                        </tr>
                        <tr>
                            <td>Mã sinh viên</td>
                            <td>Tên sinh viên</td>
                            <td>Xóa</td>
                        </tr>
                        <?php
                        require_once('MySQLiCONNECT.php');
                        $mysqli=new MYSQLI_OBJECT();
                        $_SESSION['connection']=serialize($mysqli);
                        if(isset($_POST['btnThem'])){
                            if(empty($_POST['txtMa'])||empty($_POST['txtTen'])||empty($_POST['txtLop']))
                                return;
                            $query='INSERT INTO tblSINHVIEN VALUES (?, ?, ?)';
                            $stmt=$mysqli->GetMySQL()->prepare($query);
                            $stmt->bind_param('sss', $_POST['txtMa'],$_POST['txtTen'],$_POST['txtLop']);
                            $stmt->execute();
                        }
                        $query="SELECT * FROM tblSINHVIEN";
                        $result=$mysqli->query($query);
                        while($row=$result->fetch_assoc()){
                            echo '<tr><td>'.$row['Ma'].'</td>';
                            echo '<td>'.$row['Ten'].'</td>';
                            echo '<td><a href="MySQLProcess.php?Ma='.$row['Ma'].'">Xóa</a></td></td>';
                        }
                        ?>
                    </table>
                </tr>
            </table>
        </form>
    </body>