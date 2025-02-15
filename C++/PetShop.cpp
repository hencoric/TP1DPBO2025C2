#include <iostream> // biar bisa pake input-output kayak cin dan cout
#include <string>   // biar bisa pake tipe data string

using namespace std; // biar nggak perlu ngetik std:: terus

// bikin kelas buat ngatur produk di petshop
class PetShop
{
private:
    string id;       // nyimpen id produk
    string nama;     // nyimpen nama produk
    string kategori; // nyimpen kategori produk
    int harga;       // nyimpen harga produk

public:
    // konstruktor default, kalo nggak ngasih nilai awal
    PetShop()
    {
        this->id = "";       // id dikosongin dulu
        this->nama = "";     // nama juga kosong
        this->kategori = ""; // kategori juga kosong
        this->harga = 0;     // harga diset ke 0
    }

    // konstruktor dengan parameter, biar bisa langsung masukin nilai
    PetShop(string id, string nama, string kategori, int harga)
    {
        this->id = id;             // masukin id yang dikasih
        this->nama = nama;         // masukin nama produk
        this->kategori = kategori; // masukin kategori produk
        this->harga = harga;       // masukin harga produk
    }

    // buat ngambil id produk
    string get_id()
    {
        return this->id; // balikin id-nya
    }

    // buat ganti id produk
    void set_id(string id)
    {
        this->id = id; // update id produk
    }

    // buat ngambil nama produk
    string get_nama()
    {
        return this->nama; // balikin nama produk
    }

    // buat ganti nama produk
    void set_nama(string nama)
    {
        this->nama = nama; // update nama produk
    }

    // buat ngambil kategori produk
    string get_kategori()
    {
        return this->kategori; // balikin kategori produk
    }

    // buat ganti kategori produk
    void set_kategori(string kategori)
    {
        this->kategori = kategori; // update kategori produk
    }

    // buat ngambil harga produk
    int get_harga()
    {
        return this->harga; // balikin harga produk
    }

    // buat ganti harga produk
    void set_harga(int harga)
    {
        this->harga = harga; // update harga produk
    }

    // buat nampilin info produk ke layar
    void display()
    {
        cout << "ID: " << this->id << " | Nama: " << this->nama
             << " | kategori: " << this->kategori << " | harga: " << this->harga << '\n';
        // nampilin id, nama, kategori, sama harga produk
    }

    // destruktor, bakal jalan otomatis kalo objeknya dihapus
    ~PetShop()
    {
    }
};
