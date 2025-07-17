

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
                        Menu Master User</h1>
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
                        <li class="breadcrumb-item text-muted">User</li>
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
                <div class=" col-lg-7">
                    <div class="card shadow-sm">
                        <div class="card-header collapsible cursor-pointer rotate" data-bs-toggle="collapse" data-bs-target="#table_user">
                            <h3 class="card-title">Tabel Master User</h3>
                            <div class="card-toolbar rotate-180">
                                <span class="svg-icon svg-icon-1">
                                    ...
                                </span>
                            </div>
                        </div>
                        <div id="table_user" class="collapse show">
                            <div class="card-body">
                                <table id="tbuser" class="table table-striped table-row-bordered gy-5 gs-7 border rounded display nowrap" width="100%">
                                    <thead>
                                        <tr class="fw-bold fs-6 text-gray-800 px-7">
                                            <th> ID </th>
                                            <th> Username </th>
                                            <th> Nama </th>
                                            <th> Nama Role User </th>
                                            <th> Kode Lokasi </th>
                                            <th> Nama Branch </th>
                                            <th> Kode1 </th>
                                            <th> Nama Unit </th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" col-lg-5">
                    <div class="card shadow-sm">
                        <div class="card-header collapsible cursor-pointer rotate" data-bs-toggle="collapse" data-bs-target="#form_user">
                            <h3 class="card-title">Form User</h3>
                            <div class="card-toolbar rotate-180">
                                <span class="svg-icon svg-icon-1">
                                    ...
                                </span>
                            </div>
                        </div>
                        <div id="form_user" class="collapse show">
                            <div class="card-body">
                                <div class="form-group" id="formuser">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="">ID</label>
                                            <input type="text" class="form-control" id="id" placeholder="" disabled>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Nama Lengkap</label>
                                            <input type="text" class="form-control" id="nama" placeholder="">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Pilih Role</label>
                                            <select class="form-select" data-control="select2" id="selrole"></select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Pilih Branch</label>
                                            <select class="form-select" data-control="select2" id="branch"></select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Pilih Unit</label>
                                            <select class="form-select" data-control="select2" id="selunit"></select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Username</label>
                                            <input type="text" class="form-control" id="username" placeholder="">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Password</label>
                                            <input type="text" class="form-control" id="pswd" placeholder="">
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
        $('#tbuser thead tr').clone(true).appendTo('#tbuser thead');
        $('#tbuser thead tr:eq(1) th').each(function(i) {
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
        var table = $('#tbuser').DataTable({
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
                url: "<?php echo e(route('msuser')); ?>",
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
                    data: 'username',
                },
                {
                    data: 'nama',
                },
                {
                    data: 'role',
                    className: "text-center"
                },
                {
                    data: 'kdlokasi',
                    className: "text-center"
                },
                {
                    data: 'nmrs',
                },
                {
                    data: 'kode1',
                    className: "text-center"
                },
                {
                    data: 'nmunit',
                }
            ],
        });
    });
</script>
<script>
    $(document).ready(function() {
        $("#selrole").select2({
            placeholder: "Pilih Role User",
            allowClear: true,
            ajax: {
                url: "<?php echo e(route('pilihrole')); ?>",
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
                                text: item.id + ' | ' + item.nm_role,
                                id: item.id,
                            }
                        })
                    }
                }
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        $("#branch").select2({
            placeholder: "Pilih Branch",
            allowClear: true,
            ajax: {
                url: "<?php echo e(route('pilihbranch')); ?>",
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
                                text: item.nmrs,
                                id: item.kdlokasi,
                            }
                        })
                    }
                }
            }
        });
    });
</script>
<script>
    jQuery(document).ready(function($) {
        $("#selunit").select2({
            placeholder: "Pilih Unit"
        })
        $('#branch').on("change", function(e) {
            var data = $('#branch').select2('data');
            data.forEach(function(item) {
                kdlokasi = item.id
                return kdlokasi;
            })
            $("#selunit").select2({
                placeholder: "Pilih Unit",
                allowClear: true,
                ajax: {
                    url: "<?php echo e(route('pilihunit')); ?>",
                    dataType: 'json',
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                    },
                    data: {
                        kdlokasi: kdlokasi
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
        })
    });
</script>
<script>
    jQuery(document).ready(function($) {
        $('#tbuser tbody').on('click', 'tr', function() {
            $('#btnsave').val('UPDATE DATA')
            var idData = $(this).find('td:eq(0)').text()
            $.ajax({
                url: "<?php echo e(route('parsingdatauser')); ?>",
                type: 'POST',
                data: {
                    id: idData,
                    "_token": "<?php echo e(csrf_token()); ?>"
                },
                success: function(res) {
                    $('#id').val(res.getuser[0].id)
                    $('#nama').val(res.getuser[0].nama)
                    $('#username').val(res.getuser[0].username)
                    $("#selrole").append("<option value='" + res.getuser[0].role + "' selected>" + res.getuser[0].nm_role + "</option>")
                    $("#branch").append("<option value='" + res.getuser[0].kdlokasi + "' selected>" + res.getuser[0].nmrs + "</option>")
                    $("#selunit").append("<option value='" + res.getuser[0].kode1 + "' selected>" + res.getuser[0].nmunit + "</option>")
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
                url: "<?php echo e(route('updateuser')); ?>",
                type: 'POST',
                data: {
                    id: $('#id').val(),
                    nama: $('#nama').val(),
                    role: $('#selrole :selected').val(),
                    kdlokasi: $('#branch :selected').val(),
                    nmrs: $('#branch :selected').text(),
                    kode1: $('#selunit :selected').val(),
                    nmunit: $('#selunit :selected').text(),
                    username: $('#username').val(),
                    password: $('#pswd').val(),
                    "_token": "<?php echo e(csrf_token()); ?>"
                },
                success: function(res) {
                    $('#id').val(null),
                        $('#nama').val(null),
                        $('#selrole').empty().trigger('change'),
                        $('#branch').empty().trigger('change'),
                        $('#selunit').empty().trigger('change'),
                        $('#username').val(null),
                        $('#longitude').val(null),
                        $('#pswd').val(null),
                        $('#tbuser').DataTable().ajax.reload();
                    toastr.success("Data Berhasil Diupdate");
                },
                error: function(xhr) {
                    alert(xhr.responJson.text)
                }
            })
        } else {
            $.ajax({
                url: "<?php echo e(route('adduser')); ?>",
                type: 'POST',
                data: {
                    nama: $('#nama').val(),
                    role: $('#selrole :selected').val(),
                    kdlokasi: $('#branch :selected').val(),
                    nmrs: $('#branch :selected').text(),
                    kode1: $('#selunit :selected').val(),
                    nmunit: $('#selunit :selected').text(),
                    username: $('#username').val(),
                    password: $('#pswd').val(),
                    "_token": "<?php echo e(csrf_token()); ?>"
                },
                success: function(res) {
                    $('#id').val(null),
                        $('#nama').val(null),
                        $('#selrole').empty().trigger('change'),
                        $('#branch').empty().trigger('change'),
                        $('#selunit').empty().trigger('change'),
                        $('#username').val(null),
                        $('#longitude').val(null),
                        $('#pswd').val(null),
                        $('#tbuser').DataTable().ajax.reload();
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
            url: "<?php echo e(route('deleteuser')); ?>",
            type: 'POST',
            data: {
                id: $('#id').val(),
                "_token": "<?php echo e(csrf_token()); ?>"
            },
            success: function(res) {
                $('#id').val(null),
                    $('#nama').val(null),
                    $('#selrole').empty().trigger('change'),
                    $('#branch').empty().trigger('change'),
                    $('#selunit').empty().trigger('change'),
                    $('#username').val(null),
                    $('#longitude').val(null),
                    $('#pswd').val(null),
                    $('#tbuser').DataTable().ajax.reload();
                toastr.success("Data Berhasil Dihapus");
            },
            error: function(xhr) {
                alert(xhr.responJson.text)
            }
        })
    };
</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\enigma\resources\views/mastersistem/msuser.blade.php ENDPATH**/ ?>