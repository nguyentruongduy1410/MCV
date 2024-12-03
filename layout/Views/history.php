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
                <strong>Số điện thoại:</strong> <?= $_SESSION['user_phone'];?><br>
                <strong>Email:</strong> <?= $_SESSION['email'];?><br>
            </div>
            <div>
                <strong>Website:</strong> Classical Music<br>
                <strong>Giới tính:</strong> Nam<br>
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
                    <th>Thanh toán</th>
                    <th>Giá trị</th>
                    <th>Mã giảm giá</th>
                    <th>Ngày ghi nhận</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($orderHistory)): ?>
                    <?php foreach ($orderHistory as $order): ?>
                        <tr>
                            <td><?php echo $order['id']; ?></td>
                            <td><?php echo $order['trangthai_dh']; ?></td>
                            <td><?php echo $order['trangthai_thanhtoan'];?></td>
                            <td><?php echo number_format($order['tong_tien'], 0, ',', '.'); ?> VND</td>
                            <td><?php echo $order['id_gg']; ?></td>
                            <td><?php echo date('d/m/Y', strtotime($order['ngay_dat_hang'])); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7">Bạn chưa có đơn hàng nào.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </section>
</div>