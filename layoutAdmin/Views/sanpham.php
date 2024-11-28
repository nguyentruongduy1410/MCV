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
        // Get the modals
        var addModal = document.getElementById("addProductModal");
        var editModal = document.getElementById("editProductModal");

        // Get the buttons that open the modals
        var addBtn = document.getElementById("addProductBtn");

        // Get the <span> elements that close the modals
        var addSpan = addModal.getElementsByClassName("close")[0];
        var editSpan = editModal.getElementsByClassName("close")[0];

        // When the user clicks the button, open the add modal
        addBtn.onclick = function() {
            addModal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modals
        addSpan.onclick = function() {
            addModal.style.display = "none";
        }

        editSpan.onclick = function() {
            editModal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modals, close them
        window.onclick = function(event) {
            if (event.target == addModal) {
                addModal.style.display = "none";
            } else if (event.target == editModal) {
                editModal.style.display = "none";
            }
        }

        // Handle form submission for adding a new product
        document.getElementById('addProductForm').onsubmit = function(event) {
            event.preventDefault();
            
            var formData = new FormData(this);

            // You can use AJAX to submit the form data to the server
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "path_to_your_server_endpoint", true);
            xhr.onload = function () {
                if (xhr.status === 200) {
                    // Successfully added the product
                    alert('Product added successfully!');
                    location.reload(); // Reload the page to reflect the new product
                } else {
                    alert('Failed to add product.');
                }
            };
            xhr.send(formData);

            addModal.style.display = "none";
        }

        // Handle form submission for editing a product
        document.getElementById('editProductForm').onsubmit = function(event) {
            event.preventDefault();
            
            var formData = new FormData(this);

            // You can use AJAX to submit the form data to the server
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "path_to_your_server_endpoint_for_editing", true);
            xhr.onload = function () {
                if (xhr.status === 200) {
                    // Successfully edited the product
                    alert('Product edited successfully!');
                    location.reload(); // Reload the page to reflect the changes
                } else {
                    alert('Failed to edit product.');
                }
            };
            xhr.send(formData);

            editModal.style.display = "none";
        }

        // Add event listeners for edit and delete buttons
        document.querySelector('.product-table tbody').addEventListener('click', function(event) {
            if (event.target.classList.contains('edit')) {
                // Open edit modal and populate fields with existing data
                var productId = event.target.getAttribute('data-id');
                var row = document.querySelector('tr[data-id="' + productId + '"]');
                document.getElementById('editProductId').value = productId;
                document.getElementById('editProductName').value = row.cells[1].textContent;
                document.getElementById('editCategory').value = row.cells[2].textContent;
                document.getElementById('editPrice').value = row.cells[3].textContent;
                document.getElementById('editDiscountPrice').value = row.cells[4].textContent;
                document.getElementById('editDescription').value = row.cells[6].textContent;

                editModal.style.display = "block";
            }

            if (event.target.classList.contains('delete')) {
                // Delete product
                var productId = event.target.getAttribute('data-id');
                if (confirm('Are you sure you want to delete this product?')) {
                    // Use AJAX to delete the product
                    var xhr = new XMLHttpRequest();
                    xhr.open("POST", "path_to_your_server_endpoint_for_deleting", true);
                    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                    xhr.onload = function () {
                        if (xhr.status === 200) {
                            // Successfully deleted the product
                            alert('Product deleted successfully!');
                            location.reload(); // Reload the page to reflect the deletion
                        } else {
                            alert('Failed to delete product.');
                        }
                    };
                    xhr.send("productId=" + productId);
                }
            }
        });

        // Preview selected image in add form
        document.getElementById('productImage').addEventListener('change', function(event) {
            var preview = document.getElementById('productImagePreview');
            var file = event.target.files[0];
            var reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(file);
        });

        // Preview selected image in edit form
        document.getElementById('editProductImage').addEventListener('change', function(event) {
            var preview = document.getElementById('editProductImagePreview');
            var file = event.target.files[0];
            var reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(file);
        });
    </script>

</body>
</html>