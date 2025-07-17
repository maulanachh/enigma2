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
                                            <th>Action</th>
                                            <th>Nomer Registrasi</th>
                                            <th>Nama Pasien</th>
                                            <th>Indikator Billing</th>
                                            <th>Plafon InaCBG'S </th>
                                            <th>Total Billing RS </th>
                                            <th>Persentase Billing => Plafon </th>
                                            <th>selisih Billing & Plafon </th>
                                        </tr>
                                    </thead>
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
                                                    <div class="row col-lg-12">
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
                                                    <div class="row col-lg-12">
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
                                                            <input type="text" class="form-control" name="tarif_inacbg" id="nori" placeholder="Nomer Register" disabled>
                                                        </div>
                                                        <div class="fv-row col-md-5">
                                                            <input type="submit" class="btn btn-primary" id="btnupdate" value="UPDATE INACBG'S" disabled>
                                                        </div>
                                                        <div class="fv-row col-md-3">
                                                            <label for=""></label>
                                                            <input type="text" class="form-control" id="idgrouper" placeholder="" hidden>
                                                        </div>
                                                    </div><br>
                                                    <!-- <input type="submit" class="btn btn-success" id="btnsave" onclick="" value="SAVE"> -->

                                                    <!-- <button type="button" class="btn btn-danger" id="btndel" onclick="del()" value="DELETE" disabled>DELETE</button> -->
                                                    <!-- <input type="submit" class="btn btn-success" id="btnsave" onclick="simpanedit()" value="SIMPAN">
                                        <input type="submit" class="btn btn-danger" id="btndel" onclick="del()" value="DELETE"> -->
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
@endsection

@section('js')

<script src="{{asset('dist/plugins/custom/datatables/datatables.bundle.js')}}"></script>

<script>
    $(document).ready(function() {
        $("#icd10_1,#icd10_2,#icd10_3,#icd10_4,#icd10_5,#icd10_6").select2({
            placeholder: "Select ICD 10",
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
    $(document).ready(function() {
        $("#klsrwt").select2({
            placeholder: "Select Kelas Rawat Inap",
            allowClear: true,
            ajax: {
                url: "{{route('kls_rwt')}}",
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
    $(form.querySelector('[name="icd10_1, icd9_1"]')).on('change', function() {
        // Revalidate the field when an option is chosen
        validator.revalidateField('icd10_1');
        validator.revalidateField('icd9_1');
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

                    $.ajax({
                        url: "{{route('updateina')}}",
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
                                $('#klsrwt').empty().trigger('change'),
                                $('#nmpasien').val(null),
                                $('#nori').val(null),
                                $('#btnupdate').attr('disabled', true)
                            $('#tbdatabilling').DataTable().ajax.reload();
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
            iDisplayLength: 10,
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
                url: "{{ route('datatable') }}",
                type: 'GET',
                data: function(d) {
                    d.start = d.start || 0;
                    d.length = d.length || 10;
                },
                success: function(data) {
                    let finalArray = [];
                    let recordsTotal = data.recordsTotal;
                    let recordsFiltered = data.recordsFiltered;
                    let dataLength = data.data.length;
                    let totalPages = data.totalPages; // perhatikan bahwa ada penambahan variabel di sini

                    for (let i = 0; i < dataLength; i++) {}

                    table.clear().draw();
                    table.rows.add(finalArray);
                    table.draw();

                    // pastikan ini dipanggil setelah variabel totalPages terdefinisi
                    table.page.info().pages = totalPages;
                    table.page.info().recordsTotal = recordsTotal;
                    table.page.info().recordsDisplay = recordsFiltered;
                    $('.paginate_button').removeClass('current');
                    $('.paginate_button').eq(0).addClass('current');
                    $('.paginate_button').eq(0).addClass('disabled');
                    $('.paginate_button').eq(0).attr('aria-disabled', 'true');
                    $('.paginate_button').eq(-1).addClass('disabled');
                    $('.paginate_button').eq(-1).attr('aria-disabled', 'true');
                    $('.ellipsis').remove();
                    $('.next').before('<span class="ellipsis">...</span>');
                    $('.previous').after('<a class="paginate_button ellipsis">...</a>');
                    let pagination = $('.dataTables_paginate');
                    pagination.html('');
                    pagination.append('<a class="paginate_button previous">Prev</a>');
                    for (let i = 1; i <= totalPages; i++) {
                        pagination.append('<a class="paginate_button">' + i + '</a>');
                    }
                    pagination.append('<a class="paginate_button next">Next</a>');
                    pagination.append('<input class="paginate_button" type="number" min="1" max="' + totalPages + '">');
                    pagination.append('<a class="paginate_button">Go</a>');
                }
            },
            "paging": true, // Enable pagination
            language: {
                "paginate": {
                    "first": "First",
                    "last": "Last",
                    "next": "Next",
                    "previous": "Prev"
                }
            },
            lengthChange: true, // mengaktifkan opsi perubahan jumlah data per halaman

            lengthMenu: [10, 25, 50, 100], // Set available page lengths
            pageLength: 10, // Set default page length
            columns: [{
                    data: 'actions',
                    render: function(data, type, row, meta) {
                        return '<button type="button" class="btn btn-info first-button" id="showdetail">detail</button>' +
                            '<button class="btn btn-success second-button" id="editdata"">Edit</button>';
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
            pagingType: 'full_numbers',
            drawCallback: function(settings) {
                console.log(data.totalPages);
                var pagination = $(this).closest('.dataTables_wrapper').find('.dataTables_paginate');
                if (pagination.length === 0) {
                    $(this).closest('.dataTables_wrapper').append('<div class="dataTables_paginate paging_simple_numbers"></div>');
                    pagination = $(this).closest('.dataTables_wrapper').find('.dataTables_paginate');
                }
                pagination.html(table.page.info().pages);
                console.log(table.page.info().pages)
            }
        });
        table.on('page.dt', function() {
            var info = table.page.info();
            var start = info.start;
            var length = info.length;
            var url = "{{ route('datatable') }}";
            table.ajax.url(url + start + '/' + length).load();
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
                url: "{{route('parsingdatapasbil')}}",
                type: 'POST',
                data: {
                    nori: idData,
                    "_token": "{{csrf_token()}}"
                },
                success: function(res) {
                    console.log(res.parsedatapasbil)
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
                    $('#nmpasien').val(res.parsedatapasbil[0].nmpasien)
                    $('#nori').val(res.parsedatapasbil[0].nori)
                    $('#btnupdate').attr('disabled', false),
                        $('#btndel').attr('disabled', false),
                        toastr.success("Parsing Data Berhasil")
                }
            })

        });

        // Formatting function for row details
        function format(d) {
            // `d` is the original data object for the row
            return '<table class="table table-bordered" cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
                '<tr>' +
                '<th><b>ICD10 Ke - 1 : </b>' + d.icd10_1 + '</th>' +
                '<th><b>ICD10 Ke - 2 :  </b>' + d.icd10_2 + '</th>' +
                '<th><b>ICD10 Ke - 3 :  </b>' + d.icd10_3 + '</th>' +
                '<th><b>ICD10 Ke - 4 :  </b>' + d.icd10_4 + '</th>' +
                '<th><b>ICD10 Ke - 5 :  </b>' + d.icd10_5 + '</th>' +
                '<th><h1>|</h1></th>' +
                '<th><b>ICD9 Ke - 1 :  </b>' + d.icd9_1 + '</th>' +
                '<th><b>ICD9 Ke - 2 :  </b>' + d.icd9_2 + '</th>' +
                '<th><b>ICD9 Ke - 3 :  </b>' + d.icd9_3 + '</th>' +
                '<th><b>ICD9 Ke - 4 :  </b>' + d.icd9_4 + '</th>' +
                '<th><b>ICD9 Ke - 5 :  </b>' + d.icd9_5 + '</th>' +
                '<th><b>ICD9 Ke - 6 :  </b>' + d.icd9_6 + '</th>' +
                '</tr>' +
                '</table>' +
                '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
                '<tr>' +
                '<th><b>Code Grouper InaCBG : </b>' + d.code_grouper + '</th>' +
                '</tr>' +
                '<tr>' +
                '<th><b>Hak Kelas : </b>Kelas ' + d.kls_rwt + '</th>' +
                '</tr>' +
                '</table>';
        }

    });
</script>



@endsection