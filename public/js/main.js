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

    let footer_btn = document.getElementById('btn-menu-footer');
    let header_menu = document.querySelector('.header__menu');

    footer_btn.addEventListener('click', () => {
        if(!document.getElementById('header-btn-menu').classList.contains('_active')) {
            document.getElementById('header-btn-menu').classList.add('_active')
            header_menu.classList.add('_active')
            document.querySelector('body').classList.add('lock')
        }
    })
})
