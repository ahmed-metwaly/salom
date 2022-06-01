/**
 * Created by maste on 8/22/2016.
 */


$('document').ready(function() {

    var isHide = $('#is-admin').val();

    if(isHide == 0) {
        $('#level').hide();
    }


    $('#is-admin').change(function(){
        var val = $(this).val();

        if(val == 1) {
            $('#level').show(2000);
        } else {
            $('#level').val(0);
            $('#level').hide(2000);
        }

    });

    // do action delete


    $('.do-delete').click(function(e) {

        e.preventDefault();

        var mSelector = $(this);

        var url = $(this).attr('href');


        if(confirm('هل تريد حذف العنصر فعلا !!')) {

            window.location.href = url;


        }

    });





});



    function getAjaxData(selectorChange, selectorHtml, url, col) {

        $(selectorChange).change(function(){

            $(selectorHtml).html('');

            var id = $(this).val();

            $.ajax({

                method : 'GET',
                url : url + '/' + id + '/' + col + '/' ,
                cache : false

            }).success(function(data) {

                var json = JSON.parse(data)

                $.each(json, function(key, val) {

                    $(selectorHtml).append('<option value="' + val.id + '">' + val.name + '</option>');

                });



            }).error(function(data) {

                console.log(data);

            });

        });


    }





