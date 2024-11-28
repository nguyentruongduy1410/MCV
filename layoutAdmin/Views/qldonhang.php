
        <div class="content">
            <h1>Danh sách đơn hàng</h1>
            <table class="order-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên sản phẩm</th>
                        <th>Ảnh</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <th>Địa chỉ khách hàng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $ch ='';
                        foreach ( $qldonhangmodel -> dsdh as $key => $value){
                            $ch .= '
                                    <tr>
                                        <td>'.$value['id'].'</td>
                                        <td>'.$value['id_sp'].'</td>
                                        <td><img src="./Public/img/'.$value['id_sp'].'" alt=""></td>
                                        <td>'.$value['so_luong'].'</td>
                                        <td>'.$value['gia'].'</td>

                                        <td><textarea class="admin-note" placeholder="Thêm ghi chú..."></textarea></td>
                                        <td>123 Đường ABC, Phường XYZ, Thành phố H</td>
                                    </tr>

                            ';
                        }
                    ?>
                   
                    
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
