<div class="modal fade" id="editpp" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Edit Permintaan Pembelian</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          {{-- untuk mengakses controller di form method harus diisi kode --}}
            <form method="post" action="{{ route('PP.update', 'update') }}" autocomplete="off">
              @method('PATCH')
              @csrf
              <div class="form-group">
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">No. PP</label>
                    <input type="text" name="no_pp" id="edit-no_pp" class="form-control"  required oninvalid="this.setCustomvalidity('Harap isi bidang ini')" oninput="setCustomvalidity('')">                    
                </div>                
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Tanggal:</label>
                    <input type="date" name="tgl_pp" id="edit-tgl_pp" class="form-control" required oninvalid="this.setCustomvalidity('Harap isi bidang ini')" oninput="setCustomvalidity('')">                   
                </div>
                <label for="recipient-name" class="col-form-label">Pemesan:</label>
                <div class="input-group">
                  <select class="form-select" name="pemesan" id="edit-pemesan" aria-label="Example select with button addon" input type="text"  class="form-control"  required oninvalid="this.setCustomvalidity('Harap isi bidang ini')" oninput="setCustomvalidity('')">
                    @foreach ($pemesan as $item)                        
                      <option value="{{ $item->id }}">{{ $item->pembeli }}</option>                    
                    @endforeach
                  </select>                 
                </div>            
                <label for="recipient-name" class="col-form-label">Nama Barang</label>
                <div class="input-group">
                  <select class="form-select" name="namabrg" id="edit-nama_barang" aria-label="Example select with button addon" input type="text" name="pemesan" class="form-control"  required oninvalid="this.setCustomvalidity('Harap isi bidang ini')" oninput="setCustomvalidity('')">
                    @foreach ($barang as $item)                        
                    <option value="{{ $item->id }}">{{ $item->nama_barang }}</option>                    
                    @endforeach
                  </select>             
                </div>
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Kode Barang</label>
                    <div id="kode_barang">
                      <input type="text" name="kode_barang" id="edit-kode_barang" class="form-control"  required oninvalid="this.setCustomvalidity('Harap isi bidang ini')" oninput="setCustomvalidity('')" readonly>                   
                    </div>
                </div>
                <div class="mb-3">
                  <label for="recipient-name" class="col-form-label">QTY:</label>
                    <input type="number" name="qty" id="edit-qty" class="form-control"  required oninvalid="this.setCustomvalidity('Harap isi bidang ini')" oninput="setCustomvalidity('')">                  
                </div>
                <div class="mb-3">
                  <label for="recipient-name" class="col-form-label">Harga Beli:</label>
                  <div id="harga_beli">
                    <input type="number" name="harga_beli" id="edit-harga_beli" class="form-control"  required oninvalid="this.setCustomvalidity('Harap isi bidang ini')" oninput="setCustomvalidity('')" readonly>                 
                  </div>
                </div>              
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success" data-dismiss="modal">Edit</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
              </div>              
            </form>
        </div>        
      </div>
    </div>
</div>