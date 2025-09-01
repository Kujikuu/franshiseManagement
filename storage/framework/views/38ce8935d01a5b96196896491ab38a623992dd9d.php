<?php $__env->startSection('styles'); ?>
    <style>

        .datatable-head  .datatable-cell span{

            text-transform: uppercase;
            color: #B5B5C3 !important;
        }

        .datatable.datatable-default > .datatable-table > .datatable-head .datatable-row >
        .datatable-cell.datatable-cell-sort, .datatable.datatable-default > .datatable-table >
        .datatable-body .datatable-row > .datatable-cell.datatable-cell-sort, .datatable.datatable-default >
        .datatable-table > .datatable-foot .datatable-row > .datatable-cell.datatable-cell-sort
        {

            white-space: nowrap;
        }
        .datatable.datatable-default > .datatable-table{

            overflow-x: scroll;

        }

        .card-custom{
            transition: all 0.3s ease;  ;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!--begin::Subheader-->
    <div class="container subheader py-3 py-lg-8 subheader-transparent" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h2 style="color: #3a384e" class="d-flex align-items-center  font-weight-bolder my-1 mr-3">
                         Performance Management </h2>
                    <!--end::Page Title-->
                </div>
                <!--end::Page Heading-->
            </div>
            <!--end::Info-->
            <!--begin::Toolbar-->
            <div class="d-flex align-items-center flex-wrap">
                <!--begin::Button-->

            <?php echo $__env->make('layouts.profile_button', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <!--end::Button-->
            </div>
            <!--end::Toolbar-->
        </div>
    </div>
    <!--end::Subheader-->
    <!--begin::Entry-->
    <div class="container">
        <div class="h3 text-center">

            <?php if($errors->any()): ?>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <span class="text-danger" role="alert">
                        <strong style="font-size: 13px; font-weight: 400;"><?php echo e($error); ?></strong><br>
                    </span>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <br>
        <div class="row ">

            <div style="direction: ltr" class="col-xl-12 mt-5">
                <div class="col-xxl-12">
                    <div class="card card-custom gutter-b">
                        <div class="card-header">
                            <div class="card-title">
                                <h3 class="card-label">  Performance Management</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="kt_amcharts_2" style="height: 500px;"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 mt-5">
                <div class="col-xxl-12">
                    <div class="card card-custom gutter-b">
                        <div class="card-header">
                            <div class="card-title">
                                <h3 class="card-label">
                                    Total Sales location
                                </h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="kt_amcharts_1" style="height: 500px;"></div>

                        </div>


                    </div>
                </div>
            </div>

            <div class="col-xl-6 mt-5">


                <div class="col-xxl-12">
                    <div class="card card-custom gutter-b">
                        <div class="card-header">
                            <div class="card-title">
                                <h3 class="card-label">
                                     Top Performing Locations

                                </h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <!--begin::Chart-->
                            <div id="chart_11" class="d-flex justify-content-center"></div>
                            <!--end::Chart-->
                        </div>

                    </div>
                </div>
            </div>
        </div>


    </div>

    <!--end::Entry-->
<?php $__env->stopSection(); ?>



<?php $__env->startSection('scripts'); ?>
    <!--begin::Page Vendors(used by this page)-->
    <script src="//www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="//www.amcharts.com/lib/3/serial.js"></script>
    <script src="//www.amcharts.com/lib/3/radar.js"></script>
    <script src="//www.amcharts.com/lib/3/amstock.js"></script>

    <script src="//www.amcharts.com/lib/3/pie.js"></script>
    <script src="//www.amcharts.com/lib/3/plugins/tools/polarScatter/polarScatter.min.js"></script>
    <script src="//www.amcharts.com/lib/3/plugins/animate/animate.min.js"></script>
    <script src="//www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
    <script src="//www.amcharts.com/lib/3/themes/light.js"></script>


    <script>
        // Shared Colors Definition
        const primary = '#6993FF';
        const success = '#1BC5BD';
        const info = '#8950FC';
        const warning = '#FFA800';
        const danger = '#F64E60';

        // Class definition
        function generateBubbleData(baseval, count, yrange) {
            var i = 0;
            var series = [];
            while (i < count) {
                var x = Math.floor(Math.random() * (750 - 1 + 1)) + 1;;
                var y = Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min;
                var z = Math.floor(Math.random() * (75 - 15 + 1)) + 15;

                series.push([x, y, z]);
                baseval += 86400000;
                i++;
            }
            return series;
        }

        function generateData(count, yrange) {
            var i = 0;
            var series = [];
            while (i < count) {
                var x = 'w' + (i + 1).toString();
                var y = Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min;

                series.push({
                    x: x,
                    y: y
                });
                i++;
            }
            return series;
        }


        var KTamChartsChartsDemo = function() {

            var _demo11 = function () {
                const apexChart = "#chart_11";
                var options = {
                    series: [44, 55, 41, 17, 15],
                    chart: {
                        width: 380,
                        type: 'donut',
                    },
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            chart: {
                                width: 200
                            },
                            legend: {
                                position: 'bottom'
                            }
                        }
                    }],
                    colors: [primary, success, warning, danger, info]
                };

                var chart = new ApexCharts(document.querySelector(apexChart), options);
                chart.render();
            }

            // Private functions
            var demo1 = function() {
                var chart = AmCharts.makeChart("kt_amcharts_1", {
                    "rtl": KTUtil.isRTL(),
                    "type": "serial",
                    "theme": "light",
                    "dataProvider": [{
                        "country": "Abu Dhabi",
                        "visits": 2025
                    }, {
                        "country": "Dubai",
                        "visits": 1882
                    }, {
                        "country": "Sharjah",
                        "visits": 1809
                    }, {
                        "country": "Ajman",
                        "visits": 1322
                    }, {
                        "country": "Riyadh",
                        "visits": 1122
                    }, {
                        "country": "Mecca",
                        "visits": 1114
                    }, {
                        "country": "India",
                        "visits": 984
                    },],
                    "valueAxes": [{
                        "gridColor": "#FFFFFF",
                        "gridAlpha": 0.2,
                        "dashLength": 0
                    }],
                    "gridAboveGraphs": true,
                    "startDuration": 1,
                    "graphs": [{
                        "balloonText": "[[category]]: <b>[[value]]</b>",
                        "fillAlphas": 0.8,
                        "lineAlpha": 0.2,
                        "type": "column",
                        "valueField": "visits"
                    }],
                    "chartCursor": {
                        "categoryBalloonEnabled": false,
                        "cursorAlpha": 0,
                        "zoomable": false
                    },
                    "categoryField": "country",
                    "categoryAxis": {
                        "gridPosition": "start",
                        "gridAlpha": 0,
                        "tickPosition": "start",
                        "tickLength": 20
                    },
                    "export": {
                        "enabled": false
                    }

                });
            }

            // Private functions
            var demo2 = function() {
                var chartData1 = [];
                var chartData2 = [];
                var chartData3 = [];
                var chartData4 = [];

                generateChartData();

                function generateChartData() {
                    var firstDate = new Date();
                    firstDate.setDate(firstDate.getDate() - 500);
                    firstDate.setHours(0, 0, 0, 0);

                    for (var i = 0; i < 500; i++) {
                        var newDate = new Date(firstDate);
                        newDate.setDate(newDate.getDate() + i);

                        var a1 = Math.round(Math.random() * (40 + i)) + 100 + i;
                        var b1 = Math.round(Math.random() * (1000 + i)) + 500 + i * 2;

                        var a2 = Math.round(Math.random() * (100 + i)) + 200 + i;
                        var b2 = Math.round(Math.random() * (1000 + i)) + 600 + i * 2;

                        var a3 = Math.round(Math.random() * (100 + i)) + 200;
                        var b3 = Math.round(Math.random() * (1000 + i)) + 600 + i * 2;

                        var a4 = Math.round(Math.random() * (100 + i)) + 200 + i;
                        var b4 = Math.round(Math.random() * (100 + i)) + 600 + i;

                        chartData1.push({
                            "date": newDate,
                            "value": a1,
                            "volume": b1
                        });
                        chartData2.push({
                            "date": newDate,
                            "value": a2,
                            "volume": b2
                        });
                        chartData3.push({
                            "date": newDate,
                            "value": a3,
                            "volume": b3
                        });
                        chartData4.push({
                            "date": newDate,
                            "value": a4,
                            "volume": b4
                        });
                    }
                }

                var chart = AmCharts.makeChart("kt_amcharts_2", {
                    "rtl": KTUtil.isRTL(),
                    "type": "stock",
                    "theme": "light",
                    "dataSets": [{
                        "title": "first data set",
                        "fieldMappings": [{
                            "fromField": "value",
                            "toField": "value"
                        }, {
                            "fromField": "volume",
                            "toField": "volume"
                        }],
                        "dataProvider": chartData1,
                        "categoryField": "date"
                    }, {
                        "title": "second data set",
                        "fieldMappings": [{
                            "fromField": "value",
                            "toField": "value"
                        }, {
                            "fromField": "volume",
                            "toField": "volume"
                        }],
                        "dataProvider": chartData2,
                        "categoryField": "date"
                    }, {
                        "title": "third data set",
                        "fieldMappings": [{
                            "fromField": "value",
                            "toField": "value"
                        }, {
                            "fromField": "volume",
                            "toField": "volume"
                        }],
                        "dataProvider": chartData3,
                        "categoryField": "date"
                    }, {
                        "title": "fourth data set",
                        "fieldMappings": [{
                            "fromField": "value",
                            "toField": "value"
                        }, {
                            "fromField": "volume",
                            "toField": "volume"
                        }],
                        "dataProvider": chartData4,
                        "categoryField": "date"
                    }],

                    "panels": [{
                        "showCategoryAxis": false,
                        "title": "Value",
                        "percentHeight": 70,
                        "stockGraphs": [{
                            "id": "g1",
                            "valueField": "value",
                            "comparable": true,
                            "compareField": "value",
                            "balloonText": "[[title]]:<b>[[value]]</b>",
                            "compareGraphBalloonText": "[[title]]:<b>[[value]]</b>"
                        }],
                        "stockLegend": {
                            "periodValueTextComparing": "[[percents.value.close]]%",
                            "periodValueTextRegular": "[[value.close]]"
                        }
                    }, {
                        "title": "Volume",
                        "percentHeight": 30,
                        "stockGraphs": [{
                            "valueField": "volume",
                            "type": "column",
                            "showBalloon": false,
                            "fillAlphas": 1
                        }],
                        "stockLegend": {
                            "periodValueTextRegular": "[[value.close]]"
                        }
                    }],

                    "chartScrollbarSettings": {
                        "graph": "g1"
                    },

                    "chartCursorSettings": {
                        "valueBalloonsEnabled": true,
                        "fullWidth": true,
                        "cursorAlpha": 0.1,
                        "valueLineBalloonEnabled": true,
                        "valueLineEnabled": true,
                        "valueLineAlpha": 0.5
                    },

                    "periodSelector": {
                        "position": "left",
                        "periods": [{
                            "period": "MM",
                            "selected": true,
                            "count": 1,
                            "label": "1 month"
                        }, {
                            "period": "YYYY",
                            "count": 1,
                            "label": "1 year"
                        }, {
                            "period": "YTD",
                            "label": "YTD"
                        }, {
                            "period": "MAX",
                            "label": "MAX"
                        }]
                    },

                    "dataSetSelector": {
                        "position": "left"
                    },

                    "export": {
                        "enabled": false
                    }
                });
            }

            return {
                // public functions
                init: function() {
                    demo1();
                    demo2();
                    _demo11();
                }
            };
        }();

        jQuery(document).ready(function() {
            KTamChartsChartsDemo.init();
        });


    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel pros\franshiseManagement\resources\views/dashboard/performance.blade.php ENDPATH**/ ?>