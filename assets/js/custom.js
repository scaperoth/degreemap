
var ajaxresult = false;


var base_url = "/degreemap/index.php/"

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
bind_page();

function bind_page() {
    //console.log('set');
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
        var ajax_data = $(this).serialize();
        ajax("forms/delete", ajax_data).done(function (data) {
            data = JSON.parse(data);
            //console.log('Success: ' + data);
            //console.log("\n add Big: " + data.semester);
            add_plus(data.semester, data.position);
            //console.log("\nremove little: ")
            remove_little_plus(data.semester, data.position);
            bind_page()
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
        var ajax_data = {position: pos, semester: sem, field: field, value: value};
        ajax("forms/edit", ajax_data)
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

        var ajax_data = {position: pos, semester: sem, field: field, value: newcolor};

        ajax("forms/edit", ajax_data).done(function (data) {
            console.log("res: " + color);
            data = JSON.parse(data);

            if (data.result === true) {
                console.log('here');
                obj.parent('.course_section').children('.label').removeClass(color).addClass(newcolor);
                $('.status-nav').attr('data-color', newcolor);
            }
        });

    });

    /*=========
     * ADD
     ==========*/
    $('.add-new').click(function (e) {
        var pos = $(this).attr('data-position');
        var sem = $(this).attr('data-semester');
        var ajax_data = {position: pos, semester: sem};
        ajax("forms/add", ajax_data).done(function (data) {

        });
    });

}

/**
 * 
 * @param {type} url
 * @param {type} data
 * @returns {jqXHR}
 */
function ajax(url, data) {

    return $.ajax({
        type: "POST",
        url: base_url + url,
        data: data,
        dataType: "html",
        success: function (data) {
            //console.log('Success: ' + data);
            /* 
             console.log("\n semester: " + data.semester);
             console.log("\n position: " + data.position);
             console.log("\n value: " + data.value);
             */
            //ajaxresult = true;
            $("#courses_row").load("./ #courses_table", function () {
                bind_page()
            });
        },
        error: function (data) {
            console.log('Fail: ');
            console.log(data)
        },
    });
}

/**
 * 
 * @param {type} semester
 * @param {type} position
 * @returns {undefined}
 */
function add_plus(semester, position) {
    //console.log(semester)
    //console.log(position)
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

/**
 * 
 * @param {type} semester
 * @param {type} position
 * @returns {undefined}
 */
function remove_little_plus(semester, position) {
    //console.log(semester)
    //console.log(position)
}
