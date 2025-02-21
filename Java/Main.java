import java.util.ArrayList;
import java.util.Scanner;

public class Main {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in); // buat scanner biar bisa input dari user
        ArrayList<PetShop> products = new ArrayList<>(); // bikin list buat nyimpen produk

        while (true) { // loop biar menu jalan terus sampe user milih keluar
            System.out.println("\n==== PET SHOP MANAGEMENT ===="); // tampilan judul menu
            System.out.println("1. Display Semua PRODUCT"); // opsi buat nampilin produk
            System.out.println("2. Add PRODUCT Baru"); // opsi buat nambah produk
            System.out.println("3. Update PRODUCT"); // opsi buat update produk
            System.out.println("4. Delete PRODUCT"); // opsi buat hapus produk
            System.out.println("5. Cari Barang sesuai namanya"); // opsi buat cari produk
            System.out.println("6. Keluar"); // opsi buat keluar dari program
            System.out.print("Choose: "); // minta user pilih menu

            int pilihan = scanner.nextInt(); // ambil input pilihan user
            scanner.nextLine(); // handle newline biar gak loncat input

            if (pilihan == 1) { // kalo user pilih 1, tampilin semua produk
                System.out.println("\n==== PRODUCT LIST ===="); // header buat daftar produk
                if (products.isEmpty()) { // cek kalo produk masih kosong
                    System.out.println("Tidak Ada PRODUCT yang Tersedia"); // kasih info kalo kosong
                } else { // kalo ada produk
                    int i = 1; // buat nomor urut
                    for (PetShop product : products) { // loop semua produk di list
                        System.out.print(i + ". "); // tampilin nomor urut
                        product.display(); // tampilin detail produk
                        i++; // tambah nomor urut
                    }
                }
            } else if (pilihan == 2) { // kalo user pilih 2, nambah produk baru
                System.out.println("\n==== ADD PRODUCT BARU ===="); // header tambah produk
                System.out.print("ID: "); // minta input id produk
                String id = scanner.nextLine(); // simpen input id
                System.out.print("Nama: "); // minta input nama produk
                String nama = scanner.nextLine(); // simpen input nama
                System.out.print("Kategori: "); // minta input kategori produk
                String kategori = scanner.nextLine(); // simpen input kategori
                System.out.print("Harga: "); // minta input harga produk
                int harga = scanner.nextInt(); // simpen input harga
                scanner.nextLine(); // handle newline biar gak loncat input

                products.add(new PetShop(id, nama, kategori, harga)); // tambah produk ke list
                System.out.println("Product Sukses ditambahkan!"); // kasih info kalo sukses
            } else if (pilihan == 3) { // kalo user pilih 3, update produk
                System.out.println("\n==== UPDATE PRODUCT ===="); // header update produk
                System.out.print("Enter product ID untuk update: "); // minta input id produk
                String id = scanner.nextLine(); // simpen input id
                boolean found = false; // flag buat cek produk ketemu atau enggak

                for (PetShop product : products) { // loop semua produk
                    if (product.getId().equals(id)) { // cek kalo id cocok
                        System.out.print("Nama Baru (Saat Ini: " + product.getNama() + "): "); // tampilin nama lama,
                                                                                               // minta input baru
                        product.setNama(scanner.nextLine()); // update nama produk
                        System.out.print("Kategori Baru (Saat Ini: " + product.getKategori() + "): "); // tampilin
                                                                                                       // kategori lama,
                                                                                                       // minta input
                                                                                                       // baru
                        product.setKategori(scanner.nextLine()); // update kategori produk
                        System.out.print("Harga Baru (Saat Ini: " + product.getHarga() + "): "); // tampilin harga lama,
                                                                                                 // minta input baru
                        int hargaBaru = scanner.nextInt(); // simpen harga baru
                        scanner.nextLine(); // handle newline biar gak loncat input
                        product.setHarga(hargaBaru); // update harga produk

                        System.out.println("Product Sukses Ter-Update!"); // kasih info kalo sukses
                        found = true; // ubah flag jadi true karena produk ketemu
                        break; // keluar dari loop
                    }
                }
                if (!found) { // kalo produk gak ketemu
                    System.out.println("Product dengan ID " + id + " tidak ditemukan!"); // kasih info kalo produk gak
                                                                                         // ada
                }
            } else if (pilihan == 4) { // kalo user pilih 4, hapus produk
                System.out.println("\n==== DELETE PRODUCT ===="); // header delete produk
                System.out.print("Enter product ID untuk hapus: "); // minta input id produk
                String id = scanner.nextLine(); // simpen input id

                boolean found = false; // flag buat cek produk ketemu atau enggak

                for (int i = 0; i < products.size(); i++) { // loop semua produk pakai index
                    if (products.get(i).getId().equals(id)) { // cek kalo id cocok
                        products.remove(i); // hapus produk dari list
                        found = true; // ubah flag jadi true karena produk ketemu
                        break; // keluar dari loop
                    }
                }

                if (found) { // kalo produk ketemu dan udah dihapus
                    System.out.println("Product sukses terhapus!"); // kasih info kalo sukses
                } else { // kalo produk gak ketemu
                    System.out.println("Product dengan ID " + id + " tidak ditemukan!"); // kasih info kalo produk gak
                                                                                         // ada
                }

            } else if (pilihan == 5) { // kalo user pilih 5, cari produk
                System.out.println("\n==== SEARCH PRODUCT ===="); // header cari produk
                System.out.print("Enter product nama untuk dicari: "); // minta input nama produk
                String nama = scanner.nextLine(); // simpen input nama
                boolean found = false; // flag buat cek produk ketemu atau enggak

                for (PetShop product : products) { // loop semua produk
                    if (product.getNama().equals(nama)) { // cek kalo nama cocok
                        System.out.println("Product ditemukan:"); // kasih info kalo produk ketemu
                        product.display(); // tampilin detail produk
                        found = true; // ubah flag jadi true karena produk ketemu
                        break; // keluar dari loop
                    }
                }
                if (!found) { // kalo produk gak ketemu
                    System.out.println("Product dengan nama " + nama + " tidak ditemukan!"); // kasih info kalo produk
                                                                                             // gak ada
                }
            } else if (pilihan == 6) { // kalo user pilih 6, keluar dari program
                System.out.println("Terima Kasih Sudah Menggunakan Sistem Ini!"); // tampilin pesan perpisahan
                break; // keluar dari loop dan akhiri program
            } else { // kalo user masukin pilihan yang salah
                System.out.println("Invalid pilihan. Coba Lagi!"); // kasih info kalo input salah
            }
        }
        scanner.close(); // tutup scanner buat menghindari memory leak
    }
}
