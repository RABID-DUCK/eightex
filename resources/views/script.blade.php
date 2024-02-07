<script type="text/javascript">

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function sendAjax(data){
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


    $(".btn-submit_form1").click(function(e){
        e.preventDefault();
        if(!$('#popup').hasClass('active')) $('#popup').addClass('active');

    });

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
        var name = form.find("input[name=name]").val();
        var phone =form.find("input[name=phone]").val();
        var product_name = form.find("input[name=product_name]").val();
        var product_weight = form.find("input[name=product_weight]").val();
        var product_volume = form.find("input[name=product_volume]").val();
        var data = {
            name:name,
            phone:phone,
            data:{
                product_name:product_name,
                product_weight:product_weight,
                product_volume:product_volume,
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
