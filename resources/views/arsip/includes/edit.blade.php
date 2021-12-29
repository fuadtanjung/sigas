<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Arsip</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modal-lg">
                <form id="formEditArsip" action="" class="needs-validation" novalidate="" method="POST">
                    @csrf
                    <div class="ml-5 mr-5">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label>Indeks Arsip</label>
                                    <textarea name="indeks" class="form-control" id="indeks_edit"></textarea>
                                    <div class="invalid-feedback">
                                        Apa indeks arsip nya?
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Deskripsi Arsip</label>
                                    <textarea name="deskripsi" class="form-control" id="deskripsi_edit"></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Tahun</label>
                                    <input name="tahun" type="text" class="form-control datepicker" required="" id="tahun_edit">
                                    <div class="invalid-feedback">
                                        Kapan tahun arsip nya?
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Tingkat Perkembangan Arsip</label>
                                    <select name="tingkat_perkembangan_id" class="form-control select2" id="tingkat_perkembangan_edit">
                                        @foreach ($tingkat as $tk )
                                        <option value="{{ $tk->id }}" ${`{{$tk->id}}` == i.city_id ? 'selected' : ''}>{{ $tk->nama_tingkat_perkembangan }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Jumlah</label>
                                    <input name="jumlah" type="number" class="form-control" id="jumlah_edit">
                                </div>

                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <select name="keterangan_id" class="form-control select2" id="keterangan_edit">
                                        @foreach ($keterangan as $kt )
                                        <option value="{{ $kt->id }}">{{ $kt->nama_keterangan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label>Bentuk Arsip</label>
                                    <select name="bentuk_id" class="form-control select2" id="bentuk_edit">
                                        @foreach ($bentuk as $bt )
                                        <option value="{{ $bt->id }}">{{ $bt->nama_bentuk }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="card">
                                    <div class="card-header text-center" style="background-color: #00AA9E;">
                                        <h4 class="text-white">Lokasi Simpan</h4>
                                    </div>
                                    <div class="card-body">
                                        <div data-height="260">
                                            <div class="row">
                                                <div class="col-12 col-md-6 col-lg-6">
                                                    <div class="form-group">
                                                        <label>Rak</label>
                                                        <input name="rak" type="teks" class="form-control" id="rak_edit"
                                                            readonly>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-6">
                                                    <div class="form-group">
                                                        <label>Roll O Pack</label>
                                                        <input name="roll_o_pack" type="teks" class="form-control"
                                                            id="roll_o_pack_edit" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-6">
                                                    <div class="form-group">
                                                        <label>Boks</label>
                                                        <input name="boks" type="teks" class="form-control" id="boks_edit"
                                                            readonly>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-6">
                                                    <div class="form-group">
                                                        <label>Bungkus</label>
                                                        <input name="bungkus" type="teks" class="form-control"
                                                            id="bungkus_edit" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-6">
                                                    <div class="form-group">
                                                        <label>Buku</label>
                                                        <input name="buku" type="teks" class="form-control" id="buku_edit"
                                                            readonly>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-6">
                                                    <div class="form-group">
                                                        <label>Sampul</label>
                                                        <input name="sampul" type="teks" class="form-control"
                                                            id="sampul_edit" readonly>
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
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
