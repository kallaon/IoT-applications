{% extends 'templates/default.php' %}

{% block title %}Profile{% endblock %}

{% block content %}

<div class="container">
    <div class="row">
        <div class="col-md-5  toppad  pull-right col-md-offset-3 ">

        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >


            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ auth.name }}</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="http://babyinfoforyou.com/wp-content/uploads/2014/10/avatar-300x300.png" class="img-circle img-responsive"> </div>
                        <div class=" col-md-9 col-lg-9 ">
                            <table class="table table-user-information">
                                <tbody>
                                <tr>
                                    <td>Username:</td>
                                    <td>{{ auth.name }}</td>
                                </tr>
                                <tr>
                                    <td>Registrated:</td>
                                    <td>{{ auth.created_at }}</td>
                                </tr>
                                <tr>
                                    <td>Updated:</td>
                                    <td>{{ auth.updated_at }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{ auth.email }}</td>
                                </tr>
                                <td>API key</td>
                                <td>{{ auth.api_key }}</td>
                                </tr>

                                </tbody>
                            </table>

                            <a href="#" class="btn btn-primary">Lorem</a>
                            <a href="#" class="btn btn-primary">Ipsum</a>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                    <span class="pull-right">
                            <a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                            <a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                        </span>
                </div>

            </div>
        </div>
    </div>
</div>



{% endblock %}
