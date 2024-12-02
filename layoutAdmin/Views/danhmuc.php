

<div class="content">
    <h1>Danh Mục Sản Phẩm</h1>
    <button class="btn" onclick="openAddModal()">Thêm Danh Mục</button>
    <table class="category-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên Danh Mục</th>
                <th>Hình Danh Mục</th>

                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $ch = '';
                foreach ($danhmucmodel->dsdm as $key => $value) {
                    $ch .= '
                    <tr>
                        <td>' . $value['id'] . '</td>
                        <td>' . $value['ten_dm'] . '</td>
                         <td>' . $value['hinh_dm'] . '</td>
                        <td>
                            <a href="index.php?trang=danhmuc&lenh=sua&id='.$value['id'].'" onclick="openEditModal(' . $value['id'] . ', \'' . $value['ten_dm'] . '\')">Sửa</a> | 
                            <a href="index.php?trang=danhmuc&lenh=xoa&id='.$value['id'].'">Xóa</a>
                        </td>
                    </tr>
                    ';
                }
                echo $ch;
            ?>
            <!-- Các hàng khác -->
        </tbody>
    </table>
</div>

<!-- Modal Thêm Danh Mục -->
<div class="modal" id="addModal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('addModal')">&times;</span>
        <h2>Thêm Danh Mục</h2>
        <form action="index.php?trang=danhmuc&lenh=them" id="addForm" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="newCategory">Tên Danh Mục</label>
                <input type="text" name="tendm" id="newCategory" name="newCategory" required>
                <label for="editCategory">Hình Danh Mục</label>
                <input type="file" name="hinhdm" id="productImage" name="productImage" accept="image/*" required>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn secondary" onclick="closeModal('addModal')">Hủy</button>
                <button type="submit" name="them" class="btn">Thêm</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Sửa Danh Mục -->
<div class="modal" id="editModal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('editModal')">&times;</span>
        <h2>Sửa Danh Mục</h2>
        <form action="index.php?trang=danhmuc&lenh=capnhat&id=<?php $danhmucmodel[0]['id']; ?>" id="editForm" method="post">
            <input type="hidden" id="editCategoryId" name="editCategoryId">
            <div class="form-group">
                <label for="editCategory">Tên Danh Mục</label>
                <input type="text" id="editCategory" name="tendm" value="<?php echo $danhmucmodel[0]['tendm']; ?>" required>
                <label for="editCategory">Hình Danh Mục</label>
                <input type="file" id="productImage" name="productImage" accept="image/*" required>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn">Lưu</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openAddModal() {
    const addModal = document.getElementById('addModal');
    addModal.style.display = 'block';
}

function openEditModal(id, name) {
    const editModal = document.getElementById('editModal');

    // Điền thông tin danh mục vào form
    document.getElementById('editCategoryId').value = id; // Gán ID vào input ẩn
    document.getElementById('editCategory').value = name; // Gán tên danh mục vào input

    // Hiển thị modal sửa
    editModal.style.display = 'block';
}
function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    modal.style.display = 'none';
}

</script>

</body>
</html>