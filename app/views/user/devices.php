{% extends 'templates/default.php' %}

{% block title %} {{ device.device_name }} - device overview {% endblock %}

{% block content %}
<title>Title</title>

<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4>Device name: {{ device.device_name }}</h4>
                Device created: {{ device.created_at }}
            </div>
            <a href="#">
                <div class="panel-footer">
                    <span class="pull-left">Device type: <strong>{{ type.device_name }} </strong> | Device unit: <strong>{{ unit }}</strong></span>

                    <div class="clearfix"></div>

                    <span class="pull-left"></span>

                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-thermometer-quarter  fa-4x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">{{ min }} {{ unit }}</div>
                        <div>Minimal value</div>
                    </div>
                </div>
            </div>
            <a href="test">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-thermometer-half fa-4x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">{{ avg }} {{ unit }}</div>
                        <div>Average value</div>
                    </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>

                </div>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-thermometer-full fa-4x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">{{ max }} {{ unit }}</div>
                        <div>Maximal value</div>
                    </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <!--  stranka  -->

    <!-- /.row -->

    <div class="row">

        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-area-chart"></i> Area Chart {{ week[1].device_val }}</h3>
                </div>
                <div class="panel-body">
                    <div id="myfirstchart" style="height: 250px;">

                        <script>
                            var a = {{tab | raw}};
                            new Morris.Line({
                                // ID of the element in which to draw the chart.
                                element: 'myfirstchart',
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
        </div>
    </div>
</div>
<!-- /.row -->


<div class="row">
    <div class="col-lg-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-pie-chart"></i> Donut Chart</h3>
            </div>
            <div class="panel-body">

                <div id="donut-example"></div>
                <div id="legend" class="donut-legend"></div>
                <script>
                    var color_array = ['#03658C', '#F2594A', '#f2a13c', '#7b387e', '#36AFB2', '#9c6db2', '#d24a67', '#89a958', '#00739a', '#BDBDBD'];
                    var browsersChart = Morris.Donut({

                        element: 'donut-example',
                        data: [
                            {label: "Created today", value: {{ today | raw }}},
                    {label: "Last week ", value: {{ week | length }}},

                    {label: "Total ", value: {{ total | raw }}},
                    ],
                    colors: color_array
                    });

                    browsersChart.options.data.forEach(function(label, i) {
                        var legendItem = $('<span></span>').text( label['label'] + " ( " +label['value'] + " )" ).prepend('<br><span>&nbsp;</span>');
                        legendItem.find('span')
                            .css('backgroundColor', browsersChart.options.colors[i])
                            .css('width', '20px')
                            .css('display', 'inline-block')
                            .css('margin', '5px');
                        $('#legend').append(legendItem)
                    });
                </script>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-info fa-fw"></i> Info Panel</h3>
            </div>
            <div class="panel-body">

                <table class="table">
                    <tr>
                        <td>Device name</td>
                        <td>{{ device_info[0].device_name }}</td>
                    </tr>


                    <tr>
                        <td>Owner</td>
                        <td>{{ auth.name }}</td>
                    </tr>
                </table>

                <div class="list-group">
                </div>
                <div class="list-group-item">
                    <span class="badge">0e25c084bb8a1882be8bf54e842d6c16</span>
                    <i class="fa fa-fw fa-key"></i> API key
                </div>
                <div class="list-group-item">
                    <span class="badge">{{ device_info[0].id_device }}</span>
                    <i class="fa fa-tag"></i> Device #ID
                </div>

                <div class="list-group-item">
                    <span class="badge">{{ device_info[0].created_at }}</span>
                    <i class="fa fa-calendar-plus-o"></i> Created at
                </div>
                <div class="list-group-item">
                    <span class="badge">{{ device_info[0].updated_at }}</span>
                    <i class="fa fa-fw fa-calendar"></i> Latest update
                </div>
                <div class="list-group-item">
                    <span class="badge">{{ device_info[0].type_name }}</span>
                    <i class="fa fa-fw fa-tasks"></i> Type
                </div>
                <div class="list-group-item">
                    <span class="badge">{{ today | raw }}</span>
                    <i class="fa fa-fw fa-battery-1"></i> Created today
                </div>
                <div class="list-group-item">
                    <span class="badge">{{ week | length }}</span>
                    <i class="fa fa-fw fa-battery-2"></i> Created last week
                </div>
                <div class="list-group-item">
                    <span class="badge">{{ total | raw }}</span>
                    <i class="fa fa-fw fa-battery-4"></i> Created total
                </div>
                    <div class="list-group-item">
                        <span class="badge">{{ 'now'|date('Y-d-m H:i:s ') }}</span>
                        <i class="fa fa-fw fa-cog"></i> Generated
                    </div>
                </div>

        </div>
    </div>
    <div class="col-lg-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="glyphicon glyphicon-time"></i> Latest arrived values</h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Value</th>
                        </tr>
                        </thead>
                        <tbody>
                        {% for dev in dev_val %}
                        <tr>
                            <td>{{ dev.id }}</td>
                            <td>{{ dev.created_at | slice(0,10) }}</td>
                            <td>{{ dev.created_at | slice(11,18)}}</td>
                            <td>{{ dev.device_val }}</td>
                        </tr>
                        {% endfor %}

                        </tbody>
                    </table>
                </div>
                <div class="text-right">
                    <a href="#example">View All Values <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- /.row -->
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-table"></i> Device values</h3>
    </div>
    <div class="panel-body">

        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>ID</th>
                <th>Date</th>
                <th>Time</th>
                <th>Value</th>

            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>ID</th>
                <th>Date</th>
                <th>Time</th>
                <th>Value</th>

            </tr>
            </tfoot>
            <tbody>
            {% for dev_all in all %}
            <tr>
                <td>{{ dev_all.id }}</td>
                <td>{{ dev_all.created_at | slice(0,10) }}</td>
                <td>{{ dev_all.created_at | slice(11,18)}}</td>
                <td>{{ dev_all.device_val }}</td>
            </tr>
            {% endfor %}

            </tbody>
        </table>

        <script>
            $(document).ready(function() {
                $('#example').DataTable();
            } );
        </script>
    </div>
</div>
<!-- /.row -->

</div>
</div>



{% endblock %}