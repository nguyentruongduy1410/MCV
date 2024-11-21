
//banner

var list = document.querySelector('#banner .list-img');
var img_banner = document.querySelectorAll('#banner .list-img .img-banner');
var dots = document.querySelectorAll('#banner .dots li');
var active = 0;
var lengthItems = img_banner.length - 1;
var interval;
function reLoad(){
    let checkLeft = img_banner[active].offsetLeft;
    list.style.left = -checkLeft + 'px';
    let lastActiveDot = document.querySelector('#banner .dots li.active');
    lastActiveDot.classList.remove('active');
    dots[active].classList.add('active');
}
function startSlideShow() {
    interval = setInterval(() => {
        active++;
        if (active > lengthItems) {
            active = 0;
        }
        reLoad();
    }, 3000);
}
reLoad();
startSlideShow();
dots.forEach((li, key) => {
    li.addEventListener('click', function(){
        active = key;
        reLoad();
        clearInterval(interval);
        startSlideShow();
    })
})
// tools menu-------------------------------------------

let tools = document.getElementById('tools');
let tools_menu = document.getElementById('tools-menu');

tools.addEventListener('mouseover', function(){
    tools_menu.style.display = 'block';
})
tools.addEventListener('mouseout', function(){
    setTimeout(function(){
        if(!tools_menu.matches(':hover')){
            tools_menu.style.display = 'none';
        }
    },200);
});
tools_menu.addEventListener('mouseleave', function(){
    tools_menu.style.display = 'none';
})
tools_menu.addEventListener('mouseout', function(){
    tools_menu.style.display = 'block';
})
//sale

var all_sale = document.querySelectorAll('#sale .pro-sale');
var list_sale = document.querySelector('#sale .all');
var dots_sale = document.querySelectorAll('#sale .dots-sale li');
var active_sale = 0;
var lengthItems = all_sale.length - 1;
function reLoadSale() {
    let checkLeftSale = all_sale[active_sale].offsetLeft;
    list_sale.style.left = -checkLeftSale + 'px';
    let lastActiveDot = document.querySelector('#sale .dots-sale li.active-sale');
    lastActiveDot.classList.remove('active-sale');
    dots_sale[active_sale].classList.add('active-sale');
}
dots_sale.forEach((li, key) => {
    li.addEventListener('click', function(){
        active_sale = key;
        reLoadSale();
    })
})

// hiển thị menu respensive
var menu_icon = document.getElementById('mm')
var menu_hide = document.querySelector('#menu-hide');
menu_icon.onclick = function(){
    
   if(menu_hide.style.display === 'none'){
        menu_hide.style.display = 'block';
   }else{
    menu_hide.style.display = 'none';
   }
}


