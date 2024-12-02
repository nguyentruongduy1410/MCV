

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
//     window.onclick = function (event) {
//     const addModal = document.getElementById('addModal');
//     const editModal = document.getElementById('editModal');

//     if (event.target === addModal) addModal.style.display = 'none';
//     if (event.target === editModal) editModal.style.display = 'none';
// };

    // Mở modal Thêm Danh Mục
    function openAddModal() {
        document.getElementById('addModal').style.display = 'flex';
    }

    // Mở modal Sửa Danh Mục
    function openEditModal(id, name) {
        document.getElementById('editModal').style.display = 'flex';
        document.getElementById('editCategoryId').value = id;
        document.getElementById('editCategory').value = name;
    }

    // Đóng modal
    function closeModal(modalId) {
        document.getElementById(modalId).style.display = 'none';
    }

    // Đóng modal khi nhấn bên ngoài
    window.onclick = function (event) {
        const addModal = document.getElementById('addModal');
        const editModal = document.getElementById('editModal');
        if (event.target === addModal) addModal.style.display = 'none';
        if (event.target === editModal) editModal.style.display = 'none';
    };

    // Handle form submission for adding a new category
    // document.getElementById('addForm').onsubmit = function(event) {
    //     event.preventDefault();
        
    //     var formData = new FormData(this);

    //     // Use AJAX to submit the form data to the server
    //     var xhr = new XMLHttpRequest();
    //     xhr.open("POST", "path_to_your_server_endpoint_for_adding_category", true);
    //     xhr.onload = function () {
    //         if (xhr.status === 200) {
    //             // Successfully added the category
    //             alert('Category added successfully!');
    //             location.reload(); // Reload the page to reflect the new category
    //         } else {
    //             alert('Failed to add category.');
    //         }
    //     };
    //     xhr.send(formData);

    //     closeModal('addModal');
    // }

    // Handle form submission for editing a category
    document.getElementById('editForm').onsubmit = function(event) {
        event.preventDefault();
        
        var formData = new FormData(this);

        // Use AJAX to submit the form data to the server
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "path_to_your_server_endpoint_for_editing_category", true);
        xhr.onload = function () {
            if (xhr.status === 200) {
                // Successfully edited the category
                alert('Category edited successfully!');
                location.reload(); // Reload the page to reflect the changes
            } else {
                alert('Failed to edit category.');
            }
        };
        xhr.send(formData);

        closeModal('editModal');
    }
</script>

</body>
</html>