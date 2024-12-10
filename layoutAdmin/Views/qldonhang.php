
        <div class="content">
            <h1>Danh sách đơn hàng</h1>
            <table class="order-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Đơn hàng</th>
                        <th>Số lượng</th>
                        <th>Trạng thái đơn hàng</th>
                        <th>Trạng thái thanh toán</th>
                        <th>Hành động</th>


                    </tr>
                </thead>
                <tbody>
                    <?php
                        $ch ='';
                        foreach ( $qldonhangmodel -> dsdh as $key => $value){
                            $ch .= '
                                    <tr>
                                        <td>'.$value['id'].'</td>
                                        <td>'.$value['ten_sp'].'</td>
                                        <td>'.$value['so_luong'].'</td>
                                        <td>'.$value['trang_thai'].'</td>
                                        <td>'.$value['trang_thai_tt'].'</td>
                                        <td>
                                            <a href="index.php?trang=qldonhang&lenh=chitietdh&id='.$value['id'].'" class="nutxem">Xem thêm</a>
                                            <a href="index.php?trang=qldonhang&lenh=suatrangthai&id='.$value['id'].'"class="nutsua">Sửa trạng thái</a>
                                        </td>
                                        
                                    </tr>

                            ';
                        }
                        echo $ch;
                    ?>
                   <a href="" class="nutxem"></a>
                    
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
