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

function sendMessageChat(){
    $(document).keypress(function(e) {
        if(e.which === 13) {
            let text = $('#text-chat').val();
            console.log(text);

            if(!text) return;

            $.ajax({
                url: '/api/sendMessageChat',
                type: 'POST',
                data: {message: text},
                success: function(data){
                    console.log(data);
                }
            })

        }
    });
}

function checkElementHeight() {
    let elements = document.querySelectorAll('.review-button');
    elements.forEach(item => {
        item.addEventListener('click', function() {
            if (item.classList.contains('hide-review')) {
                hideReview(item);
            } else {
                showFullText(item);
            }
        });
    });
}

function truncateText() {
    var maxLength = 150; // Максимальное количество символов
    var elements = document.querySelectorAll('.review-text');

    elements.forEach(function(item) {
        var text = item.textContent;

        if (text.length > maxLength) {
            item.textContent = text.slice(0, maxLength) + '...';
            item.setAttribute('data-full-text', text);
            item.parentNode.querySelector('.review-button').style.display = 'inline-block';
        } else {
            item.parentNode.querySelector('.review-button').style.display = 'none';
        }
    });
}

function showFullText(button) {
    var textElement = button.parentNode.querySelector('.review-text');
    textElement.textContent = textElement.getAttribute('data-full-text');
    button.textContent = 'Скрыть отзыв';
    button.classList.add('hide-review');
    button.parentNode.classList.remove('closing');
    button.parentNode.classList.add('open-review');
}

function hideReview(button) {
    var textElement = button.parentNode.querySelector('.review-text');
    textElement.textContent = textElement.getAttribute('data-full-text').slice(0, 150) + '...';
    button.textContent = 'Смотреть полный отзыв';
    button.classList.remove('hide-review');
    button.parentNode.classList.add('closing')
    button.parentNode.classList.remove('open-review');
}

truncateText();
checkElementHeight();

