<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tender Prediction</title>
        <link type="text/css" href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
        <link type="text/css" href="{{asset('bootstrap/css/bootstrap-responsive.min.css')}}" rel="stylesheet">
        <link type="text/css" href="{{asset('css/theme.css')}}" rel="stylesheet">
        <link type="text/css" href="{{asset('images/icons/css/font-awesome.css')}}" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
    </head>

<body>
    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                    <i class="icon-reorder shaded"></i></a><a class="brand" href="index.html"> Tender Prediction </a>
                <div class="nav-collapse collapse navbar-inverse-collapse">
                    <form class="navbar-search pull-left input-append" action="#">
                        <input type="text" class="span3">
                        <button class="btn" type="button">
                            <i class="icon-search"></i>
                        </button>
                    </form>
                    <ul class="nav pull-right">
                        <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="images/user.png" class="nav-avatar" />
                                <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Your Profile</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /.nav-collapse -->
            </div>
        </div>
        <!-- /navbar-inner -->
    </div>
    <!-- /navbar -->
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="span3">
                    <div class="sidebar">
                        <!--/.widget-nav-->
                        <!--/.widget-nav-->
                        <ul class="widget widget-menu unstyled">
                            <li><a class="collapsed" data-toggle="collapse" href="#togglePages"><i class="menu-icon icon-cog">
                                    </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                                    </i>Training </a>
                                <ul id="togglePages" class="collapse unstyled">
                                    <li><a href=""><i class="menu-icon icon-table"></i>Training Data</a></li>
                                    <li><a href=""><i class=" menu-icon icon-bar-chart"></i>Mining Process</a></li>
                                </ul>
                            </li>

                            <li><a class="collapsed" data-toggle="collapse" href="#togglePages2"><i class="menu-icon icon-cog">
                                    </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                                    </i>Testing </a>
                                <ul id="togglePages2" class="collapse unstyled">
                                    <li><a href="/testing"><i class="menu-icon icon-table"></i>Testing Data</a></li>
                                    <li><a href="/testingReport"><i class="menu-icon icon-book"></i>Classification Report</a></li>
                                    <li><a href=""><i class="menu-icon icon-bar-chart"></i>Prediction Results</a></li>
                                </ul>
                            </li>
                            <li><a href="/predictionForm"><i class="menu-icon icon-paste"></i>Tender Prediction Form </a></li>
                        </ul>

                    </div>
                    <!--/.sidebar-->
                </div>
                <!--/.span3-->

                <div class="span9">
                    <div class="content">

                        <!--/.content-->

                        @yield('content')
                    </div>

                </div>
                <!--/.span9-->
            </div>
        </div>
        <!--/.container-->
    </div>
    <!--/.wrapper-->
    <div class="footer">
        <div class="container">
            <b class="copyright">&copy; 2023 Enggar Rahayu - @enggarrs_ </b>All rights reserved.
        </div>
    </div>
    <script src="{{asset('scripts/jquery-1.9.1.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('scripts/jquery-ui-1.10.1.custom.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('scripts/flot/jquery.flot.js')}}" type="text/javascript"></script>
    <script src="{{asset('scripts/flot/jquery.flot.resize.js')}}" type="text/javascript"></script>
    <script src="{{asset('scripts/datatables/jquery.dataTables.js')}}" type="text/javascript"></script>
    <script src="{{asset('scripts/common.js')}}" type="text/javascript"></script>

</body>