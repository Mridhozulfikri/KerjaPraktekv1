
<div class="modal fade" id="tambahpembeli" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Menambahkan Pembeli</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          {{-- untuk mengakses controller di form method harus diisi kode --}}
            <form method="post" action="{{Route('masterpembeli.store')}}" autocomplete="off">
              @csrf
              <div class="form-group">
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Pembeli:</label>
                    <input type="text" name="pembeli" class="form-control" required oninvalid="this.setCustomvalidity('Harap isi bidang ini')" oninput="setCustomvalidity('')">
                </div>
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Alamat:</label>
                    <input type="text" name="alamat" class="form-control" value="" required oninvalid="this.setCustomvalidity('Harap isi bidang ini')" oninput="setCustomvalidity('')">
                </div>
              </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" data-dismiss="modal">Tambahkan</button>
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
          
        </form>
        
        </div>
      </div>
    </div>
  </div>
</div>