
  <div class="modal fade" id="batal-bm" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Batal Barang Masuk</h5>
        </div>
        <form method="post" action="{{ route('batalBm', 'BatalBM') }}" >
          @method('POST')
          @csrf
            <div class="modal-body">
              Yakin Barang Tidak Jadi Masuk ?
            </div>
            <input type="hidden" name="id" id="batal-bm-id">
            <div class="modal-footer">
              <button type="submit" class="btn btn-danger" >Oke</button>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            </div>
        </form>       
      </div>
    </div>
  </div>
