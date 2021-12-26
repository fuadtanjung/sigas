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
                        <h4>Table Indeks Arsip</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="myTable">
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
                                    @foreach ($arsip as $data_indeks )
                                    <tr>
                                        <td style="width: 5%" class="text-center">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td style="font-size: 15px">{{ $data_indeks->indeks->nama_indeks }}</td>
                                        <td style="font-size: 15px">{{ $data_indeks->deskripsi }}</td>
                                        <td style="font-size: 15px">{{ $data_indeks->tahun }}</td>
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
@endsection

@push('styles_bottom')
<script src="{{ asset('assets/js/datatable/datatables.min.js') }}"></script>
<script src="{{ asset('assets/js/izitoast/iziToast.min.js') }}"></script>
<script src="{{ asset('assets/js/select2/select2.min.js') }}"></script>
<script src="{{ asset('assets/js/select2/select2.min.js') }}"></script>
<script src="{{ asset('assets/js/datepicker/bootstrap-datepicker.min.js') }}"></script>
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

    $('#datepicker').each(function () {
        $(this).datepicker({
        autoclose: true,
        format: "yyyy",
        viewMode: "years",
        minViewMode: "years"
        });
    });
</script>
@endpush
