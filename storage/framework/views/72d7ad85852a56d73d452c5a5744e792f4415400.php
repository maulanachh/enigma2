

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
                        Menu Master Role User Login</h1>
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
                        <li class="breadcrumb-item text-muted">Master</li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Sistem</li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Role User</li>
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
                <div class=" col-lg-5">
                    <div class="card shadow-sm">
                        <div class="card-header collapsible cursor-pointer rotate" data-bs-toggle="collapse" data-bs-target="#table_roleuser">
                            <h3 class="card-title">Tabel Master Role User</h3>
                            <div class="card-toolbar rotate-180">
                                <span class="svg-icon svg-icon-1">
                                    ...
                                </span>
                            </div>
                        </div>
                        <div id="table_roleuser" class="collapse show">
                            <div class="card-body">
                                <table id="tbroleuser" class="table table-striped table-row-bordered gy-5 gs-7 border rounded display nowrap" width="100%">
                                    <thead>
                                        <tr class="fw-bold fs-6 text-gray-800 px-7">
                                            <th> Kode Role </th>
                                            <th> Nama Role </th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" col-lg-7">
                    <div class="card shadow-sm">
                        <div class="card-header collapsible cursor-pointer rotate" data-bs-toggle="collapse" data-bs-target="#form_roleuser">
                            <h3 class="card-title">Form Role User</h3>
                            <div class="card-toolbar rotate-180">
                                <span class="svg-icon svg-icon-1">
                                    ...
                                </span>
                            </div>
                        </div>
                        <div id="form_roleuser" class="collapse show">
                            <div class="card-body">
                                <div class="form-group" id="formroleuser">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="">Kode Role</label>
                                            <input type="text" class="form-control" id="id" placeholder="">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Jenis Role User</label>
                                            <input type="text" class="form-control" id="nmrole" placeholder="">
                                        </div>
                                    </div><br>
                                    <input type="submit" class="btn btn-success" id="btnsave" onclick="simpanedit()" value="SIMPAN">
                                    <input type="submit" class="btn btn-danger" id="btndel" onclick="del()" value="DELETE">
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

<script src="<?php echo e(asset('dist/plugins/custom/datatables/datatables.bundle.js')); ?>"></script>
<script>
    jQuery(document).ready(function($) {
        $('#tbroleuser thead tr').clone(true).appendTo('#tbroleuser thead');
        $('#tbroleuser thead tr:eq(1) th').each(function(i) {
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
        var table = $('#tbroleuser').DataTable({
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
                url: "<?php echo e(route('msrole')); ?>",
                'type': 'POST',
                'headers': {
                    'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                }
            },
            columns: [{
                    data: 'id',
                },
                {
                    data: 'nm_role',
                }
            ],
        });
    });
</script>
<script>
    jQuery(document).ready(function($) {
        $('#tbroleuser tbody').on('click', 'tr', function() {
            $('#btnsave').val('UPDATE DATA')
            var idData = $(this).find('td:eq(0)').text()
            $.ajax({
                url: "<?php echo e(route('parsedata')); ?>",
                type: 'POST',
                data: {
                    id: idData,
                    "_token": "<?php echo e(csrf_token()); ?>"
                },
                success: function(res) {
                    $('#id').val(res.role[0].id)
                    $('#nmrole').val(res.role[0].nm_role)
                    toastr.success("Parsing Data Berhasil");
                }
            })
        })
    });
</script>
<script>
    function simpanedit() {
        if ($('#btnsave').val() != "SIMPAN") {
            $.ajax({
                url: "<?php echo e(route('updaterole')); ?>",
                type: 'POST',
                data: {
                    id: $('#id').val(),
                    nmrole: $('#nmrole').val(),
                    "_token": "<?php echo e(csrf_token()); ?>"
                },
                success: function(res) {
                    $('#id').val(null),
                        $('#nmrole').val(null),
                        $('#tbroleuser').DataTable().ajax.reload(),
                        toastr.success("Data Berhasil Diupdate");
                },
                error: function(xhr) {
                    alert(xhr.responJson.text)
                }
            })
        } else {
            $.ajax({
                url: "<?php echo e(route('addrole')); ?>",
                type: 'POST',
                data: {
                    id: $('#id').val(),
                    nmrole: $('#nmrole').val(),
                    "_token": "<?php echo e(csrf_token()); ?>"
                },
                success: function(res) {
                    $('#id').val(null),
                        $('#nmrole').val(null),
                        $('#tbroleuser').DataTable().ajax.reload(),
                        toastr.success("Data Berhasil Disimpan");
                },
                error: function(xhr) {
                    alert(xhr.responJson.text)
                }
            })
        }
    };
</script>
<script>
    function del() {
        $.ajax({
            url: "<?php echo e(route('deleterole')); ?>",
            type: 'POST',
            data: {
                id: $('#id').val(),
                "_token": "<?php echo e(csrf_token()); ?>"
            },
            success: function(res) {
                $('#id').val(null),
                $('#nmrole').val(null),
                $('#tbroleuser').DataTable().ajax.reload(),
                toastr.success("Data Berhasil Dihapus");
            },
            error: function(xhr) {
                alert(xhr.responJson.text)
            }
        })
    };
</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\enigma\resources\views/mastersistem/msrole.blade.php ENDPATH**/ ?>