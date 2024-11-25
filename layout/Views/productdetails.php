
        <!-- chi tiết sản phẩm -->
        <?php
            $ch = '';
            foreach($homemodel -> chitiet as $key => $value){
                $ch .= '
                    <div id="row">
            <!-- hình ảnh -->
            <div class="row-left">
                <img src="./Public/img/'.$value['hinh_sp'].'" alt="" id="main-img">
            </div>
            <!-- nội dung -->
            <div class="row-right">
                <h1 id="name">'.$value['ten_sp'].'</h1>
                <div class="price-product">
                    <span id="gia">'.number_format($value['gia_sp'],0, ',', '.').'đ</span>
                    <span class="price-sale">'.number_format($value['giamgia_sp'],0,',', '.').' đ</span>
                </div>
                <div class="policy">
                    <div class="item">
                        <img src="./Public/img/product_poli_1.webp" alt="">
                        Đổi trả dễ dàng
                    </div>
                    <div class="item">
                        <img src="./Public/img/product_poli_2.webp" alt="">
                        Chính hãng 100%
                    </div>
                    <div class="item">
                        <img src="./Public/img/product_poli_3.webp" alt="">
                        Giao toàn quốc
                    </div>
                </div>
                <div class="top">
                    <div class="top-ban">
                        <img src="./Public/img/cup.webp" alt="">
                        <h2>Top bán chạy</h2>
                    </div>
                    <div class="top-hot">
                        <a href="index.php?trang=home"><p>Sản phẩm bán chạy nhất ></p></a>
                    </div>
                </div>
                <div class="contents">'.$value['thong_tin_sp'].'</div>
                <div class="quantity">
                    <p>Số lượng</p>
                    <div class="button-quantity">
                        <button class="down">-</button>
                        <input size="4" value="1" maxlength="3" type="text">
                        <button class="up">+</button>
                    </div>
                </div>
                <div class="btn-mua">
                    <button class="themgh">THÊM VÀO GIỎ</button>
                    <button class="mua">MUA NGAY</button>
                </div>

                 ';
            }
            echo $ch;

        ?>
            </div>
            <!-- mini ảnh sản phẩm -->
            <div class="wrapper" id="minis">
                <?php 
                    $ch = '';
                    foreach($productdetailmodel -> chitiethinhanh as $value){
                        $ch.='
                            <div class="mini-box">
                                <img src="./Public/img/'.$value['hinh_url'].'" alt="">
                            </div>
                        ';
                    }
                    echo $ch;
                ?>
        </div>
               
        <div id="describe-product">

            <div class="all-describe">
                <div class="button-describe">
                    <button id="mota">MÔ TẢ SẢN PHẨM</button>
                    <button id="vote">ĐÁNH GIÁ SẢN PHẨM</button>
                </div>
                <!-- chi tiết sản phẩm -->
                 <?php
                    $ch = '';
                    foreach($homemodel -> chitiet as $key => $value){
                        $ch .='
                            <div class="contents-describe">'.$value['mo_ta'].'</div>

                        ';

                    }
                    echo $ch;
                 ?>
                <!-- bình luận -->
                <div class="cmt-user">
                    <div class="comments-describe">
                        <div class="comments-user">
                            <img src="./Public/img/a0f17430-5141-49b9-8f7e-85fb25b97f92.jpg" alt="">
                        </div>
                        <div class="text-submit">
                            <div class="text">
                                <input placeholder="Viết bình luận..." type="text" name="">
                            </div>
                            <div class="submit">
                                <button>Bình luận</button>
                            </div>
                        </div>
                    </div>
                    <!-- bình luận của người khác -->
                    <div class="comments-describe-user">
                        <div class="comments-user">
                            <img src="./Public/img/a0f17430-5141-49b9-8f7e-85fb25b97f92.jpg" alt="">
                        </div>
                        <div class="comments-text">
                            <div class="name-user">
                                <h4>Nguyễn Trường Duy</h4>
                                <p>14/10/2005</p>
                            </div>
                            <p>Web ai làm mà đẹp vãi</p>
                            <div class="vote">
                                <i class='bx bx-like'></i>
                                <i class='bx bx-dislike'></i>
                            </div>
                        </div>


                    </div>

                    <div class="comments-describe-user">
                        <div class="comments-user">
                            <img src="img/a0f17430-5141-49b9-8f7e-85fb25b97f92.jpg" alt="">
                        </div>
                        <div class="comments-text">
                            <div class="name-user">
                                <h4>Nguyễn Trường Duy</h4>
                                <p>14/10/2005</p>
                            </div>
                            <p>Web ai làm mà đẹp vãi</p>
                            <div class="vote">
                                <i class='bx bx-like'></i>
                                <i class='bx bx-dislike'></i>
                            </div>
                        </div>
                        

                    </div>


                    <div class="comments-describe-user">
                        <div class="comments-user">
                            <img src="img/a0f17430-5141-49b9-8f7e-85fb25b97f92.jpg" alt="">
                        </div>
                        <div class="comments-text">
                            <div class="name-user">
                                <h4>Nguyễn Trường Duy</h4>
                                <p>14/10/2005</p>
                            </div>
                            <p>Web ai làm mà đẹp vãi</p>
                            <div class="vote">
                                <i class='bx bx-like'></i>
                                <i class='bx bx-dislike'></i>
                            </div>
                        </div>

                        

                    </div>
                </div>


            </div>
        </div>

        <!-- sản phẩm tương tự -->
        <div id="product">
            <div class="product-header">
                <h1>Sản phẩm tương tự</h1>
            </div>
            <div class="product-box">
                <div class="box-sp">
                    <div class="img">
                        <img src="img/a0f17430-5141-49b9-8f7e-85fb25b97f92.jpg" alt="">
                    </div>
                    <div class="text-sp">
                        <h3>sfiafisajdfildasjfn</h3>
                        <div class="price-sp">
                            <p>200.000đ</p>
                            <p class="sale-sp">500.000đ</p>
                        </div>
                    </div>
                </div>
                <div class="box-sp">
                    <div class="img">
                        <img src="img/a0f17430-5141-49b9-8f7e-85fb25b97f92.jpg" alt="">
                    </div>
                    <div class="text-sp">
                        <h3>sfiafisajdfildasjfn</h3>
                        <div class="price-sp">
                            <p>200.000đ</p>
                            <p class="sale-sp">500.000đ</p>
                        </div>
                    </div>
                </div>
                <div class="box-sp">
                    <div class="img">
                        <img src="img/a0f17430-5141-49b9-8f7e-85fb25b97f92.jpg" alt="">
                    </div>
                    <div class="text-sp">
                        <h3>sfiafisajdfildasjfn</h3>
                        <div class="price-sp">
                            <p>200.000đ</p>
                            <p class="sale-sp">500.000đ</p>
                        </div>
                    </div>
                </div>
                <div class="box-sp">
                    <div class="img">
                        <img src="img/a0f17430-5141-49b9-8f7e-85fb25b97f92.jpg" alt="">
                    </div>
                    <div class="text-sp">
                        <h3>sfiafisajdfildasjfn</h3>
                        <div class="price-sp">
                            <p>200.000đ</p>
                            <p class="sale-sp">500.000đ</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="more">
                <div class="more-sp">
                    <p>Xem thêm</p>
                    <p>-></p>
                </div>
            </div>

        </div>
        