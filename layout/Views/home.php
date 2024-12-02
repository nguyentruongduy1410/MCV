<!-- banner -->
<div id="banner">
    <div class="list-img">
        <div class="img-banner"><img src="./Public/img/baner1.png" alt=""></div>
        <div class="img-banner"><img src="./Public/img/baner2.png" alt=""></div>
        <div class="img-banner"><img src="./Public/img/baner3.png" alt=""></div>
    </div>
    <ul class="dots">
        <li class="active"></li>
        <li></li>
        <li></li>
    </ul>
</div>


<div class="banner-footer">
    <div class="box">
        <div class="box-top">
            <a href="#">Tất cả</a>
            <a class="i-hover" href="#"><i class='bx bx-right-arrow-alt'></i></a>
        </div>
        <div class="box-bottom">
            <img src="./Public/img/z5981164258549_aafb8f566144ea6448d1c6978f314d60.jpg" alt="">
        </div>
    </div>
    <div class="box">
        <div class="box-top">
            <a href="#">sssss</a><a class="i-hover" href="#"><i class='bx bx-right-arrow-alt'></i></a>
        </div>
        <div class="box-bottom">
            <img src="./Public/img/Untitled-1.png" alt="">
        </div>
    </div>
    <div class="box">
        <div class="box-top">
            <a href="#">Giảm giá</a>
            <a class="i-hover" href="#"><i class='bx bx-right-arrow-alt'></i></a>
        </div>
        <div class="box-bottom">
            <img src="./Public/img/z5981164258549_aafb8f566144ea6448d1c6978f314d60.jpg" alt="">
        </div>
    </div>


</div>
<!-- sản phẩm -->
<div id="product">
    <div class="product-header">
        <h1>Sản phẩm mới</h1>
    </div>
    <div class="product-box">
        <?php
        
        $ch = '';
        foreach ($homemodel->mangsp as $key => $value) {
            $ch .= '
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
        <a href="index.php?trang=allproduct">
            <div class="more-sp">
                <p>Xem thêm</p>
                <i class='bx bx-chevron-right'></i>
            </div>
        </a>
    </div>

</div>


<!-- sale -->

<div id="sale">
    <h1>Top bán chạy</h1>
    <div class="sale-wrapper">
        <div class="all">
            <?php
            $ch = '';
            foreach ($homemodel->spdatbiet as $key => $value) {
                $ch .= '
                    <div class="pro-sale">
                        <a href="index.php?trang=home&id=' . $value['id'] . '">
                            <div class="sale-img">
                                <img src="./Public/img/' . $value['hinh_sp'] . '" alt="">
                            </div>
                        </a>
                        <div class="text-sale">
                            <h4>' . $value['ten_sp'] . '</h4>
                            <div class="price-sale">
                                <h4>' . number_format($value['gia_sp'],0, ',','.') . '</h4>
                                <h3>' .number_format( $value['giamgia_sp'],0,',','.') . '</h3>
                            </div>
                            <p>' . $value['thong_tin_sp'] . '</p>
                            <button>Mua ngay</button>
                        </div>
                     </div>
                    ';
            }
            echo $ch;

            ?>




        </div>
    </div>

    <div class="dots-sale">
        <ul>
            <li class="active-sale"></li>
            <li></li>
            <li></li>
        </ul>
    </div>

</div>

<div id="product">
    <div class="product-header">
        <?php

        $ch = '';
        foreach ($homemodel->danhmucsp as $key => $value) {
            if ($value['id'] == '1') {
                $ch .= '
                        <h1>' . $value['ten_dm'] . '</h1>
                    ';
            }
        }
        echo $ch;
        ?>
    </div>
    <div class="product-box">
        <?php
        $ch = '';
        if (!empty($homemodel->sanphamdanhmuc[1])) {
            foreach ($homemodel->sanphamdanhmuc[1] as $key => $product) {

                $ch .= '
                    <a href="index.php?trang=home&id='.$product['id'].'">
                        <div class="box-sp">
                            <div class="img">
                                <img src="./Public/img/' . htmlspecialchars($product['hinh_sp']) . '" alt="' . htmlspecialchars($product['ten_sp']) . '">
                            </div>
                            <div class="text-sp">
                                <h3>' . $product['ten_sp'] . '</h3>
                                <div class="price-sp">
                                    <p>' . number_format( $product['gia_sp'],0,',','.') . 'đ</p>
                                    <p class="sale-sp">' . number_format($product['giamgia_sp'],0,',','.') . 'đ</p>
                                </div>
                            </div>
                        </div>
                    </a>

            
        ';
            }
        } else {
            $ch = '<p>Không có sản phẩm trong danh mục này.</p>';
        }

        echo $ch;
        ?>








    </div>
    <div class="more">
        <a href="index.php?trang=allproduct&iddm=1">
            <div class="more-sp">
                <p>Xem thêm</p>
                <i class='bx bx-chevron-right'></i>
            </div>
        </a>
    </div>

</div>


<div id="product">
    <?php
    $ch = '';
    foreach ($homemodel->danhmucsp as $key => $value) {
        if ($value['id'] == '2') {
            $ch .= '
                        <h1>' . $value['ten_dm'] . '</h1>
                    ';
        }
    }
    echo $ch;
    ?>
    <div class="product-box">

        <?php
        $ch = '';
        if (!empty($homemodel->sanphamdanhmuc[2])) {
            foreach ($homemodel->sanphamdanhmuc[2] as $key => $product) {
                $ch .= '
                    <a href="index.php?trang=home&id='.$product['id'].'">
                            <div class="box-sp">
                                <div class="img">
                                    <img src="./Public/img/' . htmlspecialchars($product['hinh_sp']) . '" alt="' . htmlspecialchars($product['ten_sp']) . '">
                                </div>
                                <div class="text-sp">
                                    <h3>' . $product['ten_sp'] . '</h3>
                                    <div class="price-sp">
                                        <p>' . number_format( $product['gia_sp'], 0, ',', '.') . 'đ</p>
                                        <p class="sale-sp">' . number_format( $product['giamgia_sp'], 0, ',', '.') . 'đ</p>
                                    </div>
                                </div>
                            </div>        
                    </a>

            
        ';
            }
        } else {
            $ch = '<p>Không có sản phẩm trong danh mục này.</p>';
        }

        echo $ch;
        ?>





    </div>
    <div class="more">
        <a href="index.php?trang=allproduct&iddm=2">
            <div class="more-sp">
                <p>Xem thêm</p>
                <i class='bx bx-chevron-right'></i>
            </div>
        </a>
    </div>

</div>