<div class="content">
    <h1>Danh Sách Sản Phẩm Nhạc Cụ Dân Tộc</h1>

    <div class="filter">
        <button class="btn add add-product" id="addProductBtn">Thêm Sản Phẩm</button>
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
        <?php
$ch = '';
foreach ($productList as $key => $value) {
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
        <span class="close" id="closeAddProductModal">&times;</span>
        <h2>Thêm Sản Phẩm</h2>
        <form id="addProductForm" action="index.php?trang=qlsanpham&lenh=them" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="productName">Tên Sản Phẩm</label>
                <input type="text" id="productName" name="ten_sp" required>
            </div>
            <div class="form-group">
                <label for="productCategory">Danh Mục</label>
                <input type="text" id="productCategory" name="id_dm" required>
            </div>
            <div class="form-group">
                <label for="productPrice">Giá</label>
                <input type="number" id="productPrice" name="gia_sp" required>
            </div>
            <div class="form-group">
                <label for="productDiscount">Giá Giảm</label>
                <input type="number" id="productDiscount" name="giamgia_sp">
            </div>
            <div class="form-group">
                <label for="productImage">Ảnh</label>
                <input type="file" id="productImage" name="hinh_sp" required>
            </div>
            <div class="form-group">
                <label for="productDescription">Mô Tả</label>
                <textarea id="productDescription" name="thong_tin_sp" required></textarea>
            </div>
            <button type="submit" class="btn add">Thêm Sản Phẩm</button>
        </form>
    </div>
</div>

<script>
    // Add Product Modal
    var addProductModal = document.getElementById("addProductModal");
    var addProductBtn = document.getElementById("addProductBtn");
    var closeAddProductModal = document.getElementById("closeAddProductModal");

    addProductBtn.onclick = function() {
        addProductModal.style.display = "block";
    }

    closeAddProductModal.onclick = function() {
        addProductModal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == addProductModal) {
            addProductModal.style.display = "none";
        }
    }
</script>
