<?php
class ThanhToanController {
    public $html_thanhtoan = '';
    public function __construct() {
        include_once 'Models/thanhtoanModel.php';
        $thanhtoanModel = new thanhtoanModel(); 
    }

    public function addthanhtoan($id,$name,$img,$price,$soluong){
        if(isset($_SESSION['thanhtoan'])){
            $item=array('id'=>$id,'name'=>$name,'img'=>$img,'price'=>$price,'soluong'=>$soluong);
            array_push($_SESSION['thanhtoan'],$item);
        }
    }
    public function showthanhtoan_html(){
       
        if(isset($_SESSION['thanhtoan'])&&(count($_SESSION['thanhtoan'])>0)){
           $tong=0;
            $html_thanhtoan='

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
            </form>';
            foreach ($_SESSION['thanhtoan'] as $key=>$value) {
                $tt=intval($value['price'])*intval($value['soluong']);
                $tong+=$tt;
             $html_thanhtoan.='
        </div>
        <div class="order-summary">
            <h2>Đơn hàng</h2>
            <div class="item">
                <div class="item-info">
                    <p><strong>'.$value['name'].'</strong></p>
                  
                </div>
                <p>'.$value['price'].'</p>
            </div>';
            }
   $html_thanhtoan.='
            <div class="promo-code">
                <input type="text" placeholder="Nhập mã giảm giá">
                <button>Áp dụng</button>
            </div>
            <div class="total">
                <p>Tạm tính: <span>'.$tong.'</span></p>
                <p>Phí vận chuyển: <span>-</span></p>
                <p><strong>Tổng cộng: <span>'.$tong.'</span></strong></p>
            </div>
            <button class="order-btn">ĐẶT HÀNG</button>
        </div>
    </div>
   
</div>


';
return $html_thanhtoan;
            }
return '<p>không có sp</p>';
        
    }
}
?>