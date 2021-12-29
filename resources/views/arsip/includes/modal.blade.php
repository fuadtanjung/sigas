<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Arsip</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modal-lg">
                <form id="formEditBentuk" action="" class="needs-validation" novalidate="" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="ml-5 mr-5">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label>Indeks Arsip</label>
                                    <textarea name="indeks" class="form-control" id="indeks" readonly></textarea>
                                    <div class="invalid-feedback">
                                        Apa indeks arsip nya?
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Deskripsi Arsip</label>
                                    <textarea name="deskripsi" class="form-control" id="deskripsi" readonly></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Tahun</label>
                                    <input name="tahun" type="text" class="form-control" id="tahun" readonly>
                                </div>

                                <div class="form-group">
                                    <label>Tingkat Perkembangan Arsip</label>
                                    <input type="text" class="form-control" id="tingkat_perkembangan" readonly>
                                </div>

                                <div class="form-group">
                                    <label>Jumlah</label>
                                    <input name="jumlah" type="number" class="form-control" id="jumlah" readonly>
                                </div>

                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <input type="text" class="form-control" id="keterangan" readonly>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label>Bentuk Arsip</label>
                                    <input type="text" class="form-control" id="bentuk" readonly>
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
                                                        <input name="rak" type="teks" class="form-control" id="rak" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-6">
                                                    <div class="form-group">
                                                        <label>Roll O Pack</label>
                                                        <input name="roll_o_pack" type="teks" class="form-control" id="roll_o_pack" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-6">
                                                    <div class="form-group">
                                                        <label>Boks</label>
                                                        <input name="boks" type="teks" class="form-control" id="boks" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-6">
                                                    <div class="form-group">
                                                        <label>Bungkus</label>
                                                        <input name="bungkus" type="teks" class="form-control" id="bungkus" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-6">
                                                    <div class="form-group">
                                                        <label>Buku</label>
                                                        <input name="buku" type="teks" class="form-control" id="buku" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-6">
                                                    <div class="form-group">
                                                        <label>Sampul</label>
                                                        <input name="sampul" type="teks" class="form-control" id="sampul" readonly>
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
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>
