<!DOCTYPE html>
<html>

<head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <title>E Ticaret Paneli</title>
    <meta name="keywords" content="HTML5 Bootstrap 3 Admin Template UI Theme" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.6/sweetalert2.min.css">
    <!-- Font CSS (Via CDN) -->
    <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700'>
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700">

    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="/admin/assets/skin/default_skin/css/theme.css">

    <!-- Admin Panels CSS -->
    <link rel="stylesheet" type="text/css" href="/admin/assets/admin-tools/admin-plugins/admin-panels/adminpanels.css">

    <!-- Admin Forms CSS -->
    <link rel="stylesheet" type="text/css" href="/admin/assets/admin-tools/admin-forms/css/admin-forms.css">

    <!-- Favicon -->
    <link rel="shortcut icon" href="/admin/assets/img/favicon.ico">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    @yield('css')
</head>

<body class="dashboard-page sb-l-o sb-r-c">



<!-- Start: Main -->
<div id="main">

    <!-- Start: Header -->
    <header class="navbar navbar-fixed-top bg-light">
        <div class="navbar-branding">
            <a class="navbar-brand" href="dashboard.html"> <b>E -</b>Ticaret
            </a>
            <span id="toggle_sidemenu_l" class="glyphicons glyphicons-show_lines"></span>
            <ul class="nav navbar-nav pull-right hidden">
                <li>
                    <a href="#" class="sidebar-menu-toggle">
                        <span class="octicon octicon-ruby fs20 mr10 pull-right "></span>
                    </a>
                </li>
            </ul>
        </div>
        <ul class="nav navbar-nav navbar-left">
            <li>
                <a class="sidebar-menu-toggle" href="#">
                    <span class="octicon octicon-ruby fs18"></span>
                </a>
            </li>
            <li>
                <a class="topbar-menu-toggle" href="#">
                    <span class="glyphicons glyphicons-magic fs16"></span>
                </a>
            </li>
            <li>
                <span id="toggle_sidemenu_l2" class="glyphicon glyphicon-log-in fa-flip-horizontal hidden"></span>
            </li>
            <li class="dropdown hidden">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <span class="glyphicons glyphicons-settings fs14"></span>
                </a>
                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a href="javascript:void(0);">
                            <span class="fa fa-times-circle-o pr5 text-primary"></span> Reset LocalStorage </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <span class="fa fa-slideshare pr5 text-info"></span> Force Global Logout </a>
                    </li>
                    <li class="divider mv5"></li>
                    <li>
                        <a href="javascript:void(0);">
                            <span class="fa fa-tasks pr5 text-danger"></span> Run Cron Job </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <span class="fa fa-wrench pr5 text-warning"></span> Maintenance Mode </a>
                    </li>
                </ul>
            </li>
            <li class="hidden-xs">
                <a class="request-fullscreen toggle-active" href="#">
                    <span class="octicon octicon-screen-full fs18"></span>
                </a>
            </li>
        </ul>
        <form class="navbar-form navbar-left navbar-search ml5" role="search">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search..." value="Search...">
            </div>
        </form>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown dropdown-item-slide">
                <a class="dropdown-toggle pl10 pr10" data-toggle="dropdown" href="#">
                    <span class="octicon octicon-radio-tower fs18"></span>
                </a>
                <ul class="dropdown-menu dropdown-hover dropdown-persist pn w350 bg-white animated animated-shorter fadeIn" role="menu">
                    <li class="bg-light p8">
                        <span class="fw600 pl5 lh30"> Notifications</span>
                        <span class="label label-warning label-sm pull-right lh20 h-20 mt5 mr5">12</span>
                    </li>
                    <li class="p10 br-t item-1">
                        <div class="media">
                            <a class="media-left" href="#"> <img src="assets/img/avatars/2.jpg" class="mw40" alt="holder-img"> </a>
                            <div class="media-body va-m">
                                <h5 class="media-heading mv5">Article <small class="text-muted">- 08/16/22</small> </h5> Last Updated 36 days ago by
                                <a class="text-system" href="#"> Max </a>
                            </div>
                        </div>
                    </li>
                    <li class="p10 br-t item-2">
                        <div class="media">
                            <a class="media-left" href="#"> <img src="assets/img/avatars/3.jpg" class="mw40" alt="holder-img"> </a>
                            <div class="media-body va-m">
                                <h5 class="media-heading mv5">Article <small class="text-muted">- 08/16/22</small> </h5> Last Updated 36 days ago by
                                <a class="text-system" href="#"> Max </a>
                            </div>
                        </div>
                    </li>
                    <li class="p10 br-t item-3">
                        <div class="media">
                            <a class="media-left" href="#"> <img src="assets/img/avatars/4.jpg" class="mw40" alt="holder-img"> </a>
                            <div class="media-body va-m">
                                <h5 class="media-heading mv5">Article <small class="text-muted">- 08/16/22</small> </h5> Last Updated 36 days ago by
                                <a class="text-system" href="#"> Max </a>
                            </div>
                        </div>
                    </li>
                    <li class="p10 br-t item-4">
                        <div class="media">
                            <a class="media-left" href="#"> <img src="assets/img/avatars/5.jpg" class="mw40" alt="holder-img"> </a>
                            <div class="media-body va-m">
                                <h5 class="media-heading mv5">Article <small class="text-muted">- 08/16/22</small> </h5> Last Updated 36 days ago by
                                <a class="text-system" href="#"> Max </a>
                            </div>
                        </div>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <span class="flag-xs flag-us"></span>
                    <span class="fw600">US</span>
                </a>
                <ul class="dropdown-menu animated animated-short flipInX" role="menu">
                    <li>
                        <a href="javascript:void(0);" class="fw600">
                            <span class="flag-xs flag-in mr10"></span> Hindu </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="fw600">
                            <span class="flag-xs flag-tr mr10"></span> Turkish </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="fw600">
                            <span class="flag-xs flag-es mr10"></span> Spanish </a>
                    </li>
                </ul>
            </li>
            <li class="ph10 pv20 hidden-xs"> <i class="fa fa-circle text-tp fs8"></i>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle fw600 p15" data-toggle="dropdown"> <img src="assets/img/avatars/1.jpg" alt="avatar" class="mw30 br64 mr15">
                    <span>John.Smith</span>
                    <span class="caret caret-tp hidden-xs"></span>
                </a>
                <ul class="dropdown-menu dropdown-persist pn w250 bg-white" role="menu">

                    <li class="br-t of-h">
                        <a href="{{ route('logout') }}" class="fw600 p12 animated animated-short fadeInDown"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">

                            <span class="fa fa-power-off pr5"></span> Logout </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
        </ul>

    </header>
    <!-- End: Header -->

    <!-- Start: Sidebar -->
    <aside id="sidebar_left" class="nano nano-primary">
        <div class="nano-content">



            <!-- sidebar menu -->
            <ul class="nav sidebar-menu">
                <li class="sidebar-label pt20">Menu</li>
                <li>
                    <a class="accordion-toggle" href="#">
                        <span class="glyphicons glyphicons-tags"></span>
                        <span class="sidebar-title">Ürünler</span>
                        <span class="caret"></span>
                    </a>
                    <ul class="nav sub-nav">
                        <li>
                            <a href="/admin/product/add">
                                <span class="glyphicons glyphicons-shopping_cart"></span> Ürün Ekle <span class="label label-xs bg-primary">New</span></a>
                        </li>
                        <li>
                            <a href="/admin/home">
                                <span class="glyphicons glyphicons-tags"></span> Ürün Listesi </a>
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="/admin/orders">
                        <span class="glyphicons glyphicons-shopping_cart"></span>
                        <span class="sidebar-title">Sipariş Listesi</span>
                        <span class="sidebar-title-tray">
                                <span class="label label-xs bg-primary">New</span>
                            </span>
                    </a>
                </li>

                <!-- sidebar resources -->





            </ul>
            <div class="sidebar-toggle-mini">
                <a href="{{ route('logout') }}">
                    <span class="fa fa-sign-out"></span>
                </a>
            </div>
        </div>
    </aside>

    <!-- Start: Content-Wrapper -->
    <section id="content_wrapper">

        <!-- Start: Topbar-Dropdown -->

        <!-- End: Topbar-Dropdown -->

        <!-- Start: Topbar -->
        <header id="topbar">
            <div class="topbar-left">
                <ol class="breadcrumb">
                    <li class="crumb-active">
                        <a href="dashboard.html">Dashboard</a>
                    </li>
                    <li class="crumb-icon">
                        <a href="dashboard.html">
                            <span class="glyphicon glyphicon-home"></span>
                        </a>
                    </li>
                    <li class="crumb-link">
                        <a href="index.html">Home</a>
                    </li>
                    <li class="crumb-trail">Dashboard</li>
                </ol>
            </div>
            <div class="topbar-right">
                <div class="ib topbar-dropdown">
                    <label for="topbar-multiple" class="control-label pr10 fs11 text-muted">Reporting Period</label>
                    <select id="topbar-multiple" class="hidden" multiple="multiple">
                        <optgroup label="Filter By:">
                            <option value="1-1">Last 30 Days</option>
                            <option value="1-2" selected="selected">Last 60 Days</option>
                            <option value="1-3">Last Year</option>
                        </optgroup>
                    </select>
                </div>
                <div class="ml15 ib va-m" id="toggle_sidemenu_r">
                    <a href="#" class="pl5"> <i class="fa fa-sign-in fs22 text-primary"></i>
                        <span class="badge badge-hero badge-danger">3</span>
                    </a>
                </div>
            </div>
        </header>
        <!-- End: Topbar -->

        <!-- Begin: Content -->
        <section id="content" class="animated fadeIn">


            <!-- Admin-panels -->
            <div class="admin-panels fade-onload sb-l-o-full">

                <!-- full width widgets -->
                <div class="row">

                    <!-- Three panes -->
                    @yield('content')
                    <!-- end: .col-md-12.admin-grid -->

                </div>

            </div>

        </section>
        <!-- End: Content -->

    </section>
    <!-- End: Content-Wrapper -->


    <!-- End: Right Sidebar -->

</div>
<!-- End: Main -->

<!-- BEGIN: PAGE SCRIPTS -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.6/sweetalert2.min.js"></script>

<!-- jQuery -->
<script type="text/javascript" src="/admin/vendor/jquery/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="/admin/vendor/jquery/jquery_ui/jquery-ui.min.js"></script>

<!-- Bootstrap -->
<script type="text/javascript" src="/admin/assets/js/bootstrap/bootstrap.min.js"></script>

<!-- Sparklines CDN -->
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery-sparklines/2.1.2/jquery.sparkline.min.js"></script>

<!-- Chart Plugins -->
<script type="text/javascript" src="/admin/vendor/plugins/highcharts/highcharts.js"></script>
<script type="text/javascript" src="/admin/vendor/plugins/circles/circles.js"></script>
<script type="text/javascript" src="/admin/vendor/plugins/raphael/raphael.js"></script>

<!-- Holder js  -->
<script type="text/javascript" src="/admin/assets/js/bootstrap/holder.min.js"></script>

<!-- Theme Javascript -->
<script type="text/javascript" src="/admin/assets/js/utility/utility.js"></script>
<script type="text/javascript" src="/admin/assets/js/main.js"></script>
<script type="text/javascript" src="/admin/assets/js/demo.js"></script>

<!-- Admin Panels  -->
<script type="text/javascript" src="/admin/assets/admin-tools/admin-plugins/admin-panels/json2.js"></script>
<script type="text/javascript" src="/admin/assets/admin-tools/admin-plugins/admin-panels/jquery.ui.touch-punch.min.js"></script>
<script type="text/javascript" src="/admin/assets/admin-tools/admin-plugins/admin-panels/adminpanels.js"></script>

<!-- Page Javascript -->
<script type="text/javascript" src="/admin/assets/js/pages/widgets.js"></script>


@yield('js')
<script type="text/javascript">
    jQuery(document).ready(function() {

        "use strict";

        // Init Theme Core
        Core.init({
            sbm: "sb-l-c",
        });

        // Init Demo JS
        Demo.init();

        // Init Widget Demo JS
        // demoHighCharts.init();

        // Because we are using Admin Panels we use the OnFinish
        // callback to activate the demoWidgets. It's smoother if
        // we let the panels be moved and organized before
        // filling them with content from various plugins

        // Init plugins used on this page
        // HighCharts, JvectorMap, Admin Panels

        // Init Admin Panels on widgets inside the ".admin-panels" container
        $('.admin-panels').adminpanel({
            grid: '.admin-grid',
            draggable: true,
            preserveGrid: true,
            mobile: false,
            callback: function() {
                bootbox.confirm('<h3>A Custom Callback!</h3>', function() {});
            },
            onFinish: function() {
                $('.admin-panels').addClass('animated fadeIn').removeClass('fade-onload');

                // Init the rest of the plugins now that the panels
                // have had a chance to be moved and organized.
                // It's less taxing to organize empty panels
                demoHighCharts.init();
                runVectorMaps();

                // We also refresh any "in-view" waypoints to ensure
                // the correct position is being calculated after the
                // Admin Panels plugin moved everything
                Waypoint.refreshAll();

            },
            onSave: function() {
                $(window).trigger('resize');
            }
        });

        // Widget VectorMap
        function runVectorMaps() {

            // Jvector Map Plugin
            var runJvectorMap = function() {
                // Data set
                var mapData = [900, 700, 350, 500];
                // Init Jvector Map
                $('#WidgetMap').vectorMap({
                    map: 'us_lcc_en',
                    //regionsSelectable: true,
                    backgroundColor: 'transparent',
                    series: {
                        markers: [{
                            attribute: 'r',
                            scale: [3, 7],
                            values: mapData
                        }]
                    },
                    regionStyle: {
                        initial: {
                            fill: '#E5E5E5'
                        },
                        hover: {
                            "fill-opacity": 0.3
                        }
                    },
                    markers: [{
                        latLng: [37.78, -122.41],
                        name: 'San Francisco,CA'
                    }, {
                        latLng: [36.73, -103.98],
                        name: 'Texas,TX'
                    }, {
                        latLng: [38.62, -90.19],
                        name: 'St. Louis,MO'
                    }, {
                        latLng: [40.67, -73.94],
                        name: 'New York City,NY'
                    }],
                    markerStyle: {
                        initial: {
                            fill: '#a288d5',
                            stroke: '#b49ae0',
                            "fill-opacity": 1,
                            "stroke-width": 10,
                            "stroke-opacity": 0.3,
                            r: 3
                        },
                        hover: {
                            stroke: 'black',
                            "stroke-width": 2
                        },
                        selected: {
                            fill: 'blue'
                        },
                        selectedHover: {}
                    },
                });
                // Manual code to alter the Vector map plugin to
                // allow for individual coloring of countries
                var states = ['US-CA', 'US-TX', 'US-MO',
                    'US-NY'
                ];
                var colors = [bgWarningLr, bgPrimaryLr, bgInfoLr, bgAlertLr];
                var colors2 = [bgWarning, bgPrimary, bgInfo, bgAlert];
                $.each(states, function(i, e) {
                    $("#WidgetMap path[data-code=" + e + "]").css({
                        fill: colors[i]
                    });
                });
                $('#WidgetMap').find('.jvectormap-marker')
                    .each(function(i, e) {
                        $(e).css({
                            fill: colors2[i],
                            stroke: colors2[i]
                        });
                    });
            }

            if ($('#WidgetMap').length) {
                runJvectorMap();
            }
        }

    });
</script>

<!-- END: PAGE SCRIPTS -->

</body>

</html>
