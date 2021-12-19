<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formEditKeterangan" action="" class="needs-validation" novalidate="" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label>Nama Keterangan Arsip</label>
                        <input name="edit_nama_keterangan" id="editNamaKeterangan" type="text" class="form-control form-control-sm" required="">
                        <div class="invalid-feedback">
                            Apa nama keterangan arsip nya?
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
