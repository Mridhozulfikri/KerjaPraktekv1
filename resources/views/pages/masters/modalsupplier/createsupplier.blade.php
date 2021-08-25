

<div class="modal fade" id="tambahsupplier" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Menambahkan Supplier</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        {{-- untuk mengakses controller di form method harus diisi kode --}}
          <form method="post" action="{{route('mastersupplier.store','store')}}" autocomplete="off">
            @csrf
            <div class="form-group">
              <div class="mb-3">
                  <label for="recipient-name" class="col-form-label">Kode Supplier:</label>
                  <input type="text" name="kode_supplier" value="{{$lastID}}" class="form-control" readonly>
              </div>
              <div class="mb-3">
                  <label for="recipient-name" class="col-form-label">Nama Supplier:</label>
                  <input type="text" name="nama_supplier" class="form-control"  required oninvalid="this.setCustomvalidity('Harap isi bidang ini')" oninput="setCustomvalidity('')">
              </div>
              <div class="mb-3">
                  <label for="recipient-name" class="col-form-label">Alamat Supplier:</label>
                  <input type="text" name="alamat" class="form-control"  required oninvalid="this.setCustomvalidity('Harap isi bidang ini')" oninput="setCustomvalidity('')">
              </div>
              <div class="mb-3">
                  <label for="recipient-name" class="col-form-label">No Telepon:</label>
                  <input type="number" name="notelp" class="form-control"  required oninvalid="this.setCustomvalidity('Harap isi bidang ini')" oninput="setCustomvalidity('')">
              </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success" data-dismiss="modal">Masukan</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
        
      </form>
      
      </div>
    </div>
  </div>
</div>
</div>