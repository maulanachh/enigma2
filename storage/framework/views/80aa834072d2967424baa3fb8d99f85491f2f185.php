

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
                            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">CHART KOMPOSISI BILLING PASIEN</h1>
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
                                        <div class="row text-center col-md-12">
                                            <div class="col-md-8">
                                                <select class="form-select" data-control="select2" id="selunit"></select>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="submit" class="btn btn-success" id="btnsave" onclick="tampilchart()" value="APPLY FILTER">
                                            </div>
                                        </div>
                                        <div id="chart-container" style="width: 1000px; height: 400px;"></div>
                                        <div id="table_div" style="width: 900px; height: 100px;"></div>
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
                                            <input type="button" class="btn btn-success" id="btnbatalnaik" onclick="tampilchartdiagnosa()" value="Tampil Chart">
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
<script src="https://www.gstatic.com/charts/loader.js"></script>
<script>
    $("#tglawal").flatpickr();
    $("#tglakhir").flatpickr();
</script>
<script>
    $(document).ready(function() {
        $("#selunit").select2({
            placeholder: "Pilih Unit",
            allowClear: true,
            ajax: {
                url: "<?php echo e(route('pilihunitmanaj')); ?>",
                dataType: 'json',
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                },
                data: function(params) {
                    return {
                        search: params.term
                    };
                },
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.nama,
                                id: item.kode1,
                            }
                        })
                    }
                }
            }
        });
    });
</script>
<script>
    function tampilchart() {
        $.ajax({
            url: "<?php echo e(route('datasetmrs')); ?>",
            type: 'POST',
            data: {
                kode1: $('#selunit').val(),
                "_token": "<?php echo e(csrf_token()); ?>"
            },
            success: function(res) {
                google.charts.load('current', {
                    'packages': ['corechart', 'table']
                });
                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {
                    var data = new google.visualization.DataTable(res);
                    // console.log(res)
                    data.addColumn('string', 'Kriteria');
                    data.addColumn('number', 'value');
                    res.forEach(row => {
                        data.addRow([row.kriteria, row.value]);
                    });
                    console.log(res)
                    var table = new google.visualization.Table(document.getElementById('table_div'));
                    table.draw(data, {
                        showRowNumber: true,
                        width: '100%',
                        height: '100%'
                    });
                    var chart = new google.visualization.PieChart(document.getElementById('chart-container'));
                    var options = {
                        title: 'CHART KOMPOSISI BILLING PASIEN',
                        legend: {
                            position: 'bottom',
                            alignment: 'center'
                        },
                        colors: res.map(row => row.color),
                        is3D: true
                    };
                    chart.draw(data, options);

                }
            },

        })
    };
</script>
<script>
    $(document).ready(function() {
        $('#selchart').on("change", function(e) {
            katchart = $('#selchart').val();
            if (katchart == 1) {
                tampilchart()
            }
        })
    });
</script>
<script>
    function tampilchartdiagnosa() {
        tglawal = $("#tglawal").val();
        tglakhir = $("#tglakhir").val();
        kode1 = $('#selunit').val();
        google.charts.load('current', {
            'packages': ['corechart']
        });

        function drawChart() {
            $.ajax({
                url: "<?php echo e(route('datasetdiagnosamanaj')); ?>",
                type: 'POST',
                dataType: 'json',
                data: {
                    tglawal: tglawal,
                    tglakhir: tglakhir,
                    kode1: kode1,
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
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\enigma\resources\views/dashboardmanaj.blade.php ENDPATH**/ ?>