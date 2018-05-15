
$(document).ready(function() {


    window.statbox = {'online':0, 'users':0, 'games':0};



    $("#promo_btn").click(function() {
        $.ajax({
            url: "/promo",
            type: "post",
            data: {
                user: login,
                code: $("#promo_value").val()
            },
            dataType: "json",
            success: function(response) {
                if(response.status == 'true'){
                 alert("sucess!"), $("#promo_value").val("");
                }else{
                    alert(response.error);
                }
            }
        });
    });



    var ref = getUrlVars()["ref"];
    if (ref == "page") {
        var scrollTop = $('.ceys_title').offset().top;
        $(document).scrollTop(scrollTop);
    }
    ion.sound({
        sounds: [{
            name: "button_click_on",
            volume: 0.2
        }, {
            name: "snap",
            volume: 0.2,
            multiplay: true
        }],
        volume: 0.5,
        path: "/sounds/",
        preload: true
    });
    inprocess = false;
    $('#button_buy').on('click', function() {
        if (inprocess == true) return false;
        else inprocess = true;
        ion.sound.play("button_click_on");
        $('#button_buy').addClass('inprocess');
        reloadRulet();
    });
    $('#button_buy2').on('click', function() {
        if (inprocess == true) return false;
        else inprocess = true;
        ion.sound.play("button_click_on");
        $('#button_buy2').addClass('inprocess');
        reloadRulet2();
    });
});
var S = 41;
var T = 10;
function processGame2(dasd) {
    get_random_game2(dasd,function(err, data) {
        if (err) {
            console.error(err);
        } else {
            prev = 0;
            spin_sound = setInterval(function() {
                left_pos = (parseInt($('.rulet ul').css('left')) - 500) * -1;
                g_width = $('.rulet ul li').outerWidth() + 20;
                current = Math.floor(left_pos / g_width);
                if (current > prev && current != 2) {;
                    ion.sound.play("snap");
                    prev = current;
                }
            }, 20);
            widthRulet = ($('.rulet ul li.prize').index() - 2) * ($('.rulet ul li').outerWidth() + 20);
            $('.rulet ul').animate({
                'left': '-' + (widthRulet - 10) + 'px'
            }, 1000 * T, 'swing', function() {
                $('#modal4').arcticmodal({
                    closeOnOverlayClick: true,
                    closeOnEsc: true,
                    afterClose: function(data, el) {
                        $.post('/update', {
                            user: login,
                        }).done(function done(data) {

                        }).fail(function fail(jqXHR, textStatus, errorThrown) {

                        });
                        window.location.reload();
                    }
                });
                $('#button_buy2').removeClass('inprocess');
                inprocess = false;
            });
        }
    });
}
function processGame() {
    get_random_game(function(err, data) {
        if (err) {

            console.error(err);
       } else {
            prev = 0;
            spin_sound = setInterval(function() {
                left_pos = (parseInt($('.rulet ul').css('left')) - 500) * -1;
                g_width = $('.rulet ul li').outerWidth() + 20;
                current = Math.floor(left_pos / g_width);
                if (current > prev && current != 2) {;
                    ion.sound.play("snap");
                    prev = current;
                }
            }, 20);
            widthRulet = ($('.rulet ul li.prize').index() - 2) * ($('.rulet ul li').outerWidth() + 20);
            $('.rulet ul').animate({
                'left': '-' + (widthRulet - 10) + 'px'
            }, 1000 * T, 'swing', function() {
                $('#modal4').arcticmodal({
                    closeOnOverlayClick: true,
                    closeOnEsc: true,
                    afterClose: function(data, el) {
                        $.post('/update', {
                            user: login,
                        }).done(function done(data) {

                        }).fail(function fail(jqXHR, textStatus, errorThrown) {

                        });
                        window.location.reload();
                    }
                });
                $('#button_buy').removeClass('inprocess');
                inprocess = false;
            });
        }
    });
}
function updater(){
    window.location='/account';
    $.post('/update', {
        user: login,
    }).done(function done(data) {

    }).fail(function fail(jqXHR, textStatus, errorThrown) {

    });
}
function showKey(key){
    $('#modal_error_header2').text('Ваш код:');
    $('#modal_error_message').text(key);
    $('#modal_error2').arcticmodal();
}
function reloadRulet2() {
    console.log($('.ceys_full').attr('data-name'));
    if ($('.ceys_full').attr('data-name')) url = 'buy2?rulet_reload=' + $('.ceys_full').attr('data-name');
    else url = 'buy2?rulet_reload=def';
    $.ajax({
        method: 'POST',
        url: '/' + url,
        data: {user: login},
        success: function(data) {
                $('.rulet ul').css('left', '10px');
                var text = "";
                var i;
                console.log(Object.keys(data['item']).length);
                for (i = 0; i < Object.keys(data['item']).length; i++) {
                    console.log(data['item'][i][0]);
                    text += '<li><img src="'+data['item'][i][0]['image']+'" alt="'+data['item'][i][0]['name']+'"></li>';
                }
                $('.rulet ul').html('<ul>'+text+'</ul>');
                $('.rulet ul').fadeIn(500, function() {
                    var number = S;
                    $('.rulet ul li:nth-child(' + 15 + ')').addClass('prize');
                    $('.rulet ul').css('min-width', $('.rulet ul li').length * 200);
                    console.log(data['win']);
                    setTimeout('processGame2('+data['win']+')', 1000);
                });

        }
    });
    return true;
}
function reloadRulet() {
        console.log($('.ceys_full').attr('data-name'));
    if ($('.ceys_full').attr('data-name')) url = 'buy?rulet_reload=' + $('.ceys_full').attr('data-name');
    else url = 'buy?rulet_reload=def';
    $.ajax({
        method: 'POST',
        url: '/' + url,
        data: {user: login},
        success: function(data) {
            if(data['error'] == 'money'){
                $('#modal_error_header').text('Пополните счет');
                var mydiv = document.getElementById("modal_error_message");
                var aTag = document.createElement('a');
                aTag.setAttribute('href',"/oplata");
                aTag.innerHTML = "Пополнить";
                aTag.className += 'login';
                mydiv.appendChild(aTag);
                $('#modal_error').arcticmodal();
            }else if(data['error'] == 'login'){
                $('#modal_error_header').text('Login!');
                //$('#modal_error_message').html("<a class="login" href="/login">Login</a>");
                var mydiv = document.getElementById("modal_error_message");
                var aTag = document.createElement('a');
                aTag.setAttribute('href',"/login");
                aTag.innerHTML = "Login";
                aTag.className += 'login';
                mydiv.appendChild(aTag);
                $('#modal_error').arcticmodal();
            }else if(data['error'] == 'stock'){
                $('#modal_error_header').text('Sorry!');
                //$('#modal_error_message').html("<a class="login" href="/login">Login</a>");
                var mydiv = document.getElementById("modal_error_message");
                var aTag = document.createElement('a');
                aTag.setAttribute('href',"/");
                aTag.innerHTML = "Out of stock";
                aTag.className += 'login';
                mydiv.appendChild(aTag);
                $('#modal_error').arcticmodal();
            }else{
                $('.rulet ul').css('left', '10px');
                var text = "";
                var i;
                console.log(Object.keys(data['item']).length);
                for (i = 0; i < Object.keys(data['item']).length; i++) {
                    console.log(data['item'][i][0]);
                    text += '<li><img src="'+data['item'][i][0]['image']+'" alt="'+data['item'][i][0]['name']+'"></li>';
                }
                $('.rulet ul').html('<ul>'+text+'</ul>');
                $('.rulet ul').fadeIn(500, function() {
                    var number = S;
                    $('.rulet ul li:nth-child(' + 15 + ')').addClass('prize');
                    $('.rulet ul').css('min-width', $('.rulet ul li').length * 200);
                    setTimeout('processGame()', 1000);
                });
            }
        }
    });
    return true;
}
function get_random_game2(saf,cb) {
        $.post('/getWin2', {
            user: login,
            win_item: saf,
            action: 'random_game',
            genre_name: $('.ceys_full').attr('data-name')
        }).done(function done(data) {
            console.log(data.item);
            if (typeof data === 'undefined') {
                console.error('api.php - random_game - result is undefined');
                $('#modal_error_header').text('Не получены данные от сервера');
                $('#modal_error_message').text('Что-то странное происходит');
                $('#modal_error').arcticmodal();
                return cb(new Error('Result is undefined'));
            }
            if (typeof data.error !== 'undefined') {
                console.error('api.php - random_game - error', data.error);
                if (typeof data.error.refill !== 'undefined') {
                    $('#refill_rub').html(data.refill);
                    $('#refill_input').val(data.refill);
                    $('#modal3').arcticmodal();
                } else if (typeof data.error.item_not_found !== 'undefined') {
                    $('#modal5').arcticmodal();
                } else {
                    $('#modal_error_header').text(data.title);
                    $('#modal_error_message').html(data.message);
                    $('#modal_error').arcticmodal();
                }
                return cb(new Error(data.error));
            }
            if (data.item === 'undefined') {
                console.error('api.php - random_game - item is not set');
                return cb(new Error('Item is undefined'));
            }
            $('.rulet ul li:nth-child(' + 27 + ')').addClass('prize');
            var item = data.item;
            var img_header = "<img src='" + item.image + "' alt='" +
                    item.name + "' style='width: 176px;height: 244px;' /></br></br><h3>" + item.name + "</h3></br>",
                img_roulette = "<img src='" + item.image + "' alt='" + item.name + "' />";
            $('#prizimgpopop').html(img_header);
            $('#modal4 input').attr('onClick', 'updater();')
            $('.rulet ul li.prize').each(function() {
                $(this).html(img_roulette);
            });
            return cb(null, data);
        }).fail(function fail(jqXHR, textStatus, errorThrown) {

        });

}
function get_random_game(cb) {
    if(login == 0){
        return false;
    }else{
        $.post('/getWin', {
            user: login,
            action: 'random_game',
            genre_name: $('.ceys_full').attr('data-name')
        }).done(function done(data) {
            console.log(data.item);
            if (typeof data === 'undefined') {
                console.error('api.php - random_game - result is undefined');
                $('#modal_error_header').text('Не получены данные от сервера');
                $('#modal_error_message').text('Что-то странное происходит');
                $('#modal_error').arcticmodal();
                return cb(new Error('Result is undefined'));
            }
            if (typeof data.error !== 'undefined') {
                console.error('api.php - random_game - error', data.error);
                if (typeof data.error.refill !== 'undefined') {
                    $('#refill_rub').html(data.refill);
                    $('#refill_input').val(data.refill);
                    $('#modal3').arcticmodal();
                } else if (typeof data.error.item_not_found !== 'undefined') {
                    $('#modal5').arcticmodal();
                } else {
                    $('#modal_error_header').text(data.title);
                    $('#modal_error_message').html(data.message);
                    $('#modal_error').arcticmodal();
                }
                return cb(new Error(data.error));
            }
            if (data.item === 'undefined') {
                console.error('api.php - random_game - item is not set');
                return cb(new Error('Item is undefined'));
            }
            $('.rulet ul li:nth-child(' + 27 + ')').addClass('prize');
            var item = data.item;
            var img_header = "<img src='" + item.image + "' alt='" +
                    item.name + "' style='width: 176px;height: 244px;' /></br></br><h3>" + item.name + "</h3></br>",
                img_roulette = "<img src='" + item.image + "' alt='" + item.name + "' />";
            $('#prizimgpopop').html(img_header);
            $('#modal4 input').attr('onClick', 'updater();')
            $('.rulet ul li.prize').each(function() {
                $(this).html(img_roulette);
            });
            return cb(null, data);
        }).fail(function fail(jqXHR, textStatus, errorThrown) {

        });
    }

}

function modal4() {
    $('#modal4').arcticmodal();
}

function hideDiv() {
    $('#mailbutton').toggle();
    $('.email').attr('onclick', '');
    $('#inputemail').prop('disabled', false);
}

function getUrlVars() {
    var vars = [],
        hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for (var i = 0; i < hashes.length; i++) {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }
    return vars;
}