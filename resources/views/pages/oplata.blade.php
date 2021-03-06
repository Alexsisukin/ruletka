<!doctype html>
<html lang="ru">

<head>
    <meta charset="utf-8" />
    <title>Пополнение баланса</title>
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans"/>
    <link rel="stylesheet" type="text/css" href="/css/style.css?v=15" />
    <link rel="shortcut icon" href="/images/favicon.ico" />
    <script src="https://vk.com/js/api/openapi.js?135" type="text/javascript"></script>
    <meta property="og:title" content="fastkey.su - Выиграй топовую игру всего за 59р!" />
    <meta property="og:image" content="https://cheapkeys.ru/images/logoog.png" />
    <meta property="og:url" content="https://cheapkeys.ru/" />
    <script>

        @if(Auth::guest())
        var login = 0;

        @else
            var login = {{Auth::user()->id}};
            @endif
    </script>
</head>

<body>

<div style="display:none;">
    <div class="modal" id="modal1" style="width:810px;">
        <div class="modal_close arcticmodal-close"></div>
        <div class="modal_title"><b>Наши</b> гарантии</div>
        <div class="hidden">
            <div class="garant">
                <div class="garant_i">
                    <div class="garant_name">Надежно</div>
                    <div class="garant_text">
                        Все платежные реквизиты и личные кабинеты Клиентов, защищены SSL технологиями шифрования! Дружелюбная Тех.Поддержка всегда с радостью ответит на все имеющиеся вопросы! Мы 5 лет занимаемся продажей игр в интернете и имеем Персональный Аттестат в системе Webmoney с большим бизнес уровнем!
                    </div>
                </div>
                <div class="garant_i">
                    <div class="garant_name">Честно</div>
                    <div class="garant_text">
                        Мы ничего не скрываем перед нашими клиентами! Все чисто! Ваш выигрыш определяет только рандом и мы никак не можем вмешаться в процесс. Тут Вы по-настоящему можете испытать свою удачу. Самое главное, это возможность получить Дорогую игру, при этом оплатив всего 99 руб (при покупке общего кейса). В LIVE-ленте отображаются полученные игры наших реальных клиентов!
                    </div>
                </div>
                <div class="garant_i">
                    <div class="garant_name">Быстро</div>
                    <div class="garant_text">
                        Процесс полностью автоматизирован! Вам не придется посещать кучу сайтов для оплаты и получения игры. Окно с инструкцией по активацией игры появится мгновенно! А если вы хотите растянуть сладостное мгновение, отложите активацию ключа на некоторое время.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="modal2" style="width:350px;">
        <div class="modal_close arcticmodal-close"></div>
        <div class="modal_title"><b>Пополнение</b> баланса</div>
        <div class="hidden">
            <div class="balance">
                <form method='get'>
                    <div class="balance_text">Введите сумму на которую хотите пополнить счет и нажмите кнопку пополнить.
                    </div>
                    <input type='text' name='cent' value='100'>
                    <div class='clear'></div>
                    <input type="submit" id="submit" value="ПОПОЛНИТЬ БАЛАНС">
                </form>
            </div>
        </div>
    </div>
    <div class="modal" id="modal3" style="width:350px;">
        <div class="modal_close arcticmodal-close"></div>
        <div class="modal_title"><b>Пополнение</b> баланса</div>
        <div class="hidden">
            <div class="balance">
                <form method='get'>
                    <div class='balance_text'>На Вашем балансе недостаточно средств, для участия в игре. Пожалуйста пополните счет на сумму не менее <b id="refill_rub"></b> рублей</div>
                    <input type='text' name='cent' id='refill_input' value=''>
                    <div class='clear'></div>
                    <input type="submit" id="submit" value="ПОПОЛНИТЬ БАЛАНС">
                </form>
            </div>
        </div>
    </div>
    <div class="modal" id="modal4" style="width:250px;">
        <div class="modal_close arcticmodal-close"></div>
        <div class="modal_title">Поздравляем!</div>
        <div class="hidden">
            <div class="balance">
                <center>
                    <h4 style="font-size: 15px;">Ваш выигрыш</h4>
                </center>
                </br>
                <div class="balance_text" id="prizimgpopop"></div>
                <div class="clear"></div>
                <p>Ваш выигрыш будет находиться в вашем личном кабинете, пока вы его не заберете.</p>
                </br>
                <input type="submit" onClick="window.location='/account'" value="ЗАБРАТЬ ПРИЗ" />
            </div>
        </div>
    </div>
    <div class="modal" id="modal5" style="width:350px;">
        <div class="modal_close arcticmodal-close"></div>
        <div class="modal_title">Упс!</div>
        <div class="hidden">
            <div class="balance">
                <center>
                    <h4 style="font-size: 15px;">Игры закончились</h4>
                </center>
                </br>
                <div class="balance_text">
                    <p>К сожалению, в данный момент игры закончились. Попробуйте позже. Скоро мы обновим игры. Спасибо за понимание</p>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
    <div class="modal" id="modal6" style="width:350px;">
        <div class="modal_close arcticmodal-close"></div>
        <div class="modal_title">Email</div>
        <div class="hidden">
            <div class="balance">
                <center>
                    <h4 style="font-size: 15px;">Оповещения</h4>
                </center>
                </br>
                <div class="balance_text">
                    <p>Мы будем оповещать вас о новых играх и акциях</p>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
    <div class="modal" id="modal_error" style="width:350px;">
        <div class="modal_close arcticmodal-close"></div>
        <div class="modal_title">Упс!</div>
        <div class="hidden">
            <div class="balance">
                <center>
                    <h4 style="font-size: 15px;" id="modal_error_header"></h4>
                </center>
                </br>
                <div class="balance_text">
                    <p id="modal_error_message"></p>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
    <div class="modal" id="auth" style="width:350px;">
        <div class="modal_close arcticmodal-close"></div>
        <div class="modal_title">Авторизируйтесь!</div>
        <div class="hidden">
            <div class="balance">
                <center>
                    <h4 style="font-size: 15px;">Чтобы играть, вам нужно авторизироваться</h4>
                </center>
                </br>
                </br>
                <a href="/index.php?login" class="login" style="top: 104px;">Войти через steam</a>
                <br>
                <a href="/vkauth/auth" class="login" style="top: 104px;">Войти через vk</a>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>
<div class="wrapper">
    <div class="header">
        <div class="full">
            <a href="/" class="logo"></a>
            @if(Auth::guest())
                <div class="auth-block">
                    <a href="/login">
                        <div class="button" style="    margin-left: 230px;"><span>Войти через</span> <b><img src="/images/icons/vk_big.png" style="
   height: 20px;
       position: absolute;
       top: 10px;
       left: 150px;
"></b>
                        </div>
                    </a>
                </div>
            @else
                <div class="panel">
                    <div class="mini_profile">
                        <div class="mini_profile_ava">
                            <a href="/account/"><img src="{{Auth::user()->avatar}}" alt="">
                            </a>
                        </div>
                        <div class="hidden">
                            <div class="mini_profile_login ell"><a href="/account/" style="color:#fff;">{{Auth::user()->username}}</a>
                            </div>
                            <div class="mini_profile_balance left">
                                Баланс: <b id="balanceuser">{{Auth::user()->money}} РУБ.</b>
                                <a href="/oplata/" target="_blank" class="btn-header btn-balance"> Пополнить</a>
                            </div>
                            <div class="mini_profile_logout">
                                <a class="btn-header btn-lk" href="/account/" target="_blank">Кабинет</a> • <a class="btn-header link-lk" href="/logout">Выход</a> •
                            </div>
                        </div>
                    </div>
                    <div class="header-nav">
                        <a href="https://vk.com/fast___key" target="_blank" class="btn-header btn-vk">Мы вконтакте</a>
                        <a href="/account/?ref=page" target="_blank" class="btn-header btn-open-free">Открывай бесплатно</a>
                    </div>
                </div>
            @endif
            <div class="nav">
                <ul>
                    <li><a href="/feedback/">Отзывы</a>
                    </li>
                    <li><a href="#" onclick="$('#modal1').arcticmodal(); return false;">Гарантии</a>
                    </li>
                    <li><a href="/faq/">f.a.q</a>
                    </li>
                    <li><a href="https://vk.com/fast___key" target="_blank">Конкурсы и раздачи</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<br>
<div class="feedback_full full">
    <div class="feedback_title"><b>Главная /</b> Оплата</div>
    <div class="total_form" id="pay">
        <h2 class="offer_pay-col-title">Минимальная сумма пополнения 1 рубль</h2>
        <form action method="get">
            <input id="curr" name="type_curr" type="hidden" value="WMR_merchant">
            <input name="cent" type="hidden">
            <div class="total">
                СУММА:
            </div>
            <div class="field_data">
                <input maxlength="4" name="sum" required="" type="text" value="300">
            </div>
            <button id="sub" onclick="" type="submit">ОПЛАТИТЬ</button>
        </form>
    </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
</div>
<div class="stats">
    <ul>
        <li><b id="cases">0</b>Открыто кейсов</li>
        <li><b id="users">0</b>Пользователей</li>
        <li><b id="online"></b>Всего online</li>
    </ul>
</div>
</div>
<div class="footer full">
    <h1><em></em>fastkey.su - рандом ключи стим (Steam)</h1>
    <p>На нашем сайте вы можете открыть категории или кейсы с играми по самым выгодным ценам.</p>
    <p>Все операции происходят автоматически, без вмешательства администрации.</p>

</div>
</div>


<script type="text/javascript">
    var server_time = '{{$time}}';
</script>
<script type="text/javascript" src="/js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="/js/jquery.smoothscroll.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.7.3/socket.io.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.7.3/socket.io.js"></script>
<script type="text/javascript" src="/js/jquery.arcticmodal-0.3.min.js"></script>
<script type="text/javascript" src="/js/jquery.animateNumber.min.js"></script>
<script type="text/javascript" src="/js/moment.js"></script>
<script type="text/javascript" src="/js/slider.js"></script>
<script src="https://cdn.rawgit.com/zenorocha/clipboard.js/master/dist/clipboard.min.js"></script>
<script type="text/javascript" src="/js/script.js?v=2"></script>
<script type="text/javascript" src="/js/ion.sound.min.js"></script>
<script type="text/javascript" src="/js/core.js?v=2"></script>
</body>

</html>