<script>
    var checkAll = document.getElementById('all');
    var checkList = document.querySelectorAll('.checkList');

    function check() {
    if (checkAll.checked == true) {
        for (let i = 0; i < checkList.length; i++) {
            checkList[i].checked = true
        }
    } else {
        for (let i = 0; i < checkList.length; i++) {
            checkList[i].checked = false
        }
    }
}

$('.action-button').on('click', function() {

    if($('.modal-action').hasClass('show')) {
        $('.modal-action').not($(this).siblings()).removeClass('show')
        $(this).siblings().toggleClass('show')
    } else {
        $(this).siblings().toggleClass('show')   
    }
    //$(this).siblings().toggleClass('show')   
    
})

var spare = document.getElementById('sparepart-button');
var spares = document.querySelector('.sparepart-ul');

spare.addEventListener('click', () => {
    spares.classList.toggle('show');
})
</script>
