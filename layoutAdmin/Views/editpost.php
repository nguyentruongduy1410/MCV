

<!-- Form chỉnh sửa bài viết -->
<form action="index.php?trang=qlbaiviet&lenh=sua&id=<?php echo $postInfo['id']; ?>" method="post" enctype="multipart/form-data">
    <div>
        <label for="ten_bv">Tên bài viết:</label>
        <input type="text" id="ten_bv" name="ten_bv" value="<?php echo htmlspecialchars($ten_bv); ?>" required>
    </div>

    <div>
        <label for="noi_dung">Nội dung:</label>
        <textarea id="noi_dung" name="noi_dung" required><?php echo htmlspecialchars($noi_dung); ?></textarea>
    </div>

    <div>
        <label for="hinh_anh">Hình ảnh:</label>
        <input type="file" id="hinh_anh" name="hinh_anh">
        <?php if ($hinh_anh): ?>
            <p>Hình ảnh hiện tại: <img src="<?php echo $hinh_anh; ?>" alt="Hình ảnh bài viết" width="100"></p>
        <?php endif; ?>
    </div>

    <div>
        <label for="ngay_dang">Ngày đăng:</label>
        <input type="date" id="ngay_dang" name="ngay_dang" value="<?php echo $ngay_dang; ?>" required>
    </div>

    <div>
        <label for="mo_ta">Mô tả:</label>
        <input type="text" id="mo_ta" name="mo_ta" value="<?php echo $postInfo['mo_ta']; ?>" required>


    </div>

    <button type="submit">Cập nhật bài viết</button>
</form>
