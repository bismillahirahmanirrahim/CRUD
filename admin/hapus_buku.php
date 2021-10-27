<?php
    if ($_GET ['id_buku']) {
        include "koneksi.php";
        $qry_hapus = mysqli_query($koneksi, "DELETE FROM buku WHERE id_buku='".$_GET['id_buku']."'");
        
        if ($qry_hapus) {
            echo "<script> alert ('Sukses Hapus Buku'); location.href='tampil_buku.php';</script>";
        } else {
            echo "<script> alert ('Gagal Hapus Buku'); location.href='tampil_buku.php';</script>";
        }
    }
?>