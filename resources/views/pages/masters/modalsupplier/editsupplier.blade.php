<div class="modal fade" id="EDIT" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Edit Supplier </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{ route('mastersupplier.update','update')}}" autocomplete="off" >
          @method('PATCH')
          @csrf
          <input type="text" name="id" id="edit-id">
          <div class="mb-3">
              <label for="recipient-name"  class="col-form-label">Kode Supplier:</label>
              <input type="text" name="kode_supplier" class="form-control" id="edit-kodesupplier" readonly>
          </div>
          <div class="mb-3">
              <label for="recipient-name"  class="col-form-label">Nama Supplier:</label>
              <input type="text" name="namasup" class="form-control" id="edit-namasupplier" required oninvalid="this.setCustomvalidity('Harap isi bidang ini')" >
          </div>
          <div class="mb-3">
              <label for="recipient-name"  class="col-form-label">Alamat:</label>
              <input type="text" name="almt" class="form-control" id="edit-alamat" required oninvalid="this.setCustomvalidity('Harap isi bidang ini')" >
          </div>
          <div class="mb-3">
              <label for="recipient-name" class="col-form-label">No Telepon:</label>
              <input type="text" name="notelp" class="form-control" id="edit-notelp" required oninvalid="this.setCustomvalidity('Harap isi bidang ini')" >
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


