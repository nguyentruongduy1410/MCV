<div class="content">
    <h1>Danh Sách Người Dùng</h1>

    <button class="btn add" id="addUserBtn">Thêm Người Dùng</button>

    <table class="user-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Vai Trò</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $ch = '';
                foreach($qlusermodel->dsuser as $key => $value) {
                    $ch .= '
                        <tr data-id="' . $value['id'] . '">
                            <td>' . $value['id'] . '</td>
                            <td>' . $value['email'] . '</td>
                            <td>' . $value['vaitro'] . '</td>
                            <td>
                                <button class="btn edit" data-id="' . $value['id'] . '">Sửa</button>
                                <button class="btn delete" data-id="' . $value['id'] . '">Xóa</button>
                            </td>
                        </tr>
                    ';
                }
                echo $ch;
            ?>
        </tbody>
    </table>
</div>

<!-- Add User Modal -->
<div id="addUserModal" class="modal">
    <div class="modal-content">
        <span class="close" id="closeAddModal">&times;</span>
        <h2>Thêm Người Dùng</h2>
        <form id="addUserForm">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="role">Vai Trò</label>
                <select id="role" name="role" required>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="btn add">Thêm Người Dùng</button>
        </form>
    </div>
</div>

<!-- Edit User Modal -->
<div id="editUserModal" class="modal">
    <div class="modal-content">
        <span class="close" id="closeEditModal">&times;</span>
        <h2>Sửa Người Dùng</h2>
        <form id="editUserForm">
            <input type="hidden" id="editUserId" name="userId">
            <div class="form-group">
                <label for="editEmail">Email</label>
                <input type="email" id="editEmail" name="email" required>
            </div>
            <div class="form-group">
                <label for="editRole">Vai Trò</label>
                <select id="editRole" name="role" required>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
            </div>
            <div class="form-group">
                <label for="editPassword">Mật khẩu</label>
                <input type="password" id="editPassword" name="password">
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

    // Edit User Modal
    var editModal = document.getElementById("editUserModal");
    var closeEditModal = document.getElementById("closeEditModal");

    document.querySelector('.user-table tbody').addEventListener('click', function(event) {
        if (event.target.classList.contains('edit')) {
            var userId = event.target.getAttribute('data-id');
            var row = document.querySelector('tr[data-id="' + userId + '"]');
            
            // Populate the edit modal with user data
            document.getElementById('editUserId').value = userId;
            document.getElementById('editEmail').value = row.cells[1].textContent;
            document.getElementById('editRole').value = row.cells[2].textContent;

            editModal.style.display = "block";
        }

        if (event.target.classList.contains('delete')) {
            var userId = event.target.getAttribute('data-id');
            if (confirm('Bạn có chắc chắn muốn xóa người dùng này?')) {
                // Handle deletion via AJAX
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "path_to_your_delete_user_endpoint", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        alert('Người dùng đã được xóa!');
                        location.reload();
                    } else {
                        alert('Xóa người dùng thất bại.');
                    }
                };
                xhr.send("userId=" + userId);
            }
        }
    });

    closeEditModal.onclick = function() {
        editModal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == editModal) {
            editModal.style.display = "none";
        }
    }

    // Handle Add User form submission
    document.getElementById('addUserForm').onsubmit = function(event) {
        event.preventDefault();

        var formData = new FormData(this);

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "path_to_your_add_user_endpoint", true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                alert('Thêm người dùng thành công!');
                location.reload();
            } else {
                alert('Thêm người dùng thất bại.');
            }
        };
        xhr.send(formData);

        addModal.style.display = "none";
    }

    // Handle Edit User form submission
    document.getElementById('editUserForm').onsubmit = function(event) {
        event.preventDefault();

        var formData = new FormData(this);

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "path_to_your_edit_user_endpoint", true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                alert('Sửa người dùng thành công!');
                location.reload();
            } else {
                alert('Sửa người dùng thất bại.');
            }
        };
        xhr.send(formData);

        editModal.style.display = "none";
    }
</script>

</body>
</html>