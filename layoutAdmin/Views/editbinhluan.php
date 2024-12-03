<!DOCTYPE html>
<html>
<head>
    <title>Sửa Bình Luận</title>
</head>
<body>
    <form action="index.php?trang=qlbinhluan&lenh=sua&id=<?php echo $binhluanInfo['id']; ?>" method="post">
        <div>
            <label for="noi_dung">Nội Dung:</label>
            <textarea id="noi_dung" name="noi_dung" required><?php echo $binhluanInfo['noi_dung']; ?></textarea>
        </div>
        <button type="submit">Lưu Thay Đổi</button>
    </form>
</body>
</html>
