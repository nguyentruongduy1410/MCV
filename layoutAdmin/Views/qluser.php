<div class="content">
    <h1>Danh Sách Người Dùng</h1>

    <button class="btn add" id="addUserBtn">Thêm Người Dùng</button>

    <!-- Add User Modal -->
    <div id="addUserModal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeAddModal">&times;</span>
            <h2>Thêm Người Dùng</h2>
            <form id="addUserForm" action="index.php?trang=qluser&lenh=them" method="post">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
<<<<<<< HEAD
                <select name="vaitro" id="vaitro">
                    <option value="">Chọn Vai trò</option>
                    <option value="admin">admin</option>
                    <option value="user">user</option>  
                </select>
=======
                    <label for="role">Vai Trò</label>
                    <select id="role" name="vaitro" required>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
>>>>>>> 1f9392bae6c3b8c3cbaa8c12873c155b8c6bcd60
                </div>
                <div class="form-group">
                    <label for="password">Mật khẩu</label>
                    <input type="password" id="password" name="mk" required>
                </div>
                <div class="form-group">
                    <label for="sdt">Số điện thoại</label>
                    <input type="text" id="sdt" name="sdt" required>
                </div>
                <div class="form-group">
                    <label for="address">Địa chỉ</label>
                    <input type="text" id="address" name="diachi" required>
                </div>
                <button type="submit" class="btn add" name="them">Thêm Người Dùng</button>
            </form>

        </div>
    </div>



    <table class="user-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Vai Trò</th>
                <th>Mật Khẩu</th>
                <th>Số Điện Thoại</th>
                <th>Địa Chỉ</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $ch = '';

            foreach ($userList as $key => $value) {
                $ch .= '
<<<<<<< HEAD
                <td>'.($key+1).'</td>
=======
                <td>' . $value['id'] . '</td>
>>>>>>> 1f9392bae6c3b8c3cbaa8c12873c155b8c6bcd60
                <td>' . $value['email'] . '</td>
                <td>' . $value['vaitro'] . '</td>
                <td>' . $value['mk'] . '</td>
                <td>' . $value['sdt'] . '</td>
                <td>' . $value['diachi'] . '</td>
                <td>
<<<<<<< HEAD
                    <a href="index.php?trang=qluser&lenh=sua&id='. $value['id'].'"><button class="btn edit">Sửa</button></a>
                    <a href="index.php?trang=qluser&lenh=xoa&id='.$value['id'].'"><button class="btn delete" ">Xóa</button></a>
=======
                    <button class="btn edit" data-id="' . $value['id'] . '">Sửa</button>
                    <button class="btn delete" data-id="' . $value['id'] . '">Xóa</button>
>>>>>>> 1f9392bae6c3b8c3cbaa8c12873c155b8c6bcd60
                </td>
            </tr>
        ';
            }


<<<<<<< HEAD
=======

>>>>>>> 1f9392bae6c3b8c3cbaa8c12873c155b8c6bcd60
            echo $ch;
            ?>

        </tbody>
    </table>
</div>



<!-- Edit User Modal -->
<div id="editUserModal" class="modal">
    <div class="modal-content">
        <span class="close" id="closeEditModal">&times;</span>
        <h2>Sửa Người Dùng</h2>
        <form id="editUserForm" action="index.php?trang=qluser&lenh=sua&id=<?php echo $userInfo['id']; ?>" method="post">
            <div class="form-group">
                <label for="editEmail">Email</label>
                <input type="email" id="editEmail" name="email" value="<?php echo $userInfo['email']; ?>" required>
            </div>
            <div class="form-group">
                <label for="editRole">Vai Trò</label>
                <select id="editRole" name="vaitro" required>
                    <option value="admin" <?php echo $userInfo['vaitro'] == 'admin' ? 'selected' : ''; ?>>Admin</option>
                    <option value="user" <?php echo $userInfo['vaitro'] == 'user' ? 'selected' : ''; ?>>User</option>
                </select>
            </div>
            <div class="form-group">
                <label for="editPassword">Mật khẩu</label>
                <input type="password" id="editPassword" name="mk" value="<?php echo $userInfo['mk']; ?>" required>
            </div>
            <div class="form-group">
                <label for="editSdt">Số điện thoại</label>
                <input type="text" id="editSdt" name="sdt" value="<?php echo $userInfo['sdt']; ?>" required>
            </div>
            <div class="form-group">
                <label for="editAddress">Địa chỉ</label>
                <input type="text" id="editAddress" name="diachi" value="<?php echo $userInfo['diachi']; ?>" required>
            </div>
            <button type="submit" class="btn edit">Lưu Thay Đổi</button>
        </form>
    </div>
</div>

<script>
    // // Edit User Modal
    // var editModal = document.getElementById("editUserModal");
    // var closeEditModal = document.getElementById("closeEditModal");

    // document.querySelectorAll('.btn.edit').forEach(function (btn) {
    //     btn.onclick = function () {
    //         editModal.style.display = "block";
    //     }
    // });

    // closeEditModal.onclick = function() {
    //     editModal.style.display = "none";
    // }

    // window.onclick = function(event) {
    //     if (event.target == editModal) {
    //         editModal.style.display = "none";
    //     }
    // }
    // Add User Modal
    var addModal = document.getElementById("addUserModal");
    var addBtn = document.getElementById("addUserBtn");
    var closeAddModal = document.getElementById("closeAddModal");

    addBtn.onclick = function() {
        addModal.style.display = "block";
    }

    closeAddModal.onclick = function() {
        addModal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == addModal) {
            addModal.style.display = "none";
        }
    }
</script>

</body>

</html>