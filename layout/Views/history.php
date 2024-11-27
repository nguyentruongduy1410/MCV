<style>
     .container-history {
    max-width: 1200px;
    margin: 20px auto;
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}
    .customer-info-history .info-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
    margin-bottom: 20px;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 8px;

}
</style>

    <div class="container-history">
        <!-- Thông tin cá nhân -->
        <section class="customer-info-history">
            <div class="info-grid">
                <div>
                    <strong>Nhóm khách hàng:</strong> Vip<br>
                    <strong>Mã:</strong> J97BOCON<br>
                    <strong>Số điện thoại:</strong> 199750000<br>
                    <strong>Email:</strong> j97@gmail.com<br>
                    <strong>Nợ hiện tại:</strong> 5,000,000
                </div>
                <div>
                    <strong>Mã số thuế:</strong> 774-332-001<br>
                    <strong>Website:</strong> ---<br>
                    <strong>Giới tính:</strong> Nam<br>
                    <strong>Ngày sinh:</strong> 16/04/1999<br>
                    <strong>Chiết khấu:</strong> 10%
                </div>
            </div>
        </section>

        <!-- Lịch sử mua hàng -->
        <section class="order-history">
            <h2>Lịch sử mua hàng</h2>
            <table>
                <thead>
                    <tr>
                        <th>Mã đơn hàng</th>
                        <th>Trạng thái</th>
                        <th>Giao hàng</th>
                        <th>Thanh toán</th>
                        <th>Giá trị</th>
                        <th>Chi nhánh</th>
                        <th>Ngày ghi nhận</th>
                        <th>Cập nhật cuối</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>SON00599</td>
                        <td>Hoàn thành</td>
                        <td><input type="radio" checked></td>
                        <td><input type="radio" checked></td>
                        <td>180,000</td>
                        <td>Chi nhánh 1</td>
                        <td>27/11/2019 11:52</td>
                        <td>01/12/2019 11:06</td>
                    </tr>
                    <tr>
                        <td>SON00597</td>
                        <td>Đang giao dịch</td>
                        <td><input type="radio"></td>
                        <td><input type="radio"></td>
                        <td>200,000</td>
                        <td>Chi nhánh 1</td>
                        <td>24/11/2019 11:49</td>
                        <td>24/11/2019 19:14</td>
                    </tr>
                </tbody>
            </table>
        </section>
    </div>

