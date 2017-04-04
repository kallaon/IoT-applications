{% extends 'templates/default.php' %}

{% block tittle %}IoT | Add device{% endblock %}

{% block content %}
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="info-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">ADD DEVICE</h3>
                </div>
                <div class="panel-body">
                    <form role="form" action="{{ urlFor('add.post') }}" method="post" autocomplete="on">
                        <fieldset>
                            <div class="form-group">
                                <label for="name">Device name</label>
                                <input class="form-control" placeholder="Name" name="name" type="text" id="name"  autofocus>
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
                                <button type="submit" class="btn btn-lg btn-info btn-block">ADD</button>

                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{% endblock %}
