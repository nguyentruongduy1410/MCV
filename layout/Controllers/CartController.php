<?php
class CartController {
    public function __construct() {
        // Include model if necessary (you can uncomment this later)
        // include_once 'Models/CartModel.php';
        // $cartmodel = new CartModel();
    }

    public function addtocart($id, $name, $img, $price, $soluong) {
        if (isset($_SESSION['giohang'])) {
            $item = array('id' => $id, 'name' => $name, 'img' => $img, 'price' => $price, 'soluong' => $soluong);
            array_push($_SESSION['giohang'], $item);
        }
    }

    public function showcart_html() {
        if (isset($_SESSION['giohang']) && count($_SESSION['giohang']) > 0) {
            $tong = 0;
            $html_cart = '<div class="table-cart">
                <div class="title-cart">
                    <ul>
                        <li class="ttsp">Thông tin sản phẩm</li>
                        <li>Đơn giá</li>
                        <li>Số lượng</li>
                        <li>Thành tiền</li>
                        <li>Thao tác</li>
                    </ul>
                </div>';

       
            $cart_checkout = [];
            
            foreach ($_SESSION['giohang'] as $key => $value) {
                $tt = intval($value['price']) * intval($value['soluong']);
                $tong += $tt;

                $html_cart .= '<div id="tbodygh">
                                    <div class="title-cart">
                                        <ul>
                                            <li class="ttsp">
                                                <img src="Public/img/'.$value['img'].'" alt="">
                                                <div class="ttsp-content">
                                                    <a href="">'.$value['name'].'</a>
                                                </div>
                                            </li>
                                            <li>'.$value['price'].'</li>
                                            <li>
                                                <button class="down">-</button>
                                                <input class="inputs" size="4" value="'.$value['soluong'].'" maxlength="3" type="text">
                                                <input type="hidden" value="'.$key.'">
                                                <button class="up">+</button>
                                            </li>
                                            <li>'.$tt.'</li>
                                            <li>
                                                <a href="index.php?trang=cart&key='.$key.'">
                                                    <button>Xóa</button>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>';
$cart_checkout[] = [
                    'id' => $value['id'],
                    'name' => $value['name'],
                    'img' => $value['img'],
                    'price' => $value['price'],
                    'soluong' => $value['soluong'],
                    'total' => $tt
                ];
            }
            $html_cart .= '</div>
                            <div class="buy-cart">
                                <div class="box-buy">
                                    <div class="buy-tt">
                                        <p>Tổng tiền:</p>
                                        <span id="ttgh">'.$tong.'</span>
                                    </div>
                                    <form action="index.php?trang=thanhtoan" method="post">
                                        <input type="hidden" name="action" value="checkout">';

            
            foreach ($cart_checkout as $item) {
                    $html_cart .= '
                            <input type="hidden" name="giohang['.$item['id'].'][id]" value="'.$item['id'].'">
                            <input type="hidden" name="giohang['.$item['id'].'][name]" value="'.$item['name'].'">
                            <input type="hidden" name="giohang['.$item['id'].'][img]" value="'.$item['img'].'">
                            <input type="hidden" name="giohang['.$item['id'].'][price]" value="'.$item['price'].'">
                            <input type="hidden" name="giohang['.$item['id'].'][soluong]" value="'.$item['soluong'].'">
                            <input type="hidden" name="giohang['.$item['id'].'][total]" value="'.$item['total'].'">
                        <button class="mua" name="thanhtoan" type="submit">Thanh toán</button>
                    </form>
                    </div>
                </div>';
            }
        } else {
            $html_cart = "Giỏ hàng rỗng";
        }

        return $html_cart;
    }
    
    public function showcart_html_tomtat() {
        if (isset($_SESSION['giohang']) && count($_SESSION['giohang']) > 0) {
            $tong = 0;
            $html_cart = '<div class="table-cart">
                <div class="title-cart">
                    <h3>Thông tin giỏ hàng</h3>
                </div>';
    
       
            $cart_checkout = [];
            
            foreach ($_SESSION['giohang'] as $key => $value) {
                $tt = intval($value['price']) * intval($value['soluong']);
                $tong += $tt;
    
                $html_cart .= '<li><a href="#">'.$value['name'].'</a> x '.$value['soluong'].' = '.$tt.'</li>';
             
            }
            $html_cart .= '</div>
            <h3>Tạm tính: '.$tong.'</h3>';
            
        } else {
            $html_cart = "Giỏ hàng rỗng";
        }
    
        return $html_cart;
    }

    }




?>