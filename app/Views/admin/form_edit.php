<!-- Modal -->

<?php foreach ($artikel as $artikels) : ?>


  <div id="modal-update<?= $artikels['id'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Artikel</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="/ArtikelController/update" method="POST" enctype="multipart/form-data">
          <div class="modal-body">


            <div class="form-group">


              <label for="name">Judul </label>
              <input type="text" class="form-control judul" placeholder="Judul" name="judul" required " value="<?= $artikels['judul_artikel'] ?>">
         </div>


            <div class=" form-group">
              <label for="name">Isi </label>
              <textarea class="ckeditor" id="ckeditor1" name="isi" required>
              <?= $artikels['isi_artikel'] ?>
              </textarea>


            </div>




            <div class="form-group">
              <label for="name">Thumbnail </label>
              <input  type="file" class="form-control thumbnail" placeholder="Thumbnail" name="thumbnail" required>
            </div>
            <div class="form-group">

              <input  type="hidden" class="form-control" placeholder="Thumbnail" name="thumbnail_lama" required value="<?= $artikels['thumbnail_artikel'] ?>">
            </div>

            <div class="form-group">
              <label for="name">Tag </label>
              <input value="<?= $artikels['tag_artikel'] ?>" type="text" class="form-control tag" placeholder="Tag" name="tag" required>
            </div>

            <div class="form-group">
              <label for="name">Kategori</label>
              <input value="<?= $artikels['kategori_artikel'] ?>" type="text" class="form-control kategori" placeholder="Kategori" name="kategori" required>
            </div>
          </div>



          <div class="modal-footer">
            <input type="hidden" class="id" name="id" value="<?= $artikels['id'] ?>"/>

            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-warning">Edit</button>
          </div>
        </form>
      </div>
    </div>
  </div>



<?php endforeach ?>

<script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>

<script>
  CKEDITOR.replace('ckeditor1');
</script>

