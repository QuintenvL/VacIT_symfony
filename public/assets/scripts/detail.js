$('.soliciteer_link').click(function(event){
    event.preventDefault();
    $('#loading').show();
    var userId = parseInt($('#userId').attr('value'));
    var vacatureId = parseInt($('#vacatureId').attr('value'));
    $.post("/vacIT/public/api/vacature/soliciteer", {userId: userId, vacatureId: vacatureId}, function(data,status) {
        $('#loading').hide();
        if (status == "success"){
            $('.soliciteer_div').html("<div class='soliciteer_div'><span class='soliciteer_link'> Gesoliciteerd</span></div>")
        }
    });
});
