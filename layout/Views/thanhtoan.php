
    <div class="container">
        <div class="content">
            <div class="form-container">
                <h2>Thông tin nhận hàng</h2>
                <form>
                    <label for="name">Họ và tên</label>
                    <input type="text" id="name" placeholder="Nhập họ và tên">

                    <label for="phone">Số điện thoại</label>
                    <input type="text" id="phone" placeholder="Nhập số điện thoại">

                    <label for="address">Địa chỉ</label>
                    <input type="text" id="address" placeholder="Nhập địa chỉ">

                    <label for="province">Tỉnh thành</label>
                    <select id="province" >
                        <option value="">Chọn tỉnh/thành</option>
                    </select>

                    <label for="district">Quận huyện</label>
                    <select id="district" disabled>
                        <option value="">Chọn quận/huyện</option>
                    </select>

                    <label for="ward">Phường xã</label>
                    <select id="ward" disabled>
                        <option value="">Chọn phường/xã</option>
                    </select>

                    <label for="note">Ghi chú (tùy chọn)</label>
                    <textarea id="note" placeholder="Nhập ghi chú"></textarea>
                </form>
            </div>
            <div class="order-summary">
                <h2>Đơn hàng (1 sản phẩm)</h2>
                <div class="item">
                    <div class="item-info">
                        <p><strong>Áo Thun Dài Tay Local Brand Unisex</strong></p>
                        <p>Trắng Kẻ Đen / M</p>
                    </div>
                    <p>280.000đ</p>
                </div>
                <div class="promo-code">
                    <input type="text" placeholder="Nhập mã giảm giá">
                    <button>Áp dụng</button>
                </div>
                <div class="total">
                    <p>Tạm tính: <span>280.000đ</span></p>
                    <p>Phí vận chuyển: <span>-</span></p>
                    <p><strong>Tổng cộng: <span>280.000đ</span></strong></p>
                </div>
                <button class="order-btn">ĐẶT HÀNG</button>
            </div>
        </div>
       
    </div>
