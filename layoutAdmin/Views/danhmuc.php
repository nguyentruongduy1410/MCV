<!-- Views/danhmuc.php -->
<div class="content">
    <h1>Danh Mục Sản Phẩm</h1>
    <button class="btn" onclick="openAddModal()">Thêm Danh Mục</button>
    <table class="category-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên Danh Mục</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $ch = '';
                foreach ($danhmucList as $key => $value) {
                    $ch .= '
                    <tr>
                        <td>' . $value['id'] . '</td>
                        <td>' . $value['ten_dm'] . '</td>
                        <td>
                            <a href="index.php?trang=danhmuc&lenh=sua&id='.$value['id'].'" onclick="openEditModal(' . $value['id'] . ', \'' . $value['ten_dm'] . '\')">Sửa</a> | 
                            <a href="index.php?trang=danhmuc&lenh=xoa&id='.$value['id'].'">Xóa</a>
                        </td>
                    </tr>
                    ';
                }
                echo $ch;
            ?>
        </tbody>
    </table>
</div>

<!-- Add Category Modal -->
<div id="addCategoryModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeAddModal()">&times;</span>
        <h2>Thêm Danh Mục</h2>
        <form id="addCategoryForm" action="index.php?trang=danhmuc&lenh=them" method="post">
            <div class="form-group">
                <label for="ten_dm">Tên Danh Mục</label>
                <input type="text" id="ten_dm" name="ten_dm" required>
            </div>
            <button type="submit" class="btn add">Thêm Danh Mục</button>
        </form>
    </div>
</div>

<script>
    function openAddModal() {
        document.getElementById('addCategoryModal').style.display = 'block';
    }

    function closeAddModal() {
        document.getElementById('addCategoryModal').style.display = 'none';
    }

    function openEditModal(id, ten_dm) {
        document.getElementById('editCategoryModal').style.display = 'block';
        document.getElementById('edit_id').value = id;
        document.getElementById('edit_ten_dm').value = ten_dm;
    }

    function closeEditModal() {
        document.getElementById('editCategoryModal').style.display = 'none';
    }
</script>
