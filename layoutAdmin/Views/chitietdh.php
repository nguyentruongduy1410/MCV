
<div class="content">
<a href="index.php?trang=qldonhang" style="text-decoration: none; font-size: 24px; color: red;">&times;</a>

            <h1>Danh sách đơn hàng</h1>
            <table class="order-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Ngày đặt hàng</th>
                        <th>Tên khách hàng</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
                        <th>Tổng tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $ch ='';
                        foreach ( $qldonhangmodel -> ctdh as $key => $value){
                            $ch .= '
                                    <tr>
                                        <td>'.$value['id'].'</td>
                                        <td>'.$value['ngay_dat'].'</td>
                                        <td>'.$value['ten'].'</td>
                                        <td>'.$value['email'].'</td>
                                        <td>'.$value['sdt'].'</td>
                                        <td>'.$value['diachi'].'</td>
                                        <td>'.number_format($value['tong_tien']).'đ</td>                                        
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
