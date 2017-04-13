{% extends 'templates/default.php' %}

{% block tittle %}IoT | User devices {% endblock %}

{% block content %}
<div class="row">
<div class="col-lg-8">

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="glyphicon glyphicon-list"></i> Device's table</h3>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Device name</th>
                        <th>Type</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Active</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    {% for dev in device %}
                    <tr>
                        <td>{{ dev.id_device }}</td>
                        <td><a href="{{ urlFor('devices', { id: dev.id_device } ) }}">{{ dev.device_name }}</a></td>
                        <td>{{ dev.id_type }}</td>
                        <td>{{ dev.created_at }}</td>
                        <td>{{ dev.updated_at }}</td>
                        <td>1</td>
                        <td><a href="#"><span class="glyphicon glyphicon-wrench"></span></a></td>
                        <td><a href="#"><span class="glyphicon glyphicon-remove"></span></a></td>
                    </tr>
                    {% endfor %}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!--  ADD device panel  -->

<div class="container">

        <div class="col-md-3">
            <div class="info-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="glyphicon glyphicon-plus"></i> Add new device</h3>
                </div>
                <div class="panel-body">
                    <form role="form" action="{{ urlFor('add_device.post') }}" method="post" autocomplete="on">
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