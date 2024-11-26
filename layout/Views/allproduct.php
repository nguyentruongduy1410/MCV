<div id="all-product">
    <div class="product-left">
        <div class="product-left-sticky">
            <h3><i class='bx bx-menu'></i>Danh mục</h3>
            <ul>
                <a href="index.php?trang=allproduct">
                    <li>
                        <i class='bx bxs-music'></i>
                        <p>Tất cả sản phẩm</p>
                    </li>
                </a>
                <?php
                $ch = '';
                foreach ($ds->dm as $key => $value) {
                    $ch .= '
                            <a href="index.php?trang=allproduct&iddm=' . $value['id'] . '">
                                 <li>
                                    <i class="bx bxs-music"></i>
                                    <p>' . $value['ten_dm'] . '</p>
                                </li>
                            </a>
                            
                        ';

                }
                echo $ch;

                ?>
            </ul>
        </div>
    </div>

    <div class="product-right">
        <div class="filter-all">
            <!-- Bộ lọc giá -->
            <div class="filter-section">
                <div class="filter-title">Lọc theo giá</div>
                <div class="filter-price">
                    <input type="radio" id="price1" name="price" value="1">
                    <label for="price1">Dưới 500.000đ</label>

                    <input type="radio" id="price2" name="price" value="2">
                    <label for="price2">500.000đ - 1.000.000đ</label>

                    <input type="radio" id="price3" name="price" value="3">
                    <label for="price3">1.000.000đ - 5.000.000đ</label>

                    <input type="radio" id="price4" name="price" value="4">
                    <label for="price4">Trên 5.000.000đ</label>
                </div>
            </div>

        </div>
        <div id="product">
            <?php
            if (!empty($iddm)) {
                foreach ($ds->dm as $value) {
                    if ($value['id'] == $iddm) {
                        echo '<div class="product-title">' . $value['ten_dm'] . '</div>';
                        break;
                    }
                }
            } elseif (!empty($_GET['kyw'])) {
                echo '<div class="product-title">Kết quả tìm kiếm cho: ' . $_GET['kyw'] . '</div>';
            } else {
                echo '<div class="product-title">Tất cả sản phẩm</div>';
            }
            ?>

            <div class="box">
                <?php
                $ch = '';
                if (isset($mang) && !empty($mang)) {
                    foreach ($mang as $key => $value) {
                        $ch .= '
                            <a href="index.php?trang=home&id='.$value['id'].'">
                                <div class="box-sp">
                                    <div class="img">
                                        <img src="./Public/img/' . $value['hinh_sp'] . '" alt="">
                                    </div>
                                    <div class="text-sp">
                                        <h3>' . $value['ten_sp'] . '</h3>
                                        <div class="price-sp">
                                            <p>' . $value['ten_sp'] . '</p>
                                            <p class="sale-sp">' . $value['giamgia_sp'] . '</p>
                                        </div>
                                    </div>
                                </div>
                            </a>

                            
        ';
                    }
                } else {
                    $ch .= '<p>Không có sản phẩm nào.</p>';
                }
                echo $ch;
                ?>




            </div>
        </div>

        <ul class="pagination">
            <?php
            if ($tongst > 1) {
                echo '<a href="index.php?trang=allproduct&chuyen=' . ($chuyen - 1) . '"><li><i class="bx bxs-chevron-left"></i></li></a>';
            }
            for ($i = 1; $i <= $tongst; $i++) {
                $activeClass = ($i == $chuyen) ? 'pagination_item_active' : '';
                echo '<a href="index.php?trang=allproduct&chuyen=' . $i . '">
            <li class="' . $activeClass . '">' . $i . '</li>
          </a>';
            }
            if ($chuyen < $tongst) {
                echo '
                    <a href="index.php?trang=allproduct&chuyen=' . ($chuyen + 1) . '"><li><i class="bx bx-chevron-right"></i></li></a>

                ';
            }


            ?>
        </ul>
    </div>
</div>
<script>
    var menu_icon = document.getElementById('mm')
    var menu_hide = document.querySelector('#menu-hide');
    menu_icon.onclick = function () {

        if (menu_hide.style.display === 'none') {
            menu_hide.style.display = 'block';
        } else {
            menu_hide.style.display = 'none';
        }
    }


    let tools = document.getElementById('tools');
    let tools_menu = document.getElementById('tools-menu');

    tools.addEventListener('mouseover', function () {
        tools_menu.style.display = 'block';
    })
    tools.addEventListener('mouseout', function () {
        setTimeout(function () {
            if (!tools_menu.matches(':hover')) {
                tools_menu.style.display = 'none';
            }
        }, 200);
    });
    tools_menu.addEventListener('mouseleave', function () {
        tools_menu.style.display = 'none';
    })
    tools_menu.addEventListener('mouseout', function () {
        tools_menu.style.display = 'block';
    })
</script>