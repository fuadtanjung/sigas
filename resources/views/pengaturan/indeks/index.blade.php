@extends('layouts.app')

@push('styles_top')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatable/datatables.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/izitoast/iziToast.min.css') }}" />
@endpush

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Indeks Arsip</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Pengaturan</a></div>
            <div class="breadcrumb-item">Indeks</div>
        </div>
    </div>
    <section>
        <div class="card">
            <div class="card-header">
                <h4>Form Indeks Arsip</h4>
            </div>

            <form action="{{ route('indeks.store') }}" class="needs-validation" novalidate="" method="POST">
                @csrf
                @method('POST')
                <div class="ml-5 mr-5">
                    <div class="form-group">
                        <label>Nama Indeks Arsip</label>
                        <input name="nama_indeks" type="text" class="form-control form-control-sm" required="">
                        <div class="invalid-feedback">
                            Apa nama indeks arsip nya?
                        </div>
                    </div>
                </div>
                <div class="text-right mr-5 mb-3">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle mr-1"></i>
                        Tambah</button>
                </div>
            </form>

        </div>
    </section>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Table Indeks Arsip</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="myTable">
                                <thead style="font-size: 16px">
                                    <tr>
                                        <th class="text-center">
                                            No.
                                        </th>
                                        <th>Nama Indeks</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($indeks as $data_indeks )
                                    <tr>
                                        <td style="width: 5%" class="text-center">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td style="font-size: 15px">{{ $data_indeks->nama_indeks }}</td>
                                        <td>
                                            <button id="edit_indeks" data-id={{ $data_indeks->id }} data-nama="{{
                                                $data_indeks->nama_indeks }}" class="btn btn-primary float-left"
                                                data-toggle="modal" data-target="#exampleModal">
                                                <i class="fas fa-edit"></i> Edit
                                            </button>

                                            <form class="delete"
                                                action="{{ route('indeks.destroy',['indek'=>$data_indeks->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" value="Delete"
                                                    class="btn btn-danger float-left text-white ml-2"><i
                                                        class="fas fa-trash"></i> Hapus </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('pengaturan.indeks.modal')
@endsection

@push('styles_bottom')
<script type="text/javascript" src="{{ asset('assets/js/datatable/datatables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/izitoast/iziToast.min.js') }}"></script>
<script src=" {{ asset('assets/js/page/bootstrap-modal.js')}}"></script>
@endpush

@push('scripts_bottom')
<script>
    $(document).ready(function(){
    $('#myTable').DataTable();

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

    @if(Session::has('update'))
        iziToast.info({
        title: 'Berhasil',
        position: 'topRight',
        message: '{{ Session::get('update') }}',
        timeout :'2500',
        transitionIn: 'flipInX',
        transitionOut: 'flipOutX'
        });
    @endif

    @if(Session::has('delete'))
        iziToast.error({
        title: 'Berhasil',
        position: 'topRight',
        message: '{{ Session::get('delete') }}',
        timeout :'2500',
        transitionIn: 'flipInX',
        transitionOut: 'flipOutX'
        });
    @endif
    });

    $(document).on("click","#edit_indeks",function(){
        var indek = $(this).data('id');
        var nama = $(this).data('nama');
        var base = "{{ url('/') }}";
        var link = base+"/indeks/"+indek;

        $("#formEditIndeks").attr('action',link);
        $("#editNamaIndeks").val(nama);
    });
</script>
@endpush
