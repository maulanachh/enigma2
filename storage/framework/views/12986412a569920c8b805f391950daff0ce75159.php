

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
                        <li class="breadcrumb-item text-muted">List Billing</li>
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
                            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">TABLE LIST BILLING</h1>
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
                                            <th style="width: 100%">Action</th>
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
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <form id="incbgs">
                    <div id="kt_app_content" class="app-content flex-column-fluid">
                        <div class="row">
                            <div class="row col-lg-6">
                                <div class=" col-lg-12">
                                    <div class="card shadow-sm">
                                        <div class="card-header collapsible cursor-pointer rotate" data-bs-toggle="collapse" data-bs-target="#icd10series">
                                            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">ICD 10 SERIES</h1>
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
                                                        <div class="fv-row col-md-4">
                                                            <label for="">ICD 10 - 1</label>
                                                            <select class="form-select" data-control="select2" id="icd10_1" name="icd10_1"></select>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="">ICD 10 - 2</label>
                                                            <select class="form-select" data-control="select2" id="icd10_2"></select>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="">ICD 10 - 3</label>
                                                            <select class="form-select" data-control="select2" id="icd10_3"></select>
                                                        </div>
                                                    </div><br>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label for="">ICD 10 - 4</label>
                                                            <select class="form-select" data-control="select2" id="icd10_4"></select>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="">ICD 10 - 5</label>
                                                            <select class="form-select" data-control="select2" id="icd10_5"></select>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="">ICD 10 - 6</label>
                                                            <select class="form-select" data-control="select2" id="icd10_6"></select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row col-lg-6">
                                <div class=" col-lg-12">
                                    <div class="card shadow-sm">
                                        <div class="card-header collapsible cursor-pointer rotate" data-bs-toggle="collapse" data-bs-target="#icd9series">
                                            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">ICD 9 SERIES</h1>
                                            <div class="card-toolbar rotate-180">
                                                <span class="svg-icon svg-icon-1">
                                                    ...
                                                </span>
                                            </div>
                                        </div>
                                        <div id="icd9series" class="collapse show">
                                            <div class="card-body">
                                                <div class="form-group" id="formroleuser">
                                                    <div class="row">
                                                        <div class="fv-row col-md-4">
                                                            <label for="">ICD 9 - 1</label>
                                                            <select class="form-select" data-control="select2" id="icd9_1" name="icd9_1"></select>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="">ICD 9 - 2</label>
                                                            <select class="form-select" data-control="select2" id="icd9_2"></select>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="">ICD 9 - 3</label>
                                                            <select class="form-select" data-control="select2" id="icd9_3"></select>
                                                        </div>
                                                    </div><br>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label for="">ICD 9 - 4</label>
                                                            <select class="form-select" data-control="select2" id="icd9_4"></select>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="">ICD 9 - 5</label>
                                                            <select class="form-select" data-control="select2" id="icd9_5"></select>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="">ICD 9 - 6</label>
                                                            <select class="form-select" data-control="select2" id="icd9_6"></select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="kt_app_content" class="app-content flex-column-fluid">
                        <div class="row">
                            <div class=" col-lg-12">
                                <div class="card shadow-sm">
                                    <div class="card-header collapsible cursor-pointer rotate" data-bs-toggle="collapse" data-bs-target="#incbgseries">
                                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">DATA PASIEN</h1>
                                        <div class="card-toolbar rotate-180">
                                            <span class="svg-icon svg-icon-1">
                                                ...
                                            </span>
                                        </div>
                                    </div>
                                    <div id="incbgseries" class="collapse show">
                                        <div id="kt_app_content" class="app-content flex-column-fluid">
                                            <div class="card-body">
                                                <div class="form-group" id="formroleuser">
                                                    <div class="row">
                                                        <div class="fv-row col-md-2">
                                                            <input type="text" class="form-control" name="code_grouper_inacbg" id="nmpasien" placeholder="Nama Pasien" disabled>
                                                        </div>
                                                        <div class="fv-row col-md-2">
                                                            <input type="text" class="form-control" name="tarif_inacbg" id="nomrm" placeholder="Nomer Rekam Medis" disabled>
                                                        </div>
                                                        <div class="fv-row col-md-2">
                                                            <input type="text" class="form-control" name="tarif_inacbg" id="nori" placeholder="Nomer Register" disabled>
                                                        </div>
                                                        <div class="fv-row col-md-2">
                                                            <select class="form-select" data-control="select2" id="kasus" disabled></select>
                                                        </div>
                                                        <div class="fv-row col-md-2">
                                                            <select class="form-select" data-control="select2" id="kunjung" disabled></select>
                                                        </div>
                                                        <div class="fv-row col-md-2">
                                                            <select class="form-select" data-control="select2" id="klsrwt" disabled></select>
                                                        </div>
                                                        <div class="fv-row col-md-0">
                                                            <label for=""></label>
                                                            <input type="text" class="form-control" id="idgrouper" placeholder="" hidden>
                                                        </div>
                                                    </div>
                                                    <input type="submit" class="btn btn-primary" id="btnupdate" value="UPDATE INACBG'S" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

<script src="<?php echo e(asset('dist/plugins/custom/datatables/datatables.bundle.js')); ?>"></script>
<script>
    $(document).ready(function() {
        $("#icd10_1,#icd10_2,#icd10_3,#icd10_4,#icd10_5,#icd10_6").select2({
            placeholder: "Select ICD 10",
            allowClear: true,
            ajax: {
                url: "<?php echo e(route('selicd10')); ?>",
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
                                text: item.dtd + " " + "|" + " " + item.nama,
                                id: item.dtd,
                            }
                        })
                    }
                }
            }
        })
    });
</script>
<script>
    $(document).ready(function() {
        $("#klsrwt").select2({
            placeholder: "Pilih Tujuan Naik Kelas Rawat",
            allowClear: true,
            ajax: {
                url: "<?php echo e(route('kls_rwt')); ?>",
                dataType: 'json',
                type: "GET",
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
                                text: 'KELAS ' + item.kls_rwt,
                                id: item.id,
                            }
                        })
                    }
                }
            }
        })
    });
</script>
<script>
    $(document).ready(function() {
        $("#icd9_1,#icd9_2,#icd9_3,#icd9_4,#icd9_5,#icd9_6").select2({
            placeholder: "Select ICD 9",
            allowClear: true,
            ajax: {
                url: "<?php echo e(route('selicd9')); ?>",
                dataType: 'json',
                type: "GET",
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
                                text: item.kdicd9 + " " + "|" + " " + item.nmicd9,
                                id: item.kdicd9,
                            }
                        })
                    }
                }
            }
        })
    });
</script>
<script>
    $(document).ready(function() {
        $("#kunjung").select2({
            placeholder: "Select Kriteria Kunjungan",
            allowClear: true,
            ajax: {
                url: "<?php echo e(route('selkriteriakunj')); ?>",
                dataType: 'json',
                type: "GET",
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
                                text: item.kriteria_kunj,
                                id: item.id,
                            }
                        })
                    }
                }
            }
        })
    });
</script>
<script>
    $(document).ready(function() {
        $("#kasus").select2({
            placeholder: "Select Kriteria Kasus",
            allowClear: true,
            ajax: {
                url: "<?php echo e(route('selkriteriakunj')); ?>",
                dataType: 'json',
                type: "GET",
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
                                text: item.kriteria_kunj,
                                id: item.id,
                            }
                        })
                    }
                }
            }
        })
    });
</script>
<script>
    const form = document.getElementById('incbgs');
    var validator = FormValidation.formValidation(
        form, {
            fields: {
                'icd10_1': {
                    validators: {
                        notEmpty: {
                            message: 'ICD 10 - 1 Tidak Boleh Kosong'
                        }
                    }
                },
            },
            plugins: {
                trigger: new FormValidation.plugins.Trigger(),
                bootstrap: new FormValidation.plugins.Bootstrap5({
                    rowSelector: '.fv-row',
                    eleInvalidClass: '',
                    eleValidClass: ''
                })
            }
        }
    );
    $(form.querySelector('[name="icd10_1"]')).on('change', function() {
        // Revalidate the field when an option is chosen
        validator.revalidateField('icd10_1');
    });
    const submitButton2 = document.getElementById('btnupdate');
    submitButton2.addEventListener('click', function(e) {
        // Prevent default button action
        e.preventDefault();
        if (validator) {
            validator.validate().then(function(status) {

                if (status == 'Valid') {
                    icd10_1 = $('#icd10_1').val()
                    if ($('#icd10_2').val() != null) {
                        icd10_2 = $('#icd10_2').val()
                    } else {
                        icd10_2 = ' '
                    }
                    if ($('#icd10_3').val() != null) {
                        icd10_3 = $('#icd10_3').val()
                    } else {
                        icd10_3 = ' '
                    }
                    if ($('#icd10_4').val() != null) {
                        icd10_4 = $('#icd10_4').val()
                    } else {
                        icd10_4 = ' '
                    }
                    if ($('#icd10_5').val() != null) {
                        icd10_5 = $('#icd10_5').val()
                    } else {
                        icd10_5 = ' '
                    }
                    if ($('#icd10_6').val() != null) {
                        icd10_6 = $('#icd10_6').val()
                    } else {
                        icd10_6 = ' '
                    }
                    icd9_1 = $('#icd9_1').val()
                    if ($('#icd9_2').val() != null) {
                        icd9_2 = $('#icd9_2').val()
                    } else {
                        icd9_2 = ' '
                    }
                    if ($('#icd9_3').val() != null) {
                        icd9_3 = $('#icd9_3').val()
                    } else {
                        icd9_3 = ' '
                    }
                    if ($('#icd9_4').val() != null) {
                        icd9_4 = $('#icd9_4').val()
                    } else {
                        icd9_4 = ' '
                    }
                    if ($('#icd9_5').val() != null) {
                        icd9_5 = $('#icd9_5').val()
                    } else {
                        icd9_5 = ' '
                    }
                    if ($('#icd9_6').val() != null) {
                        icd9_6 = $('#icd9_6').val()
                    } else {
                        icd9_6 = ' '
                    }
                    nori = $('#nori').val()
                    code_grouper_inacbg = $('#code_grouper_inacbg').val()
                    tarif_inacbg = $('#tarif_inacbg').val()
                    deskripsi_inacbg = $('#deskripsi_inacbg').val()
                    $jenisbutton = $('#btnupdate').val()
                    kelasbaru =  $('#klsrwt').val()
                    if ($jenisbutton == "UPDATE INACBG'S") {
                        $.ajax({
                            url: "<?php echo e(route('updateina')); ?>",
                            type: 'POST',
                            data: {
                                idgrouper: $('#idgrouper').val(),
                                icd10_1: icd10_1,
                                icd10_2: icd10_2,
                                icd10_3: icd10_3,
                                icd10_4: icd10_4,
                                icd10_5: icd10_5,
                                icd10_6: icd10_6,
                                icd9_1: icd9_1,
                                icd9_2: icd9_2,
                                icd9_3: icd9_3,
                                icd9_4: icd9_4,
                                icd9_5: icd9_5,
                                icd9_6: icd9_6,
                                nori: nori,
                                kelasbaru: kelasbaru,
                                "_token": "<?php echo e(csrf_token()); ?>"
                            },
                            success: function(res) {
                                toastr.success("data berhasil diupdate")
                                $('#icd10_1').empty().trigger('change'),
                                    $('#icd10_2').empty().trigger('change'),
                                    $('#icd10_3').empty().trigger('change'),
                                    $('#icd10_4').empty().trigger('change'),
                                    $('#icd10_5').empty().trigger('change'),
                                    $('#icd10_6').empty().trigger('change'),
                                    $('#icd9_1').empty().trigger('change'),
                                    $('#icd9_2').empty().trigger('change'),
                                    $('#icd9_3').empty().trigger('change'),
                                    $('#icd9_4').empty().trigger('change'),
                                    $('#icd9_5').empty().trigger('change'),
                                    $('#icd9_6').empty().trigger('change'),
                                    $('#klsrwt').empty().trigger('change'),
                                    $('#kasus').empty().trigger('change'),
                                    $('#kunjung').empty().trigger('change'),
                                    $('#nmpasien').val(null),
                                    $('#nori').val(null),
                                    $('#nomrm').val(null),
                                    $('#btnupdate').attr('disabled', true)
                                $('#btnupdate').val("UPDATE INACBG'S")
                                $('#tbdatabilling').DataTable().ajax.reload();
                            },
                            error: function(xhr) {}
                        })
                    } else {
                        $.ajax({
                            url: "<?php echo e(route('insertina')); ?>",
                            type: 'POST',
                            data: {
                                idgrouper: $('#idgrouper').val(),
                                kasus: $('#kasus :selected').text(),
                                kunjung: $('#kunjung :selected').text(),
                                icd10_1: icd10_1,
                                icd10_2: icd10_2,
                                icd10_3: icd10_3,
                                icd10_4: icd10_4,
                                icd10_5: icd10_5,
                                icd10_6: icd10_6,
                                icd9_1: icd9_1,
                                icd9_2: icd9_2,
                                icd9_3: icd9_3,
                                icd9_4: icd9_4,
                                icd9_5: icd9_5,
                                icd9_6: icd9_6,
                                nori: nori,
                                kelasbaru: kelasbaru,
                                "_token": "<?php echo e(csrf_token()); ?>"
                            },
                            success: function(res) {
                                toastr.success("data berhasil diupdate")
                                $('#icd10_1').empty().trigger('change'),
                                    $('#icd10_2').empty().trigger('change'),
                                    $('#icd10_3').empty().trigger('change'),
                                    $('#icd10_4').empty().trigger('change'),
                                    $('#icd10_5').empty().trigger('change'),
                                    $('#icd10_6').empty().trigger('change'),
                                    $('#icd9_1').empty().trigger('change'),
                                    $('#icd9_2').empty().trigger('change'),
                                    $('#icd9_3').empty().trigger('change'),
                                    $('#icd9_4').empty().trigger('change'),
                                    $('#icd9_5').empty().trigger('change'),
                                    $('#icd9_6').empty().trigger('change'),
                                    $('#klsrwt').empty().trigger('change'),
                                    $('#kasus').empty().trigger('change'),
                                    $('#kunjung').empty().trigger('change'),
                                    $('#kasus').attr('disabled', true)
                                $('#kunjung').attr('disabled', true)
                                $('#nmpasien').val(null),
                                    $('#nori').val(null),
                                    $('#nomrm').val(null),
                                    $('#btnupdate').attr('disabled', true)
                                $('#btnupdate').val("UPDATE INACBG'S")
                                $('#tbdatabilling').DataTable().ajax.reload();
                            },
                            error: function(xhr) {}
                        })
                    }
                }
            });
        }
    });
</script>
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
                url: "<?php echo e(route('datasetlistbilling')); ?>",
                'type': 'POST',
                'headers': {
                    'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                }
            },
            columns: [{
                    data: 'actions',
                    className: "text-center",
                    render: function(data, type, row, meta) {
                        return '<button type="button" class="btn btn-icon btn-info first-button bi bi-search" id="showdetail"></button>&nbsp' +
                            '<button class="btn btn-icon btn-success second-button bi bi-pen" id="editdata""></button>';
                    }
                },
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

        // Add event listener for opening and closing details
        $('#tbdatabilling tbody').on('click', '#showdetail', function() {
            var tr = $(this).closest('tr');
            var row = table.row(tr);

            if (row.child.isShown()) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
            } else {
                // Open this row
                row.child(format(row.data())).show();
                tr.addClass('shown');
            }
        });
        $('#tbdatabilling tbody').on('click', '#editdata', function() {
            var tr = $(this).closest('tr');
            var row = table.row(tr);
            $('#btnsave').attr('disabled', true)
            var idData = tr.find('td:eq(1)').text()
            console.log(idData)
            $.ajax({
                url: "<?php echo e(route('parsingdatapasbil')); ?>",
                type: 'POST',
                data: {
                    nori: idData,
                    "_token": "<?php echo e(csrf_token()); ?>"
                },
                success: function(res) {
                    console.log(res)

                    if (res.parsedatapasbil[0].icd10_1 == 'kosong') {
                        $('#nmpasien').val(res.parsedatapasbil[0].nmpasien)
                        $('#nori').val(res.parsedatapasbil[0].nori)
                        $('#btnupdate').attr('disabled', false)
                        $('#kasus').attr('disabled', false)
                        $('#kunjung').attr('disabled', false)
                        $('#nomrm').val(res.parsedatapasbil[0].nomrm)
                        $('#btnupdate').val('SIMPAN CODING'),
                            $('#btndel').attr('disabled', false),
                            toastr.success("Parsing Data Berhasil")
                    } else {
                        if (res.parsedatapasbil[0].icd10_1 === '') {
                            $('#icd10_1').attr('placeholder')
                        } else if (res.parsedatapasbil[0].icd10_1 === null) {
                            $('#icd10_1').attr('placeholder')
                        } else {
                            $("#icd10_1").append("<option value='" + res.parsedatapasbil[0].icd10_1 + "' selected>" + res.parsedatapasbil[0].icd10_1 + "</option>")
                        }
                        if (res.parsedatapasbil[0].icd10_2 === '') {
                            $('#icd10_2').empty()
                        } else if (res.parsedatapasbil[0].icd10_2 === null) {
                            $('#icd10_2').attr('placeholder')
                        } else {
                            $("#icd10_2").append("<option value='" + res.parsedatapasbil[0].icd10_2 + "' selected>" + res.parsedatapasbil[0].icd10_2 + "</option>")
                        }
                        if (res.parsedatapasbil[0].icd10_3 === '') {
                            $('#icd10_3').val('').trigger('change')
                        } else if (res.parsedatapasbil[0].icd10_3 === null) {
                            $('#icd10_3').attr('placeholder')
                        } else {
                            $("#icd10_3").append("<option value='" + res.parsedatapasbil[0].icd10_3 + "' selected>" + res.parsedatapasbil[0].icd10_3 + "</option>")
                        }
                        if (res.parsedatapasbil[0].icd10_4 === '') {
                            $('#icd10_4').val('').trigger('change')
                        } else if (res.parsedatapasbil[0].icd10_4 === null) {
                            $('#icd10_4').attr('placeholder')
                        } else {
                            $("#icd10_4").append("<option value='" + res.parsedatapasbil[0].icd10_4 + "' selected>" + res.parsedatapasbil[0].icd10_4 + "</option>")
                        }
                        if (res.parsedatapasbil[0].icd10_5 === '') {
                            $('#icd10_5').val('').trigger('change')
                        } else if (res.parsedatapasbil[0].icd10_5 === null) {
                            $('#icd10_5').attr('placeholder')
                        } else {
                            $("#icd10_5").append("<option value='" + res.parsedatapasbil[0].icd10_5 + "' selected>" + res.parsedatapasbil[0].icd10_5 + "</option>")
                        }
                        if (res.parsedatapasbil[0].icd10_6 === '') {
                            $('#icd10_6').val('').trigger('change')
                        } else if (res.parsedatapasbil[0].icd10_6 === null) {
                            $('#icd10_6').attr('placeholder')
                        } else {
                            $("#icd10_6").append("<option value='" + res.parsedatapasbil[0].icd10_6 + "' selected>" + res.parsedatapasbil[0].icd10_6 + "</option>")
                        }
                        // icd_9
                        if (res.parsedatapasbil[0].icd9_1 === '') {
                            $('#icd9_1').val('').trigger('change')
                        } else if (res.parsedatapasbil[0].icd9_1 === null) {
                            $('#icd9_1').attr('placeholder')
                        } else {
                            $("#icd9_1").append("<option value='" + res.parsedatapasbil[0].icd9_1 + "' selected>" + res.parsedatapasbil[0].icd9_1 + "</option>")
                        }
                        if (res.parsedatapasbil[0].icd9_2 === '') {
                            $('#icd9_2').val('').trigger('change')
                        } else if (res.parsedatapasbil[0].icd9_2 === null) {
                            $('#icd9_2').attr('placeholder')
                        } else {
                            $("#icd9_2").append("<option value='" + res.parsedatapasbil[0].icd9_2 + "' selected>" + res.parsedatapasbil[0].icd9_2 + "</option>")
                        }
                        if (res.parsedatapasbil[0].icd9_3 === '') {
                            $('#icd9_3').val('').trigger('change')
                        } else if (res.parsedatapasbil[0].icd9_6 === null) {
                            $('#icd9_6').attr('placeholder')
                        } else {
                            $("#icd9_3").append("<option value='" + res.parsedatapasbil[0].icd9_3 + "' selected>" + res.parsedatapasbil[0].icd9_3 + "</option>")
                        }
                        if (res.parsedatapasbil[0].icd9_4 === '') {
                            $('#icd9_4').val('').trigger('change')
                        } else if (res.parsedatapasbil[0].icd9_6 === null) {
                            $('#icd9_6').attr('placeholder')
                        } else {
                            $("#icd9_4").append("<option value='" + res.parsedatapasbil[0].icd9_4 + "' selected>" + res.parsedatapasbil[0].icd9_4 + "</option>")
                        }
                        if (res.parsedatapasbil[0].icd9_5 === '') {
                            $('#icd9_5').val('').trigger('change')
                        } else if (res.parsedatapasbil[0].icd9_6 === null) {
                            $('#icd9_6').attr('placeholder')
                        } else {
                            $("#icd9_5").append("<option value='" + res.parsedatapasbil[0].icd9_5 + "' selected>" + res.parsedatapasbil[0].icd9_5 + "</option>")
                        }
                        if (res.parsedatapasbil[0].icd9_6 === '') {
                            $('#icd9_6').val('').trigger('change')
                        } else if (res.parsedatapasbil[0].icd9_6 === null) {
                            $('#icd9_6').attr('placeholder')
                        } else {
                            $("#icd9_6").append("<option value='" + res.parsedatapasbil[0].icd9_6 + "' selected>" + res.parsedatapasbil[0].icd9_6 + "</option>")
                        }
                        if (res.parsedatapasbil[0].kasus === '') {
                            $('#kasus').val('').trigger('change')
                            $('#kasus').attr('disabled', false)
                        } else if (res.parsedatapasbil[0].kasus === null) {
                            $('#kasus').attr('placeholder')
                            $('#kasus').attr('disabled', false)
                        } else if (res.parsedatapasbil[0].kasus === 'kosong') {
                            $('#kasus').attr('placeholder')
                            $('#kasus').attr('disabled', false)
                        } else {
                            $('#kasus').append("<option value='" + res.parsedatapasbil[0].kasus + "' selected>" + res.parsedatapasbil[0].kasus + "</option>")
                        }
                        if (res.parsedatapasbil[0].kunjung === '') {
                            $('#kunjung').val('').trigger('change')
                            $('#kunjung').attr('disabled', false)
                        } else if (res.parsedatapasbil[0].kunjung === null) {
                            $('#kunjung').attr('placeholder')
                            $('#kunjung').attr('disabled', false)

                        } else if (res.parsedatapasbil[0].kunjung == 'kosong') {
                            $('#kunjung').attr('placeholder')
                            $('#kunjung').attr('disabled', false)
                        } else {
                            $('#kunjung').append("<option value='" + res.parsedatapasbil[0].kunjung + "' selected>" + res.parsedatapasbil[0].kunjung + "</option>")
                        }
                        $('#nmpasien').val(res.parsedatapasbil[0].nmpasien)
                        $('#nomrm').val(res.parsedatapasbil[0].nomrm)
                        $('#nori').val(res.parsedatapasbil[0].nori)
                        $('#btnupdate').attr('disabled', false)
                        $('#klsrwt').attr('disabled', false)
                        toastr.success("Parsing Data Berhasil")
                    }
                }
            })

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
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\enigma\resources\views/kasir/selisihbilling.blade.php ENDPATH**/ ?>