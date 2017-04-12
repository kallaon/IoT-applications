{% extends 'templates/default.php' %}

{% block tittle %}IoT | Change password {% endblock %}

{% block content %}
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Change password</h3>
                </div>
                <div class="panel-body">
                    <form role="form" action="{{ urlFor('password.change.post') }}" method="post" autocomplete="off">
                        <fieldset>
                            <div class="form-group{{ errors.password ? ' has-error' : '' }}">
                                <label for="password_old">Current password</label>
                                <input class="form-control" placeholder="Password" name="password_old" type="password" id="password_old" >
                                <span class="help-block">{% if errors.has('password_old') %} {{ errors.first('password_old') }} {% endif %}</span>
                            </div>
                                    <div class="form-group{{ errors.password ? ' has-error' : '' }}">
                                        <label for="password">New Password</label>
                                        <input class="form-control" placeholder="Password" name="password" type="password" id="password" >
                                        <span class="help-block">{% if errors.has('password') %} {{ errors.first('password') }} {% endif %}</span>
                                    </div>

                            <div class="form-group{{ errors.password ? ' has-error' : '' }}">
                                <label for="password">Confirm Password</label>
                                <input class="form-control" placeholder="Password" name="password_confirm" type="password" id="password_confirm" >
                                <span class="help-block">{% if errors.has('password_confirm') %} {{ errors.first('password_confirm') }} {% endif %}</span>
                            </div>
                                    <button type="submit" class="btn btn-lg btn-success btn-block">Save password</button>

                                </fieldset>
                            </form>
                </div>
            </div>
        </div>
    </div>
</div>
{% endblock %}
