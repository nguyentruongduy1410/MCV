
let thispage = 1;
const limit = 8;
const list_all = document.querySelectorAll('.box .box-sp');
function loadItem(){
    let biginGet = limit * (thispage - 1);
    let endGet = limit * thispage - 1;
    list_all.forEach((item, key) => {
        if(key >= biginGet && key <= endGet){
            item.style.display = 'block';
        }else{
            item.style.display = 'none';

        }
    })
    listPage();
}
loadItem();
function listPage(){
    let count = Math.ceil(list_all.length / limit);
    document.querySelector('.pagination').innerHTML = '';
    if(thispage != 1){
        let prev = document.createElement('li');
        prev.innerText = 'PREV'
        prev.setAttribute('onclick', "changePage(" + (thispage - 1) + ")");
        document.querySelector('.pagination').appendChild(prev);

    }
    for (let i = 1; i <= count; i++) {
        let newPage = document.createElement('li');
        newPage.innerText = i;
        if (i == thispage) {
            newPage.classList.add('pagination_item_active');

        }
        newPage.setAttribute('onclick', "changePage(" + i + ")");
        document.querySelector('.pagination').appendChild(newPage);
    }
    if(thispage != count){
        let next = document.createElement('li');
        next.innerText = 'NEXT'
        next.setAttribute('onclick', "changePage(" + (thispage + 1) + ")");
        document.querySelector('.pagination').appendChild(next);
    }
}
function changePage(i){
    thispage = i;
    loadItem();
}


var menu_icon = document.getElementById('mm')
var menu_hide = document.querySelector('#menu-hide');
menu_icon.onclick = function(){
    
   if(menu_hide.style.display === 'none'){
        menu_hide.style.display = 'block';
   }else{
    menu_hide.style.display = 'none';
   }
}

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
















