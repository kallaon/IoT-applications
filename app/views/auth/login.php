{% extends 'templates/default.php' %}

{% block tittle %}IoT | Login{% endblock %}

{% block content %}
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Log In</h3>
                </div>
                <div class="panel-body">
                    <form role="form" action="{{ urlFor('login.post') }}" method="post" autocomplete="on">
                        <fieldset>
                            <div class="form-group">
                                <label for="identifier">User</label>
                                <input class="form-control" placeholder="Name or email" name="identifier" type="text" id="identifier"  autofocus>
                                <span class="help-block">{% if errors.has('identifier') %} {{ errors.first('identifier') }} {% endif %}</span>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input class="form-control" placeholder="Password" name="password" type="password" id="password" >

                                <span class="help-block">{% if errors.has('password') %} {{ errors.first('password') }} {% endif %}</span>
                            </div>
                            <button type="submit" class="btn btn-lg btn-info btn-block">Log in</button>
                        </fieldset>
                        <!-- <input type="hidden" name="{{ csrf_key }}" value="{{ csrf_token }}"> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{% endblock %}
