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
                        <form role="form" action="{{ urlFor('edit.post', { dev_name: dev.id_device } ) }}" method="post" autocomplete="on">
                            <fieldset>
                                <div class="form-group">
                                    <label for="name">Device name</label>
                                    <input class="form-control" value="{{ dev[0].device_name }}" name="name" type="text" id="name"  autofocus>

                                </div>
                                <input type="hidden" name="dev_name" value="{{ dev[0].id_device }}" id="dev_name">
                                <div class="form-group">
                                    <label for="type">Type</label>
                                    <div class="form-group">
                                        <select name="menu-type" id="menu-type">

                                            {% for type in types %}
                                            <option value="{{ type.id_type }}"> {{ type.device_name }}</option>
                                            {% endfor %}

                                        </select>
                                    </div>
                                    </div>
                                <div class="row">
                                    <div class="col-md-6"><a href="javascript: window.history.go(-1)" class="btn btn-lg btn-danger btn-block">Storno</a></div>
                                    <div class="col-md-6"><button type="submit" class="btn btn-lg btn-info btn-block">Update</button></div>
                                </div>




                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>


{% endblock %}