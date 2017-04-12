

<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="container">
        <div class="navbar-header">

            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="#">IoT</a>
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
</nav>

