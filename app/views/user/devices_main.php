{% extends 'templates/default.php' %}

{% block tittle %}IoT | User devices {% endblock %}

{% block content %}
<div class="col-lg-8">
    <h2>Devices overview</h2>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="glyphicon glyphicon-list"></i> Device's table</h3>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                    <tr>
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
                        <td>{{ dev.device_name }}</td>
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


{% endblock %}