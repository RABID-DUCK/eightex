<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

        $(".btn-submit_form1").click(function(e){
            e.preventDefault();
            if(!$('#popup').hasClass('active')) $('#popup').addClass('active');

        });

    })

    function sendAjax(data){
        event.preventDefault()
        let target = $(event.target);
        target.prop("disabled", true);
        target.addClass('no-active')
        target.before(`<div class="spinner" id="spinner">
                        <div class="spinner-border" role="status">
                            <span class="visually-hidden"></span>
                        </div>
                    </div>`)
        $.ajax({
            type:'POST',
            url:"{{ route('application.store') }}",
            data:data,
            success:function(data){
                let currentPopup = document.getElementById('popup-thanks');
                const popupActive = document.querySelector('.popup.active');
                if(currentPopup){
                    currentPopup.classList.add('active');
                }
                if(popupActive){
                    popupActive.classList.remove('active');
                }

                target.removeClass('no-active');
                target.removeAttr('disabled');
                $('#spinner').remove()
                $('input').val('');
            },
            error: function (request, status, error) {
                // alert('Произошла ошибка на сервере. Повторите попытку позже!');
                target.removeClass('no-active');
                target.removeAttr('disabled');
                $('#spinner').remove()
                $('input').val('');
            }
        });
    }

    $(".btn-submit_form2").click(function(e){
        e.preventDefault();
        var form = $("#form_2");
        var name = form.find("input[name=name]").val();
        var phone = form.find("input[name=phone]").val();
        var data = {name:name, phone:phone};
         let regex = /^(\+7|7|8)?[\s\-]?\(?[489][0-9]{2}\)?[\s\-]?[0-9]{3}[\s\-]?[0-9]{2}[\s\-]?[0-9]{2}$/;
        if(typeof(phone) !== "undefined" && phone.length == 11 && regex.test(phone)){
             sendAjax(data);
        }else{
            alert('Введите номер из 11 символов начиная с 8 или 7');
        }

    });
    $(".btn-submit_form3").click(function(e){
        e.preventDefault();
        var form = $("#form_3");
        var track_number = form.find("input[name=track_number]").val();
        var type_delivery =form.find("input[name=type_delivery]").val();
        var address = form.find("input[name=address]").val();
        var fio = form.find("input[name=fio]").val();
        var phone = form.find("input[name=phone]").val();
        var description = form.find("input[name=description]").val();
        var data = {
            data:{
                track_number: track_number,
                type_delivery: type_delivery,
                address: address,
                fio: fio,
                phone: phone,
                description: description
            }
        }
        let regex = /^(\+7|7|8)?[\s\-]?\(?[489][0-9]{2}\)?[\s\-]?[0-9]{3}[\s\-]?[0-9]{2}[\s\-]?[0-9]{2}$/;
        if(typeof(phone) !== "undefined" && phone.length == 11 && regex.test(phone)){
            sendAjax(data);
        }else{
            alert('Введите номер из 11 символов начиная с 8 или 7');
        }

    });

    let page = 9;
    let range = 2002;
    let isFetching = false;

    // setInterval(() => {
    //     if (!isFetching) {
    //         fetchLeads();
    //     }
    // }, 10000);

    function fetchLeads() {
        isFetching = true;
        fetch('/api/getLeads/' + page + "/" + range)
            .then(response => {

                if (response.ok) {
                    page++;
                    range += 250;
                    return response.json();
                }else{
                    page = 10;
                    range = 2252;
                }
                throw new Error('Network response was not ok.');
            })
            .then(data => {
                // Обработка полученных данных
            })
            .catch(error => {

            })
            .finally(() => {
                isFetching = false;
            });
    }
</script>
<script defer src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
