<!doctype html>
<html lang="ru">

<head>
    <meta charset="utf-8" />
    <title>Личный Кабинет!</title>
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans"/>
    <link rel="stylesheet" type="text/css" href="/css/style.css?v=14" />
    <link rel="shortcut icon" href="/images/favicon.ico" />
    <script src="https://vk.com/js/api/openapi.js?135" type="text/javascript"></script>
    <meta property="og:title" content="keysongabee.xyz - Выиграй топовую игру всего за 59р!" />
    <meta property="og:image" content="https://cheapkeys.ru/images/logoog.png" />
    <meta property="og:url" content="https://cheapkeys.ru/" />
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
    <div class="modal" id="modal_error2" style="width:350px;">
        <div class="modal_close arcticmodal-close"></div>
        <div class="modal_title">Поздравляем!</div>
        <div class="hidden">
            <div class="balance">
                <center>
                    <h4 style="font-size: 15px;" id="modal_error_header2"></h4>
                </center>
                </br>
                <div class="balance_text">
                    <p id="modal_error_message"></p>
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
                <br>
                <a href="/login" class="login" style="top: 104px;">Войти через vk</a>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>
<div class="wrapper">
    <div class="header">
        <div class="full">
            <a href="/" class="logo"></a>
            <div class="panel">
                <div class="mini_profile">
                    <div class="mini_profile_ava">
                        <a href="/account/"><img src="{{Auth::user()->avatar}}" alt="" />
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
                            <a class="btn-header btn-lk" href="/account/" target="_blank">Кабинет</a> • <a class="btn-header link-lk" href="/logout/">Выход</a> •
                        </div>
                    </div>
                </div>
                <div class="header-nav">
                    <a href="https://vk.com/fast___key" target="_blank" class="btn-header btn-vk">Мы вконтакте</a>
                    <a href="/account/?ref=page" target="_blank" class="btn-header btn-open-free">Открывай бесплатно</a>
                </div>
            </div>
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
<div class="last_full">
    <div class="last_title"><b>Последние</b> выигрыши:</div>
    <div class="last_loop">
        <div class="slider" id="slider">
            <ul>
            </ul>
        </div>
    </div>
</div>
<link rel="stylesheet" type="text/css" href="/css/lk_style.css">
<center>
    <div class="ceys_title"><b><a href="/" style="color: #31a1d6;">ГЛАВНАЯ</a> / </b>ЛИЧНЫЙ КАБИНЕТ</div>
    <div class="ceys_full full lk-content" style="font-family: Open Sans;">
        <div class="lk-left-column">
            <img src="{{Auth::user()->avatar}}" class="lk-img">
            <div class="info-block">
                <div class="lk-margin" style="margin-bottom:-15px">
                    <span class="green bold balance_icon">Баланс: </span>
                    <span class="grey bold">{{Auth::user()->money}} руб</span>
                </div>
                <div class="lk-margin">
                    <span class="green bold group_icon">Группа: </span>
                    <span class="grey bold">Новичок [5%]</span>
                </div>
                <div class="lk-margin relative">
                    <span class="lk-label">Ваша реферальная ссылка:</span>
                    <input  readonly type="text" id="ref_url" class="lk-ref" name="ref" value="http://fast___key.xyz/?code={{Auth::user()->ref_code}}">
                </div>
                <div class="lk-margin relative">


                    <span class="lk-label">Промо-код:</span>
                    <input  type="text" id="promo_value" class="lk-ref" name="ref" value="">
                    <div class="lol" style="
    margin-bottom: 10px;
"> </div>
                    <a class="btn-header btn-lk" id="promo_btn" style="margin-top:15px;">Активировать</a>
                </div>
            </div>
        </div>
        <div class="lk-right-column">
            <div class="lk-nav-tab">
                <span class="bold lk-h1 " data-tab="games"> ваши игры</span>
                <span class="bold lk-h1 noactive" data-tab="referers"> реферальная система</span>
            </div>
            <div class="clear"></div>

            <div class="tab-content" id="games" style="">
                <div class="item_loop2">

                    @foreach($drops as $drop)
                        <div class="items" onClick="showKey('{{$drop->key}}')">
                            <div class="item_images1">
                                <img src="{{$drop->image}}" style=" -webkit-filter: opacity(25%); " alt="" />
                                <a class="item_open123"></a>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>


            <div class="tab-content" id="referers" style="display: none;">
                <span class="lk-info">Вы можете заработать на любимую игру прямо у нас на сайте. Для этого вам нужно приглашать друзей и знакомых на сайт по вашей реферальной ссылке. Вы будете получать до 20% от каждого пополнения. Чем больше вы пригласите рефералов, тем выше будет % отчислений.</span>
                <div class="block-url-ref">
                    <span class="lk-label-ref">Ваша реферальная ссылка:</span>
                    <input  readonly type="text" class="ref-url" value="http://keys-up.ru?r={{Auth::user()->ref_code}}">
                </div>
                <ul class="list-info">
                    <li>Ваша процентная ставка: <span class="grey">5% (<a href="#" onclick="$('#refRating').arcticmodal(); return false;">как повысить?</a>)</span>
                    </li>
                    <li>Вы пригласили пользователей: <span class="grey">0</span>
                    </li>
                    <li>Вы заработали: <span class="grey">0 р.</span>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</center>
<div style="display: none;">
    <div class="modal" id="refRating" style="width:810px;">
        <div class="modal_close arcticmodal-close"></div>
        <div class="modal_title"><b>Заработок</b>
        </div>
        <div class="hidden">
            <div class="garant">
                Что бы повысить свой % отчислений и начать зарабатывать ещё больше, Вам нужно приглашать как можно больше пользователей на сайт по вашей реферальной ссылке. Ниже в таблице вы можете посмотреть, сколько нужно пригласить пользователей для повышения %.
                <table class="table-ref">
                    <tr>
                        <td>Группа</td>
                        <td>Количество рефералов</td>
                        <td>Процент отчислений</td>
                    </tr>
                    <tr>
                        <td>Новичок</td>
                        <td>0</td>
                        <td>5%</td>
                    </tr>
                    <tr>
                        <td>Местный</td>
                        <td>10</td>
                        <td>7%</td>
                    </tr>
                    <tr>
                        <td>Опытный</td>
                        <td>30</td>
                        <td>10%</td>
                    </tr>
                    <tr>
                        <td>Авторитет</td>
                        <td>60</td>
                        <td>20%</td>
                    </tr>
                </table>
            </div>
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
    <h1><em></em>keysongabee.xyz - рандом ключи стим (Steam)</h1>
    <p>На нашем сайте вы можете открыть категории или кейсы с играми по самым выгодным ценам.</p>
    <p>Все операции происходят автоматически, без вмешательства администрации.</p>
    <br>
    <br>
    <a href="https://webmoney.ru"><img src="/images/88x31_wm_blue_on_white_ru.png">
    </a>
    <a href="https://passport.webmoney.ru/asp/certview.asp?wmid=217710800979" target="_blank"><img src="/images/passportwebmoney.png" alt="Здесь находится аттестат нашего WM идентификатора 217710800979" border="0">
    </a>
</div>
</div>

<script type="text/javascript">
    var server_time = '{{$time}}';
            @if(Auth::guest())
    var login = 0;

            @else
    var login = {{Auth::user()->id}};
    @endif
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
<script type="text/javascript" src="/js/core.js?v=22"></script>

</body>

</html>