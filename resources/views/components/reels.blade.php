<div class="siema d-flex siema-container">
    <div class="item-siema">
        <iframe width="212" height="382" src="https://www.youtube.com/embed/k2b5NwKo-Gs?si=Lj3qS6CEpscQmTmI" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>

    <div class="item-siema">
        <iframe width="212" height="382" src="https://www.youtube.com/embed/GSH1bhlGpQ4?si=ZKCSxlIL_2ZPwUj2" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>

    <div class="item-siema">
        <iframe width="212" height="382" src="https://www.youtube.com/embed/qRhuOS9th2c?si=gtNKWdyMHswQgkTk" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>

    <div class="item-siema">
        <iframe width="212" height="382" src="https://www.youtube.com/embed/nUhA2vhW4iw?si=qtiXCGb5moxuLBVK" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>

    <div class="item-siema">
        <iframe width="212" height="382" src="https://www.youtube.com/embed/ODZh8caZxKI?si=_ZoOjJDE2XYiaUPX" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>

    <div class="item-siema">
        <iframe width="212" height="382" src="https://www.youtube.com/embed/OtmeX2_R2zY?si=ZUH2xxjCE7oUkoeB" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>

    <div class="item-siema">
        <iframe width="212" height="382" src="https://www.youtube.com/embed/3kvQvq8tFRM?si=voxrt0zbBt7axd3B" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>

    <div class="item-siema">
        <iframe width="212" height="382" src="https://www.youtube.com/embed/mOHHa4wIXnw?si=urPXarAEAoSX87rU" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>

    <div class="item-siema">
        <iframe width="212" height="382" src="https://www.youtube.com/embed/g3Sj4_QKzCY?si=LfjPzad1Nb5rWpEu" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>

    <div class="item-siema">
        <iframe width="212" height="382" src="https://www.youtube.com/embed/dUM9PYdl0Fw?si=0inTbmDqpPG765nL" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
</div>

<script src="{{ asset('js/siema.min.js') }}"></script>
<script>
    new Siema({
        selector: '.siema',
        perPage: 3,
        startIndex: 0,
        easing: 'ease-out',
        loop: false,
        rtl: false,
        draggable: true,
        multipleDrag: true,
    });
    var items = document.getElementById('siema-container');
    var nextItem = items.nextElementSibling;
    nextItem.classList.add('siema-control');
</script>
