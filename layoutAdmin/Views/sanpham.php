

    <div class="content">
        <h1>Danh Sách Sản Phẩm Nhạc Cụ Dân Tộc</h1>

        <div class="filter">
            <button class="btn add add-product" id="addProductBtn">Thêm Sản Phẩm</button>
          
            <select>
                <option value="">Tất cả danh mục</option>
                <option value="dan">Đàn</option>
                <option value="trong">Trống</option>
                <option value="sao">Sáo</option>
            </select>
        </div>

        <table class="product-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Danh Mục</th>
                    <th>Giá</th>
                    <th>Ảnh</th>
                    <th>Mô Tả</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                <!-- Sample product rows -->
                 <?php
                 $ch = '';
                 foreach ($sanphamModel -> tcsp as $key =>$value ){
                    $ch.='
                    <tr>
                    <td>'.$value['id'].'</td>
                    <td>'.$value['ten_sp'].'</td>
                    <td>'.$value['id_dm'].'</td>
                    <td>'.$value['gia_sp'].'</td> 
                    <td><img src="./Public/img/'.$value['hinh_sp'].'" alt="Đàn Tranh" class="product-image"></td>
                    <td>'.$value['thong_tin_sp'].'</td>
                    <td class="gom">
                        <button class="btn edit">Sửa</button>
                        <button class="btn delete">Xóa</button>
                    </td>
                </tr>
                    ';
                 }
                 echo $ch;
                 
                 
                 
                 
                 
                 
                 
                 ?>
                
              
                <!-- Repeat sample rows as needed -->
            </tbody>
        </table>
    </div>
</div>

<!-- The Modal -->     <!-- from them sp -->     <!-- from them sp -->
<div id="editModal" class="modal">
    <div class="modal-content">
        <span class="close edit-close">&times;</span>
        <h2>Sửa Sản Phẩm</h2>
        <form id="editProductForm">
            <input type="hidden" id="editProductId" name="productId">
            <div class="form-group">
                <label for="editProductName">Tên Sản Phẩm</label>
                <input type="text" id="editProductName" name="productName" required>
            </div>
            <div class="form-group">
                <label for="editCategory">Danh Mục</label>
                <select id="editCategory" name="category" required>
                    <option value="dan">Đàn</option>
                    <option value="trong">Trống</option>
                    <option value="sao">Sáo</option>
                </select>
            </div>
            <div class="form-group">
                <label for="editProductImage">Ảnh Sản Phẩm</label>
                <input type="file" id="editProductImage" name="productImage" accept="image/*">
            </div>
            <div class="form-group">
                <label for="editDescription">Mô Tả</label>
                <textarea id="editDescription" name="description" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn edit">Lưu Thay Đổi</button>
        </form>
    </div>
</div>

<script>
    // Get the edit modal
    var editModal = document.getElementById("editModal");

    // Get the <span> element that closes the edit modal
    var editClose = document.getElementsByClassName("edit-close")[0];

    // When the user clicks on <span> (x), close the edit modal
    editClose.onclick = function() {
        editModal.style.display = "none";
    }

    // When the user clicks anywhere outside of the edit modal, close it
    window.onclick = function(event) {
        if (event.target == editModal) {
            editModal.style.display = "none";
        }
    }

    // Handle edit button click
    document.querySelectorAll('.btn.edit').forEach(button => {
        button.onclick = function() {
            var row = button.closest('tr');
            var productId = row.querySelector('td:nth-child(1)').innerText;
            var productName = row.querySelector('td:nth-child(2)').innerText;
            var category = row.querySelector('td:nth-child(3)').innerText;
            var description = row.querySelector('td:nth-child(6)').innerText;

            document.getElementById('editProductId').value = productId;
            document.getElementById('editProductName').value = productName;
            document.getElementById('editCategory').value = category;
            document.getElementById('editDescription').value = description;

            editModal.style.display = "block";
        }
    });

    // Handle form submission for edit
    document.getElementById('editProductForm').onsubmit = function(event) {
        event.preventDefault();
        // Add your form submission logic here
        // You may need to use AJAX to submit the form data to your server
        editModal.style.display = "none";
    }
</script>

</body>
</html>
