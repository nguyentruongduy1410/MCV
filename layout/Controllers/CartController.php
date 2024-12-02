<?php
    class CartController{
        public function __construct(){
            // include_once 'Models/CartModel.php';
            // $cartmodel = new CartModel();
        }
        public function addtocart($id,$name,$img,$price,$soluong){
            if(isset($_SESSION['giohang'])){
                $item=array('id'=>$id,'name'=>$name,'img'=>$img,'price'=>$price,'soluong'=>$soluong);
                array_push($_SESSION['giohang'],$item);
            }
        }
        public function showcart_html(){
            if(isset($_SESSION['giohang'])&&(count($_SESSION['giohang'])>0)){
               $tong=0;
                $html_cart='<div class="table-cart">
                <div class="title-cart">
                    <ul>
                        <li class="ttsp">Thông tin sản phầm</li>
                        <li>Đơn giá</li>
                        <li>Số lượng</li>
                        <li>Thành tiền</li>
                    </ul>
                </div>';
                foreach ($_SESSION['giohang'] as $key=>$value) {
                    $tt=intval($value['price'])*intval($value['soluong']);
                    $tong+=$tt;
                    $html_cart.='<div id="tbodygh">
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
                }
                $html_cart.='</div>
                                <div class="buy-cart">
                                    <div class="box-buy">
                                        <div class="buy-tt">
                                            <p>Tổng tiền:</p>
                                            <span id="ttgh">'.$tong.'</span>
                                        </div>
                                        <button>Thanh toán</button>
                                    </div>
                                </div>';
                
            }else{
                $html_cart="Giỏ hàng rỗng";
            }
            return $html_cart;
           
        }
    }
?>