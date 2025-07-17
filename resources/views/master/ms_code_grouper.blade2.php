@extends('layout.master')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/toastr/toastr.min.css')}}">
@endsection

@section('konten')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Master Code Grouper</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class=" col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><b>Form Entry Master Code Grouper</b></h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="registrasi">
                            <div class="form-group">
                                <div class="card">
                                    <div class="card-header">
                                        <h2 class="card-title"><b>ICD 10 SERIES</b></h2>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-md-2">
                                                <label for="icd10_1">ICD 10 - 1</label><br>
                                                <select name="icd10_1" id="icd10_1" class="form-control select2bs4"></select>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>ICD 10 - 2</label><br>
                                                <select name="icd10_2" id="icd10_2" class="form-control select2bs4"></select>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>ICD 10 - 3 </label>
                                                <select name="icd10_3" id="icd10_3" class="form-control select2"></select>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>ICD 10 - 4</label>
                                                <select name="icd10_4" id="icd10_4" class="form-control select2"></select>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>ICD 10 - 5</label>
                                                <select name="icd10_5" id="icd10_5" class="form-control select2"></select>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>ICD 10 - 6</label>
                                                <select name="icd10_6" id="icd10_6" class="form-control select2"></select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div></br>
                            <div class="card">
                                <div class="card-header">
                                    <h2 class="card-title"><b>ICD 9 SERIES</b></h2>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                            <label for="icd9_1">ICD 9 - 1</label><br>
                                            <select name="icd9_1" id="icd9_1" class="form-control select2bs4"></select>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>ICD 9 - 2</label><br>
                                            <select name="icd9_2" id="icd9_2" class="form-control select2bs4"></select>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>ICD 9 - 3 </label>
                                            <select name="icd9_3" id="icd9_3" class="form-control select2"></select>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>ICD 9 - 4</label>
                                            <select name="icd9_4" id="icd9_4" class="form-control select2"></select>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>ICD 9 - 5</label>
                                            <select name="icd9_5" id="icd9_5" class="form-control select2"></select>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>ICD 9 - 6</label>
                                            <select name="icd9_6" id="icd9_6" class="form-control select2"></select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h2 class="card-title"><b>HAK KELAS RAWAT INAP</b></h2>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-md-6 row">
                                                <div class=" col-md-4" id="kls_rwt">
                                                    <label for="exampleSelectBorder">Kelas Rawat Inap</label>
                                                    <select class="custom-select form-control-border" id="seldata" name="seldata">
                                                        <option value="0" disabled="true" selected="true"></option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title"><b>INACBG SERIES</b></h2>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                </div>
                                <div class="card-body">
                                    <div class="col-md-12 row">
                                        <div class="col-md-2">
                                            <label for="">CODE GROUPER</label>
                                            <input type="text" class="form-control" id="code_grouper_inacbg" name="code_grouper_inacbg" placeholder="">
                                        </div>
                                        <div class="col-md-2">
                                            <label for="exampleSelectBorder">TARIF INACBG</label>
                                            <input type="text" class="form-control" id="tarif_inacbg" name="tarif_inacbg" placeholder="">
                                        </div>
                                        <div class="col-md-8">
                                            <label for="exampleSelectBorder">DESKRIPSI</label>
                                            <input type="text" class="form-control" id="deskripsi_inacbg" name="deskripsi_inacbg" placeholder="">
                                        </div>
                                        <div class="col-md-8">
                                            <label for="exampleSelectBorder"></label>
                                            <input type="text" class="form-control" id="idgrouper" name="idgrouper" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <input type="submit" class="btn btn-success" id="btnsave" onclick="" value="SAVE">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default2" id="btnmodal2" value="update" disabled>UPDATE</button>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-default3" id="btnmodal3" value="delete" disabled>DELETE</button>
                                </div>
                                <!-- <div class="col-lg-4 p-t-20">
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-default2" id="btnmodal2" value="SIMPAN" disabled>REJECT BERKAS</button>
                                </div>
                                <div class="col-lg-4 p-t-20">
                                    <br> <button type="button" class="btn btn-success" id="editdata" onclick="editdata()" disabled>EDIT DATA BERKAS</button>
                                </div> -->
                            </div>
                        </form>
                    </div>
                </div>
                <div class=" col-lg-12">
                    <div class="row">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Master Code Grouper</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="tbdatagrouper" class="display nowrap" width="100%">
                                    <thead>
                                        <tr>
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
        </div>
    </section>
</div>
<div class="modal fade" id="modal-default2">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="media">
                    <p>Apakah anda yakin ?</p>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal" id="" onclick="batalsave()">Tidak</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="updatedatamaster()">Iya</button>
            </div>
        </div>
    </div>
</div>
<section class="content">
</section>




@endsection


@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

<script>
    jQuery(document).ready(function() {
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
            autoWidth: false,
            "order": [
                [0, "asc"]
            ],
            ajax: {
                url: "{{route('codegrouper')}}",
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
        table.columns.adjust().draw();
    });
</script>
<script>
    jQuery(document).ready(function($) {
        $('#tbdatagrouper tbody').on('click', 'tr', function() {
            $('#btnsave').attr('disabled', true)
            var idData = $(this).find('td:eq(0)').text()
            $.ajax({
                url: "{{route('parsingdatagrouper')}}",
                type: 'POST',
                data: {
                    idData: idData,
                    "_token": "{{csrf_token()}}"
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
                    $("#seldata").append("<option value='" + res.codegrouper[0].kls_rwt + "' selected> KELAS " + res.codegrouper[0].kls_rwt + "</option>")
                    code_grouper_inacbg = $('#code_grouper_inacbg').val(res.codegrouper[0].code_grouper_inacbg)
                    tarif_inacbg = $('#tarif_inacbg').val(res.codegrouper[0].tarif_inacbg)
                    deskripsi_inacbg = $('#deskripsi_inacbg').val(res.codegrouper[0].deskripsi_inacbg)
                    $('#idgrouper').val(res.codegrouper[0].id)
                    $('#btnmodal2').attr('disabled', false),
                        toastr.success("Parsing Data Berhasil")
                }
            })
        })
    });
</script>
<script>
    $(document).ready(function() {
        $("#icd10_1,#icd10_2,#icd10_3,#icd10_4,#icd10_5,#icd10_6").select2({
            placeholder: "Select ICD 10",
            theme: 'bootstrap4',
            allowClear: true,
            ajax: {
                url: "{{route('selicd10')}}",
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
            theme: 'bootstrap4',
            allowClear: true,
            ajax: {
                url: "{{route('selicd9')}}",
                dataType: 'json',
                type: "GET",
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
    jQuery(document).ready(function() {

        var div = $('#kls_rwt').parent();
        var op = " ";
        $.ajax({
            type: 'get',
            url: "{{ route('kls_rwt') }}",
            success: function(kls_rwt) {
                op += '<option value="0" selected disabled>Pilih Kelas</option>';
                for (var i = 0; i < kls_rwt.length; i++) {
                    op += '<option value="' + kls_rwt[i].id + '">' + "KELAS " + kls_rwt[i].kls_rwt + '</option>';
                }
                div.find('#seldata').html(" ");
                div.find('#seldata').append(op);

            },
            error: function() {}
        })
    });
</script>
<script>
    $(function() {
        $.validator.setDefaults({
            submitHandler: function() {
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
                kls_rwt = $('#seldata').val()
                code_grouper_inacbg = $('#code_grouper_inacbg').val()
                tarif_inacbg = $('#tarif_inacbg').val()
                deskripsi_inacbg = $('#deskripsi_inacbg').val()

                $.ajax({
                    url: "{{route('savegrouper')}}",
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
                        "_token": "{{csrf_token()}}"
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
                            $('#seldata').val(0),
                            $('#code_grouper_inacbg').val(null),
                            $('#tarif_inacbg').val(null),
                            $('#deskripsi_inacbg').val(null)
                    },
                    error: function(xhr) {}
                })
            }
        });
        $('#registrasi').validate({

            rules: {
                icd10_1: {
                    required: true,
                },
                icd9_1: {
                    required: true,
                },
                seldata: {
                    required: true,
                },
                code_grouper_inacbg: {
                    required: true,
                },
                tarif_inacbg: {
                    required: true,
                },
                deskripsi_inacbg: {
                    required: true,
                }
            },
            messages: {
                icd10_1: {
                    required: "Wajib Diisi",
                },
                icd9_1: {
                    required: "Wajib Diisi",
                },
                seldata: {
                    required: "Wajib Diisi",
                },
                code_grouper_inacbg: {
                    required: "Wajib Diisi",
                },
                tarif_inacbg: {
                    required: "Wajib Diisi",
                },
                deskripsi_inacbg: {
                    required: "Wajib Diisi",
                }
            },
            errorElement: 'span',

            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        })
    })
</script>
<script>
    function updatedatamaster() {
        console.log($('#seldata').val())
        $.ajax({
            url: "{{route('updatedatamaster')}}",
            type: 'post',
            dataType: "JSON",
            data: {
                idgrouper: $('#idgrouper').val(),
                icd10_1: $('#icd10_1').val(),
                icd10_2:$('#icd10_2').val(),
                icd10_3: $('#icd10_3').val(),
                icd10_4: $('#icd10_4').val(),
                icd10_5: $('#icd10_5').val(),
                icd10_6: $('#icd10_6').val(),
                icd9_1: $('#icd10_1').val(),
                icd9_2: $('#icd10_2').val(),
                icd9_3: $('#icd10_3').val(),
                icd9_4: $('#icd10_4').val(),
                icd9_5: $('#icd10_5').val(),
                icd9_6: $('#icd10_6').val(),
                kls_rwt: $('#seldata').val(),
                code_grouper_inacbg: $('#code_grouper_inacbg').val(),
                tarif_inacbg: $('#tarif_inacbg').val(),
                deskripsi_inacbg:  $('#deskripsi_inacbg').val(),
              
                "_token": "{{csrf_token()}}"
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
                    $('#seldata').val(0),
                    $('#code_grouper_inacbg').val(null),
                    $('#tarif_inacbg').val(null),
                    $('#deskripsi_inacbg').val(null)
                    $('#idgrouper').val(null)
                $('#tbdatagrouper').DataTable().ajax.reload();
            },
            error: function(xhr) {

            }
        })
    }
</script>
@endsection