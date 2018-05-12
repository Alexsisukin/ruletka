<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured adminAsset theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">

    <link rel="shortcut icon" href="/adminAsset/images/favicon_1.ico">

    <title>Админ панель</title>


    <!-- Styles -->
	<link rel="stylesheet" href="/adminAsset/plugins/morris/morris.css">

    <link href="/adminAsset/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css" rel="stylesheet" />
    <link href="/adminAsset/plugins/switchery/css/switchery.min.css" rel="stylesheet" />
    <link href="/adminAsset/plugins/multiselect/css/multi-select.css"  rel="stylesheet" type="text/css" />
    <link href="/adminAsset/lugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="/adminAsset/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" />
    <link href="/adminAsset/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />

    <link href="/adminAsset/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="/adminAsset/css/core.css" rel="stylesheet" type="text/css"/>
    <link href="/adminAsset/css/components.css" rel="stylesheet" type="text/css"/>
    <link href="/adminAsset/css/icons.css" rel="stylesheet" type="text/css"/>
    <link href="/adminAsset/css/pages.css" rel="stylesheet" type="text/css"/>
    <link href="/adminAsset/css/responsive.css" rel="stylesheet" type="text/css"/>
    <link href="/adminAsset/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/admin/css/chosen.css') }}" rel='stylesheet' tyle="text/css">
    <link href="{{ asset('/adminAsset/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/admin/css/theme/avocado.css') }}" rel="stylesheet" type="text/css" id="theme-style">
    <link href="{{ asset('adminAsset/css/core.css') }}" rel="stylesheet" type="text/css" id="theme-style">
    <link href="{{ asset('assets/admin/css/prism.css') }}" rel="stylesheet/less" type="text/css">
    <link href="{{ asset('assets/admin/css/fullcalendar.css') }}"rel='stylesheet' tyle="text/css">
    <link href="{{ asset('assets/admin/css/jquery-ui.css') }}"rel='stylesheet' tyle="text/css">
    <script src="https://rawgit.com/kimmobrunfeldt/progressbar.js/1.0.0/dist/progressbar.js"></script>
    <meta name="csrf-token" content="{!!  csrf_token()   !!}">
    <style type="text/css">
        body { padding-top: 102px; }
    </style>
    <link href="{{ asset('assets/admin/css/bootstrap-responsive.css') }}"  rel="stylesheet">

    <!-- JavaScript/jQuery, Pre-DOM -->
	<script src="/adminAsset//js/jquery.min.js"></script>
    <script src="/adminAsset//js/bootstrap.min.js"></script>
    <script src="/adminAsset//js/detect.js"></script>
    <script src="/adminAsset//js/fastclick.js"></script>
    <script src="/adminAsset//js/jquery.slimscroll.js"></script>
    <script src="/adminAsset//js/jquery.blockUI.js"></script>
    <script src="/adminAsset//js/waves.js"></script>
    <script src="/adminAsset//js/wow.min.js"></script>
    <script src="/adminAsset//js/jquery.nicescroll.js"></script>
    <script src="/adminAsset//js/jquery.scrollTo.min.js"></script>
    <script src="/adminAsset//plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js"></script>
    <script src="/adminAsset//plugins/switchery/js/switchery.min.js"></script>
    <script type="text/javascript" src="/adminAsset//plugins/multiselect/js/jquery.multi-select.js"></script>
    <script type="text/javascript" src="/adminAsset//plugins/jquery-quicksearch/jquery.quicksearch.js"></script>
    <script src="/adminAsset//plugins/select2/js/select2.min.js" type="text/javascript"></script>
    <script src="/adminAsset//plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>
    <script src="/adminAsset//plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js" type="text/javascript"></script>
    <script src="/adminAsset//plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>
    <script src="/adminAsset//plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>
    <script src="/adminAsset/plugins/morris/morris.min.js"></script>
    <script src="/adminAsset/plugins/raphael/raphael-min.js"></script>
    <script src="/adminAsset/plugins/jquery-knob/jquery.knob.js"></script>
    <script src="/adminAsset/pages/jquery.dashboard.js"></script>
    <script type="text/javascript" src="/adminAsset//plugins/autocomplete/jquery.mockjax.js"></script>
    <script type="text/javascript" src="/adminAsset//plugins/autocomplete/jquery.autocomplete.min.js"></script>
    <script type="text/javascript" src="/adminAsset//plugins/autocomplete/countries.js"></script>
    <script type="text/javascript" src="/adminAsset//pages/autocomplete.js"></script>
    <script type="text/javascript" src="/adminAsset//pages/jquery.form-advanced.init.js"></script>

    <script src="/adminAsset//js/jquery.core.js"></script>
    <script src="/adminAsset//js/jquery.app.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <script src="{{ asset('assets/admin/js/charts/excanvas.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/charts/jquery.flot.js') }}"></script>
    <script src="{{ asset('assets/admin/js/jquery.jpanelmenu.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/jquery.cookie.js') }}"></script>
    <script src="{{ asset('assets/admin/js/avocado-custom-predom.js') }}"></script>

    <!-- HTML5, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js" tppabs="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>

<body class="fixed-left">
@if(!Auth::guest())
<div id="wrapper">

    <!-- Top Bar Start -->
    <div class="topbar">

        <!-- LOGO -->
        <div class="topbar-left">
            <div class="text-center">
                <a href="/" class="logo"><i class="icon-magnet icon-c-logo"></i><span>Admin-Panel</span></a>
            </div>
        </div>

        <!-- Button mobile view to collapse sidebar menu -->
        <div class="navbar navbar-default" role="navigation">
            <div class="container">
                <div class="">
                    <div class="pull-left">
                        <button class="button-menu-mobile open-left waves-effect waves-light">
                            <i class="md md-menu"></i>
                        </button>
                        <span class="clearfix"></span>
                    </div>

                    <ul class="nav navbar-nav navbar-right pull-right">
                        <li class="dropdown top-menu-item-xs">
                            <a href="" class="dropdown-toggle profile waves-effect waves-light" data-toggle="dropdown"
                               aria-expanded="true"><img src="{{$u->avatar}}" alt="user-img"
                                                         class="img-circle"> </a>
                        </li>
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
        </div>
    </div>


            <div class="navbar-inner">


                <div class="container">

                    <a href="#">
                        <button type="button" class="btn btn-navbar mobile-menu">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </a>
                    <a class="brand" href="/admin"><i class="icon-leaf"></i>admin <b>Panel</b></a>
                    <ul class="nav pull-right">
                        <li class="dropdown">

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-user icon-white"></i>
                                <span class="hidden-phone">{{ $u->username }}</span>
                            </a>

                            <ul class="dropdown-menu">
                                <li><a href="/logout"><i class="icon-off"></i>Р’С‹С…РѕРґ</a></li>
                            </ul>


                        </li>


                    </ul>


                </div>
            </div>
			
    <div class="left side-menu">
        <div class="sidebar-inner slimscrollleft">
            <!--- Divider -->
            <div id="sidebar-menu">
                <ul>

                    <li class="text-muted menu-title">Навигация</li>

                    <li class="has_sub">
                        <a href="/admin" class="waves-effect"><i class="ti-home"></i> <span> Главная </span> <span class="menu-arrow"></span></a>
                    </li>
                    <li class="has_sub">
                        <a href="/admin/addCase" class="waves-effect"><i class="ti-light-bulb"></i><span> Добавить кейс </span> <span class="menu-arrow"></span></a>
                    </li>
                    <li class="has_sub ms-hover">
                        <a href="/admin/addItem" class="waves-effect"><i class="ti-spray"></i> <span> Добавить item </span> </a>
                    </li>
                    <li class="has_sub ms-hover">
                        <a href="/admin/lastvvod" class="waves-effect"><i class="ti-spray"></i> <span> Последние платежи </span> </a>
                    </li>
                    <li class="has_sub ms-hover">
                        <a href="/admin/lastvivod" class="waves-effect"><i class="ti-spray"></i> <span> Запросы на вывод </span> </a>
                    </li>
                    <li class="has_sub ms-hover">
                        <a href="/admin/users" class="waves-effect"><i class="ti-spray"></i> <span> Users </span> </a>
                    </li>
                    <li class="has_sub ms-hover">
                        <a href="/admin/cases" class="waves-effect"><i class="ti-spray"></i> <span> Cases </span> </a>
                    </li>
                    <li class="has_sub ms-hover">
                        <a href="/admin/stock" class="waves-effect"><i class="ti-spray"></i> <span> Add stock </span> </a>
                    </li>
					<li class="has_sub ms-hover">
                        <a href="/admin/promo" class="waves-effect"><i class="ti-spray"></i> <span> Бонус-коды </span> </a>
                    </li>
					<li class="has_sub ms-hover">
                        <a href="/admin/addPromo" class="waves-effect"><i class="ti-spray"></i> <span> Добавить бонус-код </span> </a>
                    </li>

                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>




        </div>
        </br>
        <div class="container">

            @endif

            @yield('content')
            @if(!Auth::guest())</div> @endif
</div>
</body>


<!-- Javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{ asset('assets/admin/js/jquery.hotkeys.js') }}"></script>
<script src="{{ asset('assets/admin/js/calendar/fullcalendar.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/jquery.pajinate.js') }}" ></script>
<script src="{{ asset('assets/admin/js/jquery.prism.min.js') }}" ></script>
<script src="{{ asset('assets/admin/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/charts/jquery.flot.time.js') }}" ></script>
<script src="{{ asset('assets/admin/js/charts/jquery.flot.pie.js') }}"></script>
<script src="{{ asset('assets/admin/js/charts/jquery.flot.resize.js') }}" ></script>
<script src="{{ asset('assets/admin/js/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/bootstrap/bootstrap-wysiwyg.js') }}"></script>
<script src="{{ asset('assets/admin/js/bootstrap/bootstrap-typeahead.js') }}" ></script>
<script src="{{ asset('assets/admin/js/jquery.easing.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/jquery.chosen.min.js') }}" ></script>
<script src="{{ asset('assets/admin/js/avocado-custom.js') }}"></script>
<script type='text/javascript'  src='https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.js' ></script>

<script>
$(document).ready(function() {
    $('#dp5').slider({
      max: 500,
      orientation: 'horizontal',
      selection: 'after'
    });
})
$('#dp5').slider();
</script>
</html>