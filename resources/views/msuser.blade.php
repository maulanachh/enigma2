@extends('layout.master')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endsection


@section('konten')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Master</a></li>
                        <li class="breadcrumb-item active">User</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class=" col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tabel Master User</h3>

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
                        <table id="tbuser" class="display">
                            <thead>
                                <tr>
                                    <th> No Id </th>
                                    <th> Nama </th>
                                    <th> Username </th>
                                    <th> Nama RS </th>
                                    <th> Nama Unit Kerja </th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
            <div class=" col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Form User</h3>
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
                                <div class="form-group col-md-6">
                                    <label for="">No Id</label>
                                    <input type="text" class="form-control" id="id" placeholder="" disabled>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Nama</label>
                                    <input type="text" class="form-control" id="nama" placeholder="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Username</label>
                                    <input type="text" class="form-control" id="username" placeholder="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="selunit">Unit RS</label><br>
                                    <select name="selunit" id="selunit" class="form-control select2" style="width: 100%;"></select>
                                </div>
                                <div class="form-group col-md-6" id="divisi">
                                    <label for="exampleSelectBorder">Pilih Ruangan/Urusan</label>
                                    <select class="custom-select form-control-border" id="seldiv" name="seldiv">
                                        <option value="0" disabled="true" selected="true"></option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Ganti Password</label>
                                    <input type="text" class="form-control" id="pswd" placeholder="">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>


<script>
    $(document).ready(function() {
        var table = $('#tbuser').DataTable({
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
                url: "{{ route('user') }}",
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
                    data: 'nama',
                    name: 'nama',
                    width: "250",
                },
                {
                    data: 'username',
                    name: 'username',
                    'width': '100'
                },
                {
                    data: 'nmrs',
                    name: 'nmrs',
                    width: "300",
                },
                {
                    data: 'nmunit',
                    name: 'nmunit',
                    width: "100%",
                },
            ],
        });
    });
</script>
<script>
    $(document).ready(function() {
        $("#selunit").select2({
            placeholder: "Select Unit RS",
            minimumInputLength: 2,
            theme: 'bootstrap4',
            ajax: {
                url: "{{route('selunit')}}",
                dataType: 'json',
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: function(term) {
                    return {
                        term: term
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
                    };
                }
            }
        });
    });
</script>

<!-- <script>
    jQuery(document).ready(function() {
        $('#selunit').select2({
            theme: 'bootstrap4'
        });
    });
</script> -->
<script>
    jQuery(document).ready(function($) {
        $('#tbuser tbody').on('click', 'tr', function() {
            $('#btnsave').val('UPDATE DATA')
            var idData = $(this).find('td:eq(0)').text();
            $.ajax({
                url: "{{route('edituser')}}",
                type: 'POST',
                data: {
                    id: idData,
                    "_token": "{{csrf_token()}}"
                },
                success: function(res) {
                    $('#id').val(res.user[0].id)
                    $('#nama').val(res.user[0].nama)
                    $('#username').val(res.user[0].username)
                    $('#selunit').html('<option value="' + res.user[0].kdlokasi + '">' + res.user[0].nmrs + '</option>')
                    $('#nmunit').val(res.user[0].nmunit)
                }
            })
            //     $('#selunit').on('select2:open', function(e) {
            //         e.preventDefault;
            //             var div = $('#unit').parent();
            //             var op = " ";
            //             $.ajax({
            //                 type: 'get',
            //                 url: "{{route('selunit')}}",
            //                 success: function(unit) {
            //                     op += '<option value="0" selected disabled>---silahkan pilih---</option>';
            //                     for (var i = 0; i < unit.length; i++) {
            //                         op += '<option value="' + unit[i].kdlokasi + '">' + unit[i].nmrs + '</option>';
            //                     }
            //                     div.find('#selunit').html(" ");
            //                     div.find('#selunit').append(op);

            //                 },
            //                 error: function() {}
            //             });
            //         });
            //         $('#selunit').val(res.user[0].nmrs, true);
        })
    });
</script>


@endsection