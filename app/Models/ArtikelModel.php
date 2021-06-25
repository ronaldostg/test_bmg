<?php
namespace App\Models;

use CodeIgniter\Model;
 
class ArtikelModel extends Model{
    protected $table = 't_artikel';
    protected $allowedFields = ['id','judul_artikel','isi_artikel','thumbnail_artikel','tag_artikel','kategori_artikel'];

    

}

?>