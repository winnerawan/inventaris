<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset("/img/unipma.png")  }}">
    <title>{{ config('app.name') }}</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset("admin/assets/plugins/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="{{ asset("admin/assets/plugins/chartist-js/dist/chartist.min.css") }}" rel="stylesheet">
    <link href="{{ asset("admin/assets/plugins/chartist-js/dist/chartist-init.css") }}" rel="stylesheet">
    <link href="{{ asset("admin/assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css") }}"
          rel="stylesheet">
    <!-- morris CSS -->
    <link href="{{ asset("admin/assets/plugins/morrisjs/morris.css") }}" rel="stylesheet">
    <!-- Vector CSS -->
    <link href="{{ asset("admin/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css") }}" rel="stylesheet"/>
    <!-- Custom CSS -->
    <link href="{{ asset("admin/css/style.css") }}" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="{{ asset("admin/css/colors/blue.css") }}" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="fix-header fix-sidebar card-no-border">
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
    </svg>
</div>
<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper">
    @include('partials.header')
    @include('partials.sidebar')
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor">Dashboard</h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
            <div>
                <button
                    class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10">
                    <i class="ti-settings text-white"></i></button>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <!-- Row -->
            <!-- Row -->
            <div class="row">
                <div class="col-lg-9 col-xlg-9">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-wrap">
                                <div>
                                    {{--<h4 class="card-title">Analytics Overview</h4>--}}
                                    {{--<h6 class="card-subtitle">Overview of Monthly analytics</h6>--}}
                                </div>
                                <div class="ml-auto align-self-center">
                                    <ul class="list-inline m-b-0">
                                        <li>
                                            <h6 class="text-muted text-success"><i
                                                    class="fa fa-circle font-10 m-r-10 "></i>Baik</h6></li>
                                        <li>
                                            <h6 class="text-muted text-info"><i class="fa fa-circle font-10 m-r-10"></i>Perlu Perbaikan
                                                </h6></li>
                                        <li>
                                            <h6 class="text-muted text-warning"><i class="fa fa-circle font-10 m-r-10"></i>Rusak
                                            </h6></li>
                                    </ul>
                                </div>
                            </div>
                            <div id="chart_condition" class="ecomm-donute" style="height: 315px;!important;"></div>
                            {{--<div class="campaign ct-charts" style="height:305px!important;"></div>--}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="m-b-0"><i class="mdi mdi-buffer text-purple"></i></h4>
                            <h5 class="">{{ $total_barang }}</h5>
                            <h6 class="card-subtitle">Total Barang</h6>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="m-b-0"><i class="mdi mdi-alert text-danger"></i></h4>
                            <h5 class="">{{ $perlu_perbaikan }}</h5>
                            <h6 class="card-subtitle">Barang Perlu Perbaikan</h6>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h4 class="m-b-0"><i class="mdi mdi-server-off text-danger"></i></h4>
                            <h5 class="">{{ $rusak }}</h5>
                            <h6 class="card-subtitle">Barang Rusak</h6>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Row -->
            {{--<div id="morris-area" hidden="hidden" style="height: 405px;"></div>--}}


        </div>

    </div>
</div>


<script src="{{ asset("admin/assets/plugins/jquery/jquery.min.js") }}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{ asset("admin/assets/plugins/bootstrap/js/popper.min.js") }}"></script>
<script src="{{ asset("admin/assets/plugins/bootstrap/js/bootstrap.min.js") }}"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="{{ asset("admin/js/jquery.slimscroll.js") }}"></script>
<!--Wave Effects -->
<script src="{{ asset("admin/js/waves.js") }}"></script>
<!--Menu sidebar -->
<script src="{{ asset("admin/js/sidebarmenu.js") }}"></script>
<!--stickey kit -->
<script src="{{ asset("admin/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js") }}"></script>
<script src="{{ asset("admin/assets/plugins/sparkline/jquery.sparkline.min.js") }}"></script>
<!--stickey kit -->
<script src="{{ asset("admin/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js") }}"></script>
<script src="{{ asset("admin/assets/plugins/sparkline/jquery.sparkline.min.js") }}"></script>
<!--Custom JavaScript -->
<script src="{{ asset("admin/js/custom.min.js") }}"></script>
<!-- ============================================================== -->
<!-- This page plugins -->
<!-- ============================================================== -->
<!-- chartist chart -->
<script src="{{ asset("admin/assets/plugins/chartist-js/dist/chartist.min.js") }}"></script>
<script
    src="{{ asset("admin/assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js") }}"></script>
<!--morris JavaScript -->
<script src="{{ asset("admin/assets/plugins/raphael/raphael-min.js") }}"></script>
<script src="{{ asset("admin/assets/plugins/morrisjs/morris.min.js") }}"></script>
<!-- Vector map JavaScript -->
<script src="{{ asset("admin/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js") }}"></script>
<script src="{{ asset("admin/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js") }}"></script>
<script src="{{ asset("admin/js/dashboard2.js") }}"></script>
<!-- ============================================================== -->
<!-- Style switcher -->
<!-- ============================================================== -->
<script src="{{ asset("admin/assets/plugins/styleswitcher/jQuery.style.switcher.js") }}"></script>
<script src="{{ asset("admin/js/morris-data.js") }}"></script>
<script src="{{ asset("admin/js/charts/echarts/echarts.js") }}" type="text/javascript"></script>
<script src="{{ asset("admin/js/charts/echarts/chart/pie.js") }}" type="text/javascript"></script>
<script src="{{ asset("admin/js/charts/echarts/chart/funnel.js") }}" type="text/javascript"></script>

<script>
    $(document).ready(function () {
        // Set paths
        // ------------------------------

        require.config({
            paths: {
                echarts: '{{ asset("admin/js/charts/echarts") }}'
            }
        });


        // Configuration
        // ------------------------------

        require(
            [
                'echarts',
                'echarts/chart/pie',
                'echarts/chart/funnel'
            ],


            // Charts setup
            function (ec) {

                // Initialize chart
                // ------------------------------
                var topCategoryChart = ec.init(document.getElementById('chart_condition'));


                // Chart Options
                // ------------------------------
                var topCategoryChartOptions = {

                    // Add title
                    title: {
                        text: 'Grafik Kondisi Barang',
                        x: 'center',
                        textStyle: {
                            color: '#333333'
                        },
                        subtextStyle: {
                            color: '#333333'
                        }
                    },

                    // Add custom colors
                    color: ['#37BC9B', '#1976d2', '#ffb22b', '#DA4453', '#818a91'],

                    // Enable drag recalculate
                    calculable: true,

                    // Add series
                    series: [
                        {
                            name: 'Top Categories',
                            type: 'pie',
                            radius: ['40%', '50%'],
                            center: ['50%', '60%'],
                            itemStyle: {
                                normal: {
                                    label: {
                                        show: true,
                                        textStyle: {
                                            color: '#333333'
                                        }
                                    },
                                    labelLine: {
                                        show: true,
                                        lineStyle: {
                                            color: '#333333'
                                        }
                                    }
                                },
                                emphasis: {
                                    label: {
                                        show: true,
                                        formatter: '{b}' + '\n\n' + '{c} ({d}%)',
                                        position: 'center',
                                        textStyle: {
                                            fontSize: '12',
                                            fontWeight: '500'
                                        }
                                    }
                                }
                            },

                            data: @json($pie_data),
                        }
                    ]
                };

                // Apply options
                // ------------------------------

                topCategoryChart.setOption(topCategoryChartOptions);

                // Resize chart
                // ------------------------------

                $(function () {

                    // Resize chart on menu width change and window resize
                    $(window).on('resize', resize);
                    $(".menu-toggle").on('click', resize);

                    // Resize function
                    function resize() {
                        setTimeout(function () {

                            // Resize chart
                            topCategoryChart.resize();
                        }, 200);
                    }
                });
            }
        );
    });
</script>
</body>

</html>
