<div class="content">
    <h1>Danh Sách Voucher Giảm Giá</h1>

    <!-- Mục lọc voucher -->
    <div class="filter">
        <input type="text" placeholder="Tìm kiếm voucher..." />
        <select>
            <option value="">Tất cả danh mục</option>
            <option value="active">Đang hoạt động</option>
            <option value="expired">Đã hết hạn</option>
        </select>
    </div>

    <button class="btn add" id="addVoucherBtn">Thêm Voucher</button>
    <table class="voucher-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Mã Voucher</th>
                <th>Giá Trị (%)</th>
                <th>Ngày Bắt Đầu</th>
                <th>Ngày Kết Thúc</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $ch = '';
                foreach($qlvouchermodel -> dsvc as $key => $value){
                    $ch .= '
                        <tr>
                            <td>'.$value['id_gg'].'</td>
                            <td>'.$value['code_giam_gia'].'</td>
                            <td>'.$value['so_tien_giam'].'</td>
                            <td>01-06-2024</td>
                            <td>31-08-2024</td>
                            <td>
                                <button class="btn edit" data-id="'.$value['id_gg'].'" data-code="'.$value['code_giam_gia'].'" data-discount="'.$value['so_tien_giam'].'" data-startdate="01-06-2024" data-enddate="31-08-2024">Sửa</button>
                                <button class="btn secondary delete" data-id="'.$value['id_gg'].'">Xóa</button>
                            </td>
                        </tr>
                    ';
                }
                echo $ch;
            ?>
        </tbody>
    </table>
</div>

<!-- Add Voucher Modal -->
<div id="addVoucherModal" class="modal">
    <div class="modal-content">
        <span class="close" id="closeAddModal">&times;</span>
        <h2>Thêm Voucher Giảm Giá</h2>
        <form id="addVoucherForm">
            <div class="form-group">
                <label for="voucherCode">Mã Voucher</label>
                <input type="text" id="voucherCode" name="voucherCode" required />
            </div>
            <div class="form-group">
                <label for="voucherDiscount">Giá Trị (%)</label>
                <input type="number" id="voucherDiscount" name="voucherDiscount" required min="1" max="100" />
            </div>
            <div class="form-group">
                <label for="voucherStartDate">Ngày Bắt Đầu</label>
                <input type="date" id="voucherStartDate" name="voucherStartDate" required />
            </div>
            <div class="form-group">
                <label for="voucherEndDate">Ngày Kết Thúc</label>
                <input type="date" id="voucherEndDate" name="voucherEndDate" required />
            </div>
            <button type="submit" class="btn add">Thêm Voucher</button>
        </form>
    </div>
</div>

<!-- Edit Voucher Modal -->
<div id="editVoucherModal" class="modal">
    <div class="modal-content">
        <span class="close" id="closeEditModal">&times;</span>
        <h2>Sửa Voucher Giảm Giá</h2>
        <form id="editVoucherForm">
            <input type="hidden" id="editVoucherId" name="voucherId" />
            <div class="form-group">
                <label for="editVoucherCode">Mã Voucher</label>
                <input type="text" id="editVoucherCode" name="voucherCode" required />
            </div>
            <div class="form-group">
                <label for="editVoucherDiscount">Giá Trị (%)</label>
                <input type="number" id="editVoucherDiscount" name="voucherDiscount" required min="1" max="100" />
            </div>
            <div class="form-group">
                <label for="editVoucherStartDate">Ngày Bắt Đầu</label>
                <input type="date" id="editVoucherStartDate" name="voucherStartDate" required />
            </div>
            <div class="form-group">
                <label for="editVoucherEndDate">Ngày Kết Thúc</label>
                <input type="date" id="editVoucherEndDate" name="voucherEndDate" required />
            </div>
            <button type="submit" class="btn edit">Lưu Thay Đổi</button>
        </form>
    </div>
</div>

<script>
    // Show Add Voucher Modal
    document.getElementById('addVoucherBtn').onclick = function() {
        document.getElementById('addVoucherModal').style.display = "block";
    };

    // Close Add Voucher Modal
    document.getElementById('closeAddModal').onclick = function() {
        document.getElementById('addVoucherModal').style.display = "none";
    };

    // Close Edit Voucher Modal
    document.getElementById('closeEditModal').onclick = function() {
        document.getElementById('editVoucherModal').style.display = "none";
    };

    // Close modal if clicked outside
    window.onclick = function(event) {
        if (event.target == document.getElementById('addVoucherModal')) {
            document.getElementById('addVoucherModal').style.display = "none";
        }
        if (event.target == document.getElementById('editVoucherModal')) {
            document.getElementById('editVoucherModal').style.display = "none";
        }
    };

    // Add Voucher Form Submission
    document.getElementById('addVoucherForm').onsubmit = function(e) {
        e.preventDefault();

        const code = document.getElementById('voucherCode').value;
        const discount = document.getElementById('voucherDiscount').value;
        const startDate = document.getElementById('voucherStartDate').value;
        const endDate = document.getElementById('voucherEndDate').value;

        // Add to table
        const newRow = document.createElement('tr');
        newRow.innerHTML = `
            <td>New</td>
            <td>${code}</td>
            <td>${discount}</td>
            <td>${startDate}</td>
            <td>${endDate}</td>
            <td>
                <button class="btn edit">Sửa</button>
                <button class="btn secondary delete">Xóa</button>
            </td>
        `;
        document.querySelector('.voucher-table tbody').appendChild(newRow);

        // Close modal
        document.getElementById('addVoucherModal').style.display = "none";
    };

    // Edit Voucher Button Clicked
    document.querySelector('.voucher-table').addEventListener('click', function(event) {
        if (event.target.classList.contains('edit')) {
            const row = event.target.closest('tr');
            const id = row.querySelector('td:nth-child(1)').textContent;
            const code = row.querySelector('td:nth-child(2)').textContent;
            const discount = row.querySelector('td:nth-child(3)').textContent;
            const startDate = row.querySelector('td:nth-child(4)').textContent;
            const endDate = row.querySelector('td:nth-child(5)').textContent;

            // Set values in the edit form
            document.getElementById('editVoucherId').value = id;
            document.getElementById('editVoucherCode').value = code;
            document.getElementById('editVoucherDiscount').value = discount;
            document.getElementById('editVoucherStartDate').value = startDate;
            document.getElementById('editVoucherEndDate').value = endDate;

            // Show Edit modal
            document.getElementById('editVoucherModal').style.display = "block";
        }
    });

    // Edit Voucher Form Submission
    document.getElementById('editVoucherForm').onsubmit = function(e) {
        e.preventDefault();

        const id = document.getElementById('editVoucherId').value;
        const code = document.getElementById('editVoucherCode').value;
        const discount = document.getElementById('editVoucherDiscount').value;
        const startDate = document.getElementById('editVoucherStartDate').value;
        const endDate = document.getElementById('editVoucherEndDate').value;

        const row = document.querySelector(`tr td:first-child:contains(${id})`).parentElement;
        row.querySelector('td:nth-child(2)').textContent = code;
        row.querySelector('td:nth-child(3)').textContent = discount;
        row.querySelector('td:nth-child(4)').textContent = startDate;
        row.querySelector('td:nth-child(5)').textContent = endDate;

        // Close modal
        document.getElementById('editVoucherModal').style.display = "none";
    };
</script>

</body>
</html>