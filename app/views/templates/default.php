<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- jQuery -->
       <script src="{{ urlFor('home') }}/bootstrap/js/jquery.js"></script>

    <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script>-->
     <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
     <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
     <link href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css" rel="stylesheet">

       <!-- Bootstrap Core JavaScript -->
    <script src="{{ urlFor('home') }}/bootstrap/js/bootstrap.min.js"></script>

    <script src="{{ urlFor('home') }}/bootstrap/js/plugins/morris/raphael.min.js"></script>
    <script src="{{ urlFor('home') }}/bootstrap/js/plugins/morris/morris.min.js"></script>
    <script src="{{ urlFor('home') }}/bootstrap/js/plugins/morris/morris-data.js"></script>

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>-->
   <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
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
            <a class="navbar-brand" href="{{ urlFor('dashboard') }}">Internet of Things</a>
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

                    <ul class="nav navbar-nav navbar-right">

                            {% if auth %}


                            <ul class="nav nav-pills">
                                <li role="presentation" class="active"><a href="{{ urlFor('profile', { username: auth.name } ) }}"><i class="glyphicon glyphicon-user"></i>  {{ auth.name }}</a></li>
                                <!--<li><a href="{{ urlFor('add') }}"><i class="glyphicon glyphicon-hdd"></i>  Add device</a></li>-->
                                <li role="presentation" ><a href="{{ urlFor('password.change') }}"><i class="glyphicon glyphicon-wrench"></i>  Change password</a></li>
                                <li role="presentation" ><a href="{{ urlFor('logout') }}"><i class="glyphicon glyphicon-off"></i>  Log out</a></li>


                            </ul>


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
                {% if auth %}
                <ul class="nav navbar-nav side-nav">


                    <li>
                        <a href="{{ urlFor('dashboard') }}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="{{ urlFor('devices') }}"><i class="fa fa-fw fa-bar-chart-o"></i> Devices</a>
                    </li>

                    <li>
                        <a href="{{ urlFor('api_guide') }}"><i class="fa fa fa-cloud"></i> API Guide</a>
                    </li>

                    <li>
                        <a href="{{ urlFor('user_guide') }}"><i class="fa fa-fw fa-book"></i> User Guide</a>
                    </li>

                </ul>
                {% endif %}
            </div>

            <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">

                        <small>{{ block('title') }}</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-home"></i>  <a href="{{ urlFor('devices') }}">Home</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i> {{ block('title') }}
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
</body>

</html>

