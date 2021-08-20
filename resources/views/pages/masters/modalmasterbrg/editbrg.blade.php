<div class="modal fade" id="EDIT" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Edit Barang Masuk</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="{{ route('Masterbrg.update','update')}}" autocomplete="off" >
            @method('PATCH')
            @csrf
            <input type="text" name="id" id="edit-id">
            <div class="mb-3">
                <label for="recipient-name"  class="col-form-label">Kode Barang:</label>
                <input type="text" name="kode_barang" class="form-control" id="edit-kodebarang" readonly>
            </div>
            <div class="mb-3">
                <label for="recipient-name"  class="col-form-label">Nama Barang:</label>
                <input type="text" name="namabrg" class="form-control" id="edit-namabarang">
            </div>
            <div class="mb-3">
                <label for="recipient-name"  class="col-form-label">Harga Beli:</label>
                <input type="text" name="hrgbeli" class="form-control" id="edit-hargabeli">
            </div>
            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Harga Jual:</label>
                <input type="text" name="hrgjual" class="form-control" id="edit-hargajual">
            </div>
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Supplier:</label>
              <input type="text" name="supplier" class="form-control" id="edit-supplier">
          </div>
        
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" >Ubah</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        </form>
        </div>
      </div>
    </div>
  </div>
  
