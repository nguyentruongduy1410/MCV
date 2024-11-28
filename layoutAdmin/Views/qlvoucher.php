
    <div class="content">
        <h1>Danh Sách Voucher Giảm Giá</h1>
        
        <!-- Mục lọc voucher -->
        <div class="filter">
            <input type="text" placeholder="Tìm kiếm voucher..." />
            <select>
                <option value="">Tất cả danh mục</option>
                <option value="active">Đang hoạt động</option>
                <option value="expired">Đã hết hạn</option>
            </select>
        </div>
        
        <button class="btn add">Thêm Voucher</button>
        <table class="voucher-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Mã Voucher</th>
                    <th>Giá Trị (%)</th>
                    <th>Ngày Bắt Đầu</th>
                    <th>Ngày Kết Thúc</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $ch = '';
                    foreach($qlvouchermodel -> dsvc as $key => $value){
                        $ch .= '
                            <tr>
                                <td>'.$value['id_gg'].'</td>
                                <td>'.$value['code_giam_gia'].'</td>
                                <td>'.$value['so_tien_giam'].'</td>
                                <td>01-06-2024</td>
                                <td>31-08-2024</td>
                                <td>
                                    <button class="btn edit">Sửa</button>
                                    <button class="btn delete">Xóa</button>
                                </td>
                            </tr>

                        ';

                    }
                    echo $ch;
                ?>
               
                
                
                <!-- Thêm nhiều dòng voucher hơn nếu cần -->
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
