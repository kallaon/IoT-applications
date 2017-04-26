{% extends 'templates/default.php' %}

{% block title %}User devices {% endblock %}

{% block content %}
<div class="row">
    <div class="col-lg-10">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="glyphicon glyphicon-list"></i> Device's table</h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Device name</th>
                            <th>Type</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        {% for dev in device %}
                        <tr>
                            <td>{{ dev.id_device }}</td>
                            <td><a href="{{ urlFor('devices', { id: dev.id_device } ) }}">{{ dev.device_name }}</a></td>
                            <td>{{ dev.type_name }}</td>
                            <td>{{ dev.created_at }}</td>
                            <td>{{ dev.updated_at }}</td>
                            <td><a href="{{ urlFor('edit', { dev_name: dev.id_device } ) }}"><span class="glyphicon glyphicon-wrench"></span></a></td>
                            <td><a href="{{ urlFor('delete', { id: dev.id_device } ) }}"><span class="glyphicon glyphicon-remove"></span></a></td>
                        </tr>
                        {% endfor %}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-2">
            <div class="info-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="glyphicon glyphicon-plus"></i> Add new device</h3>
                </div>
                <div class="panel-body">
                    <form role="form" action="{{ urlFor('add_device.post') }}" method="post" autocomplete="on">
                        <fieldset>
                            <div class="form-group">
                                <label for="name">Device name</label>
                                <input class="form-control" placeholder="Name" name="name" type="text" id="name" autofocus required>
                            </div>
                            <div class="form-group">
                                <label for="type">Type</label>
                                <div class="form-group">
                                    <select name="menu-type" id="menu-type" required>
                                        <option value="">Select</option>

                                        {% for type in types %}
                                        <option value="{{ type.id_type }}"> {{ type.device_name }}</option>
                                        {% endfor %}

                                    </select>
                                </div>
                                <button type="submit" class="btn btn-lg btn-info btn-block">Add</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>

    <div class="col-lg-2">
            <div class="info-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="glyphicon glyphicon-zoom-in"></i> Create new type</h3>
                </div>
                <div class="panel-body">
                    <form role="form" action="{{ urlFor('add_type.post') }}" method="post" autocomplete="on">
                        <fieldset>
                            <div class="form-group">
                                <label for="name">Type name</label>
                                <input class="form-control" placeholder="Type Name" name="type_name" type="text" id="type_name" autofocus required>
                            </div>
                            <div class="form-group">
                                <label for="name">Shortcut </label>
                                <input class="form-control" placeholder="°C, %, bar, dB" name="shrt_name" type="text" id="shrt_name" autofocus required>
                                <span class="help-block">{% if errors.has('shrt_name') %} {{ errors.first('shrt_name') }} {% endif %}</span>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-lg btn-info btn-block">Create</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>


</div>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>
<!--  ADD device panel  -->

{% endblock %}