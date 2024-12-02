<!-- Views/edituser.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Sửa Người Dùng</title>
</head>
<body>
    
    <form action="index.php?trang=qluser&lenh=sua&id=<?php echo $userInfo['id']; ?>" method="post">
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $userInfo['email']; ?>" required>
        </div>
        <div>
            <label for="vaitro">Vai Trò:</label>
            <select id="vaitro" name="vaitro" required>
                <option value="admin" <?php echo $userInfo['vaitro'] == 'admin' ? 'selected' : ''; ?>>Admin</option>
                <option value="user" <?php echo $userInfo['vaitro'] == 'user' ? 'selected' : ''; ?>>User</option>
            </select>
        </div>
        <div>
            <label for="mk">Mật khẩu:</label>
            <input type="password" id="mk" name="mk" value="<?php echo $userInfo['mk']; ?>" required>
        </div>
        <div>
            <label for="sdt">Số điện thoại:</label>
            <input type="text" id="sdt" name="sdt" value="<?php echo $userInfo['sdt']; ?>" required>
        </div>
        <div>
            <label for="diachi">Địa chỉ:</label>
            <input type="text" id="diachi" name="diachi" value="<?php echo $userInfo['diachi']; ?>" required>
        </div>
        <button type="submit" class="kk">Lưu Thay Đổi</button>
    </form>
</body>
</html>
