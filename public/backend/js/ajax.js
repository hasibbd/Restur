$(document).ready(function () {
    function Reset() {
        $('.sld').attr('disabled', 'disabled');
        $(".sl").val('0').change();
        $('#price').val("");
        $('#vat').val("0");
        $('#disc').val("0");
        $('#quan').val("0");
    }
    function randomNumberFromRange(min,max)
    {
        return Math.floor(Math.random()*(max-min+1)+min);
    }
    var ii = 0;
    var url = $('#url').val();
    $('#form4submit').submit(function (e) {
        $('#load').show();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        var formData = new FormData(this);
        var state = $('#state').val();

        if (state === "save") {
            var my_url = url + "/add";
        } else if (state === "update") {
            my_url = url + "/" + state;
        } else {
            my_url = url + "/tabledata";
        }

        $.ajax({
            type: 'post',
            url: my_url,
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
                console.log(data);
                this.reset();
                $(".select2bs4").val(null).trigger('change');
                $('.modal').modal('hide');
              //  $('.table').DataTable().ajax.reload();
              //  $(".table").load(location.href + " .table");
                if (state === "update"){
                        toastr.success('New Data Added Successfully')
                }
                else{
                        toastr.success('Data Update Successfully')
                }
    setTimeout(function () {
        location.reload(true);
    }, 1000);
            },
            error: function (data) {
                console.log(data)
                toastr.error('New Employee Added Failed')
            }
        });
    });
    $(document).on('click', '#modalshow', function () {
        $('.modal').modal('show');
        $('#modal-title').text('Add New');
        $(".select2").val(null).trigger('change');
        $('form :input').val('');
        $('#state').text('Save').val('save');
        if ($('#pageno').val() == "all-dish"){
            var imgSrc = window.location.origin + '/image/dish/f.png';
        }else {
            var imgSrc = window.location.origin + '/image/employee/d.jpg';
        }

        $('#img-upload').attr('src', imgSrc);

    });
    $(document).on('click', '.st_change', function () {
        var state = $(this).val();
        var my_url = url + '/status/' + state;
        $.ajax({
            type: 'get',
            url: my_url,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
              //  $(".table").load(location.href + " .table");

                if (data.ms === 1){
                    $('#ch'+state).removeClass("bg-danger").addClass("bg-success").text("Enabled");
                }
                else {
                    $('#ch'+state).removeClass("bg-success").addClass("bg-danger").text("Disabled");
                }

                setTimeout(function () {
                    toastr.success('Status Update Successfully')
                }, 300);
            },
            error: function (data) {
                toastr.error('Status Update Failed')
            }
        });
    });
    $(document).on('click', '.delete', function () {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                var state = $(this).val();
                var my_url = url + '/delete/' + state;
                $.ajax({
                    type: 'get',
                    url: my_url,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {

                        $(".table").load(location.href + " .table");
                        setTimeout(function () {
                            toastr.success('Delete Successfully')
                        }, 300);
                    },
                    error: function (data) {
                        toastr.error('Delete Failed')
                    }
                });
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            }
        })

    });
    $(document).on('click', '.edit', function () {
        var state = $(this).val();
        var my_url = url + '/get/' + state;

        $.ajax({
            type: 'get',
            url: my_url,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
                console.log(data);
                $('.modal').modal('show');
                $('#modal-title').text('Edit');
                $('#state').text('Update').val('update');

                $(".table").load(location.href + " .table");

                switch (data.m) {
                    case "itemstock":

                        $("#item_name").val(data.ms.item_name).trigger('change');
                        $("#sup_name").val(data.ms.item_sup).trigger('change');
                        $('#item_q').val(data.ms.item_q);
                        $('#item_p').val(data.ms.item_p);
                        $('#item_p_d').val(data.ms.item_d);
                        if (data.ms.item_d == 0){
                            $("#item_p_p").prop('disabled', true);
                            $('#dis1').hide();
                            $('#dis2').hide();
                        }
                        else {
                            $('#dis1').show();
                            $('#dis2').show();
                            $("#item_p_p").prop('disabled', false);
                        }

                        if (data.ms.item_s == 1 && data.ms.item_d != 0){
                            $("#item_p_p").prop('disabled', true);
                            $('#dis1').hide();
                            $("#item_p_d").prop('disabled', false);
                            $('#i_d_t').text('Refund');
                        }
                        else {
                            $("#item_p_d").prop('disabled', true);
                            $('#i_d_t').text('Due');
                        }
                        break;
                    case "employee":
                        $('#emp_name').val(data.ms.emp_name);
                        $(".select2").val(data.ms.emp_type).trigger('change');
                        $('#emp_phone').val(data.ms.emp_phone);
                        $('#emp_email').val(data.ms.emp_email);
                        $('#emp_password').val(data.ms.emp_password);
                        $('#emp_address').val(data.ms.emp_address);
                        var imgSrc = window.location.origin + '/image/employee/' + data.ms.emp_image;
                        break;
                    case "products":
                        $('#pdt_name').val(data.ms.pdt_name);

                        break;
                    case "units":
                        $('#unit_name').val(data.ms.unit_name);
                        $('#unit_value').val(data.ms.unit_val);
                        break;
                    case "discounts":
                        $('#discount_name').val(data.ms.discount_name);
                        $('#discount_price').val(data.ms.discount_price);
                        break;
                    case "vats":
                        $('#vat_name').val(data.ms.vat_name);
                        $('#vat_price').val(data.ms.vat_price);
                        break;
                    case "tables":
                        $('#tbl_name').val(data.ms.tbl_name);
                        $('#tbl_capacity').val(data.ms.tbl_capacity);
                        break;
                    case "items":
                        $('#item_name').val(data.ms.item_name);
                        break;
                    case "dishes":
                        $('#dish_name').val(data.ms.dish_name);
                        $('#dish_type').val(data.ms.dish_type).trigger('change');
                        $('#dish_vat').val(data.ms.dish_vat).trigger('change');
                        $('#dish_discount').val(data.ms.dish_discount).trigger('change');
                        $('#dish_unit').val(data.ms.dish_unit).trigger('change');
                        $('#dish_price').val(data.ms.dish_price);
                        var imgSrc = window.location.origin + '/image/dish/' + data.ms.dish_image;
                        break;
                    case "suppliers":
                        $('#splr_name').val(data.ms.splr_name);
                        $('#splr_phone').val(data.ms.splr_phone);
                        $('#splr_email').val(data.ms.splr_email);
                        $('#splr_address').val(data.ms.splr_address);
                        break;
                    case "expenses":
                        $('#ex_name').val(data.ms.ex_name);
                        $('#ex_price').val(data.ms.ex_amount);
                        break;
                        default:
                        console.log('Data Not Found');
                }
                $('#img-upload').attr('src', imgSrc);
                $('#id4update').val(data.ms.id);

            },
            error: function (data) {
               toastr.error('Data Load Failed')
            }
        });
    });

    var table;
    var price = 0;
    var g_p = 0;
    var g_v = 0;
    var g_d = 0;
    var g_g_p = 0;
    $(document).on('click', '#button1', function () {
        var table = $('#table_name').val();
        var name = $('#dish_name').val();
        var type = $('#dish_type').val();
        var price = $('#price').val();
        var vat = $('#vat').val();
        var discount = $('#disc').val();
        var quantity = $('#quan').val();

        if (table == 0) {
            toastr.error('Select Table')
        } else if (type == 0) {
            toastr.error('Select Dish Type')
        } else if (name == 0) {
            toastr.error('Select Dish Name')
        } else {
            var t_price = price * quantity;
            var t_vat = t_price*(vat/100);
            var t_discount = t_price*(discount/100);
            var g_price = t_price + t_vat - t_discount;
            g_p = g_p + t_price;
            g_v = g_v + t_vat;
            g_d = g_d + t_discount;
            g_g_p = g_g_p + g_price;

            $('#example-table').append('<tr>\n' +
                '                                                <td id="dn' + ii + '">' + name + '</td>\n' +
                '                                                <td id="dt' + ii + '">' + type + '</td>\n' +
                '                                                <td>\n' +
                '                                                    <div class="form-group" id="dq' + ii + '">\n' + quantity +
                '                                                    </div>\n' +
                '\n' +
                '                                                </td>\n' +
                '                                                <td>\n' +
                '                                                    P:<span id="sp' + ii + '">' + t_price + '</span>,\n' +
                '                                                    V:<span id="sv' + ii + '">' + t_vat.toFixed(2) + '</span>,\n' +
                '                                                    D:<span id="sd' + ii + '">' + t_discount.toFixed(2) + '</span>\n' +
                '                                                    <br>\n' +
                '                                                    <span class="font-weight-bold">Total Price:<span id="stp' + ii + '">' + g_price.toFixed(2)+ '</span></span>\n' +
                '                                                </td>\n' +
                '                                                <td>\n' +
                '                                                    <div class="div">\n' +
                '                                                        <div class="form-group">\n' +
                '                                                            <button  class="btn-sm btn-danger DeleteButton" value="' + ii + '">Delete</button>\n' +
                '                                                        </div>\n' +
                '                                                    </div>\n' +
                '                                                </td>\n' +
                '                                            </tr>');
            ii++;
            $('#g_p').text(g_p);
            $('#g_v').text(g_v.toFixed(2));
            $('#g_d').text(g_d.toFixed(2));
            $('#g_g_p').text(g_g_p.toFixed(2));
            $('#paych').val("");
            $('#payin').val("");
            Reset();
        }
    });


    $(document).on('change', '#dish_type', function () {
        var state = $(this).val();
        var my_url = url + '/type/' + state;
        $.ajax({
            type: 'get',
            url: my_url,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
                $("#dish_name").empty().trigger('change');
                $('#dish_name').append($('<option>', {
                    value: "",
                    text: "Select",
                }));
                $.each(data, function (i, item) {
                    $('#dish_name').append($('<option>', {
                        value: item.dish_name,
                        text: item.dish_name,
                    }));
                });
            },
            error: function (data) {
            }
        });
    });

    $(document).on('change', '#dish_name', function () {
        var state = $(this).val();
        var my_url = url + '/dish/' + state;
        $.ajax({
            type: 'get',
            url: my_url,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
                console.log(data);
                $('#quan').val(1);
                $('#vat').val(data[0].dish_vat);
                $('#disc').val(data[0].dish_discount);
                $('#price').val(data[0].dish_price);

            },
            error: function (data) {
                toastr.error('New Employee Added Failed')
            }
        });
    });






    $('#orderdone').click(function() {
        var rowCount = $('#example-table tr').length-1;
        var orderid =  randomNumberFromRange(100000, 999999);
        var tbl = $('#table_name').val();
        if (rowCount>0){
            var i = 0;
            var a=0;
            while (1) {
                var sp = "#dn" + a;
                var st = "#dt" + a;
                var sq = "#dq" + a;
                var name = $(sp).text();
                var type = $(st).text();
                var qan = $(sq).text();
                if (name != 0){
                    a++;
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    var my_url = url + '/order-add';
                    $.ajax({
                        type: 'post',
                        data: {
                            tbl: tbl,
                            orderid: orderid,
                            name: name,
                            type: type,
                            qan: qan,
                        },
                        url: my_url,
                        success: (data) => {
                           console.log(data);
                        },
                        error: function (data) {
                            console.log(data);
                        }
                    });
                }
                if(a === rowCount){
                   break;
                }
            }
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var p_stat;
        var p_price;
        var payin = $('#payin').val();
        var paych = $('#paych').val();
        var price = parseInt($('#g_p').text());
        var vat = parseInt($('#g_v').text());
        var discount = parseInt($('#g_d').text());
        var grand_price = parseInt($('#g_g_p').text());


        if (payin === "" && paych === ""){
            p_stat = 0;
            p_price = grand_price;
        }
        else if (payin >=grand_price){
            p_stat = 1;
            p_price = 0;
        }
        else {
            p_stat = 2;
            p_price = paych;
        }
        var my_url = url + '/pay-add';
        $.ajax({
            type: 'post',
            data: {
                orderid: orderid,
                price: price,
                vat: vat,
                discount: discount,
                grand_price: grand_price,
                p_state: p_stat,
                p_price: p_price,
            },
            url: my_url,
            success: (data) => {
              //  toastr.success('New Order Success')
                Swal.fire({
                    title: 'Your Order Place Successful',
                    text: "Order ID: "+data,
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ok!'
                }).then((result) => {
                    if (result.value) {
                        location.reload();
                    }
                })

            },
            error: function (data) {
                console.log(data);
            }
        });
    });

  /*  function calculateColumn(index) {
        var total = 0;
        $('table tr').each(function () {
            var value = parseInt($('td', this).eq(index).text());
            if (!isNaN(value)) {
                total += value;
            }
        });
    $('#tt').text(total);
    }
    calculateColumn(5);*/



    var ee =$('#re').val();
    var cc = 20;
 /*   setTimeout(function(){
        $('#chere').text(cc++);
        if (ee == 5 && cc === 0){
          //  $("#rere").load(location.href + " #rere");
             location.reload(true);
        }
        }, 1000);
*/
    var counter = 20;
    var interval = setInterval(function() {
        counter--;
        jQuery("#chere").html(counter);
        if (counter == 0 && ee == 5) {
            location.reload(true);
        }
    }, 1000);


    $('#getincome').click(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var table = $("#example1 tbody");
        var sdate = $('#mmmm').val();
        var edate = $('#yy').val();

        var my_url = url + '/getincome';

        $.ajax({
            type: 'post',
            data: {
                sdate: sdate,
                edate: edate,
            },
            url: my_url,
            success: function (data) {
                console.log(data);
                 table.empty();
                  var i =1;
                  var sum = 0;
                $.each(data, function (a, b) {
                    table.append("<tr><td>"+(i++)+"</td>" +
                        "<td>"+b.or_id+"</td>"+
                        "<td>" + b.or_by + "</td>" +
                        "<td>" + b.or_price + "</td>" +
                        "<td>" + b.or_vat + "</td>" +
                        "<td>" + b.or_discount + "</td>" +
                        "<td>" + b.or_grand_price + "</td>"+"</tr>");
                    sum = sum +b.or_grand_price;
                });

                $('#inco').text(sum);
                $(".display").DataTable();
            },
            error: function (data) {
                console.log(data);
            }
        });

    });


   /* $('.printtable').click(function() {

       var pageTitle = 'Restur',
            stylesheet = '//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css',
            win = window.open('', 'Print', 'width=500,height=300');
        win.document.write('<html><head><title>' + pageTitle + '</title>' +
            '<link rel="stylesheet" href="' + stylesheet + '">' +
            '</head><body>'+ $('.table')[0].outerHTML +
            '</body></html>');
        win.document.close();
        win.print();
        //win.close();
        return false;
    });*/

    $('#printtable').click(function() {
        printJS({
            printable: 'printthis',
            type: 'html',
            targetStyles: ['*']
        })
    });
    $('.printtable').click(function() {
        var c = $(this).val();
        printJS({
            printable: 'pr'+c,
            type: 'html',
            targetStyles: ['*']
        })
    });
   /* $("#printdiv").click(function () {
        $("#pr").show();
        window.print();
    });
    $(".printdiv").click(function () {
        var t = $(this).val();
        $("#pr"+t).printThis();
      //  $('selector').printThis();
     // $("#pr"+t).show();
      // window.print();
    });
*/

});
