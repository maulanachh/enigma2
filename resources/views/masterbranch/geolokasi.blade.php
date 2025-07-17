@extends('layout.master')

@section('css')
<link href="{{asset('dist/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />

@endsection


@section('konten')
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
                        Menu Master Branch/Unit</h1>
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
                        <li class="breadcrumb-item text-muted">Branch/Unit</li>
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
                    <div class="card shadow-sm">
                        <div class="card-header collapsible cursor-pointer rotate" data-bs-toggle="collapse" data-bs-target="#table_lokasi">
                            <h3 class="card-title">Tabel Master Branch/Unit</h3>
                            <div class="card-toolbar rotate-180">
                                <span class="svg-icon svg-icon-1">
                                    ...
                                </span>
                            </div>
                        </div>
                        <div id="table_lokasi" class="collapse show">
                            <div class="card-body">
                                <table id="tbgeolokasi" class="table table-striped table-row-bordered gy-5 gs-7 border rounded display nowrap" width="100%">
                                    <thead>
                                        <tr class="fw-bold fs-6 text-gray-800 px-7">
                                            <th> No Id </th>
                                            <th> kdlokasi </th>
                                            <th> Nama Branch/Unit </th>
                                            <th> altitude </th>
                                            <th> longitude </th>
                                            <th> Toleransi Simpangan </th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" col-lg-4">
                    <div class="card shadow-sm">
                        <div class="card-header collapsible cursor-pointer rotate" data-bs-toggle="collapse" data-bs-target="#form_lokasi">
                            <h3 class="card-title">Form Geolokasi</h3>
                            <div class="card-toolbar rotate-180">
                                <span class="svg-icon svg-icon-1">
                                    ...
                                </span>
                            </div>
                        </div>
                        <div id="form_lokasi" class="collapse show">
                            <div class="card-body">
                                <div class="form-group" id="formgeolokasi">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="">ID</label>
                                            <input type="text" class="form-control" id="id" placeholder="" disabled>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Nama Branch/Unit</label>
                                            <select class="form-select" data-control="select2" id="branch"></select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Altitude</label>
                                            <input type="text" class="form-control" id="altitude" placeholder="">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Longitude</label>
                                            <input type="text" class="form-control" id="longitude" placeholder="">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Toleransi Simpangan</label>
                                            <input type="text" class="form-control" id="simpangan" placeholder="">
                                        </div>
                                    </div><br>
                                    <input type="submit" class="btn btn-success" id="btnsave" onclick="simpanedit()" value="SIMPAN">
                                    <input type="submit" class="btn btn-danger" id="btndel" onclick="del()" value="DELETE">
                                    <input type="submit" class="btn btn-primary" id="btndel" onclick="getLocation()" value="GET LOCATION">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection

@section('js')

<script src="{{asset('dist/plugins/custom/datatables/datatables.bundle.js')}}"></script>
<script>
    jQuery(document).ready(function($) {
        $('#tbgeolokasi thead tr').clone(true).appendTo('#tbgeolokasi thead');
        $('#tbgeolokasi thead tr:eq(1) th').each(function(i) {
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
        var table = $('#tbgeolokasi').DataTable({
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
                url: "{{ route('geolokasi') }}",
                'type': 'POST',
                'headers': {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            },
            columns: [{
                    data: 'id',
                },
                {
                    data: 'kdlokasi',
                },
                {
                    data: 'nm_branch',
                },
                {
                    data: 'altitude',
                },
                {
                    data: 'longitude',
                },
                {
                    data: 'tolerance_at',
                }
            ],
        });
    });
</script>
<script>
    jQuery(document).ready(function($) {
        $('#tbgeolokasi tbody').on('click', 'tr', function() {
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
    $(document).ready(function() {
        $("#branch").select2({
            placeholder: "Pilih Branch/Unit",
            allowClear: true,
            ajax: {
                url: "{{route('selbranch')}}",
                dataType: 'json',
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
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
    function simpanedit() {
        var data = $('#branch').select2('data');
        data.forEach(function(item) {
            nm_branch = item.text
          return nm_branch;        
        })
        if ($('#btnsave').val() != "SIMPAN") {
            $.ajax({
                url: "",
                type: 'POST',
                data: {
                    id: $('#id').val(),
                    id_branch: $('#branch').val(),
                    nm_branch: nm_branch,
                    altitude: $('#altitude').val(),
                    longitude: $('#longitude').val(),
                    simpangan: $('#simpangan').val(),
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
                        $('#branch').empty().trigger('change'),
                        $('#altitude').val(null),
                        $('#longitude').val(null),
                        $('#simpangan').val(null),
                        $('#tbgeolokasi').DataTable().ajax.reload();
                },
                error: function(xhr) {
                    alert(xhr.responJson.text)
                }
            })
        } else {
            $.ajax({
                url: "{{route('addgeo')}}",
                type: 'POST',
                data: {
                    id_branch: $('#branch').val(),
                    nm_branch: nm_branch,
                    altitude: $('#altitude').val(),
                    longitude: $('#longitude').val(),
                    simpangan: $('#simpangan').val(),
                    "_token": "{{csrf_token()}}"
                },
                success: function(res) {
                    $('#id').val(null),
                        $('#branch').empty().trigger('change'),
                        $('#altitude').val(null),
                        $('#longitude').val(null),
                        $('#simpangan').val(null),
                        $('#tbgeolokasi').DataTable().ajax.reload(),
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
                    $('#tbgeolokasi').DataTable().ajax.reload();
            },
            error: function(xhr) {
                alert(xhr.responJson.text)
            }
        })
    };
</script>
<script>
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.watchPosition(showPosition);
        } else {
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
    }

    function showPosition(position) {

        $('#longitude').val(position.coords.longitude)
        $('#altitude').val(position.coords.latitude)
    }
</script>

@endsection