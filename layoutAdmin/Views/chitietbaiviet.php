
<div class="content">
<a href="index.php?trang=qlbaiviet" style="text-decoration: none; font-size: 24px; color: red;">&times;</a>

            <h1>Danh sách đơn hàng</h1>
            <table class="order-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Bài viết</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $ch ='';
                        foreach ( $post -> xem as $key => $value){
                            $ch .= '
                                    <tr>
                                        <td>'.$value['id'].'</td>
                                        <td>'.$value['noi_dung'].'</td>
                                    </tr>
                            ';
                        }
                        echo $ch;
                    ?>
                   
                    
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
