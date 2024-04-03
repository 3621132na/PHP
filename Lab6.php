<body>
    <div id="wrapper">
        <?php
        require_once('DbAccess.php');
        $mysqli=new DbConnect();
        $results=$mysqli->query('SELECT * FROM tblPhone');
        while($row=$results->fetch_assoc()){
            echo '<div class="product">
            <div class="image">
                <img src="images/'.$row['Anh'].'"/>
            </div>
            <div class="title">
                <a href="#">'.$row['Ten'].'</a>
            </div>
            <div class="price">'.$row['Gia'].'đ</div>
        </div>';
        }
        ?>
    </div>
</body>