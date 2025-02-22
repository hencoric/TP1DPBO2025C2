<?php
class PetShop {
    private $id; // buat nyimpen id produk
    private $nama; // buat nyimpen nama produk
    private $kategori; // buat nyimpen kategori produk
    private $harga; // buat nyimpen harga produk
    private $foto; // buat nyimpen foto produk

    // konstruktor dengan parameter, biar langsung bisa isi data pas objek dibuat
    public function __construct($id = "", $nama = "", $kategori = "", $harga = 0, $foto = "") {
        $this->id = $id; // masukin nilai ID dari parameter ke atribut id
        $this->nama = $nama; // masukin nilai nama dari parameter ke atribut nama
        $this->kategori = $kategori; // masukin nilai kategori dari parameter ke atribut kategori
        $this->harga = $harga; // masukin nilai harga dari parameter ke atribut harga
        $this->foto = $foto; // masukin nilai foto dari parameter ke atribut foto
    }

    // buat ngambil nilai ID produk
    public function getId() {
        return $this->id; // balikin nilai ID
    }
    
    // buat ngubah nilai ID produk
    public function setId($id) {
        $this->id = $id; // set ID dengan nilai baru
    }

    // buat ngambil nilai nama produk
    public function getNama() {
        return $this->nama; // balikin nilai nama
    }
    
    // buat ngubah nilai nama produk
    public function setNama($nama) {
        $this->nama = $nama; // set nama dengan nilai baru
    }

    // buat ngambil nilai kategori produk
    public function getKategori() {
        return $this->kategori; // balikin nilai kategori
    }
    
    // buat ngubah nilai kategori produk
    public function setKategori($kategori) {
        $this->kategori = $kategori; // set kategori dengan nilai baru
    }

    // buat ngambil nilai harga produk
    public function getHarga() {
        return $this->harga;  // balikin nilai harga
    }
    
     // buat ngubah nilai harga produk
    public function setHarga($harga) {
        $this->harga = $harga;// set harga dengan nilai baru
    }

    // buat ngambil nilai foto produk
    public function getFoto() {
        return $this->foto; // balikin nilai foto
    }
    
    // buat ngubah nilai foto produk
    public function setFoto($foto) {
        $this->foto = $foto; // set harga dengan nilai baru
    }

    // buat nampilin info produk ke console
    public function display() {
        echo "ID: " . $this->id . " | Nama: " . $this->nama . " | Kategori: " . $this->kategori . " | Harga: " . $this->harga . "<br>";
        if (!empty($this->foto)) {
            echo "<img src='" . $this->foto . "' alt='Foto Produk' width='100'><br>";
        } else {
            echo "Foto tidak tersedia.<br>";
        }
    }
}