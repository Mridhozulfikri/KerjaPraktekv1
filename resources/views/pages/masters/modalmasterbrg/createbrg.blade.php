
<div class="modal fade" id="tambahbarangmasuk" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Menambahkan barang</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          {{-- untuk mengakses controller di form method harus diisi kode --}}
            <form method="post" action="{{route('Masterbrg.store')}}" autocomplete="off">
              @csrf
              <div class="form-group">
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Kode Barang:</label>
                    <input type="text" name="kode_barang" value="{{$lastID}}" class="form-control" readonly>
                </div>
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Nama Barang:</label>
                    <input type="text" name="nama_barang" class="form-control"  required oninvalid="this.setCustomvalidity('Harap isi bidang ini')" oninput="setCustomvalidity('')">
                </div>
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Harga Beli:</label>
                    <input type="number" name="harga_beli" class="form-control"  required oninvalid="this.setCustomvalidity('Harap isi bidang ini')" oninput="setCustomvalidity('')">
                </div>
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Harga Jual:</label>
                    <input type="number" name="harga_jual" class="form-control"  required oninvalid="this.setCustomvalidity('Harap isi bidang ini')" oninput="setCustomvalidity('')">
                </div>
                <div class="mb-3">
                  <label for="recipient-name" class="col-form-label">Supplier:</label>
                  <input type="text" name="supplier" class="form-control"  required oninvalid="this.setCustomvalidity('Harap isi bidang ini')" oninput="setCustomvalidity('')">
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