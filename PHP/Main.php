<?php
include 'PetShop.php'; // masukin file PetShop biar bisa pake classnya

session_start(); // mulai session buat nyimpen data produk

if (!isset($_SESSION['products'])) { // cek kalo session 'products' belum ada
    $_SESSION['products'] = []; // bikin array kosong buat nyimpen produk
}

$products = &$_SESSION['products']; // pake reference biar langsung update ke session

// fungsi buat nampilin tabel produk
function tampilkanTabelProduk($products) { 
    if (empty($products)) { // cek kalo ga ada produk di array
        echo "<p>tidak ada product yang tersedia.</p>"; // kasih pesan kalo kosong
    } else { 
        echo "<table border='1' cellspacing='0' cellpadding='10'>"; // bikin tabel
        echo "<tr><th>id</th><th>nama</th><th>kategori</th><th>harga</th><th>foto</th><th>aksi</th></tr>"; // header tabel
        
        foreach ($products as $index => $product) { // loop tiap produk yang ada
            echo "<tr>";
            echo "<td>{$product->getId()}</td>"; // tampilin id produk
            echo "<td>{$product->getNama()}</td>"; // tampilin nama produk
            echo "<td>{$product->getKategori()}</td>"; // tampilin kategori produk
            echo "<td>rp " . number_format($product->getHarga(), 0, ',', '.') . "</td>"; // tampilin harga

            echo "<td>";
            
            if (!empty($product->getFoto())) { // cek kalo ada foto
                echo "<img src='{$product->getFoto()}' alt='foto' width='100'>"; // tampilin foto
            } else { 
                echo "tidak ada foto"; // tampilin teks kalo ga ada foto
            }
            
            echo "</td>"; 

            echo "<td>";
            echo "<a href='?edit={$index}'>edit</a> | "; // tombol edit
            echo "<a href='?hapus={$index}' onclick='return confirm(\"yakin ingin menghapus?\")'>hapus</a>"; // tombol hapus
            echo "</td>";

            echo "</tr>"; 
        }
        echo "</table>"; 
    }
}

// cek kalo tombol tambah ditekan
if (isset($_POST['tambah'])) { 
    $id = $_POST['id']; // ambil input id
    $nama = $_POST['nama']; // ambil input nama
    $kategori = $_POST['kategori']; // ambil input kategori
    $harga = (int)$_POST['harga']; // ambil input harga dan ubah jadi integer

    $sameID = false; // variabel buat cek apakah id udah ada

    foreach ($products as $product) { // loop buat cek id duplikat
        if ($product->getId() === $id) { // kalo id sama
            $sameID = true; // tandain id udah ada
            break; // keluar loop
        }
    }
    
    if (!$sameID) { // kalo id belum ada
        $foto = ""; // inisialisasi variabel foto
        
        if (isset($_FILES['foto']) && $_FILES['foto']['error'] === 0) { // cek kalo ada file diupload
            $foto = $_FILES['foto']['name']; // ambil nama file
            move_uploaded_file($_FILES['foto']['tmp_name'], $foto); // pindahin file ke server
        }
        
        $products[] = new PetShop($id, $nama, $kategori, $harga, $foto); // tambahin produk baru ke array
        echo "<p style='color: green;'>produk berhasil ditambahkan</p>"; // kasih notifikasi berhasil
    } else {
        echo "<p style='color: red;'>id produk sudah ada!</p>"; // kasih notifikasi gagal
    }
}

// cek kalo ada request edit
$Editing = false; // variabel buat tandain edit mode
$produkEditing = null; // variabel buat simpen data produk yang diedit
$indexEditing = -1; // index produk yang mau diedit

if (isset($_GET['edit'])) { // cek kalo ada request edit
    $indexEditing = (int)$_GET['edit']; // ambil index dari url
    
    if (isset($products[$indexEditing])) { // cek kalo produk dengan index itu ada
        $produkEditing = $products[$indexEditing]; // ambil data produk yang mau diedit
        $Editing = true; // tandain kalo lagi mode edit
    }
}

// cek kalo tombol edit ditekan
if (isset($_POST['edit'])) { 
    $index = (int)$_POST['index']; // ambil index produk yang mau diedit
    
    if (isset($products[$index])) { // cek kalo produk dengan index itu ada
        $products[$index]->setNama($_POST['nama']); // update nama produk
        $products[$index]->setKategori($_POST['kategori']); // update kategori produk
        $products[$index]->setHarga((int)$_POST['harga']); // update harga produk
        
        if (isset($_FILES['foto']) && $_FILES['foto']['error'] === 0) { // cek kalo ada foto baru diupload
            $foto = $_FILES['foto']['name']; // ambil nama file baru
            move_uploaded_file($_FILES['foto']['tmp_name'], $foto); // pindahin file ke server
            $products[$index]->setFoto($foto); // update foto produk
        }
        
        echo "<p style='color: green;'>produk berhasil diupdate</p>"; // kasih notifikasi berhasil
    }
    $Editing = false; // keluar dari mode edit
}

// cek kalo ada request hapus
if (isset($_GET['hapus'])) { 
    $index = (int)$_GET['hapus']; // ambil index dari url
    
    if (isset($products[$index])) { // cek kalo produk dengan index itu ada
        array_splice($products, $index, 1); // hapus produk dari array
    }
}

// fitur cari produk
$hasilPencarian = []; // array buat nyimpen hasil pencarian

if (isset($_POST['cari'])) { // cek kalo tombol cari ditekan
    $keyword = $_POST['keyword']; // ambil input keyword
    
    foreach ($products as $product) { // loop tiap produk buat dicari
        if ($product->getNama() == $keyword || $product->getKategori() == $keyword) { // cek kalo keyword cocok sama nama/kategori
            $hasilPencarian[] = $product; // masukin produk ke hasil pencarian
        }
    }
}

?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetShop Produk</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 900px;
            margin: 0 auto;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        form {
            background: #f5f5f5;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input, button {
            margin-bottom: 10px;
        }
        button {
            padding: 8px 15px;
            background: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Daftar Produk di PetShop</h1>

    <!-- Form Pencarian Produk -->
    <h2>Cari Produk</h2>
    <form method="POST">
        <input type="text" name="keyword" placeholder="Masukkan nama atau kategori" required>
        <button type="submit" name="cari">Cari</button>
    </form>

    <!-- Menampilkan hasil pencarian jika ada -->
    <?php if (!empty($hasilPencarian)): ?>
        <h2>Hasil Pencarian</h2>
        <?php tampilkanTabelProduk($hasilPencarian); ?>
    <?php endif; ?>

    <!-- Menampilkan tabel produk -->
    <h2>Produk yang Tersedia</h2>
    <?php tampilkanTabelProduk($products); ?>

    <!-- Form Tambah Produk -->
    <h2>Tambah Produk</h2>
    <form method="POST" enctype="multipart/form-data">
        <label>ID Produk:</label>
        <input type="text" name="id" required><br>
        
        <label>Nama:</label>
        <input type="text" name="nama" required><br>
        
        <label>Kategori:</label>
        <input type="text" name="kategori" required><br>
        
        <label>Harga:</label>
        <input type="number" name="harga" required><br>
        
        <label>Foto Produk:</label>
        <input type="file" name="foto" accept="image/*"><br>
        
        <button type="submit" name="tambah">Tambah</button>
    </form>

    <!-- Form Edit Produk -->
    <?php if ($Editing): ?>
        <h2>Edit Produk</h2>
        <form method="POST" enctype="multipart/form-data">
            <input type="hidden" name="index" value="<?php echo $indexEditing; ?>">
            
            <label>ID Produk:</label>
            <input type="text" value="<?php echo $produkEditing->getId(); ?>" disabled><br>
            
            <label>Nama:</label>
            <input type="text" name="nama" value="<?php echo $produkEditing->getNama(); ?>" required><br>
            
            <label>Kategori:</label>
            <input type="text" name="kategori" value="<?php echo $produkEditing->getKategori(); ?>" required><br>
            
            <label>Harga:</label>
            <input type="number" name="harga" value="<?php echo $produkEditing->getHarga(); ?>" required><br>
            
            <label>Foto Produk Saat Ini:</label>
            <?php if (!empty($produkEditing->getFoto())): ?>
                <img src="<?php echo $produkEditing->getFoto(); ?>" alt="Foto" width="100"><br>
            <?php else: ?>
                <p>Tidak ada foto</p>
            <?php endif; ?>
            
            <label>Upload Foto Baru (biarkan kosong untuk tetap menggunakan foto saat ini):</label>
            <input type="file" name="foto" accept="image/*"><br>
            
            <button type="submit" name="edit">Simpan Perubahan</button>
        </form>
    <?php endif; ?>
</body>
</html>