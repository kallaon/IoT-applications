{% extends 'templates/default.php' %}

{% block tittle %}IoT | Profile{% endblock %}

{% block content %}

<div class="panel panel-default">
    <div class="panel-heading">Username:</div>
    <div class="panel-body">
        {{ auth.name }}
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Email:</h3>
    </div>
    <div class="panel-body">
        {{ auth.email }}
    </div>
</div>
{% endblock %}
