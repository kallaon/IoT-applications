{% extends 'templates/default.php' %}

{% block tittle %}IoT | User devices {% endblock %}

{% block content %}
<div class="row">
    <div class="container">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="glyphicon glyphicon-wrench"></i> Edit device</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="{{ urlFor('edit.post', { dev_name: dev.device_name } ) }}" method="post" autocomplete="on">
                            <fieldset>
                                <div class="form-group">
                                    <label for="name">Device name</label>
                                    <input class="form-control" placeholder="{{ dev[0].device_name }}" name="name" type="text" id="name"  autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="type">Type</label>
                                    <div class="form-group">
                                        <select name="menu-type" id="menu-type">

                                            {% for type in types %}
                                            <option value="{{ type.id_type }}"> {{ type.device_name }}</option>
                                            {% endfor %}

                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-lg btn-info btn-block">Update</button>

                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>


{% endblock %}