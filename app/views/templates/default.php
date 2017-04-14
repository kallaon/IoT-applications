
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title></title>

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

    <!-- Bootstrap Core CSS -->

    <link href="{{ urlFor('home') }}/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ urlFor('home') }}/bootstrap/css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ urlFor('home') }}/bootstrap/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>


<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ urlFor('home') }}">IoT</a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">
            <div class="container">
                <div class="navbar-header">

                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>


                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="{{ urlFor('home') }}">Home</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            {% if auth %}
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ auth.name }}<span class="caret"></span></a>

                            <ul class="dropdown-menu">
                                <li><a href="{{ urlFor('profile', { username: auth.name } ) }}"><i class="glyphicon glyphicon-user"></i>  Profile</a></li>
                                <li><a href="{{ urlFor('add') }}"><i class="glyphicon glyphicon-hdd"></i>  Add device</a></li>
                                <li><a href="{{ urlFor('password.change') }}"><i class="glyphicon glyphicon-wrench"></i>  Change password</a></li>
                                <li><a href="{{ urlFor('logout') }}"><i class="glyphicon glyphicon-off"></i>  Log out</a></li>


                            </ul>
                        </li>
                        {% endif %}
                        {% if auth %}
                        {% else %}
                        <li><a href="{{ urlFor('register') }}">Sign up</a></li>
                        <li><a href="{{ urlFor('login') }}">Log in</a></li>
                        {% endif %}

                    </ul>
                </div>
            </div>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li>
                    <a href="{{ urlFor('devices') }}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                </li>
                <li>
                    <a href="{{ urlFor('devices') }}"><i class="fa fa-fw fa-bar-chart-o"></i>Devices</a>
                </li>

            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        {% block title %}{% endblock %}
                        <small>Subheading</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i> Blank page
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->
            {% include 'templates/partials/messages.php' %}

            {% block content %}{% endblock %}
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->


<!-- jQuery -->
<script src="{{ urlFor('home') }}/bootstrap/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{ urlFor('home') }}/bootstrap/js/bootstrap.min.js"></script>



</body>

</html>

