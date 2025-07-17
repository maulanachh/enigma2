@extends('layout.master')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
@endsection


@section('konten')
<div class="content-wrapper">
    <!--begin::Toolbar-->
<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
    <!--begin::Toolbar container-->
    <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                Menu Master Unit</h1>
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
                <li class="breadcrumb-item text-muted">Unit</li>
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
            <div class=" col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tabel Master Unit</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="tbunit" class="display">
                            <thead>
                                <tr>
                                    <th> No Id </th>
                                    <th> kdlokasi </th>
                                    <th> Nama Unit </th>
                                    <th> dbname </th>
                                    <th> host </th>
                                    <th> dbuser </th>
                                    <th> dbpass </th>
                                    <th> dbport </th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
            <div class=" col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Form Unit</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group" id="formunit">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">ID</label>
                                    <input type="text" class="form-control" id="id" placeholder="" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Kode Lokasi</label>
                                    <input type="text" class="form-control" id="kdlokasi" placeholder="">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Nama Unit</label>
                                    <input type="text" class="form-control" id="nmunit" placeholder="">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Nama Database</label>
                                    <input type="text" class="form-control" id="nmdb" placeholder="">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Host Database</label>
                                    <input type="text" class="form-control" id="hostdb" placeholder="">
                                </div>
                                <div class="col-md-6">
                                    <label for="">User Database</label>
                                    <input type="text" class="form-control" id="userdb" placeholder="">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Password Database</label>
                                    <input type="text" class="form-control" id="pasdb" placeholder="">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Port Database</label>
                                    <input type="text" class="form-control" id="portdb" placeholder="">
                                </div>
                            </div><br>
                            <input type="submit" class="btn btn-primary" id="btnsave" onclick="simpanedit()" value="SIMPAN">
                            <input type="submit" class="btn btn-danger" id="btndel" onclick="del()" value="DELETE">
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        var table = $('#tbunit').DataTable({
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
                url: "{{ route('unit') }}",
                'type': 'POST',
                'headers': {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            },
            columns: [{
                    data: 'id',
                    name: 'id',
                    width: "50",
                },
                {
                    data: 'kdlokasi',
                    name: 'kdlokasi',
                    width: "100",
                },
                {
                    data: 'nmrs',
                    name: '',
                    'width': '250'
                },
                {
                    data: 'dbname',
                    name: '',
                    width: "100%",
                },
                {
                    data: 'host',
                    name: '',
                    width: "100%",
                },
                {
                    data: 'username',
                    name: '',
                    width: "100%",
                },
                {
                    data: 'password',
                    name: '',
                    width: "100%",
                },
                {
                    data: 'port',
                    name: '',

                },
            ],
        });
    });
</script>
<script>
    jQuery(document).ready(function($) {
        $('#tbunit tbody').on('click', 'tr', function() {
            $('#btnsave').val('UPDATE DATA')
            var idData = $(this).find('td:eq(0)').text()
            $.ajax({
                url: "{{route('editunit')}}",
                type: 'POST',
                data: {
                    id: idData,
                    "_token": "{{csrf_token()}}"
                },
                success: function(res) {
                    $('#id').val(res.unit[0].id)
                    $('#kdlokasi').val(res.unit[0].kdlokasi)
                    $('#nmunit').val(res.unit[0].nmrs)
                    $('#nmdb').val(res.unit[0].dbname)
                    $('#hostdb').val(res.unit[0].host)
                    $('#userdb').val(res.unit[0].username)
                    $('#pasdb').val(res.unit[0].password)
                    $('#portdb').val(res.unit[0].port)
                }
            })
        })
    });
</script>
<script>
    function simpanedit() {
        if ($('#btnsave').val() != "SIMPAN") {
            $.ajax({
                url: "{{route('updateunit')}}",
                type: 'POST',
                data: {
                    id: $('#id').val(),
                    kdlokasi: $('#kdlokasi').val(),
                    nmunit: $('#nmunit').val(),
                    nmdb: $('#nmdb').val(),
                    hostdb: $('#hostdb').val(),
                    userdb: $('#userdb').val(),
                    pasdb: $('#pasdb').val(),
                    portdb: $('#portdb').val(),
                    "_token": "{{csrf_token()}}"
                },
                success: function(res) {

                    // $.toast({
                    //     position: 'top-right',
                    //     loaderBg: '#ff6849',
                    //     icon: 'success',
                    //     text: 'Data Berhasil Dirubah'
                    // })
                    $('#id').val(null),
                        $('#kdlokasi').val(null),
                        $('#nmunit').val(null),
                        $('#nmdb').val(null),
                        $('#hostdb').val(null),
                        $('#userdb').val(null),
                        $('#pasdb').val(null),
                        $('#portdb').val(null),
                        $('#tbunit').DataTable().ajax.reload();
                },
                error: function(xhr) {
                    alert(xhr.responJson.text)
                }
            })
        } else {
            $.ajax({
                url: "{{route('addunit')}}",
                type: 'POST',
                data: {
                    kdlokasi: $('#kdlokasi').val(),
                    nmunit: $('#nmunit').val(),
                    nmdb: $('#nmdb').val(),
                    hostdb: $('#hostdb').val(),
                    userdb: $('#userdb').val(),
                    pasdb: $('#pasdb').val(),
                    portdb: $('#portdb').val(),
                    "_token": "{{csrf_token()}}"
                },
                success: function(res) {

                    // $.toast({
                    //     position: 'top-right',
                    //     loaderBg: '#ff6849',
                    //     icon: 'success',
                    //     text: 'Data Berhasil Disimpan'
                    // })
                    $('#id').val(null),
                        $('#kdlokasi').val(null),
                        $('#nmunit').val(null),
                        $('#nmbank').val(null),
                        $('#norek').val(null),
                        $('#anrek').val(null),
                        $('#nmdb').val(null),
                        $('#hostdb').val(null),
                        $('#userdb').val(null),
                        $('#pasdb').val(null),
                        $('#portdb').val(null),
                        $('#tbunit').DataTable().ajax.reload();
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
            url: "{{route('deleteunit')}}",
            type: 'POST',
            data: {
                id: $('#id').val(),
                "_token": "{{csrf_token()}}"
            },
            success: function(res) {
                // $.toast({
                //     position: 'top-right',
                //     loaderBg: '#ff6849',
                //     icon: 'success',
                //     text: 'Data Berhasil Dirubah'
                // })
                $('#id').val(null),
                    $('#kdlokasi').val(null),
                    $('#nmunit').val(null),
                    $('#nmdb').val(null),
                    $('#hostdb').val(null),
                    $('#userdb').val(null),
                    $('#pasdb').val(null),
                    $('#portdb').val(null),
                    $('#tbunit').DataTable().ajax.reload();
            },
            error: function(xhr) {
                alert(xhr.responJson.text)
            }
        })
    };
</script>
@endsection