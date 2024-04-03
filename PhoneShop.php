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
        echo '<div class="products">
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
            <a href="AddCart.php?id='.$row['id'].'&Ten='.$row['Ten'].'&Gia='.$row['Gia'].'">Mua</a>
        </div>
    </div>';
    }
        ?>
    </div>
</body>