$(window).load(function() {

    //slider
    $('.slider').nivoSlider({
        effect: 'random', // Specify sets like: 'fold,fade,sliceDown'
        slices: 15, // For slice animations
        boxCols: 8, // For box animations
        boxRows: 4, // For box animations
        animSpeed: 500, // Slide transition speed
        pauseTime: 3000, // How long each slide will show
        startSlide: 0, // Set starting Slide (0 index)
        directionNav: false, // Next & Prev navigation
        controlNav: false, // 1,2,3... navigation
        controlNavThumbs: false, // Use thumbnails for Control Nav
        pauseOnHover: true, // Stop animation while hovering
        manualAdvance: false, // Force manual transitions
        prevText: 'Prev', // Prev directionNav text
        nextText: 'Next', // Next directionNav text
        randomStart: false, // Start on a random slide
        beforeChange: function(){}, // Triggers before a slide transition
        afterChange: function(){}, // Triggers after a slide transition
        slideshowEnd: function(){}, // Triggers after all slides have been shown
        lastSlide: function(){}, // Triggers when last slide is shown
        afterLoad: function(){} // Triggers when slider has loaded
    });

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



    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();

    var calendar = $('.calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'agendaWeek,agendaDay'
        },
        selectable: true,
        selectHelper: true,
        select: function(start, end, allDay) {
            var title = prompt('Название команды:');
            if (title) {
                calendar.fullCalendar('renderEvent',
                    {
                        title: title,
                        start: start,
                        end: end
                    },
                    true // make the event "stick"
                );
            }
            calendar.fullCalendar('unselect');
        },
        editable: true,
        height: 600,
        minTime: '09:00am',
        maxTime: '11:00pm',
        dayNames:['Воскресенье','Понедельник','Вторник','Среда','Четверг','Пятница','Суббота'],
        monthNames: ['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
        buttonText:{
            today:'Сегодня',
            week: 'Неделя',
            day: 'День'
        },
        defaultView: 'agendaWeek',
        events: [
            {
                title: 'All Day Event',
                start: new Date(y, m, 1)
            },
        ]
    });
});
