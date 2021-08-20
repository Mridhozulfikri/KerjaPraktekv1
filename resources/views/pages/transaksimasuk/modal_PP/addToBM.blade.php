
  <div class="modal fade" id="addtobm" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add To BM</h5>
        </div>
        <form method="post" action="{{ route('addToBm', 'AddtoBM') }}" >
          @method('POST')
          @csrf
            <div class="modal-body">
              Yakin Barang Akan Masuk ?
            </div>
            {{--  <input type="text" name="id" id="addtobm-id" hidden>  --}}
            <input type="hidden" name="id" id="addtobm-id">
            <div class="modal-footer">
              <button type="submit" class="btn btn-success" >Oke</button>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            </div>
        </form>       
      </div>
    </div>
  </div>
