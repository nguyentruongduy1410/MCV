<div class="container" id="thanhtoan">
    
    <?php //echo $html_thanhtoan; ?>
    <form method="post">

        <div class="form-section">
                <h2>Thông tin nhận hàng</h2>
                <form>
                    <label for="name">Họ và tên</label>
                    <input type="text" name="name" id="name" value="<?=$_SESSION['user_name']??null?>" placeholder="Nhập họ và tên">

                    <label for="phone">Số điện thoại</label>
                    <input type="text" name="phone" id="phone" value="<?=$_SESSION['user_phone']??null?>" placeholder="Nhập số điện thoại">

                    <label for="address">Địa chỉ</label>
                    <input type="text" name="address" id="address" value="<?=$_SESSION['user_address']??null?>" placeholder="Nhập địa chỉ">

                    <label for="note">Ghi chú (tùy chọn)</label>
                    <textarea id="note" name="note" placeholder="Nhập ghi chú"></textarea>
                </form>
            </div>
            <div class="summary-section">
                <h2>Đơn hàng</h2>

            
                <?=$html_cart_tomtat;?>
               
               

           
            
            <div class="pttt">
                <h3>Phương thức thanh toán</h3>
                <div>
                <input type="radio" id="cod" name="payment" checked value="cod">
                <label for="cod">Chuyển khoản ngân hàng (COD)</label><br>
                </div>
                <div>
                <input type="radio" id="online" name="payment" value="online">
                <label for="online">Thanh toán online (Ví điện tử, PayPal)</label>
                </div>
                <div>
                <input type="radio" id="atm" name="payment" value="atm">
                <label for="atm">Chuyển khoản ATM (ATM)</label>
                </div>
            </div>

          
            <button class="btn order-btn" name="btn_dathang">ĐẶT HÀNG</button>
        </div>
    </form>
</div>