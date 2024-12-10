<?php
class ThanhToanController
{
    public function __construct()
    {
        // Khởi tạo session nếu chưa được khởi tạo
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function addthanhtoan($id, $name, $img, $price, $soluong)
    {
        if (!isset($_SESSION['thanhtoan'])) {
            $_SESSION['thanhtoan'] = []; 
        }

        $item = array('id' => $id, 'name' => $name, 'img' => $img, 'price' => $price, 'soluong' => $soluong);

        // Kiểm tra nếu sản phẩm đã có trong $_SESSION['thanhtoan']
        $found = false;
        foreach ($_SESSION['thanhtoan'] as $key => $value) {
            if ($value['id'] == $id) {
                $_SESSION['thanhtoan'][$key]['soluong'] += $soluong; 
                $found = true;
                break;
            }
        }

        // Nếu sản phẩm chưa có trong giỏ, thêm mới
        if (!$found) {
            array_push($_SESSION['thanhtoan'], $item); 
        }
    }
    public function addVoucher($voucherCode) {
        // Giả sử bạn có danh sách các voucher trong database hoặc mảng
        $validVouchers = ['DISCOUNT10', 'SALE20']; // Ví dụ mã giảm giá hợp lệ
        if (in_array($voucherCode, $validVouchers)) {
            // Thực hiện giảm giá hoặc thêm voucher vào session
            $_SESSION['voucher'] = $voucherCode;
            return "Mã giảm giá đã được áp dụng!";
        } else {
            return "Mã giảm giá không hợp lệ!";
        }
    }
    
    public function showthanhtoan_html()
    {
        
        if (isset($_SESSION['thanhtoan']) && count($_SESSION['thanhtoan']) > 0) {
            $tong = 0; 
            $ttv = 0;  
            $html_thanhtoan = '
            <div class="form-section">
                <h2>Thông tin nhận hàng</h2>
                <form>
                    <label for="name">Họ và tên</label>
                    <input type="text" id="name" placeholder="Nhập họ và tên">

                    <label for="phone">Số điện thoại</label>
                    <input type="text" id="phone" placeholder="Nhập số điện thoại">

                    <label for="address">Địa chỉ</label>
                    <input type="text" id="address" placeholder="Nhập địa chỉ">

                    <label for="note">Ghi chú (tùy chọn)</label>
                    <textarea id="note" placeholder="Nhập ghi chú"></textarea>
                </form>
            </div>
            <div class="summary-section">
                <h2>Đơn hàng</h2>';

            foreach ($_SESSION['thanhtoan'] as $key => $value) {
                $tt = $value['price'] * $value['soluong']; 
                $tong += $tt;

                $html_thanhtoan .= '
                <div class="order-item">
                    <img src="Public/img/' . htmlspecialchars($value['img']) . '" alt="" width="60px">
                    <div class="item-info">
                        <p><strong>' . htmlspecialchars($value['name']) . '</strong></p>
                    </div>
                    <p>' . number_format($value['price'], 0, ',', '.') . '</p>
           
                    <p><a href="index.php?trang=thanhtoan&key=' . $key . '"><button>Xóa</button></a></p>
                </div>';
            }

            $html_thanhtoan .= '
            <div class="promo-code">
                <input type="text" placeholder="Nhập mã giảm giá">
                <button>Áp dụng</button>
            </div>
            <div class="total">
                <p>Tạm tính: <span>' . number_format($tong, 0, ',', '.') . '</span></p>
                <p>Phí vận chuyển: <span>-</span></p>
                <p><strong>Tổng cộng: <span>' . number_format($tong, 0, ',', '.') . '</span></strong></p>
            </div>
            <button class="order-btn">ĐẶT HÀNG</button>
        </div>';

            return $html_thanhtoan;
        }

        return '<p>Không có sản phẩm trong giỏ hàng</p>';
    }
}
var_dump($_SESSION['thanhtoan'])
?>
