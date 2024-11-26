
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

        <div class="header-content">
            <h1>Chào Mừng Đến Với Cửa Hàng Nhạc Cụ Dân Tộc CMV</h1>
            <p>Chúng tôi là nơi hội tụ của âm nhạc truyền thống Việt Nam</p>
        </div>


        <!-- Giới Thiệu -->
        <section class="about">
            <div class="about-content">
                <div class="about-text">
                    <h2>Về Chúng Tôi</h2>
                    <p>Cửa hàng chúng tôi ra đời với mong muốn bảo tồn và lan tỏa nét đẹp của âm nhạc dân tộc Việt Nam.
                        Với tình yêu dành cho những âm thanh truyền thống, chúng tôi cung cấp các loại nhạc cụ dân tộc
                        được chế tác thủ công, tỉ mỉ đến từng chi tiết. Mỗi nhạc cụ không chỉ là sản phẩm, mà còn là một
                        phần của văn hóa và lịch sử dân gian.</p>
                </div>
                <div class="about-image">
                    <img src="./Public/img/gioi_thieu.jpg" alt="Nhạc Cụ Dân Tộc">
                </div>
            </div>
        </section>

        <!-- Các Dịch Vụ -->
        <section class="services">
            <div class="service-item">
                <img src="./Public/img/chat_luong.png" alt="Chất Lượng">
                <h3>Chất Lượng Đảm Bảo</h3>
                <p>Chất lượng của từng sản phẩm luôn là ưu tiên hàng đầu. Mỗi nhạc cụ đều được làm thủ công bởi các nghệ
                    nhân lành nghề, từ khâu lựa chọn nguyên liệu đến khi hoàn thiện sản phẩm. Chúng tôi không ngừng kiểm
                    tra và đảm bảo rằng mỗi nhạc cụ đều đạt chuẩn về âm thanh và độ bền, để khách hàng có thể yên tâm sử
                    dụng trong thời gian dài. Các chính sách bảo hành của chúng tôi cũng sẽ giúp khách hàng an tâm hơn
                    khi chọn lựa sản phẩm.

                </p>
            </div>
            <div class="service-item">
                <img src="./Public/img/da_dang.png" alt="Đa Dạng">
                <h3>Sản Phẩm Đa Dạng</h3>
                <p>Cửa hàng tự hào cung cấp đa dạng các nhạc cụ dân tộc như đàn tranh, đàn bầu, sáo trúc, đàn tỳ bà và
                    cồng chiêng. Mỗi loại nhạc cụ đều mang ý nghĩa văn hóa riêng biệt và được đi kèm với mô tả ngắn gọn
                    về nguồn gốc, đặc điểm. Khách hàng có thể dễ dàng tìm thấy nhạc cụ yêu thích và phù hợp với phong
                    cách âm nhạc của mình.</p>
            </div>
            <div class="service-item">
                <img src="./Public/img/ho_tro.png" alt="Hỗ Trợ Khách Hàng">
                <h3>Hỗ Trợ Khách Hàng</h3>
                <p>Chúng tôi luôn sẵn sàng hỗ trợ khách hàng trong việc lựa chọn nhạc cụ phù hợp, dù bạn là người mới
                    bắt đầu hay là nghệ sĩ chuyên nghiệp. Ngoài ra, cửa hàng còn cung cấp hướng dẫn bảo quản và bảo trì
                    để nhạc cụ luôn giữ được âm thanh tốt nhất theo thời gian. Đội ngũ chúng tôi cam kết mang đến dịch
                    vụ tận tâm và chu đáo.</p>
            </div>
            <div class="service-item">
                <img src="./Public/img/giao_hang.png" alt="Giao Hàng">
                <h3>Giao Hàng Toàn Quốc</h3>
                <p>Cửa hàng chúng tôi hỗ trợ giao hàng đến mọi tỉnh thành trên khắp cả nước, đảm bảo khách hàng ở bất kỳ
                    đâu cũng có thể dễ dàng sở hữu các nhạc cụ dân tộc chất lượng. Mỗi đơn hàng đều được đóng gói cẩn
                    thận, đảm bảo sản phẩm đến tay khách hàng an toàn và nguyên vẹn. Dịch vụ giao hàng nhanh chóng, đúng
                    thời gian cam kết, giúp khách hàng yên tâm khi mua sắm.</p>
            </div>
            <div class="service-item">
                <img src="./Public/img/gia_tot.png" alt="Giá Tốt">
                <h3>Giá Tốt Nhất</h3>
                <p>Chúng tôi cam kết cung cấp sản phẩm với giá cả cạnh tranh nhất trên thị trường. Nhờ vào mối quan hệ
                    trực tiếp với các nghệ nhân và nhà sản xuất, cửa hàng có thể đưa ra các mức giá hợp lý mà vẫn đảm
                    bảo chất lượng sản phẩm. Khách hàng sẽ nhận được sản phẩm xứng đáng với số tiền bỏ ra, cùng với
                    những ưu đãi và khuyến mãi thường xuyên dành cho các loại nhạc cụ khác nhau.</p>
            </div>
            <div class="service-item">
                <img src="./Public/img/uy_tin.png" alt="Uy Tín">
                <h3>Uy Tín Và Minh Bạch</h3>
                <p>Chúng tôi luôn minh bạch về nguồn gốc và chất lượng của từng sản phẩm. Mỗi nhạc cụ đều có thông tin
                    rõ ràng về quy trình sản xuất và các nghệ nhân chế tác. Uy tín là nền tảng quan trọng trong hoạt
                    động kinh doanh của chúng tôi, vì vậy mọi thông tin từ giá cả đến chính sách bảo hành, đổi trả đều
                    được trình bày công khai và rõ ràng. Chúng tôi mong muốn mang đến cho khách hàng sự tin tưởng tuyệt
                    đối khi mua sắm.
                </p>
            </div>
        </section>