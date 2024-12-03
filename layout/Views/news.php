<!-- tin tức
<div class="box-all-news">
            <h2>Bài viết lưu trữ</h2>

            <div class="news-item">
                <div class="news-image">
                    <img src="img/a0f17430-5141-49b9-8f7e-85fb25b97f92.jpg" alt="Bán trống trường học tphcm">
                </div>
                <div class="news-content">
                    <h3>Bán trống trường học tphcm</h3>
                    <p class="news-date">Ngày xuất bản: 20/11/2024</p>
                    <p>Bán trống trường học tphcm Các sản phẩm trống trường học tại cơ sở Phong Vân đang được rất nhiều
                        khách hàng tin tưởng lựa chọn và hài lòng...</p>
                    <a href="newsdetail.php" class="see-more">Xem chi tiết »</a>
                </div>
            </div>

            <div class="news-item">
                <div class="news-image">
                    <img src="img/a0b7831c-83e2-4644-b81f-0e7260d86e8b.webp" alt="Nơi bán cồng chiêng ở Hà Nội">
                </div>
                <div class="news-content">
                    <h3>Nơi bán cồng chiêng ở Hà Nội</h3>
                    <p class="news-date">Ngày xuất bản: 20/11/2024</p>
                    <p>Nơi bán cồng chiêng ở Hà Nội Cồng chiêng là loại nhạc khí bằng đồng rất phổ biến và gần gũi với
                        người dân Tây Nguyên...</p>
                    <a href="#" class="see-more">Xem chi tiết »</a>
                </div>
            </div>

            <div class="news-item">
                <div class="news-image">
                    <img src="img/a0f17430-5141-49b9-8f7e-85fb25b97f92.jpg" alt="Bán kèn saxophone tại Đà Nẵng">
                </div>
                <div class="news-content">
                    <h3>Bán kèn saxophone tại Đà Nẵng</h3>
                    <p class="news-date">Ngày xuất bản: 20/11/2024</p>
                    <p>Bán kèn saxophone tại Đà Nẵng Kèn Saxophone là một trong số những loại nhạc cụ hiện đại được
                        nhiều người yêu thích...</p>
                    <a href="#" class="see-more">Xem chi tiết »</a>
                </div>
            </div>

            <div class="news-item">
                <div class="news-image">
                    <img src="img/a0f17430-5141-49b9-8f7e-85fb25b97f92.jpg" alt="Cửa hàng bán đàn guitar gần nhất">
                </div>
                <div class="news-content">
                    <h3>Cửa hàng bán đàn guitar gần nhất</h3>
                    <p class="news-date">Ngày xuất bản: 20/11/2024</p>
                    <p>Cửa hàng bán đàn guitar gần nhất Tìm được cửa hàng bán đàn guitar gần nhất sẽ hỗ trợ rất nhiều
                        cho bạn trong quá trình...</p>
                    <a href="#" class="see-more">Xem chi tiết »</a>
                </div>
            </div>
            <div class="news-item">
                <div class="news-image">
                    <img src="img/a0f17430-5141-49b9-8f7e-85fb25b97f92.jpg" alt="Cửa hàng bán đàn guitar gần nhất">
                </div>
                <div class="news-content">
                    <h3>Cửa hàng bán đàn guitar gần nhất</h3>
                    <p class="news-date">Ngày xuất bản: 20/11/2024</p>
                    <p>Cửa hàng bán đàn guitar gần nhất Tìm được cửa hàng bán đàn guitar gần nhất sẽ hỗ trợ rất nhiều
                        cho bạn trong quá trình...</p>
                    <a href="#" class="see-more">Xem chi tiết »</a>
                </div>
            </div>
            <div class="news-item">
                <div class="news-image">
                    <img src="img/a0f17430-5141-49b9-8f7e-85fb25b97f92.jpg" alt="Cửa hàng bán đàn guitar gần nhất">
                </div>
                <div class="news-content">
                    <h3>Cửa hàng bán đàn guitar gần nhất</h3>
                    <p class="news-date">Ngày xuất bản: 20/11/2024</p>
                    <p>Cửa hàng bán đàn guitar gần nhất Tìm được cửa hàng bán đàn guitar gần nhất sẽ hỗ trợ rất nhiều
                        cho bạn trong quá trình...</p>
                    <a href="#" class="see-more">Xem chi tiết »</a>
                </div>
            </div>

        </div> -->




        <div class="box-all-news">
    <h2>Bài viết lưu trữ</h2>
    <?php
    $ch = '';
    foreach ($newsList as $news => $value) {
        $ch .= '
            <div class="news-item">
            <div class="news-image">
                <img src="./Public/img/' . $value['hinh_anh'] . '" alt="">
            </div>
            <div class="news-content">
                <h3>' . $value['ten_bv'] . '</h3>
                <p class="news-date">Ngày xuất bản: ' . $value['ngay_dang'] . '</p>
                <p>' . $value['mo_ta'] . '</p>
                <a href="index.php?trang=newsdetail&id=' . $value['id'] . '" class="see-more">Xem chi tiết »</a>
            </div>
        </div>
            ';
    }
    echo $ch;
    ?>
</div>



<!-- Phân trang -->
<ul class="pagination" style="display: flex;justify-content: center;margin-top: 15px;">
    <?php if ($totalPages > 1): ?>
        <!-- Nút "Trước" -->
        <?php if ($page > 1): ?>
            <a href="index.php?trang=news&chuyen=<?php echo $page - 1; ?>">
                <li><i class="bx bxs-chevron-left"></i></li>
            </a>
        <?php endif; ?>

        <!-- Các trang -->
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <a href="index.php?trang=news&chuyen=<?php echo $i; ?>">
                <li class="<?php echo ($i == $page) ? 'pagination_item_active' : ''; ?>">
                    <?php echo $i; ?>
                </li>
            </a>
        <?php endfor; ?>

        <!-- Nút "Tiếp" -->
        <?php if ($page < $totalPages): ?>
            <a href="index.php?trang=news&chuyen=<?php echo $page + 1; ?>">
                <li><i class="bx bx-chevron-right"></i></li>
            </a>
        <?php endif; ?>
    <?php endif; ?>
</ul>
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