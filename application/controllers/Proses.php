<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proses extends CI_Controller {

  public function index()
  {
    check_not_login();
    $data['title']='Upload';
    $this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('form');
    $this->load->view('templates/footer');
  }
  public function upload()
  {
    $folderUpload = "assets/uploads";
    
    # periksa apakah folder tersedia
    if (!is_dir($folderUpload)) {
      # jika tidak maka folder harus dibuat terlebih dahulu
      mkdir($folderUpload, 0777, $rekursif = true);
    }
    
    # simpan masing-masing file ke dalam array 
    # dan casting menjadi objek :)
    $fileFoto = (object) @$_FILES['foto'];
    
    if ($fileFoto->size > 10000 * 20000) {
      die("File tidak boleh lebih dari 1MB");
    }
    
    # mulai upload file
    $uploadFotoSukses = move_uploaded_file(
      $fileFoto->tmp_name, "{$folderUpload}/{$fileFoto->name}"
    );
    
    if ($uploadFotoSukses) {
      redirect('proses');
      $link = "{$folderUpload}/{$fileFoto->name}";
      echo "Sukses Upload Foto: <a href='{$link}'>{$fileFoto->name}</a>";
      echo "<br>";
    }
    echo "<script>alert('Gambar berhasil disimpan');</script>";
  
    
  }

}
