   {{-- modal hapus --}}
  
   <div class="modal fade" id="HAPUS" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hapus Barang</h5>
          {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"></span>
          </button> --}}
        </div>
        <form method="post" action="{{action('MasterSupplierController@destroy','delete')}}" >
          @method('DELETE')
          @csrf
            <div class="modal-body">
              Yakin Untuk Menghapus Supplier ?
            </div>
            <input type="text" name="id" id="delete-id" hidden>
            <div class="modal-footer">
              <button type="submit" class="btn btn-danger" >Hapus</button>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            </form>
            </div>
       
      </div>
    </div>
  </div>
  
  