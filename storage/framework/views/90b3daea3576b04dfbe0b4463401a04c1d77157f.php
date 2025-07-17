

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
                        Menu List Billing</h1>
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
                        <li class="breadcrumb-item text-muted">Historical Billing Closed</li>
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
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <div class=" col-lg-12">
                    <div class="card shadow-sm">
                        <div class="card-header collapsible cursor-pointer rotate" data-bs-toggle="collapse" data-bs-target="#tbdatabilling2">
                            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">TABLE LIST BILLING CLOSED</h1>
                            <div class="card-toolbar rotate-180">
                                <span class="svg-icon svg-icon-1">
                                    ...
                                </span>
                            </div>
                        </div>
                        <div id="tbdatabilling2" class="collapse show">
                            <div class="card-body">
                                <table id="tbdatabilling" class="table table-striped table-row-bordered gy-5 gs-7 border rounded display nowrap" width="100%">
                                    <thead>
                                        <tr class="fw-bold fs-6 text-gray-800 px-7">
                                            <th>Nomer Registrasi</th>
                                            <th>Nama Pasien</th>
                                            <th>Indikator Billing</th>
                                            <th>Plafon InaCBG'S </th>
                                            <th>Total Billing RS </th>
                                            <th>Persentase Billing => Plafon </th>
                                            <th>selisih Billing & Plafon </th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
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

<script src="<?php echo e(asset('dist/plugins/custom/datatables/datatables.bundle.js')); ?>"></script>
<script>
    jQuery(document).ready(function($) {
        $('#tbdatabilling thead tr').clone(true).appendTo('#tbdatabilling thead');
        $('#tbdatabilling thead tr:eq(1) th').each(function(i) {
            var title = $(this).text();
            $(this).html('<input type="text" placeholder="Search ' + title + '" />');
            $('input', this).on('keyup change', function() {
                if (table.column(i).search() !== this.value) {
                    table
                        .column(i)
                        .search(this.value)
                        .draw();
                }
            });
        });
        var table = $('#tbdatabilling').DataTable({
            orderCellsTop: true,
            fixedHeader: true,
            processing: true,
            responseive: true,
            serverSide: true,
            searching: true,
            scrollY: "400px",
            scrollX: true,
            scrollCollapse: true,
            autoWidth: true,
            "order": [
                [0, "asc"]
            ],
            ajax: {
                url: "/historicalbilling/dataset",
                'type': 'POST',
                'headers': {
                    'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                }
            },
            columns: [
                {
                    data: 'nori',
                    className: "text-center"
                },
                {
                    data: 'nama',
                },
                {
                    data: 'persentase',
                    render: function(data) {
                        if (data < 75) {
                            return '<div class="progress mb-3"><div class="progress-bar bg-success" role="progressbar" aria-valuenow="' + data + '" aria-valuemin="0" aria-valuemax="100" style="width: ' + data + '%"></div></div>';
                        } else if (data >= 75 && data <= 85) {
                            return '<div class="progress mb-3"><div class="progress-bar bg-warning" role="progressbar" aria-valuenow="' + data + '" aria-valuemin="0" aria-valuemax="100" style="width: ' + data + '%"></div></div>';
                        } else if (data > 85 || data > 100) {
                            return '<div class="progress mb-3"><div class="progress-bar bg-danger" role="progressbar" aria-valuenow="' + data + '" aria-valuemin="0" aria-valuemax="100" style="width: ' + data + '%"></div></div>';
                        } else if (parseInt(data) === 0) {
                            return '<div class="progress mb-3"><div class="progress-bar bg-primary" role="progressbar" aria-valuenow= 100 aria-valuemin="100" aria-valuemax="100" style="width: 100%"></div></div>';
                        }
                    },

                },
                {
                    data: 'tarif_inacbg',
                    render: $.fn.dataTable.render.number(',', '.', 2, 'Rp '),
                    className: "text-center"
                },
                {
                    data: 'total_billing',
                    render: $.fn.dataTable.render.number(',', '.', 2, 'Rp '),
                    className: "text-center"
                },
                {
                    data: 'persentase',
                    render: function(data, type, row, meta) {
                        return +data + ' %';
                    },
                    className: "text-center"
                },
                {
                    data: 'selisih_billing',
                    render: $.fn.dataTable.render.number(',', '.', 2, 'Rp '),
                    className: "text-center"
                }
            ],


        });
        // Formatting function for row details
        function format(d) {
            // `d` is the original data object for the row
            return '<table class="table table-bordered" cellpadding="3" cellspacing="0" border="0" style="padding-left:50px;">' +
                '<tr>' +
                '<th><span class="badge badge-dark">DOKTER :</span>&nbsp&nbsp' + '<span class="badge badge-primary">' + d.nmdokter + '</span>' +
                '&nbsp&nbsp<span class="badge badge-dark">SPESIALIS :</span>&nbsp&nbsp' + '<span class="badge badge-primary">' + d.nmahli + '</span>' + '</th>' +
                '</tr>' +
                '</table>' +
                '<table class="table table-bordered" cellpadding="3" cellspacing="0" border="0" style="padding-left:50px;">' +
                '<tr>' +
                '<th><span class="badge badge-dark">KONSUMEN/PENJAMIN :</span>&nbsp&nbsp' + '<span class="badge badge-primary">' + d.nm_konsumen + '</span>' + '</th>' +
                '</tr>' + '<tr>' +
                '<th><span class="badge badge-dark">UMUR :</span>&nbsp&nbsp' + '<span class="badge badge-primary">' + d.umur + '</span>' +
                '&nbsp&nbsp<span class="badge badge-dark">GOLONGAN UMUR :</span>&nbsp&nbsp' + '<span class="badge badge-primary">' + d.gol_umur + '</span>' + '</th>' +
                '</tr>' +
                '</table>' +
                '<table class="table table-bordered" cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
                '<tr>' +
                '<th><span class="badge badge-dark">ICD 10 Ke 1 :</span>&nbsp&nbsp' + '<span class="badge badge-primary">' + d.icd10_1 + '</span>' + '</th>' +
                '<th><span class="badge badge-dark">ICD 10 Ke 2 :</span>&nbsp&nbsp' + '<span class="badge badge-primary">' + d.icd10_2 + '</span>' + '</th>' +
                '<th><span class="badge badge-dark">ICD 10 Ke 3 :</span>&nbsp&nbsp' + '<span class="badge badge-primary">' + d.icd10_3 + '</span>' + '</th>' +
                '<th><span class="badge badge-dark">ICD 10 Ke 4 :</span>&nbsp&nbsp' + '<span class="badge badge-primary">' + d.icd10_4 + '</span>' + '</th>' +
                '<th><span class="badge badge-dark">ICD 10 Ke 5 :</span>&nbsp&nbsp' + '<span class="badge badge-primary">' + d.icd10_5 + '</span>' + '</th>' +
                '<th><span class="badge badge-circle badge-dark"></span></th>' +
                '<th><span class="badge badge-dark">ICD 9 Ke 1 :</span>&nbsp&nbsp' + '<span class="badge badge-primary">' + d.icd9_1 + '</span>' + '</th>' +
                '<th><span class="badge badge-dark">ICD 9 Ke 2 :</span>&nbsp&nbsp' + '<span class="badge badge-primary">' + d.icd9_2 + '</span>' + '</th>' +
                '<th><span class="badge badge-dark">ICD 9 Ke 3 :</span>&nbsp&nbsp' + '<span class="badge badge-primary">' + d.icd9_3 + '</span>' + '</th>' +
                '<th><span class="badge badge-dark">ICD 9 Ke 4 :</span>&nbsp&nbsp' + '<span class="badge badge-primary">' + d.icd9_4 + '</span>' + '</th>' +
                '<th><span class="badge badge-dark">ICD 9 Ke 5 :</span>&nbsp&nbsp' + '<span class="badge badge-primary">' + d.icd9_5 + '</span>' + '</th>' +
                '<th><span class="badge badge-dark">ICD 9 Ke 6 :</span>&nbsp&nbsp' + '<span class="badge badge-primary">' + d.icd9_6 + '</span>' + '</th>' +
                '</tr>' +
                '</table>' +
                '<table class="table table-bordered" cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
                '<tr>' +
                '<th><span class="badge badge-dark">CODE GROUPER BPJS :</span>&nbsp&nbsp' + '<span class="badge badge-primary">' + d.code_grouper + '</span>' + '</th>' +
                '</tr>' +
                '<tr>' +
                '<th><span class="badge badge-dark">HAK KELAS RAWAT INAP :</span>&nbsp&nbsp' + '<span class="badge badge-primary">KELAS&nbsp&nbsp' + d.kls_rwt + '</span>' + '</th>' +
                '</tr>' +
                '</table>';
        }

    });
</script>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\enigma\resources\views/ruangan/historicalbilling.blade.php ENDPATH**/ ?>