<div class="modal fade" id="tambahpo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Tambah PP</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          {{-- untuk mengakses controller di form method harus diisi kode --}}
            <form method="post" action="{{action('PermintaanPembelianController@store')}}" autocomplete="off">
              @csrf
              <div class="form-group">
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">No PP :</label>
                    <input type="number" name="no_pp" class="form-control"  required oninvalid="this.setCustomvalidity('Harap isi bidang ini')" oninput="setCustomvalidity('')" value="{{old('NoPermintaan')}}">
                </div>                
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Tanggal :</label>
                    <input type="date" name="tgl_pp" class="form-control"  required oninvalid="this.setCustomvalidity('Harap isi bidang ini')" oninput="setCustomvalidity('')">
                </div>
                <label for="recipient-name" class="col-form-label">Pemesan :</label>
                <div class="input-group">
                  <select class="form-select" id="pembeli" aria-label="Example select with button addon" input type="text" name="pembeli" class="form-control">
                    <option selected>-- Pilih Pemesan --</option>
                    @foreach ($pemesan as $item)                        
                      <option value="{{ $item->id }}">{{ $item->pembeli }}</option>                    
                    @endforeach
                  </select>
                </div>                      
                <label for="recipient-name" class="col-form-label">Nama Barang :</label>
                <div class="input-group">
                  <select class="form-select" name="nama_barang" id="namabrg" aria-label="Example select with button addon" type="text" class="form-control">
                    <option selected>-- Pilih Barang --</option>
                    @foreach ($barang as $item)                        
                      <option value="{{ $item->id }}">{{ $item->nama_barang }}</option>                    
                    @endforeach
                  </select>
                </div>
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label" hidden>Kode Barang :</label>
                    <div id="kodebrg" hidden></div>
                    {{--  <input type="text" name="kodebrg1" id="kodebrg1" class="form-control"  required oninvalid="this.setCustomvalidity('Harap isi bidang ini')" oninput="setCustomvalidity('')" readonly>  --}}
                  </div>
                  <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">QTY :</label>
                    <input type="number" name="qty" class="form-control"  required oninvalid="this.setCustomvalidity('Harap isi bidang ini')" oninput="setCustomvalidity('')">
                  </div>
                  <div class="mb-3">
                    <label for="recipient-name" class="col-form-label" hidden>Harga Beli :</label>
                    <div id="hargabeli" hidden></div>
                  {{--  <input type="number" name="hrgbeli" class="form-control"  required oninvalid="this.setCustomvalidity('Harap isi bidang ini')" oninput="setCustomvalidity('')" readonly>  --}}
                </div>              
              </div>
          </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-success" data-dismiss="modal">Masukan</button>
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
            </div>
              
            </form>
        
      </div>
    </div>
  </div>
</div>