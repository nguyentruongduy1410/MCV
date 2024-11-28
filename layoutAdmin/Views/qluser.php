
    <div class="content">
        <h1>Danh Sách Người Dùng</h1>
        
        <!-- Mục lọc người dùng -->
        <div class="filter">
            <input type="text" placeholder="Tìm kiếm người dùng..." />
            <select>
                <option value="">Tất cả vai trò</option>
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select>
        </div>
        
        <button class="btn add">Thêm Người Dùng</button>
        <table class="user-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên Người Dùng</th>
                    <th>Email</th>
                    <th>Vai Trò</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $ch ='';
                    foreach($qlusermodel -> dsuser as $key => $value) {
                        $ch.= '
                            <tr>
                                <td>'.$value['id'].'</td>
                                <td>Nguyễn Văn A</td>
                                <td>'.$value['email'].'</td>
                                <td>'.$value['vaitro'].'</td>
                                <td>
                                    <button class="btn edit">Sửa</button>
                                    <button class="btn delete">Xóa</button>
                                </td>
                            </tr>
                        
                        ';

                    }
                    echo $ch;
                
                ?>
              