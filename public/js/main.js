document.addEventListener('DOMContentLoaded', function () {
    var iframe = document.getElementById('resultFrame');

    if(iframe){
        console.log('dadadadaa')
        iframe.contentWindow.postMessage('{"event":"command","func":"' + 'playVideo' + '","args":""}', '*');
        let iframe_widgets = document.querySelectorAll('.ytp-chrome-top');
        iframe_widgets.forEach(item => {
            item.classList.add('hide');
        })
    }else{
        console.log("Вероятно у вас включен блокировщик рекламы!")
    }

    let footer_btn = document.getElementById('footer-btn-menu');
    let header_menu = document.querySelector('.header__menu');

    footer_btn.addEventListener('click', () => {
        if(!document.getElementById('header-btn-menu').classList.contains('_active')) {
            document.getElementById('header-btn-menu').classList.add('_active')
            header_menu.classList.add('_active')
            document.querySelector('body').classList.add('lock')
        }
    })

    $('#open_popup').click(function() {
        $('#popup').addClass('active')

        $('#door').click(function () {
            $('.check-1').addClass('show')
            $('#door').addClass('hide')

            if($('#sdek').hasClass('hide')) {
                $('#sdek').removeClass('hide')
                $('.check-2').removeClass('show')
            }
        })

        $('#sdek').click(function () {
            $('.check-2').addClass('show')
            $('#sdek').addClass('hide')

            if($('.check-1').hasClass('show')) {
                $('.check-1').removeClass('show')
                $('#door').removeClass('hide')
            }
        })
    })

    $('#icon-chat').click(function () {
        $('#icons-chat').addClass('show')
        $('#wrapper-chat').addClass('active-icons')

        if($('#wrapper-chat').hasClass('active-icons')){
            $('#icon-chat').click(function () {
                $('#chat-content').addClass('show')
                $('#wrapper-chat').addClass('hide')
            })
        }
    })

    $('#close-chat').click(function () {
        $('#chat-content').removeClass('show')
    })

    $('#close-icons-chat').click(function () {
        $('#icons-chat').removeClass('show')
        $('#wrapper-chat').removeClass('active-icons')
    })

})
