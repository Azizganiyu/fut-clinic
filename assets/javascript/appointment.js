function GetDates(startDate, daysToAdd) {
    var range = [];
    var aryDates = [];

    for (var i = 1; i <= daysToAdd; i++) {
        var currentDate = new Date();
        currentDate.setDate(startDate.getDate() + i);
        //range.push(DayAsString(currentDate.getDay()) + ", " + currentDate.getDate() + " " + MonthAsString(currentDate.getMonth()) + " " + currentDate.getFullYear());
        aryDates.push(DayAsString(currentDate.getDay()) + ", " + currentDate.getDate() + " " + MonthAsString(currentDate.getMonth()));
    }

    return aryDates;
}

function MonthAsString(monthIndex) {
    var d = new Date();
    var month = new Array();
    month[0] = "January";
    month[1] = "February";
    month[2] = "March";
    month[3] = "April";
    month[4] = "May";
    month[5] = "June";
    month[6] = "July";
    month[7] = "August";
    month[8] = "September";
    month[9] = "October";
    month[10] = "November";
    month[11] = "December";

    return month[monthIndex];
}

function DayAsString(dayIndex) {
    var weekdays = new Array(7);
    weekdays[0] = "Sun";
    weekdays[1] = "Mon";
    weekdays[2] = "Tue";
    weekdays[3] = "Wed";
    weekdays[4] = "Thu";
    weekdays[5] = "Fri";
    weekdays[6] = "Sat";

    return weekdays[dayIndex];
}

function GetHours(startDate, daysToAdd) {
    for (var i = 1; i <= daysToAdd; i++) {
        var currentDate = new Date();
        currentDate.setDate(startDate.getDate() + i);
        hours = '';
        durations= '';
        for(var count = 0; count < 24; count++){
            //hours += '< class="slot">'+DayAsString(currentDate.getDay()) + ", " + currentDate.getDate() + " " + MonthAsString(currentDate.getMonth())+' '+count+' - '+(count+1)+'</div>';
            if(count > 8 && count < 18){
                if(count == 13){
                    hours += '<button class="slot break" date="'+DayAsString(currentDate.getDay()) + ", " + currentDate.getDate() + " " + MonthAsString(currentDate.getMonth())+'" time="'+count+'" id="'+DayAsString(currentDate.getDay()) + "-" + currentDate.getDate() + "-" + MonthAsString(currentDate.getMonth())+'-'+count+'"></button>';
                    durations += '<div>'+count+':00</div>';
                }
                else{
                    hours += '<button class="slot free" date="'+DayAsString(currentDate.getDay()) + ", " + currentDate.getDate() + " " + MonthAsString(currentDate.getMonth())+'" time="'+count+'" id="'+DayAsString(currentDate.getDay()) + "-" + currentDate.getDate() + "-" + MonthAsString(currentDate.getMonth())+'-'+count+'"></button>';
                    durations += '<div>'+count+':00</div>';
                }
            
            }
        }
        $('.durations').html(durations);
        $('.appointment-cal .hours').append('<div>'+hours+'</div>');

    }
}

//maintain selected doctor

var startDate = new Date();
var aryDates = GetDates(startDate, 7);
console.log(aryDates);

year = new Date().getFullYear();
$('.appointment-cal .range').html(aryDates[0]+' '+year+' - '+aryDates[aryDates.length-1]+' '+year);
days = '';
for(var i = 0; i < aryDates.length; i++){
    days += '<div class="head-days">'+aryDates[i]+'</div>';
}

$('.appointment-cal .days').html(days);

GetHours(startDate, 7);

doctor = $('.appointment-cal #doctor').val();
localStorage.setItem('doctor', doctor);
function updateBooking () {
     $.get("/futclinic/index.php/appointments/getappointments", function(data) {
        result = JSON.parse(data);
        doctor = localStorage.getItem('doctor');
        for(i=0; i < result.length; i++){
            $('.slot').each(function(){
                slot_id = $(this).attr('id');
            if(doctor == result[i].doctor && slot_id == result[i].slot_id){
                $(this).removeClass('free').addClass('booked');
                //console.log(result[i].slot_id + ' is booked');
            }
            })
        }
    })
}
updateBooking();

$('.appointment-cal #doctor').on('change', function(){
    doctor = $(this).val();
    localStorage.setItem('doctor', doctor);
    $('.slot').removeClass('booked').addClass('free');
    updateBooking();
})


//populate booking form
$(document).on('dblclick', '.slot', function(){
    if($(this).hasClass('free')){
        $('#appointmentModal').modal('show');
        slot_id = $(this).attr('id');
        doctor = $('.appointment-cal #doctor').val();
        time = $(this).attr('time');
        date = $(this).attr('date');
        $('#appointmentModal .slot_id').val(slot_id);
        $('#appointmentModal .doctor').val(doctor);
        $('#appointmentModal .time').val(time);
        $('#appointmentModal .date').val(date);
        $('#appointmentModal .info-doctor').text(doctor);
        $('#appointmentModal .info-time').text(time+':00');
        $('#appointmentModal .info-date').text(date);
    }
})


$('.delAppointment').on('click', function(){
    var id = $(this).attr('id');
    if(confirm('Are you sure you want to remove this booking?'))
    {
        $.post("/futclinic/index.php/appointments/destroy",
        {
            id: id,
            
        });
        $(this).parents('.appointment-row').fadeOut(700);
        setTimeout(() => {
            window.location.assign(window.location.href);
        }, 800);
    }
    
});

$('.cancAppointment').on('click', function(){
    var id = $(this).attr('id');
    //alert(id);
    if(confirm('Are you sure you want to cancel this booking?'))
    {
        $.post("/futclinic/index.php/appointments/cancel",
        {
            id: id,
            
        });

        setTimeout(() => {
            window.location.assign(window.location.href);
        }, 800);
    }
    
});