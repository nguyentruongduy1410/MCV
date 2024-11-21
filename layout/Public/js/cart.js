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


const downButton = document.querySelector('.down');
const upButton = document.querySelector('.up');
const quantityInput = document.querySelector('.inputs');
downButton.addEventListener('click', function () {
    let currentValue = parseInt(quantityInput.value);
    if (currentValue > 1) {
        quantityInput.value = currentValue - 1;
    }
});
upButton.addEventListener('click', function () {
    let currentValue = parseInt(quantityInput.value);
    if (currentValue < 999) {
        quantityInput.value = currentValue + 1;
    }
});
quantityInput.addEventListener('input', function () {
    let value = parseInt(quantityInput.value);
    if (isNaN(value) || value < 1) {
        quantityInput.value = 1;
    } else if (value > 999) {
        quantityInput.value = 999;
    }
});