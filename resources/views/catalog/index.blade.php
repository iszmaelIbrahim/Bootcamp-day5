@extends('layouts.base')

@section('content')


<div class="container pt-4">
    <div class="row">
        <div class="col">
            <div class="card card-frame">
                <div class="card-body">
                    <div class="card-title">Total</div>

                    <div class="col-12 mx-auto">
                        <h5 class="text-info mb-0">750</h5>
                        <small>Projects</small>
                    </div>
                </div>
            </div>

        </div>
        <div class="col">
            <div class="card card-frame">
                <div class="card-body">
                    <div class="card-title">Total New Data</div>

                    <div class="col-12 mx-auto">
                        <h5 class="text-info mb-0">960</h5>
                        <small>Projects</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row pt-4">

        <div class="card card-frame">

            <div class="card-header">
                <h5>Add Data Catalog</h5>
            </div>
            <div class="card-body">
                <div class="col">
                    <form method="POST" action="/catalog">
                        @csrf

                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Name</label>
                            <input class="form-control" type="text" name="nama">
                        </div>
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Pemilik</label>
                            <input class="form-control" type="text" name="pemilik">
                        </div>

                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Tag</label>
                            <input class="form-control" type="text" name="tag">
                        </div>

                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Jenis</label>
                            <input class="form-control" type="text" name="jenis">
                        </div>

                        <button class="btn btn-primary" type="submit">Submit</button>

                    </form>
                </div>
            </div>
        </div>

    </div>

    <div class="row pt-4">
        <div class="card card-frame">

            <div class="card-header">
                <h5>Data Catalog</h5>
            </div>
            <div class="card-body">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Fail</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Pemilik</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tag</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jenis</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($catalogs as $catalog)
                                <tr>
                                    <td class="text-center"> {{$catalog->nama}}</td>
                                    <td class="text-center"> {{$catalog->pemilik}}</td>
                                    <td class="text-center"> {{$catalog->tag}}</td>
                                    <td class="text-center"> {{$catalog->jenis}}</td>
                                    <td class="text-center">
                                        <a class="btn btn-icon btn-2 btn-primary" type="button" href="{{ URL::to('catalog/' . $catalog->id) }}">
                                            <span class="btn-inner--icon"><i class="far fa-edit"></i></span>
                                        </a>
                                        
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <div class="row pt-4">
            <div class="col pl-0">
                <div class="card card-frame">
                    <div class="card-header">
                        <h5>Trend</h5>
                    </div>
                    <div class="card-body">
                        <!-- HTML -->
                        <div id="chartdiv"></div>
                    </div>
                </div>
            </div>
            <div class="col pr-0">
                <div class="card card-frame">
                    <div class="card-header">
                        <h5>Trend</h5>
                    </div>
                    <div class="card-body">
                        <!-- HTML -->
                        <div id="chartdiv2"></div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

<!-- Styles -->
<style>
    #chartdiv {
        width: 100%;
        height: 300px;
    }

    #chartdiv2 {
        width: 100%;
        height: 300px;
    }
</style>

<!-- datatable -->
<script src="../../assets/js/plugins/datatables.js"></script>
<!-- Resources -->
<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

<!-- Chart code -->
<script>
    am4core.ready(function() {

        // Themes begin
        am4core.useTheme(am4themes_animated);
        // Themes end

        // Create chart instance
        var chart = am4core.create("chartdiv", am4charts.XYChart);

        // Add data
        chart.data = [{
            "country": "USA",
            "visits": 2025
        }, {
            "country": "China",
            "visits": 1882
        }, {
            "country": "Japan",
            "visits": 1809
        }, {
            "country": "Germany",
            "visits": 1322
        }, {
            "country": "UK",
            "visits": 1122
        }, {
            "country": "France",
            "visits": 1114
        }, {
            "country": "India",
            "visits": 984
        }, {
            "country": "Spain",
            "visits": 711
        }, {
            "country": "Netherlands",
            "visits": 665
        }, {
            "country": "Russia",
            "visits": 580
        }, {
            "country": "South Korea",
            "visits": 443
        }, {
            "country": "Canada",
            "visits": 441
        }, {
            "country": "Brazil",
            "visits": 395
        }];

        // Create axes

        var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
        categoryAxis.dataFields.category = "country";
        categoryAxis.renderer.grid.template.location = 0;
        categoryAxis.renderer.minGridDistance = 30;

        categoryAxis.renderer.labels.template.adapter.add("dy", function(dy, target) {
            if (target.dataItem && target.dataItem.index & 2 == 2) {
                return dy + 25;
            }
            return dy;
        });

        var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

        // Create series
        var series = chart.series.push(new am4charts.ColumnSeries());
        series.dataFields.valueY = "visits";
        series.dataFields.categoryX = "country";
        series.name = "Visits";
        series.columns.template.tooltipText = "{categoryX}: [bold]{valueY}[/]";
        series.columns.template.fillOpacity = .8;

        var columnTemplate = series.columns.template;
        columnTemplate.strokeWidth = 2;
        columnTemplate.strokeOpacity = 1;

    }); // end am4core.ready()
</script>

<script>
    am4core.ready(function() {

        // Themes begin
        am4core.useTheme(am4themes_animated);
        // Themes end

        // Create chart instance
        var chart = am4core.create("chartdiv2", am4charts.PieChart);

        // Add data
        chart.data = [{
            "country": "Lithuania",
            "litres": 501.9
        }, {
            "country": "Czechia",
            "litres": 301.9
        }, {
            "country": "Ireland",
            "litres": 201.1
        }, {
            "country": "Germany",
            "litres": 165.8
        }, {
            "country": "Australia",
            "litres": 139.9
        }, {
            "country": "Austria",
            "litres": 128.3
        }, {
            "country": "UK",
            "litres": 99
        }];

        // Add and configure Series
        var pieSeries = chart.series.push(new am4charts.PieSeries());
        pieSeries.dataFields.value = "litres";
        pieSeries.dataFields.category = "country";
        pieSeries.slices.template.stroke = am4core.color("#fff");
        pieSeries.slices.template.strokeOpacity = 1;

        // This creates initial animation
        pieSeries.hiddenState.properties.opacity = 1;
        pieSeries.hiddenState.properties.endAngle = -90;
        pieSeries.hiddenState.properties.startAngle = -90;

        chart.hiddenState.properties.radius = am4core.percent(0);


    }); // end am4core.ready()
</script>




@stop