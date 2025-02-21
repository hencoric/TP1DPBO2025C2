public class PetShop {

    private String id; // variabel buat nyimpen ID produk
    private String nama; // variabel buat nyimpen nama produk
    private String kategori; // variabel buat nyimpen kategori produk
    private int harga; // variabel buat nyimpen harga produk

    // konstruktor default, bakal dipanggil kalo objek dibuat tanpa parameter
    public PetShop() {
        this.id = ""; // set ID jadi string kosong
        this.nama = ""; // set nama jadi string kosong
        this.kategori = ""; // set kategori jadi string kosong
        this.harga = 0; // set harga jadi 0
    }

    // konstruktor dengan parameter, biar langsung bisa isi data pas objek dibuat
    public PetShop(String id, String nama, String kategori, int harga) {
        this.id = id; // masukin nilai ID dari parameter ke atribut id
        this.nama = nama; // masukin nilai nama dari parameter ke atribut nama
        this.kategori = kategori; // masukin nilai kategori dari parameter ke atribut kategori
        this.harga = harga; // masukin nilai harga dari parameter ke atribut harga
    }

    // buat ngambil nilai ID produk
    public String getId() {
        return id; // balikin nilai ID
    }

    // buat ngubah nilai ID produk
    public void setId(String id) {
        this.id = id; // set ID dengan nilai baru
    }

    // buat ngambil nilai nama produk
    public String getNama() {
        return nama; // balikin nilai nama
    }

    // buat ngubah nilai nama produk
    public void setNama(String nama) {
        this.nama = nama; // set nama dengan nilai baru
    }

    // buat ngambil nilai kategori produk
    public String getKategori() {
        return kategori; // balikin nilai kategori
    }

    // buat ngubah nilai kategori produk
    public void setKategori(String kategori) {
        this.kategori = kategori; // set kategori dengan nilai baru
    }

    // buat ngambil nilai harga produk
    public int getHarga() {
        return harga; // balikin nilai harga
    }

    // buat ngubah nilai harga produk
    public void setHarga(int harga) {
        this.harga = harga; // set harga dengan nilai baru
    }

    // buat nampilin info produk ke console
    public void display() {
        System.out.println("ID: " + id + " | Nama: " + nama + " | Kategori: " + kategori + " | Harga: " + harga);
    }
}
