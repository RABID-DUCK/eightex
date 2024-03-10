<div class="siema d-flex siema-container">
    <div class="item-siema">
        <iframe width="212" height="382" src="https://www.youtube.com/embed/COSJJpwUTsM?si=47wLksbslpiQNfID" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>

    <div class="item-siema">
        <iframe width="212" height="382" src="https://www.youtube.com/embed/rHUMZRgtG_A?si=apZKA0UwcSqDylcG" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
    <div class="item-siema">
        <iframe width="212" height="382" src="https://www.youtube.com/embed/6lV4YWE9IEM?si=HAmQZzHpFPk6SEd0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
    <div class="item-siema">
        <iframe width="212" height="382" src="https://www.youtube.com/embed/2_bK87sC3DU?si=ZT9nQnxe47DVbMdf" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
    <div class="item-siema">
        <iframe width="212" height="382" src="https://www.youtube.com/embed/OD27Y5nKbFw?si=C_W_LgF9DStOSTQj" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
    <div class="item-siema">
        <iframe width="212" height="382" src="https://www.youtube.com/embed/gN97NenWpGE?si=vxa5Ux2PoJUyvlcu" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
    <div class="item-siema">
        <iframe width="212" height="382" src="https://www.youtube.com/embed/whRqEANpeuk?si=WKDDrmvywR0hr6aQ" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
    <div class="item-siema">
        <iframe width="212" height="382" src="https://www.youtube.com/embed/VbLk7DN8GyA?si=_645sy2beEtkJUJh" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
    <div class="item-siema">
        <iframe width="212" height="382" src="https://www.youtube.com/embed/lBfALIg7dE0?si=iJW8MFdIXsdGuVi-" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
    <div class="item-siema">
        <iframe width="212" height="382" src="https://www.youtube.com/embed/7SV0tBZXCUs?si=oIGzPzYDCLYM-cks" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
</div>

<script src="{{ asset('js/siema.min.js') }}"></script>
<script>
    let siema;

    function siemaWork() {
        if (window.screen.width > 700) {
            siema = new Siema({
                selector: '.siema',
                perPage: 3,
                startIndex: 0,
                easing: 'ease-out',
                loop: true, // Зацикливаем слайдер
                rtl: false,
                draggable: true,
                multipleDrag: true,
                onInit: function() {
                    startAutoplay();
                }
            });
        } else {
            siema = new Siema({
                selector: '.siema',
                duration: 500,
                perPage: 1,
                startIndex: 1,
                easing: 'ease-out',
                loop: true, // Зацикливаем слайдер
                rtl: false,
                draggable: true,
                multipleDrag: true,
                onInit: function() {
                    startAutoplay();
                }
            });
        }

        let items = document.getElementById('siema-container');
        let nextItem = items.nextElementSibling;
        nextItem.classList.add('siema-control');
    }

    function startAutoplay() {
        setInterval(() => {
            siema.next();
        }, 6000); // 5000 миллисекунд = 5 секунд
    }

    siemaWork();

    window.addEventListener('resize', function(event) {
        siema.destroy();
        siemaWork();
    }, true);
</script>
