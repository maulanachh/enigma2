

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
                        Menu Master Code Grouper</h1>
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
                        <li class="breadcrumb-item text-muted">Master Code Grouper</li>
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
            <form id="incbgs">
                <div class="row">
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
                                            <div class="fv-row col-md-2">
                                                <label for="">ICD 10 - 1</label>
                                                <select class="form-select" data-control="select2" id="icd10_1" name="icd10_1"></select>
                                            </div>
                                            <div class="col-md-2">
                                                <label for="">ICD 10 - 2</label>
                                                <select class="form-select" data-control="select2" id="icd10_2"></select>
                                            </div>
                                            <div class="col-md-2">
                                                <label for="">ICD 10 - 3</label>
                                                <select class="form-select" data-control="select2" id="icd10_3"></select>
                                            </div>
                                            <div class="col-md-2">
                                                <label for="">ICD 10 - 4</label>
                                                <select class="form-select" data-control="select2" id="icd10_4"></select>
                                            </div>
                                            <div class="col-md-2">
                                                <label for="">ICD 10 - 5</label>
                                                <select class="form-select" data-control="select2" id="icd10_5"></select>
                                            </div>
                                            <div class="col-md-2">
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
                <div class="row">
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
                                            <div class="fv-row col-md-2">
                                                <label for="">ICD 9 - 1</label>
                                                <select class="form-select" data-control="select2" id="icd9_1" name="icd9_1"></select>
                                            </div>
                                            <div class="col-md-2">
                                                <label for="">ICD 9 - 2</label>
                                                <select class="form-select" data-control="select2" id="icd9_2"></select>
                                            </div>
                                            <div class="col-md-2">
                                                <label for="">ICD 9 - 3</label>
                                                <select class="form-select" data-control="select2" id="icd9_3"></select>
                                            </div>
                                            <div class="col-md-2">
                                                <label for="">ICD 9 - 4</label>
                                                <select class="form-select" data-control="select2" id="icd9_4"></select>
                                            </div>
                                            <div class="col-md-2">
                                                <label for="">ICD 9 - 5</label>
                                                <select class="form-select" data-control="select2" id="icd9_5"></select>
                                            </div>
                                            <div class="col-md-2">
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
                <div class="row">
                    <div class=" col-lg-12">
                        <div class="card shadow-sm">
                            <div class="card-header collapsible cursor-pointer rotate" data-bs-toggle="collapse" data-bs-target="#kelasranap">
                                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">HAK KELAS RAWAT INAP</h1>
                                <div class="card-toolbar rotate-180">
                                    <span class="svg-icon svg-icon-1">
                                        ...
                                    </span>
                                </div>
                            </div>
                            <div id="kelasranap" class="collapse show">
                                <div class="card-body">
                                    <div class="form-group" id="formroleuser">
                                        <div class="row">
                                            <div class="fv-row col-md-2">
                                                <label for="">Kelas Rawat Inap</label>
                                                <select class="form-select" data-control="select2" id="klsrwt" name="klsrwt"></select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class=" col-lg-12">
                        <div class="card shadow-sm">
                            <div class="card-header collapsible cursor-pointer rotate" data-bs-toggle="collapse" data-bs-target="#incbgseries">
                                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">INACBG SERIES</h1>
                                <div class="card-toolbar rotate-180">
                                    <span class="svg-icon svg-icon-1">
                                        ...
                                    </span>
                                </div>
                            </div>
                            <div id="incbgseries" class="collapse show">
                                <div class="card-body">
                                    <div class="form-group" id="formroleuser">
                                        <div class="row">
                                            <div class="fv-row col-md-2">
                                                <label for="">CODE GROUPER</label>
                                                <input type="text" class="form-control" name="code_grouper_inacbg" id="code_grouper_inacbg" placeholder="">
                                            </div>
                                            <div class="fv-row col-md-2">
                                                <label for="">TARIF INACBG</label>
                                                <input type="text" class="form-control" name="tarif_inacbg" id="tarif_inacbg" placeholder="">
                                            </div>
                                            <div class="fv-row col-md-8">
                                                <label for="">DESKRIPSI</label>
                                                <input type="text" class="form-control" name="deskripsi_inacbg" id="deskripsi_inacbg" placeholder="">
                                            </div>
                                            <div class="col-md-8">
                                                <label for=""></label>
                                                <input type="text" class="form-control" id="idgrouper" placeholder="" hidden>
                                            </div>
                                        </div><br>
                                        <input type="submit" class="btn btn-success" id="btnsave" onclick="" value="SAVE">
                                        <input type="submit" class="btn btn-primary" id="btnupdate" value="UPDATE" disabled>
                                        <button type="button" class="btn btn-danger" id="btndel" onclick="del()" value="DELETE" disabled>DELETE</button>
                                        <!-- <input type="submit" class="btn btn-success" id="btnsave" onclick="simpanedit()" value="SIMPAN">
                                        <input type="submit" class="btn btn-danger" id="btndel" onclick="del()" value="DELETE"> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class='row'>
                <div class=" col-lg-12">
                    <div class="card shadow-sm">
                        <div class="card-header collapsible cursor-pointer rotate" data-bs-toggle="collapse" data-bs-target="#table_datagrouper">
                            <h3 class="card-title">Tabel Master Code Grouper</h3>
                            <div class="card-toolbar rotate-180">
                                <span class="svg-icon svg-icon-1">
                                    ...
                                </span>
                            </div>
                        </div>
                        <div id="table_datagrouper" class="collapse show">
                            <div class="card-body">
                                <table id="tbdatagrouper" class="table table-striped table-row-bordered gy-5 gs-7 border rounded display nowrap" width="100%">
                                    <thead>
                                        <tr class="fw-bold fs-6 text-gray-800 px-7">
                                            <th>ID</th>
                                            <th>Kelas Rawat</th>
                                            <th>Code Grouper Inacbg</th>
                                            <th>Deskripsi Inacbg</th>
                                            <th>Tarif Inacbg</th>
                                            <th>ICD 10 KE - 1</th>
                                            <th>ICD 10 KE - 2</th>
                                            <th>ICD 10 KE - 3</th>
                                            <th>ICD 10 KE - 4</th>
                                            <th>ICD 10 KE - 5</th>
                                            <th>ICD 10 KE - 6</th>
                                            <th>ICD 10 KE - 7</th>
                                            <th>ICD 9 KE - 1</th>
                                            <th>ICD 9 KE - 2</th>
                                            <th>ICD 9 KE - 3</th>
                                            <th>ICD 9 KE - 4</th>
                                            <th>ICD 9 KE - 5</th>
                                            <th>ICD 9 KE - 6</th>
                                        </tr>
                                    </thead>
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
        $("#klsrwt").select2({
            placeholder: "Select Kelas Rawat Inap",
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
    const form = document.getElementById('incbgs');
    var validator = FormValidation.formValidation(
        form, {
            fields: {
                'icd10_1': {
                    validators: {
                        notEmpty: {
                            message: 'ICD 10 - 1 input is required'
                        }
                    }
                },
                'icd9_1': {
                    validators: {
                        notEmpty: {
                            message: 'ICD 9 - 1 input is required'
                        }
                    }
                },
                'klsrwt': {
                    validators: {
                        notEmpty: {
                            message: 'Kelas Rawat input is required'
                        }
                    }
                },
                'code_grouper_inacbg': {
                    validators: {
                        notEmpty: {
                            message: 'Code Grouper input is required'
                        }
                    }
                },
                'tarif_inacbg': {
                    validators: {
                        notEmpty: {
                            message: 'Tarif INACBG input is required'
                        }
                    }
                },
                'deskripsi_inacbg': {
                    validators: {
                        notEmpty: {
                            message: 'Deskripsi input is required'
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
    $(form.querySelector('[name="icd10_1, icd9_1, klsrwt, code_grouper_inacbg, tarif_inacbg, deskripsi_inacbg"]')).on('change', function() {
        // Revalidate the field when an option is chosen
        validator.revalidateField('icd10_1');
        validator.revalidateField('icd9_1');
        validator.revalidateField('klsrwt');
        validator.revalidateField('code_grouper_inacbg');
        validator.revalidateField('tarif_inacbg');
        validator.revalidateField('deskripsi_inacbg');
    });

    const submitButton = document.getElementById('btnsave');
    const submitButton2 = document.getElementById('btnupdate');
    submitButton.addEventListener('click', function(e) {
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
                    kls_rwt = $('#klsrwt :selected').val()
                    code_grouper_inacbg = $('#code_grouper_inacbg').val()
                    tarif_inacbg = $('#tarif_inacbg').val()
                    deskripsi_inacbg = $('#deskripsi_inacbg').val()

                    $.ajax({
                        url: "<?php echo e(route('savegrouper')); ?>",
                        type: 'POST',
                        data: {
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
                            kls_rwt: kls_rwt,
                            code_grouper_inacbg: code_grouper_inacbg,
                            tarif_inacbg: tarif_inacbg,
                            deskripsi_inacbg: deskripsi_inacbg,
                            "_token": "<?php echo e(csrf_token()); ?>"
                        },
                        success: function(res) {
                            toastr.success("data berhasil disimpan")
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
                                $('#code_grouper_inacbg').val(null),
                                $('#tarif_inacbg').val(null),
                                $('#deskripsi_inacbg').val(null)
                                $('#tbdatagrouper').DataTable().ajax.reload();
                        },
                        error: function(xhr) {}
                    })
                }
            });
        }
    });
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
                    kls_rwt = $('#klsrwt :selected').val()
                    code_grouper_inacbg = $('#code_grouper_inacbg').val()
                    tarif_inacbg = $('#tarif_inacbg').val()
                    deskripsi_inacbg = $('#deskripsi_inacbg').val()

                    $.ajax({
                        url: "<?php echo e(route('updatedatamaster')); ?>",
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
                            kls_rwt: kls_rwt,
                            code_grouper_inacbg: code_grouper_inacbg,
                            tarif_inacbg: tarif_inacbg,
                            deskripsi_inacbg: deskripsi_inacbg,
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
                                $('#code_grouper_inacbg').val(null),
                                $('#tarif_inacbg').val(null),
                                $('#deskripsi_inacbg').val(null)
                                $('#btnsave').attr('disabled', false)
                                $('#btnupdate').attr('disabled', true)
                                $('#btndel').attr('disabled', true)
                                $('#tbdatagrouper').DataTable().ajax.reload();
                        },
                        error: function(xhr) {}
                    })
                }
            });
        }
    });
</script>

<script>
    jQuery(document).ready(function($) {
        $('#tbdatagrouper thead tr').clone(true).appendTo('#tbdatagrouper thead');
        $('#tbdatagrouper thead tr:eq(1) th').each(function(i) {
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
        var table = $('#tbdatagrouper').DataTable({
            orderCellsTop: true,
            fixedHeader: true,
            processing: true,
            responseive: true,
            serverSide: true,
            searching: true,
            scrollY: "300px",
            scrollX: true,
            scrollCollapse: true,
            autoWidth: true,
            "order": [
                [0, "asc"]
            ],
            ajax: {
                url: "<?php echo e(route('codegrouper')); ?>",
                'type': 'POST',
                'headers': {
                    'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                }
            },
            columns: [{
                    data: 'id',
                    className: "text-center"
                },
                {
                    data: 'kls_rwt',
                    className: "text-center"
                },
                {
                    data: 'code_grouper_inacbg',
                    className: "text-center"
                },
                {
                    data: 'deskripsi_inacbg',
                },
                {
                    data: 'tarif_inacbg',
                    render: $.fn.dataTable.render.number(',', '.', 2, 'Rp '),
                    className: "text-center"

                },
                {
                    data: 'icd10_1',
                    className: "text-center"
                },
                {
                    data: 'icd10_2',
                    className: "text-center"
                },
                {
                    data: 'icd10_3',
                    className: "text-center"
                },
                {
                    data: 'icd10_4',
                    className: "text-center"
                },
                {
                    data: 'icd10_5',
                    className: "text-center"
                },
                {
                    data: 'icd10_6',
                    className: "text-center"
                },
                {
                    data: 'icd10_7',
                    className: "text-center"
                },
                {
                    data: 'icd9_1',
                    className: "text-center"
                },
                {
                    data: 'icd9_2',
                    className: "text-center"
                },
                {
                    data: 'icd9_3',
                    className: "text-center"
                },
                {
                    data: 'icd9_4',
                    className: "text-center"
                },
                {
                    data: 'icd9_5',
                    className: "text-center"
                },
                {
                    data: 'icd9_6',
                    className: "text-center"
                },
            ],
        });
    });
</script>
<script>
    jQuery(document).ready(function($) {
        $('#tbdatagrouper tbody').on('click', 'tr', function() {
            $('#btnsave').attr('disabled', true)
            var idData = $(this).find('td:eq(0)').text()
            $.ajax({
                url: "<?php echo e(route('parsingdatagrouper')); ?>",
                type: 'POST',
                data: {
                    id: idData,
                    "_token": "<?php echo e(csrf_token()); ?>"
                },
                success: function(res) {
                    console.log(res.codegrouper)
                    if (res.codegrouper[0].icd10_1 === '') {

                        $('#icd10_1').attr('placeholder')
                    } else {
                        $("#icd10_1").append("<option value='" + res.codegrouper[0].icd10_1 + "' selected>" + res.codegrouper[0].icd10_1 + "</option>")
                    }
                    if (res.codegrouper[0].icd10_2 === '') {
                        $('#icd10_2').empty()
                    } else {
                        $("#icd10_2").append("<option value='" + res.codegrouper[0].icd10_2 + "' selected>" + res.codegrouper[0].icd10_2 + "</option>")
                    }
                    if (res.codegrouper[0].icd10_3 === '') {
                        $('#icd10_3').val('').trigger('change')
                    } else {
                        $("#icd10_3").append("<option value='" + res.codegrouper[0].icd10_3 + "' selected>" + res.codegrouper[0].icd10_3 + "</option>")
                    }
                    if (res.codegrouper[0].icd10_4 === '') {
                        $('#icd10_4').val('').trigger('change')
                    } else {
                        $("#icd10_4").append("<option value='" + res.codegrouper[0].icd10_4 + "' selected>" + res.codegrouper[0].icd10_4 + "</option>")
                    }
                    if (res.codegrouper[0].icd10_5 === '') {
                        $('#icd10_5').val('').trigger('change')
                    } else {
                        $("#icd10_5").append("<option value='" + res.codegrouper[0].icd10_5 + "' selected>" + res.codegrouper[0].icd10_5 + "</option>")
                    }
                    if (res.codegrouper[0].icd10_6 === '') {
                        $('#icd10_6').val('').trigger('change')
                    } else {
                        $("#icd10_6").append("<option value='" + res.codegrouper[0].icd10_6 + "' selected>" + res.codegrouper[0].icd10_6 + "</option>")
                    }
                    // icd_9
                    if (res.codegrouper[0].icd9_1 === '') {
                        $('#icd9_1').val('').trigger('change')
                    } else {
                        $("#icd9_1").append("<option value='" + res.codegrouper[0].icd9_1 + "' selected>" + res.codegrouper[0].icd9_1 + "</option>")
                    }
                    if (res.codegrouper[0].icd9_2 === '') {
                        $('#icd9_2').val('').trigger('change')
                    } else {
                        $("#icd9_2").append("<option value='" + res.codegrouper[0].icd9_2 + "' selected>" + res.codegrouper[0].icd9_2 + "</option>")
                    }
                    if (res.codegrouper[0].icd9_3 === '') {
                        $('#icd9_3').val('').trigger('change')
                    } else {
                        $("#icd9_3").append("<option value='" + res.codegrouper[0].icd9_3 + "' selected>" + res.codegrouper[0].icd9_3 + "</option>")
                    }
                    if (res.codegrouper[0].icd9_4 === '') {
                        $('#icd9_4').val('').trigger('change')
                    } else {
                        $("#icd9_4").append("<option value='" + res.codegrouper[0].icd9_4 + "' selected>" + res.codegrouper[0].icd9_4 + "</option>")
                    }
                    if (res.codegrouper[0].icd9_5 === '') {
                        $('#icd9_5').val('').trigger('change')
                    } else {
                        $("#icd9_5").append("<option value='" + res.codegrouper[0].icd9_5 + "' selected>" + res.codegrouper[0].icd9_5 + "</option>")
                    }
                    if (res.codegrouper[0].icd9_6 === '') {
                        $('#icd9_6').val('').trigger('change')
                    } else {
                        $("#icd9_6").append("<option value='" + res.codegrouper[0].icd9_6 + "' selected>" + res.codegrouper[0].icd9_6 + "</option>")
                    }
                    $("#klsrwt").append("<option value='" + res.codegrouper[0].kls_rwt + "' selected> KELAS " + res.codegrouper[0].kls_rwt + "</option>")
                    code_grouper_inacbg = $('#code_grouper_inacbg').val(res.codegrouper[0].code_grouper_inacbg)
                    tarif_inacbg = $('#tarif_inacbg').val(res.codegrouper[0].tarif_inacbg)
                    deskripsi_inacbg = $('#deskripsi_inacbg').val(res.codegrouper[0].deskripsi_inacbg)
                    $('#idgrouper').val(res.codegrouper[0].id)
                    $('#btnupdate').attr('disabled', false),
                    $('#btndel').attr('disabled', false),
                    toastr.success("Parsing Data Berhasil")
                }
            })
        })
    });
</script>
<script>
    function del() {
        $.ajax({
            url: "<?php echo e(route('deletecodegrouper')); ?>",
            type: 'POST',
            data: {
                id: $('#idgrouper').val(),
                "_token": "<?php echo e(csrf_token()); ?>"
            },
            success: function(res) {
                toastr.success("data berhasil dihapus")
                $('#icd10_1').empty().trigger('change'),
                $('#icd10_3').empty().trigger('change'),
                $('#icd10_2').empty().trigger('change'),
                $('#icd10_5').empty().trigger('change'),
                $('#icd10_4').empty().trigger('change'),
                $('#icd9_1').empty().trigger('change'),
                $('#icd10_6').empty().trigger('change'),
                $('#icd9_3').empty().trigger('change'),
                $('#icd9_2').empty().trigger('change'),
                $('#icd9_5').empty().trigger('change'),
                $('#icd9_4').empty().trigger('change'),
                $('#klsrwt').empty().trigger('change'),
                $('#icd9_6').empty().trigger('change'),
                $('#tarif_inacbg').val(null),
                $('#deskripsi_inacbg').val(null)
                $('#btnsave').attr('disabled', false)
                $('#btnupdate').attr('disabled', true)
                $('#btndel').attr('disabled', true)
                $('#code_grouper_inacbg').val(null)
                $('#tbdatagrouper').DataTable().ajax.reload();
            },
            error: function(xhr) {
                alert(xhr.responJson.text)
            }
        })
    };
</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/enigma/resources/views/master/ms_code_grouper.blade.php ENDPATH**/ ?>