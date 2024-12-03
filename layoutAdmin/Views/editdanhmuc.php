<!-- Views/editdanhmuc.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Sửa Danh Mục</title>
</head>
<body>
    <div class="modal-content">
        <span class="close" onclick="closeEditModal()">&times;</span>
        <h2>Sửa Danh Mục</h2>
        <form id="editCategoryForm" action="index.php?trang=danhmuc&lenh=sua&id=<?php echo $danhmucInfo['id']; ?>" method="post">
            <div class="form-group">
                <label for="edit_ten_dm">Tên Danh Mục</label>
                <input type="text" id="edit_ten_dm" name="ten_dm" value="<?php echo $danhmucInfo['ten_dm']; ?>" required>
            </div>
            <button type="submit" class="btn edit">Lưu Thay Đổi</button>
        </form>
    </div>
</body>
</html>
