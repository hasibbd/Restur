$(document).ready(function () {
    $('.example').DataTable();
    $('.select2').select2();

    $(document).on('change', '.btn-file :file', function() {
        var input = $(this),
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [label]);
    });

    $('.btn-file :file').on('fileselect', function(event, label) {

        var input = $(this).parents('.input-group').find(':text'),
            log = label;

        if( input.length ) {
            input.val(log);
        } else {
            if( log ) alert(log);
        }

    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#img-upload').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function(){
        readURL(this);
    });

    $("#item_p_p").on("input", function () {
        var st = $('#state').val();
        if (st != "update"){
            var d = $('#item_p').val()-$(this).val();
            $('#item_p_d').val(d);
        }
    });
    $("#payin").on("input", function () {
        var d = parseInt($('#g_g_p').text() - $(this).val());
        $('#paych').val(d);
    });
    $("#ppp").on("input", function () {
        var d = parseInt($('#td').text() - $(this).val());
        $('#ppc').val(d);
    });
    $("#example-table").on("click", ".DeleteButton", function () {
        var a = $(this).val();
        var sp = "#sp" + a;
        var sv = "#sv" + a;
        var sd = "#sd" + a;
        var stp = "#stp" + a;
        var p = $(sp).text();
        var v = $(sv).text();
        var d = $(sd).text();
        var tp = $(stp).text();
        $('#g_p').text(parseInt($('#g_p').text() - p));
        $('#g_v').text(parseInt($('#g_v').text() - v));
        $('#g_d').text(parseInt($('#g_d').text() - d));
        $('#g_g_p').text(parseInt($('#g_g_p').text() - tp));
        $(this).closest("tr").remove();
    });


    $('#pagerefresh').click(function(){
        location.reload(true);
    });
    var l = $('#idmax').val();
    for (var i = 1; i< l; i++){
        var t = $('#sum'+i).val();
        $('#inco'+i).text(t);
    }



});
