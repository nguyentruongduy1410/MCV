function validateForm() {
    let email = document.getElementById("email").value;
    let password = document.getElementById("password").value;
    let emailError = document.getElementById("emailError");
    let passwordError = document.getElementById("passwordError");
    let isValid = true;

    // Xóa lỗi cũ
    emailError.style.display = "none";
    passwordError.style.display = "none";

    // Kiểm tra email
    const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    if (!emailRegex.test(email)) {
        emailError.textContent = "Email không hợp lệ!";
        emailError.style.display = "block";
        isValid = false;
    }

    // Kiểm tra mật khẩu
    if (password.length < 6) {
        passwordError.textContent = "Mật khẩu phải có ít nhất 6 ký tự!";
        passwordError.style.display = "block";
        isValid = false;
    }

    return isValid;
}