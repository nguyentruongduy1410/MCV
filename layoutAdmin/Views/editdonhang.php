<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Trạng Thái Đơn Hàng</title>
</head>

<body>
<a href="index.php?trang=qldonhang" style="text-decoration: none; font-size: 24px; color: red;">&times;</a>
    <form action="index.php?trang=qldonhang&lenh=capnhat&id=<?php echo $don_hang[0]['id']; ?>" method="POST" enctype="multipart/form-data">
        <label>Trạng Thái Đơn Hàng:</label>
        <select name="trangthai_dh" id="">
            <option value=""><?php echo $don_hang[0]['trangthai_dh']; ?></option>
            <option>Đang xử lý</option>
            <option>Đang đóng gói sản phẩm</option>
            <option>Đang giao hàng</option>
            <option>Đã giao hàng</option>
            </option>
        </select>
        <br><br>

        <label>Trạng Thái Thanh Toán:</label>
        <select name="trangthai_tt" id="">
            <option>Chưa thanh toán</option>
            <option>Đã thanh toán</option>
        </select>


        <br><br>

        <button type="submit">Cập Nhật</button>
    </form>
</body>

</html>