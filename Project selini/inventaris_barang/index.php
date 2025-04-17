<?php include 'koneksi.php'; include 'header.php'; ?>

<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f7f7f7;
    }

    h2 {
        margin-top: 30px;
        color: #333;
        text-align: center;
        font-weight: bold;
    }

    .table {
        width: 95%;
        margin: 30px auto;
        border-collapse: collapse;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        overflow: hidden;
        border-radius: 10px;
    }

    .table thead th {
        background: linear-gradient(45deg, #00c6ff, #0072ff);
        color: white;
        text-align: center;
        padding: 14px;
        font-size: 15px;
    }

    .table tbody td {
        text-align: center;
        padding: 12px;
        color: #555;
    }

    .table tbody tr:nth-child(even) {
        background-color: #f0f8ff;
    }

    .table tbody tr:nth-child(odd) {
        background-color: #ffffff;
    }

    .table tbody tr:hover {
        background-color: #e0f7fa;
        transition: 0.3s ease;
    }

    .btn {
        padding: 7px 14px;
        text-decoration: none;
        border-radius: 6px;
        font-size: 13px;
        transition: 0.3s ease;
        box-shadow: 0 2px 4px rgba(0,0,0,0.2);
    }

    .btn-warning {
        background-color: #ffca28;
        color: #333;
    }

    .btn-danger {
        background-color: #ef5350;
        color: #fff;
    }

    .btn-warning:hover {
        background-color: #f9a825;
        color: #fff;
    }

    .btn-danger:hover {
        background-color: #d32f2f;
    }

    .btn-sm {
        font-size: 12px;
        padding: 5px 10px;
    }

    .aksi-col {
        display: flex;
        justify-content: center;
        gap: 8px;
    }
</style>

<h2>📦 Daftar Barang</h2>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Barang</th>
            <th>Kategori</th>
            <th>Stok</th>
            <th>Harga</th>
            <th>Tanggal Masuk</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT barang.*, kategori.nama_kategori FROM barang 
                JOIN kategori ON barang.id_kategori = kategori.id_kategori";
        $result = $koneksi->query($sql);

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id_barang']}</td>
                    <td>{$row['nama_barang']}</td>
                    <td>{$row['nama_kategori']}</td>
                    <td>{$row['jumlah_stok']}</td>
                    <td>Rp. ".number_format($row['harga_barang'],0,',','.')."</td>
                    <td>{$row['tanggal_masuk']}</td>
                    <td class='aksi-col'>
                        <a href='edit_barang.php?id={$row['id_barang']}' class='btn btn-warning btn-sm'>Edit</a>
                        <a href='hapus_barang.php?id={$row['id_barang']}' class='btn btn-danger btn-sm' onclick=\"return confirm('Yakin ingin menghapus barang ini?')\">Hapus</a>
                    </td>
                  </tr>";
        }
        ?>
    </tbody>
</table>