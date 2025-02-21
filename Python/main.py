from PetShop import PetShop

products = []  # list buat nyimpen produk

while True:  # loop utama buat menu
    print("\n==== PET SHOP MANAGEMENT ====")  # tampilan menu utama
    print("1. Display Semua PRODUCT")  # opsi buat liat daftar produk
    print("2. Add PRODUCT Baru")  # opsi buat nambah produk baru
    print("3. Update PRODUCT")  # opsi buat update produk
    print("4. Delete PRODUCT")  # opsi buat hapus produk
    print("5. Cari Barang sesuai namanya")  # opsi buat cari produk berdasarkan nama
    print("6. Keluar")  # opsi buat keluar dari program
    pilihan = input("Choose: ")  # input pilihan dari user

    if pilihan == "1":  # kalo pilih 1, tampilin daftar produk
        print("\n==== PRODUCT LIST ====")  # header daftar produk
        if not products:  # kalo list kosong
            print("Tidak Ada PRODUCT yang Tersedia")  # kasih info kalo ga ada produk
        else:
            i = 1  # buat nomor urut
            for product in products:  # loop buat nampilin produk satu-satu
                print(i, end=". ")  # tampilin nomor urut
                product.display()  # tampilin detail produk
                i += 1  # increment nomor urut

    elif pilihan == "2":  # kalo pilih 2, tambah produk baru
        print("\n==== ADD PRODUCT BARU ====")  # header tambah produk
        id = input("ID: ")  # input id produk
        nama = input("Nama: ")  # input nama produk
        kategori = input("Kategori: ")  # input kategori produk
        harga = input("Harga: ")  # input harga produk

        products.append(PetShop(id, nama, kategori, harga))  # masukin produk ke list
        print("Product Sukses ditambahkan!")  # kasih info kalo berhasil

    elif pilihan == "3":  # kalo pilih 3, update produk
        print("\n==== UPDATE PRODUCT ====")  # header update produk
        id = input("Enter product ID untuk update: ")  # input id produk yang mau diupdate
        found = False  # variabel buat nandain produk ketemu atau engga

        for product in products:  # loop buat cari produk
            if product.get_id() == id:  # kalo id cocok
                # input data baru
                nama = input("Nama Baru (Saat Ini: " + product.get_nama() + "): ")
                kategori = input("Kategori Baru (Saat Ini: " + product.get_kategori() + "): ")
                harga = input("Harga Baru (Saat Ini: " + product.get_harga() + "): ")

                # update data produk
                product.set_nama(nama)
                product.set_kategori(kategori)
                product.set_harga(harga)

                print("Product Sukses Ter-Update!")  # kasih info kalo berhasil
                found = True  # tandain produk udah ketemu
                break  # berhenti kalo udah ketemu

        if not found:  # kalo id ga ketemu
            print("Product dengan ID", id, "tidak ditemukan!")  # kasih info kalo ga ada

    elif pilihan == "4":  # kalo pilih 4, hapus produk
        print("\n==== DELETE PRODUCT ====")  # header hapus produk
        id = input("Enter product ID untuk hapus: ")  # input id produk yang mau dihapus
        products_baru = []  # list baru buat nyimpen produk yang ga dihapus

        found = False  # variabel buat nandain produk ketemu atau engga
        for product in products:  # loop buat cari produk
            if product.get_id() != id:  # kalo id beda, simpen ke list baru
                products_baru.append(product)
            else:
                found = True  # kalo id ketemu, tandain

        if found:  # kalo produk ketemu dan udah dihapus
            products = products_baru  # update list products
            print("Product sukses terhapus!")  # kasih info kalo berhasil
        else:
            print("Product dengan ID", id, "tidak ditemukan!")  # kasih info kalo ga ketemu

    elif pilihan == "5":  # kalo pilih 5, cari produk berdasarkan nama
        print("\n==== SEARCH PRODUCT ====")  # header cari produk
        nama = input("Enter product nama untuk dicari: ")  # input nama produk yang dicari
        found = False  # variabel buat nandain produk ketemu atau engga

        for product in products:  # loop buat cari produk
            if product.get_nama() == nama:  # kalo namanya cocok
                print("Product ditemukan:")  # kasih info kalo ketemu
                product.display()  # tampilin detail produk
                found = True
                break  # berhenti kalo udah ketemu

        if not found:  # kalo ga ketemu
            print("Product dengan nama", nama, "tidak ditemukan!")  # kasih info kalo ga ada

    elif pilihan == "6":  # kalo pilih 6, keluar dari program
        print("Terima Kasih Sudah Menggunakan Sistem Ini!")  # pesan perpisahan
        break  # keluar dari loop

    else:  # kalo input ga valid
        print("Invalid pilihan. Coba Lagi!")  # kasih info kalo input salah
