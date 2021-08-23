<div class="modal fade" id="EDIT" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Edit Pembeli</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="{{ route('masterpembeli.update','update')}}" autocomplete="off" >
            @method('PATCH')
            @csrf
            <input type="text" name="id" id="edit-id">
            <div class="form-group">
              <div class="mb-3">
                  <label for="recipient-name" class="col-form-label">Pembeli:</label>
                  <input type="text" name="pmbli" id="edit-pembeli" class="form-control"required oninvalid="this.setCustomvalidity('Harap isi bidang ini')" oninput="setCustomvalidity('')">
              </div>
              <div class="mb-3">
                  <label for="recipient-name" class="col-form-label">Alamat:</label>
                  <input type="text" name="alamt" id="edit-alamat" class="form-control"  required oninvalid="this.setCustomvalidity('Harap isi bidang ini')" oninput="setCustomvalidity('')">
              </div>
            </div>
        
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" >Edit</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        </form>
        </div>
      </div>
    </div>
  </div>
  
