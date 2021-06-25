<!--Modal untuk tambah artikel  -->


<!-- Modal -->
<div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Artikel</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/ArtikelController/create" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label for="name">Judul </label>
            <input type="text" class="form-control" placeholder="Judul" name="judul" required>
          </div>
          <div class="form-group">
            <label for="name">Isi </label>
            <textarea id="ckeditor" name="isi" placeholder="Tulis Isi" required></textarea>


          </div>



          <div class="form-group">
            <label for="name">Thumbnail </label>
            <input type="file" class="form-control" placeholder="Thumbnail" name="thumbnail" id="thumbnail" required>
          </div>




          <div class="form-group">
            <label for="name">Tag </label>
            <input type="text" class="form-control" placeholder="Contoh : #(isi sendiri)" name="tag" required>
          </div>

          <div class="form-group">
            <label for="name">Kategori</label>
            <input type="text" class="form-control" placeholder="Kategori" name="kategori" required>
          </div>
        </div>


        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
<script>
  CKEDITOR.replace('ckeditor');
</script>

<