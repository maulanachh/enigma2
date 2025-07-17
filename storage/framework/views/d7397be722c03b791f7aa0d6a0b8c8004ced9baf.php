

<?php $__env->startSection('css'); ?>
<link href="<?php echo e(asset('dist/plugins/custom/datatables/datatables.bundle.css')); ?>" rel="stylesheet" type="text/css" />

<?php $__env->stopSection(); ?>


<?php $__env->startSection('konten'); ?>
<div class="d-flex flex-column flex-column-fluid">
    <div class="content-wrapper">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Menu Dashboard</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="../../demo1/dist/index.html" class="text-muted text-hover-primary">Home</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Dashboard</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->
        <section class="content">
            <div class="row">
                <div class=" col-lg-6">
                    <div class="card shadow-sm">
                        <div class="card-header collapsible cursor-pointer rotate" data-bs-toggle="collapse" data-bs-target="#icd10series">
                            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">DATA VISUAL KOMPOSISI BILLING PASIEN</h1>
                            <div class="card-toolbar rotate-180">
                                <span class="svg-icon svg-icon-1">
                                    ...
                                </span>
                            </div>
                        </div>
                        <div id="icd10series" class="collapse show">
                            <div class="card-body">
                                <div class="form-group" id="formroleuser">
                                    <div class="row">
                                        <div id="piechart-container" style="width: 1000px; height: 400px;"></div>
                                        <div id="piecharttable" style="width: 900px; height: 100px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" col-lg-6">
                    <div class="card shadow-sm">
                        <div class="card-header collapsible cursor-pointer rotate" data-bs-toggle="collapse" data-bs-target="#icd10series">
                            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">DATA VISUAL 10 DIAGNOSA TERBESAR</h1>
                            <div class="card-toolbar rotate-180">
                                <span class="svg-icon svg-icon-1">
                                    ...
                                </span>
                            </div>
                        </div>
                        <div id="icd10series" class="collapse show">
                            <div class="card-body">
                                <div class="form-group" id="formroleuser">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <input class="form-control" placeholder="Pilih Tanggal Awal" id="tglawal" />
                                        </div>
                                        <div class="col-lg-4">
                                            <input class="form-control" placeholder="Pilih Tanggal Akhir" id="tglakhir" />
                                        </div>
                                        <div class="col-lg-4">
                                            <input type="button" class="btn btn-success" id="btnbatalnaik" onclick="tampilchart()" value="Tampil Chart">
                                        </div>
                                        <div id="coloumnchart" style="width: 1000px; height: 400px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script>
    $("#tglawal").flatpickr();
    $("#tglakhir").flatpickr();
</script>
<script src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    google.charts.load('current', {
        'packages': ['corechart', 'table']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Kriteria');
        data.addColumn('number', 'value');

        fetch("<?php echo e(route('dataset')); ?>")
            .then(response => response.json())
            .then(dataJson => {
                dataJson.forEach(row => {
                    data.addRow([row.kriteria, row.value]);
                });
                var table = new google.visualization.Table(document.getElementById('piecharttable'));
                table.draw(data, {
                    showRowNumber: true,
                    width: '100%',
                    height: '100%'
                });
                var chart = new google.visualization.PieChart(document.getElementById('piechart-container'));
                var options = {
                    legend: {
                        position: 'bottom',
                        alignment: 'center'
                    },
                    colors: dataJson.map(row => row.color),
                    is3D: true
                };
                chart.draw(data, options);
            });
    }
</script>

<script>
    function tampilchart() {
        tglawal = $("#tglawal").val();
        tglakhir = $("#tglakhir").val()
        google.charts.load('current', {
            'packages': ['corechart']
        });

        function drawChart() {
            $.ajax({
                url: "<?php echo e(route('datasetdiagnosa')); ?>",
                type: 'POST',
                dataType: 'json',
                data: {
                    tglawal: tglawal,
                    tglakhir: tglakhir,
                    "_token": "<?php echo e(csrf_token()); ?>"
                },
                success: function(data) {
                    var chartData = [
                        ['Diagnosa', 'Jumlah']
                    ];
                    data.rows.forEach(function(row) {
                        chartData.push([row.c[0].v, row.c[1].v]);
                    });

                    // Convert chart data to DataTable object
                    var dataTable = google.visualization.arrayToDataTable(chartData);
                    console.log(chartData)

                    // Define chart options
                    var options = {
                        legend: {
                            position: 'none'
                        },
                        vAxis: {
                            title: 'Jumlah'
                        },
                        hAxis: {
                            title: 'Diagnosa'
                        }
                    };
                    var chart = new google.visualization.ColumnChart(document.getElementById('coloumnchart'));
                    chart.draw(dataTable, options);
                },
                error: function() {
                    alert('Error fetching chart data!');
                }
            });
        }
        google.charts.setOnLoadCallback(drawChart);
    }
</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\enigma\resources\views/dashboard.blade.php ENDPATH**/ ?>