<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <script type="text/javascript">
        function CreateXmlHttpRequest(){
            if(window.XMLHttpRequest)
                return new XMLHttpRequest();
            else if(window.ActiveXObject)
                return new ActiveXObject("Microsoft.XMLHTTP");
        }
        function AddCart(id,ten,gia){
            xmlHttp=CreateXmlHttpRequest();
            xmlHttp.onreadystatechange=function(){
                if(xmlHttp.readyState==4&&xmlHttp.status==200)
                    document.getElementById('count').innerHTML=xmlHttp.responseText;
            }
            url="AddCart.php?id="+id+"&ten="+ten+"&gia="+gia;
            xmlHttp.open("GET",url,true);
            xmlHttp.send();
        }
        </script>
    <title>SmartPhone Shop</title>
</head>
<body>
    
</body>
</html>
<body>
    <div id="wrapper">
        <?php
        require_once('DbAccess.php');
        require_once('Cart.php');
        $mysqli=new DbConnect();
        $results=$mysqli->query('SELECT * FROM tblPhone');
        $count=0;
        if(isset($_SESSION['Cart']))
            $count=unserialize($_SESSION['Cart'])->CountItem();
        echo '<div id="Cart">
        <a href="ShowCart.php">
            Giỏ hàng ('.$count.')
        </a>
    </div>';
    while($row=$results->fetch_assoc()){
        echo '<div class="products" style="display:inline-block;width:25%;">
        <div class="image">
            <img src="images/'.$row['Anh'].'"/>
        </div>
        <div class="title">
            <a href="#">
                '.$row['Ten'].'
            </a>
        </div>
        <div class="price">'.$row['Gia'].'</div>
        <div>
            <a href="AddCart.php?id='.$row['id'].'&ten='.$row['Ten'].'&gia='.$row['Gia'].'">Mua</a>
        </div>
    </div>';
    }
        ?>
    </div>
</body>