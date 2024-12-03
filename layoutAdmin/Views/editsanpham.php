<div class="content">
    <h1>Sửa Sản Phẩm</h1>
    <form action="index.php?trang=qlsanpham&lenh=sua&id=<?php echo $productInfo['id']; ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="productName">Tên Sản Phẩm</label>
            <input type="text" id="productName" name="ten_sp" value="<?php echo $productInfo['ten_sp']; ?>" required>
        </div>
        <div class="form-group">
            <label for="productCategory">Danh Mục</label>
            <input type="text" id="productCategory" name="id_dm" value="<?php echo $productInfo['id_dm']; ?>" required>
        </div>
        <div class="form-group">
            <label for="productPrice">Giá</label>
            <input type="number" id="productPrice" name="gia_sp" value="<?php echo $productInfo['gia_sp']; ?>" required>
        </div>
        <div class="form-group">
            <label for="productDiscount">Giá Giảm</label>
            <input type="number" id="productDiscount" name="giamgia_sp" value="<?php echo $productInfo['giamgia_sp']; ?>">
        </div>
        <div class="form-group">
            <label for="productImage">Ảnh</label>
            <input type="file" id="productImage" name="hinh_sp">
        </div>
        <div class="form-group">
            <label for="productDescription">Mô Tả</label>
            <textarea id="productDescription" name="thong_tin_sp"><?php echo $productInfo['thong_tin_sp']; ?></textarea>
        </div>
        <button type="submit" class="btn add">Cập Nhật</button>
    </form>
</div>
