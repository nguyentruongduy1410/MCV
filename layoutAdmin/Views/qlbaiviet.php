<div class="content">
    <h1>Danh Sách Bài Viết</h1>

    <button class="btn add" id="addPostBtn">Thêm Bài Viết</button>

    <!-- Add Post Modal -->
    <div id="addPostModal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeAddModal">&times;</span>
            <h2>Thêm Bài Viết</h2>
            <form action="index.php?trang=qlbaiviet&lenh=them" method="post">
                <div class="form-group">
                    <label for="ten_bv">Tiêu Đề</label>
                    <input type="text" id="ten_bv" name="ten_bv" required>
                </div>
                <div class="form-group">
                    <label for="noi_dung">Nội Dung</label>
                    <textarea id="noi_dung" name="noi_dung" required></textarea>
                </div>
                <div class="form-group">
                    <label for="hinh_anh">Hình Ảnh</label>
                    <input type="test" id="hinh_an" name="hinh_anh" required>
                </div>
                <div class="form-group">
                    <label for="ngay_dang">Ngày Đăng</label>
                    <input type="date" id="ngay_dang" name="ngay_dang" required>
                </div>
                <div class="form-group">
                    <label for="mo_ta">Mô Tả</label>
                    <input type="text" id="mo_ta" name="mo_ta" required>
                </div>
                <button type="submit" class="btn add" name="addPost">Thêm Bài Viết</button>
            </form>
        </div>
    </div>

    <table class="Post-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tiêu Đề</th>
                <th>Nội Dung</th>
                <th >Hình Ảnh</th>
                <th>Ngày Đăng</th>
                <th>Mô Tả</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $ch = '';
            foreach ($PostList as $key => $value) {
                $ch .= '
                    <tr>
                        <td>' . $value['id'] .'</td>
                        <td>' . $value['ten_bv'] . '</td>
                        <td class="">' . $value['noi_dung'] . '</td>
                          <td><img src="public/img/'.$value['hinh_anh'].'" alt="" width="100px"></td>
                        <td>' . $value['ngay_dang'] . '</td>
                        <td>' . $value['mo_ta'] . '</td>
                        <td>
                            <a href="index.php?trang=qlbaiviet&lenh=sua&id=' . $value['id'] . '"><button class="btn edit">Sửa</button></a>
                            <a href="index.php?trang=qlbaiviet&lenh=xoa&id=' . $value['id'] . '"><button class="btn delete">Xóa</button></a>
                        </td>
                    </tr>';
            }
            echo $ch;
            ?>
        </tbody>
    </table>
</div>

<!-- Edit Post Modal -->
<div id="editPostModal" class="modal">
    <div class="modal-content">
        <span class="close" id="closeEditModal">&times;</span>
        <h2>Sửa Bài Viết</h2>
        <form action="index.php?trang=qlbaiviet&lenh=sua&id=<?php echo $postInfo['id']; ?>" method="post">
            <div class="form-group">
                <label for="ten_bv">Tiêu Đề</label>
                <input type="text" id="ten_bv" name="ten_bv" value="<?php echo $postInfo['ten_bv']; ?>" required>
            </div>
            <div class="form-group">
                <label for="noi_dung">Nội Dung</label>
                <textarea id="noi_dung" name="noi_dung" required><?php echo $postInfo['noi_dung']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="hinh_anh">Hình Ảnh</label>
                <input type="file" id="hinh_anh" name="hinh_anh" value="<?php echo $postInfo['hinh_anh']; ?>" required>
            </div>
            <div class="form-group">
                <label for="ngay_dang">Ngày Đăng</label>
                <input type="date" id="ngay_dang" name="ngay_dang" value="<?php echo $postInfo['ngay_dang']; ?>" required>
            </div>
            <div class="form-group">
                <label for="editDemo_tascription">Mô Tả</label>
                <input type="text" id="mo_ta" name="ngay_dang" value="<?php echo $postInfo['mo_ta']; ?>" required>
            </div>
            <button type="submit" class="btn edit">Lưu Thay Đổi</button>
        </form>
    </div>
</div>

<script>
    // Add Post Modal
    const addPostModal = document.getElementById("addPostModal");
    const addPostBtn = document.getElementById("addPostBtn");
    const closeAddModal = document.getElementById("closeAddModal");

    addPostBtn.onclick = () => addPostModal.style.display = "block";
    closeAddModal.onclick = () => addPostModal.style.display = "none";
    window.onclick = (event) => {
        if (event.target == addPostModal) addPostModal.style.display = "none";
    }
</script>
