@extends('layouts.app')

@push('styles_top')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.3/datatables.min.css" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/izitoast/iziToast.min.css') }}" />
@endpush

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Tingkat Perkembangan Arsip</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Pengaturan</a></div>
            <div class="breadcrumb-item">Tingkat Perkembangan</div>
        </div>
    </div>
    <section>
        <div class="card">
            <div class="card-header">
                <h4>Form Tingkat Perkembangan Arsip</h4>
            </div>

            <form action="{{ route('tingkat_perkembangans.store') }}" class="needs-validation" novalidate="" method="POST">
                @csrf
                @method('POST')
                <div class="ml-5 mr-5">
                    <div class="form-group">
                        <label>Nama Tingkat Perkembangan Arsip</label>
                        <input name="nama_tingkat_perkembangan" type="text" class="form-control form-control-sm" required="">
                        <div class="invalid-feedback">
                            Apa nama tingkat perkembangan arsip nya?
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
                        <h4>Table Tingkat Perkembangan Arsip</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="myTable">
                                <thead style="font-size: 16px">
                                    <tr>
                                        <th class="text-center">
                                            No.
                                        </th>
                                        <th>Nama Tingkat Perkembangan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tkt_perkembangan as $data_perkembangan )
                                    <tr>
                                        <td style="width: 5%" class="text-center">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td style="font-size: 15px">{{ $data_perkembangan->nama_tingkat_perkembangan }}</td>
                                        <td>
                                            <button id="edit_tkt_perkembangan" data-id={{ $data_perkembangan->id }} data-nama="{{
                                                $data_perkembangan->nama_tingkat_perkembangan }}" class="btn btn-primary float-left"
                                                data-toggle="modal" data-target="#exampleModal">
                                                <i class="fas fa-edit"></i> Edit
                                            </button>

                                            <form class="delete"
                                                action="{{ route('tingkat_perkembangans.destroy',['tingkat_perkembangan'=>$data_perkembangan->id]) }}"
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
@include('pengaturan.tingkat_perkembangan.modal')
@endsection

@push('styles_bottom')
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.11.3/datatables.min.js"></script>
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

    $(document).on("click","#edit_tkt_perkembangan",function(){
        var tingkat_perkembangan = $(this).data('id');
        var nama = $(this).data('nama');
        var base = "{{ url('/') }}";
        var link = base+"/tingkat_perkembangans/"+tingkat_perkembangan;

        $("#formEditPerkembangan").attr('action',link);
        $("#editNamaPerkembangan").val(nama);
    });
</script>
@endpush