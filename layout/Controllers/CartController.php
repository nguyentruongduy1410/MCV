<?php
    class CartController {
        
        public function __construct() {
            // include_once 'Models/CartModel.php'; // Uncomment if you need to use a model
            // $cartmodel = new CartModel();
        }

        // Thêm sản phẩm vào giỏ hàng
        public function addtocart($id, $name, $img, $price, $soluong) {
            if (isset($_SESSION['giohang'])) {
                $found = false;
                foreach ($_SESSION['giohang'] as &$item) {
                    if ($item['id'] == $id) {
                        $item['soluong'] += $soluong;
                        $found = true;
                        break;
                    }
                }
                if (!$found) {
                    $item = array('id' => $id, 'name' => $name, 'img' => $img, 'price' => $price, 'soluong' => $soluong);
                    array_push($_SESSION['giohang'], $item);
                }
            } else {
                $_SESSION['giohang'] = array();
                $item = array('id' => $id, 'name' => $name, 'img' => $img, 'price' => $price, 'soluong' => $soluong);
                array_push($_SESSION['giohang'], $item);
            }
            $_SESSION['so_luong'] = count($_SESSION['giohang']);
        }

        public function removeFromCart($key) {
            if (isset($_SESSION['giohang'][$key])) {
                unset($_SESSION['giohang'][$key]);
                $_SESSION['giohang'] = array_values($_SESSION['giohang']); 
                $_SESSION['so_luong'] = count($_SESSION['giohang']);
            }
        }

        // Hiển thị giỏ hàng
        public function showcart_html() {
            if (isset($_SESSION['giohang']) && (count($_SESSION['giohang']) > 0)) {
                $tong = 0;
                $html_cart = '<div class="table-cart">
                    <div class="title-cart">
                        <ul>
                            <li class="ttsp">Thông tin sản phẩm</li>
                            <li>Đơn giá</li>
                            <li>Số lượng</li>
                            <li>Thành tiền</li>
                        </ul>
                    </div>';

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
                                    <button class="down" data-key="'.$key.'">-</button>
                                    <input class="inputs" size="4" value="'.$value['soluong'].'" maxlength="3" type="text" data-key="'.$key.'">
                                    <button class="up" data-key="'.$key.'">+</button>
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
                }

                $html_cart .= '</div>
                    <div class="buy-cart">
                        <div class="box-buy">
                            <div class="buy-tt">
                                <p>Tổng tiền:</p>
                                <span id="ttgh">'.$tong.'</span>
                            </div>
                            <form action="index.php?trang=thanhtoan" method="post">
                                <button class="mua" name="thanhtoan" type="submit">Thanh toán</button>
                            </form>
                        </div>
                    </div>';
            } else {
                $html_cart = "Giỏ hàng rỗng";
            }

            return $html_cart;
        }

        public function updateQuantity($key, $action) {
            if (isset($_SESSION['giohang'][$key])) {
                if ($action == "increase") {
                    $_SESSION['giohang'][$key]['soluong']++;
                } elseif ($action == "decrease" && $_SESSION['giohang'][$key]['soluong'] > 1) {
                    $_SESSION['giohang'][$key]['soluong']--;
                }
                $_SESSION['so_luong'] = count($_SESSION['giohang']);
            }
        }
    }
?>
