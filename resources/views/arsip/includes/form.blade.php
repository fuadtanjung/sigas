<form action="{{ url('arsip/input') }}" class="needs-validation" novalidate="" method="POST">
    @csrf
    <div class="ml-5 mr-5">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="form-group">
                    <label>Indeks Arsip</label>
                    <select class="form-control select2" name="indeks_id">
                        @foreach ($indeks as $idx )
                        <option value="{{ $idx->id }}">{{ $idx->nama_indeks }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Deskripsi Arsip</label>
                    <textarea name="deskripsi" class="form-control"></textarea>
                    <div class="invalid-feedback">
                        Apa deskripsi nya?
                    </div>
                </div>

                <div class="form-group">
                    <label>Tahun</label>
                    <input name="tahun" type="text" class="form-control" required="" id="datepicker">
                    <div class="invalid-feedback">
                        kapan tahunnya?
                    </div>
                </div>

                <div class="form-group">
                    <label>Tingkat Perkembangan Arsip</label>
                    <select name="tingkat_perkembangan_id" class="form-control select2">
                        @foreach ($tingkat as $tk )
                        <option value="{{ $tk->id }}">{{ $tk->nama_tingkat_perkembangan }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Jumlah</label>
                    <input name="jumlah" type="number" class="form-control">
                </div>

                <div class="form-group">
                    <label>Keterangan</label>
                    <select name="keterangan_id" class="form-control select2">
                        @foreach ($keterangan as $kt )
                        <option value="{{ $kt->id }}">{{ $kt->nama_keterangan }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
                <div class="form-group">
                    <label>Bentuk Arsip</label>
                    <select name="bentuk_id" class="form-control select2">
                        @foreach ($bentuk as $bt )
                        <option value="{{ $bt->id }}">{{ $bt->nama_bentuk }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="card">
                    <div class="card-header text-center" style="background-color: #00AA9E;">
                        <h4 class="text-white">Lokasi Simpan</h4>
                    </div>
                    <div class="card-body" style="background-color: #e7ecec;">
                        <div data-height="260">
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Rak</label>
                                        <input name="rak" type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Roll O Pack</label>
                                        <input name="roll_o_pack" type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Boks</label>
                                        <input name="boks" type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Bungkus</label>
                                        <input name="bungkus" type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Buku</label>
                                        <input name="buku" type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Sampul</label>
                                        <input name="sampul" type="number" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-right mr-5 mb-3">
        <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle mr-1"></i>
            Tambah</button>
    </div>
</form>
