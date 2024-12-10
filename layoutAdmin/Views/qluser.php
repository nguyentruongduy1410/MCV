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
                <!-- <select name="vaitro" id="vaitro">
                    <option value="">Chọn Vai trò</option>
                    <option value="admin">admin</option>
                    <option value="user">user</option>  
                </select> -->
                <div class="form-group">
                    <label for="sdt">Vai trò</label>
                    <input type="text" id="role" name="sdt" required>
                </div>
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
                <td>'.($key+1).'</td>
                <td>' . $value['email'] . '</td>
                <td>' . $value['role'] . '</td>
                <td>' . $value['sdt'] . '</td>
                <td>' . $value['diachi'] . '</td>
                <td>
                    <a href="index.php?trang=qluser&lenh=sua&id='. $value['id'].'"><button class="btn edit">Sửa</button></a>
                    <a href="index.php?trang=qluser&lenh=xoa&id='.$value['id'].'"><button class="btn delete" ">Xóa</button></a>
                </td>
            </tr>
        ';
            }


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
                <input type="text" id="editRole" name="sdt" value="<?php echo $userInfo['role']; ?>" required>
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