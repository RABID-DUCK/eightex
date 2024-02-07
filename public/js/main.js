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
})

