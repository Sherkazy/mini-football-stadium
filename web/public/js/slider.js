$(window).load(function() {

    $("#back-top").hide();

    // fade in #back-top
    $(function () {
        $(window).scroll(function () {
            if ($(this).scrollTop() > 100) {
                $('#back-top').fadeIn();
            } else {
                $('#back-top').fadeOut();
            }
        });

        // scroll body to 0px on click
        $('#back-top a').click(function () {
            $('body,html').animate({
                scrollTop: 0
            }, 800);
            return false;
        });
    });

    //slider
    $('.slider').nivoSlider();

    //Rating.
    $('.star').raty({
        score: function(){
            return $(this).attr('data-score');
        },
        click: function(score) {
            stadiumId=$(this).data('id');
            updateRating(score,stadiumId);
        },
        half: true,
        path: 'http://localhost/astroturf/web/public/js/img/',
        halfShow: true
    });

    function updateRating(s,stadiumId){
        var url = Routing.generate('fairplay_ajax_rating',{score: s, id: stadiumId});
        $.ajax({
            type: "POST",
            url: url,
            success:function(data){
                updateRatingSuccess(data);
            }

        });
    }

    function updateRatingSuccess(data){
        data.score = data.score.toFixed(2)
       var rating = $('.rating'+data.id);
        rating.data('score',data.score);
        rating.find('.stadium_amount').html(data.amount);
        rating.find('.stadium_score').html(data.score);
    }
});