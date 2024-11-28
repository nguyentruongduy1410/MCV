<div class="content">
    <h1>Danh Sách Bài Viết Sản Phẩm</h1>

    <button class="btn add" id="addPostBtn">Thêm Bài Viết</button>

    <table class="post-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên Sản Phẩm</th>
                <th>Bài Viết</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody id="postTableBody">
            <tr data-id="1">
                <td>1</td>
                <td>Laptop Dell XPS 13</td>
                <td>Bài viết giới thiệu sản phẩm Laptop Dell XPS 13. Đây là một chiếc laptop mạnh mẽ với thiết kế sang trọng.</td>
                <td>
                    <button class="btn edit" onclick="editPost(1)">Sửa</button>
                    <button class="btn secondary" onclick="deletePost(1)">Xóa</button>
                </td>
            </tr>
            <tr data-id="2">
                <td>2</td>
                <td>Smartphone iPhone 15</td>
                <td>Bài viết về iPhone 15 với nhiều tính năng vượt trội như camera 48MP, màn hình ProMotion và nhiều cải tiến khác.</td>
                <td>
                    <button class="btn edit" onclick="editPost(2)">Sửa</button>
                    <button class="btn secondary" onclick="deletePost(2)">Xóa</button>
                </td>
            </tr>
            <tr data-id="3">
                <td>3</td>
                <td>Tai Nghe Sony WH-1000XM5</td>
                <td>Bài viết giới thiệu về tai nghe Sony WH-1000XM5 với khả năng cách âm cực tốt và chất lượng âm thanh tuyệt vời.</td>
                <td>
                    <button class="btn edit" onclick="editPost(3)">Sửa</button>
                    <button class="btn secondary" onclick="deletePost(3)">Xóa</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<!-- Add Post Modal -->
<div id="addPostModal" class="modal">
    <div class="modal-content">
        <span class="close" id="closeAddModal">&times;</span>
        <h2>Thêm Bài Viết Sản Phẩm</h2>
        <form id="addPostForm">
            <div class="form-group">
                <label for="productName">Tên Sản Phẩm</label>
                <input type="text" id="productName" name="productName" required>
            </div>
            <div class="form-group">
                <label for="productContent">Bài Viết</label>
                <textarea id="productContent" name="productContent" required></textarea>
            </div>
            <button type="submit" class="btn add">Thêm Bài Viết</button>
        </form>
    </div>
</div>

<!-- Edit Post Modal -->
<div id="editPostModal" class="modal">
    <div class="modal-content">
        <span class="close" id="closeEditModal">&times;</span>
        <h2>Sửa Bài Viết Sản Phẩm</h2>
        <form id="editPostForm">
            <input type="hidden" id="editPostId" name="postId">
            <div class="form-group">
                <label for="editProductName">Tên Sản Phẩm</label>
                <input type="text" id="editProductName" name="productName" required>
            </div>
            <div class="form-group">
                <label for="editProductContent">Bài Viết</label>
                <textarea id="editProductContent" name="productContent" required></textarea>
            </div>
            <button type="submit" class="btn edit">Lưu Thay Đổi</button>
        </form>
    </div>
</div>

<script>
    // Hiển thị modal để thêm bài viết
    document.getElementById('addPostBtn').onclick = function() {
        document.getElementById('addPostModal').style.display = 'block';
    };

    // Đóng modal thêm bài viết
    document.getElementById('closeAddModal').onclick = function() {
        document.getElementById('addPostModal').style.display = 'none';
    };

    // Đóng modal sửa bài viết
    document.getElementById('closeEditModal').onclick = function() {
        document.getElementById('editPostModal').style.display = 'none';
    };

    // Hàm để mở modal sửa bài viết
    function editPost(id) {
        const row = document.querySelector(`tr[data-id='${id}']`);
        const productName = row.cells[1].innerText;
        const productContent = row.cells[2].innerText;

        document.getElementById('editPostId').value = id;
        document.getElementById('editProductName').value = productName;
        document.getElementById('editProductContent').value = productContent;

        document.getElementById('editPostModal').style.display = 'block';
    }

    // Hàm xóa bài viết
    function deletePost(id) {
        if (confirm('Bạn có chắc chắn muốn xóa bài viết này không?')) {
            const row = document.querySelector(`tr[data-id='${id}']`);
            row.remove();
        }
    }

    // Lắng nghe sự kiện gửi form thêm bài viết
    document.getElementById('addPostForm').onsubmit = function(event) {
        event.preventDefault();

        const productName = document.getElementById('productName').value;
        const productContent = document.getElementById('productContent').value;

        let tableBody = document.getElementById('postTableBody');
        let newRow = tableBody.insertRow();
        newRow.setAttribute('data-id', tableBody.rows.length + 1);
        newRow.innerHTML = `
            <td>${tableBody.rows.length + 1}</td>
            <td>${productName}</td>
            <td>${productContent}</td>
            <td>
                <button class="btn edit" onclick="editPost(${tableBody.rows.length})">Sửa</button>
                <button class="btn secondary" onclick="deletePost(${tableBody.rows.length})">Xóa</button>
            </td>
        `;

        document.getElementById('addPostModal').style.display = 'none';
    };

    // Lắng nghe sự kiện gửi form sửa bài viết
    document.getElementById('editPostForm').onsubmit = function(event) {
        event.preventDefault();

        const postId = document.getElementById('editPostId').value;
        const productName = document.getElementById('editProductName').value;
        const productContent = document.getElementById('editProductContent').value;

        const row = document.querySelector(`tr[data-id='${postId}']`);
        row.cells[1].innerText = productName;
        row.cells[2].innerText = productContent;

        document.getElementById('editPostModal').style.display = 'none';
    };
</script>

</body>
</html>