
// chuyển ảnh chi tiết
var miniImg = document.querySelectorAll('.wrapper .mini-box img');
var mainImg = document.querySelector('#row .row-left img');
for (let index = 0; index < miniImg.length; index++) {
    miniImg[index].addEventListener('click', function(){
        mainImg.src = miniImg[index].src;
        
    })
}



// chuyển qua bình luận
var mota = document.querySelector('#mota');
var vote = document.querySelector('#vote');
var hidemota = document.querySelector('.all-describe .contents-describe');
var hidevote = document.querySelector('.cmt-user');
mota.onclick = function(){
    hidemota.style.display = 'block';
    hidevote.style.display = 'none';
}
vote.onclick = function(){
    hidemota.style.display = 'none';
    hidevote.style.display = 'block';
}

// màu sắc size
var size = document.querySelectorAll('.row-right .size .img-size');
size.forEach(li => {
    li.addEventListener('click', function(){    
        let active_size = document.querySelector('.size .active-size');
        
        if (active_size) {
            active_size.classList.remove('active-size');
        }
        li.classList.add('active-size');
        
    })
})
// tăng giảm số lượng
const downButton = document.querySelector('.button-quantity .down');
const upButton = document.querySelector('.button-quantity .up');
const quantityInput = document.querySelector('.button-quantity input');

// Ngăn không cho hành động mặc định (gửi form) khi nhấn vào nút tăng hoặc giảm
downButton.addEventListener('click', function (event) {
    event.preventDefault(); // Ngừng gửi form
    let currentValue = parseInt(quantityInput.value);
    if (currentValue > 1) {
        quantityInput.value = currentValue - 1;
    }
});

upButton.addEventListener('click', function (event) {
    event.preventDefault(); // Ngừng gửi form
    let currentValue = parseInt(quantityInput.value);
    if (currentValue < 999) {
        quantityInput.value = currentValue + 1;
    }
});

quantityInput.addEventListener('input', function (event) {
    event.preventDefault(); // Ngừng gửi form
    let value = parseInt(quantityInput.value);
    if (isNaN(value) || value < 1) {
        quantityInput.value = 1;
    } else if (value > 999) {
        quantityInput.value = 999;
    }
});





var menu_icon = document.getElementById('mm')
var menu_hide = document.querySelector('#menu-hide');
menu_icon.onclick = function(){
    
   if(menu_hide.style.display === 'none'){
        menu_hide.style.display = 'block';
   }else{
    menu_hide.style.display = 'none';
   }
}

