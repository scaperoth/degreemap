url = "localhost/degreemap/index.php/"

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$delete_icon = $('.ch-item .settings-icon')
$return_icon = $('.ch-item .return-icon')

$delete_icon.on('click', function () {
    $('.ch-item').removeClass('flip')
    $parent = $(this).parent().parent().parent().parent()
    $parent.addClass('flip');
    console.log('flip');
})

$return_icon.on('click', function () {
    console.log('unflip');
    $parent = $(this).parent().parent().parent().parent()
    $parent.removeClass('flip')
})

/*******************************************************
 * AJAX REQUESTS
 *******************************************************/
$(function(){
    $('#delete_course_form').submit(function(evnt){
        evnt.preventDefault(); //Avoid that the event 'submit' continues with its normal execution, so that, we avoid to reload the whole page
        $.post(url+"forms/delete", //The variable 'url' must store the base_url() of our application
        $("form#my_form").serialize(), //Serialize all the content of our form to URL format
        function (data) {
            console.log(data); //Add the AJAX response to some div that is going to show the message
        });
    });
});