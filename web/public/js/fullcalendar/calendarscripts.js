/**
 * Created with JetBrains PhpStorm.
 * User: BİLGİ İŞLEM
 * Date: 18.07.2013
 * Time: 10:56
 * To change this template use File | Settings | File Templates.
 */
$(window).load(function(){
    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();
    var id = $('.star').data('id');
    var url = Routing.generate('fairplay_calendar_event',{'id':parseInt(id)});
    var calendar = $('.calendar').fullCalendar({
        events: {
            url: url
        },
        select: function(start,end,allDay, jsEvent, view){
            var eventUrl = Routing.generate('fairplay_ajax_event_select',{'id': parseInt(id)});
            var form = $('<form action="' + eventUrl + '" method="post">' +
                '<input type="text" name="start" value="' + start + '" />' +
                '<input type="text" name="end" value="' + end + '" />' +
                '</form>');
            $('body').append(form);
            $(form).submit();
        },
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'agendaWeek,agendaDay'
        },
        selectable: true,
        selectHelper: true,
        editable: false,
        allDaySlot: false,
        height: 800,
        minTime: '9',
        maxTime: '24',
        slotMinutes: 60,
        timeFormat: {
            agenda: 'H:mm{ - h:mm}'
        },
        axisFormat: 'HH:mm',
        allDayText: 'Весь день',
        dayNamesShort: ['Пн','Вт','Ср','Чт','Пт','Сб','Вс'],
        dayNames:['Воскресенье','Понедельник','Вторник','Среда','Четверг','Пятница','Суббота'],
        monthNames: ['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
        monthNamesShort:['Янв','Фев','Мрт','Апр','Май','Июн','Июл','Авг','Сен','Окт','Нбр','Дек'],
        buttonText:{
            today:'Сегодня',
            week: 'Неделя',
            day: 'День'
        },
        titleFormat:{
            day: 'dddd, MMMM d, yyyy',
            week: "MMM d[ yyyy]{ '&#8212;'[ MMM] d yyyy}"
        },
        defaultView: 'agendaWeek'
    });
});