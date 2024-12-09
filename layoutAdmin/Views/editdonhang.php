<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Trạng Thái Đơn Hàng</title>
</head>

<body>
<a href="index.php?trang=qldonhang" style="text-decoration: none; font-size: 24px; color: red;">&times;</a>

    <h2>Sửa Trạng Thái Đơn Hàng</h2>
    <form action="index.php?trang=qldonhang&lenh=capnhat&id=<?php echo $don_hang[0]['id']; ?>" method="POST"
        enctype="multipart/form-data">
        <label for="trangthai_dh">Trạng Thái Đơn Hàng:</label>
        <select name="trangthai_dh" id="">
            <option value="Đang xử lý" <?php echo ($don_hang[0]['trangthai_dh'] === "Đang xử lý") ? 'selected' : ''; ?>>
                Đang xử lý</option>
            <option value="Đã giao hàng" <?php echo ($don_hang[0]['trangthai_dh'] === "Đã giao hàng") ? 'selected' : ''; ?>>Đã giao hàng</option>
            <option value="Đã hủy" <?php echo ($don_hang[0]['trangthai_dh'] === "Đã hủy") ? 'selected' : ''; ?>>Đã hủy
            </option>
        </select>


        <br><br>

        <label for="trangthai_tt">Trạng Thái Thanh Toán:</label>
        <select name="trangthai_tt" id="">
            <option value="Chưa thanh toán" <?php echo ($don_hang[0]['trangthai_thanhtoan'] === "Chưa thanh toán") ? 'selected' : ''; ?>>Chưa thanh toán</option>
            <option value="Đã thanh toán" <?php echo ($don_hang[0]['trangthai_thanhtoan'] === "Đã thanh toán") ? 'selected' : ''; ?>>Đã thanh toán</option>
        </select>


        <br><br>

        <button type="submit">Cập Nhật</button>
    </form>
</body>

</html>