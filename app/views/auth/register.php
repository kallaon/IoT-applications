{% extends 'templates/default.php' %}

{% block tittle %}IoT | Register{% endblock %}

{% block content %}
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Please Sign Up</h3>
                </div>
                <div class="panel-body">
                    <form role="form" action="{{ urlFor('register.post') }}" method="post" autocomplete="on">
                        <fieldset>
                            <div class="form-group">
                                <label for="email">E-mail</label>

                                <input class="form-control" placeholder="E-mail" name="email" type="email" id="email"{% if request.post('email') %} value="{{ request.post('email') }}"{% endif %} autofocus>
                                <span class="help-block">{% if errors.has('email') %} {{ errors.first('email') }} {% endif %}</span>
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>

                                <input class="form-control" placeholder="Name" name="name" type="text" id="name"{% if request.post('name') %} value="{{ request.post('name') }}"{% endif %} autofocus>
                                <span class="help-block">{% if errors.has('name') %} {{ errors.first('name') }} {% endif %}</span>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>

                                <input class="form-control" placeholder="Password" name="password" type="password" id="password" >
                                <span class="help-block">{% if errors.has('password') %} {{ errors.first('password') }} {% endif %}</span>
                            </div>

                            <div class="form-group">
                                <label for="password">Confrim password</label>

                                <input class="form-control" placeholder="Password" name="password_confirm" type="password" id="password_confirm" >
                                <span class="help-block">{% if errors.first('password_confirm') %} {{ errors.first('password_confirm') }} {% endif %}</span>
                            </div>
                            <button type="submit" class="btn btn-lg btn-info btn-block">Sign up</button>
                        </fieldset>
                        <!-- <input type="hidden" name="{{ csrf_key }}" value="{{ csrf_token }}"> -->
                     </form>

                 </div>
             </div>
         </div>
     </div>
 </div>
 {% endblock %}
