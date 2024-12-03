<?php
ob_start();
if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit();
}
?>
<!-- chi tiết sản phẩm -->
<?php
$ch = '';
foreach ($productdetailmodel -> chitiet as $key => $value) {
    $ch .= '
                    <div id="row">
            <!-- hình ảnh -->
            <div class="row-left">
                <img src="./Public/img/' . $value['hinh_sp'] . '" alt="" id="main-img">
            </div>
            <!-- nội dung -->
            <div class="row-right">
                <h1 id="name">' . $value['ten_sp'] . '</h1>
                <div class="price-product">
                    <span id="gia">' . number_format($value['gia_sp'], 0, ',', '.') . 'đ</span>
                    <span class="price-sale">' . number_format($value['giamgia_sp'], 0, ',', '.') . ' đ</span>
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
                <div class="contents">' . $value['thong_tin_sp'] . '</div>
                <div class="quantity">
                    <p>Số lượng</p>
                    <form action="index.php?trang=cart" method="post">
                    <div class="button-quantity">
                        <button type="button" class="down">-</button>
                        <input name="soluong" size="4" value="1" maxlength="3" type="text">
                        <button type="button" class="up">+</button>
                    </div>
                </div>
                <div class="btn-mua">
                    
                        <input type="hidden" name="id" value="' . $value['id'] . '">
                        <input type="hidden" name="price" value="' . $value['gia_sp'] . '">
                        <input type="hidden" name="img" value="' . $value['hinh_sp'] . '">
                        <input type="hidden" name="name" value="' . $value['ten_sp'] . '">
                        <button type="submit" name="btnaddcart" class="themgh">THÊM VÀO GIỎ</button>
                    </form>
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
    if (isset($chitiethinhanh) && is_array($chitiethinhanh)) {
        if (!empty($chitiethinhanh)) {
            foreach ($chitiethinhanh as $value) {
                $hinhUrl = htmlspecialchars($value['hinh_url']);
                echo <<<HTML
                    <div class="mini-box">
                        <img src="./Public/img/$hinhUrl" alt="Chi tiết hình ảnh">
                    </div>
HTML;
            }
        } else {
            echo '<p>Không có hình ảnh chi tiết cho sản phẩm này.</p>';
        }
    } else {
        echo '<p>Dữ liệu không được truyền đúng.</p>';
    }
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
        foreach ($productdetailmodel->chitiet as $key => $value) {
            $ch .= '
                            <div class="contents-describe">' . $value['mo_ta'] . '</div>

                        ';

        }
        echo $ch;
        ?>
        <!-- bình luận -->
        <div class="cmt-user">
    

            <?php
            $ch = '';
        if (isset($_SESSION['email'])) {
           echo '
               <form action="index.php?trang=productdetail&lenh=cmt&id=' . $id . '&iddm=' . $iddm . '&id_user='.$_SESSION['user_id'].'" class="comments-describe" method="post">
                    <div class="comments-user">
                        <img src="./Public/img/user-avatar.jpg" alt="User Avatar">
                    </div>
                    <div class="text-submit">
                        <div class="text">
                            <input placeholder="Viết bình luận..." type="text" name="comment" required />
                        </div>
                        <div class="submit">
                            <button type="submit" name="submit_cmt">Bình luận</button>
                        </div>
                    </div>
        </form>
           ';
            foreach($productdetailmodel -> loadcmt as $key => $value) {
            $ch .= '
                          
                             <div class="comments-describe-user">
                        <div class="comments-user">
                            <img src="./Public/img/sp1.2.jpg" alt="">
                        </div>
                        <div class="comments-text">
                            <div class="name-user">
                                <h4>' .$value['ten'] . '</h4>
                                <p>'.$value['ngay_bl'].'</p>
                            </div>
                            <p>'.$value['noi_dung'].'</p>
                            <div class="vote">
                                <i class="bx bx-like"></i>
                                <i class="bx bx-dislike"></i>
                            </div>
                        </div>


                    </div>

                        ';
            }
            if (empty($productdetailmodel->loadcmt)) {
                echo '<p>Chưa có bình luận cho sản phẩm này.</p>';
            } 
        } else {
            echo '<a class="log-in" href="#">Vui lòng đăng nhập để bình luận</a>';
        }
    echo $ch;
        ?>
        </div>


    </div>
</div>

<!-- sản phẩm tương tự -->
<div id="product">
    <div class="product-header">
        <h1>Sản phẩm tương tự</h1>
    </div>
    <div class="product-box">
        <?php
            $ch = '';
            foreach($productdetailmodel -> splienquan as $key => $value) {
                $ch .='
                    <a href="index.php?trang=productdetail&id=' . $value['id'] . '">
                    <div class="box-sp" >
                    <div class="img">
                        <img src="public/img/' . $value['hinh_sp'] . '" alt="">
                    </div>
                    <div class="text-sp">
                        <h3>' . $value['ten_sp'] . '</h3>
                        <div class="price-sp">
                            <p>' . number_format($value['gia_sp'],0, ',','.') .' đ</p>
                            <p class="sale-sp">' . number_format($value['giamgia_sp'],0,',','.') . ' đ</p>
                        </div>
                    </div>
                </div>
                </a>
                ';
            }
            echo $ch;
        ?>
    </div>
    <div class="more">
        <div class="more-sp">
            <p>Xem thêm</p>
            <p>-></p>
        </div>
    </div>

</div>