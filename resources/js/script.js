var spare = document.getElementById('sparepart-button');
var spares = document.querySelector('.sparepart-ul');

spare.addEventListener('click', () => {
    spares.classList.toggle('show');
})