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
                    <th>Giá Giảm</th>
                    <th>Ảnh</th>
                    <th>Mô Tả</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                <!-- Sample product rows -->
                <?php
                $ch = '';
                foreach ($sanphamModel->tcsp as $key => $value) {
                    $ch .= '
                    <tr data-id="' . $value['id'] . '">
                        <td>' . $value['id'] . '</td>
                        <td>' . $value['ten_sp'] . '</td>
                        <td>' . $value['id_dm'] . '</td>
                        <td>' . $value['gia_sp'] . '</td>
                        <td>' . $value['giamgia_sp'] . '</td>
                        <td><img src="./Public/img/' . $value['hinh_sp'] . '" alt="Đàn Tranh" class="product-image"></td>
                        <td>' . $value['thong_tin_sp'] . '</td>
                        <td class="gom">
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
    <!-- Add Product Modal -->
    <div id="addProductModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Thêm Sản Phẩm Mới</h2>
            <form id="addProductForm">
                <div class="form-group">
                    <label for="productName">Tên Sản Phẩm</label>
                    <input type="text" id="productName" name="productName" required>
                </div>
                <div class="form-group">
                    <label for="category">Danh Mục</label>
                    <select id="category" name="category" required>
                        <option value="dan">Đàn</option>
                        <option value="trong">Trống</option>
                        <option value="sao">Sáo</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="price">Giá Sản Phẩm</label>
                    <input type="text" id="price" name="price" required>
                </div>
                <div class="form-group">
                    <label for="discountPrice">Giá Giảm</label>
                    <input type="text" id="discountPrice" name="discountPrice" required>
                </div>
                <div class="form-group">
                    <label for="productImage">Ảnh Sản Phẩm</label>
                    <input type="file" id="productImage" name="productImage" accept="image/*" required>
                    <img id="productImagePreview" class="product-image-preview" src="#" alt="Image Preview" style="display:none;">
                </div>
                <div class="form-group">
                    <label for="description">Mô Tả</label>
                    <textarea id="description" name="description" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn add">Thêm Sản Phẩm</button>
            </form>
        </div>
    </div>

    <!-- Edit Product Modal -->
    <div id="editProductModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
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
                    <label for="editPrice">Giá Sản Phẩm</label>
                    <input type="text" id="editPrice" name="price" required>
                </div>
                <div class="form-group">
                    <label for="editDiscountPrice">Giá Giảm</label>
                    <input type="text" id="editDiscountPrice" name="discountPrice" required>
                </div>
                <div class="form-group">
                    <label for="editProductImage">Ảnh Sản Phẩm</label>
                    <input type="file" id="editProductImage" name="productImage" accept="image/*">
                    <img id="editProductImagePreview" class="product-image-preview" src="#" alt="Image Preview" style="display:none;">
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
      // Lấy các phần tử cần thiết
const addProductBtn = document.getElementById('addProductBtn');
const addProductModal = document.getElementById('addProductModal');
const editProductModal = document.getElementById('editProductModal'); // Cần đảm bảo bạn đặt đúng id cho modal Sửa
const closeButtons = document.querySelectorAll('.modal .close');
const editButtons = document.querySelectorAll('.btn.edit'); // Các nút Sửa trong danh sách sản phẩm

// Hiển thị modal Thêm Sản Phẩm
addProductBtn.addEventListener('click', () => {
    addProductModal.style.display = 'block';
});

// Hiển thị modal Sửa Sản Phẩm
editButtons.forEach((button) => {
    button.addEventListener('click', (event) => {
        const productId = event.target.dataset.id;

        // Gán giá trị vào các trường trong modal Sửa
        document.getElementById('editProductId').value = productId;
        document.getElementById('editProductName').value = "Tên Sản Phẩm"; // Thay bằng dữ liệu thực
        document.getElementById('editCategory').value = "Danh Mục"; // Thay bằng dữ liệu thực
        document.getElementById('editPrice').value = "Giá"; // Thay bằng dữ liệu thực
        document.getElementById('editDiscountPrice').value = "Giá Giảm"; // Thay bằng dữ liệu thực
        document.getElementById('editDescription').value = "Mô Tả"; // Thay bằng dữ liệu thực

        // Hiển thị modal Sửa
        editProductModal.style.display = 'block';
    });
});

// Đóng modal khi nhấn nút đóng
closeButtons.forEach((button) => {
    button.addEventListener('click', () => {
        button.closest('.modal').style.display = 'none';
    });
});

// Đóng modal khi nhấn bên ngoài modal
window.addEventListener('click', (event) => {
    if (event.target === addProductModal) {
        addProductModal.style.display = 'none';
    }
    if (event.target === editProductModal) {
        editProductModal.style.display = 'none';
    }
});

    </script>

</body>
</html>