<?php
namespace App\Controllers;

use CodeIgniter\Controller;

use App\Models\ArtikelModel;

use Config\View;


class ArtikelController extends BaseController{


    public function __construct()
    {
        helper("form");
    
    }

    public function index(){
        $artikel = new ArtikelModel();
       

        $data['artikel'] = $artikel->findAll();

       
        return view('admin/list_artikel',$data);

    }

    public function create(){

        if (!$this->validate([
			
			'thumbnail' => [
				'rules' => 'uploaded[thumbnail]|mime_in[thumbnail,image/jpg,image/jpeg,image/gif,image/png]|max_size[thumbnail,4096]',
				'errors' => [
					'uploaded' => 'Harus Ada File yang diupload',
					'mime_in' => 'File Extention Harus Berupa jpg,jpeg,gif,png',
					'max_size' => 'Ukuran File Maksimal 2 MB'
				]
 
			]
		])) {
			session()->setFlashdata('error', $this->validator->listErrors());
			return redirect()->back()->withInput();
            echo "ada indikasi";
		}


        $artikel = new ArtikelModel();
        $fotoThumbnail = $this->request->getFile('thumbnail');
        $namaFile = $fotoThumbnail->getRandomName();


        // create data artikels
        $validation =  \Config\Services::validation();
        $validation->setRules(['judul' => 'required']);
        $isDataValid = $validation->withRequest($this->request)->run();

        if($isDataValid){

            // insert data to database 
            $artikel->insert([
                "judul_artikel" => $this->request->getPost('judul'),
                "isi_artikel" => $this->request->getPost('isi'),
                "thumbnail_artikel" => $namaFile,
                "tag_artikel" => $this->request->getPost('tag'),
                "kategori_artikel" => $this->request->getPost('kategori')

            ]);

            // save image to directory
            $fotoThumbnail->move('uploads/images/',$namaFile );
            
            // return redirect()->to('/list_artikel');


            session()->setFlashdata('success', 'Berhasil tambah data');
            return redirect()->to(base_url('list_artikel'));

        }else{
            echo "ada masalah";
        }

        
        
    }


    public function detail($id){
        $artikel = new ArtikelModel();
     

        $data['detail'] = $artikel->where('id', $id)->first();
         
        return view('admin/detail', $data);
    }



    public function update(){
        
        $artikel = new ArtikelModel();


        if (!$this->validate([
			
			'thumbnail' => [
				'rules' => 'uploaded[thumbnail]|mime_in[thumbnail,image/jpg,image/jpeg,image/gif,image/png]|max_size[thumbnail,4096]',
				'errors' => [
					'uploaded' => 'Harus Ada File yang diupload',
					'mime_in' => 'File Extention Harus Berupa jpg,jpeg,gif,png',
					'max_size' => 'Ukuran File Maksimal 2 MB'
				]
			]
		])) {
			session()->setFlashdata('error', $this->validator->listErrors());
			return redirect()->back()->withInput();
            echo "ada indikasi";
		}

        $id = $this->request->getPost('id');
        
        $data['artikel'] = $artikel->where('id', $id)->first();
       
        // echo $data['artikel'];
        $validation =  \Config\Services::validation();
        $validation->setRules(['id' => 'required']);

        $fotoThumbnail = $this->request->getFile('thumbnail');
        $namaFile = $fotoThumbnail->getRandomName();

        
        $isDataValid = $validation->withRequest($this->request)->run();

        $foto_lama = $this->request->getPost('thumbnail_lama');

        if($isDataValid){
            $artikel->update($id,[
                "judul_artikel" => $this->request->getPost('judul'),
                "isi_artikel" => $this->request->getPost('isi'),
                "thumbnail_artikel" => $namaFile,
                "tag_artikel" => $this->request->getPost('tag'),
                "kategori_artikel" => $this->request->getPost('kategori')
            ] 
            );


            // upload foto yang baru 
            $fotoThumbnail->move('uploads/images/',$namaFile );

            // hapus foto yang lama
            unlink("uploads/images/".$foto_lama);

            session()->setFlashdata('success', 'Berhasil Edit Artikel');
            return redirect()->to(base_url('list_artikel'));

        }
        else{
            echo "ada masalah";
        }


       
   }


    public function delete($id, $namaFoto){
        $artikel = new ArtikelModel();


        unlink("uploads/images/".$namaFoto);



        $artikel->delete($id);



        session()->setFlashdata('danger', 'Berhasil Hapus Artikel');
        return redirect()->to(base_url('list_artikel'));


    }


    

}

?>