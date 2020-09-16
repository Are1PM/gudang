<html>

<head>
    <style type="text/css">
        div#content {
            float: center;
            padding: 0px 0 15px 0;
            margin: 70px 50px 0 50px;
            background-color: #FFF;
        }
    </style>
</head>

<body>
    <center>
        <div id="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">
                                Grafik Data Barang
                            </h2>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>

                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <div class="height-400">
                                    <canvas id="column-chart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </center>
    <?php
    include "../koneksi.php";

    $q = "SELECT nama_brg, jumlah_masuk FROM `barang`";
    $ambil = mysqli_query($Open, $q);

    while ($hasil = mysqli_fetch_array($ambil)) {
        $brg[] = $hasil['nama_brg'];
        $jumlah[] = $hasil['jumlah_masuk'];
    }


    ?>
    <script src="../assets/vendor/js/vendors.min.js"></script>
    <script src="../assets/charts/chart.min.js" type="text/javascript"></script>
    <script src="../assets/charts/chartist.min.js" type="text/javascript"></script>
    <script>
        $(window).on("load", function() {

            //Get the context of the Chart canvas element we want to select
            var ctx = $("#column-chart");

            // Chart Options
            var chartOptions = {
                // Elements options apply to all of the options unless overridden in a dataset
                // In this case, we are setting the border of each bar to be 2px wide and green
                elements: {
                    rectangle: {
                        borderWidth: 2,
                        borderColor: '#50565c',
                        borderSkipped: 'left'
                    }
                },
                responsive: true,
                maintainAspectRatio: false,
                responsiveAnimationDuration: 500,
                legend: {
                    position: 'top',
                },
                scales: {
                    xAxes: [{
                        display: true,
                        gridLines: {
                            color: "#50565c",
                            drawTicks: false,
                        },
                        scaleLabel: {
                            display: true,
                        }
                    }],
                    yAxes: [{
                        display: true,
                        gridLines: {
                            color: "#50565c",
                            drawTicks: false,
                        },
                        scaleLabel: {
                            display: true,
                        }
                    }]
                },
                title: {
                    display: false,
                    text: 'Chart.js Bar Chart'
                }
            };

            // Chart Data
            var chartData = {
                labels: ["<?= implode('   ","', $brg); ?>   "],
                datasets: [{
                    label: "Jumlah",
                    data: [<?= implode(',', $jumlah); ?>],
                    backgroundColor: "#28D094",
                    hoverBackgroundColor: "rgba(40,208,148,.9)",
                    borderColor: "transparent"
                }]
            };

            var config = {
                type: 'horizontalBar',
                // type: 'bar',

                // Chart Options
                options: chartOptions,

                data: chartData
            };

            // Create the chart
            var lineChart = new Chart(ctx, config);
        });
    </script>
</body>

</html>
