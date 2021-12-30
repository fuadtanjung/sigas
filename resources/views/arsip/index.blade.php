@extends('layouts.app')

@push('styles_top')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatable/datatables.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/izitoast/iziToast.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/select2/select2.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datepicker/bootstrap-datepicker.min.css') }}" />
@endpush

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Arsip</h1>
    </div>
    <section>
        <div class="card">
            <div class="card-header">
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample"
                    aria-expanded="false" aria-controls="collapseExample">
                    <i class="fas fa-file-alt mr-2"></i>Form Arsip
                </button>
            </div>
            <div class="collapse" id="collapseExample">
                @include('arsip.includes.form')
            </div>
        </div>
    </section>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Table Arsip</h4>
                    </div>

                    <div class="ml-4">
                        <a href="{{ route('export') }}" class="btn btn-primary text-white" type="button">
                            <i class="fas fa-file-excel mr-2"></i>Export Excel</a>
                    </div>

                    <div class="card-body">
                        <div>
                            <table class="table table-striped table-bordered" id="datatable">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            No.
                                        </th>
                                        <th>Indeks</th>
                                        <th>Deskripsi</th>
                                        <th>Waktu</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @foreach ($arsip as $data )
                                    <tr>
                                        <td style="width : 1%" class="text-center">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td style="width : 17%">{{ $data->indeks }}</td>
                                        <td style="width: 50%">{{ $data->deskripsi }}</td>
                                        <td style="width : 5%">{{ $data->tahun }}</td>
                                        <td style="width : 27%">

                                            <button id="detail" data-tingkatperkembangan={{
                                                $data->tingkatperkembangan->nama_tingkat_perkembangan }}
                                                data-bentuk={{ $data->bentuk->nama_bentuk }}
                                                data-keterangan={{ $data->keterangan->nama_keterangan }}
                                                data-indeks="{{$data->indeks }}"
                                                data-deskripsi="{{$data->deskripsi }}"
                                                data-jumlah="{{$data->jumlah }}"
                                                data-tahun="{{$data->jumlah }}"
                                                data-rak="{{$data->rak }}"
                                                data-roll_o_pack="{{$data->roll_o_pack }}"
                                                data-boks="{{$data->boks }}"
                                                data-bungkus="{{$data->bungkus }}"
                                                data-buku="{{$data->buku }}"
                                                data-sampul="{{$data->sampul }}"
                                                class="btn float-left btn-primary btn-sm"
                                                data-toggle="modal"
                                                data-target="#detailModal">
                                                <i class="fas fa-eye"></i>
                                                Detail
                                            </button>

                                            <button id="edit_indeks" data-id={{ $data->id }} data-nama="{{
                                                $data->indeks }}" class="btn float-left btn-primary btn-sm ml-2"
                                                data-toggle="modal" data-target="#exampleModal">
                                                <i class="fas fa-edit"></i>Edit
                                            </button>

                                            <form class="delete"
                                                action="{{ route('indeks.destroy',['indek'=>$data->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" value="Delete"
                                                    class="btn btn-danger btn-sm text-white float-left ml-2"><i
                                                        class="fas fa-trash"></i>Hapus
                                                </button>
                                        </td>
                                    </tr>
                                    @endforeach --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('arsip.includes.modal')
@include('arsip.includes.edit')
@endsection

@push('styles_bottom')
<script src="{{ asset('assets/js/datatable/datatables.min.js') }}"></script>
<script src="{{ asset('assets/js/izitoast/iziToast.min.js') }}"></script>
<script src="{{ asset('assets/js/select2/select2.min.js') }}"></script>
<script src="{{ asset('assets/js/datepicker/bootstrap-datepicker.min.js') }}"></script>
<script src=" {{ asset('assets/js/page/bootstrap-modal.js')}}"></script>
@endpush

@push('scripts_bottom')
<script type="text/javascript">
    function loadData() {
                $('#datatable').dataTable({
                    "ajax": "{{ url('/arsip/data') }}",
                    "columns": [
                        { "data": "id" },
                        { "data": "indeks" },
                        { "data": "deskripsi" },
                        { "data": "tahun" },
                        {
                            render: function() {
                                return '<a href="#" id="detail" class="btn btn-success btn-sm"><i class="fas fa-eye mr-1"></i> Detail</a> &nbsp' +
                                    '<a href="#" id="edit" class="btn btn-primary btn-sm"><i class="fas fa-edit mr-1"></i> Edit</a> &nbsp' +
                                    '<a href="#" id="delete" class="btn btn-danger btn-sm"><i class="fa fa-trash mr-1"></i> Hapus</a>'
                            }
                        }
                    ],
                    columnDefs: [
                        {
                            width: "1%",
                            targets: [0]
                        },
                        {
                            width: "15%",
                            targets: [1]
                        },
                        {
                            width: "47%",
                            targets: [2]
                        },
                        {
                            width: "3%",
                            targets: [3]
                        },
                        {
                            width: "35%",
                            targets: [4]
                        },
                    ],
                    order: [ [0, 'desc'] ]
                });
            }

            $(window).on('load', function () {
                loadData();

                {{--menampilkan detail--}}
                $('#datatable tbody').on('click', '#detail', function (e) {
                var table = $('#datatable').DataTable();
                var data = table.row( $(this).parents('tr') ).data();
                $('#indeks').val(data.indeks);
                $('#deskripsi').val(data.deskripsi);
                $('#tahun').val(data.tahun);
                $('#tingkat_perkembangan').val(data.tingkatperkembangan.nama_tingkat_perkembangan);
                $('#jumlah').val(data.jumlah);
                $('#keterangan').val(data.keterangan.nama_keterangan);
                $('#bentuk').val(data.bentuk.nama_bentuk);
                $('#rak').val(data.rak);
                $('#roll_o_pack').val(data.roll_o_pack);
                $('#boks').val(data.boks);
                $('#bungkus').val(data.bungkus);
                $('#buku').val(data.buku);
                $('#sampul').val(data.sampul);
                $('#detailModal').modal('toggle');
                } );

               $('#datatable tbody').on('click', '#edit', function (e) {
                    var table = $('#datatable').DataTable();
                    var data = table.row( $(this).parents('tr') ).data();
                    var base = "{{ url('/') }}";
                    var link = base+"/arsip/edit/"+ data.id;
                    $('#indeks_edit').val(data.indeks);
                    $('#deskripsi_edit').val(data.deskripsi);
                    $('#tahun_edit').val(data.tahun);
                    $('#tingkat_perkembangan_edit').val(data.tingkatperkembangan.id).change();
                    $('#jumlah_edit').val(data.jumlah);
                    $('#keterangan_edit').val(data.keterangan.id).change();
                    $('#bentuk_edit').val(data.bentuk.id).change();
                    $('#rak_edit').val(data.rak);
                    $('#roll_o_pack_edit').val(data.roll_o_pack);
                    $('#boks_edit').val(data.boks);
                    $('#bungkus_edit').val(data.bungkus);
                    $('#buku_edit').val(data.buku);
                    $('#sampul_edit').val(data.sampul);
                    $('#editModal').modal('toggle');
                    $("#formEditArsip").attr('action',link);
                } );

                @if(Session::has('success'))
                    iziToast.success({
                    title: 'Berhasil',
                    position: 'topRight',
                    message: '{{ Session::get('success') }}',
                    timeout :'2500',
                    transitionIn: 'flipInX',
                    transitionOut: 'flipOutX'
                    });
                    @endif

                @if(Session::has('error'))
                    iziToast.error({
                    title: 'Gagal',
                    position: 'topRight',
                    message: '{{ Session::get('error') }}',
                    timeout :'2500',
                    transitionIn: 'flipInX',
                    transitionOut: 'flipOutX'
                    });
                    @endif

                // LIST

                $.ajax({
                    url: '{{ url('list/tingkat') }}',
                    dataType: "json",
                    success: function (data) {
                    var tingkat = jQuery.parseJSON(JSON.stringify(data));
                    $.each(tingkat, function (k, v) {
                    $('#tingkat_perkembangan_edit').append($('<option>', {value: v.id}).text(v.nama_tingkat_perkembangan))
                    })
                    }
                });
                $.ajax({
                    url: '{{ url('list/bentuk') }}',
                    dataType: "json",
                    success: function (data) {
                    var bentuk = jQuery.parseJSON(JSON.stringify(data));
                    $.each(bentuk, function (k, v) {
                    $('#bentuk_edit').append($('<option>', {value: v.id}).text(v.nama_bentuk))
                    })
                    }
                });
                $.ajax({
                    url: '{{ url('list/tingkat') }}',
                    dataType: "json",
                    success: function (data) {
                    var keterangan = jQuery.parseJSON(JSON.stringify(data));
                    $.each(keterangan, function (k, v) {
                    $('#keterangan_edit').append($('<option>', {value: v.id}).text(v.nama_keterangan))
                    })
                    }
                });


                $('#datatable tbody').on('click', '#delete', function (e) {
                    var table = $('#datatable').DataTable();
                    var data = table.row( $(this).parents('tr') ).data();
                    iziToast.question({
                        timeout: 5000,
                        close: false,
                        overlay: true,
                        displayMode: 'once',
                        id: 'question',
                        zindex: 999,
                        title: 'Konfirmasi',
                        message: 'Anda Yakin Menghapus Data Arsip Ini?',
                        position: 'center',
                        buttons: [
                            ['<button><b>Iya!</b></button>', function (instance, toast) {
                                $.ajax({
                                    url: "{{ url('/arsip/delete/') }}/" + data.id,
                                    type: "post",
                                    data: {
                                        "_token": "{{ csrf_token() }}",
                                    },
                                    cache: false,
                                    success: function (response) {
                                        var pesan = JSON.parse(response);
                                        if(pesan.error != null){
                                            iziToast.error({
                                                title: 'Gagal',
                                                position: 'topRight',
                                                message: pesan.error,
                                                timeout :'2500',
                                                transitionIn: 'flipInX',
                                                transitionOut: 'flipOutX'
                                            });
                                            table.destroy();
                                            loadData();
                                        }else if(pesan.success != null){
                                            iziToast.success({
                                                title: 'Berhasil',
                                                position: 'topRight',
                                                message: pesan.success,
                                                timeout :'2500',
                                                transitionIn: 'flipInX',
                                                transitionOut: 'flipOutX'
                                            });
                                            table.destroy();
                                            loadData();
                                        }
                                    },
                                    fail: function () {
                                        iziToast.error({
                                            title: 'Gagal',
                                            message: 'Gagal Menambahkan Data pengguna',
                                            transitionOut: 'fadeOutUp',
                                            timeout :'2500',
                                            transitionIn: 'flipInX',
                                            transitionOut: 'flipOutX'
                                        });
                                    },
                                });
                                instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');
                            }, true],
                            ['<button>Tidak</button>', function (instance, toast) {
                                iziToast.info({
                                    title: 'Info',
                                    position: 'topRight',
                                    message: 'Data Arsip Tidak Di Hapus',
                                    timeout :'2500',
                                    transitionIn: 'flipInX',
                                    transitionOut: 'flipOutX'
                                });
                                instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');

                            }],
                        ],

                        onClosing: function(instance, toast, closedBy){
                            console.info('Closing | closedBy: ' + closedBy);
                        },
                        onClosed: function(instance, toast, closedBy){
                            console.info('Closed | closedBy: ' + closedBy);
                        }
                    });
                });
            })

        $('.datepicker').datepicker({
        format: "yyyy",
        viewMode: "years",
        minViewMode: "years",
        autoclose:true
        });
</script>
@endpush
