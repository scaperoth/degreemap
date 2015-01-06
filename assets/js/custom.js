
var ajaxresult = false;


url = "/degreemap/index.php/"

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
    //console.log('flip');
})

$return_icon.on('click', function () {
    //console.log('unflip');
    $parent = $(this).parent().parent().parent().parent()
    $parent.removeClass('flip')
})

/*******************************************************
 * AJAX REQUESTS
 *******************************************************/

/*=========
 * DELETE
 ==========*/
$('.delete-form').submit(function (e) {
    e.preventDefault(); //Avoid that the event 'submit' continues with its normal execution, so that, we avoid to reload the whole page

    $.ajax({
        type: "POST",
        url: url + "forms/delete",
        data: $(this).serialize(),
        dataType: "html",
        success: function (data) {
            data = JSON.parse(data);
            //console.log('Success: ' + data);
            //console.log("\n add Big: " + data.semester);
            add_plus(data.semester, data.position);
            //console.log("\nremove little: ")
            remove_little_plus(data.semester, data.position);
        },
        error: function (data) {
            console.log('Fail: ');
            console.log(data)
        },
    });
});

/*=========
 * EDIT
 ==========*/

$('.edit-box').focusout(function (e) {
    var pos = $(this).attr('data-position');
    var sem = $(this).attr('data-semester');
    var field = $(this).attr('data-field');
    var value = $.trim($(this).text());
    edit_ajax(pos, sem, field, value)
});

$('.course_section .status-nav').click(function (e) {
    var color = $(this).attr('data-color');
    var pos = $(this).attr('data-position');
    var sem = $(this).attr('data-semester');
    var field = "labelcolor";
    var newcolor = "";
    var obj = $(this);
//!update if color values change!
    switch (color) {
        case "success":
            newcolor = "warning";
            break;
        case "warning":
            newcolor = "alert";
            break;
        case "alert":
            newcolor = "success";
            break;
    }

    edit_ajax(pos, sem, field, newcolor).done(function (data) {
        console.log("res: " + color);
        data = JSON.parse(data);

        if (data.result === true) {
            console.log('here');
            obj.parent('.course_section').children('.label').removeClass(color).addClass(newcolor);
            $('.status-nav').attr('data-color', newcolor);
        }
    });

});

function edit_ajax(pos, sem, field, value) {
    return $.ajax({
        type: "POST",
        url: url + "forms/edit",
        data: {position: pos, semester: sem, field: field, value: value},
        dataType: "html",
        success: function (data) {

            console.log('Success: ' + data);
            /* 
             console.log("\n semester: " + data.semester);
             console.log("\n position: " + data.position);
             console.log("\n value: " + data.value);
             */
            ajaxresult = true;
        },
        error: function (data) {
            console.log('Fail: ');
            console.log(data)
        },
    });
}


/*=========
 * ADD
 ==========*/
$('.add-form').submit(function (e) {
    e.preventDefault();
    alert('wooooaaahh');
});

function add_plus(semester, position) {
    console.log(semester)
    console.log(position)
    var li = $("<li/>")
            .addClass("small-12 medium-12 columns course middle");
    var alink = $("<a/>")
            .attr("href", "#")
            .appendTo(li);
    var icon = $("<i/>")
            .addClass("fi-plus large green")
            .appendTo(alink);
    $("#" + semester + position).fadeOut(
            'fast',
            function () {
                $("#" + semester + position).replaceWith(li);
            })
}

function remove_little_plus(semester, position) {
    console.log(semester)
    console.log(position)
}