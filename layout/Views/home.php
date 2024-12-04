<!-- banner -->
<div id="banner">
    <div class="list-img">
        <?php
        $ch = '';
        foreach ($homemodel->banner as $key => $value) {
            $ch .= '
                    <div class="img-banner"><img src="./Public/img/' . $value['hinh_anh'] . '" alt=""></div>
                ';
        }
        echo $ch;
        ?>

    </div>
    <ul class="dots">
        <li class="active"></li>
        <li></li>
        <li></li>
    </ul>
</div>
<div class="banner-footer">

    <?php
    $ch = '';
    foreach ($homemodel->bannermini as $key => $value) {
        $ch .= '
                <div class="banner-food1">
                    <h3>' . $value['ten_banner_mini'] . '</h3>
                    <img src="./Public/img/' . $value['mini_image'] . '" alt="">
                </div>

            ';
    }
    echo $ch;
    ?>
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
                <a href="index.php?trang=productdetail&id=' . $value['id'] . '&iddm=' . $value['id_dm'] . '">
                    <div class="box-sp" >
                    <div class="img">
                        <img src="public/img/' . $value['hinh_sp'] . '" alt="">
                    </div>
                    <div class="text-sp">
                        <h3>' . $value['ten_sp'] . '</h3>
                        <div class="price-sp">
                            <p>' . number_format($value['gia_sp'], 0, ',', '.') . ' đ</p>
                            <p class="sale-sp">' . number_format($value['giamgia_sp'], 0, ',', '.') . ' đ</p>
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
                        <a href="index.php?trang=productdetail&id=' . $value['id'] . '&iddm=' . $value['id_dm'] . '">
                            <div class="sale-img">
                                <img src="./Public/img/' . $value['hinh_sp'] . '" alt="">
                            </div>
                        </a>
                        <div class="text-sale">
                            <h4>' . $value['ten_sp'] . '</h4>
                            <div class="price-sale">
                                <h4>' . number_format($value['gia_sp'], 0, ',', '.') . '</h4>
                                <h3>' . number_format($value['giamgia_sp'], 0, ',', '.') . '</h3>
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
                    <a href="index.php?trang=productdetail&id=' . $product['id'] . '&iddm=' . $product['id_dm'] . '">
                        <div class="box-sp">
                            <div class="img">
                                <img src="./Public/img/' . htmlspecialchars($product['hinh_sp']) . '" alt="' . htmlspecialchars($product['ten_sp']) . '">
                            </div>
                            <div class="text-sp">
                                <h3>' . $product['ten_sp'] . '</h3>
                                <div class="price-sp">
                                    <p>' . number_format($product['gia_sp'], 0, ',', '.') . 'đ</p>
                                    <p class="sale-sp">' . number_format($product['giamgia_sp'], 0, ',', '.') . 'đ</p>
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
                    <a href="index.php?trang=productdetail&id=' . $product['id'] . '&iddm=' . $product['id_dm'] . '">
                            <div class="box-sp">
                                <div class="img">
                                    <img src="./Public/img/' . htmlspecialchars($product['hinh_sp']) . '" alt="' . htmlspecialchars($product['ten_sp']) . '">
                                </div>
                                <div class="text-sp">
                                    <h3>' . $product['ten_sp'] . '</h3>
                                    <div class="price-sp">
                                        <p>' . number_format($product['gia_sp'], 0, ',', '.') . 'đ</p>
                                        <p class="sale-sp">' . number_format($product['giamgia_sp'], 0, ',', '.') . 'đ</p>
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