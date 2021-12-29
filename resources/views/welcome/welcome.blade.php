<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SIGAS</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap/bootstrap.min.css') }}">
    <script src="{{ asset('assets/js/fontawesome.js') }}" crossorigin="anonymous"></script>

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">

    <ul class="navbar-nav ml-auto">
        <li><a class="nav-link text-bold text-black-50 float-right mr-5 mt-1" href="{{ route('login') }}">{{ __('Login')
                }}</a></li>
    </ul>
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="page-error">
                    <div class="page-inner">
                        <div class="login-brand">
                            <img src="{{ asset('assets/img/stisla-fill.svg') }}" alt="logo" width="100"
                                class="shadow-light rounded-circle">
                            <div class="mt-4">
                                <h4>Selamat Datang Di Sigas</h4>
                            </div>
                        </div>
                        <div class="page-search">
                            <form action="" method="GET">
                                <div class="mb-4">
                                    <h6>Isi data di bawah ingin mencari arsip</h6>
                                </div>
                                <div class="form-group floating-addon floating-addon-not-append">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-search"></i>
                                            </div>
                                        </div>
                                        <input type="text" name="search" class="form-control" placeholder="Search">
                                        <button type="submit" class="btn btn-primary btn-lg">
                                            Search
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="card mr-3 ml-3">
            <div class="card-header">
                <h4>Hasil Pencarian</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-md">
                        <tr>
                            <th rowspan="2">No</th>
                            <th rowspan="2">Indeks</th>
                            <th rowspan="2">Deskripsi</th>
                            <th rowspan="2">Waktu</th>
                            <th rowspan="2">Tingkat Pengembangan</th>
                            <th rowspan="2">Jumlah</th>
                            <th rowspan="2" class="text-center">Bentuk</th>
                            <th colspan="6" class="text-center">Lokasi Simpan</th>
                            <th rowspan="2">Keterangan</th>
                        </tr>
                        <tr>
                            <th>Rak</th>
                            <th>Roll O Pack</th>
                            <th>Boks</th>
                            <th>Bungkus</th>
                            <th>Buku</th>
                            <th>Sampul</th>
                        </tr>


                        @foreach ($search as $data )
                        </tr>
                        <td>{{ $data->id }}</td>
                        <td>{{ $data->indeks }}</td>
                        <td>{{ $data->deskripsi }}</td>
                        <td>{{ $data->tahun }}</td>
                        <td>{{ $data->tingkatperkembangan->nama_tingkat_perkembangan }}</td>
                        <td>{{ $data->jumlah }}</td>
                        <td>{{ $data->bentuk->nama_bentuk }}</td>
                        <td>{{ $data->rak }}</td>
                        <td>{{ $data->roll_o_pack }}</td>
                        <td>{{ $data->boks }}</td>
                        <td>{{ $data->bungkus }}</td>
                        <td>{{ $data->buku }}</td>
                        <td>{{ $data->sampul }}</td>
                        <td>{{ $data->keterangan->nama_keterangan }}</td>
                        <tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        <!-- Scripts -->
        <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
        <script src="{{ asset('assets/js/popper.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.nicescroll.min.js') }}"></script>
        <script src="{{ asset('assets/js/moment.min.js') }}"></script>
        <script src="{{ asset('assets/js/stisla.js') }}"></script>

        <script src="{{ asset('assets/js/scripts.js') }}"></script>
        <script src="{{ asset('assets/js/custom.js') }}"></script>



</body>

</html>
