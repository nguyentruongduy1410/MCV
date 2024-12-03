var login = document.querySelector('.log-in');
    var loginModal = document.querySelector('#loginModal');
    var outLogin = document.querySelector('#loginModal .modal-content i');

    login.onclick = function() {
        loginModal.style.display = 'flex';
    }

    outLogin.onclick = function() {
        loginModal.style.display = 'none';
    }

    //check login
    function loginpage(event) {
        event.preventDefault();
        var email = document.getElementById('login-email').value;
        var pass = document.getElementById('login-pass').value;
        if (!email) {
            document.getElementById('repairemail').innerText = 'Vui lòng nhập email';
            return false;
        }
        if (!email.includes('@')) { 
            document.getElementById('repairemail').innerText = 'Email phải chứa ký tự "@"';
            return false;
        }
        else {
            document.getElementById('repairemail').innerText = '';
        }

        if (!pass) {
            document.getElementById('repairpassword').innerText = 'Vui lòng nhập mật khẩu';
            return false;
        } else {
            document.getElementById('repairpassword').innerText = '';
        }
    }
    //check resetpass
    function validateEmail(event) {
        event.preventDefault();
        var email = document.getElementById('reset-email').value;
        if (!email) {
            document.getElementById('repairemail-resetpass').innerText = 'Email không chính xác';
            return false;
        } 
        if (!email.includes('@')) { 
            document.getElementById('repairemail-resetpass').innerText = 'Email phải chứa ký tự "@"';
            return false;
        }
        else {
            document.getElementById('repairemail-resetpass').innerText = '';
        }
    }

    //check signup
    function signuppage(event) {
        event.preventDefault(); // Ngăn form submit mặc định
    
        var email = document.getElementById('signup-email').value;
        var pass = document.getElementById('signup-pass1').value;
        var pass2 = document.getElementById('signup-pass2').value;
    
        var valid = true;
    
        if (!email) {
            document.getElementById('repairemail-signup').innerText = 'Vui lòng nhập email';
            valid = false;
        } else if (!email.includes('@')) {
            document.getElementById('repairemail-signup').innerText = 'Email phải chứa ký tự "@"';
            valid = false;
        } else {
            document.getElementById('repairemail-signup').innerText = '';
        }
    
        if (!pass) {
            document.getElementById('repairpassword-signup1').innerText = 'Vui lòng nhập mật khẩu';
            valid = false;
        } else {
            document.getElementById('repairpassword-signup1').innerText = '';
        }
    
        if (!pass2) {
            document.getElementById('repairpassword-signup2').innerText = 'Vui lòng xác nhận mật khẩu';
            valid = false;
        } else if (pass !== pass2) {
            document.getElementById('repairpassword-signup2').innerText = 'Xác nhận mật khẩu không đúng';
            valid = false;
        } else {
            document.getElementById('repairpassword-signup2').innerText = '';
        }
    
        if (valid) {
            // Gửi form nếu không có lỗi
            document.getElementById('signup-form').submit();
        }
    }
    

// show pass
function togglePasswordVisibility(inputId, imgId, showSrc, hideSrc) {
    const input = document.getElementById(inputId);
    const img = document.getElementById(imgId);

    if (!input || !img) {
        console.error(`Không tìm thấy phần tử với inputId=${inputId} hoặc imgId=${imgId}`);
        return;
    }

    img.addEventListener('click', function () {
        if (input.type === 'password') {
            input.type = 'text'; 
            img.src = hideSrc; 
        } else {
            input.type = 'password'; 
            img.src = showSrc; 
        }
    });
}

togglePasswordVisibility('login-pass', 'show-login-pass', './Public/img/eye.png', './Public/img/hidden.png');
togglePasswordVisibility('signup-pass1', 'show-signup-pass', './Public/img/eye.png', './Public/img/hidden.png');
togglePasswordVisibility('signup-pass2', 'show-signup2-pass', './Public/img/eye.png', './Public/img/hidden.png');

//link signup
var loginSection = document.querySelector('.modal-content-right');
var signupSection = document.querySelector('.modal-content-right-signup');
var resetpass = document.querySelector('.modal-content-right-ressetpass');
var signupLink = document.getElementById('signup');  
var loginLink = document.getElementById('signup2');
var resetLink = document.getElementById('resetpass');      

// Khi nhấn vào 'Quên mật khẩu', chuyển qua phần reset mật khẩu
resetLink.onclick = function() {
    loginSection.style.display = 'none';
    resetpass.style.display = 'block';
}

// Khi nhấn vào 'Đăng ký', chuyển qua phần đăng ký
signupLink.onclick = function() {
    loginSection.style.display = 'none';
    signupSection.style.display = 'block';
}

// Khi nhấn vào 'Đăng nhập', quay lại phần đăng nhập
loginLink.onclick = function() {
    signupSection.style.display = 'none';
    loginSection.style.display = 'block';
}

// Khi nhấn vào 'Quay lại', quay lại phần đăng nhập
function resetuser() {
    loginSection.style.display = 'none';
    resetpass.style.display = 'block';
}
