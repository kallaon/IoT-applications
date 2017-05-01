{% extends 'templates/default.php' %}

{% block title %} Dashboard {% endblock %}

{% block content %}

    <div class="row">
        <div class="col-md-10">
             <div class="list-group">

                 {% for board in dev_dev %}

                 {% if board.text == 'Graf'  %}

                 <div class="col-lg-{{ board.size }}">
                     <div class="panel {{ board.style }}">

                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div id="myfirstchart{{ board.device_id }}" style="height: 214px">


                    </div>
                                    <script>
                            var a = {{board.value | raw}};

                            new Morris.Line({
                                // ID of the element in which to draw the chart.
                                element: 'myfirstchart{{ board.device_id }}',
                                // Chart data records -- each entry in this array corresponds to a point on
                                // the chart.
                                data: a,
                                // The name of the data record attribute that contains x-values.
                                xkey: 'created_at',
                                // A list of names of data record attributes that contain y-values.
                                ykeys: ['device_val'],
                                // Labels for the ykeys -- will be displayed when you hover over the
                                // chart.
                                labels: ['Value']
                            });
                        </script>
                                </div>
                            </div>
                        </div>
                         <div class="panel-footer">
                                <span class="pull-left">{{ board.device_name }}</span>
                            <a href="{{ urlFor('delete-dashboard', { id: board.id } ) }}"><span class="pull-right"><i class="fa fa-trash"></i></span></a>
                                <div class="clearfix"></div>
                            </div>
                    </div>
                </div>

                 {% else %}

                 <div class="col-lg-{{ board.size }}">
                    <div class="panel {{ board.style }}">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa {{ board.icon }}  fa-4x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{ board.value }} {{ board.unit }}</div>
                                    <div>{{ board.text }}  {{ board.time }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                                <span class="pull-left">{{ board.device_name }}</span>
                            <a href="{{ urlFor('delete-dashboard', { id: board.id } ) }}"><span class="pull-right"><i class="fa fa-trash"></i></span></a>
                                <div class="clearfix"></div>
                            </div>
                        <!--<a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">{{ board.device_name }}</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>-->

                    </div>
                </div>

                 {% endif %}



            {% endfor %}

                 </div>

        </div>
        <div class="col-md-2">
            <div class="info-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">ADD MINI</h3>
                </div>
                <div class="panel-body">
                    <form role="form" action="{{ urlFor('addtype.post') }}" method="post" autocomplete="on">
                        <fieldset>

                            <div class="form-group">
                                <label for="type">Device</label>
                                <div class="form-group">
                                    <select name="device-type" id="menu-type" required>
                                        <option value="">Select</option>
                                        {% for dev in device %}
                                            <option value="{{ dev.id_device }}">{{ dev.device_name }}</option>
                                        {% endfor %}
                                    </select>
                                </div>
                                </div>

                            <div class="form-group">
                                <label for="type">Aplication</label>
                                <div class="form-group">
                                    <select name="dt-type" id="menu-type" required>
                                         <option value="">Select</option>
                                       {% for dt in dashboard_type %}
                                            <option value="{{ dt.id }}">{{ dt.name }}</option>
                                        {% endfor %}
                                    </select>
                                </div>
                                </div>


                                <button type="submit" class="btn btn-lg btn-info btn-block">ADD</button>

                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>

{% endblock %}