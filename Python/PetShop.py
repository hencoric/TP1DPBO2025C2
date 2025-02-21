class PetShop:
    __id = ""  # atribut private buat nyimpen id produk
    __nama = ""  # atribut private buat nyimpen nama produk
    __kategori = ""  # atribut private buat nyimpen kategori produk
    __harga = 0  # atribut private buat nyimpen harga produk

    def __init__(self, id = "", nama = "", kategori = "", harga = 0):  # constructor buat inisialisasi objek
        self.__id = id  # set id produk waktu objek dibuat
        self.__nama = nama  # set nama produk waktu objek dibuat
        self.__kategori = kategori  # set kategori produk waktu objek dibuat
        self.__harga = harga  # set harga produk waktu objek dibuat

    def get_id(self):  # buat ambil id produk
        return self.__id  # balikin nilai id

    def set_id(self, id):  # buat ubah id produk
        self.__id = id  # update id produk

    def get_nama(self):  # buat ambil nama produk
        return self.__nama  # balikin nilai nama

    def set_nama(self, nama):  # buat ubah nama produk
        self.__nama = nama  # update nama produk

    def get_kategori(self):  # buat ambil kategori produk
        return self.__kategori  # balikin nilai kategori

    def set_kategori(self, kategori):  # buat ubah kategori produk
        self.__kategori = kategori  # update kategori produk

    def get_harga(self):  # buat ambil harga produk
        return self.__harga  # balikin nilai harga

    def set_harga(self, harga):  # buat ubah harga produk
        self.__harga = harga  # update harga produk

    def display(self):  # buat nampilin detail produk
        print(f"ID: {self.__id} | Nama: {self.__nama} | Kategori: {self.__kategori} | Harga: {self.__harga}")  # cetak info produk
