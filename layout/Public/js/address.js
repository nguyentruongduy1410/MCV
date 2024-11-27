    var address = document.querySelector('.change');
    var addressModal = document.querySelector('#address');
    var outAddress = document.querySelector('#outaddress');

    address.onclick = function() {
        addressModal.style.display = 'flex';
    }

    outAddress.onclick = function() {
        addressModal.style.display = 'none';
    }