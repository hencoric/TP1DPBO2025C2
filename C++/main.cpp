#include <bits/stdc++.h> // biar bisa pake semua library standar c++
#include "PetShop.cpp"   // include file header buat kelas petshop

using namespace std; // biar gak perlu nulis std:: setiap saat

int main()
{
     list<PetShop> products;    // bikin list buat nyimpen semua produk petshop
     int pilihan, harga;        // variabel buat nyimpen pilihan menu dan harga produk
     string id, nama, kategori; // variabel buat nyimpen id, nama, dan kategori produk

     while (true) // loop terus sampe user pilih keluar
     {
          // tampilan menu utama
          cout << "\n==== PET SHOP MANAGEMENT ====\n";
          cout << "1. Display Semua PRODUCT\n";
          cout << "2. Add PRODUCT Baru\n";
          cout << "3. Update PRODUCT\n";
          cout << "4. Delete PRODUCT\n";
          cout << "5. Cari Barang sesuai namanya\n";
          cout << "6. Keluar\n";
          cout << "Choose: ";
          cin >> pilihan; // user masukin pilihan menu

          if (pilihan == 1) // kalo user pilih opsi 1 buat liat semua produk
          {
               cout << "\n==== PRODUCT LIST ====\n"; // kasih header biar lebih rapih pas ditampilin

               if (products.empty()) // cek dulu apakah list produk kosong
               {
                    cout << "Tidak Ada PRODUCT yang Tersedia\n"; // kalo kosong, kasih tahu user
               }
               else // kalo ada produk di dalam list
               {
                    int i = 1; // variabel buat nomor urut produk biar gampang dibaca
                    for (list<PetShop>::iterator it = products.begin(); it != products.end(); it++, i++)
                    // pakai iterator buat nge-loop setiap elemen dalam list
                    {
                         cout << i << ". "; // tampilin nomor urut di depan produk
                         it->display();     // panggil fungsi display dari kelas PetShop buat nampilin detail produk
                    }
               }
          }
          else if (pilihan == 2) // kalo user pilih opsi 2 buat nambah produk baru
          {
               cout << "\n==== ADD PRODUCT BARU ====\n"; // kasih header biar user tahu lagi di bagian tambah produk

               cout << "ID: ";
               cin >> id; // input ID produk baru dari user

               cout << "Nama: ";
               cin >> nama; // input nama produk baru dari user

               cout << "Kategori: ";
               cin >> kategori; // input kategori produk baru dari user

               cout << "Harga: ";
               cin >> harga; // input harga produk baru dari user

               PetShop product(id, nama, kategori, harga); // bikin objek PetShop baru dengan data yang tadi diinput
               products.push_back(product);                // masukin objek yang baru dibuat ke dalam list products

               cout << "Product Sukses di tambahkan!\n"; // kasih notifikasi kalo produk berhasil ditambahkan
          }
          else if (pilihan == 3) // kalo user pilih opsi 3 buat update produk
          {
               cout << "\n==== UPDATE PRODUCT ====\n"; // kasih header biar user tahu lagi di bagian update produk
               cout << "Enter product ID untuk update: ";
               cin >> id; // input ID produk yang mau diupdate dari user

               int found = 0; // flag buat ngecek apakah produk dengan ID tersebut ada di list atau enggak

               // loop buat cari produk dengan ID yang sesuai
               for (list<PetShop>::iterator it = products.begin(); it != products.end(); it++)
               {
                    if (it->get_id() == id) // kalo ID produk cocok
                    {
                         // tampilkan nama saat ini dan minta input nama baru
                         cout << "Nama Baru (Saat Ini: " << it->get_nama() << "): ";
                         cin >> nama;
                         it->set_nama(nama); // update nama produk

                         // tampilkan kategori saat ini dan minta input kategori baru
                         cout << "Kategori Baru (Saat Ini: " << it->get_kategori() << "): ";
                         cin >> kategori;
                         it->set_kategori(kategori); // update kategori produk

                         // tampilkan harga saat ini dan minta input harga baru
                         cout << "Harga Baru (Saat Ini: " << it->get_harga() << "): ";
                         cin >> harga;
                         it->set_harga(harga); // update harga produk

                         found = 1;                              // tandai kalo produk berhasil ditemukan dan diupdate
                         cout << "Product Sukses Ter-Update!\n"; // kasih notifikasi kalo produk berhasil diupdate
                         break;                                  // keluar dari loop karena produk udah ketemu dan diupdate
                    }
               }

               if (!found) // kalo setelah loop produk gak ketemu
               {
                    cout << "Product dengan ID " << id << " tidak ditemukan!\n"; // kasih notifikasi kalo ID gak ditemukan
               }
          }
          else if (pilihan == 4) // kalo user pilih opsi 4 buat hapus produk
          {
               cout << "\n==== DELETE PRODUCT ====\n"; // kasih header biar user tahu lagi di bagian hapus produk
               cout << "Enter product ID untuk hapus: ";
               cin >> id; // input ID produk yang mau dihapus dari user

               list<PetShop> listBaru; // bikin list baru buat nyimpen produk yang gak dihapus
               int found = 0;          // flag buat ngecek apakah produk dengan ID yang dimasukin ada di list atau enggak

               // loop buat ngecek setiap produk di list
               for (list<PetShop>::iterator it = products.begin(); it != products.end(); it++)
               {
                    if (it->get_id() != id) // kalo ID produk gak sama dengan ID yang dimasukin user
                    {
                         listBaru.push_back(*it); // masukin produk ke list baru karena gak perlu dihapus
                    }
                    else
                    {
                         found = 1; // tandai kalo produk ditemukan dan akan dihapus
                    }
               }

               products = listBaru; // ganti list lama dengan list baru yang udah bersih dari produk yang dihapus

               if (found) // kalo produk ditemukan dan udah dihapus
               {
                    cout << "Product sukses terhapus!\n"; // kasih notifikasi kalo produk udah berhasil dihapus
               }
               else
               {
                    cout << "Product dengan ID " << id << " tidak ditemukan!\n"; // kasih notifikasi kalo produk gak ketemu
               }
          }
          else if (pilihan == 5) // kalo user pilih opsi 5 buat cari produk berdasarkan nama
          {
               cout << "\n==== SEARCH PRODUCT ====\n"; // kasih header biar user tahu lagi di bagian pencarian
               cout << "Enter product nama untuk dicari: ";
               cin >> nama; // input nama produk yang mau dicari dari user

               int found = 0; // flag buat ngecek apakah produk ketemu atau enggak

               // loop buat ngecek setiap produk di list
               for (list<PetShop>::iterator it = products.begin(); it != products.end(); it++)
               {
                    if (it->get_nama() == nama) // kalo nama produk cocok dengan yang dicari user
                    {
                         cout << "Product ditemukan:\n"; // kasih notifikasi kalo produk ditemukan
                         it->display();                  // tampilin detail produk yang cocok
                         found = 1;                      // tandai kalo produk ditemukan
                         break;                          // berhenti cari karena udah ketemu
                    }
               }

               if (!found) // kalo gak nemu produk dengan nama yang dimasukin user
               {
                    cout << "Product dengan nama '" << nama << "' tidak ditemukan!\n"; // kasih notifikasi kalo produk gak ketemu
               }
          }
          else if (pilihan == 6) // kalo user mau keluar dari program
          {
               cout << "Terima Kasih Sudah Menggunakan Sistem Ini!\n";
               break; // keluar dari loop
          }
          else // kalo input salah
          {
               cout << "Invalid pilihan. Coba Lagi!.\n";
          }
     }

     return 0; // program selesai
}
