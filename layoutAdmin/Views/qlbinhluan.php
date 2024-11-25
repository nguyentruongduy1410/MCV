
    <div class="content">
        <h1>Danh Sách Bình Luận</h1>
        <table class="comment-table">
            <thead>
                <tr>
                    <th>Mã</th>
                    <th>Nội Dung</th>
                    <th>Người Dùng</th>
                    <th>Bài Viết</th>
                    <th>Ngày</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Bài viết rất hay và ý nghĩa!</td>
                    <td>Nguyễn Văn A</td>
                    <td>Đàn Tranh Việt Nam</td>
                    <td>20/11/2024</td>
                    <td>
                        <button class="btn edit" onclick="openEditModal(1)">Sửa</button>
                        <button class="btn delete">Xóa</button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Cảm ơn bạn đã chia sẻ!</td>
                    <td>Trần Thị B</td>
                    <td>Sáo Trúc Việt Nam</td>
                    <td>21/11/2024</td>
                    <td>
                        <button class="btn edit" onclick="openEditModal(2)">Sửa</button>
                        <button class="btn delete">Xóa</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div class="modal" id="commentModal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h2 id="modalTitle">Sửa Bình Luận</h2>
        <form id="commentForm">
            <div class="form-group">
                <label for="commentContent">Nội Dung Bình Luận</label>
                <textarea id="commentContent" name="commentContent" rows="5"></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" onclick="closeModal()">Hủy</button>
                <button type="submit" class="btn edit">Lưu</button>
            </div>
        </form>
    </div>
</div>

<script>
    const modal = document.getElementById('commentModal');
    const modalTitle = document.getElementById('modalTitle');
    const commentForm = document.getElementById('commentForm');
    const commentContent = document.getElementById('commentContent');

    // Mở modal sửa bình luận
    function openEditModal(commentId) {
        modal.style.display = 'flex';
        modalTitle.textContent = 'Sửa Bình Luận';
        commentContent.value = 'Nội dung bình luận mẫu'; // Thay bằng nội dung thực tế nếu có API
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
