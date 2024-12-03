<div class="content">
    <h1>Danh Sách Bình Luận</h1>
    <table class="comment-table">
        <thead>
            <tr>
                <th>Mã</th>
                <th>Nội Dung</th>
                <th>Người Dùng</th>
                <th>ID Sản Phẩm</th>
                <th>Ngày</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $ch = '';
            foreach ($dsbl as $key => $value) {
                $ch .= '
                    <tr>
                        <td>' . $value['id'] . '</td>
                        <td>' . $value['noi_dung'] . '</td>
                        <td>' . $value['id_user'] . '</td>
                        <td>' . $value['id_sp'] . '</td>
                        <td>' . $value['ngay_bl'] . '</td>
                        <td>
                            <a href="index.php?trang=qlbinhluan&lenh=sua&id=' . $value['id'] . '"><button class="btn edit">Sửa</button></a>
                            <a href="index.php?trang=qlbinhluan&lenh=xoa&id=' . $value['id'] . '"><button class="btn delete">Xóa</button></a>
                        </td>
                    </tr>
                ';
            }
            echo $ch;
            ?>
        </tbody>
    </table>
</div>
