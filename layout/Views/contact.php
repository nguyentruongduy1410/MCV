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
        <div class="contact-container">
            <div class="contact-info">
                <h1>Xin chào.</h1>
                <p>Khách hàng là yếu tố vô cùng quan trọng đối với chúng tôi. Sự hài lòng của khách hàng luôn là ưu tiên
                    hàng đầu. Chúng tôi cam kết mang đến dịch vụ tốt nhất cho quý khách.</p>
                <div class="contact-details">
                    <p><strong>Địa chỉ:</strong> Công Viên Phần Mềm, Quang Trung Đ. Tô Ký, Tân Hưng Thuận, Quận 12, Hồ
                        Chí
                        Minh</p>
                    <p><strong>Email:</strong> <a href="mailto:Pet0309@gmail.com">shop@gmail.com</a></p>
                    <p><strong>Điện thoại:</strong> <a href="">0xxxxxxxxxx</a></p>
                </div>
            </div>
            <div class="contact-form">
                <h2>Hỏi câu hỏi của bạn</h2>
                <form action="" method="" onsubmit="contact(event)">
                    <label for="email">Email của bạn</label>
                    <input type="email" id="text" name="email">

                    <label for="name">Tên của bạn</label>
                    <input type="text" id="name" name="name">

                    <label for="message">Lời nhắn</label>
                    <textarea id="message" name="message" rows="4"></textarea>

                    <button type="submit">Gửi Tin Nhắn</button>
                </form>
            </div>
        </div>