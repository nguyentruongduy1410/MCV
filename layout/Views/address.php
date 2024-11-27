<style>
.address-main{

padding: 20px;
font-family: 'Arial', sans-serif;
background-color: #f9f9f9;
display: flex;
gap: 20px; 
justify-content: center; 
align-items: center;
}
/* address */
#address {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5); 
    backdrop-filter: blur(8px); 
    display: none;
    justify-content: center;
    align-items: center;
    z-index: 1000;
}

.change-all {
    background-color: #fff;
    width: 600px; 
    padding: 40px; 
    border-radius: 15px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3); 
    text-align: center;
    position: relative;
}

.change-all h2 {
    font-size: 32px; 
    color: #333;
    margin-bottom: 30px;
    font-weight: bold;
}

.change-all p {
    font-size: 16px; 
    color: #666;
    margin-bottom: 20px;
}

.box-input-address {
    display: flex;
    align-items: center;
    background-color: #f0f0f0;
    padding: 15px; 
    border-radius: 10px;
    margin-bottom: 20px; 
    transition: 0.3s;
}

.box-input-address img {
    width: 24px; 
    margin-right: 10px;
    opacity: 0.6;
}

.box-input-address:hover {
    background-color: #e8e8e8;
}

.box-input-address input {
    width: 100%;
    border: none;
    background: none;
    outline: none;
    font-size: 16px; 
    color: #333;
}
#outaddress {
    position: absolute; 
    top: 15px; 
    right: 15px; 
    font-size: 24px; 
    color: #666; 
    cursor: pointer; 
    transition: color 0.3s ease; 
    z-index: 1100; 
}

#outaddress:hover {
    color: #000; 
}
</style>
<div id="container">
    
    <!-- Nội dung chính -->
    <div class="address-main">
        <div class="full">
            <div class="change">
                <p>Thay đổi thông tin</p>
            </div>
            <div class="customer-address">
                <h2>Thông Tin Địa Chỉ</h2>
                <div class="address-card">
                    <p><strong>Họ và tên:</strong> Nguyễn Văn A</p>
                    <p><strong>Số điện thoại:</strong> 0123 456 789</p>
                    <p><strong>Địa chỉ:</strong> 123 Đường ABC, Phường DEF, Quận GHI, TP. Hồ Chí Minh</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="address">
        <div class="change-address">
            <div class="change-all">
                <h2>Thay đổi thông tin</h2>
                <p>Vui lòng nhập email để khôi phục mật khẩu</p>
                <form action="" method="POST" onsubmit="validateEmail(event)">
                    <div class="box-input-address">
                        <!-- <img src="img/email-4ddcb32a.svg" alt=""> -->
                        <input name="name" id="change-name" type="text" placeholder="Nhập tên..">

                    </div>
                    <p class="repair" id="repairname-address"></p>
                    <div class="box-input-address">
                        <!-- <img src="img/email-4ddcb32a.svg" alt=""> -->
                        <input name="sdt" id="change-sdt" type="text" placeholder="Nhập SĐT..">
                    </div>
                    <p class="repair" id="repaisdt-address"></p>
                    <div class="box-input-address">
                        <!-- <img src="img/email-4ddcb32a.svg" alt=""> -->
                        <input name="address" id="change-user-address" type="text" placeholder="Nhập địa chỉ..">
                    </div>
                    <p class="repair" id="repairaddress-address"></p>
                    <button class="reset-button" type="submit">Thay đổi</button>
                </form>
                <i id="outaddress" class='bx bx-x'></i>
            </div>
        </div>
    </div>