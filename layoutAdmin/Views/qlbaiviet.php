
    <div class="content">
        <h1>Danh Sách Bài Viết</h1>
        <table class="article-table">
            <thead>
            <button class="btn add" id="addArticleBtn">Thêm Bài Viết</button>

                <tr>
                    <th>Mã</th>
                    <th>Tiêu Đề</th>
                    <th>Ngày Viết</th>
                    <th>Mô tả</th>
                    <th>Nội dung</th>
                    <th>Hành Động</th>

                </tr>
            </thead>
            <tbody>
               <?php
                    $ch = '';
                    foreach ($qlbaivietmodel -> dsbv as $key => $value) {
                        $ch .= '
                             <tr>
                                <td>'.$value['id'].'</td>
                                <td>'.$value['ten_bv'].'</td>
                                <td>'.$value['ngay_dang'].'</td>
                                <td>'.$value['mo_ta'].'</td>
                                <td>'.$value['noi_dung'].'</td>

                                <td>
                                    <button class="btn edit" onclick="openEditModal(1)">Sửa</button>
                                    <button class="btn delete">Xóa</button>
                                </td>
                            </tr>
                        ';
                    }
                    echo $ch;
               ?>
                
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div class="modal" id="articleModal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h2 id="modalTitle">Thêm Bài Viết</h2>
        <form id="articleForm">
            <div class="form-group">
                <label for="title">Tiêu Đề</label>
                <input type="text" id="title" name="title" placeholder="Nhập tiêu đề bài viết">
            </div>
            <div class="form-group">
                <label for="author">Người Viết</label>
                <input type="text" id="author" name="author" placeholder="Nhập tên người viết">
            </div>
            <div class="form-group">
                <label for="date">Ngày Viết</label>
                <input type="date" id="date" name="date">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" onclick="closeModal()">Hủy</button>
                <button type="submit" class="btn add">Lưu</button>
            </div>
        </form>
    </div>
</div>

<script>
    const modal = document.getElementById('articleModal');
    const modalTitle = document.getElementById('modalTitle');
    const articleForm = document.getElementById('articleForm');

    // Mở modal thêm bài viết
    document.getElementById('addArticleBtn').addEventListener('click', function () {
        modal.style.display = 'flex';
        modalTitle.textContent = 'Thêm Bài Viết';
        articleForm.reset();
    });

    // Mở modal sửa bài viết
    function openEditModal(articleId) {
        modal.style.display = 'flex';
        modalTitle.textContent = 'Sửa Bài Viết';
        // Điền dữ liệu giả mẫu
        document.getElementById('title').value = 'Tiêu đề mẫu';
        document.getElementById('author').value = 'Người viết mẫu';
        document.getElementById('date').value = '2024-11-20';
    }

    // Đóng modal
    function closeModal() {
        modal.style.display = 'none';
    }

    // Đóng modal khi nhấn bên ngoài
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    };
</script>

</body>
</html>
