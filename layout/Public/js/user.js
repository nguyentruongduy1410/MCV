var user = document.getElementById('quenMK')
var userModal = document.querySelector('#user-info');
var outuser = document.querySelector('#close-user-info');

user.onclick = function() {
    userModal.style.display = 'flex';
}

outuser.onclick = function() {
    userModal.style.display = 'none';
}